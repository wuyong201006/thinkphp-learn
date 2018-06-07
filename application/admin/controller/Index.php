<?php
namespace app\admin\controller;
use think\Controller;

use app\admin\model\User;
class Index extends Controller
{
    public function index($name='admin')
    {
		$this->assign('name', $name);

        return json($name);
    }
}
