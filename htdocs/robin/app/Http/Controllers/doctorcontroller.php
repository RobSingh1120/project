<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Collection\Appends;
use App\Role;
use App\tableuser;
class doctorcontroller extends Controller
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

              public function showdash()
              {

                  $tableuser = tableuser::all();
                  return view('dashboard',['tab'=>$tableuser]);
              }
            public function management_data()
            {
                $tableuser = tableuser::paginate(7);
                 return view('usermanagement',['manage_data'=>$tableuser]);
            }
              public function destroy($id)
              {
              $row= tableuser::findOrFail($id);
              
              $row->delete();
              return 1;
            }

              public function viewuser($id)
            {
              $row= tableuser::findOrFail($id);
              return view('manageuserview')->with('userdata', $row);
            }
              public function viewstatus($id)
            {
                 $row= tableuser::findOrFail($id);
                 if($row->status==0)
                {
                  $row->status =1;
                  $row->save();
                }
             else
               {
                $row->status =0;
                $row->save();
               }
         
            }
             public function  searchname()
            {
                   $name = Input::get('search');
                   $role = Input::get('selectrole');
                   $role1 = $role;
                      /* print_r($name);
                       print_r($role1);exit;  */         
                   if(!empty($name) && !empty($role1)) 
                { 

                   $tableuser= tableuser::where(function($query) use ($name, $role1)
                   {
                     $query->where('name','LIKE','%'. $name .'%')->orWhere('email','LIKE','%'. $name .'%')->orWhere('contactno','LIKE','%'. $name .'%');
                    })->where('role','LIKE','%'. $role1 .'%');
                    //dd($tableuser);exit;
                        if(count($tableuser)>0)
                      {
                         $tableuser=$tableuser->paginate(5);
                         return view('usermanagement',['manage_data'=>$tableuser ,'search'=> $name]);
                      }
                   else 
                        return view('usermanagement')->withMessage('No Details Found');
                }    
                   elseif(empty($name) && !empty($role1)) 
                    {
                       //                      print_r($role1);exit;

                       $tableuser= tableuser::where('role','LIKE','%'. $role1 .'%');
                       if(count($tableuser)>0)
                      {
                        $tableuser=$tableuser->paginate(5);
                        return view('usermanagement',['manage_data'=>$tableuser , 'search'=> $name]);
                      }
                     else 
                        return view('usermanagement')->withMessage('No Details Found');

                    }   
                     elseif(!empty($name) && empty($role1)) 

                    {

                      // print_r('here');exit;

                       $tableuser= tableuser::where('name','LIKE','%'. $name .'%')->orWhere('email','LIKE','%'. $name .'%')->orWhere('contactno','LIKE','%'. $name .'%');
                     if(count($tableuser)>0)
                      {
                        $tableuser=$tableuser->paginate(5);
                        return view('usermanagement',['manage_data'=>$tableuser, 'search'=> $name]);
                      }
                            else 
                              return view('usermanagement')->withMessage('No Details Found');
                    }
                    else
                    {

                      $tableuser = tableuser:: paginate(5);
                      return view('usermanagement',['manage_data'=> $tableuser ,'search'=> $name]);
                    }

            }
                    public function approved($id)
                        {
                                  $data=tableuser::findOrFail($id);
                                  $val=$data->approved;

                                  if($val == 0)
                                  $data->approved = 1;
                                else
                                  $data->approved = 0;
                                $vali=$data->approved;
                                
                                $data->save();
                                return redirect('usermanagement');

                              }
}