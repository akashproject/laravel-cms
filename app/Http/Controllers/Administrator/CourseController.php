<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseType;
use App\Models\Curriculum;
use App\Models\Tag;
use App\Models\Brochure;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    //
    public function index()
    {
        try {
            $courses = Course::all();
            return view('administrator.courses.index',compact('courses'));

        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
        }
        
    }

    public function add() {
        return view('administrator.courses.add');
    }

    public function show($id)
    {
        try {
            $course = Course::find($id);

            
            return view('administrator.courses.show',compact('course'));
        } catch(\Illuminate\Database\QueryException $e){
        }        
    }

    public function curriculum($id){
        try {
            $carriculam = Curriculum::where('course_id',$id)->get();
            $course = Course::find($id);
            return view('administrator.courses.curriculum',compact('carriculam','id','course'));       
        } catch(\Illuminate\Database\QueryException $e){
        }     
    }

    public function save(Request $request) {
        try {
            $data = $request->all();
            $validatedData = $request->validate([
                'name' => 'required',
                'slug' => 'required',
                'no_of_module' => 'required',
            ]);

            if($data['course_id'] <= 0){
                $course = Course::create($data);
                if($course->id){
                    $carriculam = array_fill(0,$data['no_of_module'],array('course_id'=>$course->id));
                    foreach ($carriculam as $key => $value) {
                        Curriculum::create($value);
                    }
                }
            } else {
                $course = Course::findOrFail($data['course_id']);
                $carriculam = Curriculum::where('course_id',$data['course_id'])->get();
                if($carriculam->count() < $data['no_of_module']){
                    $carriculam = array_fill(0,$data['no_of_module'] - $carriculam->count(),array('course_id'=>$course->id));
                    foreach ($carriculam as $key => $value) {
                        Curriculum::create($value);
                    }
                }
                $course->update($data);
            }

            return redirect()->back()->with('message', 'Course updated successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }
    }

    
    public function delete($id) {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect('/administrator/courses');
    }

    public function saveCurriculum(Request $request){
        try {
            $data = $request->all();
            foreach ($data['curriculum'] as $key => $value) {
                $value['lecture'] = (isset($value['lecture']))?json_encode($value['lecture']):'';
                $carriculam = Curriculum::findOrFail($key);
                $carriculam->update($value);
            }
            return redirect()->back()->with('message', 'Page updated successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }
    }

}
