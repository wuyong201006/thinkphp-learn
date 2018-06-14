<?php
namespace app\admin\controller;
use think\Controller;

use app\admin\model\User;
class Index extends Controller
{
    public function index($name='admin')
    {
       /*  $build = include APP_PATH.'../build.php';
		\think\Build::run($build);


		$this->assign('name', $name); */

        return json($name);
    }
}
