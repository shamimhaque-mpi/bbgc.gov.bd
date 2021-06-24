<?php

/**
 * Methods:
 *   index:  add payment Field.
 *   delete_field: delete payment field.
 *   payment_set: set amount to the payment field.
 *   setting: Manage payment field for particular class and  month.
 */

class Payment extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('action');
    }

    /**
     * Working with field of Payment Section.
     * Table name: payment_field
     * Strategy: Add field to table if exist then update.
     */
    public function index($emit = NULL)
    {
        $this->data['meta_title']   = 'Payment';
        $this->data['active']       = 'data-target="payment_menu"';
        $this->data['subMenu']      = 'data-target="field"';
        $this->data['info']         = null;
        $this->data['confirmation'] = null;

        if (!empty($_GET['field_id'])) {
            $this->data['info'] = get_row('payment_field', ['id' => $_GET['field_id']]);
        }

        if ($this->input->post('submit')) {

            $fieldName = $_POST['field_name'];


            $data = ["field_name" => $fieldName];

            if (!empty($_POST['field_id'])) {

                $paymentId = $_POST['field_id'];
                $oldFieldName = $_POST['old_field_name'];

                $info = custom_query("SELECT * FROM payment_field WHERE field_name='$fieldName' AND id NOT IN ('$paymentId')", true);

                if (!empty($info)) {

                    $msg = array(
                        'title' => "Warning",
                        'emit'  => "This Payment field already exists!",
                        'btn'   => true
                    );
                    $status = 'warning';

                } else {

                    $msg = array(
                        'title' => "Update",
                        'emit'  => "Payment field successfully update!",
                        'btn'   => true
                    );
                    $status = 'success';

                    save_data('payment_field', $data, ['id' => $paymentId]);

                    if ($oldFieldName != $fieldName) {
                        custom_query("UPDATE set_payment SET field_name='$fieldName' WHERE field_name='$oldFieldName'", '', false);
                        custom_query("UPDATE payment SET field='$fieldName' WHERE field='$oldFieldName'", '', false);
                    }
                }

            } else {
                if (check_exists('payment_field', $data)) {
                    $msg    = array(
                        'title' => "Warning",
                        'emit'  => "This Payment field already exists!",
                        'btn'   => true
                    );
                    $status = 'warning';
                } else {
                    $msg    = array(
                        'title' => "Success",
                        'emit'  => "Payment field successfully saved!",
                        'btn'   => true
                    );
                    $status = 'success';
                    save_data("payment_field", $data);
                }
            }

            $this->data['confirmation'] = message($status, $msg);
            $this->session->set_flashdata("confirmation", $this->data['confirmation']);
            redirect("payment/payment", "refresh");
        }


        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/payment/nav', $this->data);
        $this->load->view('components/payment/fieldofpayment', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    /**
     * For deleting payment_table field
     * Table name: payment_field
     * Strategy: Delete field using id.
     */

    public function delete_field($id = NULL)
    {

        $fieldName = get_name('payment_field', 'field_name', ['id' => $id]);

        // delete data
        custom_query("DELETE FROM payment_setting WHERE set_payment_id IN (SELECT id FROM set_payment WHERE field_name='$fieldName')", "", false);
        delete_data('set_payment', ['field_name' => $fieldName]);
        delete_data('payment_field', ['id' => $id]);

        $msg = [
            'title' => 'delete',
            'emit'  => 'Field Successfully Deleted!',
            'btn'   => true
        ];

        $this->session->set_flashdata('confirmation', message('danger', $msg));
        redirect("payment/payment", "refresh");
    }

    /**
     * Set amount(Tk) to field
     * Table name: set_payment
     * Strategy: set payment_field amount according to
     *   class,section,type:Civil,Military.
     * Add or Update data to the table.
     */

    public function payment_set()
    {
        $this->data['meta_title']   = 'Payment';
        $this->data['active']       = 'data-target="payment_menu"';
        $this->data['subMenu']      = 'data-target="payment_set"';
        $this->data['confirmation'] = null;

        $this->data['allStudents'] = $this->action->readGroupBy('admission', 'student_id');

        $title = $message = "";
        if (!empty($_POST['set'])) {
            foreach ($_POST['amount'] as $key => $value) {
                $data = array(
                    'date'       => date('Y-m-d'),
                    'class'      => $this->input->post('class'),
                    'section'    => $this->input->post('section'),
                    //'type'          => $this->input->post('student_type'),
                    'field_name' => $_POST['field_name'][$key],
                    'amount'     => $_POST['amount'][$key]
                );

                $where = array(
                    'class'      => $this->input->post('class'),
                    'section'    => $this->input->post('section'),
                    //'type'          => $this->input->post('student_type'),
                    'field_name' => $_POST['field_name'][$key]
                );

                if (check_exists('set_payment', $where)) {
                    $title   = "Success";
                    $message = "Amount Successfully Update!!";
                    save_data('set_payment', $data, $where);
                } else {
                    $title   = "Success";
                    $message = "Amount Successfully Set";
                    save_data("set_payment", $data);
                }
            }

            $options = array(
                'title' => $title,
                'emit'  => $message,
                'btn'   => true
            );

            $mesg = message('success', $options);
            $this->session->set_flashdata("confirmation", $mesg);
            redirect("payment/payment/payment_set", "refresh");
        }

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/payment/nav', $this->data);
        $this->load->view('components/payment/payment_set', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    /**
     * Set particular payment field for particular class info and month.
     * Table name : payment_setting
     * Strategy:
     *   Make connection through 'set_payment' table's `id` with 'payment_setting' table's `set_payment_id`
     *   Add set_payment.id to payment_setting.set_payment_id,month name to the table.
     *
     */
    public function setting()
    {
        $this->data['meta_title']   = 'Payment';
        $this->data['active']       = 'data-target="payment_menu"';
        $this->data['subMenu']      = 'data-target="setting"';
        $this->data['confirmation'] = null;

        if ($this->input->post('update')) {
            // delete the previous data for update by the current data start
            $from     = "set_payment";
            $join     = "payment_setting";
            $joinCond = "set_payment.id = payment_setting.set_payment_id";
            $where    = array(
                "set_payment.class"     => $_POST['class'],
                "set_payment.section"   => $_POST['section'],
                //"set_payment.type"      => $_POST['student_type'],
                "payment_setting.month" => $_POST['month']
            );

            $fieldName = $this->action->joinAndRead($from, $join, $joinCond, $where);
            if (!empty($fieldName)) {
                foreach ($fieldName as $sl => $val) {
                    $this->action->deleteData("payment_setting", array("id" => $val->id));
                }
            }
            // delete the previous data for update by the current data end


            foreach ($_POST['field_id'] as $key => $value) {
                $data = array(
                    'set_payment_id' => $_POST['field_id'][$key],
                    'month'          => $_POST['month']
                );

                $title   = "Update";
                $message = "Payment Field Successfully Update";
                $this->action->add("payment_setting", $data);

            }

            $options = array(
                'title' => $title,
                'emit'  => $message,
                'btn'   => true
            );

            $mesg = message('success', $options);
            $this->session->set_flashdata("confirmation", $mesg);
            redirect("payment/payment/setting", "refresh");

        }

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/payment/nav', $this->data);
        $this->load->view('components/payment/setting', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }


    public function all($emit = NULL)
    {
        $this->data['meta_title']   = 'Payment';
        $this->data['active']       = 'data-target="payment_menu"';
        $this->data['subMenu']      = 'data-target="all"';
        $this->data['confirmation'] = null;

        $this->data['paymentInfo'] = $this->action->read("payment");

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/payment/nav', $this->data);
        $this->load->view('components/payment/all', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }


    private function holder()
    {
        $holder = config_item('privilege');

        if (!(in_array($this->session->userdata('holder'), $holder))) {
            $this->membership_m->logout();
            redirect('access/users/login');
        }
    }

}
