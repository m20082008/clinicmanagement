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
    //
    // $('#addadmin').click(function(){
    //     $('#adminModal').modal('show');
    //     $('#adminForm')[0].reset();
    //     $('.modal-title').html("<i class='fa fa-plus'></i> admin Admission");
    //     $('#action').val('addadmin');
    //     $('#save').val('Save');
    // });
    //
    // $(document).on('submit','#adminForm', function(event){
    //     event.preventDefault();
    //     $('#save').attr('disabled','disabled');
    //     $.ajax({
    //         url:"action.php",
    //         method:"POST",
    //         data: new FormData(this),
    //         processData: false,
    //         contentType: false,
    //         success:function(data){
    //             $('#adminForm')[0].reset();
    //             $('#adminModal').modal('hide');
    //             $('#save').attr('disabled', false);
    //             adminData.ajax.reload();
    //         }
    //     })
    // });
    //
    // $(document).on('click', '.update', function(){
    //     var adminid = $(this).attr("id");
    //     var action = 'getadminDetails';
    //     $.ajax({
    //         url:'action.php',
    //         method:"POST",
    //         data:{adminid:adminid, action:action},
    //         dataType:"json",
    //         success:function(data){
    //             $('#adminModal').modal('show');
    //             $('#adminid').val(data.id);
    //             $('#sname').val(data.name);
    //             if(data.gender == 'male') {
    //                 $('#male').prop("checked", true);
    //             } else if(data.gender == 'female') {
    //                 $('#female').prop("checked", true);
    //             }
    //             $('#dob').val(data.dob);
    //             $('#mobile').val(data.mobile);
    //             $('#registerNo').val(data.admission_no);
    //             $('#rollNo').val(data.roll_no);
    //             $('#year').val(data.academic_year);
    //             $('#admission_date').val(data.admission_date);
    //             $('#classid').val(data.class);
    //             $('#sectionid').val(data.section);
    //             $('#email').val(data.email);
    //             $('#address').val(data.current_address);
    //             $('#fname').val(data.father_name);
    //             $('#mname').val(data.mother_name);
    //             $('.modal-title').html("<i class='fa fa-plus'></i> Edit admin");
    //             $('#action').val('updateadmin');
    //             $('#save').val('Save');
    //         }
    //     })
    // });

    // $(document).on('click', '.delete', function(){
    //     var adminid = $(this).attr("id");
    //     var action = "deleteadmin";
    //     if(confirm("Are you sure you want to delete this admin?")) {
    //         $.ajax({
    //             url:"action.php",
    //             method:"POST",
    //             data:{adminid:adminid, action:action},
    //             success:function(data) {
    //                 adminData.ajax.reload();
    //             }
    //         })
    //     } else {
    //         return false;
    //     }
    // });



});