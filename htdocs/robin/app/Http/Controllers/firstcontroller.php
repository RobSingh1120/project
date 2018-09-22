<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
class firstcontroller extends Controller

{
            //
        public function __construct()
       {
                $this->middleware('auth');
        }

            /**
             * Show the application dashboard.
             *
             * @return \Illuminate\Http\Response
             */
            
            public function logout(Request $request)
           {
                 Auth::logout();
                return redirect('/login');
            }

            public function index()
            {
                return view('AddUser');
            }

         public function save(Request $request )
           {

                //print_r($request->all());exit();
                $teacher=  new Teacher;
                $teacher->Name =$request->Name;

                $teacher->Email =$request->Email;

                $teacher->MobileNo =$request->MobileNo;

                $teacher->Location =$request->Location;

                $teacher->Password =$request->Password;
                
                $image = $request->file('image');
                                 $path = public_path(). '/images/';
                                 $filename = time() . '.' . $image->getClientOriginalExtension();
                                 $teacher->image=$filename;
                                $image->move($path, $filename);

                $teacher->Marital_status =$request->Marital_status;

                $teacher->Gender =$request->Gender;
                $teacher->save();


                return redirect('view'); 
            }
           // showing all data from database
                public function show()
           { 
                    $teacher= Teacher::paginate(7);
                   // print_r($teacher);exit();
                    return view('view')->with('teacher_data', $teacher);
            }
               // delete
                public function destroy($id)
            {
                    $row = Teacher::findOrFail($id);
                    //$student= new Student;
                    $row->delete();

                    //return 1;
                    return 1;//redirect('view');
            }
                //particular user view
                public function viewuser($id)
           {
                $teacher= Teacher::findOrFail($id);
                 return view('viewuser')->with('teacher_datashow', $teacher);
            }
                  // edit particular 
                public function edituser($id)
           {
                 $teacher= Teacher::findOrFail($id);
                 return view('edituser')->with('teacher_dataedit', $teacher);
            }
            
            // update data
            public function edit1(Request $request , $id)
               {

                    // print_r($request->all());

                    $teacher= Teacher::findOrFail($id);
                    $teacher->Name =$request->Name;

                    $teacher->Email =$request->Email;

                    $teacher->MobileNo =$request->MobileNo;

                    $teacher->Location =$request->Location;

                    $teacher->Password =$request->Password;

                    $image = $request->file('image');
                            $path = public_path(). '/images/';
                            $filename = time(). '.'.$image->getClientOriginalExtension();
                           print_r($filename);// $student->image=$filename;
                             $request->image->move($path, $filename);
                    $teacher->image=$filename;
                    $teacher->Marital_status =$request->Marital_status;
                    $teacher->Gender =$request->Gender;
                    $teacher->save();
                    return redirect('view');   
                }
                    protected function redirectTo()
               {
                    return '/login';
                }


             public function searchname()
            {
                $Name=Input::get('search');
                 $role=Input::get('selectrole');
                //print_r($name);exit;
                if(!empty($Name) && !empty($role))
                {
                $teacher=Teacher::where('Name','LIKE','%'.$Name.'%')->where('Email','LIKE','%'.$Name.'%')->where('role','LIKE','%'.$role.'%')->get();
                 return view('search',['datam'=>$teacher]);
                }
                elseif(empty($Name) && !empty($role))
                {
                 $teacher=Teacher::where('role','LIKE','%'.$role.'%')->get();
                 return view('search',['datam'=>$teacher]);
                }
                elseif(!empty($Name) && empty($role))
                {
                 $teacher=Teacher::where('Name','LIKE','%'.$Name.'%')->get();
                 return view('search',['datam'=>$teacher]);

                }
                else
                {
                    return redirect('view');
                }
            
        }

}