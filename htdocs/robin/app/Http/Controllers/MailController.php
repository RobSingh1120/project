<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;


use App\Http\Requests;
use App\Http\Controllers\Controller;
class MailController extends Controller
{
    //

       public function basic_email(){
      $data = array('name'=>"Robin Singh");
      $issent = Mail::send(['text'=>'mail'], $data, function($message) {
         $message->to('deveshmkp@gmail.com', 'Devesh Pandey')->Cc('gautamdinesh08@gmail.com', 'Dinesh Gautam')->Bcc('sshashwat94@gmail.com', 'Shashwat Singh')->subject
            ('Laravel Basic Testing Mail');
         $message->from('poonia.robin@gmail.com','Robin Singh ');
      });
     echo 'Email sent Succesfully';
   }
/*   public function html_email(){
      $data = array('name'=>"Virat Gandhi");
      Mail::send('mail', $data, function($message) {
         $message->to('gautamdinesh08@gmail.com', 'Tutorials Point')->subject
            ('Laravel HTML Testing Mail');
         $message->from('gautamdinesh08@gmail.com','Dinesh Gautam');
      });
      echo "HTML Email Sent. Check your inbox.";
   }
   public function attachment_email(){
      $data = array('name'=>"Dinesh Gautam");
      Mail::send('mail', $data, function($message) {
         $message->to('gautamdinesh08@gmail.com', 'Tutorials Point')->subject
            ('Laravel Testing Mail with Attachment');
         $message->attach('C:\laravel-master\laravel\public\images\img111.png');
        // $message->attach('C:\laravel-master\laravel\public\images\1535957723.jpg');
         $message->from('gautamdinesh08@gmail.com','Dinesh Gautam');
      });
      echo "Email Sent with attachment. Check your inbox.";
   }*/
}
