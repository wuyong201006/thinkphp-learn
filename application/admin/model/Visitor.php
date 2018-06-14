<?php
namespace app\admin\model;
use think\Model;

class Visitor extends Model
{
	// 设置当前模型对应的完整数据表名称
    protected $table = 'visitor';
	
	protected function initialize()
	{
		parent::initialize();
	}
	
	public function addVisitor($id, $ip, $url, $visitorDate)
	{
		$visitor = new Visitor();
		$visitor->id = $id;
        $visitor->ip = $ip;
        $visitor->url = $url;
        $visitor->visitorDate = $visitorDate;
		return $visitor->save();
	}
	
	
	public function getVisitorById($id){
		$object = Visitor::get(['id'=>$id]);

		return $object;
	}
	
	public function getVisitorList()
	{
		$list = Visitor::all();
		if($list){
			$list = collection($list)->toArray();
		}
		return $list;
	}
}
