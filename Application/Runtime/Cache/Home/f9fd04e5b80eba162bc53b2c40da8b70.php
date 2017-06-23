<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>机构管理</title>
    <link rel="stylesheet" href="/htb/Public/template/assets/css/index.min.css">
</head>
<body>
<div class="wrap">
    <div class="header">
    <div class="clearfix layout">
        <h1><a href="/htb/index.php/Home/accountmanage/userManage">交易管理系统</a></h1>
        <div>

            <?php if($user['identity_id'] != 3){ ?>
                <a href="/htb/index.php/Home/accountmanage/userManage"  <?php if(($active == 'accountmanage')): ?>class="active"<?php endif; ?>  >账户管理</a>
            <?php } ?>
            <a href="/htb/index.php/Home/clientmanage/clientList"  <?php if(($active == 'clientmanage')): ?>class="active"<?php endif; ?>   >客户管理</a>
            <a href="/htb/index.php/Home/countmanage/countTable"  <?php if(($active == 'countmanage')): ?>class="active"<?php endif; ?>  >结算管理</a>
            <a href="/htb/index.php/Home/sysmanage/pwdManage" <?php if(($active == 'sysmanage')): ?>class="active"<?php endif; ?>  >系统管理</a>
            <span class="spantext" >管理员：<?php echo ($user['uid']); ?>,<a style="color:#FF0000;" href="/htb/index.php/Home/login/doLoginout" onclick="return confirm('确定退出本系统?')" >系统退出</a></span>
        </div>
    </div>
</div>
    <!--<div class="header">-->
        <!--<div class="clearfix layout">-->
            <!--<h1><a href="/htb/index.php/Home/accountmanage/orgManage">交易管理系统</a></h1>-->
            <!--<div>-->
                <!--<a href="/htb/index.php/Home/accountmanage/userManage" class="active">账户管理</a>-->
                <!--<a href="/htb/index.php/Home/clientmanage/clientList">客户管理</a>-->
                <!--<a href="/htb/index.php/Home/countmanage/countTable">结算管理</a>-->
                <!--<a href="/htb/index.php/Home/sysmanage/pwdManage">系统管理</a>-->
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->
    <div class="main">

        <div class="sidebar">
    <a href="/htb/index.php/Home/accountmanage/userManage" <?php if($actionUrl=='userManage'){ echo 'class="active"'; } ?> >用户管理</a>
    <?php if($user['identity_id'] != 2){ ?>
    <a href="/htb/index.php/Home/accountmanage/orgManage" <?php if($actionUrl=='orgManage'){ echo 'class="active"';} ?> >机构管理</a>
    <?php } ?>

    <a href="/htb/index.php/Home/accountmanage/brokerManage"  <?php if($actionUrl=='brokerManage'){ echo 'class="active"';} ?>  >经纪人管理</a>
    <!--a(class="#{ level[1] == 4 ? 'active' : '' }" href="/htb/index.php/Home/wqManage") 微圈管理-->
</div>

        <div class="content">
            <div class="search-bar">
                <select name="level"></select>
                <input name="orgName" type="text" placeholder="机构名称"><a href="javascript:;" class="btn J_search">查询</a>
            </div>
            <div class="control-bar">
                <a href="javascript:;" class="btn J_showAdd">新建</a>
                <a href="javascript:;" class="btn J_updateStatus open-i">启用</a>
                <a href="javascript:;" class="btn J_updateStatus close-i">禁用</a>
                <!--<a href="javascript:;" class="btn J_onDel">删除</a></div>-->
            <div class="data-container">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>机构编码</th>
                            <th>机构名称</th>
                            <th>机构类型</th>
                            <th>上级机构</th>
                            <th>手机号码</th>
                            <th>固定电话</th>
                            <th>状态</th>
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
    <div data-remodal-id="addOrgModal" class="remodal addOrgModal">
        <div class="remodal-head">
            <div class="remodal-title">新建机构</div>
            <div data-remodal-action="cancel" class="remodal-close"></div>
        </div>
        <div class="remodal-body">
            <form class="modalForm">
                <div class="form-control">
                    <label>机构名称</label>
                    <input type="text" name="orgName">
                </div>
                <div class="form-control">
                    <label>机构编码</label>
                    <input type="text" name="orgCode">
                </div>
                <div class="form-control">
                    <label>机构层级</label>
                    <select name="orgLevel">
                        <option value="0">一级机构</option>
                        <option value="1">二级机构</option>
                    </select>
                </div>
                <div class="form-control hide J_topOrg">
                    <label>上级机构</label>
                    <select name="orgTopLevel">
                        <option value="0">一级机构</option>
                    </select>
                </div>
                <div class="form-control">
                    <label>机构类型</label>
                    <select name="orgType">
                        <option value="0">航空</option>
                        <!--<option value="1">陆运</option>-->
                        <!--<option value="2">海运</option>-->
                        <!--<option value="3">其他</option>-->
                    </select>
                </div>
                <div class="form-control">
                    <label>手机号码</label>
                    <input type="text" name="phone">
                </div>
                <div class="form-control">
                    <label>固定电话</label>
                    <input type="text" name="cellphone">
                </div>
            </form>
        </div>
        <div class="remodal-footer"><a href="javascript:;" class="remodal-confirm">确 定</a></div>
    </div>
    <div data-remodal-id="changeOrgModal" class="remodal changeOrgModal">
        <div class="remodal-head">
            <div class="remodal-title">修改机构</div>
            <div data-remodal-action="cancel" class="remodal-close"></div>
        </div>
        <div class="remodal-body">
            <form class="modalForm">
                <div class="form-control">
                    <label>机构名称</label>
                    <input type="text" name="orgName">
                </div>
                <div class="form-control">
                    <label>机构编码</label>
                    <input type="text" name="orgCode">
                </div>
                <div class="form-control">
                    <label>机构层级</label>
                    <select name="orgLevel">
                        <option value="0">一级机构</option>
                        <option value="1">二级机构</option>
                    </select>
                </div>
                <div class="form-control hide J_topOrg">
                    <label>上级机构</label>
                    <select name="orgTopLevel">
                        <option value="0">一级机构</option>
                    </select>
                </div>
                <div class="form-control">
                    <label>机构类型</label>
                    <select name="orgType">
                        <option value="0">航空</option>
                        <!--<option value="1">陆运</option>-->
                        <!--<option value="2">海运</option>-->
                        <!--<option value="3">其他</option>-->
                    </select>
                </div>
                <div class="form-control">
                    <label>手机号码</label>
                    <input type="text" name="phone">
                </div>
                <div class="form-control">
                    <label>固定电话</label>
                    <input type="text" name="cellphone">
                </div>
            </form>
        </div>
        <div class="remodal-footer"><a href="javascript:;" class="remodal-confirm">确 定</a></div>
    </div>
</div>
<script src="/htb/Public/template/assets/js/vendor/require.js" data-main="/htb/Public/template/assets/js/common"></script>
<script>
    require(['common'], function () {
        require(['page/orgManage']);
    });
</script>
</body>
</html>