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
                        <li>1 . Fill all this fields and press <mark>Save</mark> button</li>
                    </ol>

                </blockquote>
                
                <hr>

                <form action="" class="form-horizontal">

                    <div class="form-group">
                        <label class="col-md-3 control-label">Exam Name <span class="req">*</span></label>

                        <div class="col-md-9">
                            <input type="text" placeholder="Type Exam Name" name="exam_name" class="form-control" required>
                        </div>
                    </div>
        
                    <div class="form-group">
                        <label class="col-md-3 control-label">Class <span class="req">*</span></label>

                        <div class="col-md-9">
                            <select name="class" class="form-control" required>
                                <option value="">-- Select class --</option>
                                <option value="Eleven">Eleven</option>
                                <option value="Twelve">Twelve</option>
                            </select>
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="col-md-3 control-label"><input type="checkbox" name="marks" value="objective" checked>  1st Model Test (%) <span class="req">*</span></label>

                        <div class="col-md-9">
                            <input type="text" name="1st_model_test" class="form-control" placeholder="0" >
                        </div>
                    </div> 
                    

                    <div class="form-group">
                        <label class="col-md-3 control-label"><input type="checkbox" name="marks[]" value="viva" checked> 1st Semester (%) <span class="req">*</span></label>

                        <div class="col-md-9">
                            <input type="text" class="form-control" name="1st_semester" placeholder="0" >
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="col-md-3 control-label"><input type="checkbox" name="marks[]" value="viva" checked> 2nd Model Test <span class="req">*</span></label>

                        <div class="col-md-9">
                            <input type="text" class="form-control" name="2nd_model_test" placeholder="0" >
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="col-md-3 control-label"><input type="checkbox" name="marks[]" value="viva" checked> Subject Mark (%) <span class="req">*</span></label>

                        <div class="col-md-9">
                            <input type="text" class="form-control" name="subject_mark" placeholder="100" >
                        </div>
                    </div> 

                    <div class="btn-group pull-right">
                        <input type="submit" value="Save" class="btn btn-primary">
                    </div>

                </form>

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

