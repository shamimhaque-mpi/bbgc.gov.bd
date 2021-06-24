<div class="container-fluid">
    <div class="row">
    <?php //echo "<pre>"; print_r($student_info); echo "</pre>";?>
    <?php echo $confirmation; ?>
        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit</h1>
                </div>
            </div>

            <div class="panel-body">

                <!-- horizontal form -->
                    
                    <div class="col-sm-12 no-padding">

                       <?php
                        $attr=array("class"=>"form-horizontal");
                        echo form_open_multipart("students/admission_view/student_edit?id=".$this->input->get("id"),$attr); ?>
                        <input type="hidden" name="old_file" value="<?php echo $student_info[0]->photo;?>">

                            <div class="form-group">
                                <label class="col-md-2 control-label">Student's Name <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="students_name" value="<?php echo $student_info[0]->students_name;?>" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Father's Name <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="fathers_name" value="<?php echo $student_info[0]->fathers_name;?>" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Mother's Name <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="mothers_name" value="<?php echo $student_info[0]->mothers_name;?>" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Father's Profession <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="fathers_profession" value="<?php echo $student_info[0]->fathers_profession;?>" class="form-control" required>
                                </div>
                            </div>

                            <!--div class="form-group">
                                <label class="col-md-2 control-label">Religion <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <select name="religion" class="form-control" required>
                                        <option value="">-- Select Religion --</option>
                                        <option value="islam">Islam</option>
                                        <option value="hindu">Hindu</option>
                                        <option value="buddhist">Buddhist</option>
                                        <option value="christian">Christian</option>
                                    </select>
                                </div>
                            </div-->

                            <div class="form-group">
                                <label class="col-md-2 control-label">Date of Birth <span class="req">*</span></label>
                                <div class="input-group date col-md-5" id="dateOfBirth">
                                    <input type="text" class="form-control" value="<?php echo $student_info[0]->birth_date;?>" name="birth_date">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <script type="text/javascript">
                                $(document).ready(function(){
            		                $('#dateOfBirth').datetimepicker({
            		                    format: 'YYYY-MM-DD'
            		                });
            		            });
                            </script>


                            <div class="form-group">
                                <label class="col-md-2 control-label">Present Address <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <textarea name="preasent_address" class="form-control" cols="30" rows="5" required> <?php echo $student_info[0]->preasent_address;?> </textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Permanent Address <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <textarea name="permanent_address" class="form-control" cols="30" rows="5" required><?php echo $student_info[0]->permanent_address;?></textarea>
                                </div>
                            </div>

                           <div class="form-group">
                                <label class="control-label col-xs-2">Parents Mobile Number <span class="req">*</span></label>
                                <div class="col-xs-5">
                                    <input type="text" class="form-control" value="<?php echo $student_info[0]->parents_mobile;?>" name="parents_mobile">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-2">Local Guardian Mobile Number</label>
                                <div class="col-xs-5">
                                    <input type="text" class="form-control" value="<?php echo $student_info[0]->lg_mobile;?>" name="lg_mobile">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-2">Student Mobile Number</label>
                                <div class="col-xs-5">
                                     <input type="text" class="form-control" value="<?php echo $student_info[0]->mobile_number;?>" name="mobile_number">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Session <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="session" value="<?php echo $student_info[0]->session;?>" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Roll <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="roll" value="<?php echo $student_info[0]->students_roll;?>" class="form-control" required>
                                </div>
                            </div>

                            <!--div class="form-group">
                                <label class="col-md-2 control-label">Shift <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <select name="shift" class="form-control">
                                        <option value="">-- Select Class --</option>
                                        <option value="day" <?php if($student_info[0]->student_shift=="day")echo "selected"; ?>>Day</option>
                                        <option value="morning" <?php if($student_info[0]->student_shift=="morning")echo "selected"; ?>>Morning</option>
                                    </select>
                                </div>
                            </div-->

                            <div class="form-group">
                                <label class="col-md-2 control-label">Section <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <select name="section" class="form-control">
                                        <option value="">-- Select Section --</option>
                                        <option <?php if($student_info[0]->student_section=="Section_I") echo "selected"; ?> value="Section_I" <?php if($student_info[0]->student_group=="Section I")echo "selected"; ?>>Section I</option>
                                        <option <?php if($student_info[0]->student_section=="Section_II") echo "selected"; ?> value="Section_II" <?php if($student_info[0]->student_group=="Section II")echo "selected"; ?>>Section II</option>
                                        <option <?php if($student_info[0]->student_section=="Section_III") echo "selected"; ?> value="Section_III" <?php if($student_info[0]->student_group=="Section III")echo "selected"; ?>>Section III</option>I
                                        <option <?php if($student_info[0]->student_section=="Section_IV") echo "selected"; ?> value="Section_IV" <?php if($student_info[0]->student_group=="Section IV")echo "selected"; ?>>Section IV</option>
                                        <option <?php if($student_info[0]->student_section=="Section_V") echo "selected"; ?> value="Section_V" <?php if($student_info[0]->student_group=="Section V")echo "selected"; ?>>Section V</option>
                                        <option <?php if($student_info[0]->student_section=="Section_VI") echo "selected"; ?> value="Section_VI" <?php if($student_info[0]->student_group=="Section VI")echo "selected"; ?>>Section VI</option>
                                        <option <?php if($student_info[0]->student_section=="Section_VII") echo "selected"; ?> value="Section_VII" <?php if($student_info[0]->student_group=="Section VII")echo "selected"; ?>>Section VII</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Group</label>
                                <div class="col-md-5">
                                    <select name="group" class="form-control">
                                        <option value="">-- Select Group --</option>
                                        <option <?php if($student_info[0]->student_group=="Science") echo "selected"; ?> value="Science">Science</option>
                                        <option <?php if($student_info[0]->student_group=="Huminities") echo "selected"; ?> value="Huminities">Huminities</option>
                                        <option <?php if($student_info[0]->student_group=="Business_Studies") echo "selected"; ?> value="Business_Studies">Business Studies</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Class <span class="req">*</span></label>
                                <div class="col-md-5">
                                    <select name="class" class="form-control">
                                        <option value="">-- Select Class --</option>
                                        <option <?php  if($student_info[0]->class=="Eleven") {echo "selected";} ?> value="Eleven">Eleven</option>
                                        <option <?php  if($student_info[0]->class=="Twelve") {echo "selected";} ?> value="Twelve">Twelve</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Student Photo</label>
                                <div class="col-md-5">
                                    <input id="input-test" type="file" name="attachFile" class="form-control file" data-show-preview="false" data-show-upload="false" data-show-remove="false">
                                </div>
                            </div>  

                            <div class="col-md-7">
                            <div class="btn-group pull-right">
                                <input type="submit" value="Update" name="student_edit" class="btn btn-success">
                            </div>
                            </div>

                        </form>
                    </div>

                </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>



