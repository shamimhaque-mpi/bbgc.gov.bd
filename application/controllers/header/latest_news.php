<?php

class Latest_news extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('action');
    }
        //-----------------------------------------------------------------------
        //--------------------------Add News start here--------------------------
        //-----------------------------------------------------------------------
    public function index($emit = NULL) {
        $this->data['meta_title'] = 'gallery';
        $this->data['active'] = 'data-target="header_menu"';
        $this->data['subMenu'] = 'data-target="add"';
        $this->data['confirmation'] = $this->data["ind_news"]= null;

        if ($this->input->post("news_Submit")) {
            $data=array(
                    "latest_news_date"=>date('Y-m-d'),
                    "latest_news_title"=>$this->input->post('news_title'),
                    "latest_news_description"=>$this->input->post('news_description'),
                    "latest_news_link"=>$this->input->post('link_url')
                );
            $this->data['confirmation']=message($this->action->add("latest_news",$data));
        }


        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/header/latest-news/news-nav', $this->data);
        $this->load->view('components/header/latest-news/latest_news', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
        //-----------------------------------------------------------------------
        //---------------------------Add News End here---------------------------
        //-----------------------------------------------------------------------

        //-----------------------------------------------------------------------
        //--------------------------View All News start here---------------------
        //-----------------------------------------------------------------------
    public function view_all_news($emit = NULL) {
        $this->data['meta_title'] = 'gallery';
        $this->data['active'] = 'data-target="header_menu"';
        $this->data['subMenu'] = 'data-target="all"';
        $this->data['confirmation'] = $this->data["ind_news"]= null;

        if ($this->input->post("news_Submit")) {
            $data=array(
                    "latest_news_date"=>date('Y-m-d'),
                    "latest_news_title"=>$this->input->post('newsTitle'),
                    "latest_news_description"=>$this->input->post('newsDescription'),
                    "latest_news_link"=>$this->input->post('linkUrl')
                );
            $this->data['confirmation']=message($this->action->add("latest_news",$data));
        }


        //-----------------------------------------------------------------------
        //-----------------------Delete News start here--------------------------
        if($this->input->get("delete_token")){//Deleting Message
            $this->action->deletedata('latest_news',array('id'=>$this->input->get("delete_token")));
            redirect('header/latest_news/view_all_news','refresh');
        }
        //-------------------------Delete News end here--------------------------
        //-----------------------------------------------------------------------

        $this->data["news_info"]=$this->action->read("latest_news",array(),"desc");

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/header/latest-news/news-nav', $this->data);
        $this->load->view('components/header/latest-news/view-all-news', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

        //-----------------------------------------------------------------------
        //---------------------------View All News End here----------------------
        //-----------------------------------------------------------------------    


        //-----------------------------------------------------------------------
        //--------------------------Edit news start here-------------------------
        //-----------------------------------------------------------------------
    public function edit_news($emit = NULL) {
        $this->data['meta_title'] = 'gallery';
        $this->data['active'] = 'data-target="header_menu"';
        $this->data['subMenu'] = 'data-target=""';
        $this->data['confirmation'] = $this->data["ind_news"]= null;

        $where=array(
            'id'=>$this->input->get('news_id')
            );
            
        $msg_array=array(
        "title"=>"Success",
        "emit"=>"Latest News Successfully Updated",
        "btn"=>true
        );

        if ($this->input->post("news_Update")) {
            $data=array(
                    "latest_news_date"=>date('Y-m-d'),
                    "latest_news_title"=>$this->input->post('news_title'),
                    "latest_news_description"=>$this->input->post('news_description'),
                    "latest_news_link"=>$this->input->post('link_url')
                );
            $this->data['confirmation']=message($this->action->update("latest_news",$data,$where),$msg_array);
        }

            $this->data["ind_news"]=$this->action->read("latest_news",$where);


        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/header/latest-news/news-nav', $this->data);
        $this->load->view('components/header/latest-news/edit-news', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

        //-----------------------------------------------------------------------
        //---------------------------Edit News End here--------------------------
        //-----------------------------------------------------------------------

        //--------------------------------------------------------------------------
        //---------------------------Preview News End here--------------------------
        //--------------------------------------------------------------------------
    

     public function preview_news($emit = NULL) {
        $this->data['meta_title'] = '';
        $this->data['active'] = 'data-target="header_menu"';
        $this->data['subMenu'] = 'data-target=""';
        $this->data['confirmation'] = null;

        $this->data['latest_info']=$this->action->read('latest_news');

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/header/latest-news/news-nav', $this->data);
        $this->load->view('components/header/latest-news/preview-news', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

}
        //--------------------------------------------------------------------------
        //---------------------------Preview News End here--------------------------
        //--------------------------------------------------------------------------