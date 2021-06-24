<style>
    /* texteditor style */
#mceu_22{
    border: 1px solid #eee !important;
}
</style>


<div class="container-fluid">
    <div class="row">
        <?php echo $confirmation; ?>
        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Set Instruction</h1>
                </div>
            </div>

            <div class="panel-body">
                    

                <?php
                $attr=array(
                    "class"=>"form"
                    );
                 echo form_open("",$attr);?>

                    <div class="form-group row">
                        <label class="control-label col-md-2">Set Instruction <span class="req">*</span></label>
			<div class="col-md-5">
                        <textarea name="instruction" class="form-control" cols="30" rows="4" placeholder="Important Instruction....." ></textarea>
			</div>
                    </div> 
                         

                    <div class="col-md-7">
	                    <div class="btn-group pull-right">
	                        <input type="submit" value="Save" name="save_inst" class="btn btn-primary">
	                    </div>
                    </div>

                <?php echo form_close(); ?>

            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
        <?php if($instruction!=""){?>
        <div class="panel panel-default">
        
        
        <div class="panel-heading">
        	<div class="panal-header-title pull-left">
                    <h1>Show Instruction</h1>
                </div>
        </div>
        
        <div class="panel-body">
        	<table class="table table-bordered">
        		<tr>
        			<th class="num-center">SL</th>
        			<th>Instruction</th>
        			<th>Action</th>
        		</tr>
        		<?php foreach($instruction as $key=>$admit){?>
        		<tr>
        			<td class="num-center"><?php echo $key+1; ?></td>
        			<td class="text-wrap"><?php echo $admit->details; ?></td>
        			<td style="width: 70px;">

                        <a class="btn btn-danger" href="?id=<?php echo $admit->id; ?>">Delete</a>
                    </td>
        		</tr>
        		<?php } ?>
        	</table>
        </div>
        
        <div class="panel-footer">&nbsp;</div>
        </div>
        <?php } ?>
        
        
    </div>
</div>

