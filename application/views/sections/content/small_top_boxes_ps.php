<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-arrow-circle-o-up"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">PS Online</span>
                <span class="info-box-number" id="online">Loading...</span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-arrow-circle-down"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">PS Offline : Active</span>
                <span class="info-box-number" id="offline">Please Wait Loading...</span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-warning"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">PS Offline : Inactive</span>
                <span class="info-box-number">0</span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-clock-o"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Time Played Today</span>
                <span class="info-box-number" id="time_played">Loading...</span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->

</div><!-- /.row -->

<script>
    $(document).ready(function () {
        setInterval(function () {

            $.getJSON("<?php echo base_url() . 'ps_gaming/get_online/'; ?>", function (status) {
                $('#online').text(status[0].status)
            });

            $.getJSON("<?php echo base_url() . 'ps_gaming/get_offline/'; ?>", function (status) {
                $('#offline').text(status[0].status)
            });

            $.getJSON("<?php echo base_url() . 'ps_gaming/get_timeplayed/'; ?>", function (status) {
                $('#time_played').text(status[0].time + ' Min(s)')
            });


            $.getJSON("<?php echo base_url() . 'ps_gaming/check_5'; ?>", function (time) {
                $.each(time, function (i, rem) {
                    if (rem.remtime == 5) {
                        $.notify('PS No (' + rem.id + ") is almost exhausting its tokens", "warn");
                        $.playSound("<?php echo base_url() . 'notification/lowdata'; ?>");
                    } else if (rem.remtime == 0) {
                        $.notify('PS No (' + rem.id + ") has exhausted its tokens", "error");
                        $.playSound("<?php echo base_url() . 'notification/nodata'; ?>");
                    } else {
                        console.log('We are in time');
                    }
                })

            });

        }, 15000);

    })
</script> 