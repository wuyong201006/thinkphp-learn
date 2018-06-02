<?php
namespace app\admin\controller;
use think\Controller;


class Index extends Controller
{
    public function index($name='admin')
    {
		$this->assign('name', $name);

        return $this->fetch();
    }
}
