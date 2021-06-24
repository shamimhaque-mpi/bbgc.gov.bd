<?php

class ImageGallery extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('action');
        $this->load->library('upload');
    }
    
    public function index($emit = NULL) {
        $this->data['meta_title'] = 'gallery';
        $this->data['active'] = 'data-target="header_menu"';
        $this->data['subMenu'] = 'data-target="image_gallery"';
        $this->data['confirmation'] = null;

        //-----------------------------------------------------------------------
        //------------------------Save Gallery start here------------------------
        //-----------------------------------------------------------------------
        if ($this->input->post('gallery_Save')) {
/*              $config['upload_path'] = './public/gallery';
                $config['allowed_types'] = 'png|jpg|gif';
                $config['max_size'] = '4096';
                $config['max_width'] = '3000'; /* max width of the image file 
                $config['max_height'] = '3000';
                $config['file_name'] ="gallery".rand(1111,9999); 
                $config['overwrite']=false;
                
                $this->upload->initialize($config);*/

            $files = $_FILES;
            $count = count($_FILES['gallery_image']['name']);
            $galleryTitle=$this->input->post('galleryTitle');
            for($i=0; $i<$count; $i++){
                $_FILES['gallery_image']['name']= $files['gallery_image']['name'][$i];
                $_FILES['gallery_image']['type']= $files['gallery_image']['type'][$i];
                $_FILES['gallery_image']['tmp_name']= $files['gallery_image']['tmp_name'][$i];
                $_FILES['gallery_image']['error']= $files['gallery_image']['error'][$i];
                $_FILES['gallery_image']['size']= $files['gallery_image']['size'][$i]; 

                $file_name="gallery".rand(1111,9999).".".pathinfo($_FILES['gallery_image']['name'],PATHINFO_EXTENSION); 

                $this->upload->initialize($this->set_upload_options($file_name));
                if($this->upload->do_upload('gallery_image') == true){
                    $data=array(
                        'gallery_title'=>$galleryTitle[$i],
                        'gallery_path'=>"public/gallery/".$file_name
                        );
                    $this->action->add("gallery",$data);
                }
            }
                
        }
        //-----------------------------------------------------------------------
        //-------------------------Save Gallery end here-------------------------
        //-----------------------------------------------------------------------

        //-----------------------------------------------------------------------
        //-----------------------Delete Gallery Start here-----------------------
        //-----------------------------------------------------------------------
        if($this->input->get("delete_token")){//Deleting Message
            $this->action->deletedata('gallery',array('id'=>$this->input->get("delete_token")));
            if (is_file("./".$this->input->get("img_url"))) {
                unlink("./".$this->input->get("img_url"));
            }
            redirect('header/imageGallery','refresh');
        }
        //-----------------------------------------------------------------------
        //------------------------Delete Gallery End here------------------------
        //-----------------------------------------------------------------------        
        //$this->data["gallery_data"]=$this->action->read("gallery");
        $this->data["gallery_data"]=$this->action->readOrderby("gallery","position");

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/header/image-gallery', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function ajax_img_sort(){
        $receive_data=$this->input->post('finaldata'); 
        //echo $receive_data;
        $receive_array=json_decode($receive_data,true);

        foreach ($receive_array as $key => $value) {
            $where=array("id"=>$key);
            $data=array(
                "position"=>$value
                );
            $this->action->update("gallery",$data,$where);
        }
    }

    private function set_upload_options($file_name){   
        $config = array();
        $config['upload_path'] = './public/gallery';
        $config['allowed_types'] = 'png|jpg|gif';
        $config['file_name'] =$file_name; 
        $config['overwrite']     = true;
        return $config;
    }

}
