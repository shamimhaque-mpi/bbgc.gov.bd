<?php

class UploadValidation extends Admin_Controller {

    function __construct() {
        parent::__construct();
        // account holder restriction
        $this->holder();
        // set meta title
        $this->data['meta_title'] = 'upload';
        // load library
        $this->load->library('upload');
        // load model
        $this->load->model('action');
    }
	
	
 public function index()
    {	
        $leaveDB = $this->action->read('leave_list');
	    $this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[100]|xss_clean');
		
		if($this->form_validation->run() == FALSE)
			{
				// call form validation error
				$this->data['confirmation'] = message('warning', validation_errors('<p>', '</p>'));
			}
	     else
		   {		 
			
          // set img upload condition
            $config['upload_path']      = './public/upload/leavelist/';
            $config['allowed_types']    = 'pdf';
            $config['max_size']         = '9024';
            $config['file_name']        = 'leavelist';
            $config['overwrite']        = true;

            $this->upload->initialize($config);
            $this->form_validation->set_rules('image', 'File', 'callback_handle_upload');

            if ($this->form_validation->run() == FALSE)
				{
					// call form validation error
					$this->data['confirmation'] = message('warning', validation_errors('<p>', '</p>'));
				}	
			
			else 
				 {  		 
				     
					$upload_data = $this->upload->data();
					$file =$upload_data['file_name'];
					
					$data=array(
					'title'=>$this->input->post('title'),
					'datetime' => date('Y-m-d'),
					'path'=>$file
		              );		
		
					// print_r($insert);
					if($leaveDB != NULL)
						{
						  $split = explode('.', $leaveDB[0]->path);
							if($split[0] == 'leavelist') 
							{
								$this->data['confirmation'] = message( $this->action->update('leave_list', $data, array('id' => $leaveDB[0]->id)));
							} 
							else 
							{
							   $this->data['confirmation'] = message($this->action->add('leave_list', $data));
							}
						}
					else
						{
						 $this->data['confirmation'] = message($this->action->add('leave_list', $data));
						}				
					
				 }
			}
      $this->session->set_flashdata('confirmation', $this->data['confirmation']);
     redirect('upload/uploadView', 'refresh');
   }







public function calendar()
    {
        $calendarDB = $this->action->read('calendar');	
        $this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[100]|xss_clean');
		
		if($this->form_validation->run() == FALSE)
			{
				// call form validation error
				$this->data['confirmation'] = message('warning', validation_errors('<p>', '</p>'));
			}
	     else
		   {		 
			
          // set img upload condition
            $config['upload_path']      = './public/upload/calendar/';
            $config['allowed_types']    = 'pdf';
            $config['max_size']         = '9024';
            $config['file_name']        = 'calendarfile';
            $config['overwrite']        = true;

            $this->upload->initialize($config);
            $this->form_validation->set_rules('image', 'File', 'callback_handle_upload');

            if ($this->form_validation->run() == FALSE)
				{
					// call form validation error
					$this->data['confirmation'] = message('warning', validation_errors('<p>', '</p>'));
				}	
			
			else 
				 {
					$upload_data = $this->upload->data();
					$file =$upload_data['file_name'];
					
					
					$data=array(
					        'title'=>$this->input->post('title'),
						'datetime' => date('Y-m-d'),
						'path'=>$file
					     );		

					// print_r($insert);
					if($calendarDB != NULL)
						{
							$split = explode('.', $calendarDB[0]->path);
								if($split[0] == 'calendarfile') 
								{
									$this->data['confirmation'] = message( $this->action->update('calendar', $data, array('id' => $calendarDB[0]->id)));
								} 
								else 
								{
								   $this->data['confirmation'] = message($this->action->add('calendar', $data));
								}
						}
					else
						{
						 $this->data['confirmation'] = message($this->action->add('calendar', $data));
						}
				}		
			
            }
   $this->session->set_flashdata('confirmation', $this->data['confirmation']);
  redirect('upload/uploadView/calendar', 'refresh');
}

    

    

 function handle_upload() {
        if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
            if ($this->upload->do_upload('image')) {
                $this->upload->data();
                return true;
            } else {
                // possibly do some clean up ... then throw an error
                $this->form_validation->set_message('handle_upload', $this->upload->display_errors());
                return false;
            }
        } else {
            // throw an error because nothing was uploaded
            $this->form_validation->set_message('handle_upload', "You must upload an valid file!");
            return false;
        }
    }
	
	
  
   private function holder() {
		$holder = array('super','admin', 'user');
		
        if(!(in_array($this->session->userdata('holder'), $holder)))
		{
            $this->membership_m->logout();
            redirect('access/users/login');
        }
    }

}


