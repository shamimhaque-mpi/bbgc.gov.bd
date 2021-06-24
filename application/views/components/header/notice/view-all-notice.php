<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>All Notice</h1>
                </div>
            </div>

            <div class="panel-body">

                <div class="row">

                    <div class="col-sm-12">

                        <table class="table table-bordered">
                            <tr>
                                <th>Sl</th>
                                <th>Date</th>
                                <th>Attach File </th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($notice_info as $key => $notice) {
                                $exet=pathinfo(base_url($notice->notice_path),PATHINFO_EXTENSION);
                             ?>

                            <tr>
                                <td> <?php echo $key+1; ?> </td>
                                <td> <?php echo $notice->notice_date; ?> </td>
                                <td><?php if($notice->notice_path!=null or $notice->notice_path!="" ){ ?><a href="<?php echo base_url($notice->notice_path); ?>" target="_blank"><?php if($exet=="pdf" or $exet=="PDF"){ echo '<i style="color: #D05141;" class="fa fa-file-pdf-o fa-2x"></i>';} else{echo '<i class="fa fa-file-image-o fa-2x"></i>';} ?></a><?php } ?></td>
                                <td> <?php echo $notice->notice_title; ?> </td>
                                <td style="width: 216px;">
                                    <a class="btn btn-primary" href="<?php echo site_url('header/notice/preview_notice')?>?id=<?php echo $notice->id; ?>">View</a>
                                    <a class="btn btn-warning" href="<?php echo site_url('header/notice/edit_notice')?>?id=<?php echo $notice->id; ?>">Edit</a>
                                    <a class="btn btn-danger" onclick="return confirm('Are you want to delete this file');" href="?delete_token=<?php echo $notice->id;?> & file_url=<?php echo $notice->notice_path;?>">Delete</a>
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

