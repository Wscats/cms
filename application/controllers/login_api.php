<?php
class Login_api extends CI_Controller {
    public
    function __construct() {
        $this -> need_login = false; //控制是否需要登录  
        parent::__construct();
        $this -> load -> helper(array(
            'form',
            'url'
        ));
        $this -> load -> library('session');
    }
    public
    function index() {
        //在登陆页面判断是否登陆，如果没登陆则自动跳转到登陆页面，如果登陆了则出现退出登陆的按钮
        $session_data = $this -> session -> userdata('username');
        if ($session_data) {
            $this -> load -> view('login/logout', $session_data);
        } else {
            $this -> load -> view('login/loginin');
        }
    }
    
    public
    function login() {
    		$this -> load -> model('login_model');
        $data = array(
            'user_name' => $this->input->post('params')['username'],
            'password' => md5($this->input->post('params')['password'])
        );
        //取用户数据
        $data_from_db = $this -> login_model -> show_user($data['user_name']);
            //根据在数据库取回的数组是否为空，判断用户是否存在
            if ($data_from_db) {
                //验证密码是否正确
                if ($data['password'] == $data_from_db[0]['password']) {
                		//每次登陆都会往数据库更新令牌
                    //用函数随机生成令牌
                    $token = array(
                    		'token' => $this -> genToken(),
                    );
                    $this -> login_model -> set_token($data_from_db[0]['id'],$token);
                    //输出令牌给前端保存，前端保存到cookie中
                    echo json_encode(array(
                    		'status' => 'success',
                    		'code' => 1,
                    		'info' => $token,
                    		'user_name' => $data_from_db[0]['user_name'],
                    		'id' => $data_from_db[0]['id'],
                    ));
                } else {
                		echo json_encode(array(
                    		'status' => 'failure',
                    		'code' => 0,
                    ));
                    //echo "密码错误,请返回重新输入";
                }
            } else {
            			echo json_encode(array(
                    		'status' => 'failure',
                    		'code' => 0,
                    ));
                //echo "用户不存在,请返回重新输入";
            }
    }
    
    //不用密码用令牌登陆的方法
    public
    function auto_login() {
    		$this -> load -> model('login_model');
    		//取用户数据
    		$data_from_db = $this -> login_model -> show_user($this->input->post('params')['username']);
    		//判断用户是否存在
    		if ($data_from_db) {
    			if($this->input->post('params')['token']==$data_from_db[0]['token']){
    				echo json_encode(array(
                    		'status' => 'success',
                    		'code' => 1,
                    		'info' => array('token'=>$data_from_db[0]['token']),
                    		'user_name' => $data_from_db[0]['user_name'],
                    		'id' => $data_from_db[0]['id'],
                 ));
    			}
    		}
    	}
    
   
    //退出登陆
    public
    function logout() {
        $this -> load -> model('login_model');
    		//取用户数据
    		$data_from_db = $this -> login_model -> show_user($this->input->post('params')['username']);
    		//判断用户是否存在
    		if ($data_from_db) {
    			if($this->input->post('params')['token']==$data_from_db[0]['token']){
    				$token = array(
                    		'token' => '',
                 );
                $this -> login_model -> set_token($data_from_db[0]['id'],$token);
    				echo json_encode(array(
                    		'status' => 'success',
                    		'code' => 1,
                    		'info' => array('token'=>''),
                    		'user_name' => $data_from_db[0]['user_name'],
                    		'id' => $data_from_db[0]['id'],
                 ));
    			}
    		}
    }
   //自动生成令牌函数
	public
	function genToken( $len = 32, $md5 = true ) {  
       # Seed random number generator  
          # Only needed for <a href="http://lib.csdn.net/base/php" class='replace_word' title="PHP知识库" target='_blank' style='color:#df3434; font-weight:bold;'>PHP</a> versions prior to 4.2  
          mt_srand( (double)microtime()*1000000 );  
          # Array of characters, adjust as desired  
          $chars = array(  
              'Q', '@', '8', 'y', '%', '^', '5', 'Z', '(', 'G', '_', 'O', '`',  
              'S', '-', 'N', '<', 'D', '{', '}', '[', ']', 'h', ';', 'W', '.',  
              '/', '|', ':', '1', 'E', 'L', '4', '&', '6', '7', '#', '9', 'a',  
              'A', 'b', 'B', '~', 'C', 'd', '>', 'e', '2', 'f', 'P', 'g', ')',  
              '?', 'H', 'i', 'X', 'U', 'J', 'k', 'r', 'l', '3', 't', 'M', 'n',  
              '=', 'o', '+', 'p', 'F', 'q', '!', 'K', 'R', 's', 'c', 'm', 'T',  
              'v', 'j', 'u', 'V', 'w', ',', 'x', 'I', '$', 'Y', 'z', '*'  
          );  
          # Array indice friendly number of chars;  
          $numChars = count($chars) - 1; $token = '';  
          # Create random token at the specified length  
          for ( $i=0; $i<$len; $i++ )  
              $token .= $chars[ mt_rand(0, $numChars) ];  
          # Should token be run through md5?  
          if ( $md5 ) {  
              # Number of 32 char chunks  
              $chunks = ceil( strlen($token) / 32 ); $md5token = '';  
              # Run each chunk through md5  
              for ( $i=1; $i<=$chunks; $i++ )  
                  $md5token .= md5( substr($token, $i * 32 - 32, 32) );  
              # Trim the token  
              $token = substr($md5token, 0, $len);  
          } return $token;  
      }
   }