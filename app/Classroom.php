<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Classroom;

class Classroom extends Model
{
    protected $table = 'classrooms';
    protected $primaryKey = 'id';
    protected $hidden = [
        'updated_at', 'created_at',
    ];
    
    public function borrow(){
        return $this->hasMany('App\BusyClassroom','classroom_id','id');
    } 

    public static function select_lh($lh)
    {
        $classroom = Classroom::where('building',$lh)->get();
        return $classroom;
    }

    public static function select_lh_js($lh,$js)
    {
        $classroom = Classroom::where(['building'=>$lh,'roomnumber'=>$js])->first();
        return $classroom;
    }
    
    public static function verify($request){
        $status = true;
        $new = Classroom::where(['building'=>$request->lh,'roomNumber'=>$request->js,'seatNumber'=>$request->zw])->first();
        if(empty($new)){
            $status = false;
        }
        return $status;
    }

    public static function new($request){
        $busyclassroom = new Classroom;
        $busyclassroom->building = $request->lh;
        $busyclassroom->roomNumber = $request->js;
        $busyclassroom->seatNumber = $request->zw;
        $busyclassroom->save();
        $status = true;
        return $status;

    }

    public static function delete_classroom($id)
    {
        Classroom::findOrFail($id)->delete();
        return "delete classroom-id-".$id.' success.';
    }
}
