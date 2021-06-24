<div class="container-fluid">
    <div class="row">
    <?php echo $confirmation; ?>
        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>All Result</h1>
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
                                <th>Exam</th>
                                <th>Attach File </th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($result_info as $key => $result) { ?>
                            <tr>
                                <td> <?php echo $key+1; ?> </td>
                                <td> <?php echo $result->result_date; ?> </td>
                                <td> <?php echo $result->result_class; ?> </td>
                                <td> <?php echo str_replace("_", " ", $result->result_exam); ?> </td>
                                <td> <a target="_blank" href="<?php echo base_url($result->result_attachment); ?>"><i style="color: #D05141;" class="fa fa-file-pdf-o fa-2x"></i></a> </td>
                                <td style="width: 50px;">
                                    <a class="btn btn-danger" onclick="return confirm('This file will delete permanently');" href="?id=<?php echo $result->id; ?> & img_url=<?php echo $result->result_attachment; ?>">Delete</a>
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

