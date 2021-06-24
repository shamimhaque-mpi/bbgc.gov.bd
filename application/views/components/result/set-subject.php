<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Set Subjects</h1>
                </div>
            </div>

            <div class="panel-body">
                <!-- horizontal form -->

                <div class="row">
                    
                    <div class="col-sm-8 clearfix">

                        <blockquote class="form-head">

                            <h4>Set Subjects & Marks</h4>

                            <ol style="font-size: 14px;">
                                <li> 1 . Fill all this fields and press <mark>Save</mark> button</li>
                            </ol>

                        </blockquote>
                        
                        <hr>

                        <form action="" class="form-horizontal">
                
                            <div class="form-group">
                                <label class="col-md-4 control-label">Class <span class="req">*</span></label>

                                <div class="col-md-8">
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
                                <label class="col-md-4 control-label">Subject Name <span class="req">*</span></label>

                                <div class="col-md-8">
                                    <select name="subjectname" class="form-control" required>
                                        <option value="">-- Select subject --</option>
                                        <option value="1">subject-a</option>
                                        <option value="2">subject-b</option>
                                        <option value="2">subject-c</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"><input type="checkbox" name="marks[]" value="written" checked> Written <span class="req">*</span></label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="written" placeholder="Type Marks" >
                                </div>
                            </div> 

                            <div class="form-group">
                                <label class="col-md-4 control-label"><input type="checkbox" name="marks" value="objective" checked> Objective <span class="req">*</span></label>

                                <div class="col-md-8">
                                    <input type="text" name="" class="form-control" placeholder="Type Marks" >
                                </div>
                            </div> 
                            

                            <div class="form-group">
                                <label class="col-md-4 control-label"><input type="checkbox" name="marks[]" value="viva" checked> Viva Voce <span class="req">*</span></label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="viva" placeholder="Type Marks" >
                                </div>
                            </div> 

                            <div class="btn-group pull-right">
                                <input type="submit" value="Save" class="btn btn-primary">
                            </div>

                        </form>

                    </div>


                    <div class="col-sm-4">

                        <blockquote class="form-head">

                            <h4>Subjects</h4>

                        </blockquote>

                        <hr>

                        <div class="all-notice">
                            <ul>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a></li>
                            </ul>
                        </div>
                    
                    </div>

                </div>

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

