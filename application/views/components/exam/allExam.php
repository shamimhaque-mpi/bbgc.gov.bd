<style>
	.attendance tr th{
		text-align: center;
	}
	.attendance label{
		display: block;
	}

	@media print{
		aside{
			display: none !important;
		}
		nav{
			display: none;
		}
		.panel{
			border: 1px solid transparent;
			left: 0px;
			position: absolute;
			top: 0px;
			width: 100%;
		}
		.box-width{
			width: 50%;
		}
		.none{
			display: none;
		}
		.panel-heading{
			display: none;
		}
		
		.panel-footer{
			display: none;
		}
        .hide{
            display: block !important;
        }
        .title{
            font-size:  25px;
        }
	}

</style>
<div class="container-fluid">
    <div class="row">
        <?php //echo $confirmation; echo"<pre>"; print_r($students_report); echo"</pre>"; ?>
        <div class="panel panel-default none">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>All Exam</h1>
                </div>
            </div>

            <div class="panel-body">

                    <?php
                    $attr=array("class" => "form-horizontal");
                    echo form_open("", $attr);?>

                         <div class="form-group">
                            <label class="col-md-2 control-label">Exam Name <span class="req">*</span></label>
                            <div class="col-md-5">
                                <input list="exam_name" name="title" class="form-control">
                                <datalist id="exam_name">
                                <?php 
                                if($exam != null){
                                    foreach($exam as $row){
                                ?>
                                    <option value="<?php echo $row->title; ?>">
                                <?php }} ?>
                                </datalist>
                            </div>
                        </div>

                       
                        <div class="col-md-7">
                            <div class="btn-group pull-right">
                                <input type="submit" value="Show" name="show" class="btn btn-primary">
                            </div>
                        </div>

                    <?php echo form_close(); ?>

                    

                </div>

            <div class="panel-footer">&nbsp;</div>
        </div>







        <?php if($result != null){ ?>
        <div class="panel panel-default">
        	<div class="panel-heading">
        		 <div class="panal-header-title">
	                    <h1 class="pull-left">Show Result</h1>
	                </div>
        	</div>
        	
        	<div class="panel-body">
                <!--pre><?php print_r($result); ?></pre-->

                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Exam Name</th>
                        <th>Exam Start At</th>
                        <th>Class</th>
                        <th>Action</th>
                    </tr>

                    <?php foreach($result as $key => $row){ ?>
                    <tr>
                        <td><?php echo ($key + 1); ?></td>
                        <td><?php echo $row->title; ?></td>
                        <td><?php echo $row->date; ?></td>
                        <td><?php echo $row->class; ?></td>

                        <td style="width: 155px;">
                            <a class="btn btn-primary" href="<?php echo base_url('exam/exam/details?q='.$row->exam_id."&&class=".$row->class); ?>">Details</a>
                            <a class="btn btn-warning" href="<?php echo base_url('exam/exam/editExam?q='.$row->exam_id."&&class=".$row->class)?>">Edit</a>
                        </td>
                    </tr>
                    <?php } ?>
                
                </table>
        	</div>

        	<div class="panel-footer">&nbsp;</div>
        </div>
        <?php } ?>

    </div>
</div>