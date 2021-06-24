<link rel="stylesheet" type="text/css" href="<?php echo site_url('public/css/calendar.css'); ?>">
<style>
    #cal{margin-top: 0px;}
    #cal .header .hook{width: 0;}
    #cal td{width: 36px; height: 36px; line-height: 36px;}
    /* New Custom Style (23/10/2019) */
.dash-box{
    text-align: center;
	padding: 30px 0;
	color: #fff;
	border-radius: 4px;
	margin: 0 0 15px;
	position: relative;
	overflow: hidden;
}
.dash-box::before{
    content: '';
    display: inline-block;
    height: 80px;
    width: 80px;
    position: absolute;
    top: 50%;
    left: 0%;
    background: #ffffff11;
    transform: rotate(-45deg) translate(-50%, -50%);
}
.dash-box::after{
    content: '';
    display: inline-block;
    height: 80px;
    width: 80px;
    position: absolute;
    top: 50%;
    right: 0%;
    background: #ffffff11;
    transform: rotate(45deg) translate(-50%, -50%);
}
.dash-box-1{
	background: #e53935;
	box-shadow: 1px 3px 10px #e5393599;
}
.dash-box-2{
	background: #D81B60;
	box-shadow: 1px 3px 10px #D81B6099;
}
.dash-box-3{
	background: #8E24AA;
	box-shadow: 1px 3px 10px #8E24AA99;
}
.dash-box-4{
	background: #5E35B1;
	box-shadow: 1px 4px 7px #5E35B1c4;
}
.dash-box-5{
	background: #3949AB;
	box-shadow: 1px 4px 7px #3949ABc4;
}
.dash-box-6{
	background: #1E88E5;
	box-shadow: 1px 4px 7px #1E88E5c4;
}
.dash-box-7{
	background: #039BE5;
	box-shadow: 1px 4px 7px #039BE5c4;
}
.dash-box-8{
	background: #0097A7;
	box-shadow: 1px 4px 7px #0097A7c4;
}
.dash-box-9{
	background: #00897B;
	box-shadow: 1px 4px 7px #00897Bc4;
}
.dash-box-10{
	background: #388E3C;
	box-shadow: 1px 4px 7px #388E3Cc4;
}
.dash-box-11{
	background: #689F38;
	box-shadow: 1px 4px 7px #689F38c4;
}
.dash-box-12{
	background: #AFB42B;
	box-shadow: 1px 4px 7px #AFB42Bc4;
}
.dash-box h1{
	margin: 0;
	font-size: 22px;
}
.dash-box span{
	font-size: 16px;
	text-transform: uppercase;
}
</style>

<!--div class="container-fluid">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Library</a></li>
            <li class="active">Data</li>
        </ol>
    </div>
</div-->

<div class="container-fluid">
    <div class="row">
   		<?php echo $this->session->flashdata('error'); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="text-center">Welcome to the Dashboard!</h1>
            </div>

            <div class="panel-body">
                <?php if(ck_action('dashboard','total_teachers')){ ?>
                    <div class="col-md-3">
                        <div class="dash-box dash-box-1">
                            <span>Total Teacheras</span>
                            <h1><?php echo $teacher; ?></h1>
                        </div>                    
                    </div>
                <?php } ?>
                
		        <?php if(ck_action('dashboard','total_employees')){ ?>
    		        <div class="col-md-3">
                        <div class="dash-box dash-box-2">
                            <span>Total employees</span>
                            <h1><?php echo $totalEmployee; ?></h1>
                        </div>                    
                    </div>
                <?php } ?>
                
                <?php if(ck_action('dashboard','total_committee')){ ?>
                    <div class="col-md-3">
                        <div class="dash-box dash-box-4">
                            <span>Total committee </span>
                            <h1><?php echo $commete; ?></h1>
                        </div>                    
                    </div>
                <?php } ?>
                
                <?php if(ck_action('dashboard','total_students')){ ?>
                    <div class="col-md-3">
                        <div class="dash-box dash-box-3">
                            <span> Total students</span>
                             <h1><?php echo $students; ?></h1>
                        </div>                    
                    </div>                
                <?php } ?>
                
                <?php if(ck_action('dashboard','total_salary_due')){ ?>
                    <div class="col-md-3">
                        <div class="dash-box dash-box-6">
                            <span>Total Salary due</span>
                            <h1>0</h1>
                        </div>                    
                    </div>
                <?php } ?>
                
                <?php if(ck_action('dashboard','total_salary_paid')){ ?>
                    <div class="col-md-3">
                        <div class="dash-box dash-box-7">
                            <span>Total Salary Paid</span>
                            <h1><?php echo $employee_payment; ?></h1>
                        </div>                    
                    </div>
                <?php } ?>
                
                <?php if(ck_action('dashboard','total_cost')){ ?>
                    <div class="col-md-3">
                        <div class="dash-box dash-box-8">
                            <span>Total Cost</span>
                            <h1><?php echo 0; ?></h1>
                        </div>                    
                    </div>
                <?php } ?>    
            </div>
            <!--<div class="col-md-12 chart">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading"><b>Browsing statistics</b></div>

                        <div class="panel-body">
                            <div id="piechart_3d"></div>
                        </div>

                        <div class="panel-footer"></div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading"><b>Visiting device statistics</b></div>

                        <div class="panel-body">
                            <div id="piechart_3d2"></div>
                        </div>

                        <div class="panel-footer"></div>
                    </div>                   
                </div>
            </div>-->

            <!--div class="col-md-12 chart">
                <div class="col-md-6">
                    <div class="panel panel-default">
						<div class="panel-heading"><b>Web site statistics</b></div>

						<div class="panel-body" style="min-height: 315px;">
							<div id="chart_div"></div>
						</div>

						<div class="panel-footer"></div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading"><b>World Wide Visitor Statistics</b></div>

						<div class="panel-body">
							<div id="regions_div"></div>
						</div>

						<div class="panel-footer"></div>
					</div>
				</div>
            </div-->
            <div class="col-md-12 chart">
                <!--div class="col-md-6">
                    <div class="panel panel-default">
						<div class="panel-heading"><b>Browsing statistics</b></div>

						<div class="panel-body">
							
							<table class="table">
								<tr>
									<td style="border-top: none;">Online</td>
									<td style="border-top: none;"><?php echo $current_visitor; ?> person</td>
								</tr>
								<tr>
									<td>Today Visitor</td>
									<td><?php echo $todays_visitor; ?> person</td>
								</tr>
								<tr>
									<td>Last Month Visitors</td>
									<td><?php echo $last_month_visitor; ?> person</td>
								</tr>
								<tr>
									<td>Total Visitor</td>
									<td><?php echo $total_visitor; ?> person</td>
								</tr>
							</table>
						</div>

						<div class="panel-footer"></div>
					</div>
				</div-->
					
				<!--div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading"><b>ক্যালেন্ডার</b></div>

						<div class="panel-body">
							<div id="cal">
								<div class="header">
									<span class="left button" id="prev"> &lang; </span>
									<span class="left hook"></span>
									<span class="month-year" id="label"> June 2010 </span>
									<span class="right hook" id=""></span>
									<span class="right button" id="next"> &rang; </span>
								</div>
								<table id="days">
									<tr>
										<td>sun</td>
										<td>mon</td>
										<td>tue</td>
										<td>wed</td>
										<td>thu</td>
										<td>fri</td>
										<td>sat</td>
									</tr>
								</table>
								<div id="cal-frame">
									<table class="curr">
										<tr><td class="nil"></td><td class="nil"></td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td></tr>
										<tr><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td class="today">11</td><td>12</td></tr>
										<tr><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td></tr>
										<tr><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td></tr>
										<tr><td>27</td><td>28</td><td>29</td><td>30</td><td class="nil"></td><td class="nil"></td><td class="nil"></td></tr>
									</table>
								</div>
							</div>
						</div>

						<div class="panel-footer"></div>
					</div>
				</div-->
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>


</div>
<!-- /#page-content-wrapper -->

<script src="<?php echo site_url('public/js/calendar.js'); ?>"></script>

    <!-- PIE CHART -->
         <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);
          function drawChart() {

            var data = google.visualization.arrayToDataTable([
              ['Browser', 'Number'],
              <?php foreach ($br_data as $br_key => $br_value) { ?>
              ['<?php echo $br_key ;?>',<?php echo $br_value ;?>],
              <?php } ?>
            ]);

            var options = {
              title: '',
              is3D: true,
              'width': 450,
              'height': 400,
              'chartArea': {'width': '100%', 'height': '80%'},
              'legend': {'position': 'bottom'}
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));

            chart.draw(data, options);
          }
        </script>

        <!-- PIE CHART 2 -->
         <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);
          function drawChart() {

            var data = google.visualization.arrayToDataTable([
              ['Device', 'Number'],
              <?php foreach ($device_data as $dd_key => $dd_value) { ?>
              ['<?php echo $dd_key; ?>',<?php echo $dd_value; ?>],
              <?php } ?>
            ]);

            var options = {
              title: '',
              is3D: true,
              'width': 450,
              'height': 400,
              'chartArea': {'width': '100%', 'height': '80%'},
              'legend': {'position': 'bottom'}
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d2'));

            chart.draw(data, options);
          }
        </script>

        <!-- Area Chart -->
        <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Year', 'Sales', 'Expenses'],
              ['2013',  1000,      400],
              ['2014',  1170,      460],
              ['2015',  660,       1120],
              ['2016',  1030,      540]
            ]);

            var options = {
              title: '',
              hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
              vAxis: {minValue: 0}
            };

            var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
            chart.draw(data, options);
          }
        </script>
      
      <script type="text/javascript">
        google.charts.load('upcoming', {'packages':['geochart']});
        google.charts.setOnLoadCallback(drawRegionsMap);

        function drawRegionsMap() {

          var data = google.visualization.arrayToDataTable([
            ['Country', 'Popularity'],
            ['Germany', 200],
            ['United States', 300],
            ['Brazil', 400],
            ['Canada', 500],
            ['France', 600],
            ['RU', 700]
          ]);

          var options = {};

          var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

          chart.draw(data, options);
        }
      </script>

    <script>
        $(document).ready(function(){
            hitting();
            //setInterval(hitting,5000);
        });

        function hitting(){
            $.ajax({
                url: '<?php echo site_url('home/c_counter');?>',
                type: 'POST',
            })
            .done(function(response) {
                console.log(response);
            });
        }
    </script>