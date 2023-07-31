<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $notification = array(
            'message' => 'تم تسجيل الخروج بنجاح', 
            'alert-type' => 'error'
        );
        return redirect('/login')->with($notification);
    } // End Method 

    public function ChangePassword(){
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('admin.change_password',compact('userData'));
    }// End Method

    public function UpdatePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword )) {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();

            $notification = array(
                'message' => 'تم تغيير كلمة السر بنجاح', 
                'alert-type' => 'info'
            );
            return back()->with($notification);
        } else{

            $notification = array(
                'message' => 'كلمة السر القديمة ليست صحيحه', 
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

    }// End Method

    public function Profile(){ 
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('admin.Profile',compact('userData'));
 
    }// End Method 

    public function StoreProfile(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->contact = $request->contact;
        $data->address = $request->address;
        $data->country = $request->country;
        $data->city = $request->city;
        $data->save();
        $notification = array(
            'message' => 'تم تعديل البيانات الشخصيه بنجاح', 
            'alert-type' => 'info'
        );
        return back()->with($notification);
    }// End Method

    public function AdminAll(){
        $admins = User::latest()->get();
        return view('admin.all_admins',compact('admins'));
    } // End Method

    public function AddAdmin(){
        return view('admin.add_admin');
    }// End Method


    public function CreateAdmin(Request $request){
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'contact' => $request->contact,
            'address' => $request->address,
            'country' => $request->country,
            'city' => $request->city,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'تمت أضافة الادمن بنجاح', 
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }// End Method 

    public function DeleteAdmin(Request $request)
    {
        try {
            $admins = User::findOrFail($request->id)->delete();
            $notification = array(
                'message' => 'تم حذف ألادمن بنجاح', 
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
