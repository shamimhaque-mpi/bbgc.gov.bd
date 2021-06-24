<div class="container-fluid">
    <div class="row">
    <?php echo $confirmation; ?>
        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Visitor Comments</h1>
                </div>
            </div>

            <div class="panel-body">

                <!--blockquote class="form-head">

                    <h4>Official Cost</h4>

                    <ol style="font-size: 14px;">
                        <li>to see date wise comments select the date and click on the <mark>Show</mark> button</li>
                    </ol>

                </blockquote>

                <hr-->


                <!-- horizontal form -->
                

                <?php
                    $attr=array('class'=>'form-horizontal');
                    echo form_open('',$attr);
                ?>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Date <span class="req">*</span></label>
                        
                        <div class="input-group date col-md-9" id="datetimepicker1">
                            <input type="text" name="date" placeholder="YYYY-MM-DD" class="form-control" required>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>

                    </div>

                    <div class="btn-group pull-right">
                        <input type="submit" value="Show" name="view_query" class="btn btn-primary">
                    </div>

                <?php echo form_close(); ?>

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>

        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>All Message</h1>
                </div>
            </div>

            <div class="panel-body">
                
                <table class="table table-bordered">
                    <tr>
                        <th>Sl</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Mobile Number</th>
                        <th>Messages</th>
                        <th>Action</th>
                    </tr>
                <?php foreach ($messages as $key => $message) {
                    $count_word=explode(" ", $message->messages_text);
                    $msg_text=null;
                    $word=array();
                    if (count($count_word)>10) {
                        for($i=0; $i<=10; $i++){
                            $word[]=$count_word[$i];
                        }
                        $msg_text=implode(" ", $word)."......";
                    }
                    else{
                        $msg_text=$message->messages_text;
                    }
                ?>
                    <tr <?php if($message->messages_condition=="unread") echo'style="background: #EFEFFF"';?> >
                        <td><?php echo $key+1; ?> </td>
                        <td><?php echo $message->messages_date;?> </td>
                        <td><?php echo $message->messages_name;?></td>
                        <td><?php echo $message->messages_mobile;?></td>
                        <td><?php echo $msg_text; ?></td>
                        <td style="width: 160px;">
                            <a class="btn btn-primary" href="<?php echo base_url('visitors/comments/view_comments')?>?id=<?php echo $message->id; ?>">View</a>
                            <a class="btn btn-danger" href="?id=<?php echo $message->id; ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
                </table>

            </div>
            <div class="panel-footer">&nbsp;</div>

        </div>
    </div>
</div>

