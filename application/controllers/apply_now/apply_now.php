<?php

class Apply_now extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('action');
        $this->load->model('retrieve');
        $this->load->library('upload');
    }
    
    public function index() {
        $this->data['meta_title'] = 'Apply Now';
        $this->data['active'] = 'data-target="apply_now_menu"';
        $this->data['students'] = null;
        
        $this->data['students_name']        = $this->action->read('online_admission');
        $this->data['students_session']     = $this->action->readGroupBy('online_admission','ssc_session');
        
        $where = array();
    
        if(isset($_POST['viewQuery'])){
            
            foreach($_POST['search'] as $key => $val){
                if($val != null){
                    $where["online_admission.".$key] = $val;
                }
            }
            
            // $this->data['students'] = $this->action->read('online_admission', $where);
        }
        
        
        // $this->data['students'] = $this->action->read('online_admission', $where);
        $this->data['students'] = get_join('online_admission', 'student_id_password', 'online_admission.college_id = student_id_password.student_id', $where, ["online_admission.*", "student_id_password.password"]);
        
    
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/apply_now/list', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
    public function apply_permission() {
        $this->data['meta_title'] = 'Permission';
        $this->data['active'] = 'data-target="apply_permission"';
        
        $this->data['permission'] = NULL;
        
        $this->data['permission'] = $this->action->read('online_admission_permission');
        
        
        if(isset($_POST['save'])){
            
            $permission = $this->action->read('online_admission_permission');
            
            if(count($permission)>0){
                $msg_array = array(
                    'title' => 'success',
                    'emit'  => 'Data Successfully Updated!',
                    'btn'   => true
                );
                $this->data['confirmation']=message($this->action->update('online_admission_permission', ['date'=>date('Y-m-d'), 'permission_status'=>$_POST['permission_status']], ['id'=>1]),$msg_array);
                $this->session->set_flashdata('confirmation',$this->data['confirmation']);
                redirect('apply_now/apply_now/apply_permission','refresh');
            }else{
                $msg_array = array(
                'title' => 'success',
                'emit'  => 'Data Successfully Save!',
                'btn'   => true
            );
                $this->data['confirmation']=message($this->action->add('online_admission_permission', ['date'=>date('Y-m-d'),'permission_status'=>$_POST['permission_status']]),$msg_array);
                $this->session->set_flashdata('confirmation',$this->data['confirmation']);
                redirect('apply_now/apply_now/apply_permission','refresh');
            }
        }
    
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/apply_now/apply_permission', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
    public function edit($id){
        $this->data['meta_title'] = 'Apply Now';
        $this->data['active'] = 'data-target="apply_now_menu"';
        
        //read user profile information
        if($information = $this->retrieve->read('online_admission', array('id'=>$id))){

            $this->data['result'] = $information;
            
            $this->load->view($this->data['privilege'].'/includes/header', $this->data);
            $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
            $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
            $this->load->view('components/apply_now/edit', $this->data);
            $this->load->view($this->data['privilege'].'/includes/footer');
        }
    }
    
    public function view($id=NULL) {
        $this->data['meta_title'] = 'Apply Now';
        $this->data['active'] = 'data-target="apply_now_menu"';
        
        
        $this->data['student'] = $this->action->read('online_admission', array('id'=>$id)); 

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/apply_now/view', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
    public function vital_list() {
        $this->data['meta_title'] ='Vital List';
        $this->data['active'] ='data-target="apply_vital_list"';
        $this->data['students'] =[];
        
        $where = [];
        if(isset($_POST['search_item'])){
            
            foreach($_POST['search'] as $key => $val){
                if($val != null){
                    $where[$key] = $val;
                }
            }
            
            $this->data['students'] = $this->action->read('online_admission', $where); 
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/apply_now/vital_list', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
    
    public function deleteStudent($id=NULL) {
        $this->data['confirmation'] = null;

        $student=$this->action->read('online_admission',array('id'=>$id));
         if($student != NULL && is_file($student[0]->photo)){
            unlink($student[0]->photo);
         }

        $msg_array=array(
            "title"=>"Delete",
            "emit"=>"Student Information Successfully Deleted!",
            "btn"=>true
          );

        $this->data['confirmation']=message($this->action->deletedata('online_admission',array('id'=>$id)),$msg_array);
        $this->session->set_flashdata('confirmation',$this->data['confirmation']);
       redirect('apply_now/apply_now','refresh');
    }
    
    public function more($college_id) {
        $this->data['meta_title'] = 'Add More Info';
        $this->data['active'] = 'data-target="apply_now_menu"';

        $this->data['confirmation'] = NULL;
        $this->data['vital_info'] = [];

        if(isset($_POST['save'])) {

            unset($_POST['save']);
            $data = $_POST;
            $data['date'] = date('Y-m-d');
            $data['student_id'] = $college_id;

            $options = array(
                'title' => 'success',
                'emit'  => 'Data Successfully Updated!',
                'btn'   => true
            );

            $options2 = array(
                'title' => 'success',
                'emit'  => 'Data Successfully Saved!',
                'btn'   => true
            );

            if($this->action->exists("vital_info", ['student_id'=>$college_id])){
                $this->data['confirmation'] = message($this->action->update("vital_info", $data, ['student_id'=>$college_id]), $options);
            }else{
                $this->data['confirmation'] = message($this->action->add("vital_info", $data) , $options2);
            }

            $this->session->set_flashdata("confirmation",$this->data["confirmation"]);

            redirect("apply_now/apply_now/more/".$college_id,"refresh");

        }
        $this->data['vital_info'] = $this->action->read('vital_info', ['student_id'=>$college_id,'trash'=>0]);

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/apply_now/more', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
    
}
