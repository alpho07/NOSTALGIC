<div class="col-xs-12">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">PS CASH COUNTER </h3> 
                FILTER: <select id="filter">
                <option value="today">Today</option>
                 <option value="all">All</option>

            </select>
            <div class="pull-right">
                <span class="btn-primary">
                    SALES TODAY : <strong><?php echo $dailycost[0]->all_sales;?></strong> Bob
                </span>
                <span style="width: 20px;">&nbsp;</span>
                <span class="btn-success">
                    ALL TIME SALES: <strong><?php echo $totalcost[0]->all_sales;?></strong> Bob
                </span>
            </div>
        </div><!-- /.box-header -->
<!--        <div class="row">
            <span id="add" class="pull-right" style="margin-right: 30px;"><button class="btn btn-success btn-small" 
                                                                                  id="addpsgame"><i class="fa fa-plus-circle"></i> Add Game</button></span>
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
                    <tr></tr>
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

        <div class="row" style="display: none;" id="session_ticket">

            <style type="text/css">
                .tg  {border-collapse:collapse;border-spacing:0;border-color:#999;border:none;}
                .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#999;color:#444;background-color:#F7FDFA;}
                .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#999;color:#fff;background-color:#26ADE4;}
                .tg .tg-yw4l{vertical-align:top;font-weight: bolder;}
                .tg .tg-6k2t{background-color:#D2E4FC;vertical-align:top}
                .data_row{
                    text-align: right;
                    font-weight: bold;
                }
            </style>

            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong><u>PLAY TIME TICKET FOR PS NO: <span id="ps_no"></span> - ACCOUNT NAME: <span id="ps_acc"></span></u></strong>

                </div>
             

                <div class="panel-body">
                    <form id="session_ticket_form">
                        <table class="tg">
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
                                <td class="tg-yw4l">MEMBER RATE:</td>
                                <td class="tg-6k2t"><span id="s_rate"></span> 
                                    <input type="hidden" name="s_rate_i" id="s_rate_i">
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

        background: transparent !important;
    }
</style>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm modal-success">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Assigning PS to player</h4>
            </div>
            <div class="modal-body">
                <form id="EditClientForm">
                    <label >PS No.</label>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" disabled placeholder="Name" id="ps_id">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label >PS IP Address</label>
                        <input type="text" class="form-control" disabled placeholder="Phone" id="ps_name">
                        <span class="glyphicon glyphicon-phone form-control-feedback" ></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label >Last Online</label>
                        <input type="text" class="form-control" disabled id="last_online">
                        <span class="glyphicon glyphicon-phone form-control-feedback" ></span>
                    </div>
                    <div class="form-group">
                        <label>Member/Guest</label>
                        <select class="form-control select2" id="mplayer" style="width: 100%;" name="uid">
                            <?php foreach ($musers as $u): ?>
                                <option value="<?php echo $u->uacc_id ?>"><?php echo $u->uacc_username ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label>Game</label>
                        <select class="form-control select2" id="mgame" style="width: 100%;" name="gid">
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
                <a href="#" class="btn btn-success EditUser" id="EditUser">Start Session</a>
                <a href="#" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>plugins/select2/select2.full.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {      
        
        
        $("[data-mask]").inputmask();
        $(".select2").select2();
        
        
               var url ='getAllInvoicesToday';
         var url1 ='getAllInvoices';
            getData(url);
        $('#filter').change(function(){
            value = $(this).val();
            if(value==='all'){
                  $('#example2').dataTable().fnDestroy();
                    getData(url1);
            }else{
                     $('#example2').dataTable().fnDestroy();
                     getData(url); 
            }
        });
        
        var host = window.location.protocol + '//' + window.location.host + '/';
        $(document).on('click', ".assign_ps", function () {
            id = $(this).attr('id');
            $('.EditUser').prop('id', id);
            $.getJSON("<?php echo base_url() . 'ps_gaming/getPSStatusById/'; ?>" + id, function (member) {
                $.each(member, function (i, data) {
                    $('#ps_id').val(data.id);
                    $('#ps_name').val(data.ip_addr);
                    $('#last_online').val(data.end_time);
                });

            })


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


        $(document).on('click', '.delete_ps', function () {
            $id = $(this).attr('id');
            $id_t = $(this).attr('data-ticket');
            clearPlayer($id,$id_t);



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


        function clearPlayer(id,ticket_no) {
            swal({
                title: "PAYMENT CONFIRMATION : TICKET NO. "+ticket_no,
                text: "This will clear this bill and mark it as paid, Do you want to continue?",
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: false,
                confirmButtonText: "Yes, clear bill!",
                confirmButtonColor: "#ec6c62"
            }, function () {
                $.ajax({
                    url: "<?php echo base_url() . 'ps_gaming/clear_player/'; ?>" + id,
                    type: "DELETE"
                })
                        .done(function (data) {
                            swal("PAID!", "Gaming ticket : " + ticket_no + " bill has successfully been cleared and marked as PAID!!", "success");
                     $('#example2').dataTable().fnDestroy();
                      getData(url);
                        })
                        .error(function (data) {
                            swal("Oops", "We couldn't connect to the server!", "error");
                        });
            });
        }





        $('#savePSDetails').click(function () {

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
        });







        $('#saveGame').click(function () {
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
        });


        $('#close_ticket').click(function () {
            $.fancybox.close();
        });



    });




    $(document).ready(function () {
     
        $cost = 0;
     /*   setInterval(function () {

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
                                $('#s_ps_no_i').val(session_tickets[0].ps_no);
                                $('#s_start').text(session_tickets[0].start_time);
                                $('#s_start_i').val(session_tickets[0].start_time);
                                $('#s_end').text(session_tickets[0].end_time);
                                $('#s_end_i').val(session_tickets[0].end_time);
                                $('#s_duration').text(session_tickets[0].dur + " Minutes");
                                $('#s_duration_i').val(session_tickets[0].dur);

                                $cost = parseFloat(session_tickets[0].dur) * parseFloat(session_tickets[0].cost);
                                console.log($cost);
                                if (parseFloat(session_tickets[0].dur) <= 0) {

                                    $('#s_amount').text($cost + '.00/-');
                                    $('#s_amount_i').val($cost);
                                } else
                                if (session_tickets[0].dur > 0) {

                                    $('#s_amount').text($cost + '.00/-');
                                    $('#s_amount_i').val($cost);
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


        }, 10000);*/




    });


    function getData(url) {

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
                    {"sTitle": "Start Time", "mData": "start_time"},
                    {"sTitle": "End Time", "mData": "end_time"},
                    {"sTitle": "Member", "mData": "uacc_username"},
                    {"sTitle": "Game", "mData": "game_name"},
                      {"sTitle": "Token Redeemed / Bought", "mData": "token"},
                    {"sTitle": "Duration Token Used", "mData": "dur",
                        "mRender": function (data, type, row) {

                            if (data == null) {
                                return "Session Active";
                            } else {
                                return data + ' Mins';
                            }

                        }
                    },
                    {"sTitle": "Level", "mData": "level"},
                   
                     {"sTitle": "Cost/Min", "mData": "cost"},
                               {"sTitle": "Ticket No", "mData": "ticket_number"},
                       {"sTitle": "Total", "sClass":"data_row" ,"mData": "amount_owed",
                           
                           mRender:function(data, type ,row){
                               
                               return numeral(data).format('0,0.00');
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
                            if (row.status == 0) {
                                return '<button class=\"btn btn-small btn-danger delete_ps\" id=' + data + ' data-ticket='+row.ticket_number+'>Mark As Paid</button>';
                            } else {
                                return '<button class=\"btn btn-small btn-success delete_ps\" id=' + data + ' disabled="disabled">PAID</button>';
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
                "sAjaxSource": "<?php echo base_url() . 'ps/'; ?>"+url,
          
            });
        } else {
            rtable.fnDraw();
        }


    }




</script>

