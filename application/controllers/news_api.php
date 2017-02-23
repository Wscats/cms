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
	
	public function show_detail()
	{
		$this->load->model('news_model');
		//获取ajax请求回来的id查找对应详细信息
		$id = $this->input->get('id');
		$data['news'] = $this->news_model->show_detail($id);
		$api_data = array(
			'news_list' => $data['news'],
		);
		echo json_encode($api_data);
	}
	
	public function show_detail_by_channel_id()
	{
		$this->load->model('news_model');
		$channel_id = $this->input->get('channel_id');
		$data['news'] = $this->news_model->show_detail_by_channel_id($channel_id);
		$api_data = array(
			'news_list' => $data['news'],
		);
		echo json_encode($api_data);
	}
}