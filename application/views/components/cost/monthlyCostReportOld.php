<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />


<style>
    .table_responsive{
        min-height: .01%;
        overflow-x: auto;
    }
    @media print{
        aside, nav, .none, .panel-heading, .panel-footer{
            display: none !important;
        }
        .panel{
            border: 1px solid transparent;
            left: 0px;
            position: absolute;
            top: 0px;
            width: 100%;
        }
        .hide{
            display: block !important;
        }
        .block-hide{
            display: none;
        }
        .table_responsive{
            min-height: unset !important;
            overflow-x: unset !important;
        }
    }
    .m-0 {
        margin: 0;
    }
</style>


<div class="container-fluid block-hide">
    <div class="row">

    <!-- horizontal form -->
    <?php
    $attribute = array(
        'name' => '',
        'class' => 'form-horizontal',
        'id' => ''
    );
    echo form_open_multipart('', $attribute);
    ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Search</h1>
                </div>
            </div>

            <div class="panel-body no-padding">
                <div class="no-title">&nbsp;</div>

                <!-- left side -->
                <div class="col-md-9"> 
                        <div class="form-group">
                            <label class="col-md-3 control-label">From</label>
                            <div class="input-group date col-md-7" id="datetimepickerFrom">
                                <input type="text" name="from_date" placeholder="From" class="form-control" >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>   

                        <div class="form-group">
                            <label class="col-md-3 control-label">To</label>
                            <div class="input-group date col-md-7" id="datetimepickerTo">
                                <input type="text" name="to_date" placeholder="To" class="form-control" >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>  

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-7">
                                <div class="btn-group pull-right">
                                    <input class="btn btn-primary" type="submit" name="show" value="Search">
                                </div>
                            </div>
                        </div>
                </div>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>

        <?php echo form_close(); ?>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading none">
                <div class="panal-header-title pull-left">
                    <h1>Monthly All Cost</h1>
                </div>
                <a href="#" class="pull-right none" style="margin-top: 0px; font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
            </div>

            <div class="panel-body">
                <div class="view-profile hide" style="margin-bottom: 20px;">
                   <div class="col-md-12">
                        <!--<div class="row banner">
                         <img style="width: 100%;" class="img-responsive" src="<?php //echo site_url($banner_info[0]->path);?>" alt="Uploaded banner not found!" />
                            <h1 class="text-center m-0">মুক্তাগাছা আব্বাছিয়া কামিল মাদরাসা</h1>
                            <h3 class="text-center m-0">মুক্তাগাছা, ময়মনসিংহ।</h3>
                        </div>-->
                        
                        <div class="col-md-12 m-0">
                            <h4 class="text-center">Monthly Cost Report </h4>
                        </div>

                        <?php if(($this->input->post('show')) && ($this->input->post('from_date')) && ($this->input->post('to_date'))){  ?>
                            <div class="col-md-12 text-right">
                                <h4> Date : <?php  echo $this->input->post('from_date').'-'.$this->input->post('to_date'); ?>  </h4>
                            </div>
                        <?php } ?>    
                    </div>
                </div>
                 
                 <div class="table_responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Date</th>
                            <th>পে স্কেলের সরকারী অংশ ও উৎসব ভাতা</th>
                            <th>শিক্ষক, কর্মচারীদের বেতন ভাতা</th>
                            <th>আপ্যায়ন ব্যায়</th>
                            <th>যাতায়াত ব্যায়</th>
                            <th>নৈমত্তিক ব্যায়</th>
                            <th>বিদ্যুৎ বিল</th>
                            <th>টেলিফোন বিল</th>
                            <th>রেজিস্ট্রেশন ব্যায়</th>
                            <th>বোর্ড/বিশ্ববিদ্যালয় পরীক্ষা ফি</th>
                            <th>ল্যাবরেটরী/বিজ্ঞান</th>
                            <th>কম্পিউটার / ইন্টারনেট</th>
                            <th>ছাত্র কল্যাণ ব্যায়</th>
                            <th>পৌর কর ও জমির খাজনা</th>
                            <th>ব্যাংক কমিশন ও শুল্ক কর্তন</th>
                            <th>উন্নয়ন তহবিল</th>
                            <th>স্কাউট</th>
                            <th>টিফিন</th>
                            <th>ক্রীরা ও সাংস্কৃতিক</th>
                            <th>দরিদ্র তহবিল</th>
                            <th>লাইব্রেরি</th>
                            <th>মাদ্রাসা পরীক্ষা (আভ্যন্তরিন)</th>
                            <th>পত্রিকার বিল</th>
                            <th>নিয়োগ সংক্রান্ত ব্যয়</th>
                            <th>নবিন বরণ/দোয়া অনুষ্ঠান ব্যয়</th>
                            <th>স্কলারশিপ/ষ্টাইপেন্ড প্রদান ব্যয়</th>
                            <th>পরিচয় পত্র ব্যয়</th>
                            <th>অডিট ও পরিদর্শন সংক্রান্ত ব্যয়</th>
                            <th>অপ্রত্যাশিত ব্যয়</th>
                            <th>বিবিধ ব্যায়</th>
                            <th> Total </th>
                        </tr>
 
                  <?php 
                        $date_range = $this->input->post('show');
                        $from_date = $this->input->post('from_date');
                        $to_date = $this->input->post('to_date');
                        $c=0;
                        $f1=$f2=$f3=$f4=$f5=$f6=$f7=$f8=$f9=$f10=$f11=$f12=$f13=$f14=$f15=$f16=$f17
                        =$f18=$f19=$f20=$f21=$f22=$f23=$f24=$f25=$f26=$f27=$f28=$f29=0;
                        if($date_range && $from_date && $to_date){

                            $query = $this->db->query("SELECT distinct date FROM cost WHERE date BETWEEN '$from_date' AND '$to_date' AND trash= 0 order by date asc");
                            $rows = $query->result();
                            $amount_array =array(); 
                ?>            
 
                <?php           
                        
                        foreach($rows as $key => $info){
                                $day = $info->date;
                                $all_cost_field = $this->db->query("SELECT distinct code  FROM cost_field");
                                $cost_fields = $all_cost_field->result();
                                
                                foreach($cost_fields as $cost_field){
                                  $field = $cost_field->code;
                                  
                                  $field_wise_amounts = $this->db->query("SELECT amount  from  cost  where date = '$day'  and cost_field = '$field'  and trash = 0 ");
                                  $field_wise_amount = $field_wise_amounts->result();   
                                  $amount_fieldwise =0;
                                  foreach($field_wise_amount as $amount){
                                      $amount_fieldwise = $amount_fieldwise+$amount->amount;
                                  }    
                                  $amount_array[$field] = $amount_fieldwise;
                                    if(isset($amount_fieldwise)){
                                      $c++;
                                    }  
                                }
                                
                                $sub_total_1 = $sub_total_2 = $sub_total_3 = $sub_total_4 = $sub_total_5 = 
                                $sub_total_6 = $sub_total_7 = $sub_total_8 = $sub_total_9 = $sub_total_10 = 
                                $sub_total_11 = $sub_total_12 = $sub_total_13 = $sub_total_14 = $sub_total_15 = 
                                $sub_total_16 = $sub_total_17 = $sub_total_18 = $sub_total_19 = $sub_total_20 = 
                                $sub_total_21 = $sub_total_22 = $sub_total_23 =$sub_total_24 =$sub_total_25 =
                                $sub_total_26 =$sub_total_27 =$sub_total_28 =$sub_total_29 =0;
                                
                             if($c>0){
                            
                    ?>   
                  
                        <tr>
                            <td style="white-space: nowrap;"><?php echo $info->date;   ?></td>
                            <td><?php if(!empty($amount_array['0004'])){echo $sub_total_1 = $amount_array['0004']; $f1=$f1+$amount_array['0004']; } ?></td>
                            <td><?php if(!empty($amount_array['0005'])){echo $sub_total_2 = $amount_array['0005']; $f2=$f2+$amount_array['0005'];} ?></td>
                            <td><?php if(!empty($amount_array['0006'])){echo $sub_total_3 = $amount_array['0006']; $f3=$f3+$amount_array['0006'];} ?></td>
                            <td><?php if(!empty($amount_array['0007'])){echo $sub_total_4 = $amount_array['0007']; $f4=$f4+$amount_array['0007'];} ?></td>
                            <td><?php if(!empty($amount_array['0008'])){echo $sub_total_5 = $amount_array['0008']; $f5=$f5+$amount_array['0008'];} ?></td>
                            <td><?php if(!empty($amount_array['0009'])){echo $sub_total_6 = $amount_array['0009']; $f6=$f6+$amount_array['0009'];} ?></td>
                            <td><?php if(!empty($amount_array['0011'])){echo $sub_total_7 = $amount_array['0011']; $f7=$f7+$amount_array['0011'];} ?></td>
                            <td><?php if(!empty($amount_array['0012'])){echo $sub_total_8 = $amount_array['0012']; $f8=$f8+$amount_array['0012'];} ?></td>
                            <td><?php if(!empty($amount_array['0013'])){echo $sub_total_9 = $amount_array['0013']; $f9=$f9+$amount_array['0013'];} ?></td>
                            <td><?php if(!empty($amount_array['0014'])){echo $sub_total_10 = $amount_array['0014']; $f10=$f10+$amount_array['0014'];} ?></td>
                            <td><?php if(!empty($amount_array['0018'])){echo $sub_total_11 = $amount_array['0018']; $f11=$f11+$amount_array['0018'];} ?></td>
                            <td><?php if(!empty($amount_array['0020'])){echo $sub_total_12 = $amount_array['0020']; $f12=$f12+$amount_array['0020'];} ?></td>
                            <td><?php if(!empty($amount_array['0021'])){echo $sub_total_13 = $amount_array['0021']; $f13=$f13+$amount_array['0021'];} ?></td>
                            <td><?php if(!empty($amount_array['0022'])){echo $sub_total_14 = $amount_array['0022']; $f14=$f14+$amount_array['0022'];} ?></td>
                            <td><?php if(!empty($amount_array['0024'])){echo $sub_total_15 = $amount_array['0024']; $f15=$f15+$amount_array['0024'];} ?></td>
                            <td><?php if(!empty($amount_array['0025'])){echo $sub_total_16 = $amount_array['0025']; $f16=$f16+$amount_array['0025'];} ?></td>
                            <td><?php if(!empty($amount_array['0026'])){echo $sub_total_17 = $amount_array['0026']; $f17=$f17+$amount_array['0026'];} ?></td>
                            <td><?php if(!empty($amount_array['0027'])){echo $sub_total_18 = $amount_array['0027']; $f18=$f18+$amount_array['0027'];} ?></td>
                            <td><?php if(!empty($amount_array['0028'])){echo $sub_total_19 = $amount_array['0028']; $f19=$f19+$amount_array['0028'];} ?></td>
                            <td><?php if(!empty($amount_array['0029'])){echo $sub_total_20 = $amount_array['0029']; $f20=$f20+$amount_array['0029'];} ?></td>
                            <td><?php if(!empty($amount_array['0030'])){echo $sub_total_21 = $amount_array['0030']; $f21=$f21+$amount_array['0030'];} ?></td>
                            <td><?php if(!empty($amount_array['0010'])){echo $sub_total_23 = $amount_array['0010']; $f23=$f23+$amount_array['0010'];} ?></td>
                            <td><?php if(!empty($amount_array['0015'])){echo $sub_total_24 = $amount_array['0015']; $f24=$f24+$amount_array['0015'];} ?></td>
                            <td><?php if(!empty($amount_array['0016'])){echo $sub_total_25 = $amount_array['0016']; $f25=$f25+$amount_array['0016'];} ?></td>
                            <td><?php if(!empty($amount_array['0017'])){echo $sub_total_26 = $amount_array['0017']; $f26=$f26+$amount_array['0017'];} ?></td>
                            <td><?php if(!empty($amount_array['0019'])){echo $sub_total_27 = $amount_array['0019']; $f27=$f27+$amount_array['0019'];} ?></td>
                            <td><?php if(!empty($amount_array['0023'])){echo $sub_total_28 = $amount_array['0023']; $f28=$f28+$amount_array['0023'];} ?></td>
                            <td><?php if(!empty($amount_array['0031'])){echo $sub_total_29 = $amount_array['0031']; $f29=$f29+$amount_array['0031'];} ?></td>
                            <td><?php if(!empty($amount_array['0032'])){echo $sub_total_22 = $amount_array['0032']; $f22=$f22+$amount_array['0032'];} ?></td>
                            <td><?php  echo number_format(($sub_total_1 + $sub_total_2 + $sub_total_3 + $sub_total_4 + $sub_total_5 + 
                                $sub_total_6 + $sub_total_7 + $sub_total_8 + $sub_total_9 = $sub_total_10 + 
                                $sub_total_11 + $sub_total_12 + $sub_total_13 + $sub_total_14 + $sub_total_15 + 
                                $sub_total_16 + $sub_total_17 + $sub_total_18 + $sub_total_19 + $sub_total_20 + 
                                $sub_total_21 + $sub_total_22 +$sub_total_23+$sub_total_24+$sub_total_25+$sub_total_26
                                +$sub_total_27+$sub_total_28+$sub_total_29),2);  ?>
                            </td>
                        </tr>
                        <?php unset($amount_array);  }  } }else{
                       
                        $incomeField = $this->action->readCostMonthYearwise();
                        foreach($incomeField as $field){
                            $where = array();
                            $from = $field->year.'-'.$field->month.'-01';
                            $to = $field->year.'-'.$field->month.'-31';
                            $query = $this->db->query("SELECT DATE, SUM(amount) AS amount, cost_field FROM cost WHERE date BETWEEN '$from' AND '$to' and trash =0  group by cost_field");
                            $rows = $query->result();
                            $amount_array =array(); 
                            foreach($rows as $key => $info){
                                $amount_array[$info->cost_field] = $info->amount;
                                if(isset($info->amount)){
                                      $c++;
                                }  
                            }
                            
                                $sub_total_1 = $sub_total_2 = $sub_total_3 = $sub_total_4 = $sub_total_5 = 
                                $sub_total_6 = $sub_total_7 = $sub_total_8 = $sub_total_9 = $sub_total_10 = 
                                $sub_total_11 = $sub_total_12 = $sub_total_13 = $sub_total_14 = $sub_total_15 = 
                                $sub_total_16 = $sub_total_17 = $sub_total_18 = $sub_total_19 = $sub_total_20 = 
                                $sub_total_21 = $sub_total_22 = $sub_total_23 =$sub_total_24 =$sub_total_25 =
                                $sub_total_26 =$sub_total_27 =$sub_total_28 =$sub_total_29 =0;  
                            
                            if($c>0){
                            
                    ?>   
                  
                        
                        <tr>
                            <td><?php  get_month_name($field->month);echo '&nbsp'.','.$field->year;   ?></td>
                            <td><?php if(!empty($amount_array['0004'])){echo $sub_total_1 = $amount_array['0004']; $f1=$f1+$amount_array['0004']; } ?></td>
                            <td><?php if(!empty($amount_array['0005'])){echo $sub_total_2 = $amount_array['0005']; $f2=$f2+$amount_array['0005'];} ?></td>
                            <td><?php if(!empty($amount_array['0006'])){echo $sub_total_3 = $amount_array['0006']; $f3=$f3+$amount_array['0006'];} ?></td>
                            <td><?php if(!empty($amount_array['0007'])){echo $sub_total_4 = $amount_array['0007']; $f4=$f4+$amount_array['0007'];} ?></td>
                            <td><?php if(!empty($amount_array['0008'])){echo $sub_total_5 = $amount_array['0008']; $f5=$f5+$amount_array['0008'];} ?></td>
                            <td><?php if(!empty($amount_array['0009'])){echo $sub_total_6 = $amount_array['0009']; $f6=$f6+$amount_array['0009'];} ?></td>
                            <td><?php if(!empty($amount_array['0011'])){echo $sub_total_7 = $amount_array['0011']; $f7=$f7+$amount_array['0011'];} ?></td>
                            <td><?php if(!empty($amount_array['0012'])){echo $sub_total_8 = $amount_array['0012']; $f8=$f8+$amount_array['0012'];} ?></td>
                            <td><?php if(!empty($amount_array['0013'])){echo $sub_total_9 = $amount_array['0013']; $f9=$f9+$amount_array['0013'];} ?></td>
                            <td><?php if(!empty($amount_array['0014'])){echo $sub_total_10 = $amount_array['0014']; $f10=$f10+$amount_array['0014'];} ?></td>
                            <td><?php if(!empty($amount_array['0018'])){echo $sub_total_11 = $amount_array['0018']; $f11=$f11+$amount_array['0018'];} ?></td>
                            <td><?php if(!empty($amount_array['0020'])){echo $sub_total_12 = $amount_array['0020']; $f12=$f12+$amount_array['0020'];} ?></td>
                            <td><?php if(!empty($amount_array['0021'])){echo $sub_total_13 = $amount_array['0021']; $f13=$f13+$amount_array['0021'];} ?></td>
                            <td><?php if(!empty($amount_array['0022'])){echo $sub_total_14 = $amount_array['0022']; $f14=$f14+$amount_array['0022'];} ?></td>
                            <td><?php if(!empty($amount_array['0024'])){echo $sub_total_15 = $amount_array['0024']; $f15=$f15+$amount_array['0024'];} ?></td>
                            <td><?php if(!empty($amount_array['0025'])){echo $sub_total_16 = $amount_array['0025']; $f16=$f16+$amount_array['0025'];} ?></td>
                            <td><?php if(!empty($amount_array['0026'])){echo $sub_total_17 = $amount_array['0026']; $f17=$f17+$amount_array['0026'];} ?></td>
                            <td><?php if(!empty($amount_array['0027'])){echo $sub_total_18 = $amount_array['0027']; $f18=$f18+$amount_array['0027'];} ?></td>
                            <td><?php if(!empty($amount_array['0028'])){echo $sub_total_19 = $amount_array['0028']; $f19=$f19+$amount_array['0028'];} ?></td>
                            <td><?php if(!empty($amount_array['0029'])){echo $sub_total_20 = $amount_array['0029']; $f20=$f20+$amount_array['0029'];} ?></td>
                            <td><?php if(!empty($amount_array['0030'])){echo $sub_total_21 = $amount_array['0030']; $f21=$f21+$amount_array['0030'];} ?></td>
                            <td><?php if(!empty($amount_array['0010'])){echo $sub_total_23 = $amount_array['0010']; $f23=$f23+$amount_array['0010'];} ?></td>
                            <td><?php if(!empty($amount_array['0015'])){echo $sub_total_24 = $amount_array['0015']; $f24=$f24+$amount_array['0015'];} ?></td>
                            <td><?php if(!empty($amount_array['0016'])){echo $sub_total_25 = $amount_array['0016']; $f25=$f25+$amount_array['0016'];} ?></td>
                            <td><?php if(!empty($amount_array['0017'])){echo $sub_total_26 = $amount_array['0017']; $f26=$f26+$amount_array['0017'];} ?></td>
                            <td><?php if(!empty($amount_array['0019'])){echo $sub_total_27 = $amount_array['0019']; $f27=$f27+$amount_array['0019'];} ?></td>
                            <td><?php if(!empty($amount_array['0023'])){echo $sub_total_28 = $amount_array['0023']; $f28=$f28+$amount_array['0023'];} ?></td>
                            <td><?php if(!empty($amount_array['0031'])){echo $sub_total_29 = $amount_array['0031']; $f29=$f29+$amount_array['0031'];} ?></td>
                            <td><?php if(!empty($amount_array['0032'])){echo $sub_total_22 = $amount_array['0032']; $f22=$f22+$amount_array['0032'];} ?></td>                            

                            
                            <td>
                                <?php  echo number_format(($sub_total_1 + $sub_total_2 + $sub_total_3 + $sub_total_4 + $sub_total_5 + 
                                $sub_total_6 + $sub_total_7 + $sub_total_8 + $sub_total_9 = $sub_total_10 + 
                                $sub_total_11 + $sub_total_12 + $sub_total_13 + $sub_total_14 + $sub_total_15 + 
                                $sub_total_16 + $sub_total_17 + $sub_total_18 + $sub_total_19 + $sub_total_20 + 
                                $sub_total_21 + $sub_total_22 +$sub_total_23+$sub_total_24+$sub_total_25+$sub_total_26
                                +$sub_total_27+$sub_total_28+$sub_total_29),2);  ?>
                            </td>
  
                        </tr>
                        <?php  unset($amount_array); $c=0; } } } ?>
                        
                        <tr>
                            <td><b>Total</b></td>
                            <td><b><?php echo number_format($f1,2); ?></b></td>
                            <td><b><?php echo number_format($f2,2); ?></b></td>
                            <td><b><?php echo number_format($f3,2); ?></b></td>
                            <td><b><?php echo number_format($f4,2); ?></b></td>
                            <td><b><?php echo number_format($f5,2); ?></b></td>
                            <td><b><?php echo number_format($f6,2); ?></b></td>
                            <td><b><?php echo number_format($f7,2); ?></b></td>
                            <td><b><?php echo number_format($f8,2); ?></b></td>
                            <td><b><?php echo number_format($f9,2); ?></b></td>
                            <td><b><?php echo number_format($f10,2); ?></b></td>
                            <td><b><?php echo number_format($f11,2); ?></b></td>
                            <td><b><?php echo number_format($f12,2); ?></b></td>
                            <td><b><?php echo number_format($f13,2); ?></b></td>
                            <td><b><?php echo number_format($f14,2); ?></b></td>
                            <td><b><?php echo number_format($f15,2); ?></b></td>
                            <td><b><?php echo number_format($f16,2); ?></b></td>
                            <td><b><?php echo number_format($f17,2); ?></b></td>
                            <td><b><?php echo number_format($f18,2); ?></b></td>
                            <td><b><?php echo number_format($f19,2); ?></b></td>
                            <td><b><?php echo number_format($f20,2); ?></b></td>
                            <td><b><?php echo number_format($f21,2); ?></b></td>
                            <td><b><?php echo number_format($f23,2); ?></b></td>
                            <td><b><?php echo number_format($f24,2); ?></b></td>
                            <td><b><?php echo number_format($f25,2); ?></b></td>
                            <td><b><?php echo number_format($f26,2); ?></b></td>
                            <td><b><?php echo number_format($f27,2); ?></b></td>
                            <td><b><?php echo number_format($f28,2); ?></b></td>
                            <td><b><?php echo number_format($f29,2); ?></b></td>
                            <td><b><?php echo number_format($f22,2); ?></b></td>
                                                   
                            <td>
                                <b>
                                 <?php 
                                        echo number_format(($f1+$f2+$f3+$f4+$f5+$f6+$f7+$f8+$f9+$f10+$f11+$f12+$f13+$f14+$f15+$f16+$f17
                                            +$f18+$f19+$f20+$f21+$f22+$f23+$f24+$f25+$f26+$f27+$f28+$f29),2);  
                                ?>
                                </b>
                            </td>
                        </tr>    
 
                    </table>
                    
                   <b> 
                       Grand Total : <?php 
                                        echo number_format(($f1+$f2+$f3+$f4+$f5+$f6+$f7+$f8+$f9+$f10+$f11+$f12+$f13+$f14+$f15+$f16+$f17
                                            +$f18+$f19+$f20+$f21+$f22+$f23+$f24+$f25+$f26+$f27+$f28+$f29),2);  
                                ?>
                   </b>                     
                </div>

                
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>


<script>
     $('#datetimepickerFrom').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $('#datetimepickerTo').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

