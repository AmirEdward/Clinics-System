<?php

class Appointments extends CI_Controller
{

    public function __construct() {
        parent::__construct();
        $this->load->model('appointment_model');
        $this->load->model('patient_model');
        $this->load->model('clinic_model');
    }

    public function index() {
        $data['appointments'] = $this->appointment_model->appointments();
        $this->load->view('parts/header');
        $this->load->view('appointments', $data);
        $this->load->view('parts/footer');
    }

    public function create() {
        $this->form_validation->set_rules('patient_name', 'Name',
            'required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('mobile', 'Mobile', 'max_length[20]');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('status', 'Appointment Status', 'required');
        $this->form_validation->set_rules('clinic', 'Clinic', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('cost', 'Cost', 'is_numeric');

        if(! $this->form_validation->run()){
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

            $data['title'] = 'Create New Appointment';
            $data['clinics'] = $this->clinic_model->getAll();
            $this->load->view('parts/header', $data);
            $this->load->view('clinics', $data);
            $this->load->view('parts/footer');
        } else {
            $this->store();
        }
    }

    protected function store() {
        $patient_number = $this->input->post('patient_number');
        if(! empty($patient_number)){
            if($this->patient_model->find($patient_number)){
                $this->patient_model->update($patient_number);
                $this->appointment_model->create($patient_number);
            }else {
                $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

                $data['title'] = 'Create New Appointment';
                $data['clinics'] = $this->clinic_model->getAll();
                $data['numberError'] = 'this patient number is not found, Remove it if you want to create a new one';
                $this->load->view('parts/header', $data);
                $this->load->view('clinics', $data);
                $this->load->view('parts/footer');
            }
        } else {
            $patient_number = substr(md5(time()), 0, 16);
            $this->patient_model->create($patient_number);
            $this->appointment_model->create($patient_number);
        }
    }

    public function edit($id) {
        $data['appointment'] = $this->appointment_model->appointment($id);
        $data['title'] = 'Edit Appointment';

        $this->load->view('parts/header', $data);
        $this->load->view('editappointment', $data);
        $this->load->view('parts/footer');
    }

    public function update() {
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $id = $this->input->post('id');

        if($this->form_validation->run() == FALSE){
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
            $this->edit($id);
        } else {
            $this->appointment_model->update($id);
        }
    }

    public function delete($id) {
        $this->appointment_model->delete($id);
    }

    public function search() {
        $data['clinics'] = $this->clinic_model->getAll();

        $this->load->view('parts/header');
        $this->load->view('search', $data);
        $this->load->view('parts/footer');
    }

    public function ajaxsearch() {
        $this->appointment_model->search();
    }
}