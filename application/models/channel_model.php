<?php
	class channel_model extends CI_Model {
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }
    //增加频道
    public function add_data($data)
    {
    		$this->load->database();
        $this->db->insert('channel', $data);
    }
    //显示频道列表
    public function show_data()
    {
    		$this->load->database();
        $query = $this->db->get("channel");
        return $query->result_array();
    }
    //根据id输出对应channel
    public function show_data_from_id_to_channel($id)
    {
    		$this->load->database();
    		$this->db->where("id", $id);
    		$query = $this->db->get("channel");
    		return $query->result_array();
    }
}
?>