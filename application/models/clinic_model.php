<?php

class Clinic_Model extends CI_Model
{

    public function __construct() {
        $this->load->database();
    }

    public function getAll() {
        $clinics = $this->db->get('clinics');
        return $clinics->result_array();
    }

}