<?php
class Registration extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('action');
        $this->load->library('upload');
        $this->holder();
    }
    
    public function index() {
        $this->data['meta_title'] = 'Registration';
        $this->data['active'] = 'data-target="registration_menu"';
        $this->data['subMenu'] = 'data-target="add-new"';
        $this->data['confirmation'] = null;

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/registration/registration-nav', $this->data);
        $this->load->view('components/registration/registrationForm', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function allStudent() {
        $this->data['meta_title'] = 'Registration';
        $this->data['active'] = 'data-target="registration_menu"';
        $this->data['subMenu'] = 'data-target="all"';
        $this->data['confirmation'] = null;

        if(isset($_POST['viewQuery'])){
         $where=array();
         foreach ($this->input->post('search') as $key => $value) {
             if($value != NULL){
                $where[$key]=$value;
             }
          }
          $this->data['all_student']=$this->action->read('registration',$where);
        }       
        
        $this->data['sessions']=$this->action->readDistinct('registration','session');
          
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/registration/registration-nav', $this->data);
        $this->load->view('components/registration/allStudent', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function profile($id=NULL) {
        $this->data['meta_title'] = 'Registration';
        $this->data['active'] = 'data-target="registration_menu"';
        $this->data['subMenu'] = 'data-target=""';
        $this->data['confirmation'] = null;

        $this->data['student']=$this->action->read('registration',array('id'=>$id));

          
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/registration/registration-nav', $this->data);
        $this->load->view('components/registration/profile', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function editStudent($id=NULL) {
        $this->data['meta_title'] = 'Registration';
        $this->data['active'] = 'data-target="registration_menu"';
        $this->data['subMenu'] = 'data-target=""';
        $this->data['confirmation'] = null;

        $this->data['student']=$this->action->read('registration',array('id'=>$id));
          
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/registration/registration-nav', $this->data);
        $this->load->view('components/registration/editStudent', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function deleteStudent($id=NULL) {        
        $this->data['confirmation'] = null;

        $student=$this->action->read('registration',array('id'=>$id));
         if($student != NULL){
            unlink('./public/students/'.$student[0]->photo);
         }

        $msg_array=array(
            "title"=>"Delete",
            "emit"=>"Student Information Successfully Deleted!",
            "btn"=>true
          );

        $this->data['confirmation']=message($this->action->deletedata('registration',array('id'=>$id)),$msg_array);          
        $this->session->set_flashdata('confirmation',$this->data['confirmation']);
        redirect('registration/registration/allStudent','refresh');
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
