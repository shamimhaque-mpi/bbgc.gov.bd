<div class="container-fluid">
    <div class="row">
    <?php echo $confirmation; ?>
        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>All Digital Content</h1>
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
                                <th>Group</th>
                                <th>Subject</th>
                                <th>Title</th>
                                <th>Attach File </th>
                                <th>Action</th>
                            </tr>
                        <?php foreach ($dc_info as $key => $digital_content) { 
                            $extention= pathinfo($digital_content->dc_attachment,PATHINFO_EXTENSION);
                        ?>
                            <tr>
                                <td> <?php echo $key+1; ?> </td>
                                <td> <?php echo $digital_content->dc_date; ?> </td>
                                <td><?php echo ucfirst($digital_content->dc_class); ?></td>
                                <td><?php echo ucfirst($digital_content->dc_group); ?></td>
                                <td><?php echo ucfirst(str_replace("_", " ",$digital_content->dc_subject)); ?></td>
                                <td><?php echo ucfirst($digital_content->dc_title); ?></td>
                                <td> <a target="_blank" href="<?php echo base_url($digital_content->dc_attachment); ?>"><i style="color: #D05141;" class="fa fa-file-<?php if($extention=="pptx" or $extention=="ppt"){echo"powerpoint";}else{echo"pdf";} ?>-o fa-2x"></i></a></td>
                                <td style="width: 50px;">
                                    <a class="btn btn-danger" onclick="return confirm('Are you want to delete this file');" href="?id=<?php echo $digital_content->id; ?>&img_url=<?php echo $digital_content->dc_attachment; ?>">Delete</a>
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

