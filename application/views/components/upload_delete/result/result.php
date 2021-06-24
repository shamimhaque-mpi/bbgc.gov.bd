<div class="container-fluid">
    <div class="row">
    <?php echo $confirmation; ?>
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Result</h1>
                </div>
            </div>

            <div class="panel-body">

                <!--blockquote class="form-head">

                    <h4>Result Upload</h4>

                    <ol style="font-size: 14px;">
                        <li>1. Fill all the required <mark>*</mark> fields</li>
                        <li>2. You can upload <mark>.pdf</mark> files</li>
                        <li>3. Click the <mark>save</mark> button to insert data</li>
                    </ol>

                </blockquote>

                <hr-->

                 <!-- horizontal form -->

                
                <?php
                $attr=array(
                    "class"=>"form-horizontal"
                    );
                echo form_open_multipart("",$attr); ?>
        
                    <div class="form-group">
                        <label class="col-md-2 control-label">Class <span class="req">*</span></label>
                        <div class="col-md-5">
                            <select name="result_class" class="form-control" required>
                                <option value="">-- Select Class --</option>
                                <optgroup label="HSC">
                                    <option value="hsc_1st_year">HSC 1st Year</option>
                                    <option value="hsc_2nd_year">HSC 2nd Year</option>
                                </optgroup>
                                <optgroup label="BA">
                                    <option value="ba_1st_year">BA 1st Year</option>
                                    <option value="ba_2nd_year">BA 2nd Year</option>
                                    <option value="ba_3rd_year">BA 3rd Year</option>
                                </optgroup>
                                <optgroup label="BSS">
                                    <option value="bss_1st_year">BSS 1st Year</option>
                                    <option value="bss_2nd_year">BSS 2nd Year</option>
                                    <option value="bss_3rd_year">BSS 3rd Year</option>
                                </optgroup>
                                <optgroup label="BBS">
                                    <option value="bbs_1st_year">BBS 1st Year</option>
                                    <option value="bbs_2nd_year">BBS 2nd Year</option>
                                    <option value="bbs_3rd_year">BBS 3rd Year</option>
                                </optgroup>
                            </select>
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="col-md-2 control-label">Exam Name <span class="req">*</span></label>
                        <div class="col-md-5">
                            <select name="exam_name" class="form-control" required>
                                <option value="">-- Select item --</option>
                                <option value="Weekly_Exam">Weekly Exam</option>
                                <option value="Monthly_Exam">Monthly Exam</option>
                                <option value="Model_Test">Model Test</option>
                                <option value="Year_Final">Year Final</option>
                            </select>
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="col-md-2 control-label">Attach File ('.pdf ') <span class="req">*</span></label>
                        <div class="col-md-5">
                            <input id="input-test" type="file" name="attachFile" required class="form-control file" data-show-preview="false" data-show-upload="false" data-show-remove="false">
                        </div>
                    </div> 

                    <div class="col-md-7">
                    <div class="btn-group pull-right">
                        <input type="submit" name="result_submit" value="Upload" class="btn btn-primary">
                    </div>
                    </div>
                    
                <?php echo form_close(); ?>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

