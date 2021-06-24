<div class="col-md-9">
    <div class="row">
        <!-- single notice section -->
        <div class="single">
            <h3><?php echo $news_update[0]->latest_news_title;?></h3>
            <p><small><?php echo $news_update[0]->latest_news_date; ?></small></p>
            <p><?php echo $news_update[0]->latest_news_description; ?></p>
            <?php if($news_update[0]->latest_news_link!=""){ ?>
            <p><a href="<?php echo $news_update[0]->latest_news_link; ?>"><?php echo $news_update[0]->latest_news_link; ?></a></p>
            <?php } ?>           
        </div>
    </div>
</div>