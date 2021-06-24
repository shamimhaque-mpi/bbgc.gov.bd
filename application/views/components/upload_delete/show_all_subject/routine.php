
<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Routine</h1>
                </div>
            </div>

            <div class="panel-body">

                <!--blockquote class="form-head">

                    <h4>Routine Upload</h4>

                    <ol style="font-size: 14px;">
                        <li>1. fill all the required <mark>*</mark> fields</li>
                        <li>2. you can upload only <mark>.pdf</mark> files</li>
                        <li>3. Click the <mark>save</mark> button to insert data</li>
                    </ol>

                </blockquote>

                
                <hr-->

                <!-- horizontal form -->


                <form action="" class="form-horizontal">
        
                    <div class="form-group">
                        <label class="col-md-3 control-label">Class <span class="req">*</span></label>

                        <div class="col-md-9">
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
                        <label class="col-md-3 control-label">Select File ('.pdf ') <span class="req">*</span></label>

                        <div class="col-md-9">
                            <input id="input-test" type="file" name="selectFile" required class="form-control file" data-show-preview="false" data-show-upload="false" data-show-remove="false">
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

