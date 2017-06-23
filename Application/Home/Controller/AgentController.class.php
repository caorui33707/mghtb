<?php
namespace Home\Controller;
use Think\Controller;
//use Think\Controller\restController;
class AgentController extends Controller {

    private $user;

    public function __construct(){
        # code...
        $this->user = session('user');
        if(!session('user')){
        //$this->ajaxReturn(array('code'=>-1,'message'=>'fail','data'=>'not login'));

        }
    }

    public function getList(){
     // $agent_info =M('agent_info');
        $member_info = M('member_info');

        if(!empty($_POST['memberid'])){
            $map['memberid'] = $_POST['memberid'];
        }
        if(!empty($_POST['nickname'])){
            $map['nickname'] = array('like',"%".$_POST['nickname']."%");
        }
        if(!empty($_POST['cellphone'])){
            $map['phone'] = array('like',"%".$_POST['phone']."%");
        }

        $pageNum = isset($_POST['pageNum'])?$_POST['pageNum']:5;
        $page = isset($_POST['page'])?$_POST['page']:1;

        $map['uid'] = $this->user['id'];//所属用户id 下的经纪人

        $count = M('agent_info')->where($map)->count();// 查询满足要求的总记录数

        $list = M('agent_info')->where($map)->page($page,$pageNum)->select();//获取分页数据

        foreach ($list as $key => $value) {
            $mmap['memberid'] = $value['memberid'];
            $MemberInfo = $member_info->where($mmap)->find();
            $list[$key]['memberInfo'] = $MemberInfo;
         }

        $Page   = new \Think\Page($count,$pageNum);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $data['totalPages'] = $count;
        $data['pageNum'] =$pageNum;
        $data['page'] = $page;
        $data['totalPages'] = ceil($count/$pageNum);
        $data['list'] = $list;
        $this->ajaxReturn($data);
    }

    public function add(){
        $member_info =M('agent_info');
        $data['memberid'] = $memberId = $_POST['memberid'];
        //$data['uid'] = $_POST['uid'];
        $data['nickname'] = $nickname = $_POST['nickname'];
        $data['phone'] = $phone = $_POST['phone'];
        $data['status'] = 0;
        $data['verify'] = 0;
        $data['uid']    = $this->user['id'];

        if(!$memberId){
            $return = array(
                'code'=>-2,
                'message'=>'请选择机构！',
            );
            $this->ajaxReturn($return);
            return false;
        }else if(!$nickname){
            $return = array(
                'code'=>-2,
                'message'=>'请输入经纪人名称！',
            );
            $this->ajaxReturn($return);
            return false;
        }else if(!$phone){
            $return = array(
                'code'=>-2,
                'message'=>'请输入手机号！',
            );
            $this->ajaxReturn($return);
          //  exit();
            return false;
        }else if(!preg_match('/^1[0-9]{10}$/',$phone)){
            $return = array(
                'code'=>-2,
                'message'=>'请正确的填写手机号！',
            );
            $this->ajaxReturn($return);
            return false;
        }else {

            $res = $member_info->add($data);

            if ($res) {
                $return = array(
                    'code' => 0,
                    'message' => 'success',
                );
            } else {
                $return = array(
                    'code' => -1,
                    'message' => 'fail',
                );
            }
            $this->ajaxReturn($return);
        }


    }

    public function updateStatus(){
      $id = $_POST['id'];
      $data['status'] = $_POST['status'];
      foreach ($id as $key => $value) {
        # code...
        $map['code'] = $value;
        $res = M('agent_info')->where($map)->save($data);

      }
      if($res){
        $return = array(
          'code'=>0,
          'message'=>'success',
        );
      }else{
        $return =array(
          'code'=>-1,
          'message'=>'fail',
      );
    }
      $this->ajaxReturn($return);
    }
    public function updateVerify(){
      $id = $_POST['code'];
      $data['verify'] = $_POST['verify'];
        # code...
        $map['code'] = $id;
        $res = M('agent_info')->where($map)->save($data);
      if($res){
        $return = array(
          'code'=>0,
          'message'=>'success',
        );
      }else{
        $return =array(
          'code'=>-1,
          'message'=>'fail',
      );
    }
      $this->ajaxReturn($return);
    }
    public function del(){
      $id = $_POST['id'];

      foreach ($id as $key => $value) {
        # code...
        $map['code'] = $value;
        $res = M('agent_info')->where($map)->delete();

      }
      if($res){
        $return = array(
          'code'=>0,
          'message'=>'success',
        );
      }else{
        $return =array(
          'code'=>-1,
          'message'=>'fail',
      );
    }
      $this->ajaxReturn($return);
    }
    public function exceFile(){
      import("Org.Util.PHPExcel");
      import("Org.Util.PHPExcel.Worksheet.Drawing");
      import("Org.Util.PHPExcel.Writer.Excel2007");
      $objPHPExcel = new \PHPExcel();
      $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
      $objActSheet = $objPHPExcel->getActiveSheet();// 水平居中（位置很重要，建议在最初始位置）
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('A')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('B1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('C')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('D')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('E')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('F')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objActSheet->setCellValue('A1', '商品货号');
        $objActSheet->setCellValue('B1', '商品名称');
        $objActSheet->setCellValue('C1', '商品图');
        $objActSheet->setCellValue('D1', '商品条码');
        $objActSheet->setCellValue('E1', '商品属性');
        $objActSheet->setCellValue('F1', '报价(港币)');
        // 设置个表格宽度
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(80);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(12);

        // 垂直居中
        $objPHPExcel->getActiveSheet()->getStyle('A')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('B')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('D')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('E')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('F')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $fileName = '报价表';
        $date = date("Y-m-d",time());
        $fileName .= "_{$date}.xls";

        $fileName = iconv("utf-8", "gb2312", $fileName);
        //重命名表
        // $objPHPExcel->getActiveSheet()->setTitle('test');
        //设置活动单指数到第一个表,所以Excel打开这是第一个表
        $objPHPExcel->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=\"$fileName\"");
        header('Cache-Control: max-age=0');

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output'); //文件通过浏览器下载

    }

}
