<?php
namespace app\admin\model;
use think\Model;

class Asset extends Model
{
	// 设置当前模型对应的完整数据表名称
    protected $table = 'asset';
	
	/*// 设置当前模型的数据库连接
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
	];*/
	
	protected function initialize()
	{
		parent::initialize();
	}
	
	public function addCoin($id, $coin, $updateDate)
	{
		$asset = new Asset();
		$asset->id = $id;
        $asset->coin = $coin;
        $asset->updateDate = $updateDate;
		return $asset->save();
	}
	
	public function updateCoin($id, $coin, $updateDate){
        $asset = Asset::get(['id'=>$id]);
        if($asset){
            $asset->coin = $asset->coin+$coin;
            $asset->updateDate = $updateDate;
		    return $asset->save();
        }

        return null;
        
    }

	public function getCoinById($id){
		$object = Asset::get(['id'=>$id]);

		return $object->coin;
	}
}
