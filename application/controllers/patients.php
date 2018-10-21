<?php

class Patients extends CI_Controller
{

    public function __construct() {
        parent::__construct();
        $this->load->model('patient_model');
    }

    public function ajaxfind() {
        $patient_number = $this->input->post('patient_number');
        echo json_encode($this->patient_model->find($patient_number));
    }

}