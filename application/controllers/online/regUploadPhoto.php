<?php

class RegUploadPhoto extends Frontend_Controller
  {

    function __construct()
	{
        parent::__construct();
        $this->data['meta_title'] = 'registration';
        // load retrieve model
        $this->load->model('retrieve');
        $this->load->library('upload');
        $this->load->helper('inflector');

        $this->data['banner']=$this->retrieve->read('banner');
        $this->data['latest_news']=$this->retrieve->read('latest_news',array(),"desc");
        $this->data['latest_notice']=$this->retrieve->read('notice',array(),"desc");
    }

 public function index($emit = NULL)
   {
	$this->data['confirmation'] = '';
	$this->data['tracking'] = $emit;
	// Banner record
	$this->data['banner_record'] = $this->retrieve->read('banner');
	//for latest news 
	$this->data['latest_news'] = $this->retrieve->read('latest_news');

        if (isset($_POST['reg_photo']))
			{
            // set validation
            $this->form_validation->set_rules('pin', 'PIN Number', 'trim|required|xss_clean');

            if ($this->form_validation->run() == FALSE)
				{
					// call form validation error
					$this->data['confirmation'] = message('warning', validation_errors('<p>', '</p>'));
                } 
			else 
			   {
				 if ($this->retrieve->exists('registration', array('pin' => $this->input->post('pin'))))
				  {                
                    $config['upload_path'] = './public/upload/reg';
                    $config['allowed_types'] = 'jpeg|jpg|png';
                    $config['max_size'] = '1024';  // 1M 
                    $config['file_name'] = $this->input->post('pin').'_'.rand().'-photo';
                    $config['overwrite'] = true;

                    $this->upload->initialize($config);
                    $this->form_validation->set_rules('photo', 'Photo', 'callback_upload_photo');

                    if ($this->form_validation->run() == FALSE) {
                        $this->data['confirmation'] = message('warning', validation_errors('<p>', '</p>'));
                    } else {
                        $upload_photo_data = $this->upload->data();
                        $this->data['photo'] = $upload_photo_data['file_name'];

                        // update subscriber table
                        $update = array('photo' => 'public/upload/reg/' . $this->data['photo']);
                       
					   $this->retrieve->update('subscriber', $update, array('username' => $this->data['tracking']));
                        // set success message
                        $this->data['confirmation'] = message($this->retrieve->update('registration', $update, array('pin' => $this->input->post('pin'))));
                    }
                } else {
                    $mess = '<p>Sorry, We don\'t find you ! Please complete your registration.</p>';
                    $this->data['confirmation'] = message('warning', $mess);
                }
            }
        }

        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/banner', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/marquee', $this->data);
        $this->load->view('online/reg-photo', $this->data);
        $this->load->view('includes/aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }


    public function upload_photo() {
        if (isset($_FILES['photo']) && !empty($_FILES['photo']['name'])) {
            if ($this->upload->do_upload('photo')) {
                $this->upload->data();

                return TRUE;
            } else {
                // possibly do some clean up ... then throw an error
                $this->form_validation->set_message('upload_photo', $this->upload->display_errors());

                return FALSE;
            }
        } else {
            // throw an error because nothing was uploaded
            $this->form_validation->set_message('upload_photo', "You must upload an valid signature!");
            return FALSE;
        }
    }

}
