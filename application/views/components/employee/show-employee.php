<style>
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
        .none{
            display: none;
        }
        .panel-heading{
            display: none;
        }
        .hide{
            display: block !important;
        }
        .none{
            display: none;
        }
        .panel-footer{
            display: none;
        }
        .title{
            font-size: 25px;
        }
    }
    #search{
        margin-bottom: 15px;
        border: 1px solid #ccc;
        background: transparent;
        padding: 6px;
        width: 240px;
        box-shadow: 0 1px 5px #3332 inset;
    }
</style>

                    

<div class="container-fluid">
    <div class="row">
    <?php //echo "<pre>"; print_r($info); echo "</pre>"; ?>
    <?php echo $confirmation; ?>
        <div class="panel panel-default none">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>View Employee</h1>
                </div>
            </div>

            <div class="panel-body">

                <!--blockquote class="form-head">

                    <h4>View All Employee</h4>

                    <ol style="font-size: 14px;">
                        <li>1 . If you want to update <mark>employee</mark> then use the fields</li>
                        <li>2 . At last click on the <mark>Update</mark> button</li>
                    </ol>

                </blockquote>

                <hr-->

                <?php
                $attr=array("class"=>"form-horizontal");
                echo form_open("",$attr);?>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Type <span class="req">*</span></label>
                        <div class="col-md-5">
                            <select name="type" class="form-control" id="teacher_type" required>
                                <option value="">Select Employee Type</option>
                                <option value="teacher">Teacher</option>
                                <option value="staff">Staff</option>
                            </select>
                        </div>
                    </div>
                   
                    <div class="col-md-7">
                    <div class="btn-group pull-right">
                        <input type="submit" name="type_query" value="Show" class="btn btn-primary">
                    </div>
                    </div>
                    
                <?php echo form_close(); ?>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>




        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">Show Result <br />
                    <small><span style="color:red"><?= count($info); ?></span> items Found</small>
                    </h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                
                </div>
            </div>


            <div class="panel-body">
                
                <img class="hide" style="width: 100%; margin-bottom: 10px;" src="<?php echo site_url('public/banner/banner.png') ?>">
                <span class="hide print-time text-center">সকল কর্মকর্তা ও কর্মচারী</span>
                
                <input class="none" type="search" id="search" placeholder="Search With Anything...">

                
                <table class="table table-bordered">
                    
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Photo</th>
                        <th>Employee ID</th>
                        <th>subject</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Designation</th>
                        <th>Mobile Number</th>
                        <th>Status</th>
                        <th class="none">Action</th>
                    </tr>
                <?php $counter=0; foreach ($info as $key => $emp_info) {
                        $counter++;
                    $img_url=$emp_name=$mobile=$status=null;
                    if ($emp_info->employee_type=="teacher"){
                        $img_url=$emp_info->image;
                        $emp_name=$emp_info->name;
                    }
                    elseif($emp_info->employee_type=="staff"){
                        $img_url=$emp_info->employee_photo;
                        $emp_name=$emp_info->employee_name;
                    }
                    if ($emp_info->employee_status==1) {
                        $status="Available";
                    }
                    elseif ($emp_info->employee_status==0) {
                        $status="Not Available";
                    }
		if($emp_info->employee_type =='teacher'){
			$des = "";
			foreach(config_item('teacher_designation') as $key=> $value){
				if($emp_info->employee_designation == $key){
				 $des = $value;
				}
			}
			
		/*$desig_list=config_item('teacher_designation');
		$designation=$desig_list[$emp_info->employee_designation];*/
		
		
		}
		else{
		$des=filter($emp_info->employee_designation);
		}
                 ?>
                    <tr>
                        <td> <?php echo $counter; ?> </td>
                        <td> <?php echo $emp_info->employee_joining?> </td>
                        <td> <img src="<?php echo base_url($img_url); ?>" width="50px" height="50px" alt=""></td>
                        <td><?php echo $emp_info->employee_emp_id;?></td>
                        <td><?php echo $emp_info->employee_subject;?></td>
                        <td> <?php echo $emp_name;?> </td>
                        <td> <?php echo ucfirst($emp_info->employee_type);?> </td>
                        <td> <?php echo $des;?></td>
                        <td> <?php echo $emp_info->employee_mobile?> </td>
                        <td> <?php echo $status;?> </td>
                        <td class="none" style="width: 216px;white-space:nowrap;">
                            <a class="btn btn-primary" href="<?php echo site_url('employee/employee/profile');?>?mobile=<?php echo $emp_info->employee_mobile; ?>">View</a>
                            <a class="btn btn-warning" href="<?php echo site_url('employee/employee/edit_employee') ;?>?mobile=<?php echo $emp_info->employee_mobile; ?>">Edit</a>
                            <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this data?');" href="?delete_token=<?php echo $emp_info->employee_mobile; ?>&img_url=<?php echo $img_url; ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
                </table>

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
<script>
    search.addEventListener('input', function(){
        var tr        = document.querySelectorAll('tr'),
            searchKey = this.value;
        if(tr){
            tr = Array.isArray(tr) ? tr : Object.values(tr);
            tr.forEach((single_tr)=>{
                single_tr.style.display = "none";
                var patt = new RegExp(searchKey, 'i');
                if(patt.test(single_tr.innerHTML)){
                    single_tr.style.display = "";
                }
            });
        }
    });
</script>