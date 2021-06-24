<?php

class SmsApiModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    
    public function record(){
        
        $totalSms = $this->db->query("SELECT IFNULL(SUM(sms), 0) AS total_sms FROM recharge_sms")->row()->total_sms;
        $sendSms = $this->db->query("SELECT IFNULL(SUM(total_messages), 0) AS send_sms FROM sms_record WHERE delivery_report=1")->row()->send_sms;
        
        $data = [[
            'total_sms'     => $totalSms,
            'send_sms'      => $sendSms,
            'remaining_sms' => $totalSms - $sendSms,
        ]];
        
        return json_encode($data);
    }
    
    public function recharge(){
        
        if(!empty($_POST['recharge']) && $_POST['recharge'] == 'yes'){
            
            $smsData = [
                'date'   => date('Y-m-d'),
                'amount' => $_POST['amount'],
                'sms'    => $_POST['quantity'],
            ];
            
            $this->db->insert('recharge_sms', $smsData);
            
            $data = ['status' => 'success'];
        }else{
            $data = ['status' => 'error'];
        }
        
        return json_encode($data);
    }
}
