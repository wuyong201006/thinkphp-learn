<?php
namespace app\admin\controller;
use think\Controller;

use app\admin\model\User;
use app\admin\model\Asset;
class UserController extends Controller
{
    public function index($name='admin')
    {
		$this->assign('name', $name);

        return json($name);
    }

    public function addCoin($userId, $coin){
        $user = User::getUserById($userId);
        return Asset::addCoin($user.coinId, $coin);
    }

    public function getUserList(){
        return User::getUserList();
    }
}
