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

        $this->data['resultset'] = array();
        $this->data['totalRec'] = array(
            'july'      => 0.00, 
            'august'    => 0.00, 
            'september' => 0.00, 
            'october'   => 0.00, 
            'november'  => 0.00, 
            'december'  => 0.00,
            'january'   => 0.00, 
            'february'  => 0.00, 
            'march'     => 0.00, 
            'april'     => 0.00, 
            'may'       => 0.00, 
            'june'      => 0.00
        );

        if(isset($_POST['show'])) {
            
            $year = explode("-", $this->input->post('year'));
            //print_r($year);
            
            $startYear = $year[0];
            $endYear = $year[1];
            
            //echo $startYear;
            //echo $endYear;
            
            $months = config_item('reportMonths');
            $fields = $this->action->read('income_field');
            $counter = 1;

            foreach ($fields as $income) {
                $where = array(
                    //'YEAR(date)'     => $startYear,
                    //'income_field' => str_replace(" ","_",$income->field_income),
                    'income_field'   => $income->code,
                    'trash'          => 0
                );

                // print_r($where);


                $totalincome = 0.00;
                foreach ($months as $key => $month) {
                    
                    if($key < 7){
                        $where['YEAR(date)'] = $startYear;
                        $where['MONTH(date)'] = ($key + 6);
                        $details[$key] = array('month' => $month);
                        
                        
                        //print_r($where);
                        $records = $this->action->read('income', $where);
    
                        $total = 0.00;
                        if($records != null) {
                            foreach ($records as $row) {
                                $total += $row->amount;
                            }
                        }
                    }else{
                        $where['YEAR(date)'] = $endYear;
                        $where['MONTH(date)'] = (($key-7) + 1);
                        $details[$key] = array('month' => $month);
                        
                        
                        //print_r($where);
                        $records = $this->action->read('income', $where);
    
                        $total = 0.00;
                        if($records != null) {
                            foreach ($records as $row) {
                                $total += $row->amount;
                            }
                        }
                    }

                    $totalincome += $total;
                    $details[$key]['amount'] = $total;
                }

                $this->data['resultset'][] = array(
                    'sl'      => $counter,
                    'field'   => $income->field_income,
                    'details' => $details,
                    'total'   => $totalincome
                );
                
                $counter++;
            }
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/report/report_nav', $this->data);
        $this->load->view('components/report/income_report', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }

}
