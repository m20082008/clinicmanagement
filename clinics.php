<?php
include('classes/clinic.php');
include('classes/admin.php');
$clinic = new Clinic();
$admin = new Admin();
$admin->adminLoginStatus();
include('inc/header.php');
?>
    <title>سیستم مدیریت کلینیک - مدیریت کلینیک ها</title>
<?php include('include_files.php');?>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
    <script src="js/clinics.js"></script>
<?php include('inc/container.php');?>
    <div class="container">
        <?php include('side-menu.php');	?>
        <div class="content">
            <div class="container-fluid">
                <div>
                    <a href="#"><strong><span class="ti-crown"></span> مدیریت کلینیک ها</strong></a>
                    <hr>
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-10">
                                <h3 class="panel-title"></h3>
                            </div>
                            <div class="col-md-2" align="right">
                                <button type="button" name="add" id="addclinic" class="btn btn-success btn-xs">اضافه کردن کلینیک</button>
                            </div>
                        </div>
                    </div>
                    <table id="clinicList" class="table table-bordered table-striped" style="direction: rtl;">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>نام کلینیک</th>
                            <th>آدرس</th>
                            <th>وضعیت</th>
                            <th>تلفن</th>
                            <th>شبانه روزی</th>
                            <th>ساخته شده در </th>
                            <th>بروزرسانی در </th>
                            <th> </th>
                            <th> </th>
                            <th> </th>
                        </tr>
                        </thead>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <div id="clinicModal" class="modal fade">
        <div class="modal-dialog">
            <form method="post" id="clinicForm" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-plus"></i> ویرایش کلینیک</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="userName" class="control-label">نام کلینیک*</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="نام کاربری" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label">آدرس*</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="آدرس" required>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="control-label">تلفن</label>
                            <input type="text" class="form-control"  id="phone" name="phone" placeholder="تلفن">
                        </div>
                        <div class="form-group">
                            <label for="phone" class="control-label">شبانه روزی</label>
                            <input type="radio" class="form-control"  id="fulltime" name="fulltime" placeholder="تلفن">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="clinicid" id="clinicid" />
                        <input type="hidden" name="action" id="action" value="updateclinic" />
                        <input type="submit" name="save" id="save" class="btn btn-info" value="ذخیره" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include('inc/footer.php');?>