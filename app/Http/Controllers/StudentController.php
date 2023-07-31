<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::latest()->get();
        return view('admin.students',compact('students'));
    }

    public function import() 
    {
        Excel::import(new StudentImport,request()->file('file'));
        $notification = array(
            'message' => 'تم رفع ملف الاكسيل بنجاح', 
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            Student::insert([
                'student_name' => $request->student_name,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'تم أضافة الطالب بنجاح', 
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $student_id = $request->id;
        
            Student::findOrFail($student_id)->update([
                'student_name' => $request->student_name,
            ]); 
            $notification = array(
            'message' => 'تم تحديث الطالب بنجاح', 
            'alert-type' => 'info'
        );
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $students = Student::findOrFail($request->id)->delete();
            $notification = array(
                'message' => 'تم حذف الطالب بنجاح', 
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
