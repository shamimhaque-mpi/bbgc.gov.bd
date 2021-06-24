<div class="col-md-9">
    <!-- Transition area stare -->
    <div class="row single search">
        <h3>Transaction Information</h3>

        <form action="" class="generat">
        <div id="mess">
          
        </div>

        <div class="col-md-6">
            <div class="">
                <input type="text" name="trxid" class="form-control" value="" placeholder="TrxID" required />
            </div>
        </div>
    </div>
    <!-- Transition area end -->

    <!-- Basic Information area stare -->
    <div class="row single search" id="basic-info-div">
        <h3>Basic Information</h3>
      
		<div class="col-md-6">
            <div class="">
                <input type="text" name="applicant_eng" value="" class="form-control" placeholder=" শিক্ষার্থীর নাম  (ইংরেজিতে) " required />
            </div>
        </div>
        
        
		<div class="col-md-6">  
            <div class="">
                <input type="text" name="father_eng" class="form-control" value="" placeholder=" পিতার নাম  (ইংরেজিতে) " required />
            </div>
        </div>
		<div class="col-md-6">  
            <div class="">
                <input type="text" name="father_profession" class="form-control" value="" placeholder=" পিতার পেশা" required />
            </div>
        </div>
		<div class="col-md-6">  
            <div class="">
                <input type="text" name="father_designation" class="form-control" value="" placeholder=" পিতার পদবী" required />
            </div>
        </div>
		   <div class="col-md-6">
			<div class="">
                <textarea style="height:120px; resize:none;" name="father_address" class="form-control" placeholder="পিতার ঠিকানা" required></textarea>
            </div>
        </div>
		
		<div class="col-md-6">  
            <div class="">
                <input type="text" name="mother_eng" class="form-control" value="" placeholder=" মাতার নাম  (ইংরেজিতে) " required />
            </div>
        </div>
		 <div class="col-md-6">
            <div class="">
                <select class="form-control" name="nationality" required>
                    <option value="">-- জাতীয়তা নির্বাচন করুন --</option>
                    <option value="bangladeshi">Bangladeshi </option>
                    <option value="other"> Others </option>
                </select>
            </div>
        </div>
		 
        <div class="col-md-6">
            <div class="">
                <input type="text" name="birth" class="form-control date-picker" value="" placeholder="জন্ম তারিখ  [  বছর-মাস-দিন ]" required />
            </div>
        </div>
      </div>
    
    <div class="row single search">
        <h3>Contact Information</h3>      
       
        
        <div class="col-md-6">
			<div class="">
                <textarea name="present_address" class="form-control" placeholder="বর্তমান ঠিকানা" required></textarea>
            </div>
        </div>

        <div class="col-md-6">
            <div class="">
                <textarea name="permanent_address" class="form-control" placeholder="স্থায়ী ঠিকানা" required></textarea>
            </div>
        </div>
		 <div class="col-md-6">
            <div class="">
                <input type="text" name="mobile" class="form-control" value="" placeholder="মোবাইল নাম্বার" required />
            </div>
        </div>
		 <div class="col-md-6">
            <div class="">
                <input type="text" name="gaurdian" class="form-control" value="" placeholder="যোগাযোগকারী অভিভাবকের নাম" required />
            </div>
        </div>
		 <div class="col-md-6">
            <div class="">
                <input type="text" name="gaurdian_mobile" class="form-control" value="" placeholder="অভিভাবকের মোবাইল নাম্বার" required />
            </div>
        </div>
    </div>
        
    <div class="row single search">
        <h3>Instituation Information</h3>        
		
        <div class="col-md-6">
            <div class="">
                <input type="text" name="past_inst" class="form-control" value="" placeholder="পূর্বে যে প্রতিষ্ঠানে অধ্যয়ন করেছে" required />
            </div>
        </div>
		<div class="col-md-6">         
			<select class="form-control" name="class" required>  
				<option value="">-- Select Class --</option>
				<option value="Eleven"> Eleven</option>
				<option value="Twelve">Twelve</option>
			</select>         
        </div>          
       
       
        <div class="col-md-12">
            <div class="">
                <input type="checkbox" name="accept_terms" value="1" id="terms" />
                <label for="terms">I accept the terms and condition.</label>
            </div>
        </div>

        <div class="col-md-12">
            <div class="">
                <input type="submit" value="Submit" name="reg_form" />
            </div>
        </div>
    </div>

    </form>
</div>


