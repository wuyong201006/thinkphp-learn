<?php
namespace app\admin\controller;
use think\Controller;

use app\admin\model\User;

class LoginController extends Controller
{
    public function index($name='login')
    {
        $this->assign('name', $name);

        return $name/*  $this->fetch() */;
    }

    public function register(){
        $user = new User();
        
        $dataJson = Request::instance()->getContent();

        $data = null;

        $username = "";
        $password = "";
        $visitorId = "";
        $recomId = "";
        $registerDate = phpTransformDate(time());
        if($dataJson && IsJson($dataJson)){
            $data = json_decode($dataJson);
        }

        if($data && property_exists($data, "username")){
            $username = $data->username;
        }

        if($data && property_exists($data, "password")){
            $password = $data->password;
        }

        if($data && property_exists($data, "visitorId")){
            $visitorId = $data->visitorId;
        }

        if($data && property_exists($data, "recomId")){
            $recomId = $data->recomId;
        }
        
        $user->addUser($username, $password, $visitorId, $recomId, $registerDate);
    }

    public function login($username, $password){
        $user = new User();
        $user->getUser($username, $password);
    }

}
