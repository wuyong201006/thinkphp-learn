<?php
namespace app\index\model;
use think\Model;

class User extends Model
{
	// 设置当前模型对应的完整数据表名称
    protected $table = 'student';
	
	// 设置当前模型的数据库连接
	protected $connection = [
		// 数据库类型
        'type'        => 'mysql',
        // 数据库连接DSN配置
        'dsn'         => '',
        // 服务器地址
        'hostname'    => '127.0.0.1',
        // 数据库名
        'database'    => 'test',
        // 数据库用户名
        'username'    => 'root',
        // 数据库密码
        'password'    => '123456',
        // 数据库连接端口
        'hostport'    => '3306',
        // 数据库连接参数
        'params'      => [],
        // 数据库编码默认采用utf8
        'charset'     => 'utf8',
        // 数据库表前缀
        'prefix'      => '',
	];
	
	protected function initialize()
	{
		parent::initialize();
	}
	
	public function addUser($username)
	{
		$user = new User();
		$user->username = $username;
		return $user->save();
	}
	
	public function updateUser($username)
	{
		$user = new User();
		$user->username = $username;
		return $user->save();
	}
	
	public function deleteUser($userId)
	{
		$user = User::get($userId);
		return $user->delete();
	}
	
	public function getUser($username, $password){
		$object = User::get(['username'=>$username,'password'=>$password]);
		// if($list){
			// $list = collection($list)->toArray();
		// }
		
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
