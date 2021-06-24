<div class="container-fluid">
    <div class="row">
    <?php echo $confirmation; ?>
        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Set Class & Subject</h1>
                </div>
            </div>

            <div class="panel-body">

                <!-- horizontal form -->

                <!--blockquote class="form-head">

                    <h4>Add Class & Subject</h4>

                    <ol style="font-size: 14px;">
                        <li>1. Fill all the required <mark>*</mark> fields</li>
                        <li>2. Click the <mark>save</mark> button to insert data</li>
                    </ol>

                </blockquote>

                <hr-->

                <?php
                    $attr=array('class'=>'form-horizontal');
                    echo form_open('',$attr); 
                ?>
        
                    <div class="form-group">
                        <label class="col-md-3 control-label">Class <span class="req">*</span></label>

                        <div class="col-md-9">
                            <select name="CS_class" class="form-control" required>
                                <option value="">-- Select class --</option>
                                <option value="Eleven">Eleven</option>
                                <option value="Twelve">Twelve</option>
                            </select>
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="col-md-3 control-label">Group <span class="req">*</span></label>

                        <div class="col-md-9">
                            <select name="CS_group" class="form-control" required>
                                <option value="">-- Select group --</option>
                                <option value="Science">Science</option>
                                <option value="Arts">Arts</option>
                                <option value="Commerce">Commerce</option>
                            </select>
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="col-md-3 control-label">Subject <span class="req">*</span></label>

                        <div class="col-md-9">
                            <select name="CS_subject" class="form-control" required>
                                <option value="">-- Select Subject --</option>
                                <optgroup  label="Eleven & Twelve">
                                    <option value="bangla_1st_paper">Bangla 1st Paper</option>
                                    <option value="bangla_2nd_paper">Bangla 2nd Paper</option>
                                    <option value="english_1st_paper">English 1st Paper</option>
                                    <option value="english_2nd_paper">English 2nd Paper</option>  
                                <option value="ict">ICT</option> 

                                </optgroup>
                                    <optgroup  label="Science">
                                    <option value="physics_1st_paper">Physics 1st Paper</option>
                                    <option value="physics_2nd_paper">Physics 2nd Paper</option>
                                    <option value="chemistry_1st_paper">Chemistry 1st Paper</option>
                                    <option value="chemistry_2nd_paper">Chemistry 2nd Paper</option>
                                    <option value="botany">Botany</option>
                                    <option value="zoology">Zoology</option>
                                    <option value="higher_math_1st_paper">Higher Math 1st Paper</option>
                                    <option value="higher_math_2nd_paper">Higher Math 2nd Paper</option>
                                </optgroup>

                                <optgroup  label="Arts">
                                    <option value="history_1st_paper">History 1st Paper</option>
                                    <option value="history_2nd_paper">History 2nd Paper</option>
                                    <option value="civics_and_good_governance_1st_paper">Civics & Good Governance 1st Paper</option>
                                    <option value="civics_and_good_governance_2nd_paper">Civics & Good Governance 2nd Paper</option>
                                    <option value="economics_1st_paper">Economics 1st Paper</option>
                                    <option value="economics_2nd_paper">Economics 2nd Paper</option>
                                    <option value="social_science_1st_paper">Social Science 1st Paper</option>
                                    <option value="social_science_2nd_paper">Social Science 2nd Paper</option>
                                    <option value="social_action_1st_paper">Social Action 1st Paper</option>
                                    <option value="social_action_2nd_paper">Social Action 2nd Paper</option>   
                                </optgroup>

                                <optgroup label="Commerce">
                                    <option value="business_organization_and_management_1st_paper">Business Organization and Management 1st Paper</option>
                                    <option value="business_organization_and_management_2nd_paper">Business Organization and Management 2nd Paper</option>
                                    <option value="accounting_1st_paper">Accounting 1st Paper</option>
                                    <option value="accounting_2nd_paper">Accounting 2nd Paper</option>
                                    <option value="finance_and_banking_1st_paper">Finance & Banking 1st Paper</option>
                                    <option value="finance_and_banking_2nd_paper">Finance & Banking 2nd Paper</option>
                                    <option value="production_management_and_marketing_1st_paper">Production Management and Marketing 1st Paper</option>
                                    <option value="production_management_and_marketing_2nd_paper">Production Management and Marketing 2nd Paper</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>

                    <div class="btn-group pull-right">
                        <input type="submit" name="submit_subject" value="Save" class="btn btn-primary">
                    </div>

                <?php echo form_close(); ?>

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

