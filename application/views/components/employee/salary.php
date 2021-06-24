<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Employee Salary</h1>
                </div>
            </div>

            <div class="panel-body">

                <blockquote class="form-head">

                    <h4>View All Employee</h4>

                    <ol style="font-size: 14px;">
                        <li>1 . Pay the employee <mark>salary</mark> using the <mark>edit</mark> button</li>
                        <li>2 . At last click on the <mark>Update</mark> button</li>
                    </ol>

                </blockquote>

                <hr>

                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Designation</th>
                        <th>Mobile Number</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                    <tr>
                        <td> 1 </td>
                        <td> 2016-07-12 </td>
                        <td> <img src="<?php echo base_url('private'); ?>/images/pic-male.png" width="50px" height="50px" alt=""></td>
                        <td> Imtiaz Ahammed </td>
                        <td> Teacher </td>
                        <td> Principal </td>
                        <td> 01911000000 </td>
                        <td> Available</td>
                        <td style="width: 60px;">
                            <a class="btn btn-warning" href="<?php echo site_url('employee/employee/edit_employee') ;?>">Edit</a>
                        </td>
                    </tr>
                </table>

            </div>

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Payment</h1>
                </div>
            </div>

            <div class="panel-body">

                <form action="" class="form-horizontal">

                    <div class="form-group">
                        <label class="col-md-3 control-label">Employee ID <span class="req">&nbsp;</span></label>
                        
                        <div class="col-md-9">
                            <input type="text" name="employee_id" value="20" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Employee Mobile <span class="req">&nbsp;</span></label>
                        
                        <div class="col-md-9">
                            <input type="text" name="employee_mobile" value="01901254785" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Advanced <span class="req">&nbsp;</span></label>
                        
                        <div class="col-md-9">
                            <input type="text" name="advanced" value="0" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Salary <span class="req">&nbsp;</span></label>
                        
                        <div class="col-md-9">
                            <input type="text" name="salary" value="15000" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Year <span class="req">*</span></label>
                        
                        <div class="col-md-9">
                            <select name="year" class="form-control" required>
                                <option value="">Select Year</option>
                                <?php
                                 for($i=2015;$i<=date('Y')+3;$i++)
                                 {
                                  ?>
                                    <option value="<?php echo $i;?>"><?php echo $i; ?></option>
                                  <?php
                                 }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Month <span class="req">*</span></label>
                        
                        <div class="col-md-9">
                            <select name="year" class="form-control" required>
                                <option value="">Select Month</option>
                                    <?php
                                        $month=array('1'=>'January','2'=>'February','3'=>'March','4'=>'April','5'=>'May','6'=>'June','7'=>'July','8'=>'August','9'=>'September','10'=>'October','11'=>'November','12'=>'December'); 
                                        for($i=1;$i<=12;$i++)
                                        {
                                        ?>
                                         <option value="<?php echo $i;?>"><?php echo $month[$i]; ?></option>
                                         <?php
                                        }
                                    ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Salary Advanced <span class="req">&nbsp;</span></label>
                        
                        <div class="col-md-9">
                            <input type="text" name="salary_advanced" Placeholder="Amount in Tk" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Advanced Payment <span class="req">&nbsp;</span></label>
                        
                        <div class="col-md-9">
                            <input type="text" name="advanced_payment" Placeholder="Amount in Tk" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Bonus <span class="req">&nbsp;</span></label>
                        
                        <div class="col-md-9">
                            <input type="text" name="bonus" Placeholder="Amount in Tk" class="form-control">
                        </div>
                    </div>

                    <div class="btn-group pull-right">
                        <input type="submit" value="Save" class="btn btn-primary">
                    </div>

                    </div>

                </form>
                
            </div>

            <div class="panel-footer">&nbsp;</div>

        </div>

    </div>

</div>

