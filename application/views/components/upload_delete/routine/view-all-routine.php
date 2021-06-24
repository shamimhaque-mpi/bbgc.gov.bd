<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>All Routine</h1>
                </div>
            </div>

            <div class="panel-body">

                <div class="row">

                    <div class="col-sm-12">

                        <table class="table table-bordered">
                            <tr>
                                <th>Sl</th>
                                <th>Date</th>
                                <th>Class</th>
                                <th>Title</th>
                                <th>Attach File</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($routine_info as $key => $routine) { ?>
                            
                            <tr>
                                <td> <?php echo $key+1; ?> </td>
                                <td> <?php echo $routine->routine_date; ?> </td>
                                <td> <?php echo $routine->routine_class; ?> </td>
                                <td> <?php echo $routine->routine_title; ?> </td>
                                <td> <a target="_blank" href="<?php echo base_url($routine->routine_attachment); ?>"><i style="color: #D05141;" class="fa fa-file-pdf-o fa-2x"></i></a> </td>
                                <td style="width: 50px;">
                                    <a class="btn btn-danger" onclick="return confirm('This Information will delete permanently');" href="?id=<?php echo $routine->id; ?> & img_url=<?php echo $routine->routine_attachment; ?>">Delete</a>
                                </td>
                            </tr>

                            <?php } ?>
                         
                        </table>
                    </div>

                </div>

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

