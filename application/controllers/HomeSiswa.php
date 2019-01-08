<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class HomeSiswa extends CI_Controller {
     function __construct(){
         parent::__construct();
         $this->simple_login->cek_login();
     }
 
     //Load Halaman dashboard
     public function index() {
         $this->load->view('home_siswa');
     }
 }