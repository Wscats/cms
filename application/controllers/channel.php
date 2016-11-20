<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Channel extends CI_Controller {
	//增加频道
	public function add()
	{
		$this->load->helper('form');
		//加载url模块，跳转到form_show页面
		$this->load->helper('url');
		$this->load->model('channel_model');
		
		$data['title'] = "添加频道";
		if($this->input->post()){
			$data = array(
				//接收频道名字 用$this->input->post方法替换$_POST方法更好
				'channel' => $this->input->post('channel'),
			);
			//存储 插入数据
			$this->channel_model->add_data($data);
			redirect('news/add');
		}else{
			$this->load->view('channel/channel_add', $data);
		}
	}
}