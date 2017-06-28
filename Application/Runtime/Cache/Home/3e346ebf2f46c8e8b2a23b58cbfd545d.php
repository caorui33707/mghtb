<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>用户管理</title>
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
            <!--<div>-->
                <!--<a href="/index.php/Home/accountmanage/userManage" class="active">账户管理</a>-->
                <!--<a href="/index.php/Home/clientmanage/clientList">客户管理</a>-->
                <!--<a href="/index.php/Home/countmanage/countTable">结算管理</a>-->
                <!--<a href="/index.php/Home/sysmanage/pwdManage">系统管理</a>-->
                <!--<span class="spantext" >管理员：<?php echo ($user['uid']); ?>,<a style="color:#FF0000;" href="javascript:;">系统退出</a></span>-->
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
                <!--<select name="roleType">-->
                <!--<option value="">角色类型</option>-->
                <!--<option value="">注册会员</option>-->
                <!--<option value="">经纪人</option>-->
                <!--</select>-->
                <input type="text" name="phone-s" placeholder="手机号码">
                <!--<input type="text" placeholder="机构名称">-->
                <input type="text" name="nickname-s" placeholder="用户名称">
                <a href="javascript:;" class="J_search btn">查询</a>
            </div>
            <div class="control-bar">
                <a href="javascript:;" class="btn J_showAdd">新建</a>
                <a href="javascript:;" class="btn J_updateStatus open-i">启用</a>
                <a href="javascript:;" class="btn J_updateStatus close-i">禁用</a>
                <a href="javascript:;" class="btn J_onDel">删除</a></div>
            <div class="data-container">
                <table>
                    <thead>
                    <tr>
                        <th>
                            <input type="checkbox">
                        </th>
                        <th>登录账号</th>
                        <th>用户昵称</th>
                        <th>角色类型</th>
                        <th>所属机构</th>
                        <th>手机号码</th>
                        <th>最后登录时间</th>
                        <th>状态</th>
                        <th>会员所得手续费</th>
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
    <div data-remodal-id="addUserModal" class="remodal addUserModal">
        <div class="remodal-head">
            <div class="remodal-title">添加用户</div>
            <div data-remodal-action="cancel" class="remodal-close"></div>
        </div>
        <div class="remodal-body">
            <form class="modalForm">
                <div class="form-control">
                    <label>所属机构</label>
                    <select name="org" class="org_select">
                        <span>所需机构没有，请先添加机构！</span>
                        <!--<option value="0">客服</option>-->
                        <!--<option value="1">结算专员</option>-->
                        <!--<option value="2">后台维护管理员</option>-->
                    </select>
                </div>
                <div class="form-control">
                    <label>所属经纪人</label>
                    <select name="agent">
                        <option value="0">不选经纪人</option>
                        <!--<option value="0">客服</option>-->
                        <!--<option value="1">结算专员</option>-->
                        <!--<option value="2">后台维护管理员</option>-->
                    </select>
                </div>
                <div class="form-control">
                    <label>登录账号</label>
                    <input type="text" name="username">
                </div>
                <div class="form-control">
                    <label>登录密码</label>
                    <input type="text" name="password">
                </div>
                <div class="form-control">
                    <label>用户名称</label>
                    <input type="text" name="nickname">
                </div>
                <div class="form-control">
                    <label>角色</label>
                    <select name="role">
                        <option value="0">客服</option>
                        <option value="1">结算专员</option>
                        <option value="2">后台维护管理员</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="remodal-footer"><a href="javascript:;" class="remodal-confirm">确 定</a></div>
    </div>

    <div data-remodal-id="changeUserModal" class="remodal changeUserModal">
        <div class="remodal-head">
            <div class="remodal-title">修改用户</div>
            <div data-remodal-action="cancel" class="remodal-close"></div>
        </div>
        <div class="remodal-body">
            <form class="modalForm">
                <div class="form-control">
                    <label>所属机构</label>
                    <select name="org"class="org_select">
                        <option value="0">客服</option>
                        <option value="1">结算专员</option>
                        <option value="2">后台维护管理员</option>
                    </select>
                </div>

                <div class="form-control">
                    <label>经纪人</label>
                    <select name="agent">
                        <option value="0">客服</option>
                        <option value="1">结算专员</option>
                        <option value="2">后台维护管理员</option>
                    </select>
                </div>

                <div class="form-control">
                    <label>登录账号</label>
                    <input type="text" name="username" disabled >
                </div>
                <div class="form-control">
                    <label>登录密码</label>
                    <input type="text" name="password">
                </div>
                <div class="form-control">
                    <label>用户名称</label>
                    <input type="text" name="nickname">
                </div>
                <div class="form-control">
                    <label>角色</label>
                    <select name="role">
                        <option value="0">客服</option>
                        <option value="1">结算专员</option>
                        <option value="2">后台维护管理员</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="remodal-footer"><a href="javascript:;" class="remodal-confirm">确 定</a></div>
    </div>

    <div data-remodal-id="resetPwdModal" class="remodal resetPwdModal">
        <div class="remodal-head">
            <div class="remodal-title">重置密码</div>
            <div data-remodal-action="cancel" class="remodal-close"></div>
        </div>
        <div class="remodal-body">
            <form class="modalForm">
                <div class="form-control">
                    <label>登录账号</label>
                    <input type="text" name="username" readonly>
                </div>
                <div class="form-control">
                    <label>用户名称</label>
                    <input type="text" name="nickname" readonly>
                </div>
                <div class="form-control">
                    <label>新密码</label>
                    <input type="text" name="password">
                </div>
            </form>
        </div>
        <div class="remodal-footer"><a href="javascript:;" data-remodal-action="confirm" class="remodal-confirm">确 定</a>
        </div>
    </div>

    <div data-remodal-id="editFeeModal" class="remodal editFeeModal">
        <div class="remodal-head">
            <div class="remodal-title">修改会员手续费</div>
            <div data-remodal-action="cancel" class="remodal-close"></div>
        </div>
        <div class="remodal-body">
            <form class="modalForm">
                <div class="form-control">
                    <label>手续费</label>
                    <!--placeholder="请输入百分比"-->
                    <input type="number" style="width: 45px"  name="percentFee">&nbsp&nbsp%
                </div>
            </form>
        </div>
        <div class="remodal-footer"><a href="javascript:;" data-remodal-action="confirm" class="remodal-confirm">确 定</a>
        </div>
    </div>

</div>


<script src="/Public/template/assets/js/vendor/require.js" data-main="/Public/template/assets/js/common"></script>
<script>
    require(['common'], function () {
        require(['page/userManage']);
    });
</script>
</body>
</html>