<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class UserController extends Controller
{
    public function studentInformation(){
    	return view('#');

    }
    public function accountStored(Request $request){
    	// dd($request->all());

		// dd("baher ala");
            $this->validate($request,[
            'full_name'=> 'required',
            'email'=> 'required|email',
            'mobile'=> 'required|numeric|digits:10',
            'address'=> 'required',
            'city'=> 'required',
            'gender'=> 'required',
            'password'=> 'required|min:6',
            'confirm_password'=> 'required|same:password|min:6',
            ]);
         // dd("khali ala");

    	$student = new Student();
         $student->full_name = $request->full_name;
         $student->email = $request->email;
         $student->alternate_email = $request->alternate_email;
         $student->mobile = $request->mobile;
         $student->alternate_mobile = $request->alternate_mobile;
         $student->address = $request->address;
         $student->city = $request->city;
         $student->gender = $request->gender;
         // dd($request->hobbies);
         $hobbies = implode(',', $request->hobbies);
         // dd($hobbies);
         $student->hobbies = $hobbies;
         $student->password = $request->password;
         $student->save();
    }
}
