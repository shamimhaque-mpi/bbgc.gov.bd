<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Admission</h1>
                </div>
            </div>

            <div class="panel-body">

                <div class="row">
                    <div class="col-sm-12">
                        <blockquote class="form-head">

                            <h4>Add Admission Data</h4>

                            <ol style="font-size: 14px;">
                                <li>1. fill all the required <mark>*</mark> fields</li>
                                <li>2. click the <mark>save</mark> button to insert data</li>
                            </ol>

                        </blockquote>

                        <hr>

                        <form action="" class="form-horizontal">

                            <div class="form-group">
                                <label class="col-md-3 control-label">PIN Number <span class="req">*</span></label>
                                
                                <div class="col-md-9">
                                    <input type="text" name="pinNumber" class="form-control" required>
                                </div>
                            </div>

                            <div class="btn-group pull-right">
                                <input type="submit" value="Show" class="btn btn-primary">
                            </div>

                        </form>

                    </div>
                </div> 

                <hr>

                <!-- horizontal form -->
                
                <div class="row">
                    <div class="col-sm-12">

                        <form action="" class="form-horizontal">

                            <div class="form-group">
                                <label class="control-label col-md-3">Student's Photo <span class="req">&nbsp;</span></label>

                                <div class="col-md-9">
                                    <img src="<?php echo base_url('private'); ?>/images/pic-male.png" width="80px" height="80px" alt="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Student's Name <span class="req">&nbsp;</span></label>
                                
                                <div class="col-md-9">
                                    <input type="text" name="applicant_eng" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Father's Name <span class="req">&nbsp;</span></label>
                                
                                <div class="col-md-9">
                                    <input type="text" name="father_eng" class="form-control" readonly>
                                </div>
                            </div>

                            

                            <div class="form-group">
                                <label class="col-md-3 control-label">Mother's Name <span class="req">&nbsp;</span></label>
                                
                                <div class="col-md-9">
                                    <input type="text" name="mother_eng" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Date of Birth <span class="req">&nbsp;</span></label>
                                
                                <div class="col-md-9">
                                    <input type="text" name="birth" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Gaurdian Mobile <span class="req">&nbsp;</span></label>
                                
                                <div class="col-md-9">
                                    <input type="text" name="gaurdian_mobile" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Class <span class="req">&nbsp;</span></label>
                                
                                <div class="col-md-9">
                                    <input type="text" name="class" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Admission Type <span class="req">*</span></label>
                                <div class="col-md-9">
                                    <select name="admissionType" class="form-control" required>
                                        <option value="">-- Select Type--</option>
                                        <option value="residential">Residential</option>
                                        <option value="non_residential" >Non Residential</option>
                                    </select>
                                </div>
                            </div>

                            <div>

                                <div class="form-group">
                                    <label class="col-sm-offset-3 col-md-9 control-label" style="text-align: left;">
                                        <input type="checkbox" name="admission" required>
                                        Click for the Admission
                                    </label>
                                </div>

                                <div class="btn-group pull-right">
                                    <input type="submit" value="Save" class="btn btn-primary">
                                </div>

                            </div>

                        </form>

                    </div>

                </div>
                

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

