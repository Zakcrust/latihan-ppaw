<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("mahasiswa_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["mahasiswa"] = $this->mahasiswa_model->getAll();
        $this->load->view("mahasiswa/list", $data);
    }

    public function add()
    {
        $mahasiswa = $this->mahasiswa_model;
        $validation = $this->form_validation;
        $validation->set_rules($mahasiswa->rules());

        if ($validation->run()) {
            $mahasiswa->save();
            $this->session->set_flashdata('success', 'Mahasiswa Berhasil disimpan');
        }

        $this->load->view("mahasiswa/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('mahasiswa');
       
        $mahasiswa = $this->mahasiswa_model;
        $validation = $this->form_validation;
        $validation->set_rules($mahasiswa->rules());

        if ($validation->run()) {
            $mahasiswa->update();
            $this->session->set_flashdata('success', 'Mahasiswa Berhasil disimpan');
        }

        $data["mahasiswa"] = $mahasiswa->getById($id);
        if (!$data["mahasiswa"]) show_404();
        
        $this->load->view("mahasiswa/edit_form", $data);
    }

    public function delete($unx=null)
    {
        if (!isset($unx)) show_404();
        
        if ($this->mahasiswa_model->delete($unx)) {
            redirect(site_url('mahasiswa'));
        }
    }
}