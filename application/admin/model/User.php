<?php
namespace app\admin\model;
use think\Model;

class User extends Model
{
	// 设置当前模型对应的完整数据表名称
    protected $table = 'user';
	
	protected function initialize()
	{
		parent::initialize();
	}
	
	public function addUser($id, $username, $password, $visitorId, $recomId, $registerDate)
	{
		$user = new User();
		$user->id = $id;
		$user->username = $username;
		$user->password = $password;
		$user->visitorId = $visitorId;
		$user->recomId = $recomId;
		$user->registerDate = $registerDate;
		return $user->save();
	}
	
	public function updateUser($id, $password)
	{
		$user = User::get($id);
		if($user){
			$user->password = $password;
			return $user->save();
		}
		
		return null;
	}
	
	public function updateUserAsset($id, $coinId){
		$user = User::get(['id'=>$id]);
		dump($user);
		if($user){
			dump($coinId);
			$user->coinId = $coinId;
			return $user->save();
		}
		
		return null;
	}

	public function deleteUser($userId)
	{
		$user = User::get($userId);
		$result = null;
		if($user){
			$result = $user->delete();
		}

		return $result; 
	}
	
	public function getUser($username, $password){
		$object = User::get(['username'=>$username,'password'=>$password]);

		return $object;
	}
	
	public function getUserById($id){
		$object = User::get(['id'=>$id]);
		return $object;
	}

	public function getUserList()
	{
		$list = User::all();
		if($list){
			$list = collection($list)->toArray();
		}
		return $list;
	}
}
