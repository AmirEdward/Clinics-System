<?php

class Clinics extends CI_Controller
{

    public function __construct() {
        parent::__construct();
        $this->load->model('clinic_model');
        $this->load->model('appointment_model');
        $this->load->model('patient_model');
    }

    public function index() {
        $data['title'] = 'Create New Appointment';
        $data['clinics'] = $this->clinic_model->getAll();
        $this->load->view('parts/header', $data);
        $this->load->view('clinics', $data);
        $this->load->view('parts/footer');
    }

}