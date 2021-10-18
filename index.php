<?php
ob_start();
include('classes/admin.php');
if (!empty($_SESSION["adminUserid"])) {
    header("location: dashboard.php");
}
$adminLogin = new Admin();
$errorMessage =  $adminLogin->adminLogin();
include('inc/header.php');
?>
<title>سیستم مدیریت کلینیک </title>
<?php include('include_files.php'); ?>
<?php include('inc/container.php'); ?>

<div class="container">
    <div class="row d-flex">
        <div class="col-md-6 d-flex justify-content-center">
            <div class="panel panel-info " style="direction: rtl;">
                <div class="panel-heading" style="background:#000;color:white;">
                    <div class="panel-title">ورود مدیر</div>
                </div>
                <div style="padding-top:30px" class="panel-body">
                    				<?php if ($errorMessage != '') { ?>
                    					<div id="login-alert" class="alert alert-danger col-sm-12">
                    <?php echo $errorMessage; ?></div>
                    				<?php } ?>
                    <form id="loginform" class="form-horizontal" role="form" method="POST" action="">
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" id="username" name="username" placeholder="نام کاربری"
                                   required>
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="رمز عبور" required>
                        </div>
                        <div style="margin-top:10px" class="form-group">
                            <div class="col-sm-12 controls">
                                <input type="submit" name="login" value="ورود" class="btn btn-success">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('inc/footer.php'); ?>
