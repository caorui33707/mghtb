<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>密码设置</title>
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
            <!--<h1><a href="/index.php/Home/accountmanage/userManage">交易管理系统</a></h1>-->
            <!--<div><a href="/index.php/Home/accountmanage/userManage">账户管理</a><a href="/index.php/Home/clientmanage/clientList">客户管理</a><a-->
                    <!--href="/index.php/Home/countmanage/countTable">结算管理</a><a href="/index.php/Home/sysmanage/pwdManage"-->
                                                                          <!--class="active">系统管理</a></div>-->
        <!--</div>-->
    <!--</div>-->
    <div class="main">
        <div class="sidebar">
            <a href="/index.php/Home/sysmanage/pwdManage" class="active">密码设置</a>
            <!--<a href="javascript:;">角色管理</a>-->
        </div>
        <div class="content">
            <form class="pwd-form">
                <h5>密码修改</h5>
                <div class="form-control">
                    <label>旧密码：</label>
                    <input name="oldPassword" type="password">
                </div>
                <!--<div class="form-control">-->
                <!--<label>验证码：</label>-->
                <!--<input type="text" class="w200"><a href="javascript:;" class="check-code J_sendCheckCode">发送验证码</a>-->
                <!--</div>-->
                <div class="form-control">
                    <label>新密码：</label>
                    <input name="newPassword" type="password">
                </div>
                <div class="form-control">
                    <label>新密码确认：</label>
                    <input name="confirmPassword" type="password">
                </div>
                <div class="form-control">
                    <label></label><span class="error-tips"></span>
                </div>

                <div class="form-control">
                    <label></label><a href="javascript:;" class="submit J_submit">提交</a>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="/Public/template/assets/js/vendor/require.js" data-main="/Public/template/assets/js/common"></script>
<script>
    require(['common'], function () {
        require(['page/pwdManage']);
    });
</script>
</body>
</html>