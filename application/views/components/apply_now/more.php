<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo site_url('public/bootstrap-datetimepicker-master/js/moment.js'); ?>"></script>
<script type="text/javaScript" src="<?php echo site_url('public/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo site_url('public/js/bootstrap.js'); ?>"></script>
<link href="<?php echo site_url('private/plugins/bootstrap-datetimepicker-master/build/css/bootstrap-datetimepicker.min.css'); ?>" rel="stylesheet">
<!-- Bootstrap file upload CSS -->
<link href="<?php echo site_url('private/plugins/bootstrap-fileinput-master/css/fileinput.min.css'); ?>" rel="stylesheet">
<!-- Select Option 2 Stylesheet -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
<style>
    .mb15 {
        margin-bottom: 15px;
    }
</style>

<div class="col-md-12">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title text-center text-uppercase">
                   <h4>Add More Student's Information.</h4>
                </div>
            </div>
         
            <div class="panel-body">
                <?php
                    $attr=array('class'=>'form-horizontal');
                    echo form_open('', $attr);
                    echo $this->session->flashdata("confirmation");
                ?>
 
                    <div class="form-group">
                        <div class="col-sm-6 mb15">
                            <label class="control-label">Dropped Date</label>
                            <div class="input-group date" id="datetimepicker1">
                                <input type="text" class="form-control" name="dropped_date" value="<?php echo (!empty($vital_info[0]->dropped_date)) ? $vital_info[0]->dropped_date : ""; ?>" placeholder="YYYY-MM-DD">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-6 mb15">
                            <label class="control-label">Recommendation Gives On</label>
                            <div>
                                <input type="text" name="recommendation" value="<?php echo (!empty($vital_info[0]->recommendation)) ? $vital_info[0]->recommendation : ""; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6 mb15">
                            <label class="control-label">Reason</label>
                            <div>
                                <textarea name="reason" class="form-control"><?php echo (!empty($vital_info[0]->reason)) ? $vital_info[0]->reason : ""; ?></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6 mb15">
                            <label class="control-label">Remarks</label>
                            <div>
                                <textarea name="remarks" class="form-control"><?php echo (!empty($vital_info[0]->remarks)) ? $vital_info[0]->remarks : ""; ?></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6 mb15">
                            <label class="control-label">Scholarship Type</label>
                            <div>
                                <select name="scholarship_type" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                                     <option value="" disabled >--Selcet Scholarship Type--</option>
                                     <option <?php  if((!empty($vital_info[0]->scholarship_type) ? $vital_info[0]->scholarship_type : '')=='Talent Pool'){echo "selected"; } ?> value="Talent Pool">Talent Pool</option>
                                     <option <?php  if((!empty($vital_info[0]->scholarship_type) ? $vital_info[0]->scholarship_type : '')=='General'){echo "selected"; } ?>  value="General">General</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 mb15">
                            <label class="control-label">Annual Lump Grant 1<sup>st</sup> Year(TK)</label>
                            <div>
                                <input type="number" step="any" name="first_year_tk" value="<?php echo (!empty($vital_info[0]->first_year_tk)) ? $vital_info[0]->first_year_tk : ""; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6 mb15">
                            <label class="control-label">Annual Lump Grant 2<sup>nd</sup> Year(TK)</label>
                            <div>
                                <input type="number" step="any" name="second_year_tk" value="<?php echo (!empty($vital_info[0]->second_year_tk)) ? $vital_info[0]->second_year_tk : ""; ?>" class="form-control">
                            </div>
                        </div>
                        
                        <div class="col-sm-6 mb15">
                            <label class="control-label">Monthly(TK)</label>
                            <div>
                                <input type="number" step="any" name="monthly_tk" value="<?php echo (!empty($vital_info[0]->monthly_tk)) ? $vital_info[0]->monthly_tk : ""; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6 mb15">
                            <label class="control-label">Period(Total Months)</label>
                            <div>
                                <input type="number" name="period" value="<?php echo (!empty($vital_info[0]->period)) ? $vital_info[0]->period : ""; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-3 mb15">
                            <label class="control-label">From</label>
                            <select name="from" class="form-control" data-show-subtext="true" data-live-search="true">
                                <option value="" disabled selected >--Selcet Year--</option>
                                <?php for ($x = 2016; $x <= date('Y'); $x++) { ?>
                                <option  <?php  if((!empty($vital_info[0]->from) ? $vital_info[0]->from : '')==$x){echo "selected"; } ?> value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-sm-3 mb15">
                            <label class="control-label">To</label>
                            <select name="to" class="form-control" data-show-subtext="true" data-live-search="true">
                                <option value="" disabled selected >--Selcet Year--</option>
                                <?php for ($x = 2016; $x <= date('Y')+1; $x++) { ?>
                                <option <?php  if((!empty($vital_info[0]->to) ? $vital_info[0]->to : '')==$x){echo "selected"; } ?> value="<?php echo $x; ?>" value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    
                    
                    <div class"col-sm-12">
                        <label class="control-label">Outstanding Achivements</label>
                    </div>
                    <div class="col-sm-4 mb15">
                        <label class="control-label">TC Date</label>
                        <div class="input-group date" id="datetimepicker3">
                            <input type="text" class="form-control" name="tc_date" value="<?php echo (!empty($vital_info[0]->tc_date)) ? $vital_info[0]->tc_date : ""; ?>" placeholder="YYYY-MM-DD">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-4 mb15">
                        <label class="control-label">Field One</label>
                        <div>
                            <input type="text" name="outstanding_field_1" value="<?php echo (isset($vital_info[0]->outstanding_field_1)) ? $vital_info[0]->outstanding_field_1 : ""; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4 mb15">
                        <label class="control-label">Field Two</label>
                        <div>
                            <input type="text" name="outstanding_field_2" value="<?php echo (isset($vital_info[0]->outstanding_field_2)) ? $vital_info[0]->outstanding_field_2 : ""; ?>" class="form-control">
                        </div>
                    </div>
                    
                    
                    
                    <div class="col-sm-6 mb15">
                        <label class="control-label">Promoted To Class XII ?</label>
                        <div style="display: flex;">
                            <label style="display: flex; align-items: center;">
                                <input type="radio" name="promoted_to_class_XII" value="1" <?php echo (isset($vital_info[0]->promoted_to_class_XII) && $vital_info[0]->promoted_to_class_XII==1) ? "checked" : ""; ?> >
                                <span style="margin-left: 1rem;">Yes</span>
                            </label>
                            
                            <label style="display: flex; align-items: center;margin-left: 2rem;">
                                <input type="radio" name="promoted_to_class_XII" value="0" <?php echo (isset($vital_info[0]->promoted_to_class_XII) && $vital_info[0]->promoted_to_class_XII==0) ? "checked" : ""; ?> >
                                <span style="margin-left: 0.8rem;">No</span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="col-sm-6 mb15">
                        <label class="control-label">Sent Up HSC Exam ?</label>
                        <div style="display: flex;">
                            <label style="display: flex; align-items: center;">
                                <input type="radio" name="sent_up_HSC_exam" value="1" <?php echo (isset($vital_info[0]->promoted_to_class_XII) && $vital_info[0]->promoted_to_class_XII==1) ? "checked" : ""; ?> >
                                <span style="margin-left: 1rem;">Yes</span>
                            </label>
                            
                            <label style="display: flex; align-items: center;margin-left: 2rem;">
                                <input type="radio" name="sent_up_HSC_exam" value="0" <?php echo (isset($vital_info[0]->promoted_to_class_XII) && $vital_info[0]->promoted_to_class_XII==0) ? "checked" : ""; ?> >
                                <span style="margin-left: 0.8rem;">No</span>
                            </label>
                        </div>
                    </div>
                    
                    
                    
                    
                    <div class="col-md-12">
                        <label class="control-label">CO-CURRICULAR ACTIVITIES</label>
                    </div>

                    <div class="col-sm-3 mb15">
                        <label class="control-label">Science Club <small>(Office or Details:)</small></label>
                        <div>
                            <input type="text" name="sc_office" value="<?php echo (!empty($vital_info[0]->sc_office)) ? $vital_info[0]->sc_office : ""; ?>" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-3 mb15">
                        <label class="control-label">Awards</label>
                        <div>
                            <input type="text" name="sc_awards" value="<?php echo (!empty($vital_info[0]->sc_awards)) ? $vital_info[0]->sc_awards : ""; ?>" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-3 mb15">
                        <label class="control-label">Science Fair <small>(Office or Details:)</small></label>
                        <div>
                            <input type="text" name="sf_office" value="<?php echo (!empty($vital_info[0]->sf_office)) ? $vital_info[0]->sf_office : ""; ?>" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-3 mb15">
                        <label class="control-label">Awards</label>
                        <div>
                            <input type="text" name="sf_awards" value="<?php echo (!empty($vital_info[0]->sf_awards)) ? $vital_info[0]->sf_awards : ""; ?>" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-3 mb15">
                        <label class="control-label">Com/Arts/Sci Club: <small>(Office or Details:)</small></label>
                        <div>
                            <input type="text" name="casc_office" value="<?php echo (!empty($vital_info[0]->casc_office)) ? $vital_info[0]->casc_office : ""; ?>" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-3 mb15">
                        <label class="control-label">Awards</label>
                        <div>
                            <input type="text" name="casc_awards" value="<?php echo (!empty($vital_info[0]->casc_awards)) ? $vital_info[0]->casc_awards : ""; ?>" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-3 mb15">
                        <label class="control-label" style="font-size: 10px;">Notre Dame Volunteer's Alliance: <small>(Office or Details:)</small></label>
                        <div>
                            <input type="text" name="ndva_office" value="<?php echo (!empty($vital_info[0]->ndva_office)) ? $vital_info[0]->ndva_office : ""; ?>" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-3 mb15">
                        <label class="control-label">Awards</label>
                        <div>
                            <input type="text" name="ndva_awards" value="<?php echo (!empty($vital_info[0]->ndva_awards)) ? $vital_info[0]->ndva_awards : ""; ?>" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-3 mb15">
                        <label class="control-label"><strong>Debate </strong> College</small></label>
                        <div>
                            <input type="text" name="debate_college" value="<?php echo (!empty($vital_info[0]->debate_college)) ? $vital_info[0]->debate_college : ""; ?>" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-3 mb15">
                        <label class="control-label">Inter College</label>
                        <div>
                            <input type="text" name="debate_inter_college" value="<?php echo (!empty($vital_info[0]->debate_inter_college)) ? $vital_info[0]->debate_inter_college : ""; ?>" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-3 mb15">
                        <label class="control-label">Awards</label>
                        <div>
                            <input type="text" name="debate_awards" value="<?php echo (!empty($vital_info[0]->debate_awards)) ? $vital_info[0]->debate_awards : ""; ?>" class="form-control">
                        </div>
                    </div>
                    
                    <div class="col-sm-3 mb15" style="margin: 5px 0;">
                        <br>
                        <input type="submit" name="save" class="btn btn-primary" value="Save">
                    </div>

                
            
                <?php echo form_close(); ?>
            </div>
         
            <div class="panel-footer">&nbsp;</div>
         
        </div>
    </div>
</div>

<!-- All plugins -->
<script type="text/javaScript" src="<?php echo site_url('private/js/bootstrap.min.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<script type="text/javaScript" src="<?php echo site_url('private/plugins/bootstrap-fileinput-master/js/fileinput.min.js'); ?>"></script>
<script type="text/javaScript" src="http://ndcm.edu.bd/private/plugins/peity/jquery.peity.min.js"></script>

        
<script>
    
    $('#datetimepicker1').datetimepicker({
         format: 'YYYY-MM-DD'
    });  
    
    $('#datetimepicker2').datetimepicker({
         format: 'YYYY-MM-DD'
    });
    
    $('#datetimepicker3').datetimepicker({
         format: 'YYYY-MM-DD'
    });
    
</script>

