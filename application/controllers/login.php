<?php  
class Login extends CI_Controller {  
    public function __construct() {
		$this->need_login = false;//控制是否需要登录  
        parent::__construct ();  
        $this->load->helper ( array (  
                'form',  
                'url'   
        ) );  
        $this->load->library('session');  
    }  
    public function index() {  
    		//在登陆页面判断是否登陆，如果没登陆则自动跳转到登陆页面，如果登陆了则出现退出登陆的按钮
        $session_data = $this->session->userdata('username');
        if($session_data){
        		$this->load->view ('login/logout', $session_data);
        }else{
        		$this->load->view ('login/loginin');
        }
    }  
    public function formsubmit() {
        $this->load->library ( 'form_validation' );  
        $this->load->model('login_model');
                 
        $this->form_validation->set_rules ( 'username', 'Username', 'required' );  
        $this->form_validation->set_rules ( 'password', 'Password', 'required' );  
        if ($this->form_validation->run () == FALSE) {
            $this->load->view ('login/login');  
        } else {
            if (isset ( $_POST ['submit'] ) && ! empty ( $_POST ['submit'] )) {  
                $data = array (  
                        'user_name' => $_POST ['username'],  
                        'password' => md5($_POST ['password'])  
                );  
                $newdata = array(  
                        'username'  =>  $data ['user_name'] ,  
                        'userip'     => $_SERVER['REMOTE_ADDR'],  
                        'luptime'   =>time()  
                );  
                //登陆
                if ($_POST ['submit'] == 'login') {
					$data_from_db = $this->login_model->show_user($data ['user_name']);
					//根据在数据库取回的数组是否为空，判断用户是否存在
					if($data_from_db){
						//验证密码是否正确
	                    if ($data['password'] == $data_from_db[0]['password']) {
	                    		//将用户信息保存在cookie中
	                        $this->session->set_userdata($newdata);  
	                        redirect('/news/show');
	                    }  else{
	                    		echo "密码错误,请返回重新输入";
	                    }
					}else{
						echo "用户不存在,请返回重新输入";
					}
                }
                //注册
                else if ($_POST ['submit'] == 'register') {
                		//判断是否已注册
                		if($this->login_model->show_user($data ['user_name'])){
                			echo "已注册用户,请重新登陆";
                		}else{
                			//如果未注册才能注册新用户
                			$this->session->set_userdata($newdata);
                    		//把注册的用户信息存进数据库
                    		$this->login_model->register_user($data);
                    		redirect('/news/show');
                		}
                }
                //退出登陆
                else {
                    $this->session->sess_destroy();  
                    $this->load->view ('login/loginin');  
                }  
            }  
        }  
    }
    //退出登陆
    public function logout(){
    		$this->session->sess_destroy();  
        $this->load->view ('login/loginin');  
    }
}  