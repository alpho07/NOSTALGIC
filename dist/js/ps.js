$(document).ready(function () {
 var host = window.location.protocol+'//'+window.location.host+'/';
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

    $(document).on('click', '.delete_ps', function () {
        $id = $(this).attr('id');

        $.prompt("This PS Details will be deleted permanently, Do you want to continue?", {
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
        });

    });

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
                alert(error);
            }
        });
    });

    $('#close_ticket').click(function () {
        $.fancybox.close();
    });



});




$(document).ready(function () {
    getData();

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
                            $('#s_ps_no_i').val(session_tickets[0].ps_no);
                            $('#s_start').text(session_tickets[0].start_time);
                            $('#s_start_i').val(session_tickets[0].start_time);
                            $('#s_end').text(session_tickets[0].end_time);
                            $('#s_end_i').val(session_tickets[0].end_time);
                            $('#s_duration').text(session_tickets[0].dur + " Minutes");
                            $('#s_duration_i').val(session_tickets[0].dur);

                            standard_time = parseFloat(2);
                            if (parseFloat(session_tickets[0].dur) <= 0) {
                                $('#s_amount').text("00.00/=");
                                $('#s_amount_i').val("00.00/=");
                            } else
                            if (session_tickets[0].dur > 0 && session_tickets[0].dur < standard_time) {
                                $('#s_amount').text("20.00/=");
                                $('#s_amount_i').val("20.00/=");
                            } else {
                                standard_rate = parseFloat(20);
                                rate = parseFloat(3);
                                time = parseFloat(session_tickets[0].dur) - standard_time;
                                extra_charge = rate * time;
                                total_amount = extra_charge + standard_rate;
                                $('#s_amount').text(total_amount.toFixed(2) + "/=");
                                $('#s_amount_i').val(total_amount.toFixed(2) + "/=");
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
            alert('An error occured')
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
            "autoWidth": true,
            "order": [[1, "asc"]],
            "aoColumns": [
                {"sTitle": "id", "mData": "id", "visible": false, "bSortable": true},
                {"sTitle": "PS No", "mData": "ps_no"},
                {"sTitle": "IP Address", "mData": "ip_addr"},
                {"sTitle": "Start Time", "mData": "start_time"},
                {"sTitle": "End Time", "sClass": "client", "mData": "end_time"},
                {"sTitle": "Duration", "mData": "dur",
                    "mRender": function (data, type, row) {

                        if (data == null) {
                            return "Session Active";
                        } else {
                            return data + ' Mins';
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
                {"sTitle": "Amount(KES)", "mData": "amount_owed",
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
                },
                {"sTitle": "Action", "mData": "id",
                    "mRender": function (data, type, row) {
                        return '<button class=\"btn btn-small btn-danger delete_ps\" id=' + data + '>Delete PS</div>';
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

