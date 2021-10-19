<?php
include('classes/admin.php');
$admin = new Admin();
$admin->adminLoginStatus();
include('inc/header.php');
?>
    <title>سیستم مدیریت کلینیک - مدیریت ادمین ها</title>
<?php include('include_files.php');?>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
    <script src="js/admins.js"></script>
<?php include('inc/container.php');?>
    <div class="container">
        <?php include('side-menu.php');	?>
        <div class="content">
            <div class="container-fluid">
                <div>
                    <a href="#"><strong><span class="ti-crown"></span> مدیریت ادمین ها</strong></a>
                    <hr>
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-10">
                                <h3 class="panel-title"></h3>
                            </div>
                            <div class="col-md-2" align="right">
                                <button type="button" name="add" id="addAdmin" class="btn btn-success btn-xs">اضافه کردن ادمین</button>
                            </div>
                        </div>
                    </div>
                    <table id="adminList" class="table table-bordered table-striped" style="direction: rtl;">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>نام کاربری</th>
                            <th>پسورد</th>
                            <th>ایمیل</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <div id="adminModal" class="modal fade">
        <div class="modal-dialog">
            <form method="post" id="adminForm" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-plus"></i> ویرایش ادمین</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="userName" class="control-label">نام کاربری*</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="نام کاربری" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label">رمز عبور*</label>
                            <input type="text" class="form-control" id="password" name="password" placeholder="رمز عبور" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label">ایمیل</label>
                            <input type="email" class="form-control"  id="email" name="email" placeholder="ایمیل">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="adminid" id="adminid" />
                        <input type="hidden" name="action" id="action" value="updateadmin" />
                        <input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include('inc/footer.php');?>