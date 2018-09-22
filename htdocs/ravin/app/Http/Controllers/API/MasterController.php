<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\user_profile;
use Validator;
use Auth;
use App\user_device;
use Illuminate\Support\Facades\Hash;
class MasterController extends Controller
{
    public function Register(Request $request)
    {
    	try
    	{
    			$validator = Validator::make($request->all(), [
	            
	          
	            'email' => 'required',
	             'password' => 'required',
	     
	          
	         ]);
	        //$validator->errors();
			if ($validator->fails()) 
			{
							$success['responseCode'] = '000';
							$success['responseMessage'] = "Fields are required";
							return response()->json(['response'=>$success]);            
						}

						$email=$request->email;
						$data=User::where('email',$email)->first();
						if(empty($data))
						{

						$user= new User;
			    	
						    	$user->name=$request->name;
						    	$user->email=$request->email;
						    	$user->password=Hash::make($request->password);
						    	$user->role=$request->role;
						    	$user->save();

						    	if($user->save())

						    	{
							    	$users = new user_profile;

							    	$users->name=$request->name;
							    	$users->email=$request->email;
							    	$users->contactno=$request->contactno;	
							    	
							    	$users->address=$request->address;
							    
							    	
							    	$users->role=$request->role;
							    	$users->uid=$user->id;
							    	
							    	
							    	$success=array(
							    		'name'=>$users["name"],
							    		'email'=>$users["email"],

										'contactno'=>$users["contactno"],
										'dob'=>$users["dob"],
										'address'=>$users["address"],
										'school'=>$users["school"],
										'college'=>$users["college"],
													
										'hospital'=>$users["hospital"],
							    		'role'=>	$users["role"],
							    		'Paymenr'=>	$users["Paymenr"],
							    		'fee'=>	$users["fee"],
							    		
							    		);
							    if($users->save())
						    	{
						    		$user_device = new user_device;
						    		$user_device->device_id=$request->device_id;
						    		$user_device->devide_token=$request->devide_token;
						    		$user_device->device_type=$request->device_type;
						    		$user_device->save();
						    	}
						    	$response['responseCode'] =  '200';
								$response['responseData'] =  $success;
						   		 $response['responseMessage'] = 'added successfully';          
						    return response()->json(['response'=>$response], 200);	
							 
							    }
							
				else{

			  	$response['responseData'] =  '502';
			    $response['responseMessage'] = 'data could not be saved';          
			    return response()->json(['response'=>$response], 5002);	
			}
		}
		
			else
			{
				 $response['responseData'] =  '500';
			    $response['responseMessage'] = 'email already exist';          
			    return response()->json(['response'=>$response], 500);	

			}
	}
	    catch(Exception $e)
	    {
	        return \Response::json(['error'=> ['responseMessage'=>$e->getMessage()]], HttpResponse::HTTP_CONFLICT)->setCallback(Input::get('callback'));
	    }
    }




                      /*----------------------------------------------------------------------
*/

    public function login(Request $request)
    {
    	try{
		
			
			$validator = Validator::make($request->all(), [				
				'email' => 'required',				
				
				'password' => 'required',
			]);

			if ($validator->fails()) {
				$success['responseCode'] =  '000';
				$success['responseMessage'] = trans('Feilds required');
				return response()->json(['response'=>$success], 000);            
			}
			$email=$request->email;
			$pass=$request->password;
			
			if(Auth::attempt(['email' =>$email, 'password' => $pass])){
				$user = Auth::User();

				
				$devide_token = $request->devide_token ;
				$device_type = $request->device_type;
				$device_id = $request->device_id;
				if(user_device::where('device_id',$user->id)->count() == 0){
						
							$user_device = new user_device;
							$user_device->conn_id = $user->id;
							$user_device->devide_token = $devide_token ;
							$user_device->device_type = $device_type;
							$user_device->device_id = $device_id;
							$user_device->save();
							
						}else{		

							$user_device = user_device::where(['device_id'=>$user->id])->update(array('devide_token'=>$devide_token,'device_type'=>$device_type,'device_id'=>$device_id));	
						}	
				$response['responseCode'] =  '200';
				$response['responseData'] =  '200';
			    $response['responseMessage'] = 'login successfull';          
			    return response()->json(['response'=>$response], 200);	
   				 }
   				 else
   				 {
   				 	$response['responseCode'] =  '500';
				$response['responseData'] =  '500';
			    $response['responseMessage'] = 'invalid data';          
			    return response()->json(['response'=>$response], 500);	
   				 }
		}
		catch(Exception $e) {
            return \Response::json(['error'=> ['responseMessage'=>$e->getMessage()]], HttpResponse::HTTP_CONFLICT)->setCallback(Input::get('callback'));
            
        }
    }



/*          -------------------------------------------------------------------------

*/


		  public function update(Request $request)
		{

	try
    	{

					$validator = Validator::make($request->all(), [   
	            'email' => 'required',
	              'contactno' => 'required',
	              
	          
	         ]);
	        //$validator->errors();
			if ($validator->fails()) 
			{
				$success['responseCode'] = '500';
				$success['responseMessage'] = "feild required";
				return response()->json(['response'=>$success]);            
			}

			$user= User::where('id',$request->id)->first();

	    	$user->name=$request->name;
	    	$user->email=$request->email;
	    	$user->password=$request->password;
	    	$user->role=$request->role;
	    	$des=$user->id;

	    	if($user->save())

	    	{
		    	$users = user_profile::where('uid',$des)->first();
		    	
		    	$users->name=$request->name;
		    	$users->email=$request->email;
		    	$users->contactno=$request->contactno;	
		    	
		    	$users->address=$request->address;
		
		    	
		    	$users->role=$request->role;
		    	
		    
		    	
		    	if($users->save())
		    	{


		    		$device =  new user_device;
		    		
		    		$device->device_id=$request->device_id;
		    		$device->devide_token=$request->devide_token;
		    		$device->device_type=$request->device_type;
		    		
		    		
		    		$device->save();
		    	}

		    	$success=json_encode($users);

				$response['responseCode'] =  '200';
				$response['responseData'] =  $success;
			    $response['responseMessage'] = 'data updated successfully';          
			    return response()->json(['response'=>$response], 200);	
   			}
   				 else
   				 {
   				 	$response['responseCode'] =  '204';
				$response['responseData'] =  '204';
			    $response['responseMessage'] = 'unsuccessfull';          
			    return response()->json(['response'=>$response], 204);	
   				 }


		}
	
	 catch(Exception $e)
	    {
	        return \Response::json(['error'=> ['responseMessage'=>$e->getMessage()]], HttpResponse::HTTP_CONFLICT)->setCallback(Input::get('callback'));
	    }

}




		/*	-------------------------------------------------------------------------------------------
*/

		public function logout(Request $request)
		{

			try
    		{
					$validator = Validator::make($request->all(), [   
	            
	                'device_id' => 'required'
	                ]);
	          if ($validator->fails()) 
			{
				$success['responseCode'] = '500';
				$success['responseMessage'] = "field required";
				return response()->json(['response'=>$success]); 
				} 

				$device=user_device::where('device_id',$request->device_id)->first();
				if(!empty($device["devide_token"])){
				if($device->delete())
				{
				$response['responseCode'] =  '200';
				
			    $response['responseMessage'] = 'data deleted successfully';          
			    return response()->json(['response'=>$response], 200);	 
			    }         
   				 else
   				 {
   				 	$response['responseCode'] =  '204';
			
			    $response['responseMessage'] = 'unsuccessfull';          
			    return response()->json(['response'=>$response], 204);	
   				 }
	          
	         }
	         else
	         {
	         	$response['responseCode'] =  '506';
			
			    $response['responseMessage'] = 'data not found';          
			    return response()->json(['response'=>$response], 506);	

	         }
	         	}
	
	 catch(Exception $e)
	    {
	        return \Response::json(['error'=> ['responseMessage'=>$e->getMessage()]], HttpResponse::HTTP_CONFLICT)->setCallback(Input::get('callback'));
	    }

	
	}
}