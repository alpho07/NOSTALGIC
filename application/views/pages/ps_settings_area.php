
<div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">SYSTEM SETTINGS</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" id="SiteUpdate">
            <div class="box-body">

                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-pills nav-stacked col-md-2">
                            <li class="active"><a href="#tab_a" data-toggle="pill">System Name & Location</a></li>
                            <li><a href="#tab_b" data-toggle="pill">System Member Levels</a></li>
                            <li><a href="#tab_c" data-toggle="pill">Gaming Levels & Cost</a></li>

                            <li><a href="#tab_d" data-toggle="pill">Footer Text</a></li>
                        </ul>
                        <div class="tab-content col-md-10">
                            <div class="tab-pane active" id="tab_a">
                                <h4>System Details</h4>
                                <div class="form-group">
                                    <input type="text" placeholder="Enter System Name" value="<?php echo @$sys_name[0]->sys_name; ?>" class="form-control input-lg" id="site_name" name="site_name">

                                </div>

                                <div class="form-group">
                                    <textarea class="form-control" rows="3" id="site_address" name="site_address" placeholder="Enter Address"><?php echo @$sys_name[0]->address; ?></textarea>

                                </div>

                                <div class="form-group">
                                    <input type="text" placeholder="Phone" value="<?php echo @$sys_name[0]->phone; ?>" class="form-control " id="site_phone" name="site_phone">

                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="email" value="<?php echo @$sys_name[0]->email; ?>" class="form-control " id="site_email" name="site_email">

                                </div>






                            </div>
                            <div class="tab-pane" id="tab_b">
                                <h4>System Member Levels</h4>
                                <div class="form-group">
                                    <div class="box">

                                        <div class="box-header with-border">
                                            <h3 class="box-title">Bordered Table</h3>
                                        </div><!-- /.box-header -->
                                        <div class="box-body">
                                            <table class="table table-bordered">
                                                <tbody><tr>
                                                        <th style="width: 10px">#</th>
                                                        <th>Level</th>
                                                        <th>Description</th>

                                                    </tr>
                                                    <?php foreach (@$mlevels as $ml): ?>
                                                        <tr>
                                                            <td><?php echo $ml->id; ?></td>
                                                            <td>
                                                                <div class="input-group col-md-6">
                                                                    <span class="input-group-addon fa fa-user"></span>
                                                                    <input type="text" value="<?php echo $ml->level; ?>"  name="m_level[]" class="form-control" id="m_level_<?php echo $ml->id; ?>">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <?php echo $ml->description; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>

                                                </tbody></table>
                                        </div><!-- /.box-body -->
                                        <div class="box-footer clearfix">
                                            Member Level Table
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="tab_c">
                                <h4>Gaming Levels & Costs</h4>
                                <div class="box">

                                    <div class="box-header with-border">
                                        <h3 class="box-title"></h3>
                                    </div><!-- /.box-header -->
                                    <div class="box-body">
                                        <table class="table table-bordered">
                                            <tbody><tr>
                                                    <th style="width: 10px">#</th>
                                                    <th>Level</th>
                                                    <th>Level Discount Gameplay Achievement Criteria</th>
                                                    <th>Cost/Min</th>

                                                </tr>
                                                <?php foreach (@$glevels as $gl): ?>
                                                    <tr>
                                                        <td><?php echo $gl->id; ?></td>                                                     
                                                        <td> <div class="input-group">
                                                                <input type="text"  value="<?php echo $gl->level; ?>" name="g_level[]" accept="" class="form-control" id="g_level_<?php echo $gl->id; ?>">
                                                            </div>
                                                        </td>                                                   
                                                        <td> 
                                                            <?php if ($gl->days == '0'): ?>
                                                                <span class="input-group-addon"> No Achievements/Discounts </span>
                                                                <input type="hidden"  value="<?php echo $gl->days; ?>" name="g_days[]" accept="" class="form-control" id="g_days_<?php echo $gl->id; ?>">

                                                            <?php else: ?>
                                                                <div class="input-group col-md-12"> 
                                                                    <span class="input-group-addon">Play more than 60 Mins for any </span>
                                                                    <input type="text"  value="<?php echo $gl->days; ?>" name="g_days[]" accept="" class="form-control" id="g_days_<?php echo $gl->id; ?>">
                                                                    <span class="input-group-addon">Day(s) Non-stop </span> 
                                                                </div>
                                                            <?php endif; ?>
                                                        <td>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">for only</span>
                                                                <input type="text"  class="form-control" value="<?php echo $gl->cost; ?>" name="g_cost[]" id="g_cost_<?php echo $gl->id; ?>">
                                                                <span class="input-group-addon">Bob Per Min</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>


                                            </tbody></table>
                                    </div><!-- /.box-body -->
                                    <div class="box-footer clearfix">
                                        Cost table - game/min for levels
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="tab_d">
                                <h4>Footer Text</h4>
                                <div class="form-group">
                                    <textarea placeholder="Enter Text" rows="3"  name="footer" id="footer_teeext" class="form-control"><?php echo @$sys_name[0]->footer; ?></textarea>

                                </div>

                                <div class="form-group">

                                    <input type="text"  class="form-control" name="website" id="website" value="<?php echo @$sys_name[0]->website; ?>" placeholder="Enter website" >

                                </div>
                            </div>
                        </div><!-- tab content -->

                    </div>
                </div>

            </div><!-- /.box-body -->

            <div class="box-footer">
                <input class="btn btn-primary"  id="siteInfoUpdate" type="button" value="Submit"/>
            </div>
        </form>
    </div><!-- /.box -->

    <!-- Form Element sizes -->

</div><!-- /input-group -->

<script>
    $(document).ready(function () {


        $('#siteInfoUpdate').click(function () {

            $update_siteinfo();

        });

        $update_siteinfo = function () {

            if ($('#site_name').val() === '') {
                $('#site_name').css('border', 'solid red 1px');
                $('#site_name').prop('placeholder', 'required!');
                $.notify("Error: System Name & Location: Site Name cannot be blank !", "error");

                return false;
            } else if ($('#site_address').val() === '') {
                $('#site_address').css('border', 'solid red 1px');
                $('#site_address').prop('placeholder', 'required!');
                $.notify("Error: System Name & Location: Site Address cannot be blank !", "error");

                return false;
            } else if ($('#site_phone').val() === '') {
                $('#site_phone').css('border', 'solid red 1px');
                $('#site_phone').prop('placeholder', 'required!');
                $.notify("Error: System Name & Location: Site Phone cannot be blank !", "error");

                return false;
            } else if ($('#site_email').val() === '') {
                $('#site_email').css('border', 'solid red 1px');
                $('#site_email').prop('placeholder', 'required!');
                $.notify("Error: System Name & Location: Site E-mail cannot be blank !", "error");

                return false;
            } else if ($('#m_level_1').val() === '') {
                $('#m_level_1').css('border', 'solid red 1px');
                $('#m_level_1').prop('placeholder', 'required!');
                $.notify("Error: System Member Levels: Level 1 - Guest cannot be blank !", "error");

                return false;
            } else if ($('#m_level_2').val() === '') {
                $('#m_level_2').css('border', 'solid red 1px');
                $('#m_level_2').prop('placeholder', 'required!');
                $.notify("Error: System Member Levels: Level 2 - Supervisor cannot be blank !", "error");

                return false;
            } else if ($('#m_level_3').val() === '') {
                $('#m_level_3').css('border', 'solid red 1px');
                $('#m_level_3').prop('placeholder', 'required!');
                $.notify("Error: System Member Levels: Level 3 - Administrator cannot be blank !", "error");

                return false;
            } else if ($('#g_level_1').val() === '') {
                $('#g_level_1').css('border', 'solid red 1px');
                $('#g_level_1').prop('placeholder', 'required!');
                $.notify("Error: Gaming Levels & Cost: Level 1 cannot be blank !", "error");

                return false;
            } else if ($('#g_level_2').val() === '') {
                $('#g_level_2').css('border', 'solid red 1px');
                $('#g_level_2').prop('placeholder', 'required!');
                $.notify("Error: Gaming Levels & Cost: Level 2 cannot be blank !", "error");
                return false;
            } else if ($('#g_level_3').val() === '') {
                $('#g_level_3').css('border', 'solid red 1px');
                $('#g_level_3').prop('placeholder', 'required!');

                $.notify("Error: Gaming Levels & Cost: Level 3 cannot be blank !", "error");
                return false;
            } else if ($('#g_level_4').val() === '') {
                $('#g_level_4').css('border', 'solid red 1px');
                $('#g_level_4').prop('placeholder', 'required!');
                $.notify("Error: Gaming Levels & Cost: Level 4 cannot be blank !", "error");
                return false;
            } else if ($('#g_days_1').val() === '') {
                $('#g_days_1').css('border', 'solid red 1px');
                $('#g_days_1').prop('placeholder', 'required!');
                $.notify("Error: Gaming Levels & Cost: Level 1 Play Days cannot be blank !", "error");
                return false;
            } else if ($('#g_days_2').val() === '') {
                $('#g_days_2').css('border', 'solid red 1px');
                $('#g_days_2').prop('placeholder', 'required!');
                $.notify("Error: Gaming Levels & Cost: Level 2 Play Days cannot be blank !", "error");

                return false;
            } else if ($('#g_days_3').val() === '') {
                $('#g_days_3').css('border', 'solid red 1px');
                $('#g_days_3').prop('placeholder', 'required!');
                $.notify("Error: Gaming Levels & Cost: Level 3 Play Days cannot be blank !", "error");

                return false;
            } else if ($('#g_days_4').val() === '') {
                $('#g_days_4').css('border', 'solid red 1px');
                $('#g_days_4').prop('placeholder', 'required!');

                $.notify("Error: Gaming Levels & Cost: Level 4 Play Days cannot be blank !", "error");

                return false;
            } else if ($('#g_cost_1').val() === '') {
                $('#g_cost_1').css('border', 'solid red 1px');
                $('#g_cost_1').prop('placeholder', 'required!');
                $.notify("Error: Gaming Levels & Cost: Level 1 Cost/Min cannot be blank !", "error");

                return false;
            } else if ($('#g_cost_2').val() === '') {
                $('#g_cost_2').css('border', 'solid red 1px');
                $('#g_cost_2').prop('placeholder', 'required!');
                $.notify("Error: Gaming Levels & Cost: Level 2 Cost/Min cannot be blank !", "error");

                return false;
            } else if ($('#g_cost_3').val() === '') {
                $('#g_cost_3').css('border', 'solid red 1px');
                $('#g_cost_3').prop('placeholder', 'required!');
                $.notify("Error: Gaming Levels & Cost: Level 3 Cost/Min cannot be blank !", "error");

                return false;
            } else if ($('#g_cost_4').val() === '') {
                $('#g_cost_4').css('border', 'solid red 1px');
                $('#g_cost_4').prop('placeholder', 'required!');
                $.notify("Error: Gaming Levels & Cost: Level 4 Cost/Min cannot be blank !", "error");

                return false;
            } else if ($('#footer_teeext').val() === '') {
                $('#footer_teeext').css('border', 'solid red 1px');
                $('#footer_teeext').prop('placeholder', 'required!');
                $.notify("Error: Footer Text: footer text cannot be blank !", "error");

                return false;
            } else if ($('#website').val() === '') {
                $('#website').css('border', 'solid red 1px');
                $('#website').prop('placeholder', 'required!');
                $.notify("Error: Footer Text: Website cannot be blank !", "error");

                return false;
            } else {
                $('#siteInfoUpdate').prop('value', 'Updating..');
                $('#siteInfoUpdate').prop('disabled', true);
                $data = $('#SiteUpdate').serialize();
                $.post("<?php echo base_url(); ?>ps/updateSiteInfo/", $data, function () {

                 $.notify("WE ARE GOOD TO GO!", "success");

                    swal({
                        title: "Update Success!",
                        text: "Refreshing page for the new chanages.",
                        type: "success"
                    });

                    setInterval(function () {
                        window.location.href = "<?php echo base_url(); ?>ps/ps_settings/";
                    }, 2000);
                    return false;
                }).fail(function () {
                    swal({
                        title: "UPDATE ERROR",
                        text: "Please contact vendor for help",
                        type: "error"

                    });
                });
            }
            ;
        }
    });


</script>

















