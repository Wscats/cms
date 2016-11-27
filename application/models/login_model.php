<?php
	class login_model extends CI_Model {
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }
    //显示用户列表
    public function show_user($user)
    {
    		$this->load->database();
        $this->db->where("user_name", $user);
        $query = $this->db->get("user");
        return $query->result_array();
    }
    //注册用户
    public function register_user($data)
    {
    		$this->load->database();
        $this->db->insert('user', $data);
    }
    
    //保存用户的令牌（用于自动登陆）
    public function set_token($id, $token)
    {
    		$this->load->database();
    		$this->db->where("id", $id);
        $this->db->update("user", $token);
    }
    
    //清除用户的令牌（用于退出登陆）
    public function clear_token($id, $token)
    {
    		$this->load->database();
    		$this->db->where("id", $id);
        $this->db->update("user", $token);
    }
}
?>