<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{
    private $_table = "mahasiswa";

    public $mahasiswa_id;
    public $mahasiswa_unx;
    public $nim;
    public $mahasiswa_nama;
    public $tanggal_lahir;
    public $jenis_kelamin;

    public function rules()
    {
        return [
            ['field' => 'nim',
            'label' => 'NIM',
            'rules' => 'required'],

            ['field' => 'mahasiswa_nama',
            'label' => 'Nama Mahasiswa',
            'rules' => 'required'],
            
            ['field' => 'tanggal_lahir',
            'label' => 'Tanggal Lahir',
            'rules' => 'required'],

            ['field' => 'jenis_kelamin',
            'label' => 'Jenis Kelamin',
            'rules' => 'required'],


        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($unx)
    {
        return $this->db->get_where($this->_table, ["mahasiswa_unx" => $unx])->row();
    }

    public function save()
    {

//get ID
        $q="select coalesce(max(mahasiswa_id),0)+1 as id from mahasiswa";
        $r = $this->db->query($q)->result();
        $id= $r[0]->id;

//POST
        $post = $this->input->post();

        $sql = "
        insert into mahasiswa set 
        mahasiswa_id=".$id.",
        mahasiswa_unx='".uniqid()."',
        nim='".$post["nim"]."',
        mahasiswa_nama='".$post["mahasiswa_nama"]."',
        tanggal_lahir='".$post["tanggal_lahir"]."',
        jenis_kelamin=".$post["jenis_kelamin"];

        $this->db->query($sql);

    }

    public function update()
    {
        $post = $this->input->post();

        $this->mahasiswa_id = $post["id"];
        $this->mahasiswa_unx = $post["unx"];

        $this->nim = $post["nim"];
        $this->mahasiswa_nama = $post["mahasiswa_nama"];
        $this->tanggal_lahir = $post["tanggal_lahir"];
        $this->jenis_kelamin = $post["jenis_kelamin"];

        $this->db->update($this->_table, $this, array('mahasiswa_id' => $post['id']));
    }

    public function delete($unx)
    {
        return $this->db->delete($this->_table, array("mahasiswa_unx" => $unx));
    }
}