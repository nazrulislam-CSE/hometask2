<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class AdminController extends Controller
{
	/*=================== Start Dashboard Methoed ===================*/
    public function Dashboard(){
    	
    	return view('dashboard');
    } // end method

    /*=================== End Dashboard Methoed ===================*/
    
    /*=================== Start Logout Methoed ===================*/
    public function AminLogout(Request $request){
        
    	Auth::guard('web')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notification = array(
            'message' => 'Admin Logout Successfully.', 
            'alert-type' => 'success'
        );
    	return redirect()->route('login')->with($notification);
    } // end method
    /*=================== End Logout Methoed ===================*/
}
