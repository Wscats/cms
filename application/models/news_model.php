<?php
	class news_model extends CI_Model {
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }
    public function add_data($data)
    {
    		$this->load->database();
        	$this->db->insert('news', $data);
    }
    public function delete_data($id)
    {
    		var_dump($id);
    		$this->load->database();
    		$this->db->where("id", $id);
		$this->db->delete("news");
    }
    //根据主键id显示需要被修改新闻的详细信息
    public function show_detail($id)
    {
    		$this->load->database();
    		$this->db->where("id", $id);
    		$query = $this->db->get("news");
    		return $query->result_array();
    }
    //根据主键id显示需要被修改新闻的详细信息
    public function show_detail_by_channel_id($channel_id)
    {
    		$this->load->database();
    		$this->db->where("channel_id", $channel_id);
    		$query = $this->db->get("news");
    		return $query->result_array();
    }
    //根据表单提交的详细内容更新新闻
    public function edit_data($id, $title, $text, $channel, $channel_name)
    {
    		$this->load->database();
    		$this->db->where("id", $id);
		$this->db->update("news", array(
			"title" => $title,
			"text" => $text,
			"channel_id" => $channel,
			"channel_name" => $channel_name,
		));
    }
    //显示新闻列表
    public function show_data()
    {
    		$this->load->database();
        $query = $this->db->get("news");
        return $query->result_array();
    }
}
?>