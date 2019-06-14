<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusyClassroom extends Model
{
    protected $table = 'busyclassrooms';
    protected $primaryKey = 'classroom_id';
    protected $hidden = [
        'updated_at', 'created_at',
    ];

    public static function verify($request,$classroomId){
        $status = true;
        $busyclassroom = BusyClassroom::where(['classroom_id'=>$classroomId,'month'=>$request->month,'day'=>$request->day,'time'=>$request->time])->first();
        if(empty($busyclassroom)){
            $status = false;
        }
        return $status;
    }
    
    public static function create($request,$classroom_id){
        $busyclassroom = new BusyClassroom;
        $busyclassroom->classroom_id = $classroom_id;
        $busyclassroom->month = $request->month;
        $busyclassroom->day = $request->day;
        $busyclassroom->time = $request->time;
        $busyclassroom->save();
        $status = true;
        return $status;

    }
}
