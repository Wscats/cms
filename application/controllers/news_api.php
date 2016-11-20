<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class News_api extends CI_Controller {
	public function show_list()
	{
		$this->load->helper('url');
		$this->load->model('news_model');
		//从数据库新获取渲染到列表
		$data['news'] = $this->news_model->show_data();
		//因为$data['news']是数组，重新用一个数组将它组装成关联数组并转化为json格式
		$api_data = array(
			'news_list' => $data['news'],
		);
		echo json_encode($api_data);
	}
}