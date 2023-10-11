<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iot extends CI_Controller {

	public function index(){
		$this->load->view('apps/template');
	}

	public function grafik_kelembaban(){
		$this->load->view('apps/grafik_kelembaban');
	}
}
