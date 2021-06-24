<?php

class SetMarksC extends Teacher_Controller 
 {

    function __construct() 
     {
        parent::__construct();
        $this->load->model('action');
        $this->load->model('retrieve');
        $this->data['meta_title'] = 'set_marks';
    }
    
    public function index() 
     {        

        
       $this->load->view('panel/teacher/includes/header', $this->data);
        $this->load->view('panel/teacher/setMarksV', $this->data);       
        $this->load->view('panel/teacher/includes/footer');     
    }


     public function cadet() {
        $this->data['roll'] = $this->data['students']= null;  
        $this->data['confirmation']=NULL;
        $this->data['banner_record'] = $this->retrieve->read('banner'); 

        if(isset($_POST['btn_generate'])){
            $this->form_validation->set_rules('exam_title', 'Exam name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('year', 'Year', 'trim|required|xss_clean');  
            $this->form_validation->set_rules('batch', 'Batch', 'trim|required|xss_clean');  
            $this->form_validation->set_rules('type', 'Admission Type', 'trim|required|xss_clean');            
            $this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
            
            // get roll 
            $condRoll = array(
                'year' => $this->input->post('year'),
                'class' => $this->input->post('class'),
                'batch' => $this->input->post('batch'),
                'admission_type' => $this->input->post('type')
               
            );

            switch($this->input->post('subject'))
            {
                case 'bangla':
                $this->data['total_marks']=40;
                break;
                case 'math':
                $this->data['total_marks']=55;
                break;
                case 'english':
                $this->data['total_marks']=65;
                break;
                case 'gk_iq':
                $this->data['total_marks']=40;
                break;
                default:
                 $this->data['total_marks']=1;

            }

            $this->data['students'] = $this->action->read('admission', $condRoll);    

      }
        
        // insert into db
        if(isset($_POST['btn_result']))
        {
            $marks = array();           
           
                      
          foreach($this->input->post('roll') as $key => $roll){
                $marks['obtain_marks']  = round($_POST['marks'][$key],2);
                $marks['out_of_75']     = $_POST['out_of_75'][$key]; 
                $marks['wt']            = $_POST['wt'][$key];  
                $marks['wta']           = $_POST['wta'][$key];        
                $marks['marks']         = $_POST['sum'][$key];            
                $marks['grade']         = $_POST['grade'][$key];
                $marks['gp']            = $_POST['gp'][$key];
                
                $data = array(
                    'date' => date('Y-m-d'),
                    'year' => $this->input->post('year_after'),
                    'class' => 6,
                    'batch' => $this->input->post('batch_after'),
                    'group' => 'none',
                    'subject' => $this->input->post('subject_after'),                    
                    'type' => 'compulsory',
                    'exam' => $this->input->post('exam_after'),
                    'roll' => $roll,
                    'marks' => json_encode($marks)
                );
                          
                $this->data['confirmation'] = message($this->action->add('marks', $data));
                
            }
            
        }
        
        $this->load->view('panel/teacher/includes/header', $this->data);
        $this->load->view('panel/teacher/setMarksV-cadet', $this->data);       
        $this->load->view('panel/teacher/includes/footer');     
    }

}
