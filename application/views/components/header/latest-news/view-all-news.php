<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>All News</h1>
                </div>
            </div>

            <div class="panel-body">

                <div class="row">

                    <div class="col-sm-12">

                        <table class="table table-bordered">
                            <tr>
                                <th>Sl</th>
                                <th>Date</th>
                                <th>Link url</th>
                                <th>News Title</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($news_info as $key => $l_news) { ?>
                            <tr>
                                <td> <?php echo $key+1; ?> </td>
                                <td> <?php echo $l_news->latest_news_date; ?> </td>
                                <td><a target="_blank" href="<?php echo $l_news->latest_news_link; ?>">View</a></td>
                                <td> <?php echo $l_news->latest_news_title; ?> </td>
                                <td style="width: 216px;">
                                    <a class="btn btn-primary" href="<?php echo site_url('header/latest_news/preview_news?news_id=').$l_news->id;?>">View</a>
                                    <a class="btn btn-warning" href="<?php echo site_url('header/latest_news/edit_news?news_id=').$l_news->id;?>">Edit</a>
                                    <a class="btn btn-danger" onclick="return confirm('This Message is deleting permanently');" href="?delete_token=<?php echo $l_news->id; ?>">Delete</a>
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

