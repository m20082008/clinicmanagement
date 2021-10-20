$(document).ready(function(){
    var clinicData = $('#clinicList').DataTable({
        "lengthChange": false,
        "processing":true,
        "searching":false,
        "serverSide":true,
        "order":[],
        "ajax":{
            url:"action.php",
            type:"POST",
            data:{action:'listclinic'},
            dataType:"json"
        },
        "columnDefs":[
            {
                "targets":[0, 8, 9,10],
                "orderable":false,
            },
        ],
        "pageLength": 10
    });
    $('#addclinic').click(function(){
        $('#clinicModal').modal('show');
        $('#clinicForm')[0].reset();
        $('.modal-title').html("<i class='fa fa-plus'></i> اضافه کردن کلینیک");
        $('#action').val('addclinic');
        $('#save').val('اضافه کن');
    });
    $(document).on('submit','#clinicForm', function(event){
        event.preventDefault();
        $('#save').attr('disabled','disabled');
        $.ajax({
            url:"action.php",
            method:"POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success:function(data){
                $('#clinicForm')[0].reset();
                $('#clinicModal').modal('hide');
                $('#save').attr('disabled', false);
                clinicData.ajax.reload();
            }
        })
    });
    $(document).on('click', '.update', function(){
        var clinicid = $(this).attr("id");
        var action = 'getclinicDetails';
        $.ajax({
            url:'action.php',
            method:"POST",
            data:{clinicid:clinicid, action:action},
            dataType:"json",
            success:function(data){
                $('#clinicModal').modal('show');
                $('#clinicid').val(data.id);
                $('#username').val(data.username);
                $('#password').val(data.password);
                $('#email').val(data.email);
                $('.modal-title').html("<i class='fa fa-plus'></i> ویرایش ادمین");
                $('#action').val('updateclinic');
                $('#save').val('ویرایش کن');

            }
        })
    })
    $(document).on('click', '.delete', function(){
        var clinicid = $(this).attr("id");
        var action = "deleteclinic";
        if(confirm("از حذف این ادمین اطمینان دارید؟!")) {
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{clinicid:clinicid, action:action},
                success:function(data) {
                    clinicData.ajax.reload();
                }
            })
        } else {
            return false;
        }
    })
    $(document).on('click', '.activestatus', function(){
        var clinicid = $(this).attr("id");
        var action = "statusUpdate";
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{clinicid:clinicid, action:action},
                success:function(data) {
                    clinicData.ajax.reload();
                }
            })
    })



});