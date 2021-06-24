<?php

class Ajax extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('action');
    }

    public function retrieveBy($table) {
        $receive = filter_input(INPUT_POST, 'condition');
        $condition = json_decode($receive, TRUE); // json object to array

        $result = $this->action->read($table, $condition);
        echo json_encode($result);
    }

    public function deleteInfo($table) {
        // for database
        $receiveCond = filter_input(INPUT_POST, 'condition');
        $condArray = json_decode($receiveCond, TRUE); // json object to array

        // delete from database
        $confirm = $this->action->deleteData($table, $condArray);
        // show message
        echo $this->data[$confirm];
    }

    public function deleteWithFile($table) {
        // for database
        $receiveCond = filter_input(INPUT_POST, 'condition');
        $condArray = json_decode($receiveCond, TRUE); // json object to array
        // for files
        $receiveFile = filter_input(INPUT_POST, 'file');

        //check file exists or not
        if( !empty($receiveFile) ){
            $fileArray = explode(',', $receiveFile); // create an array
            // delete file from dir
            for($i=0;$i<count($fileArray);$i++){
                $path = './public/attachment/'.$fileArray[$i];
                unlink($path);
            }
        }

        // delete from database
        $confirm = $this->action->deleteData($table, $condArray);
        // show message
        echo $this->data[$confirm];
    }



public function readJoinDataStudentView(){
        // get the incoming object
        $content = file_get_contents("php://input");

        // convart object to array
        $receive = json_decode($content, true);
        
        // take table name from the array
        $form = $receive['from'];
        $join = $receive['join'];

        // take the condition
        $joinCond = $receive['cond'];

        // check and set where condition exists or not
        $where = array();
        if(array_key_exists('where', $receive)){
            foreach ($receive['where'] as $key => $val) {
                if($val != ""){
                    $where[$key] = $val;
                }
            }
        }

        // get information from database
        $result = $this->action->joinAndRead($form, $join, $joinCond, $where);

        // convart the information array to JSON string
        echo json_encode($result);
    }







    public function readJoinData(){
        $by = 'id'; $order = 'ASC';
        // get the incoming object
        $content = file_get_contents("php://input");

        // convart object to array
        $receive = json_decode($content, true);

        // take table name from the array
        $form = $receive['from'];
        $join = $receive['join'];

        // take the condition
        $joinCond = $receive['cond'];
        
        if(isset($receive['order_colum'])){
            $by = $receive['order_colum'];
        }
        
        if(isset($receive['order_by'])){
            $order = $receive['order_by'];
        }
        
        $joinCond = $receive['cond'];

        // check and set where condition exists or not
        $where = array();
        if(array_key_exists('where', $receive)){
            foreach ($receive['where'] as $key => $val) {
                if($val != ""){
                    $where[$key] = $val;
                }
            }
        }

        // get information from database
        $result = get_join($form, $join, $joinCond, $where, null, null, $by, $order);

        // convart the information array to JSON string
        echo json_encode($result);
    }


    public function readJoinDataFromMultipleTable(){
        // get the incoming object
        $content = file_get_contents("php://input");

        // convart object to array
        $receive = json_decode($content, true);

        // take table name from the array
        $form = $receive['from'];
        $join = $receive['join'];

        // check and set where condition exists or not
        $where = array();
        if(array_key_exists('where', $receive)){
            foreach ($receive['where'] as $key => $val) {
                if($val != ""){
                    $where[$key] = $val;
                }
            }
        }

        // get information from databas
        $result = $this->action->multipleJoinAndRead($form, $join, $where);

        // convart the information array to JSON string
        echo json_encode($result);
    }


    // all new functions
    public function read(){
        // get the incoming object
        $content = file_get_contents("php://input");

        // convart object to array
        $receive = json_decode($content, true);

        // take table name from the array
        $table = $receive['table'];

        // set a default condition
        $condition = array();

        // check the condition exists into the array
        if(array_key_exists('cond', $receive)){
            $condition = $receive['cond'];
        }

        // get information from database
        $result = $this->action->read($table, $condition);

        // convart the information array to JSON string
        echo json_encode($result);
    }

    public function delete(){
        // get the incoming object
        $content = file_get_contents("php://input");

        // convart object to array
        $receive = json_decode($content, true);

        // take table name from the array
        $table = $receive['table'];

        // set a default condition
        $condition = array();

        // check the condition exists into the array
        if(array_key_exists('cond', $receive)){
            $condition = $receive['cond'];
        }

        // check and delete file from folder
        if(array_key_exists('file', $receive)){
            if($receive['file'] == true){
                // get information from database
                $result = $this->action->read($table, $condition);
                $this->deleteFile($result[0]->path);
            }
        }

        // delete from database
        $confirm = $this->action->deleteData($table, $condition);

        // show message
        echo $this->data[$confirm];
    }

    public function deleteFileJS(){
        // get the incoming object
        $content = file_get_contents("php://input");

        // convart object to array
        $receive = json_decode($content, true);

        // call the deleteFile function
        $this->deleteFile($receive);
    }

    public function deleteFile($files=array()) {
        foreach($files as $key => $file) {
            $path = './'.$file;
            unlink($path);
        }
    }

    public function save(){
        $result = null;

        // get the incoming object
        $content = file_get_contents("php://input");

        // convart object to array
        $receive = json_decode($content, true);

        // take table name from the array
        $table = $receive['table'];

        // take data from the array
        $data = $receive['data'];

        // set a default condition
        $condition = array();

        // check the condition exists into the array
        if(array_key_exists('cond', $receive)){
            $condition = $receive['cond'];
            $result = $this->action->update($table, $data, $condition);
        } else {
            $result = $this->action->add($table, $data);
        }

        // convart the information array to JSON string
        echo $result;
    }

    public function memberId(){
        // get the incoming object
        $content = file_get_contents("php://input");

        // convart object to array
        $receive = json_decode($content, true);
        $branch = $receive["branch"];
        $team = $receive["team"];

        // get id no
        $memberId = memberId('members', $branch, $team);
        echo $memberId;
    }

    public function calculateAge(){
        echo age($_POST["dob"]);
    }

    public function getTransactionDescription(){
        // get the incoming object
        $content = file_get_contents("php://input");

        // convart object to array
        $receive = json_decode($content, true);
        $key = $receive["key"];

        echo json_encode(config_item($key));
    }

    // all new functions
    public function readstu(){
        // get the incoming object
        $content = file_get_contents('php://input');      
        // convart object to array
        $receive = json_decode($content, true);
        // take table name from the array
        $table = $receive['table'];
        // set a default condition
        $condition = array();
        // check the condition exists into the array
        if(is_array($receive) && array_key_exists('cond', $receive)){
            // $condition = $receive['cond'];
            foreach($receive['cond'] as $key => $val){
                if($val != null){
                    $condition[$key] = $val;
                }
            }
        }
        // get information from database
        $result = $this->action->readStudent($table, $condition);
        // convart the information array to JSON string
        echo json_encode($result);
    }



    // get all data
    public function result(){

        // get the incoming object
        $content = file_get_contents("php://input");

        // convart object to array
        $receive = json_decode($content, true);

        // take table name from the array
        $table = $receive['table'];

        // set a default condition
        $where = [];
        // check the condition exists into the array
        if(array_key_exists('cond', $receive)){
            $where = $receive['cond'];
        }

        // where in
        $where_in = [];
        if(array_key_exists('where_in', $receive)){
            $where_in = $receive['where_in'];
        }

        // check select column
        if(array_key_exists('select', $receive)){
            $select = $receive['select'];
        }else{
            $select = '';
        }

        // check group
        if(array_key_exists('groupBy', $receive)){
            $groupBy = $receive['groupBy'];
        }else{
            $groupBy = '';
        }


        // check order column
        if(array_key_exists('order_col', $receive)){
            $order_col = $receive['order_col'];
        }else{
            $order_col = '';
        }

        // check order by
        if(array_key_exists('order_by', $receive)){
            $order_by  = $receive['order_by'];
        }else{
            $order_by = 'ASC';
        }

        // check limit
        if(array_key_exists('limit', $receive) && array_key_exists('limit_offset', $receive)){
            $limit = $receive['limit'];
            $limit_offset = $receive['limit_offset'];
        }elseif(array_key_exists('limit', $receive)){
            $limit = $receive['limit'];
            $limit_offset = '';
        }else{
            $limit = '';
            $limit_offset = '';
        }

        // get information from database
        $result = get_result($table, $where, $select, $groupBy, $order_col, $order_by, $limit, $limit_offset, $where_in);

        // convart the information array to JSON string
        echo json_encode($result);
    }


    // get all join data
    public function join(){

        // get the incoming object
        $content = file_get_contents("php://input");


        // convart object to array
        $receive = json_decode($content, true);

        // take table name from the array
        $tableFrom  = $receive['tableFrom'];
        $tableTo    = $receive['tableTo'];

        // join condition
        $joinCond = [];
        // check the condition exists into the array
        if(array_key_exists('joinCond', $receive)){
            $joinCond = $receive['joinCond'];
        }

        // where condition
        $where = [];
        if(array_key_exists('cond', $receive)){
            $where = $receive['cond'];
        }

        $where_in = [];
        if(array_key_exists('where_in', $receive)){
            $where_in = $receive['where_in'];
        }

        // check select column
        if(array_key_exists('select', $receive)){
            $select = $receive['select'];
        }else{
            $select = '';
        }

        // check group
        if(array_key_exists('groupBy', $receive)){
            $groupBy = $receive['groupBy'];
        }else{
            $groupBy = '';
        }

        // check border by
        if(array_key_exists('order_col', $receive)){
            $order_col = $receive['order_col'];
        }else{
            $order_col = '';
        }

        if(array_key_exists('order_by', $receive)){
            $order_by  = $receive['order_by'];
        }else{
            $order_by = 'ASC';
        }

        // check limit
        if(array_key_exists('limit', $receive) && array_key_exists('limit_offset', $receive)){
            $limit = $receive['limit'];
            $limit_offset = $receive['limit_offset'];
        }elseif(array_key_exists('limit', $receive)){
            $limit = $receive['limit'];
            $limit_offset = '';
        }else{
            $limit = '';
            $limit_offset = '';
        }

        // get information from database
        $result = get_join($tableFrom, $tableTo, $joinCond, $where, $select, $groupBy, $order_col, $order_by, $limit, $limit_offset, $where_in);

        // convart the information array to JSON string
        echo json_encode($result);
    }

}
