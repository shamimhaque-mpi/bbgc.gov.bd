<style>
    table th, table td{text-align:center;}
    table td a{display: block;}
    table td a:hover i{color: #fff;}
</style>

<!-- student insert page start here -->
<div class="column global-pad">
    <div class="row">
    
    </div>
    <?php
    
    if($slip != NULL)
    {
    ?>   
    
    <div class="row">
        <div id="mess"></div> 
        <table>
            <tr>
                <th>Sl</th>
                <th>Name</th>
                <th>Class</th>
                <th>Roll</th>
                <th>Date</th>
                <th>Month</th>
                <th>Action</th>
            </tr>
            <tr>
                <td colspan="8">&nbsp;</td>
            </tr>
            <?php
            $month=array('1'=>'January','2'=>'February','3'=>'March','4'=>'April','5'=>'May','6'=>'June','7'=>'July','8'=>'August','9'=>'September','10'=>'October','11'=>'November','12'=>'December'); 
            //print_r($slip);
               foreach ($slip as $key => $row) {
            ?>
            <tr>
                <td><?php echo ($key + 1); ?></td>
                <td><?php echo ucwords($row->name); ?></td>
                <td>
                  
							<?php
     				if($row->class=='0A')
					{
					  echo " Atfal(Alif)";	
					}
					else if($row->class=="0B")
					{
						echo "Atfal(Jim)";
					}
				   else if($row->class=="1A")
					{
						echo "Awal";
					}
				 
				  else if($row->class=="02")
					{
						echo "Sani";
					}
				 else if($row->class=="03")
					{
						echo "Calis";
					}
				else if($row->class=="04")
					{
						echo "Rabe";
					}
				else if($row->class=="05")
					{
						echo "Khamesh";
					}
				else if($row->class=="06")
					{
						echo "Sadesh";
					}
				else if($row->class=="07")
					{
						echo "Sabe";
					}
				else if($row->class=="08")
					{
						echo "Saman";
					}
				else if($row->class=="09")
					{
						echo "Tase";
					}
				else if($row->class=="10")
					{
						echo "Asher";
					}
				else
					{
						echo "Hifz";
					}
				 ?>	
                </td>
                <td><?php echo $row->roll; ?></td>
                <td><?php echo $row->datetime; ?></td>
                <td><?php echo $month[$row->month]; ?></td>
                <td>
                    <a target="_blank" href="<?php echo site_url('student_payment/payment_view/show_slip/'.$row->id);?>"  >
                        <i class="fa fa-eye"></i>
                    </a>
                </td>
               
            </tr>
            <?php
                }
            ?>
            <tr>
                <td colspan="8">&nbsp;</td>
            </tr>
        </table>
        
    </div>
    <?php
        }
        else
        {
        echo"<h3 style='color:red;text-align:center;'>No Pay Slip Available.</h3>";
        }
        ?>
            
</div>
<!-- student insert page end here -->