<?php

class Appointment_Model extends CI_Model
{

    public function __construct() {
        $this->load->database();
    }

    public function create($patient_number) {
        $this->db->insert('appointments', [
            'patient_number' => $patient_number,
            'status' => $this->input->post('status'),
            'clinic_id' => $this->input->post('clinic'),
            'date' => $this->input->post('date'),
            'from_time' => $this->input->post('from_time') ?? Null,
            'to_time' => $this->input->post('to_time') ?? Null,
            'cost' => $this->input->post('cost') ?? Null,
            'comments' => $this->input->post('comments') ?? Null
        ]);

        redirect('appointments/index');
    }

    public function find($id) {
        $q = $this->db->get_where('appointments', ['id' => $id]);
        return $q->row();
    }

    public function appointments() {
        $q = $this->db->select(
            'a.patient_number,
             p.patient_name,
             a.date,
             a.status,
             a.comments,
             a.cost,
             a.from_time,
             a.to_time,
             c.name,
             a.id as aid,
             p.id as pid,
             c.id as cid'
        )
            ->from('appointments a')
            ->join('clinics c', 'a.clinic_id=c.id')
            ->join('patients p', 'a.patient_number=p.patient_number')
            ->get();

        return $q->result();
    }

    public function appointment($id) {
        $q = $this->db->select('*, a.id as aid')
            ->from('appointments a')
            ->where('a.id', $id)
            ->join('clinics c', 'a.clinic_id=c.id')
            ->join('patients p', 'p.patient_number=a.patient_number')
            ->get();

        return $q->row();
    }

    public function update($id) {
        $this->db->where('id', $id)
            ->update('appointments', [
                'status' => $this->input->post('status'),
                'date' => $this->input->post('date'),
                'from_time' => $this->input->post('from_time') ?? '',
                'to_time' => $this->input->post('to_time') ?? '',
                'cost' => $this->input->post('cost') ?? '',
                'comments' => $this->input->post('comments') ?? '',
            ]);
        redirect('/appointments');
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('appointments');
        redirect('appointments');
    }

    public function search() {
        $this->db->select('*, a.id aid, c.name clinic')->from('appointments a');
        if(! empty($_GET['from_date'])){
            $this->db->where('date >=', $_GET['from_date']);
        }
        if(! empty($_GET['to_date'])){
            $this->db->where('date <=', $_GET['to_date']);
        }
        if(! empty($_GET['patient_number'])){
            $this->db->where('a.patient_number', $_GET['patient_number']);
        }
        if(! empty($_GET['clinic'])){
            $this->db->where('clinic_id', $_GET['clinic']);
        }
        $this->db->join('patients p', 'a.patient_number=p.patient_number');
        $this->db->join('clinics c', 'a.clinic_id=c.id');

        $q = $this->db->get();
        echo json_encode($q->result_array());
    }
}