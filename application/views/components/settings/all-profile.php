            <div class="container-fluid">
                <div class="row">
                <?php echo $confirmation; ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panal-header-title pull-left">
                                <h1>All Profiles</h1>
                            </div>
                        </div>

                        <div class="panel-body">
                            <?php
                            if ($profiles != NULL) {
                            ?>

                            <table class="table table-bordered">
                                <tr>
                                    <th>Sl</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>UserName</th>
                                    <th>Privilege</th>
                                    <th>Action</th>
                                </tr>

                                <?php foreach ($profiles as $key => $value) { ?>
                                <tr>
                                    <td><?php echo($key + 1); ?></td>
                                    <td><img src="<?php echo site_url($value->image); ?>" alt="" style="width: 30px; height: 30px;"></td>
                                    <td><?php echo ucwords($value->name)." ".ucwords($value->l_name); ?></td>
                                    <td><?php echo $value->username; ?></td>
                                    <td><?php echo ucwords($value->privilege); ?></td>
                                    <td style="width: 216px;">
                                        <a class="btn btn-info" href="<?php echo site_url("settings/showProfile?id=" . $value->id); ?>">
                                            <i class="icon-eye-open"></i> View
                                        </a>
                                        <?php if($value->privilege!=$privilege || $value->username!=$username){ ?>
                                        <a class="btn btn-warning" href="<?php echo site_url("settings/editProfile?id=" . $value->id); ?>">
                                            <i class="icon-pencil icon-white"></i> Edit
                                        </a>
                                        <?php } if($value->privilege!=$privilege){ ?>
                                        <a onclick="return confirm('This Data will delete permanently')" class="btn btn-danger" href="<?php echo site_url("settings/allProfile?img_url=".$value->image."&id=" . $value->id); ?>">
                                            <i class="icon-remove icon-white"></i>Delete
                                        </a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>

                            <?php
                            } else {
                                echo "<h3 style='text-align:center;'>No Accounts Available !</h3>";
                            }
                            ?>

                        </div>

                        <div class="panel-footer">&nbsp;</div>
                    </div>
                </div>
            </div>


