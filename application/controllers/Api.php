<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	function __construct(){
		parent::__construct();
		header('Content-Type:json');
		$this->load->model('mod_sensor');
	}
	
	public function save_data(){
		if($this->uri->segment(3) != ""){
			$data = array(
				"kelembaban" => $this->uri->segment(3),
				"datetime" => date("Y-m-d h:i:s")
			);
			$response = $this->mod_sensor->save_data($data);
			$response = array(
				"message" => "#OK - SUKSES^",
				"severity" => "success",
				"rows" => (string)$response,
				"data" => array()
			);
		}else{
			$response = array(
				"message" => "Tidak ada data dikirim ke Server",
				"severity" => "warning",
				"rows" => "0",
				"data" => array()
			);
		}
		echo json_encode($response,JSON_PRETTY_PRINT);	
	}

	public function get_recent(){
		if($this->uri->segment(3) != ""){
			if($this->uri->segment(3) > 0){
				$limit = $this->uri->segment(3);
			}else{
				$limit = 10;
			}	
		}else{
			$limit = 10;
		}
		$data = $this->mod_sensor->get_recent($limit);
		$response = array(
			"message" => "Hasil load data",
			"severity" => "success",
			"rows" => (string)sizeof($data),
			"data" => array_reverse($data)
		);
		echo json_encode($response,JSON_PRETTY_PRINT);	
	}

	public function monitoring(){
		$response = array(
			"message" => "Hasil load data",
			"severity" => "success",
			"data" => array(
				"status_sensor" => $this->mod_sensor->status_sensor(),
				"monitoring" => array_reverse($this->mod_sensor->get_recent(10)),
				"today_record" => $this->mod_sensor->today_record(),
				"total_record" => $this->mod_sensor->total_record()
			)
		);
		echo json_encode($response,JSON_PRETTY_PRINT);	
	}

	public function change_status(){
		$update = array(
			"status" => $this->uri->segment(3),
			"datetime" => date("Y-m-d H:i:s")
		);
		$data = $this->mod_sensor->change_status($update);
		if($data > 0){
			$response = array(
				"message" => "Change status sukses",
				"severity" => "success",
				"affected" => (string)$data
			);
		}else{
			$response = array(
				"message" => "Change status failed",
				"severity" => "warning",
				"affected" => (string)$data
			);
		}
		echo json_encode($response,JSON_PRETTY_PRINT);
	}


}
