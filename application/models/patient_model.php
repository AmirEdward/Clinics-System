<?php

class Patient_Model extends CI_Model
{

    public function __construct() {
        $this->load->database();
    }

    public function find($number) {
        $q = $this->db->get_where('patients', ['patient_number' => $number]);
        return $q->row();
    }

    public function create($patient_number) {
        $this->db->insert('patients', [
            'patient_number' => $patient_number,
            'patient_name' => $this->input->post('patient_name'),
            'mobile' => $this->input->post('mobile'),
            'gender' => $this->input->post('gender')
        ]);
    }

    public function update($patient_number) {
        $this->db->where('patient_number', $patient_number)
            ->update('patients', [
                'patient_name' => $this->input->post('patient_name'),
                'mobile' => $this->input->post('mobile'),
                'gender' => $this->input->post('gender')
            ]);
    }

}