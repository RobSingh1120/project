<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\user_profile;
use Validator;
use Auth;
use App\user_device;
use App\user_address;
use App\user_rating;
use App\user_treatment;
use App\user_notification;
use Mail;

use Illuminate\Support\Facades\Hash;

class MasterController extends Controller
{
    //

			public function Register(Request $request)
   	 {	
    		try
    		{
    			$validator = Validator::make($request->all(), [
	            
	            
	             'name' => 'required',
	            'email' => 'required',
	             'password' => 'required',
	            'role' => 'required',
	             'contact_number' => 'required',
	            'address' => 'required',
	          'image'=>'required',
	           
	            
	          
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
						    	$user->role_id=$request->role;
						    	$us_id=$user->id;
						    	$user->save();

						    	if($user->save())

						    {
						    		$us_id=$user->id;
							    	$users = new user_profile;
							    	$users->user_id=$us_id;
							    	$users->first_name=$request->first_name;
							    	$users->last_name=$request->last_name;
							    	$users->email=$request->email;
							    	$users->contact_number=$request->contact_number;	
							    	$users->referal_code=$request->referal_code;
							    	$users->password=$request->password;
							    	
							    	$image = $request->file('image');
							    	//print_r($image);exit();
                 					$path = public_path(). '/images';
                			 		$filename = time() . '.' . $image->getClientOriginalExtension();
                 					$users->image=$filename;
                					$image->move($path, $filename);
							    	$users->fees=$request->fees;
							    
							    	$users->Status=$request->Status;
							    	$users->laboratory_name=$request->laboratory_name;
							    	$users->laboratory_Stime=$request->laboratory_Stime;
							    	$users->laboratory_Ctime=$request->laboratory_Ctime;
							    	$users->laboratory_website=$user->laboratory_website;
							    	$users->laboratory_discount=$request->laboratory_discount;
							    	$users->doctor_describtion=$request->doctor_describtion;
							    	$users->BMCT_balance=$request->BMCT_balance;
							    	$users->cash_balance=$request->cash_balance;
							    	$users->prescription=$request->prescription;
							    	$users->radius=$request->radius;
							    	$users->notification=$request->notification;
							    	
							    if($users->save())
						    	{
							    		$user_device = new user_device;

							    		$user_device->user_id=$us_id;
							    		$user_device->device_id=$request->device_id;
							    		$user_device->device_token=$request->device_token;
							    		$user_device->device_type=$request->device_type;
							    	  if($user_device->save())
							    		//print_r($user_device->toArray());exit();
							    	{
							    	    //print_r('gfhdsjsn');exit();
							    		$user_address= new user_address;
							    		//print_r('gfhdsjsn');exit();

							    		$user_address->uid=$us_id;
							    		$user_address->langitude=$request->langitude;
							    		$user_address->longitude=$request->longitude;
							    		$user_address->longitude=$request->longitude;
							    		$user_address->address=$request->address;
							    		$user_address->save();
							    	}

						    	}
						    	
						    	$response['responseCode'] =  '200';
								$response['responseData'] =  '200';
						   		$response['responseMessage'] = 'Register successfully';          
						        return response()->json(['response'=>$response], 200);	
							 
						    }
							
				else{

			  	$response['responseData'] =  '502';
			    $response['responseMessage'] = 'Data can not be saved';          
			    return response()->json(['response'=>$response], 5002);	
			}
		}
		
			else
			{
				 $response['responseData'] =  '500';
			    $response['responseMessage'] = 'Email already exist';          
			    return response()->json(['response'=>$response], 500);	

			}
	}
	    catch(Exception $e)
	    {
	        return \Response::json(['error'=> ['responseMessage'=>$e->getMessage()]], HttpResponse::HTTP_CONFLICT)->setCallback(Input::get('callback'));
	    }
    }



public function login(Request $request)
    {
    	try{
		
			
			$validator = Validator::make($request->all(), [				
				'email' => 'required',				
				'device_id' => 'required',
				'password' => 'required'
			]);

			if ($validator->fails()) {
				$success['responseCode'] =  '500';
				$success['responseMessage'] = trans('Fields are  required');
				return response()->json(['response'=>$success], 500);            
			}
					$email=$request->email;
					$password=$request->password;
			
			if(Auth::attempt(['email' =>$email, 'password' => $password])){
				$user = Auth::User();

				
				$device_token = $request->device_token;
				$device_type = $request->device_type;
				$device_id = $request->device_id;
				$device_name=$request->device_name;

				if(user_device::where('device_id',$user->id)->count() == 0){
						
							$user_device = new user_device;
							$user_device->user_id = $user->id;
							$user_device->device_token = $device_token;
							$user_device->device_type = $device_type;
							$user_device->device_name=$device_name;
							$user_device->device_id=$device_id;
							$user_device->save();
							
						}else{		

							$user_device = user_device::where(['device_id'=>$user->id])->update(array('device_token'=>$device_token,'device_type'=>$device_type,'device_name'=>$device_name));	
						}	
				/*$user_notification = new user_notification;
				$user_notification->user_id=$id;
				$user_notification->notification="Login successfully";
				$user_notification->save();*/
				$response['responseCode'] =  '200';
				$response['responseData'] =  '200';
			    $response['responseMessage'] = 'Login successfully';          
			    return response()->json(['response'=>$response], 200);	
   				 }
   				 else
   				 {
   				 	$response['responseCode'] =  '500';
				$response['responseData'] =  '500';
			    $response['responseMessage'] = 'Invalid data';          
			    return response()->json(['response'=>$response], 500);	
   				 }
		}
		catch(Exception $e) {
            return \Response::json(['error'=> ['responseMessage'=>$e->getMessage()]], HttpResponse::HTTP_CONFLICT)->setCallback(Input::get('callback'));
            
        }
    }


public function retrive(Request $request)
    {
    	try{
		
    	
    			$validator = Validator::make($request->all(), [
	            
	            'role' => 'required',
	            
	          
	         ]);
	        //$validator->errors();
			if ($validator->fails()) 
			{
							$success['responseCode'] = '000';
							$success['responseMessage'] = "Fields are required";
							return response()->json(['response'=>$success]);            
						}
							$role_id=0;
						$role=$request->role;

						$user=user::where('role_id',$role)->get();
						foreach($user as $data)
						$role_id=$data->role_id;
						if($role_id == '1' or $role_id == '2' or $role_id == '3')

						{

						foreach($user as $user_data)
						{
						$id=$user_data->id;
						
						/*if(isset($id))
						{*/

							$user_profile_data=user_profile::where('user_id',$id)->first();
							if(isset($user_profile_data))
							{
							//print_r($user_profile_data->toArray());exit();
							$first_name=$user_profile_data->first_name;
							$last_name=$user_profile_data->last_name;
							$image=$user_profile_data->image;
							
							$experience=$user_profile_data->experience;
							$detail=$user_profile_data->doctor_describtion;
							$status=$user_profile_data->Status;
						}
						else
						{
							$first_name='null';
							$last_name='null';
							$experience='null';
							$detail='null';
							$status='null';
							$image='null';
						}

							$user_rating_data=user_rating::where('uid',$id)->first();
							if(isset($user_rating_data))
							{

							$rate=$user_rating_data->rate;
						}
						else
						{
							$rate='0';
						}
							$user_address_data=user_address::where('uid',$id)->first();
							
							
							if(isset($user_address_data))
							{
								$address=$user_address_data->address;
							}
							else
							{
								$address='null';
							}
							$success[]=array(
									'first_name'=>$first_name,
									'last_name'=>$last_name,
									'experience'=>$experience,
									'detail'=>$detail,
									'status'=>$status,
									'rate'=>$rate,
									'image'=>$image,
									'address'=>$address
								);
							}

						$response['responseCode'] =  '200';
						$response['responseData'] =  $success;
			    		$response['responseMessage'] = 'data sent succesfully';          
			    		return response()->json(['response'=>$response], 500);	
						}
						else
						{
							$response['responseCode'] =  '500';
						$response['responseData'] =  '500';
			    		$response['responseMessage'] = 'data not found';          
			    		return response()->json(['response'=>$response], 500);	
			    		
						}
					
					
			    	}
	
    

		catch(Exception $e) {
            return \Response::json(['error'=> ['responseMessage'=>$e->getMessage()]], HttpResponse::HTTP_CONFLICT)->setCallback(Input::get('callback'));
            
        }
        }





 	      public function laboratory(Request $request)
      {

			 			$id=0;
			 	 		$validator=validator::make($request->all(),
			 				[
			 				'role' => 'required',
							]);
			 		if($validator->fails())
			 		{
						$response['responseCode']= '200';
						$response['responseData']= '200';
						$response['responseMessage']='Fields is required';
						return response()->json(['response'=>$response]);
			 		}
				 			$role=$request->role;
				 			if($role ==3)
			 			{
				 			$user = User::where('role_id',$role)->get();
				 			 foreach($user as $data)
			 			{

				 			$id=$data->id;
				 			$data_user = user_profile::where('user_id',$id)->first();
				 			if(isset($data_user))
			 			{
			 				$name=$data_user->laboratory_name;
			 				$start_time=$data_user->laboratory_Stime;
			 				$end_time=$data_user->laboratory_Ctime;
			 				$website=$data_user->laboratory_website	;
			 				$discount=$data_user->laboratory_discount;
			 				$contact=$data_user->contact_number;

			 			}
			 			   else
			 			{
			 				$name = 'null';
			 				$start_time = 'null';
			 				$end_time = 'null';
			 				$website = 'null';
			 				$discount = 'null';
			 				$contact = 'null';
			 			}
			 				$success[]=array(
			 					'name'=>$name,
			 					'start_time'=>$start_time,
			 					'end_time'=>$end_time,
			 					'website'=>$website,
			 					'contact'=>$contact,
			 					'discount'=>$discount
			 					);

			 			}
			 					$user_notification = new user_notification;
								$user_notification->user_id=$id;
								$user_notification->notification="data sent successfully";
								$user_notification->save();
							 	$response['responseCode']='200';
				 				$response['responseData']=$success;
				 				$response['responseMessage']='Data sent successfully';
				 				return response()->json(['response'=>$response]);	
			 			
			  		}
			 			else
						{
							$response['responseCode'] =  '500';
							$response['responseData'] =  '500';
				    		$response['responseMessage'] = 'Choose laboratory as role';          
				    		return response()->json(['response'=>$response], 500);	
			    		
			             }
       }



public function treatment(Request $request)
 {

 			
 	 		$validator=validator::make($request->all(),
 				[
 				'patient_id' => 'required',
 				'doctor_id'	=> 'required',
				]);
 		if($validator->fails())
 		{
			$response['responseCode']= '200';
			$response['responseData']= '200';
			$response['responseMessage']='field is required';
			return response()->json(['response'=>$response]);
 		}
 			$patient_id=$request->patient_id;
 			$doctor_id=$request->doctor_id;

 			if(isset($patient_id) and isset($doctor_id) )
 			{
 			$user = user_treatment::where('patient_id',$patient_id)->where('doctor_id',$doctor_id)->get();
 			foreach($user as $data);

 			if(isset($data->patient_id) and isset($data->doctor_id))
 			{
 			 foreach($user as $user_data)
 			
 			{
 			
 				$patient_id=$user_data->patient_id;
 				$doctor_id=$user_data->doctor_id;
 				$date=$user_data->date;
 				$time=$user_data->time	;
 				$prescription=$user_data->prescription;
 				$success[]=array(
 					'patient_id'=>$patient_id,
 					'doctor_id'=>$doctor_id,
 					'date'=>$date,
 					'time'=>$time,
 					'time'=>$time,
 					'prescription'=>$prescription
 					);

 			}
 		}
 		else
 		{

 			 	$response['responseCode']='500';
 				
 				$response['responseMessage']='data inserted invalid';
 				return response()->json(['response'=>$response]);	
 			
 		}
 				$user_notification = new user_notification;
				$user_notification->user_id=$id;
				$user_notification->notification="data sent successfully";
				$user_notification->save();
 				$response['responseCode']='200';
 				$response['responseData']=$success;
 				$response['responseMessage']='data sent successfully';
 				return response()->json(['response'=>$response]);	
 			
  		}
 			else
			{
			$response['responseCode'] =  '500';
			$response['responseData'] =  '500';
    		$response['responseMessage'] = 'patient or doctor id not found';          
    		return response()->json(['response'=>$response], 500);	
    		
			}
 		}



		  public function update(Request $request)
		{

	try
    	{

					$validator = Validator::make($request->all(), [   
	            'id' => 'required',
	          'email' => 'required',
	              
	          
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
	    	$user->password=Hash::make($request->password);
	    	$user->role_id=$request->role_id;
	    	$user_store_id=$user->id;
	    
	    	if($user->save())

	    	{
		    	$users = user_profile::where('user_id',$user_store_id)->first();
		    	
		    	$users->first_name=$request->first_name;
		    	$users->email=$request->email;
		    	$users->contact_number=$request->contact_number;	
		    	$image = $request->file('image');
							    	//print_r($image);exit();
                 $path = public_path(). '/images';
                $filename = time() . '.' . $image->getClientOriginalExtension();
                 $users->image=$filename;
                $image->move($path, $filename);
		    	$users->experience=$request->experience;
		    	
		    	$users->fees=$request->fees;
		    	if($users->save())
		    	{
		     		$device =  new user_device;	    		
		    		$device->device_id=$request->device_id;
		    		$device->device_token=$request->device_token;
		    		$device->device_name=$request->device_name;
		    		$device->device_type=$request->device_type;		
		    		$device->save();
		    	}

		    	$user_notification = new user_notification;
				$user_notification->user_id=$id;
				$user_notification->notification="data updated successfully";
				$user_notification->save();

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
			    $response['responseMessage'] = 'Please Fill Email and Password correctly ';          
			    return response()->json(['response'=>$response], 204);	
   				 }


		}
	
	 catch(Exception $e)
	    {
	        return \Response::json(['error'=> ['responseMessage'=>$e->getMessage()]], HttpResponse::HTTP_CONFLICT)->setCallback(Input::get('callback'));
	    }

}


public function changepassword(Request $request)
 {


	$validator=validator::make($request->all(),
 				[

 				'id'=> 'required',
 				'old_password'=> 'required',
 				'new_password' => 'required',
 				'confirm_password'	=> 'required',
				]);
 		if($validator->fails())
 		{
			$response['responseCode']= '200';
			$response['responseData']= '200';
			$response['responseMessage']='Fields are required ';
			return response()->json(['response'=>$response]);
 		}
 		 $id=$request->id;
 		 $old_password= $request->old_password;
 		 $new_password=$request->new_password;
 		 $confirm_password=$request->confirm_password;

      $user= User::where('id',$request->id)->first();
 		
 
 		if (Hash::check($request->input('old_password'), $user->password)){
      
 		/*$user=User::where('id',$id)->first();*/
 		if($new_password === $confirm_password)
 		{
 			$user->password =Hash::make($new_password);
 			if($user->save())
 			{
 				$user_notification = new user_notification;
				$user_notification->user_id=$id;
				$user_notification->notification="Password successfully  changed";
				$user_notification->save();

 				$response['responseCode']='500';				
				$response['responseMessage']='Password successfully  changed';
				return response()->json(['response',$response]);
 			}			
 		}
 		else
 		{
 				$response['responseCode']='501';
		
				$response['responseMessage']='New password and Confirm password must be same';
				return response()->json(['response',$response]);
 		}
 }
 else
 		{
 				$response['responseCode']='501';
		
				$response['responseMessage']='old password is wrong';
				return response()->json(['response',$response]);
 		}
 }




 public function forgetpassword(Request $request)
{
	try{
		$validator = Validator::make($request->all(), [
	             'id' =>'required',
	             'email'=>'required'
	         ]);
	     
		if ($validator->fails()) {
		$success['responseCode'] = '000';
		$success['responseMessage'] = "Fields are  required";
		return response()->json(['response'=>$success]);            
			}

			$id=$request->id;
			$email=$request->email;
			if(isset($id)){
			$user=User::where('id',$id)->first();
			//print_r($user->email);exit;
			if( $email== $user->email)
			{
		if(isset($email)){
       
        $data = array('name'=>"Robin Singh",'url'=>'http://localhost/laravel1/public/api/forgetpassword');
            $issent = Mail::send([],$data, function($message) use ($email) {
                
            $message->to( $email , 'Reset Password')->subject('Forget password')->setBody('http://localhost/laravel1/public/api/cpass');
            $message->from('poonia.robin@gmail.com','Robin Singh');
         });

        	$response['responseCode']='200';
			$response['responseMessage']='Email Sent successfully';
			return response()->json(['response',$response]);

			}
			else
			{
		$response['responseCode']='400';
		$response['responseMessage']='Email is Not Sent';
		return response()->json(['response',$response]);
		}
	}
		else{
		$response['responseCode']='401';
		$response['responseMessage']='Email Id does Not Exist or Matched';
		return response()->json(['response',$response]);
		}
	}else
		{
		$response['responseCode']='404';
		$response['responseMessage']='User is Not Exist';
		return response()->json(['response',$response]);
		}
   }catch(Exception $e){
	        return \Response::json(['error'=> ['responseMessage'=>$e->getMessage()]], HttpResponse::HTTP_CONFLICT)->setCallback(Input::get('callback'));
	    }

		}



public function social_media(Request $request)
 {


	$validator=validator::make($request->all(),
 				[
 				'social_type' => 'required',
 				'social_id' =>'required',

 				
				]);
 		if($validator->fails())
 		{
			$response['responseCode']= '200';
			$response['responseData']= '200';
			$response['responseMessage']='fieldS are required ';
			return response()->json(['response'=>$response]);
 		}
 		$id= $request->social_id;
 		$type=$request->social_type;
 		$email=$request->email;
 		$password=$request->password;
 		$first_name=$request->first_name;
 		$last_name=$request->last_name;
 		$role=$request->role_id;
 		$email=$request->email;
 		$contact_number=$request->contact_number;
 		 $user=user::where('social_id',$id)->first();
 		if(isset($user->social_id))
 		{
			if(Auth::attempt(['email' =>$email, 'password' => $password]))
			{
				$user = Auth::User();
				$device_token = $request->device_token;
				$device_type = $request->device_type;
				$device_id = $request->device_id;
				$device_name=$request->device_name;

				if(user_device::where('device_id',$user->id)->count() == 0)
				{

							$user_device = new user_device;
							$user_device->user_id = $user->id;
							$user_device->device_token = $device_token;
							$user_device->device_type = $device_type;
							$user_device->device_name=$device_name;
							$user_device->device_id=$device_id;
							$user_device->save();				
							
						}
						else
						{		

						$user_device = user_device::where(['device_id'=>$user->id])->update(array('device_token'=>$device_token,'device_type'=>$device_type,'device_name'=>$device_name));	
						}
						$user_id=$user->id;
						$name=$user->name; 
						$email=$user->email;
						$role=$user->role_id;
						$social_type=$user->social_type;
						$social_id=$user->social_id;
						$success = array(
							'name'=>$name,
							'email'=>$email,				
							'social_type'=>$social_type,
							'social_id'=>$social_id,
								);
				$response['responseCode'] =  '200';
				$response['responseData'] =  $success;
			    $response['responseMessage'] = 'Login successfully';          
			    return response()->json(['response'=>$response]);	
   				 }
   				 else
   				 {
   				 	$response['responseCode'] =  '500';
				$response['responseData'] =  '500';
			    $response['responseMessage'] = 'Please enter correct data';          
			    return response()->json(['response'=>$response], 500);	
   				 }

 		}
 		else
 		{
				$user= new User;
		    	$user->name=$first_name;
		    	$user->email=$email;
		    	$user->password=Hash::make($password);
		    	$user->role_id=$role;
		    	$user->social_type=$type;
		    	$user->social_id=$id;
		    	$user12 = user::where('email',$email)->first();
		    	if(empty($user12))
				{
			    	if($user->save())
			    	{
				    		$ids=$user->id;
					    	$user_profile = new user_profile;
					    	$user_profile->user_id=$ids;
					    	$user_profile->first_name=$first_name;
					    	$user_profile->last_name==$last_name;
					    	$user_profile->email=$email;
					    	$user_profile->contact_number=$contact_number;	
					    	$user_profile->referal_code=$request->referal_code;
					    	$user_profile->password=$password;

		 				$user_profile->save();
		 				$user_id=$user->id;
						$name=$user->name; 
						$email=$user->email;
						$role=$user->role_id;
						$social_type=$user->social_type;
						$social_id=$user->social_id;
						$success = array(
							'name'=>$name,
							'email'=>$email,
							'social_type'=>$social_type,
							'social_id'=>$social_id,
								);
		 				$response['responseCode'] =  '200';
						$response['responseData'] =  $success;
						$response['responseMessage'] = 'Created successfully';          
						return response()->json(['response'=>$response], 200);	
									 
					}			
					else
					{

					  	$response['responseData'] =  '502';
					    $response['responseMessage'] = 'Data can not be saved';          
					    return response()->json(['response'=>$response], 502);	
					}
				}
				else
				{
				$response['responseData'] =  '502';
			    $response['responseMessage'] = 'Email already exists';          
			    return response()->json(['response'=>$response], 502);	
				}

			}

	
 	}
}



 



