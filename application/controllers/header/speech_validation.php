<?php

class Speech_validation extends Admin_Controller {

    function __construct() {
        parent::__construct();
        // account holder restriction
        $this->holder();
        // set meta title
        $this->data['meta_title'] = 'spech';
        // load library
        $this->load->library('upload');
        // load model
        $this->load->model('action');
    }
	
	public function at_a_glance() {
        // set validation 
      
        $this->form_validation->set_rules('at_a_glance', 'At a Glance', 'trim|required|max_length[1000]|xss_clean');
        
        if($this->form_validation->run() == FALSE){
            // call form validation error
            $this->data['confirmation'] = message('warning', validation_errors('<p>', '</p>'));
        } else {
           
            
            $insert = array('at_a_glance' => $this->input->post('at_a_glance'));

             $at_a_glanceDB=$this->action->read('at_a_glance');
            
             if( $at_a_glanceDB != NULL)
             {  
               $cond= array('id'=>$at_a_glanceDB[0]->id); 
                $this->data['confirmation'] = message($this->action->update('at_a_glance', $insert, $cond));		             	 
             } 
             else
             {
               $this->data['confirmation'] = message($this->action->add('at_a_glance', $insert));
             }
                     
        }
        
       $this->session->set_flashdata('confirmation', $this->data['confirmation']);
   redirect('header/speech/at_a_glance', 'refresh');
    }

    
    public function principal_speech() {
        // set validation 
      
        $this->form_validation->set_rules('speech', 'Speech', 'trim|required|xss_clean');
        
        if($this->form_validation->run() == FALSE){
            // call form validation error
            $this->data['confirmation'] = message('warning', validation_errors('<p>', '</p>'));
        } else {
            if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
                // set img upload condition
                $config['upload_path']      = './public/upload/chairman_speech/';
                $config['allowed_types']    = 'jpeg|jpg|png';
                $config['max_size']         = '9216'; // 9M = 9216
                $config['file_name']        = 'chairman';
                $config['overwrite']        = true;

                $this->upload->initialize($config);
                $this->form_validation->set_rules('image', 'Image', 'callback_handle_upload');

                if ($this->form_validation->run() == FALSE){
                    // call form validation error
                    $this->data['confirmation'] = message('warning', validation_errors('<p>', '</p>'));
                } else {
                    $upload_data = $this->upload->data();
                    $file = 'public/upload/chairman_speech/'.$upload_data['file_name'];
                }
            } else {
                $file = '';
            }
            
            $insert = array(
                'date' => date('Y-m-d'),                       
                'speech' => $this->input->post('speech'),
                'path' => $file
            );

             $speakerDB=$this->action->read('chairman_speech');
            
             if( $speakerDB != NULL)
             {  
               $cond= array('id'=>$speakerDB[0]->id); 
                $this->data['confirmation'] = message($this->action->update('chairman_speech', $insert, $cond));		             	 
             } 
             else
             {
               $this->data['confirmation'] = message($this->action->add('chairman_speech', $insert));
             }
                     
        }
        
       $this->session->set_flashdata('confirmation', $this->data['confirmation']);
   redirect('header/speech/principal_speech', 'refresh');
    }
    
    public function director_speech() {
        // set validation        
        $this->form_validation->set_rules('speech', 'Speech', 'trim|required|xss_clean');
        
        if($this->form_validation->run() == FALSE){
            // call form validation error
            $this->data['confirmation'] = message('warning', validation_errors('<p>', '</p>'));
        } else {
            if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
                // set img upload condition
                $config['upload_path']      = './public/upload/director_speech/';
                $config['allowed_types']    = 'jpeg|jpg|png';
                $config['max_size']         = '9216'; // 9M = 9216
                $config['file_name']        = 'director';
                $config['overwrite']        = true;

                $this->upload->initialize($config);
                $this->form_validation->set_rules('image', 'Image', 'callback_handle_upload');

                if ($this->form_validation->run() == FALSE){
                    // call form validation error
                    $this->data['confirmation'] = message('warning', validation_errors('<p>', '</p>'));
                } else {
                    $upload_data = $this->upload->data();
                    $file = 'public/upload/director_speech/'.$upload_data['file_name'];
                }
            } else {
                $file = '';
            }
            
            $insert = array(
                'date' => date('Y-m-d'),                         
                'speech' => $this->input->post('speech'),
                'path' => $file
            );

             $speakerDB=$this->action->read('director_speech');
            
             if( $speakerDB != NULL)
             {  
               $cond= array('id'=>$speakerDB[0]->id); 
                $this->data['confirmation'] = message($this->action->update('director_speech', $insert, $cond));		             	 
             } 
             else
             {
               $this->data['confirmation'] = message($this->action->add('director_speech', $insert));
             }
                     
        }
        
       $this->session->set_flashdata('confirmation', $this->data['confirmation']);
   redirect('header/speech/director_speech', 'refresh');
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
            $this->form_validation->set_message('handle_upload', "You must upload an valid image!");
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

