<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hello extends CI_Controller {
	public function index()
	{
		$data['wsscat_list'] = array(
			'name'=>'Wsscat', 
			'Autumns', 
			array('first'=>'JS','second'=>'PHP')
		);
		$this->load->view('hello', $data);
	}
}
