<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>经纪人管理</title>
    <link rel="stylesheet" href="/Public/template/assets/css/index.min.css">
</head>
<body>
<div class="wrap">
    <div class="header">
    <div class="clearfix layout">
        <h1><a href="/index.php/Home/accountmanage/userManage">交易管理系统</a></h1>
        <div>

            <?php if($user['identity_id'] != 3){ ?>
                <a href="/index.php/Home/accountmanage/userManage"  <?php if(($active == 'accountmanage')): ?>class="active"<?php endif; ?>  >账户管理</a>
            <?php } ?>
            <a href="/index.php/Home/clientmanage/clientList"  <?php if(($active == 'clientmanage')): ?>class="active"<?php endif; ?>   >客户管理</a>
            <a href="/index.php/Home/countmanage/countTable"  <?php if(($active == 'countmanage')): ?>class="active"<?php endif; ?>  >结算管理</a>
            <a href="/index.php/Home/sysmanage/pwdManage" <?php if(($active == 'sysmanage')): ?>class="active"<?php endif; ?>  >系统管理</a>
            <span class="spantext" >管理员：<?php echo ($user['uid']); ?>,<a style="color:#FF0000;" href="/index.php/Home/login/doLoginout" onclick="return confirm('确定退出本系统?')" >系统退出</a></span>
        </div>
    </div>
</div>
    <!--<div class="header">-->
        <!--<div class="clearfix layout">-->
            <!--<h1><a href="/index.php/Home/orgManage">交易管理系统</a></h1>-->
            <!--<div>-->
                <!--<a href="/index.php/Home/accountmanage/userManage" class="active">账户管理</a>-->
                <!--<a href="/index.php/Home/clientmanage/clientList">客户管理</a>-->
                <!--<a href="/index.php/Home/countmanage/countTable">结算管理</a>-->
                <!--<a href="/index.php/Home/sysmanage/pwdManage">系统管理</a>-->
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->
    <div class="main">

        <div class="sidebar">
    <a href="/index.php/Home/accountmanage/userManage" <?php if($actionUrl=='userManage'){ echo 'class="active"'; } ?> >用户管理</a>
    <?php if($user['identity_id'] != 2){ ?>
    <a href="/index.php/Home/accountmanage/orgManage" <?php if($actionUrl=='orgManage'){ echo 'class="active"';} ?> >机构管理</a>
    <?php } ?>

    <a href="/index.php/Home/accountmanage/brokerManage"  <?php if($actionUrl=='brokerManage'){ echo 'class="active"';} ?>  >经纪人管理</a>
    <!--a(class="#{ level[1] == 4 ? 'active' : '' }" href="/index.php/Home/wqManage") 微圈管理-->
</div>

        <div class="content">
            <div class="search-bar">
                <select name="level"></select>
                <input type="text" name="phone" placeholder="手机号码">
                <input type="text" name="nickname" placeholder="经纪人名称">
                <a href="javascript:;" class="btn J_search">查询</a>
            </div>
            <div class="control-bar"><a href="javascript:;" class="btn J_showAdd">新建</a>
                <a href="javascript:;" class="btn J_updateStatus open-i">启用</a>
                <a href="javascript:;" class="btn J_updateStatus close-i">禁用</a>
                <a href="javascript:;" class="btn J_onDel">删除</a></div>
            <div class="data-container">
                <table>
                    <thead>
                        <tr>
                            <th> </th>
                            <th>登录账号</th>
                            <th>用户昵称</th>
                            <th>角色类型</th>
                            <th>所属机构</th>
                            <th>手机号码</th>
                            <th>状态</th>
                            <th>审核状态</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div class="pagination"></div>
            </div>
        </div>
    </div>
    <div data-remodal-id="addBrokerModal" class="remodal addBrokerModal">
        <div class="remodal-head">
            <div class="remodal-title">添加经纪人</div>
            <div data-remodal-action="cancel" class="remodal-close"></div>
        </div>
        <div class="remodal-body">
            <form class="modalForm">
                <div class="form-control">
                    <label>所属机构</label>
                    <select name="org"></select>
                </div>
                <div class="form-control">
                    <label>经纪人ID</label>
                    <input type="text" name="id">
                </div>
                <div class="form-control">
                    <label>经纪人名称</label>
                    <input type="text" name="name">
                </div>
                <div class="form-control">
                    <label>手机号码</label>
                    <input type="text" name="phone">
                </div>
            </form>
        </div>
        <div class="remodal-footer">
            <a href="javascript:;"  class="remodal-confirm">确认</a>
        </div>
    </div>
    <div data-remodal-id="checkBrokerModal" class="remodal checkBrokerModal">
        <div class="remodal-head">
            <div class="remodal-title">审核经纪人</div>
            <div data-remodal-action="cancel" class="remodal-close"></div>
        </div>
        <div class="remodal-body">
            <form class="modalForm">
                <div class="form-control">
                    <label>所属机构</label>
                    <input type="text" name="orgName" readonly>
                </div>
                <div class="form-control">
                    <label>经纪人ID</label>
                    <input type="text" name="id" readonly>
                </div>
                <div class="form-control">
                    <label>经纪人名称</label>
                    <input type="text" name="name" readonly>
                </div>
                <div class="form-control">
                    <label>手机号码</label>
                    <input type="text" name="phone" readonly>
                </div>
            </form>
        </div>
        <div class="remodal-footer">
            <a href="javascript:;"  class="remodal-cancel J_check">拒绝</a>
            <a href="javascript:;"  class="remodal-confirm J_check">通过</a>
        </div>
    </div>
</div>
<script src="/Public/template/assets/js/vendor/require.js" data-main="/Public/template/assets/js/common"></script>
<script>
    require(['common'], function () {
        require(['page/brokerManage']);
    });
</script>
</body>
</html>