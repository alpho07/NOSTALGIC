<style>
    .token{
        font-weight: bolder;
        color:blue;
        font-size: 20px;
    }
</style>
<div class="col-xs-12">


    <div class="box">
        <div class="box-header">
            <h3 class="box-title">PS ACTIVITY STATION</h3>
        </div><!-- /.box-header -->
        <div class="row">
            <span id="add" class="pull-right" style="margin-right: 30px;"><button class="btn btn-success btn-small" 
                                                                                  id="addpsgame"><i class="fa fa-plus-circle"></i> Add Game</button></span>
            <span id="add" class="pull-right" style="margin-right: 30px;"><button class="btn btn-success btn-small" 
                                                                                  id="addpsdetails"><i class="fa fa-plus-circle"></i> Add New PS</button></span>

        </div>
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
                                    <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask  name="ps_ip_address" id="ps_ip_address">
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

        <div id="ps_game_addition" style="display: none;">
            <div class="">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <strong><u>NEW GAME</u></strong>
                    </div>

                    <div class="panel-body">

                        <form role="form" id="newGameForm">
                            <div class="form-group input-group">
                                <span class="input-group-addon">@Game Name</span>
                                <input type="text" class="form-control" placeholder="e.g Fifa 16" name="game_name" id="game_name" />
                            </div>


                            <button type="button" class="btn btn-primary" id="saveGame">Save Game
                            </button>
                            <button type="reset" class="btn btn-warning">Cancel </button>
                        </form>
                    </div>
                </div>


            </div>
        </div>

        <div class="row col-xs-12" style="display:none;" id="session_ticket">

            <style type="text/css">
                .tg  {border-collapse:collapse;border-spacing:0;border-color:#999;border:none;}
                .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#999;color:#444;background-color:#F7FDFA;}
                .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#999;color:#fff;background-color:#26ADE4;}
                .tg .tg-yw4l{vertical-align:top;font-weight: bolder;}
                .tg .tg-6k2t{background-color:#D2E4FC;vertical-align:top}
            </style>

            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong><u>PLAY TIME TICKET FOR PS NO: <span id="ps_no"><br></span> - ACCOUNT NAME: <span id="ps_acc"></span></u></strong>

                </div>


                <div class="panel-body">
                    <form id="session_ticket_form">
                        <table class="tg">
                            <tbody>
                                <tr>
                                    <th class="tg-yw4l" colspan="2">Today: <?php echo date("l jS \of F Y h:i:s A"); ?></th>
                                </tr>
                                <tr>
                            <input type="hidden" name="uid" id="uid"/>
                            <input type="hidden" name="gid" id="gid"/>
                            <input type="hidden" name="ps_palyer" id="ps_palyer"/>
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
                                <td class="tg-yw4l">MEMBER RATE(KES):</td>
                                <td class="tg-6k2t"><span id="s_rate"></span> 
                                    <input type="hidden" name="s_rate_i" id="s_rate_i">
                                </td>
                            </tr>
                             <tr>
                                <td class="tg-yw4l">TOKEN(MINS):</td>
                                <td class="tg-6k2t" ><span id="s_token"></span>
                                    <input type="hidden" name="s_token_i" id="s_token_i">
                                </td>
                            </tr>
                              <tr>
                                <td class="tg-yw4l">TOKEN COST(KES):</td>
                                <td class="tg-6k2t" ><span id="s_token_k"></span>
                                    <input type="hidden" name="s_token_ki" id="s_token_ki">
                                </td>
                            </tr>
                             <tr>
                                <td class="tg-yw4l">TOKEN BAL(MINS):</td>
                                <td class="tg-6k2t" ><span id="s_token_kb"></span>
                                    <input type="hidden" name="s_token_kib" id="s_token_kib">
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
                                <td class="tg-6k2t"><input type="text" style="border:white;" name="ticket_no" value="<?php echo date('dmYHis'); ?>" readonly/></td>
                            </tr>
                            </tbody>
                            <tfoot>
                                <tr><td colspan="2">
                                        <?php echo $sys_name[0]->sys_name . ' PS Gaming | ' . $sys_name[0]->phone; ?> &COPY; <?php echo date('Y'); ?>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </form>
                    <tr>
                    <button type="button" class="btn btn-primary" id="print_ticket">Print Ticket</button>
                    <button type="reset" class="btn btn-warning" id="close_ticket">Close Ticket</button>

                </div>
            </div>

        </div>


    </div><!-- /.box -->
</div><!-- /.col -->

<style>

    #myModal {

        background: transparent !important;
    }
</style>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm modal-success">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Assigning PS No <span id="pno"></span> to <span id="pl_yer">player</span></h4>
            </div>
            <div class="modal-body">
                <form id="EditClientForm">


                    <input type="hidden" class="form-control" disabled placeholder="Name" id="ps_id">



                    <input type="hidden" class="form-control" disabled placeholder="Phone" id="ps_name">


                    <input type="hidden" class="form-control" disabled id="last_online">

                    <div class="form-group">
                        <label>Member/Guest</label>
                        <select class="form-control select2" id="mplayer" style="width: 100%;" name="uid">
                            <option value="">-Select User-</option>
                            <?php foreach ($musers as $u): ?>
                                <option value="<?php echo $u->uacc_id ?>"><?php echo $u->uacc_username ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div><!-- /.form-group -->
                    <div class="form-group has-feedback">
                        <label >Available Tokens</label>
                        <input type="text" class="form-control" readonly id="av_toc" name="av_toc">
                        <span class="glyphicon glyphicon-phone form-control-feedback" ></span>
                    </div>
                    <!--                      <div class="form-group has-feedback">
                                            <label >Action</label>
                                            <input type="text" class="form-control" readonly id="token_action" name="token_action">
                    
                                        </div>-->
                    <div class="form-group">
                        <label>Action</label>
                        <select class="form-control select2" id="token_action" style="width: 100%;" name="token_action">
                            <option value="">-Action-</option>
                            <option value="Redeem">Redeem</option>
                            <option value="Buy">Buy</option>
                        </select>
                    </div>   
                    <div class="form-group has-feedback">
                        <label >Bought or redeemed tokens</label>
                        <input type="text" class="form-control"  id="b_o_r" name="b_o_r">
                        <span class="glyphicon glyphicon-phone form-control-feedback" ></span>
                    </div>

                    <div class="form-group">
                        <label>Game</label>
                        <select class="form-control select2" id="mgame" style="width: 100%;" name="gid">
                            <option value="">-Select Player-</option>
                            <?php foreach ($mgames as $m): ?>
                                <option value="<?php echo $m->id ?>"><?php echo $m->game_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div><!-- /.form-group -->


            </div>

            </form>
        </div>
        <div class="modal-footer ">
            <div class="btn-group">
                <a href="#start-ps-user!session123" class="btn btn-success EditUser" id="EditUser">Start Session</a>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>plugins/select2/select2.full.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.EditUser').hide();
        $("[data-mask]").inputmask();
        $(".select2").select2();
        var host = window.location.protocol + '//' + window.location.host + '/';
        $(document).on('click', ".assign_ps", function () {
            $('.EditUser').hide();
            id = $(this).attr('id');
            $('.EditUser').prop('id', id);
            $.getJSON("<?php echo base_url() . 'ps_gaming/getPSStatusById/'; ?>" + id, function (member) {
                $('#ps_id').val('');
                $('#pno').text('player');
                $('#ps_name').val('');
                $('#last_online').val('');
                $('#av_toc').val('');
                //  $('#token_action').val('');
                $('#b_o_r').val('');
                $.each(member, function (i, data) {
                    $('#ps_id').val(data.id);
                    $('#pno').text(data.id);
                    $('#ps_name').val(data.ip_addr);
                    $('#last_online').val(data.end_time);
                    $('#mplayer').prop('selectedIndex', 0);
                    $('#mgame').prop('selectedIndex', 0);
                });
               

            })


        });

        $('#mplayer').change(function () {
              $('.EditUser').hide();
            value = $('option:selected', this).text();
            value1 = $('option:selected', this).val();
            token_select = $('#token_action');



            $('#pl_yer').text(value);
            $.getJSON("<?php echo base_url() . 'ps_gaming/get_token/'; ?>" + value1, function (token) {
                token = parseInt(token[0].token);
                $('#av_toc').val(token);
                  $('.EditUser').show();




            })
        })

        $(document).on('click', "#print_ticket", function () {
            var divContents = $("#session_ticket_form").html(); //find the specific tag to be printed
            var printWindow = window.open('', '', 'height=400,width=400'); //open a small window
            printWindow.document.write(divContents); //append the tag to the contents
            printWindow.document.close(); //close the writer
            printWindow.print();//execute print, print to any format from the popup, pdf, printer etc
        });

        $("#addpsdetails").click(function () {
            $.getJSON("<?php echo base_url() . 'ps_gaming/get_last_number'; ?>", function (last_number) {
                last = parseInt(last_number[0].ps_no)
                new_no = last + 1;
                $('#ps_number').val(new_no);
            })

            $.fancybox({
                href: "#ps_addition"
            })
        })

        $('#addpsgame').click(function () {
            $.fancybox({
                href: "#ps_game_addition"
            });
        });


        $(document).on('click', '.EditUser', function () {
            $(this).prop('value', 'Updating..')
            $(this).prop('disabled', 'true')
            $id = $(this).attr('id');
            updateUser($id);
        })


        function updateUser(id) {

            if ($('#mplayer').val() === '') {
                $('#mplayer').css('border', 'solid red 1px');
                $('#mplayer').prop('placeholder', 'required!');
                $.notify("Member/Guest (Player) Cannot be left blank!", "error");

                return false;
            } else if ($('#mgame').val() === '') {
                $('#mgame').css('border', 'solid red 1px');
                $('#mgame').prop('placeholder', 'required!');
                $.notify("Game cannot be left blank!", "error");


                return false;
            } else if ($('#b_o_r').val() === '') {
                $('#b_o_r').css('border', 'solid red 1px');
                $('#b_o_r').prop('placeholder', 'required!');
                $.notify("Token box cannot be left blank!", "error");


                return false;
            }  else if ($('#token_action').val() === '') {
                $('#token_action').css('border', 'solid red 1px');
                $('#token_action').prop('placeholder', 'required!');
                $.notify("Token Action must be selected!", "error");


                return false;
            } else if ($('#token_action').val() == 'Redeem' && $('#b_o_r').val() < 10) {
                $('#b_o_r').css('border', 'solid red 1px');
                $('#b_o_r').prop('placeholder', 'invalid!');
                $.notify("Token to be redeemed is only 10 at a time not less!", "error");


                return false;
            } else if ($('#token_action').val() == 'Redeem' && $('#b_o_r').val() > 10) {
                $('#b_o_r').css('border', 'solid red 1px');
                $('#b_o_r').prop('placeholder', 'invalid!');
                $.notify("Token to be redeemed is only 10 at a time not more!", "error");


                return false;
            } else if ($('#token_action').val() == 'Redeem' && $('#av_toc').val() < 10) {
                $('#b_o_r').css('border', 'solid red 1px');
                $('#b_o_r').prop('placeholder', 'invalid!');
                $.notify("Insufficient redeemable tokens", "error");


                return false;
            } else if ($('#token_action').val() == 'Buy' && $('#b_o_r').val() < 10) {
                $('#b_o_r').css('border', 'solid red 1px');
                $('#b_o_r').prop('placeholder', 'invalid!');
                $.notify("Minimum token to be bought is 10 ", "error");


                return false;
            } else if (!isNumber($('#b_o_r').val())) {
                $.notify("Only enter numbers for tokens!", "error");


                return false;
            } else {
                $(this).prop('disabled', true);
                $(this).prop('value', 'Assigning..');
                $.ajax({
                    url: "<?php echo base_url() . 'ps/doAssignment/'; ?>" + id,
                    type: "post",
                    data: $('#EditClientForm').serialize()
                })
                        .done(function (data) {
                            $('#myModal').modal('toggle');
                            swal("ASSIGNMENT SUCCESS!", "PS No. :" + id + " has been successfully Assigned!. The player is free to start a game", "success");
                            //  $('#example2').dataTable().fnDestroy();
                            // getData();
                        })
                        .error(function (data) {
                            swal("Oops", "We couldn't connect to the server!", "error");
                        });
            }

        }


        $(document).on('click', '.delete_ps', function () {
            $id = $(this).attr('id');
            deletePS($id);
        });

        $(document).on('click', '.unassign_ps', function () {
            $id = $(this).attr('id');
            $uid = $(this).attr('uid');
            $token = $(this).attr('token');
            unAssignPS($id, $uid, $token);
        });


        function deletePS(id) {
            $('.confirm').prop('value', 'please wailt...');
            swal({
                title: "DELETE PLAYSTATION RECORD",
                text: "This PS Details will be deleted permanently, Do you want to continue?",
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: false,
                confirmButtonText: "Yes, delete it!",
                confirmButtonColor: "#ec6c62"
            }, function () {
                $.ajax({
                    url: "<?php echo base_url() . 'ps_gaming/delete_ps/'; ?>" + id,
                    type: "DELETE"
                })
                        .done(function (data) {
                            swal("Deleted!", "PS ID :" + id + " records is successfully deleted!", "success");
                        })
                        .error(function (data) {
                            swal("Oops", "We couldn't connect to the server!", "error");
                        });
            });
        }


        function unAssignPS(id, uid, token) {

            swal({
                title: "UN-ASSIGN PS No. " + id,
                text: "This PS No. (" + 6 + ")  will be un-assigned and user tokens taken back to their account, Do you want to continue",
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: false,
                confirmButtonText: "Yes, Go ahead!",
                confirmButtonColor: "#ec6c62"
            }, function () {
                $.ajax({
                    url: "<?php echo base_url() . 'ps_gaming/unassign_ps/'; ?>" + id + '/' + uid + '/' + token + '/',
                    type: "post"
                })
                        .done(function (data) {
                            swal("Unassigned!", "PS ID :" + id + " has been successfully un-assigned!", "success");
                            $('#example2').dataTable().fnDestroy();
                            getData();
                        })
                        .error(function (data) {
                            swal("Oops", "We couldn't connect to the server!", "error");
                        });
            });
        }




        $('#savePSDetails').click(function () {
            if ($('#ps_number').val() === '') {
                $('#ps_number').css('border', 'solid red 1px');
                $('#ps_number').prop('placeholder', 'required!');
                return false;
            } else if ($('#ps_ip_address').val() === '') {
                $('#ps_ip_address').css('border', 'solid red 1px');
                $('#ps_ip_address').prop('placeholder', 'required!');
                return false;
            } else {
                $(this).prop('value', 'Please Wait..');
                $(this).prop('disabled', true);
                $.ajax({
                    url: "<?php echo base_url() . 'ps_gaming/savePS'; ?>",
                    data: $('#newPSForm').serialize(),
                    type: 'POST',
                    success: function () {
                        $.fancybox.close();
                        $.notify('PS No' + $("#ps_number").val() + " Has been successfully Added", "success");

                    },
                    error: function (error) {
                        console.log(error);
                        swal("Oops", "We couldn't connect to the server!", "error");
                    }
                });
            }
        });







        $('#saveGame').click(function () {
            if ($('#game_name').val() === '') {
                $('#game_name').css('border', 'solid red 1px');
                $('#game_name').prop('placeholder', 'required!');
                return false;
            } else {
                $(this).prop('Wait..');
                $.ajax({
                    url: "<?php echo base_url() . 'ps_gaming/saveGame'; ?>",
                    data: $('#newGameForm').serialize(),
                    type: 'POST',
                    success: function () {
                        $.fancybox.close();
                        $.notify($("#game_name").val() + " Has been successfully Added", "success");

                    },
                    error: function (error) {
                        console.log(error);
                        swal("Oops", "We couldn't connect to the server!", "error");
                    }
                });
            }
        });


        $('#close_ticket').click(function () {
            $.fancybox.close();
        });



    });




    $(document).ready(function () {
        getData();
        $cost = 0;
        setInterval(function () {
            
                     $.post("<?php echo base_url() . 'ps_gaming/run_check'; ?>", function (resp) {
                if (resp !== '') {
                    if (resp.toLowerCase().indexOf("on") >= 0) {
                        $.playSound("<?php echo base_url() . 'notification/connected'; ?>");
                        $.notify('PS No' + resp.replace(/on/g, '').replace(/"/g, '') + " is now online", "info");
                    } else {
                        $.playSound("<?php echo base_url() . 'notification/disconnected'; ?>");
                        $.notify('PS No' + resp.replace(/off/g, '').replace(/"/g, '') + " went offline", "warn");
                        $id = resp.replace(/off/g, '').replace(/"/g, '');

                        $.ajax({
                            type: "post",
                            url: "<?php echo base_url() . 'ps_gaming/get_session_ticket/'; ?>" + $id.replace(/ /g, '_'),
                            dataType: 'json',
                            success: function (session_tickets) {
                                $('#ps_no').text(session_tickets[0].ps_no);
                                $('#uid').val(session_tickets[0].uid);
                                $('#gid').val(session_tickets[0].gid);
                                $('#ps_acc').text(session_tickets[0].uacc_username);
                                $('#ps_palyer').val(session_tickets[0].uacc_username);
                                $('#s_rate_i').val(session_tickets[0].cost);
                                $('#s_rate').text(session_tickets[0].cost);
                                $('#s_token_i').val(session_tickets[0].token);
                                $('#s_token').text(session_tickets[0].token);
                                $tcost = parseFloat(session_tickets[0].token) * parseFloat(session_tickets[0].cost);

                                 $('#s_token_ki').val($tcost.toFixed(2));
                                $('#s_token_k').text($tcost.toFixed(2));
                                
                              $tbal = parseFloat(session_tickets[0].token) - parseFloat(session_tickets[0].dur);

                                
                                  $('#s_token_kib').val($tbal);
                                $('#s_token_kb').text($tbal.toFixed(2));
                                
                                $('#s_ps_no_i').val(session_tickets[0].ps_no);
                                $('#s_start').text(session_tickets[0].start_time);
                                $('#s_start_i').val(session_tickets[0].start_time);
                                $('#s_end').text(session_tickets[0].end_time);
                                $('#s_end_i').val(session_tickets[0].end_time);
                                $('#s_duration').text(session_tickets[0].dur + " Minutes");
                                $('#s_duration_i').val(session_tickets[0].dur);

                                $cost = parseFloat(session_tickets[0].dur) * parseFloat(session_tickets[0].cost);
                                $gcost = $cost - $tcost;
                                $new = $gcost.toFixed(2);
                                console.log($cost);
                                if (parseFloat(session_tickets[0].dur) <= 0) {

                                    $('#s_amount').text($new );
                                    $('#s_amount_i').val($new);
                                } else
                                if (session_tickets[0].dur > 0) {

                                    $('#s_amount').text($new + '/-');
                                    $('#s_amount_i').val($new);
                                } else {
                                    console.log('Nothing')
                                }

                                $.fancybox({
                                    href: "#session_ticket"
                                })

                                $.post("<?php echo base_url() . 'ps_gaming/save_costs/'; ?>", $('#session_ticket_form').serialize(), function () {

                                })

                            }, error: function () {
                            }
                        });


                    }
                } else {
                }
                // $("#dataTables-example").empty();
                $('#example2').dataTable().fnDestroy();
                getData();
            }).fail(function () {
                console.log('An error occured')
            })


        }, 10000);




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
                    {"sTitle": "id", "mData": "id", "visible": false, "bSortable": true},
                    {"sTitle": "PS No", "mData": "ps_no"},
                    {"sTitle": "IP Address", "mData": "ip_addr"},
                    {"sTitle": "Start Time", "mData": "start_time"},
                    {"sTitle": "End Time", "mData": "end_time"},
                    {"sTitle": "Member", "mData": "uacc_username"},
                    {"sTitle": "Game", "mData": "game_name"},
                    {"sTitle": "Token (Mins)", "sClass": "token", "mData": "dur",
                        "mRender": function (data, type, row) {

                            if (data == null) {
                                return "Session Active";
                            } else {
                                return data + '/' + row.token;
                            }

                        }
                    },
                    {"sTitle": "Status", "mData": "status",
                        "mRender": function (data, type, row) {
                            if (row.status == 0) {
                                return '<div class=\"alert alert-danger\">Offline</div>';
                            } else {
                                return '<div class=\"alert alert-success\">Online</div>';
                            }
                        }

                    },
                    /* {"sTitle": "Amount(KES)", "mData": "amount_owed",
                     "mRender": function (data, type, row) {
                     standard_time = parseFloat(10);
                     if (parseFloat(row.dur) <= 0) {
                     return "00.00";
                     } else
                     if (row.dur > 0 && row.dur < standard_time) {
                     return "20.00";
                     } else {
                     standard_rate = parseFloat(20);
                     rate = parseFloat(3);
                     time = parseFloat(row.dur) - standard_time;
                     extra_charge = rate * time;
                     total_amount = extra_charge + standard_rate;
                     return total_amount.toFixed(2);
                     }
                     
                     }
                     },*/
                    {"sTitle": "Action", "mData": "id",
                        "mRender": function (data, type, row) {
                            if (row.status == 0 && row.assign_status == 0) {
                                return '<div class="btn-group-vertical">\n\
                                         <a href="#Delete-ps" class=\"delete_ps\"  id=' + data + ' "><i class="fa fa-circle-o text-red"></i> <span>Delete</span></a><br>\n\
                                        <a href="#Assign-ps" class=\"assign_ps\"  id=' + data + ' data-toggle="modal" data-target="#myModal"><i class="fa fa-circle-o text-green"></i> <span>Assign</span></a></div>';
                            } else if (row.status == 0 && row.assign_status == 1) {
                                return '\n\
                                         <a href="#Un-Assign-ps" class=\"unassign_ps\"  id=' + data + ' uid=' + row.uid + ' token=' + row.token + '><i class="fa fa-circle-o text-yellow"></i> <span>Un-Assign</span></a><br>';
                            } else {
                                return ' <a href="#Add-token-ps" class=\"addtoken_ps\"  id=' + data + ' "><i class="fa fa-circle-o text-blue"></i> <span>No Action</span></a>';
                            }
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
                "sAjaxSource": "<?php echo base_url() . 'ps_gaming/getPSStatus/'; ?>",
            });
        } else {
            rtable.fnDraw();
        }


    }

    function isNumber(n) {
        return !isNaN(+n) && isFinite(n);
    }


</script>

