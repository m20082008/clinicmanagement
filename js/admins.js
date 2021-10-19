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
                "targets":[0, 5, 6,7],
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
        $('#save').val('Save');
    });


});