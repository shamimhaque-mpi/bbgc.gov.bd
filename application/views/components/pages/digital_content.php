
<!-- student insert page start here -->
<div class="column global-pad">
    <div class="row">
        <div style="width:74%;float:left;">
            <?php 
            $attribute_two_a = array(
                'name' => '',
                'class' => 'vertical',
                'id' => ''
            );

            echo form_open_multipart('', $attribute_two_a);
            ?>

            <blockquote class="form-head">
                <h1>Digital Content</h1>
                <small>
                    1. fill all the required <mark>*</mark> fields<br/> 
                    2. click the <mark>save</mark> button to insert data
                </small>
            </blockquote>

            <div class="form-content">
				<div class="form-element">
					<label> Class <sup class="required"></sup></label>
					<select name="" required>
						<option value="">-- Select --</option>
						<option value="6">Six</option>
						<option value="7">Seven</option>
						<option value="8">Eight</option>
						<option value="9">Nine</option>
						<option value="10">Ten</option>
					</select>
				</div>

				<div id="group" class="form-element">
					<label> Group <sup class="required"></sup></label>
					<select name="" required>
						<option value="">-- Select --</option>
						<option value="g1">Science</option>
						<option value="g2">Humanities</option>
						<option value="g3">Commerce</option>
					</select>
				</div>

				<div id="sub_678" class="form-element">
					<label> Subject <sup class="required"></sup></label>
					<select name="" required>
						<option value="">-- Select --</option>
						<option value="sub1">বাংলা ১ম পত্র</option>
						<option value="sub2">বাংলা ২য় পত্র</option>
						<option value="sub3">ইংরেজি ১ম পত্র</option>
						<option value="sub4">ইংরেজি ২য় পত্র</option>
						<option value="sub5">গণিত</option>
						<option value="sub6">বিজ্ঞান</option>
						<option value="sub7">বাংলাদেশ ও বিশ্বপরিচিতি</option>
						<option value="sub8">ইসলাম ও নৈতিক শিক্ষা</option>
						<option value="sub8">হিন্দুধর্ম ও নৈতিক শিক্ষা</option>
						<option value="sub8">খ্রিষ্টানধর্ম ও নৈতিক শিক্ষা</option>
						<option value="sub8">বৌদ্ধধর্ম ও নৈতিক শিক্ষা</option>
						<option value="sub9">কৃষিশিক্ষা</option>
						<option value="sub10">গার্হস্থ্যবিজ্ঞান</option>
						<option value="sub11">ক্ষুদ্র নৃগোষ্ঠীর ভাষা ও সংস্কৃতি</option>
						<option value="sub12">তথ্য ও যোগাযোগ প্রযুক্তি</option>
						<option value="sub13">কর্ম ও জীবনমুখী শিক্ষা</option>
						<option value="sub14">শারীরিক শিক্ষা ও স্বাস্থ্য</option>
						<option value="sub15">চারু ও কারুকলা</option>
						<option value="sub16">আরবি</option>
						<option value="sub17">সংস্কৃত</option>
						<option value="sub18">পালি</option>
					</select>
				</div>
				
				<div id="sub_910" class="form-element">
					<label> Subject <sup class="required"></sup></label>
					<select name="" required>
						<option value="">-- Select --</option>
						<option value="sub1">বাংলা ১ম পত্র</option>
						<option value="sub2">বাংলা ২য় পত্র</option>
						<option value="sub3">ইংরেজি ১ম পত্র</option>
						<option value="sub4">ইংরেজি ২য় পত্র</option>
						<option value="sub5">গণিত</option>
						<option value="sub6">বিজ্ঞান</option>
						<option value="sub7">বাংলাদেশ ও বিশ্বপরিচিতি</option>
						<option value="sub8">বাংলাদেশের ইতিহাস ও বিশ্বসভ্যতা</option>
						<option value="sub9">পৌরণীতি ও নাগরিকতা</option>
						<option value="sub10">অর্থনীতি</option>
						<option value="sub11">ভূগোল ও পরিবেশ</option>
						<option value="sub12">ব্যবসায় উদ্যোগ</option>
						<option value="sub13">হিসাববিজ্ঞান</option>
						<option value="sub14">ফাইনান্স ও ব্যাংকিং</option>
						<option value="sub15">পদার্থবিজ্ঞান</option>
						<option value="sub16">রসায়ন</option>
						<option value="sub17">জীববিজ্ঞান</option>
						<option value="sub18">উচ্চতর গণিত</option>
						<option value="sub19">ইসলাম ও নৈতিক শিক্ষা</option>
						<option value="sub20">হিন্দুধর্ম ও নৈতিক শিক্ষা</option>
						<option value="sub21">খ্রিষ্টানধর্ম ও নৈতিক শিক্ষা</option>
						<option value="sub22">বৌদ্ধধর্ম ও নৈতিক শিক্ষা</option>
						<option value="sub23">কৃষিশিক্ষা</option>
						<option value="sub24">গার্হস্থ্যবিজ্ঞান</option>
						<option value="sub25">উচ্চতর গণিত</option>
						<option value="sub26">ক্ষুদ্র নৃগোষ্ঠীর ভাষা ও সংস্কৃতি</option>
						<option value="sub27">তথ্য ও যোগাযোগ প্রযুক্তি</option>
						<option value="sub28">কর্ম ও জীবনমুখী শিক্ষা</option>
						<option value="sub29">শারীরিক শিক্ষা ও স্বাস্থ্য</option>
						<option value="sub30">চারু ও কারুকলা</option>
						<option value="sub31">আরবি</option>
						<option value="sub32">সংস্কৃত</option>
						<option value="sub33">সঙ্গীত</option>
						<option value="sub34">বেসিক ট্রেড</option>
						<option value="sub35">পালি</option>
					</select>
				</div>

                <div class="form-element">
                    <label for="in1">Title <sup class="required"></sup></label>
                    <input type="text" name="title" placeholder="" id="in1" required />
                </div>

                <div class="form-element">
                    <label for="file">Select File <sup class="required"></sup></label>
                    <span class="upload">
                        <input type="file" name="file" id="file" data-upload="upload" required />
                        <input type="text" placeholder="Select a file from your computer ..." id="upload" readonly />
                    </span>
                </div>
            </div>

            <blockquote class="form-foot">
                <a class="button" style="float:left;">Delete</a>
                <input type="submit" class="button" value="Save" />
            </blockquote>
        </div>

            <div class="panel-custom" style="width:25%;float:right;">
                <blockquote class="panel-custom-head">
                    <h1>Content list</h1>
                    <small>
                        1 . click on a file Title to select for <mark>Delete</mark> 
                    </small>
                </blockquote>

                <div class="panel-custom-content panel-custom-list">
                    <ul>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> Exam routin show here.</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> Contrary to popular belief.</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> Font Awesome icons just about anywhere.</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> It is a long established fact.</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> There are many variations of passages.</a></li>
                    </ul>
                </div>
            </div>
    </div>
</div>
<!-- student insert page end here -->



