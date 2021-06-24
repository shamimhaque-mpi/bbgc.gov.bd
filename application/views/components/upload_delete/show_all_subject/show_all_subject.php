
<!-- one column page main container start here -->
<div class="column global-pad">
    <div class="row">  
		<div class="horizontal">
         <blockquote class="form-head">
            <h1>Show All Subject</h1>
            <small>
                1 . if you want to use this style use <mark>blockquote</mark> tag and use <mark>class</mark> named : <mark>form-head</mark><br/>
                2 . here is some description or instruction
            </small>
        </blockquote>
		  
		  <div class="form-element">
                <label for="in1">Search Here:<sup class="required"></sup></label>
                <select name="class">
				 <option value="">Select Class</option>
				 <?php			  
     			   foreach($subject as $value):
			        { 			   
			         ?>				 
                     <option value="<?php echo $value->class;?>"><?php echo $value->class;?></option>
			        <?php			   
			        }
			       endforeach;
			     ?>				
				 </select>   
            </div> 
        
		</div>
    </div>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$('select[name="class"]').on('change', function(event){
				event.preventDefault();
				
				var cond = {'class': $(this).val()};
				
				$.ajax({
					type: 'POST',
					url: '<?php echo site_url(); ?>ajax/retrieveBy/subject',
					data: 'condition=' + JSON.stringify(cond)
				}).done(function(response){
					var obj = $.parseJSON(response), 
						data = [];
						
					data.push('<tr><th>Sl</th><th>Class</th><th>Year</th><th>Group</th><th>Subject</th><th>Subject Code</th><th colspan="5" style="text-align:center;">Action</th></tr><tr><td colspan="5">&nbsp;</td></tr>');
					
					$.each(obj, function(i, el){
						data.push('<tr><td>'+(i+1)+'</td><td>'+el.class+'</td><td>'+el.year+'</td><td>'+el.group+'</td><td>'+el.year+'</td><td>'+el.subject+'</td><td>'+el.sub_code+'</td><td style="text-align:center;"><a href="<?php echo site_url();?>subject/edit_subject/index/<?php echo $value->id ;?>"><i class="fa fa-pencil-square-o"></i></a></td><td style="text-align:center;"><a href="<?php echo site_url();?>subject/delete_subject/index/<?php echo $value->id ;?>"><i class="fa fa-trash-o"></i></a></td></tr>');
					});
					
					data.push('<tr><td colspan="5">&nbsp;</td></tr>');
					
					$('table').html(data);
					console.log(obj);
				});
				
				console.log(cond);
			});
			
		});
	</script>
</div>
<!-- one column page main container end here -->



