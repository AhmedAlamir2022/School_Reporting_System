<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Week;
use Carbon\Carbon;

class WeekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $weeks = Week::latest()->get();
        return view('admin.weeks',compact('weeks'));
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

            Week::insert([
                'week_name' => $request->week_name,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'تم أضافة الاسبوع بنجاح', 
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
        $week_id = $request->id;
        
            Week::findOrFail($week_id)->update([
                'week_name' => $request->week_name,
            ]); 
            $notification = array(
            'message' => 'تم تحديث بيانات الاسبوع بنجاح', 
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
            $weeks = Week::findOrFail($request->id)->delete();
            $notification = array(
                'message' => 'تم حذف الاسبوع بنجاح', 
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
