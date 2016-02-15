<div class="col-xs-12">


    <div class="box">
        <div class="box-header">
            <h3 class="box-title">PS MEMBERS LIST</h3>
        </div><!-- /.box-header -->
        <!--        <div class="row">
                    <span id="add" class="pull-right" style="margin-right: 30px;"><button class="btn btn-success btn-small" 
                                                              id="addpsdetails"><i class="fa fa-plus-circle"></i> Add New PS</button></span>
                </div>-->
        <div class="box-body">
            <table class="table table-striped table-bordered table-hover" id="example2">
                <thead>
                    <tr>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    </tr>
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div><!-- /.box-body -->
        <div id="ps_addition" style="display: none;">
            <div class="">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <strong><u>NEW PS DETAILS</u></strong>
                    </div>

                    <div class="panel-body">

                        <form role="form" id="newPSForm">
                            <div class="form-group input-group">
                                <span class="input-group-addon">@PS ID Number</span>
                                <input type="text" class="form-control" placeholder="e.g 001" name="ps_number" id="ps_number" readonly/>
                            </div>

                            <div class="form-group">
                                <label>IP mask:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-laptop"></i>
                                    </div>
                                    <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask  name="ps_ip_address">
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->


                            <!--                            <div class="form-group input-group">
                                                            <span class="input-group-addon">@PS IP Address</span>
                                                            <input type="text" class="form-control" placeholder="e.g 192.168.0.11" value="192.168.0.xx"
                                                                   name="ps_ip_address">
                                                        </div>-->
                            <button type="button" class="btn btn-primary" id="savePSDetails">Save PS Details
                            </button>
                            <button type="reset" class="btn btn-warning">Cancel OP</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
        <div class="row" style="display: none;" id="session_ticket">

            <style type="text/css">
                .tg  {border-collapse:collapse;border-spacing:0;border-color:#999;border:none;}
                .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#999;color:#444;background-color:#F7FDFA;}
                .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#999;color:#fff;background-color:#26ADE4;}
                .tg .tg-yw4l{vertical-align:top;font-weight: bolder;}
                .tg .tg-6k2t{background-color:#D2E4FC;vertical-align:top}
            </style>

            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong><u>PLAY TIME TICKET FOR PS NO: <span id="ps_no"></span></u></strong>
                </div>

                <div class="panel-body">
                    <form id="session_ticket_form">
                        <table class="tg">
                            <tr>
                                <th class="tg-yw4l" colspan="2">Today: <?php echo date("l jS \of F Y h:i:s A"); ?></th>
                            </tr>
                            <tr>
                            <input type="hidden" name="s_ps_no_i" id="s_ps_no_i"/>

                            <td class="tg-yw4l">PS SESSION START:</td>
                            <td class="tg-6k2t"><span id="s_start"></span>
                                <input type="hidden" name="s_start_i" id="s_start_i"/>
                            </td>
                            </tr>
                            <tr>
                                <td class="tg-yw4l">PS SESSION END:</td>
                                <td class="tg-6k2t"><span id="s_end"></span>
                                    <input type="hidden" name="s_end_i" id="s_end_i">
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-yw4l">PS GAMEPLAY DURATION:</td>
                                <td class="tg-6k2t"><span id="s_duration"></span> 
                                    <input type="hidden" name="s_duration_i" id="s_duration_i">
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-yw4l">AMOUNT OWED(KES):</td>
                                <td class="tg-6k2t" ><span id="s_amount"></span>
                                    <input type="hidden" name="s_amount_i" id="s_amount_i">
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-yw4l"></td>
                                <td class="tg-6k2t"></td>
                            </tr>
                            <tr>
                                <td class="tg-yw4l">TICKET No:</td>
                                <td class="tg-6k2t"><input type="text" name="ticket_no" value="<?php echo date('dmYHis'); ?>" readonly/></td>
                            </tr>
                            <tr>
                                <td> <button type="button" class="btn btn-primary" id="print_ticket">Print Ticket</button></td>
                                <td> <button type="reset" class="btn btn-warning" id="close_ticket">Close Ticket</button></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>

    </div><!-- /.box -->
</div><!-- /.col -->

<style>

    #myModal {
        top:150px;
        background: transparent !important;
    }
</style>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm modal-primary">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Member Edit</h4>
            </div>
            <div class="modal-body">
                <form id="EditClientForm">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="rname" placeholder="Name" id="name">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="rphone" placeholder="Phone" id="phone">
                        <span class="glyphicon glyphicon-phone form-control-feedback" ></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" name="remail" placeholder="Email" id="email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>

                    <div class="form-group">
                        <label>Minimal</label>
                        <select class="form-control select2" id="mselect" style="width: 100%;" name="rrole">
                            <?php foreach ($mlevels as $l): ?>
                                <option value="<?php echo $l->id ?>"><?php echo $l->level ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div><!-- /.form-group -->


            </div>

            </form>
        </div>
        <div class="modal-footer ">
            <div class="btn-group">
                <a href="#" class="btn btn-success EditUser" id="EditUser">Edit</a>
                <a href="#" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-sm modal-info">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">PURCHASE TOKENS</h4> for<br>
                <h4>Account: <span id="account"></span></h4>
            </div>
            <div class="modal-body">
                <input type="hidden" class="form-control" name="user_id" id="user_id">
                <input type="hidden" class="form-control" name="user_name" id="user_name">

                <form id="ButTokenForm">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="token_minutes" placeholder="Enter token minutes" id="token_minutes">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>  
                </form>
            </div>


        </div>
        <div class="modal-footer ">
            <div class="btn-group">
                <a href="#" class="btn btn-success" id="BuyToken">Buy</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-sm modal-danger">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">REMOVE  TOKENS</h4> for<br>
                <h4>Account: <span id="account1"></span></h4>
            </div>
            <div class="modal-body">
                <input type="hidden" class="form-control" name="user_id1" id="user_id1">
                <input type="hidden" class="form-control" name="user_name1" id="user_name1">

                <form id="RemTokenForm">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="token_minutes1" placeholder="Enter token minutes" id="token_minutes1">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>  
                </form>
            </div>


        </div>
        <div class="modal-footer ">
            <div class="btn-group">
                <a href="#" class="btn btn-success" id="RemoveToken">Remove</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        getData();
        $(".select2").select2();
        var host = window.location.protocol + '//' + window.location.host + '/';
        $(document).on('click', ".assign_ps", function () {
            id = $(this).attr('id');
            $('.EditUser').prop('id', id);
            $.getJSON("<?php echo base_url() . 'ps/getUsersById/'; ?>" + id, function (member) {
                $.each(member, function (i, data) {
                    $('#name').val(data.uacc_username);
                    $('#phone').val(data.uacc_phone);
                    $('#email').val(data.uacc_email);
                    $("#mselect option[value=" + data.level + "]").prop('selected', true);
                });

            })


        })

        $(document).on('click', '.EditUser', function () {
            $(this).prop('value', 'Updating..')
            $(this).prop('disabled', 'true')
            $id = $(this).attr('id');
            updateUser($id);
        })
        $(document).on('click', '.token_ps', function () {
            $id = $(this).attr('id');
            $name = $(this).attr('data-name');
            $('#user_id').val($id);
            $('#user_name').val($name);
            $('#account').text($name);
            $('#myModal1').modal('show');
        })
        
          $(document).on('click', '.rem_token_ps', function () {
            $id = $(this).attr('id');
            $name = $(this).attr('data-name');
            $('#user_id1').val($id);
            $('#user_name1').val($name);
            $('#account1').text($name);
            $('#myModal2').modal('show');
        })




        $(document).on('click', '.delete_ps', function () {
            $id = $(this).attr('id');
            deletePS($id);



            /* $.prompt("This PS Details will be deleted permanently, Do you want to continue?", {
             title: "DELETE PS No " + $id,
             buttons: {"Yes, Delete": true, "No, Lets Wait": false},
             focus: 1,
             submit: function (e, v, m, f) {
             
             if (v === true) {
             $.post("<?php echo base_url() . 'ps_gaming/delete_ps/'; ?>" + $id, function () {
             $.notify('PS No: ' + $id + ' has been succesfully deleted from the registry', 'success')
             })
             } else {
             $.prompt.close();
             }
             
             }
             });*/

        });


        function deletePS(id) {
            swal({
                title: "DELETE USER RECORDS",
                text: "USER Details will be deleted permanently, including all his gameplay discount achievements. Do you want to continue?",
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: false,
                confirmButtonText: "Yes, delete it!",
                confirmButtonColor: "#ec6c62"
            }, function () {
                $.ajax({
                    url: "<?php echo base_url() . 'ps_gaming/delete_user/'; ?>" + id,
                    type: "DELETE"
                })
                        .done(function (data) {

                            swal("Deleted!", "USER ID :" + id + " records is successfully deleted!", "success");
                            $('#example2').dataTable().fnDestroy();
                            getData();
                        })
                        .error(function (data) {
                            swal("Oops", "We couldn't connect to the server!", "error");
                        });
            });
        }

        function updateUser(id) {

            $.ajax({
                url: "<?php echo base_url() . 'ps/doUserUpdate/'; ?>" + id,
                type: "post",
                data: $('#EditClientForm').serialize()
            })
                    .done(function (data) {
                        $('#myModal').modal('toggle');
                        swal("UPDATE SUCCESS!", "USER ID :" + id + " record is successfully updated!", "success");
                        $('#example2').dataTable().fnDestroy();
                        getData();
                    })
                    .error(function (data) {
                        swal("Oops", "We couldn't connect to the server!", "error");
                    });

        }






        $('#savePSDetails').click(function () {

            $.ajax({
                url: "<?php echo base_url() . 'ps_gaming/savePS'; ?>",
                data: $('#newPSForm').serialize(),
                type: 'POST',
                success: function () {

                    $.notify('PS No' + $("#ps_number").val() + " Has been successfully Added", "success");

                },
                error: function (error) {
                    console.log(error);
                    swal("Oops", "We couldn't connect to the server!", "error");
                }
            });
        });



        $('#BuyToken').click(function () {
            id = $('#user_id').val();
            user_name = $('#user_name').val();
            token = $('#token_minutes').val();

            if ($('#token_minutes').val() === '') {
                $('#token_minutes').css('border', 'solid red 1px');
                $('#token_minutes').prop('placeholder', 'required!');
                $.notify("Token box cannot be blank!", "error");

                return false;
            } else if (!isNumber($('#token_minutes').val())) {
                $('#token_minutes').css('border', 'solid red 1px');
                $('#token_minutes').prop('placeholder', 'required!');
                $.notify("Enter only numbers in the token box!", "error");


                return false;
            } else {

                swal({
                    title: "CONFIRM TOKEN PURCHASE: ACCOUNT (" + user_name + ")",
                    text: "You are about to credit " + user_name + "'s Account with " + token + " Minutes, Do you want to continue?",
                    type: "info",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    confirmButtonText: "Yes, Do it!",
                    confirmButtonColor: "#ec6c62"
                }, function () {
                    $.ajax({
                        url: "<?php echo base_url() . 'ps/credit_account/'; ?>" + id,
                        type: "post",
                        data:$('#ButTokenForm').serialize()
                    })
                            .done(function (data) {
                                $('#myModal1').modal('hide');
                                swal("Great!", "Token purchase was successful!", "success");
                                $('#example2').dataTable().fnDestroy();
                        getData();
                            })
                            .error(function (data) {
                                swal("Oops", "We couldn't connect to the server!", "error");
                            });
                });
            }
        });


       $('#RemoveToken').click(function () {
            id = $('#user_id1').val();
            user_name = $('#user_name1').val();
            token = $('#token_minutes1').val();

            if ($('#token_minutes1').val() === '') {
                $('#token_minutes1').css('border', 'solid red 1px');
                $('#token_minutes1').prop('placeholder', 'required!');
                $.notify("Token box cannot be blank!", "error");

                return false;
            } else if (!isNumber($('#token_minutes1').val())) {
                $('#token_minutes1').css('border', 'solid red 1px');
                $('#token_minutes1').prop('placeholder', 'required!');
                $.notify("Enter only numbers in the token box!", "error");


                return false;
            } else {

                swal({
                    title: "CONFIRM TOKEN REMOVAL: ACCOUNT (" + user_name + ")",
                    text: "You are about to debit " + user_name + "'s Account with " + token + " Minutes, Do you want to continue?",
                    type: "info",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    confirmButtonText: "Yes, Do it!",
                    confirmButtonColor: "#ec6c62"
                }, function () {
                    $.ajax({
                        url: "<?php echo base_url() . 'ps/debit_account/'; ?>" + id,
                        type: "post",
                        data:$('#RemTokenForm').serialize()
                    })
                            .done(function (data) {
                                $('#myModal2').modal('hide');
                                swal("Great!", "Token purchase was successful!", "success");
                                $('#example2').dataTable().fnDestroy();
                        getData();
                            })
                            .error(function (data) {
                                swal("Oops", "We couldn't connect to the server!", "error");
                            });
                });
            }
        });



        $('#close_ticket').click(function () {
            $.fancybox.close();
        });














        function getData() {

            if (typeof rtable == 'undefined') {
                var rtable = $('#example2').DataTable({
                    "bJQueryUI": true,
                    "scrollX": true,
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "order": [[1, "asc"]],
                    "aoColumns": [
                        {"sTitle": "id", "mData": "uacc_id", "visible": false, "bSortable": true},
                        {"sTitle": "Username", "mData": "uacc_username"},
                        {"sTitle": "E-mail", "mData": "uacc_email"},
                        {"sTitle": "Phone", "mData": "uacc_phone"},
                        {"sTitle": "Level", "mData": "level"},
                        {"sTitle": "Date_Added", "mData": "uacc_date_added"},
                        {"sTitle": "Token (Mins)", "mData": "token"},
                        {"sTitle": "Action", "mData": "uacc_id",
                            "mRender": function (data, type, row) {
                                return '<button class=\"btn btn-small btn-danger delete_ps\" id=' + data + ' >Delete User</button>\n\
                                                \n\<button class=\"btn btn-small btn-warning token_ps\" id=' + data + ' data-name=\"' + row.uacc_username + '\">Buy Tokens</button>\n\
                                               \n\<button class=\"btn btn-small btn-warning rem_token_ps\" id=' + data + ' data-name=\"' + row.uacc_username + '\">- Tokens</button>\n\
                                        <button class=\"btn btn-small btn-info assign_ps\" id=' + data + ' data-toggle="modal" data-target="#myModal">Edit User </button>';
                            }

                        },
                    ],
                    "bDeferRender": true,
                    "bProcessing": true,
                    "bDestroy": true,
                    "bLengthChange": true,
                    "bStateSave": true,
                    "iDisplayLength": 10,
                    "sAjaxDataProp": "",
                    "sAjaxSource": "<?php echo base_url() . 'ps/getUsers/'; ?>",
                });

            } else {
                rtable.fnDraw();
            }


        }

        function isNumber(n) {
            return !isNaN(+n) && isFinite(n);
        }
    });


</script>

