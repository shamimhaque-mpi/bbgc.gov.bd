<?php

/**
 * Methods:
 *    index: Add payment to the table
 *   payment_approve   : Approve payment
 *   payment_disapprove: Disapprove payment
 *   delete_payment    : Delete payment
 */
class Receieve_payment extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('action');
    }

    public function index()
    {

        $this->data['meta_title']   = 'Payment';
        $this->data['active']       = 'data-target="payment_menu"';
        $this->data['subMenu']      = 'data-target="receieve_payment"';
        $this->data['confirmation'] = null;


        if ($this->input->post('payment')) {

            /*$where = array(
                'year'       => $this->input->post('year'),
                'session'    => $this->input->post('session'),
                'class'      => $this->input->post('class'),
                'section'    => $this->input->post('section'),
                'student_id' => $this->input->post('student_id'),
                'type'       => $this->input->post('type'),
                'month'      => $this->input->post('month')
            );
    
            if($this->action->exists("payment",$where)){
                $options = array(
                    'title'  => 'warning',
                    'emit'   => 'The Payment of this Student has been already Received in this Month!',
                    'btn'    => true
                );
    
                $mesg = message('warning',$options);
                $this->session->set_flashdata("confirmation",$mesg);
                redirect("payment/receieve_payment","refresh");
            }else{}*/


            // calculate invoice number
            $paymentID  = $this->action->addAndGetID("payment_meta", array('student_id' => $this->input->post('student_id')));
            $invoice_no = date("y") . date("m") . str_pad($paymentID, "4", 0, STR_PAD_LEFT);
            $this->action->update("payment_meta", array("invoice_no" => $invoice_no), array("id" => $paymentID));

            foreach ($_POST['field_name'] as $key => $value) {
                $data = array(
                    "invoice_no"      => $invoice_no,
                    'date'            => $this->input->post('date'),
                    'time'            => date('h:i:s A'),
                    'year'            => $this->input->post('year'),
                    'session'         => $this->input->post('session'),
                    'class'           => $this->input->post('class'),
                    'section'         => $this->input->post('section'),
                    'student_id'      => $this->input->post('student_id'),
                    'guardian_mobile' => $this->input->post('guardian_mobile'),
                    'type'            => $this->input->post('type'),
                    'month'           => $this->input->post('month'),
                    'field'           => $_POST['field_name'][$key],
                    'description'     => $_POST['description'],
                    'amount'          => $_POST['amount'][$key]
                );

                $this->action->add("payment", $data);
            }

            redirect('payment/payment_singleView?invoice_no=' . $invoice_no, 'refresh');

        }

        $this->data['description'] = $this->action->read('description');


        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/payment/nav', $this->data);
        $this->load->view('components/payment/receieve_payment', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }


    public function edit_payment()
    {

        $this->data['meta_title']   = 'Payment';
        $this->data['active']       = 'data-target="payment_menu"';
        $this->data['subMenu']      = 'data-target="payment_report"';
        $this->data['confirmation'] = null;

        $this->data['allField'] = get_result('payment_field');

        if (!empty($this->input->get('invoice_no'))) {

            $this->data['info'] = get_row('payment', ['invoice_no' => $this->input->get('invoice_no')]);
        } else {

            redirect('payment/payment_report', 'refresh');
        }

        $this->data['description'] = $this->action->read('description');

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/payment/nav', $this->data);
        $this->load->view('components/payment/edit_payment', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    public function payment_update()
    {
        if (isset($_POST['update'])) {

            $info = get_row('payment', ['invoice_no' => $_POST['invoice_no']]);

            foreach ($_POST['field'] as $key => $value) {

                if (!empty($_POST['id'][$key])) {

                    $where = ['id' => $_POST['id'][$key]];

                    $data = [
                        'date'        => $_POST['date'],
                        'time'        => date('h:i:s A'),
                        'amount'      => $_POST['amount'][$key],
                        'description' => $this->input->post('description')
                    ];


                } else {
                    $where = [];

                    $data = [
                        'date'            => $_POST['date'],
                        'time'            => date('h:i:s A'),
                        'invoice_no'      => $info->invoice_no,
                        'year'            => $info->year,
                        'session'         => $info->session,
                        'class'           => $info->class,
                        'section'         => $info->section,
                        'student_id'      => $info->student_id,
                        'guardian_mobile' => $info->guardian_mobile,
                        'type'            => $info->type,
                        'month'           => $info->month,
                        'field'           => $_POST['field'][$key],
                        'description'     => $_POST['description'],
                        'amount'          => $_POST['amount'][$key],
                        'status'          => $info->status,
                    ];
                }
                // update payment data
                save_data('payment', $data, $where);
            }

            // delete row
            if (!empty($_POST['trash_id'])) {
                foreach ($_POST['trash_id'] as $id) {
                    if (!empty($id)) {
                        save_data('payment', ['trash' => 1], ['id' => $id]);
                    }
                }
            }

            $msg = [
                'title' => 'success',
                'emit'  => 'Payment update successfully.',
                'btn'   => true
            ];

            $this->session->set_flashdata('confirmation', message('success', $msg));
        }

        redirect('payment/payment_report', 'refresh');
    }

    /*
    * Table Name: `payment`
    *   Strategy: update status "pending" to "approved" by invoice no.
    */

    public function payment_approve()
    {

        $where = array("invoice_no" => $this->input->get('invoice_no'));
        $this->action->update("payment", array("status" => "approved"), $where);
        $msg                        = array(
            'title' => "success",
            'emit'  => "Payment Successfully Approved!",
            'btn'   => true
        );
        $this->data['confirmation'] = message('success', $msg);
        $this->session->set_flashdata('confirmation', $this->data['confirmation']);
        redirect('payment/payment_report', 'refresh');

    }

    /*
    * Table Name: `payment`
    *   Strategy: update status "approved" to "pending" by invoice no.
    */

    public function payment_disapprove()
    {

        $where = array("invoice_no" => $this->input->get('invoice_no'));
        $this->action->update("payment", array("status" => "pending"), $where);
        $msg                        = array(
            'title' => "success",
            'emit'  => "Payment Successfully Disapproved!",
            'btn'   => true
        );
        $this->data['confirmation'] = message('success', $msg);
        $this->session->set_flashdata('confirmation', $this->data['confirmation']);
        redirect('payment/payment_report', 'refresh');

    }

    /*
    * Delete the invoice no.
    * Table no: `payment`
    * Strategy:
    *   update the trash column from 0 to 1 by invoice no.    
    */

    public function delete_payment()
    {
        $where = array("invoice_no" => $this->input->get('invoice_no'));
        delete_data("payment", $where);
        delete_data("payment_meta", $where);
        $msg                        = array(
            'title' => "Delete!",
            'emit'  => "Payment Successfully Delete!",
            'btn'   => false
        );
        $this->data['confirmation'] = message('danger', $msg);
        $this->session->set_flashdata('confirmation', $this->data['confirmation']);
        redirect('payment/payment_report', 'refresh');

    }

}
