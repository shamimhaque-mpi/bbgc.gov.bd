<style>
    @media print{
        aside{
            display: none;
        }
        .panel-heading{
            display: none;
        }
        .panel{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: auto;
        }
        .none{
            display: none;
        }
    }
</style>

<div class="container-fluid">
    <div class="row">
    <?php echo $confirmation; ?>
        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>All Syllabus</h1>
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
                                <th>Attach File </th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($syllabus_info as $key => $syllabus) { ?>
                            <tr>
                                <td> <?php echo $key+1; ?> </td>
                                <td> <?php echo $syllabus->syllabus_date ?> </td>
                                <td> <?php echo $syllabus->syllabus_class ?> </td>
                                <td> <a target="_blank" href="<?php echo base_url($syllabus->syllabus_attachment); ?>"><i style="color: #D05141;" class="fa fa-file-pdf-o fa-2x"></i></a> </td>
                                <td style="width: 50px;">
                                    <a class="btn btn-danger" onclick="return confirm('Are you want to delete this file');" href="?id=<?php echo $syllabus->id; ?> & img_url=<?php echo $syllabus->syllabus_attachment; ?>">Delete</a>
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

