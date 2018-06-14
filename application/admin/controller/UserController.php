<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Validate;

use app\admin\model\User;
use app\admin\model\Asset;
class UserController extends Controller
{
    public function index($name='admin')
    {
		$this->assign('name', $name);

        return json($name);
    }

    public function addCoin(){
        if(!tokenValidate()){
            return abort(404, 'inValid');
        }

        $dataJson = request()->getContent();

        $data = null;
        $userId = "";
        $coin = 0;
        if($dataJson && IsJson($dataJson)){
            $data = json_decode($dataJson);
        }

        if($data && property_exists($data, "userId")){
            $userId = $data->userId;
        }

        if($data && property_exists($data, "coin")){
            $coin = $data->coin;
        }

        if(!$userId){
            return;
        }

        $userModel = new User();
        $user = $userModel->getUserById($userId);
        
        $coinId = null;
        if($user){
            $coinId = $user->coinId;
        }

        $asset = new Asset();
        $updateDate = phpTransformDate(time());
        if(!$coinId){
            $coinId = getRandomId();
            $userModel->updateUserAsset($userId, $coinId);

            $asset->addCoin($coinId, $coin, $updateDate);
        }else{
            $asset->updateCoin($coinId, $coin, $updateDate);
        }
        
        return json('update complete');
    }

    public function getCoin(){
        if(!tokenValidate()){
            return abort(404, 'inValid');
        }

        $data = request()->param();
        $userId = "";
      
        if($data && array_key_exists("userId", $data)){
            $userId = $data["userId"];
        }

        if(!$userId){
            return;
        }

        $userModel = new User();
        $asset = new Asset();
        $user = $userModel->getUserById($userId);
        if($user){
            $coinId = $user->coinId;
            $coin = $asset->getCoinById($coinId);
            return json(["coin"=>$coin]);
        }

        return;
    }

    public function getUserList(){
        $user = new User();
        return $user->getUserList();
    }
}
