<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;

use app\index\model\User;

class Index extends Controller
{
    public function index($name='world')
    {
		$this->assign('name', $name);
		$userModel = new User();
		// $user->addUser('shenzhen');
		$result = $userModel->getUserList();
		
		foreach($result as $key=>$user){
			// dump($user['username']);
			echo 'users:' . $user['username'] . "<br>";
			// dump($user->username);
			// echo $user->username . "<br>";
		}
		
		
		// $result = $userModel->getUser('shenzhen');
		// echo $result->username;
		dump($result);
		
		// $result = $userModel->deleteUser(4);
		
		// $this->assign('name', $result);
        return $this->fetch();
    }
	
	public function dbtest(){
		$data = Db::name('student')->find();
		$this->assign('result', $data);
		
		// return $this->fetch();
		return json($data);
	}
	
	public function jsontest(){
		$data = Db::name('student')->select();
		
		$data = Request::instance()->header();
		return json($data);
	}
}
