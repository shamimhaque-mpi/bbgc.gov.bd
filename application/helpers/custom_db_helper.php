<?php 

	/*this method for reading data from database*/
	function read($data=null, $Extra_cond=null, $Extra_order_by='id DESC', $Extra_limit=null, $Extra_offset=null){
		$ci =& get_instance();
		/*check data is array or not*/
		if(is_array($data)){
			$table 	     = isset($data['table']) ? $data['table'] : null;
			$cond  	     = isset($data['cond']) ? $data['cond'] : null;
			$offset      = isset($data['offset']) ? $data['offset'] : null;
			$limit       = isset($data['limit']) ? $data['limit'] : null;
			$order_by    = isset($data['order_by']) ? $data['order_by'] : null;//'id ASC, name DESC'
			$group_by    = isset($data['group_by']) ? $data['group_by'] : null;//["title", "date"]
			$distinct_by = isset($data['distinct_by']) ? $data['distinct_by'] : null;//["title", "date"]
			$select      = isset($data['select']) ? $data['select'] : '*';//'title, content, date'

			// read table
        	$ci->db->select($select);
			
			if($distinct_by!==null) $ci->db->distinct($distinct_by);
			if($group_by!==null)    $ci->db->group_by($group_by);
			if($order_by!==null)    $ci->db->order_by($order_by);
			
			$result = $ci->db->get_where($table,$cond,$limit, $offset);
			
			/* EX:
			/*  $query = [
		    /*        'table'=>'tablename',
		    /*        'limit'=>4,
		    /*        'offset'=>0,
		    /*        'order_by'=>'id DESC',
		    /*        'group_by'=>['date'],
		    /*        'distinct_by'=>["title", "date"]
		    /*  ];
		    /*  read($query);
			*/

		}else{
			$Extra_table = $data;
					  $ci->db->order_by($Extra_order_by);
			$result = $ci->db->get_where($Extra_table, $Extra_cond, $Extra_limit, $Extra_offset);
			/*
			/* read('tablename', $where, 10, 0);
			*/
		}

		if(empty($result->result())){
			return false;
		}else{
			return $result->result();
		}
	}


	/**this method for join read from database
	/* Ex:

        $select    = 'news.*, category.name as cat_name';
        $join_cond = 'news.cat_id=category.id';
        $where     = ['category.status'=>1];

        $this->data['result'] = join_read('news', 'category', $join_cond,$where, $select);

	/* $order_by=null, $limit=null, $offset=0 */

	function join_read($from=null, $join=null, $joinCond=null, $where=null, $select=null, $limit=null, $offset=0, $order_by=null) {
		$ci =& get_instance();

		$ci->db->select($select);
		$ci->db->from($from);
		$ci->db->join($join, $joinCond);
		if($order_by!==null){
			$ci->db->order_by($order_by);
		}else{
			$ci->db->order_by("$from.id DESC");
		}
		if($where!==null){
			$ci->db->where($where);
		}
		if($limit!==null){
			$ci->db->limit($limit, $offset);
		}
		$query = $ci->db->get();
		$result = $query->result();

		if(count($result)>0){
			return $result;
		}else{
			return false;
		}
	}


	/*this method for chacking existance data into database*/
	function exist($tablename=null,$cond = []){
		$ci =& get_instance();
		if($tablename !== null && is_array($cond) && count($cond) > 0){
			if(!empty($ci->db->get_where($tablename, $cond)->result())){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}


	/*this method for inserting data into database*/
	function save($tablename=null,$data = []){
		$ci =& get_instance();
		if($tablename !== null && is_array($data) && count($data) > 0){
			if($ci->db->insert($tablename, $data)){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}


	/*this method to update database table*/
	function update($tablename=null, $data = null, $cond=null){
		$ci =& get_instance();
		if($tablename !== null && is_array($data) && count($data) > 0 &&  is_array($cond) && count($cond) > 0){
			$ci->db->where($cond);
			$result = $ci->db->update($tablename, $data);

			if($result){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}


	/*this method for deleting data from database*/
	function delete($table=null, $cond=null){
		$ci =& get_instance();
		if($table!==null && is_array($cond) && count($cond)>0){
			if($ci->db->delete($table, $cond)){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}


	function query($query){
		$ci =& get_instance();
		$query = $ci->db->query($query)->result();
		if($query){
			return $query;
		}else{
			return false;
		}
	}


	//image upload mathod
    /** 
    /*you have need to send 5 argument by upload() function following this sequence
    /*  (01) input field name attribute value (<input type='file' name="img">)
    /*  (02) allowed types as array like: array('jpg','png','gif')
    /*  (03) allowed file size in kb
    /*  (04) upload location with '/' at the end like: "path/img/"
    /*  (05) file name without extenssion like: fileName
    /*
    /* Then this function return the file location with file name you cane save this 
    /*  in to database for future use.

        //image size, path and name setup Example
        ---------------------------------------------
        $types = array('jpg','JPG','png','PNG','gif','GIF'); //(optional)
        $path  = "frontend/images/banner/";
        $name  = 'multimedia'.(strtotime(date('Y-m-d h:i:s'))*10);////(optional)
        $size  = '1024';//(optional)

        if($path = upload_img("banner", $types, $size="1024", $path, $name)){
            $data['path'] = $path;
        }
    */

    function upload_img($file=null,$types=null,$size=null,$path=null,$name=null){
        
        if(is_null($file)){
            echo 'Please Set Your File Name from input field';
            return false;
        }
        $upload_path  = '';
        $allowed_types= array('jpg','JPG','png','PNG','gif','GIF');
        $max_size     = 1000;
        $file_name    = pathinfo($_FILES[$file]['name'])['filename'];
        $error_msg = null;

        //chacking argument and setting value
        if(!empty($types) || !is_null($types)){
            $allowed_types = $types;
        }
        if(!empty($size) || !is_null($size)){
            $max_size = $size;
        }
        if(!empty($path) || !is_null($path)){
            $upload_path = $path;
        }
        if(!empty($name) || !is_null($name)){
            $file_name = $name;
        }

        //if this directory not exist creat automatically this directory
        if(!is_dir($upload_path)){
            mkdir($upload_path);
        }


        //chacking file type
        $file_type = pathinfo($_FILES[$file]['name'])['extension'];
        if (in_array($file_type, $allowed_types)) {

            //chacking file size
            if ($_FILES[$file]['size']<=$max_size*1000) {
                //now time to upload the image
                if(copy($_FILES[$file]['tmp_name'], $upload_path."/".$file_name.".".$file_type)){
                    $upload_path = $upload_path.$file_name.".".$file_type;
                    return $upload_path;
                }else{
                    return false;
                }
            }else{
                $error_msg['img_type'] = "File size must be less than ".$max_size."kb";
            }
            echo pathinfo($_FILES[$file]['name'])['extension'];
        }else{
            $error_msg['img_type'] = "This file type is not supported";
        }
    }



    //set msg like: $_SESSION['msg'] = set_msg('warning', 'Warning', 'success');
	function set_msg($type=null, $title=null, $msg=null,$btn=true,$name="msg"){
	    $ci =& get_instance();
	    $ci->load->library('session');

	    $icon = "";
	    switch ($type) {
	        case 'success':
	            $icon = "<i class='fa fa-check-square'></i>";
	            break;

	        case 'warning':
	            $icon = "<i class='fa fa-exclamation-triangle'></i>";
	            break;

	        case 'danger':
	            $icon = "<i class='fa fa-close'></i>";
	            break;
	    }

	    $btn = ($btn) ? "<button class='close' onclick='this.parentElement.style.display=none'><i class='fa fa-close'></i></button>" : '';

	    $msg = "<div class='man_alert man_alert_".$type."'>"
	    			.$btn.
	                "<div class='icon'>".$icon."</div>
	                <div class='content'>
	                    <div>
	                        <strong>".ucwords($title)."!</strong> <br>
	                    </div>
	                    <div>".ucwords($msg)."</div>
	                </div>
	            </div>";

	    $ci->session->set_flashdata($name, $msg);
	}

	// for db sessional massage print
	function msg($msg='msg'){
	    $ci =& get_instance();
	    $ci->load->library('session');
	    echo $ci->session->flashdata($msg);
	}

	function redirect_back($arg='') {
		return redirect($_SERVER['HTTP_REFERER'].$arg);
	}


	function short_text($text=null, $limit=250){
		if($text !== null){
			$text 	  = strip_tags($text);
			$text 	  = substr($text,0,$limit);
			$position = strripos($text, ' ');
			$text 	  = substr($text,0,$position)."...";
			return $text;
		}
	}


    function logedIn(){
	    $ci =& get_instance();
	    $ci->load->library('session');
        if($ci->session->flashdata('loged_in')){
            redirect("frontend_users/dashboard");
        }else{
        	set_msg("danger","danger","Username or password not matched!",false);
            redirect("login-registration");
        }
    }