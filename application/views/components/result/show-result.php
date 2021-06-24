<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Set Exam</h1>
                </div>
            </div>

            <div class="panel-body">

                <blockquote class="form-head">

                    <!--h4>Set Subjects & Marks</h4-->

                    <ol style="font-size: 14px;">
                        <li>1 . Fill all this fields and press <mark>Show</mark> button</li>
                    </ol>

                </blockquote>
                
                <hr>

                <form action="" class="form-horizontal">
        
                    <div class="form-group">
                        <label class="col-md-3 control-label">Class <span class="req">*</span></label>

                        <div class="col-md-9">
                            <select name="class" class="form-control" required>
                                <option value="">-- Select class --</option>
                                <option value="1">class-1</option>
                                <option value="2">class-2</option>
                                <option value="2">class-3</option>
                                <option value="4">class-4</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Year <span class="req">*</span></label>

                        <div class="col-md-9">
                            <select name="year" class="form-control" required>
                                <option value="">-- Select Year --</option>
                                <?php
                                 for($i=date("Y")-2; $i<=date("Y")+10;$i++)
                                 {
                                    ?>
                                     <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php
                                 }
                                 ?>      
                            </select>
                        </div>
                    </div> 

                     <div class="form-group">
                        <label class="col-md-3 control-label">Exam Title <span class="req">*</span></label>

                        <div class="col-md-9">
                           <select name="exam_title" class="form-control" required>
                                <option value="">-- Select Exam --</option>
                                <option value="1">1st Model Test</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Roll <span class="req">*</span></label>

                        <div class="col-md-9">
                            <input type="text" placeholder="Type Roll" name="roll" class="form-control" required>
                        </div>
                    </div>

                    <div class="btn-group pull-right">
                        <input type="submit" value="Show" class="btn btn-primary">
                    </div> 

                </form>

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

