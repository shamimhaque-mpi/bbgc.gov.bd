<?php

class Lab_Controller extends CI_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();

        $this->data['errors'] = array();
        $this->data['site_name'] = config_item('site_name');
        $this->data['description'] = NULL;
    }
}

// for fornend
class Frontend_Controller extends Lab_Controller {

    function __construct() {
        parent::__construct();

        // Set default meta title
        $this->data['meta_title'] = 'Frontend meta title';
        $this->load->helper("confirmation");
        $this->load->helper("frontend");

    }

}

// for backend
class Admin_Controller extends Lab_Controller {

    function __construct() {
        parent::__construct();

        // Set default meta title
        $this->data['meta_title'] = 'Backend meta title';

        // Load helpers
        $this->load->helper('form');
        $this->load->helper("file");
        $this->load->helper("admin");
        $this->load->helper("custom");
        $this->load->helper("sms");
        $this->load->helper("confirmation");

        // Load libraties
        $this->load->library('form_validation');
        $this->load->library('session');

        // Load models
        $this->load->model('membership_m');

        // Login check
        $exception_uris = array(
            'access/users/login',
            'access/users/logout'
        );

        if(in_array(uri_string(), $exception_uris) == FALSE) {
            if($this->membership_m->loggedin() == FALSE) {
                redirect('access/users/login');
            } else {
                // set profile image
                // $status = json_decode($this->session->userdata('status'));
                $this->data['image'] = $this->session->userdata('image');
                $this->data['username'] = $this->session->userdata('username');
                $this->data['name'] = $this->session->userdata('name');
                $this->data['email'] = $this->session->userdata('email');
                $this->data['mobile'] = $this->session->userdata('mobile');
                $this->data['branch'] = $this->session->userdata('branch');

                $list_of_privilege = config_item('privilege');
                $this->data['privilege'] = $this->session->userdata('privilege');
            }
        }
    }

}

// for subscriber
class Subscriber_Controller extends Lab_Controller {

    function __construct() {
        parent::__construct();

        // Set default meta title
        $this->data['meta_title'] = 'Subscriber meta title';
        // Load libraties
        $this->load->library('session');
        // Load models
        $this->load->model('subscriber_m');
        // Login check
        $exception_uris = array(
            'access/subscriber/login',
            'access/subscriber/logout'
        );

        if (in_array(uri_string(), $exception_uris) == FALSE) {
            if ($this->subscriber_m->loggedin() == FALSE) {
                redirect('access/subscriber/login');
            } else {
                $this->data['photo'] = $this->session->userdata('photo');
                $this->data['username'] = $this->session->userdata('username');
                $this->data['name'] = $this->session->userdata('name');     
                        
                $this->data['year'] = $this->session->userdata('year');
                $this->data['session'] = $this->session->userdata('session');
                $this->data['mobile'] = $this->session->userdata('guardian_mobile');
                $this->data['address'] = $this->session->userdata('present_address');
          }
        }
    }

}




// for backend
class Teacher_Controller extends Lab_Controller {

    function __construct() {
        parent::__construct();

        // Set default meta title
        $this->data['meta_title'] = 'Teacher panel meta title';

        // Load helpers
        $this->load->helper('form');
        $this->load->helper("file");
        $this->load->helper("msg");

        // Load libraties
        $this->load->library('form_validation');
        $this->load->library('session');

        // Load models
        $this->load->model('teacher_membership_m');

        // Login check
        $exception_uris = array(
            'access/teachers/login',
            'access/teachers/logout'
        );

        if (in_array(uri_string(), $exception_uris) == FALSE) {
            if ($this->teacher_membership_m->loggedin() == FALSE) {
                redirect('access/teachers/login');
            } else {
                // set profile image
                $this->data['name'] = $this->session->userdata('name');
                $this->data['username'] = $this->session->userdata('username');
                $this->data['mobile'] = $this->session->userdata('mobile');
                $this->data['type'] = $this->session->userdata('type');
                $this->data['designation'] = $this->session->userdata('designation');
                $this->data['photo'] = $this->session->userdata('photo');
                $this->data['subject'] = $this->session->userdata('subject');
            }
        }
    }

}



