<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;

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
        
        $dataJson = request()->getContent();
        $data = null;
        if($dataJson && IsJson($dataJson)){
            $data = json_decode($dataJson);
        }

        $id = getRandomId();
        $username = "";
        $password = "";
        $visitorId = "";
        $recomId = "";
        $registerDate = phpTransformDate(time());
        
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
        
        $user->addUser($id, $username, $password, $visitorId, $recomId, $registerDate);
    }

    public function login(){
        $user = new User();
        
        $token = request()->token('token');
        $dataJson = request()->getContent();

        $data = null;
        if($dataJson && IsJson($dataJson)){
            $data = json_decode($dataJson);
        }

        $username;
        $password;
        if($data && property_exists($data, "username")){
            $username = $data->username;
        }

        if($data && property_exists($data, "password")){
            $password = $data->password;
        }

        if(!$username || !$password){
            return json("username or password inCorrect");
        }

        $info = $user->getUser($username, $password);
        $info->token = $token;
        return json($info);
    }

}
