<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">My Playing History</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>

                        <tr>
                            <th>PS No.</th>
                            <th>Game Played</th>
                            <th>Date Played</th>
                            <th>Time Played</th>
                            <th>My Level</th>
                            <th>Level Cost/Min(s)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($myhistory as $h): ?>
                            <tr>
                                <td><?php echo $h->ps_no; ?></td>
                                <td><?php echo $h->game_name; ?></td>
                                <td><?php echo $h->date_added; ?></td>
                                <td><?php echo $h->dur; ?>Min(s)</td>
                                <td><?php echo $h->level; ?></td>
                                <td><?php echo $h->cost; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="6">My Gaming History &COPY; <?php echo date('Y'); ?></th>

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