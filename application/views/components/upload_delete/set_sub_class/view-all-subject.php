<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>All Class & Subject</h1>
                </div>
            </div>

            <div class="panel-body">

                <div class="row">

                    <div class="col-sm-12">

                        <table class="table table-bordered">
                            <tr>
                                <th>Sl</th>
                                <th>Class</th>
                                <th>Group </th>
                                <th>Subject </th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($read_subject as $key => $subject) { ?>
                            <tr>
                                <td> <?php echo $key+1; ?> </td>
                                <td> <?php echo $subject->CS_class; ?> </td>
                                <td> <?php echo $subject->CS_group; ?> </td>
                                <td> <?php echo $subject->CS_subject; ?> </td>
                                <td style="width: 50px;">
                                    <a class="btn btn-danger" onclick="return confirm('Are you want to delete this file');" href="?id=<?php echo $subject->id; ?>">Delete</a>
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

