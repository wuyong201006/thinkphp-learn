<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;

use app\admin\model\Visitor;
class VisitorController extends Controller
{
    public function index($name='admin')
    {
		$this->assign('name', $name);

        return json($name);
    }

    public function addVisitor(){
        $id = getRandomId();
        $ip = Request::instance()->ip();
        $dataJson = Request::instance()->getContent();

        $data = null;
        $url = "";
        if($dataJson && IsJson($dataJson)){
            $data = json_decode($dataJson);
        }

        if($data && property_exists($data, "url")){
            $url = $data->url;
        }
        
        $visitorDate = phpTransformDate(time());
        $visitor = new Visitor();
        $visitor->addVisitor($id, $ip, $url, $visitorDate);
    }
}
