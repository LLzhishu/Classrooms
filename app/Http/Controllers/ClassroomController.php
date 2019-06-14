<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classroom;
use App\BusyClassroom;

class ClassroomController extends Controller
{
    public function delete($id){
        return Classroom::delete_classroom($id);
    }

    public static function selectBuilding($building,$roomnumber){
        $classroom = classroom::select_lh_js($building,$roomnumber);
        return $classroom;
    }

    public function select(Request $request){
        $expect = array('lh', 'js');
        if(!$request->has($expect)) return response(array('message' => '数据不完整'), 403);
        if(empty($request->js)){
            $classroom = classroom::select_lh($request->lh)->toArray();
            return dd($classroom);
        }else{
            $classroom = classroom::select_lh_js($request->lh,$request->js);
            if(empty($classroom)) return response(array('message' => '找不到该教室'), 403);
            $borrow = $classroom->borrow->toArray();
            $result=array(
                'building' => $classroom->building,
                'classroom' => $classroom->roomNumber,
                'seatnum' => $classroom->seatNumber,
                'borrow' => $borrow
            );
            return dd($result);
        }
        
    }

    public function create(Request $request){
        $expect = array('lh', 'js', 'zw');
        if(!$request->has($expect)) return response(array('message' => '数据不完整'), 403);
        $verify = Classroom::verify($request);
        if($verify) return response(array('message' => '该教室已经存在'), 403);
        $status = Classroom::new($request);
        if($status) return response(array('message' => '成功添加教室'), 202);
        else return response(array('message' => '系统出错'), 404);
    }
}
