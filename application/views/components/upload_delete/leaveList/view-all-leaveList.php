<div class="container-fluid">
    <div class="row">
    <?php echo $confirmation; ?>
        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>All Leave List</h1>
                </div>
            </div>

            <div class="panel-body">

                <div class="row">

                    <div class="col-sm-12">

                        <table class="table table-bordered">
                            <tr>
                                <th>Sl</th>
                                <th>Date</th>
                                <th>Title</th>
                                <th>Attach File </th>
                                <th>Action</th>
                            </tr>
                        <?php foreach ($leave_info as $key => $leave) { ?>
                        
                            <tr>
                                <td> <?php echo $key+1; ?> </td>
                                <td> <?php echo $leave->leave_date; ?> </td>
                                <td> <?php echo $leave->leave_title; ?> </td>
                                <td> <a target="_blank" href="<?php echo base_url($leave->leave_attachment);?>"><i style="color: #D05141;" class="fa fa-file-pdf-o fa-2x"></i></a> </td>
                                <td style="width: 50px;">
                                    <a class="btn btn-danger" onclick="return confirm('This data will delete permanently');" href="?id=<?php echo $leave->id;?> & img_url=<?php echo $leave->leave_attachment; ?>">Delete</a>
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

