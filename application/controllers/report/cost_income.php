<?php
class Cost_income extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('action');

        $this->data['meta_title'] = 'Report';
        $this->data['active']     = 'data-target="report_menu"';
    }

    public function index(){
        $this->data['subMenu'] = 'data-target="cost_income"'; 

        $this->data['resultset']        = array();
        $this->data['resultset_cost']   = array();
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
            
            $startYear = $year[0];
            $previous_startYear = $year[0]-1;
            $endYear = $year[1];
            $previous_endYear = $year[1]-1;
            
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
                
                
                
                // for previous Cost 
                
                $totalincome = 0.00;
                foreach ($months as $key => $month) {
                    
                    if($key < 7){
                        $where['YEAR(date)'] = $previous_startYear;
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
                        $where['YEAR(date)'] = $previous_endYear;
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

                $this->data['resultset_previous'][] = array(
                    'sl'      => $counter,
                    'field'   => $income->field_income,
                    'details' => $details,
                    'total'   => $totalincome
                );
                
                $counter++;
            }
            
            
            // for cost
            
            $fields_cost = $this->action->read('cost_field');
            $counter = 1;

            foreach ($fields_cost as $cost) {
                $where_cost = array(
                    //'YEAR(date)' => $this->input->post('year'),
                    'cost_field' => $cost->code,
                    'trash'      => 0
                );

                $totalCost = 0.00;
                foreach ($months as $key => $month) {
                    if($key < 7){
                        $where_cost['YEAR(date)'] = $startYear;
                        $where_cost['MONTH(date)'] = ($key + 6);
                        $details[$key] = array('month' => $month);
                        
                        
                        //print_r($where);
                        $records_cost = $this->action->read('cost', $where_cost);
    
                        $total = 0.00;
                        if($records_cost != null) {
                            foreach ($records_cost as $row) {
                                $total += $row->amount;
                            }
                        }
                    }else{
                        $where_cost['YEAR(date)'] = $endYear;
                        $where_cost['MONTH(date)'] = (($key-7) + 1);
                        $details[$key] = array('month' => $month);
                        
                        
                        //print_r($where);
                        $records_cost = $this->action->read('cost', $where_cost);
    
                        $total = 0.00;
                        if($records_cost != null) {
                            foreach ($records_cost as $row) {
                                $total += $row->amount;
                            }
                        }
                    }

                    $totalCost += $total;
                    $details[$key]['amount'] = $total;
                }

                $this->data['resultset_cost'][] = array(
                    'sl'      => $counter,
                    'field'   => $cost->cost_field,
                    'details' => $details,
                    'total'   => $totalCost
                );
                
                
                
                // for previous cost
                
                
                $totalCost = 0.00;
                foreach ($months as $key => $month) {
                    if($key < 7){
                        $where_cost['YEAR(date)'] = $previous_startYear;
                        $where_cost['MONTH(date)'] = ($key + 6);
                        $details[$key] = array('month' => $month);
                        
                        
                        //print_r($where);
                        $records_cost = $this->action->read('cost', $where_cost);
    
                        $total = 0.00;
                        if($records_cost != null) {
                            foreach ($records_cost as $row) {
                                $total += $row->amount;
                            }
                        }
                    }else{
                        $where_cost['YEAR(date)'] = $previous_endYear;
                        $where_cost['MONTH(date)'] = (($key-7) + 1);
                        $details[$key] = array('month' => $month);
                        
                        
                        //print_r($where);
                        $records_cost = $this->action->read('cost', $where_cost);
    
                        $total = 0.00;
                        if($records_cost != null) {
                            foreach ($records_cost as $row) {
                                $total += $row->amount;
                            }
                        }
                    }

                    $totalCost += $total;
                    $details[$key]['amount'] = $total;
                }


                $this->data['resultset_cost_previous'][] = array(
                    'sl'      => $counter,
                    'field'   => $cost->cost_field,
                    'details' => $details,
                    'total'   => $totalCost
                );

                $counter++;
            }
            
            
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/report/report_nav', $this->data);
        $this->load->view('components/report/cost_income', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }

}
