<?php
namespace app\admin\controller;
use think\Controller;

use app\admin\model\User;

class Login extends Controller
{
    public function index($name='login')
    {
        $this->assign('name', $name);

        return $this->fetch();
    }

    public function register($username, $password){
        User::addUser($username, $password, getdate());
    }

    public function login($username, $password){
        User::getUser($username, $password);
    }

}
