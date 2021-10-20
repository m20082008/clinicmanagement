$(document).ready(function(){
    var adminData = $('#adminList').DataTable({
        "lengthChange": false,
        "processing":true,
        "searching":false,
        "serverSide":true,
        "order":[],
        "ajax":{
            url:"action.php",
            type:"POST",
            data:{action:'listadmin'},
            dataType:"json"
        },
        "columnDefs":[
            {
                "targets":[0, 4, 5,6],
                "orderable":false,
            },
        ],
        "pageLength": 10
    });
    $('#addAdmin').click(function(){
        $('#adminModal').modal('show');
        $('#adminForm')[0].reset();
        $('.modal-title').html("<i class='fa fa-plus'></i> اضافه کردن ادمین");
        $('#action').val('addAdmin');
        $('#save').val('اضافه کن');
    });
    $(document).on('submit','#adminForm', function(event){
        event.preventDefault();
        $('#save').attr('disabled','disabled');
        $.ajax({
            url:"action.php",
            method:"POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success:function(data){
                $('#adminForm')[0].reset();
                $('#adminModal').modal('hide');
                $('#save').attr('disabled', false);
                adminData.ajax.reload();
            }
        })
    });
    $(document).on('click', '.update', function(){
        var adminid = $(this).attr("id");
        var action = 'getAdminDetails';
        $.ajax({
            url:'action.php',
            method:"POST",
            data:{adminid:adminid, action:action},
            dataType:"json",
            success:function(data){
                $('#adminModal').modal('show');
                $('#adminid').val(data.id);
                $('#username').val(data.username);
                $('#password').val(data.password);
                $('#email').val(data.email);
                $('.modal-title').html("<i class='fa fa-plus'></i> ویرایش ادمین");
                $('#action').val('updateAdmin');
                $('#save').val('ویرایش کن');

            }
        })
    })
    $(document).on('click', '.delete', function(){
        var adminid = $(this).attr("id");
        var action = "deleteAdmin";
        if(confirm("از حذف این ادمین اطمینان دارید؟!")) {
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{adminid:adminid, action:action},
                success:function(data) {
                    adminData.ajax.reload();
                }
            })
        } else {
            return false;
        }
    })
    $(document).on('click', '.activestatus', function(){
        var adminid = $(this).attr("id");
        var action = "statusUpdate";
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{adminid:adminid, action:action},
                success:function(data) {
                    adminData.ajax.reload();
                }
            })
    })



});