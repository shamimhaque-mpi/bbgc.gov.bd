<?php

class Action extends Lab_Model {

    function __construct() {
        parent::__construct();
    }

    // for custom helper
    public function maxId($table) {
        $sql = "SELECT id AS maxId FROM $table ORDER BY id DESC LIMIT 1";

        $query = $this->db->query($sql);
        if($query->num_rows() > 0){
            return $query->result();
        }
        return 0;
    }

    // for custom helper
    public function forIdGenerator($table) {
        $this->_table_name = $table;
        $this->_order_type = 'desc';
        $this->_limit = '1';

        return $this->retrieve();
    }
    public function read_total($table, $column, $where=array()){
        $this->db->select_sum($column);
        $this->db->where($where);
        $query = $this->db->get($table);
        return $query->result();
    }



 public function readIncomeMonthYearwise(){
        $query = $this->db->query('SELECT DISTINCT year(date) as year,month(date) as month FROM  income group by month(date),year(date) order by year(date),month(date)');
        return $query->result();
    }    

    public function readCostMonthYearwise(){
        $query = $this->db->query('SELECT DISTINCT year(date) as year,month(date) as month FROM  cost  where  month(date) != 0  group by month(date),year(date) order by year(date),month(date)');
        return $query->result();
    }   
    public function readIncomeFieldWise(){
        $query = $this->db->query('SELECT date,sum(amount) as amount,income_field  FROM  income group by month(date),year(date) order by year(date),month(date)');
        return $query->result();
    }  



    // retrieve unic value from database
    public function read_distinct($table, $where = array(), $column) {
        $this->db->distinct();
        $this->db->select($column);
        $this->db->where($where);

        return $this->db->get($table)->result();
    }
    // check existance
    public function exists($table, $where) {
        return $this->existance($table, $where);
    }

    // save into database
    public function add($table, $data) {
        $this->_table_name = $table;
        return $this->save($data);
    }

    // update into database
    public function update($table, $data, $where) {
        $this->_table_name = $table;
        return $this->save($data, $where);
    }

       // retrieve from database
    public function readStudent($table, $where = array(), $by="roll", $type="asc") {
       $this->_order_by = $by;
       $this->_order_type = $type;

       $this->_table_name = $table;

       if(count($where) > 0){
            return $this->retrieve_by($where);
        }

        return $this->retrieve();
    }
    
    //for join admission and registration table
    public function readAttendanceInfo($table1,$table2,$cond=array()){
        $roll=$cond['roll'];
        $sql="SELECT * FROM $table1 , $table2  WHERE $table1 .student_id = $table2 .reg_id and roll=$roll";
        $query = $this->db->query($sql);
        return $query->result();
    }
    

    	// retrieve from database using two table
    public function joinAndReadOrderBy($from, $join, $joinCond, $where=array(),$by= NULL,$type=NULL){
        $this->db->select('*');
        $this->db->from($from);
        $this->db->join($join, $joinCond); // joinCond is a string e.g: "admission.student_id=registration.id"
        $this->db->order_by($by,$type);
        $this->db->where($where);

        $query = $this->db->get();

		return $query->result();
    }
    // retrieve from database
    public function read($table, $where = array(), $by="asc") {
        $this->_table_name = $table;
        $this->_order_type = $by;

        if(count($where) > 0){
            return $this->retrieve_by($where);
        } else {
            return $this->retrieve();
        }
    }

    public function readGroupBy($table, $groupBy, $where=array(), $orderBy="id", $sort="desc"){
        $this->db->select('*');
        $this->db->group_by($groupBy);
        $this->db->order_by($orderBy, $sort);
        $this->db->where($where);
        $result = $this->db->get($table);

        return $result->result();
    }
    
    public function read_sum($table, $column, $where=array()){
        $this->db->select_sum($column);
        $this->db->where($where);
        $result = $this->db->get($table);

        return $result->result();
    }

    public function read_limit($table, $where = array(), $by="asc",$limit) {
        $this->_table_name = $table;
        $this->_order_type = $by;
        if (isset($limit)) {
            $this->_limit = $limit;
        }

        if(count($where) > 0){
            return $this->retrieve_by($where);
        } else {
            return $this->retrieve();
        }
    }

	// retrieve from database using two table
    public function joinAndRead($from, $join, $joinCond, $where=array()){
        $this->db->select('*');
        $this->db->from($from);
        $this->db->join($join, $joinCond);
        $this->db->where($where);

        $query = $this->db->get();

		return $query->result();
    }

    // retrieve from database using multiple table
    public function multipleJoinAndRead($from, $details=array(), $where=array()){
        $this->db->select('*');
        $this->db->from($from);

        // check type exists or not
        foreach ($details as $key => $val) {
            if(array_key_exists("type", $val)){
                $this->db->join($key, $val["condition"], $val["type"]);
            } else {
                $this->db->join($key, $val["condition"]);
            }
        }

        // appling condition
        $this->db->where($where);
        // get the result set
        $query = $this->db->get();
        // return the set
        return $query->result();
    }

    public function searchTransaction($table) {
        $bank= $this->input->post('bank_name');
        $account= $this->input->post('account_no');
        $fromDate= $this->input->post('date_from');
        $toDate= $this->input->post('date_to');

        $sql = "SELECT * FROM $table WHERE bank='$bank' AND account_number='$account' AND transaction_date BETWEEN   '$fromDate' AND  '$toDate' ";

		$query = $this->db->query($sql);
		return $query->result();
    }

	public function searchCost($table){
        $fromDate= $this->input->post('date_from');
        $toDate= $this->input->post('date_to');

        $sql = "SELECT * FROM $table WHERE  datetime BETWEEN   '$fromDate' AND  '$toDate' order by datetime asc";

		$query = $this->db->query($sql);
		return $query->result();
    }

    // retrieve from database
    public function showbyClass($table, $where = array()){
        $this->_table_name = $table;
        return $this->retrieve_by($where);
    }

	// retrieve from database
    public function show($table){
        $this->_table_name = $table;
		$this->_limit = '10';
        $this->_order_type = 'desc';
        return $this->retrieve();
    }

	// retrieve from database
    public function showbyDesc($table){
        $this->_table_name = $table;
        $this->_order_type = 'desc';
        return $this->retrieve();
    }

    // delete information from table
    public function deleteData($table, $where) {
        $this->_table_name = $table;

        if($this->delete($where)){
            return 'danger';
        }
    }

	public function getAllItems($table) {
        return $this->db->distinct('account_number')->from($table)->get()->result();
    }// for distinct value


    public function retrieve_cond($table, $where = array(), $order = 'asc') {
        $this->db->where($where);
        $this->db->order_by("id", $order);
        $query = $this->db->get($table);

        if($query->num_rows() > 0){
            return $query->result();
        } else {
            return FALSE;
        }
    }

	// retrieve from database
    public function readDistinct($table, $field_name){
        $sql = "select distinct $field_name from $table";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function read_leftJoin($leftTable,$leftField,$rightTable,$rightField){

        $sql= "select * from $leftTable LEFT JOIN users ON $leftTable.$leftField=$rightTable.$rightField";
        $query=$this->db->query($sql);
        return $query->result();
    }



 public function read_leftJoin_search_id($leftTable,$leftField,$rightTable,$rightField,$search){
        $sql= "select * from $leftTable LEFT JOIN users ON $leftTable.$leftField=$rightTable.$rightField where employee_emp_id =$search";
        $query=$this->db->query($sql);
        return $query->result();
    }


    public function check_existance($table, $where) {
        return $this->existance($table, $where);
    }
   

    public function update_profile($info, $where) {
        return $this->save($info, $where);
    }

    public function sms_between($table,$fromDate,$toDate) {
        $sql = "SELECT * FROM $table WHERE delivery_date BETWEEN   '$fromDate' AND  '$toDate' ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function readOrderby($table,$column,$where=array()){
    	$condition="";
    	if(count($where)>0){
	    	$key_value=array();
	    	foreach($where as $key=>$value){
	    	   $key_value[]='`'.$key.'`='.'"'.$value.'"';
	    	}
	    	$condition='where '.implode(' and ',$key_value);

    	}
        $sql = "SELECT * FROM $table $condition ORDER BY $column asc";
        $query = $this->db->query($sql);
        return $query->result();
    }
    // Sum function
    public function sum($table, $column, $where=array()){
        $this->db->select("SUM($column) as total");
        $this->db->where($where);
        $result = $this->db->get($table);

        return $result->result();
    }

        //save data into db and return auto increment ID
      public function addAndGetID($table, $data){
         $this->db->insert($table,$data);
         $insert_id = $this->db->insert_id();
         return  $insert_id;
       }
       
       
       
    public function readPagination($table,$where = array(), $per_page,$offset,$order="asc") {
        $this->db->order_by('id',$order);
        $this->db->where($where);
        $query=$this->db->get($table,$per_page,$offset);
        if($query->num_rows()>0){
          return $query->result();
        }else{
          return FALSE;
        }
        
    }  

}
