<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class News extends CI_Controller {
	public function __construct() {
        parent::__construct ();
    }  
	public function index()
	{
		echo "Wsscat's home";
	}
	//增加新闻
	public function add()
	{
		$this->load->helper('form');
		//加载url模块，跳转到form_show页面
		$this->load->helper('url');
		$this->load->model('news_model');
		$this->load->model('channel_model');
		//可以以数组的方式写
		//$this->load->helper(array('form', 'url'));
		
		//从数据库获取频道渲染到选项
		$data['channel'] = $this->channel_model->show_data();
		$data['title'] = "添加新闻";
		//上传图片显示的错误信息，默认没有
		$data['error'] = "";
		$data['upload_data'] = array();
		if($this->input->post()){
			$data = array(
				//接收新闻的标题 用$this->input->post方法替换$_POST方法更好
				'title' => $this->input->post('title'),
				//接收新闻的内容
				'text' => $this->input->post('text'),
				//接收所选的频道
				'channel_id' => $this->input->post('channel'),
				//接收图片的地址
				'image' => $this->input->post('image'),
				//根据所选的频道id查看频道的具体名字
				'channel_name' => $this->channel_model->show_data_from_id_to_channel($this->input->post('channel'))[0]['channel'],
			);
			//存储 插入数据
			$this->news_model->add_data($data);
			redirect('/news/show');
		}else{
			$this->load->view('news/news_add', $data);
		}
	}
	
	//删除新闻
	public function delete()
	{
		$this->load->model('news_model');
		$this->load->helper('url');
		
		//根据id主键删除对应的新闻
		$id = $this->input->get('id');
		//执行删除
		$this->news_model->delete_data($id);
		//删除完后重新跳转到show页面显示数据
		redirect('/news/show');
	}
	
	//查看新闻
	public function show()
	{
		$this->load->helper('url');
		$this->load->model('news_model');
		$this->load->model('channel_model');
		//获取id和channel的对应关系表
		$data['channels'] = $this->channel_model->show_data();
		//从数据库新获取渲染到列表
		$data['news'] = $this->news_model->show_data();
		//将拿回来的图片字符串转化为数组的形式方便视图渲染
		$i = 0;
		foreach($data['news'] as $item){
			$data['news'][$i]['image'] = explode(",",$item['image']);
			$i++;
		}
		//显示退出登陆的页面
		$this->load->view ('login/logout');
		$this->load->view('news/news_show', $data);
	}
	
	//修改新闻
	public function edit()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('news_model');
		$this->load->model('channel_model');
		$data['title'] = "修改新闻";
		$data['channels'] = $this->channel_model->show_data();
		//根据id主键修改对应的新闻
		$data['id'] = $this->input->get('id');
		//如果提交了修改内容
		if($this->input->post()){
			$title = $this->input->post('title');
			$text = $this->input->post('text');
			$channel = $this->input->post('channel');
			$channel_name = $this->channel_model->show_data_from_id_to_channel($this->input->post('channel'))[0]['channel'];
			$this->news_model->edit_data($data['id'], $title, $text, $channel, $channel_name);
			//更新成功后返回到列表页
			redirect('/news/show');
		}else{
			//查询需要被执行修改的详细信息
			$data['news'] = $this->news_model->show_detail($data['id']);
			$this->load->view('news/news_edit', $data);
		}
	}
	
	//用ck富文本编辑器修改新闻
	public function edit_by_ck()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('news_model');
		$this->load->model('channel_model');
		$data['title'] = "修改新闻";
		$data['channels'] = $this->channel_model->show_data();
		//根据id主键修改对应的新闻
		$data['id'] = $this->input->get('id');
		//如果提交了修改内容
		if($this->input->post()){
			//var_dump($this->input->post());
			$title = $this->input->post('title');
			$text = $this->input->post('text');
			$channel = $this->input->post('channel');
			$channel_name = $this->channel_model->show_data_from_id_to_channel($this->input->post('channel'))[0]['channel'];
			$this->news_model->edit_data($data['id'], $title, $text, $channel, $channel_name);
			//更新成功后返回到列表页
			//redirect('/news/show');
			echo json_encode($this->input->post());
		}else{
			//查询需要被执行修改的详细信息
			$data['news'] = $this->news_model->show_detail($data['id']);
			$this->load->view('news/news_edit_by_ck', $data);
		}
	}
	
	//上传图片 使用uploadify插件
	public function upload_picture()
	{
		//记得更改目录位置，对应服务器的根目录，即htdocs为跟目录文件夹
		$targetFolder = '/CI/myCi//uploads'; // Relative to the root
		$verifyToken = md5('unique_salt' . $_POST['timestamp']);

		if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
			$tempFile = $_FILES['Filedata']['tmp_name'];
			$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
			$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name'];
			
			// Validate the file type
			$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
			$fileParts = pathinfo($_FILES['Filedata']['name']);
			
			if (in_array($fileParts['extension'],$fileTypes)) {
				move_uploaded_file($tempFile,$targetFile);
				echo '1';
			} else {
				echo 'Invalid file type.';
			}
		}
    }
}
