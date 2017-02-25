<?php
header("Access-Control-Allow-Origin: *");
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
	public function insert_news(){
		$this->load->model('news_model');
		$data = array(
				//接收新闻的标题 用$this->input->post方法替换$_POST方法更好
				'title' => $this->input->get('title'),
				//接收新闻的内容
				'text' => $this->input->get('text'),
				//接收所选的频道
				'channel_id' => 6,
				//接收图片的地址
				//'image' => $this->input->post('image'),
				//根据所选的频道id查看频道的具体名字
				'channel_name' => "推荐",
			);
		$this->news_model->add_data($data);
	}
	
	public function delete_news(){
		$this->load->model('news_model');
		$id = $this->input->get('id');
		$this->news_model->delete_data($id);
	}
	
	public function get_channel(){
		$this->load->model('channel_model');
		$data = $this->channel_model->show_data();
		echo json_encode($data);
	}
}