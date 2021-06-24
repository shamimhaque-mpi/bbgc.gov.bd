<div class="container-fluid">
    <div class="row">
        <?php echo $confirmation; ?>
        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>All Magazine</h1>
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
                            <?php foreach ($magazine_info as $key => $magazine) { ?>
                            <tr>
                                <td> <?php echo $key+1; ?> </td>
                                <td> <?php echo $magazine->magazine_date ?> </td>
                                <td> <?php echo $magazine->magazine_title ?> </td>
                                <td> <a target="_blank" href="<?php echo base_url($magazine->magazine_attachment); ?>"><i style="color: #D05141;" class="fa fa-file-pdf-o fa-2x"></i></a> </td>
                                <td style="width: 50px;">
                                    <a class="btn btn-danger" onclick="return confirm('Are you want to delete this file');" href="?id=<?php echo $magazine->id; ?> & img_url=<?php echo $magazine->magazine_attachment; ?>">Delete</a>
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

