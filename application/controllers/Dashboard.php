<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    function index()
    {
        $data['judul'] = "Barang";
        $this->load->view("layout/header");
        $this->load->view("dashboard/vw_dashboard", $data);
        $this->load->view("layout/footer");
    }
}