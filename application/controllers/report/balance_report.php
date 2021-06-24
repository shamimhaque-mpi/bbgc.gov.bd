<?php
class Balance_report extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('action');

		$this->data['meta_title'] = 'Balance Report';
		$this->data['active']     = 'data-target="report_menu"';
    }

    public function index(){
        $this->data['subMenu'] = 'data-target="balance"'; 
        $this->data['allPayments'] = $this->data['allCost'] = $this->data['otherIncome'] = $this->data['resultset'] = NULL;
       
        if (isset($_POST['show'])) {

            $where = array();
            $salaryWhere = array();
            foreach ($_POST['date'] as $key => $value) {
                if($value != NULL && $key == "from"){
                    $where['date >='] = $value;
                    $salaryWhere['date >='] = $value;
                }

                if($value != NULL && $key == "to"){
                    $where['date <='] = $value;
                    $salaryWhere['date <='] = $value;
                }
            }


            // fetch all income from `payment` table
            $this->data['allPayments'] = $this->action->readGroupBy('payment','field',$where, $orderBy="id", $sort="asc");


            // fetch all general cost from `cost` table
            $where['trash'] = '0';
            //$this->data['allCost'] = $this->action->read('cost',$where);
             
             $table = 'cost';
             $select = 'id,date,cost_field,description,sum(amount) as amount';
             $groupBy = 'cost_field';
             $this->data['allCost'] = get_result($table, $where, $select, $groupBy);
            
            

             // Fetch Other income from `income` table
             //$this->data['otherIncome'] = $this->action->read('income',$where);
             $table = 'payment';
             $select = 'id,date,field,sum(amount) as amount';
             $groupBy = 'field';
             $this->data['otherIncome'] = get_result($table, $where, $select, $groupBy);
            
            // fetch salary records from `salary_records` table
            $this->data['resultset'] = array();
            

            $where = array("employee_status" => "1");
            $employeeInfo = $this->action->read("employee", $where);


            foreach ($employeeInfo as $key => $employee) {

                $salaryWhere["eid"] = $employee->employee_emp_id;
                $salaryInfo = $this->action->read("salary_records", $salaryWhere);

                if($salaryInfo != null) {
                    $total = 0;

                    foreach ($salaryInfo as $salary) {
                        if($salary->remarks == 'deduction') {
                            $total -= $salary->amounts;
                        } else {
                            $total += $salary->amounts;
                        }
                    }

                    $this->data["resultset"][$key]['name']  = $employee->employee_name;
                    $this->data["resultset"][$key]['total'] = $total;

                }else{
                    //$this->data["resultset"][$key]['total'] = 0.00;
                }
            }

            // fetch salary records end here
        
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/report/report_nav', $this->data);
        $this->load->view('components/report/balance_report', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }
    
    
    public function field_wise_balance_report(){
        
        $this->data['subMenu'] = 'data-target="field_wise_balance_report"'; 
        $this->data['allPayments'] = $this->data['allCost'] = $this->data['otherIncome'] = $this->data['resultset'] = NULL;
            // fetch all income from `payment` table
        $query = $this->db->query("SELECT cost_field FROM cost_field UNION SELECT field_name FROM payment_field");
        $this->data['fields'] =$query->result();

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/report/report_nav', $this->data);
        $this->load->view('components/report/field_wise_balance_report', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    
 }
}
