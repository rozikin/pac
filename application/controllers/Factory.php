<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Factory extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();


        $this->load->model('Factory_model');
    }



    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Factory';
        $data['kodeunik'] = $this->Factory_model->buat_kode();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('factory/index');
        $this->load->view('templates/footer');
    }


    function product_data()
    {


        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->db->get("factory");


        $data = [];
        $no = 0;

        foreach ($query->result() as $r) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $r->kode;
            $row[] = $r->factory;



            //add html for action
            $row[] = '<a class="badge badge-primary" href="javascript:void(0)" title="Edit" onclick="edit_data(' . "'" . $r->id . "'" . ')"><i class="fas fa-edit"></i> Edit</a>
            <a class="badge badge-danger" href="javascript:void(0)" title="Hapus" onclick="delete_data(' . "'" . $r->id . "'" . ')"><i class="fas fa-trash"></i> Delete</a>';

            $data[] = $row;
        };



        $result = array(
            "draw" => $draw,
            "recordsTotal" => $query->num_rows(),
            "recordsFiltered" => $query->num_rows(),

            "data" => $data
        );


        echo json_encode($result);

        exit();
    }

    public function kode_otomatis()
    {
        $data =  $this->Factory_model->buat_kode();

        echo json_encode($data);
    }







    public function edit_data($id)
    {
        $data = $this->Factory_model->get_by_id($id);

        echo json_encode($data);
    }


    public function add_data()
    {

        $this->_validate();

        $data = array(
            'kode' => $this->input->post('kode'),
            'factory' => $this->input->post('factory'),
        );


        $insert = $this->Factory_model->save($data);

        echo json_encode(array("status" => TRUE));
    }


    public function update_data()
    {
        $this->_validate();
        $data = array(
            'kode' => $this->input->post('kode'),
            'factory' => $this->input->post('factory'),

        );

        $this->Factory_model->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }




    public function delete_datax($id)
    {
        //delete fil

        $this->Factory_model->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }















    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('kode') == '') {
            $data['inputerror'][] = 'kode';
            $data['error_string'][] = 'kode is required';
            $data['status'] = FALSE;
        }

        if ($this->input->post('factory') == '') {
            $data['inputerror'][] = 'factory';
            $data['error_string'][] = 'factory is required';
            $data['status'] = FALSE;
        }


        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }
}
