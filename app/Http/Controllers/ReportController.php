<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Week;
use App\Models\Student;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::latest()->get();
        $weeks = Week::all();
        $students = Student::all();
        return view('admin.reports',compact('reports','weeks','students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $weeks = Week::all();
        $students = Student::all();
        return view('admin.add_report',compact('weeks','students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['traits'] = $request->input('traits');
        $input['manners'] = $request->input('manners');
        $input['relationships'] = $request->input('relationships');
        $input['weakup'] = $request->input('weakup');
        $input['classrooms'] = $request->input('classrooms');
        Report::create($input);
        $notification = array(
            'message' => 'تم أضافة التقرير بنجاح', 
            'alert-type' => 'success'
        );
        return redirect()->route('Report.index')->with($notification);

    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $weeks = Week::all();
        $students = Student::all();
        $reports = Report::findOrFail($id);
        return view('admin.view_report',compact('reports','weeks','students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
            $reports = Report::findOrFail($request->id)->delete();
            $notification = array(
                'message' => 'تم حذف التقرير بنجاح', 
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function PrintReport($id){
        $weeks = Week::all();
        $students = Student::all();
        $reports = Report::findOrFail($id);
        return view('admin.print_report',compact('reports','weeks','students'));
    } // End Method
}
