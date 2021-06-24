<?php

class Payment_sector extends Admin_Controller {

   function __construct() {
        parent::__construct();

        $this->load->model('action');
    }
    
    
    public function index($emit = NULL) {
        $this->data['meta_title']   = 'Payment Sector';
        $this->data['active']       = 'data-target="sector_menu"';
        $this->data['subMenu']      = 'data-target="add-sector"';
        $this->data['confirmation'] = null;
        
                
        // insert sector information in db
        if ($this->input->post("add")) {
        	$this->data["confirmation"] =  null;
        	$name = str_replace(" ","_", $this->input->post("name"));
        
        	$data = array(
        		"date" => date("Y-m-d"),
        		"name" => $name,
        		"amount" => $this->input->post('amount'),
        	);
        
        
        	if ($this->action->exists("sector",array("name" => $name))) {
        
        		$message  = array(
        			'title' => "Warning",
        			'emit' 	=> "This Name Is Allready Exists!",
        			'btn' 	=> true,
        		);
        
        		$this->data["confirmation"] = message("warning",$message);
        		$this->session->set_flashdata('confirmation', $this->data['confirmation']);
        		redirect('payment/payment_sector','refresh');
        	}else{
        
        
        		$message  = array(
        			'title' => "Success",
        			'emit' 	=> "Successfully Save Data.",
        			'btn' 	=> true,
        		);
        
        		$this->data["confirmation"] = message($this->action->add("sector",$data),$message);
        		$this->session->set_flashdata('confirmation', $this->data['confirmation']);
        		redirect('payment/payment_sector','refresh');
        
        	}
        }

        // read database
        $this->data['sectorInfo']=$this->action->read("sector");
        

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/sector/nav', $this->data);
        $this->load->view('components/sector/add', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    } 
  
  
    public function edit($id = NULL) {
        $this->data['meta_title'] = 'Payment Sector';
        $this->data['active'] = 'data-target="sector_menu"';
        $this->data['subMenu'] = 'data-target="add-sector"';
        $this->data['confirmation'] = null;
        
        $this->data['sectorInfo']=$this->action->read("sector",array("id" => $id));

        // update sector information in db by id
        if ($this->input->post("update")) {
        	$this->data["confirmation"] =  null;
        	$name = str_replace(" ","_", $this->input->post("name"));
            
            $where = array("id" => $id);
            
        	$data = array(
        		"date" => date("Y-m-d"),
        		"name" => $name,
        		"amount" => $this->input->post('amount'),
        	);
        
        
    		$message  = array(
    			'title' => "Success",
    			'emit' 	=> "Successfully Update Data.",
    			'btn' 	=> true,
    		);
        
    		$this->data["confirmation"] = message($this->action->update("sector",$data ,$where),$message);
    		$this->session->set_flashdata('confirmation', $this->data['confirmation']);
    		redirect('payment/payment_sector','refresh');
        
        	
        }





        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/sector/nav', $this->data);
        $this->load->view('components/sector/edit', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    } 
    
    public function set_sector($emit = NULL) {
        $this->data['meta_title'] = 'Payment Sector';
        $this->data['active'] = 'data-target="sector_menu"';
        $this->data['subMenu'] = 'data-target="set_sector"';
        $this->data['confirmation'] = null;
        
        $this->data['allSector']=$this->action->read("sector");
        

        if ($this->input->post("add")) {
            $where = array("class" => $this->input->post("class"));
            
        	$data = array(
        		'date' => date("Y-m-d"), 
        		'class' => $this->input->post("class")
        	);
        	
        	
        	$n = [];
        	foreach ($this->input->post("name") as $key=>  $value) {
        		$n[] = $value;
        	}
        	$data['purpose'] = json_encode($n);
    		
            
            // data existsence check here
            if ($this->action->exists("class_sectors",$where)) {
                
                $message  = array(
        			'title' => "Success",
        			'emit' 	=> "Successfully Update Data.",
        			'btn' 	=> true,
    		    );
	
        		$this->data["confirmation"] = message($this->action->update("class_sectors",$data ,$where),$message);
        		$this->session->set_flashdata('confirmation', $this->data['confirmation']);
        		redirect('payment/payment_sector/set_sector','refresh');
            }else{
        		$message  = array(
        			'title' => "Success",
        			'emit' 	=> "Successfully Save Data.",
        			'btn' 	=> true,
        		);
        		$this->data["confirmation"] = message($this->action->add("class_sectors",$data),$message);
        		$this->session->set_flashdata('confirmation', $this->data['confirmation']);
        		redirect('payment/payment_sector/set_sector','refresh');
            }
            
        	
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/sector/nav', $this->data);
        $this->load->view('components/sector/set_sector', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    } 
  

   public function delete(){
      $this->data['confirmation'] = null;     

       $msg_array=array(
            'title'=>'delete',
            'emit'=>'Sector Successfully Deleted!',
            'btn'=>true
         );

        $this->data['confirmation']=message($this->action->deleteData('sector',array('id' => $this->input->get('id'))),$msg_array);
        $this->session->set_flashdata('confirmation',$this->data['confirmation']);
        redirect('payment/payment_sector','refresh');
    }
  
  
  
  
  
  
  
   private function holder() {
		$holder = config_item('privilege');
		
        if(!(in_array($this->session->userdata('holder'), $holder)))
		{
            $this->membership_m->logout();
            redirect('access/users/login');
        }
    }

}

