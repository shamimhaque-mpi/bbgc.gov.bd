<?php

class Send_sms extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('action');
        $this->data['active'] = 'data-target="sendIDPass"';

    }

    public function index()
    {
        $this->data['meta_title']   = 'Apply Now';
        $this->data['confirmation'] = null;


        $where['YEAR(date)']       = date('Y');
        $this->data['allStudents'] = get_result('student_id_password', $where);


        //Sending SMS Start here
        if ($this->input->post("mobile")) {

            $content = $this->input->post('message');
            foreach ($this->input->post("mobile") as $key => $num) {

                $message = send_sms($num, $content[$key]);

                $insert = array(
                    'delivery_date'    => date('Y-m-d'),
                    'delivery_time'    => date('H:i:s'),
                    'mobile'           => $num,
                    'message'          => $content[$key],
                    'total_characters' => strlen($content[$key]),
                    'total_messages'   => message_length(strlen($content[$key])),
                    'delivery_report'  => $message
                );

                if ($message) {
                    $this->action->add('sms_record', $insert);
                }
            }

            if ($message) {
                $msg_array                  = array(
                    "title" => "Success",
                    "emit"  => "SMS Sent Successfully",
                    "btn"   => true
                );
                $this->data['confirmation'] = message('success', $msg_array);
            } else {
                $msg_array                  = array(
                    "title" => "Success",
                    "emit"  => "Could not send this SMS!",
                    "btn"   => true
                );
                $this->data['confirmation'] = message('warning', $msg_array);
            }

            $this->session->set_flashdata("confirmation", $this->data['confirmation']);
            redirect("apply_now/send_sms", "refresh");
        }
        //Sending SMS End here

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/apply_now/send-sms', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    public function edit($id = null)
    {
        $this->data['meta_title']   = 'Apply Now';
        $this->data['confirmation'] = null;
        $this->load->library('upload');

        $where  = ['id' => $id];
        $this->data['info'] = get_row('student_id_password', $where);
        
        // update student info
        if (isset($_POST['update'])) {
            
            $data = data_array(['student_id', 'password', 'mobile']);
            
          

            if (!empty($_FILES['photo']['name'])) {

                if (file_exists($this->data['info']->photo)) {
                    unlink('./' . $this->data['info']->photo);
                }
                $data['photo'] = file_upload('photo', 'admission19');
            } else {
                $data['photo'] = $this->input->post('old_photo');
            }

            $data['updated'] = date("Y-m-d");

            // send success message
            $msg_array = array(
                "title" => "Success",
                "emit"  => "Student information update successfully!",
                "btn"   => true
            );

            $this->data['confirmation'] = message($this->action->update('student_id_password', $data, $where), $msg_array);
            $this->session->set_flashdata("confirmation", $this->data['confirmation']);
            redirect("apply_now/send_sms", "refresh");
        }

        //Sending SMS End here

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/apply_now/edit-id-pass', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }


    public function delete($id = null)
    {

        if (!empty($id)) {
            $info = get_row('student_id_password', ['id' => $id]);

            if (file_exists($info->photo)) {
                unlink($info->photo);
            }

            $options = array(
                'title' => "delete",
                'emit'  => "Student ID/Password Successfully Deleted!",
                'btn'   => true
            );

            $this->data['confirmation'] = message($this->action->deleteData('student_id_password', ['id' => $id]), $options);
            $this->session->set_flashdata("confirmation", $this->data['confirmation']);
            redirect("apply_now/send_sms", "refresh");
        }

    }


}
