<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\User;
use App\user_profile;
use Illuminate\Support\Facades\Hash;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function logout(Request $request) {
     Auth::logout();
  return redirect('/login');
}

    public function show()
    {
        return view('adduser' );
    }
     public function showdash()
              {

                  $user = User::all();
                  return view('dashboard',['tab'=>$user]);
              }

               public function management_data()
            {
                $user = User::paginate(7);
                 return view('userlists',['manage_data'=>$user]);
            }
             public function save(Request $request )
           {

                //print_r($request->all());exit();
                $user=  new User;
                $user->name =$request->name;
                $user->email =$request->email;
                 $user->password=Hash::make($request->password);
                 $user->role =$request->role;
                if($user->save());
                 
                 $users= new user_profile;
                 $users->name =$request->name;
                  $users->email =$request->email;
                   $users->contactno =$request->contactno;
                    $users->address =$request->address;
                    
                     $users->uid =$user->id;
                     $users->save();

                return redirect('home'); 
            }
}
