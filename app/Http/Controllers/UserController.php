<?php

namespace App\Http\Controllers;

use App\Models\User;
use Validator;
use Auth;
use Redirect;
use Hash;
use DB;
use Illuminate\Http\Request;

class UserController extends Controller
{

	//Login
    public function login(){
    	return view('/login');
    }

    public function checklogin(Request $request){

     	$user_data = array(
       		'email'  => $request->get('email'),
      		'password' => $request->get('password')
     	);
     	// dd($user_data);
     	if(Auth::attempt($user_data)){
      		return view('/menu');
     	}else{
      		return back()->with('error', 'Wrong Login Details');
     	}

    }
    public function logout(){

    	Auth::logout();
    	return Redirect::to('/login'); 
	}
	//End Login

	//Registration

	public function form(){
		return view('/form');
	}

	public function save(Request $request){

		$user = new User;

		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = Hash::make($request->password);
		$user->dob = $request->dob;
		$user->designation = $request->designation;
		$user->gender = $request->gender;
		
		if($request->file('profile_picture')){

    	$profile_picture = $request->file('profile_picture');
        $file_name = time(). '.' . $profile_picture->getClientOriginalExtension();
        $profile_picture->move('user/', $file_name);
        $user->profile_picture = $file_name;
    	}


		$user->country = $request->country;
		$user->fav_color = $request->fav_color;
		$user->fav_actor = $request->fav_actor;

		$user->save();

		return redirect('/login')->with('success', 'Registered Sucessfully');

	}

	//End Registration

	//Home 

	public function home(Request $request){

		$users = User::select('id','name','email',DB::raw('DATE_FORMAT(users.dob,"%d-%m-%Y") as dob'),'profile_picture')->where('id','!=',Auth::user()->id)->get();

		return view('/home',compact('users'))->with('i');
	}

	public function view($id){
		$user = User::where('id',$id)->first();
    	return view('/view',compact('user'));
	}

	public function addFriend($id){

		$user_id = Auth::user()->id;
		$friend_id = (int)$id;
		$values = array('user_id' => $user_id,'friend_id' => $friend_id);
		$user_friends = DB::table('user_friends')->insert($values);

		return response()->json(['success'=>'Friend Added successfully']);
	}

	public function search(Request $request){
		$search = $request->search;
		$users = User::where('name','like','%'.$search.'%')
        ->orderBy('created_at','asc')
        ->paginate(20);

    return view('home',compact('users'))->with('i');
	}

	public function filter(Request $request){
			$gender = $request->gender;
			$fav_actor = $request->actor;
			$fav_color = $request->color;

		$users = User::where('gender','=', $gender)
		->orWhere('fav_color','=', $fav_color)
		->orWhere('fav_actor','=', $fav_actor)
        ->orderBy('created_at','asc')
        ->paginate(20);

    return view('home',compact('users'))->with('i');

	}

	public function match(){
		 $users = User::where('gender','=',Auth::user()->gender)
		 ->orWhere('fav_color','=', Auth::user()->fav_color)
		 ->orWhere('fav_actor','=', Auth::user()->fav_actor)
		 ->orWhere('designation','=', Auth::user()->designation)
		 ->orWhere('country','=', Auth::user()->country)
		 ->get();

		 

		 return view('/match',compact('users'))->with('i');
	}

}
