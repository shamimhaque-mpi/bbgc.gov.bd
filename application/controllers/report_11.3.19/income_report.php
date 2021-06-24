<?php
class Income_report extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('action');

		$this->data['meta_title'] = 'Report';
		$this->data['active']     = 'data-target="report_menu"';
    }

    public function index(){
        $this->data['subMenu'] = 'data-target="income"';

/*
        $this->data['resultset'] = array();
        $this->data['totalRec'] = array(
            'january' => 0.00, 
            'february' => 0.00, 
            'march' => 0.00, 
            'april' => 0.00, 
            'may' => 0.00, 
            'june' => 0.00, 
            'july' => 0.00, 
            'august' => 0.00, 
            'september' => 0.00, 
            'october' => 0.00, 
            'november' => 0.00, 
            'december' => 0.00
        );

        if(isset($_POST['show'])) {
            $months = config_item('months');
            $fields = $this->action->read('income_field');
            $counter = 1;

            foreach ($fields as $income) {
                $where = array(
                    'YEAR(date)' => $this->input->post('year'),
                    'income_field' => $income->field_income,
                    'trash' => 0
                );

                //print_r($where);


                $totalIncome = 0.00;
                foreach ($months as $key => $month) {
                    $where['MONTH(date)'] = ($key + 1);
                    $details[$key] = array('month' => $month);
                    $records = $this->action->read('income', $where);

                    $total = 0.00;
                    if($records != null) {
                        foreach ($records as $row) {
                            $total += $row->amount;
                        }
                    }

                    $totalIncome += $total;
                    $details[$key]['amount'] = $total;
                }

                $this->data['resultset'][] = array(
                    'sl' => $counter,
                    'field' => $income->field_income,
                    'details' => $details,
                    'total' => $totalIncome
                );

                $counter++;
            }
        }*/
        
        
           
        if(isset($_POST['show'])){
            $year=$this->input->post('year');
        }else{
            $year=date('Y')-1;
        }
        $months=array();
        
        $months[0] ='between'.' '."'".$year.'-07-01'."'".' '.'and'.' '."'".$year.'-07-31'."'";
        $months[1] ='between'.' '."'".$year.'-08-01'."'".' '.'and'.' '."'".$year.'-08-31'."'";
        $months[2] ='between'.' '."'".$year.'-09-01'."'".' '.'and'.' '."'".$year.'-09-31'."'";
        $months[3] ='between'.' '."'".$year.'-10-01'."'".' '.'and'.' '."'".$year.'-10-31'."'";
        $months[4] ='between'.' '."'".$year.'-11-01'."'".' '.'and'.' '."'".$year.'-11-31'."'";
        $months[5] ='between'.' '."'".$year.'-12-01'."'".' '.'and'.' '."'".$year.'-12-31'."'";
        $months[6] ='between'.' '."'".($year+1).'-01-01'."'".' '.'and'.' '."'".($year+1).'-01-31'."'";
        $months[7] ='between'.' '."'".($year+1).'-02-01'."'".' '.'and'.' '."'".($year+1).'-02-31'."'";
        $months[8] ='between'.' '."'".($year+1).'-03-01'."'".' '.'and'.' '."'".($year+1).'-03-31'."'";
        $months[9] ='between'.' '."'".($year+1).'-04-01'."'".' '.'and'.' '."'".($year+1).'-04-31'."'";
        $months[10] ='between'.' '."'".($year+1).'-05-01'."'".' '.'and'.' '."'".($year+1).'-05-31'."'";
        $months[11] ='between'.' '."'".($year+1).'-06-01'."'".' '.'and'.' '."'".($year+1).'-06-31'."'";
       
        $date_range = "between"." "."'".($year)."-07-01"."'"." ".'and'." "."'".($year+1)."-06-31"."'";
        $where = array(
                'trash' => 0
                );
        $query = $this->db->query("select income_field from income where date   $date_range and trash=0  group by income_field order by income_field asc");
        $cost=0;
        $length=1;
        foreach($query->result() as $rows){
                $cost_field = $rows->income_field;
                $this->data['cost_field'][$length] = $cost_field;
               for($m=0;$m<=11;$m++){
                    $month=$months[$m];
                    $sql ="select amount from income where date $month and income_field = '$cost_field' and trash=0";
                    $query1 = $this->db->query($sql);
                    foreach($query1->result() as $val){
                        $cost = $cost + $val->amount;         
                    }
                    
                    $this->data['cost'][$cost_field][$m] =  $cost; 
                    $cost=0;
                  
               }
            $length++;   
        }
   
        $this->data['length'] =$length;

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/report/report_nav', $this->data);
        $this->load->view('components/report/income_report', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }



 }
