<div class="col-md-12">
   <div class="row">
      <div class="panel panel-default">
         <div class="panel-heading">
            <div class="panal-header-title text-center text-uppercase">
               <h4> Online Admission Permission </h4>
            </div>
         </div>
         <div class="panel-body">
            <div>
                <?php
                    $attr=array('class'=>'form-horizontal');
                    echo form_open_multipart('', $attr);
                ?>
                <?php echo $this->session->flashdata('confirmation'); ?>
               <div class="form-group">
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Permission Set<span class="req">*</span></label>
                     <select name="permission_status" class="form-control" >
                        <option value="" disabled selected>--Select Status--</option>
                        <option <?php echo ($permission[0]->permission_status=="Active" ? "selected" : ''); ?> value="Active">Active</option> 
                        <option <?php echo ($permission[0]->permission_status=="Deactive" ? "selected" : ''); ?> value="Deactive">Deactive</option>
                    <select>
                  </div>
                  <div class="col-sm-6 mb15">
                     <label class="control-label">Online Admin Admission Access Url</label> </br>
                     <label class="control-label">
                         <span class="text-success">ndcm.edu.bd/admission_login</span>
                     </label>
                     
                  </div>
               </div>

               <div class="col-sm-6 mb15">
                  <div class="row">
                     <div class="btn-group pull-right" style="padding: 0 12px;">
                        <input type="submit" value="save" name="save" class="btn btn-primary">
                     </div>
                  </div>
               </div>
               
               <?php echo form_close(); ?>
            </div>
         </div>
         <div class="panel-footer">&nbsp;</div>
      </div>
   </div>
</div>


        


