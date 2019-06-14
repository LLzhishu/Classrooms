<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusyClassroom;
use App\Classroom;

class BusyClassroomController extends Controller
{
    public function create($id,$month,$day,$time){
        $request = array('id'=>$id,
            'month'=>$month,'day'=>$day,'time'=>$time
            );
        $status = BusyClassroom::create($request);
        return $status->id;
    }

    public static function show(Request $request){
        $expect = array('lh', 'js', 'month', 'day', 'time');
        if(!$request->has($expect)) return response(array('message' => '数据不完整'), 403);
        $classroom = Classroom::select_lh_js($request->lh,$request->js);
        if(empty($classroom)) return response(array('message' => '找不到该教室'), 403);
        $verify = BusyClassroom::verify($request,$classroom->id);
        if($verify) return response(array('message' => '该教室在该时段已被占用'), 403);
        $status = BusyClassroom::create($request,$classroom->id);
        if($status) return response(array('message' => '成功借用该教室'), 202);
        else return response(array('message' => '系统出错'), 404);
    }
}
