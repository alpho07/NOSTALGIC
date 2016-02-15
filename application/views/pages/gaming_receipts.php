<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">My Invoices Paid/Unpaid</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>

                        <tr>
                            <th>PS No.</th>
                            <th>Game Played</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Duration</th>
                            <th>Action</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($myhistory as $h): ?>
                            <tr>
                                <td><?php echo $h->ps_no; ?></td>
                                <td><?php echo $h->game_name; ?></td>
                                <td><?php echo $h->start_time; ?></td>
                                <td><?php echo $h->end_time; ?> </td>
                                <td><?php echo $h->dur;?> Min(s)</td>
                                   <?php  if($h->status==0){?>
                                <td class="btn-warning">UNPAID!</td>
                                   <?php  }else{?>
                                <td class="btn-success">PAID!</td>
                                       <?php } ;?> 
                                <td><a href="<?php echo base_url()."ps/my_account/".$h->id;?>/#u/0/invoicebox"><span class="btn btn-success"><i class="glyphicon glyphicon-zoom-in">View</i></span></a></td>
                                
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="6">My Invoices &COPY; <?php echo date('Y'); ?></th>

                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->

<script>
    $(document).ready(function () {
        $('#example2').DataTable({
            "bJQueryUI": true,
            "scrollX": true,
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });

</script>