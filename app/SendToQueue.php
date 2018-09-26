<?php

namespace App;
use App\Jobs\SendSms;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Database\Eloquent\Model;
use DB;
use Artisan;
class SendToQueue extends Model
{
  public static function send_to_sms_queue($post_data)
  {
    //preparing msg to be sent//
    $receiver_data=$post_data['selected_csv'];
    $text=$post_data['text'];
    $company_id=$post_data['company'];
    $company_name=$post_data['company_name'];
    $url=$post_data['url'];
    if($text == 'text1')
    {
       $dropdown1 = $post_data['dropdown1_1'];
       $dropdown2 = $post_data['dropdown2_1'];
       $dropdown3 = $post_data['dropdown3_1'];
       $parent_type = 'text';
       $child_type = 'sms1';
       $sms = 'Thanks again for your business FIRST_NAME in ' . $dropdown1 . ' ' . $company_name . '. Please ' . $dropdown2 . ' at ' . $url . '  ' . $dropdown3;
    }
    elseif($text == 'text2')
    {
       $dropdown1 = $post_data['dropdown1_2'];
       $dropdown2 = $post_data['dropdown2_2'];
       $dropdown3 = $post_data['dropdown3_2'];
       $sms = 'Hello again FIRST_NAME thanks again for ' . $dropdown1 . ' ' . $company_name . '. If you haven’t had a chance yet, please ' . $dropdown2 . ' at ' . $url . '  ' . $dropdown3;
       $parent_type = 'text';
       $child_type = 'sms2';
    }
    elseif($text == 'text3')
    {
       $dropdown1 = $post_data['dropdown1_3'];
       $dropdown2 = $post_data['dropdown2_3'];
       $dropdown3 = $post_data['dropdown3_3'];
       $sms = 'Thank you again FIRST_NAME for your support in ' . $dropdown1 . ' ' . $company_name . '. If you haven’t had a chance yet, don’t forget to ' . $dropdown2 . ' at ' . $url . '  ' . $dropdown3 . '. If you had already, don’t forget to send us a screenshot with your information by email!';
       $parent_type = 'text';
       $child_type = 'sms3';
    }
    //msg prepared now send it//

    foreach($receiver_data as $receiver_id)
    {
      ///////////////pushing sms jobs into queue to be sent///////////////
      ////////////////////////////////////////////////////////////////////
      $receiver=DB::table('company_csv')->where('id',$receiver_id)->get(['firstname','phone']);
      $first_name=$receiver[0]->firstname;
      $phone=$receiver[0]->phone;
      $sms_to_send=str_replace('FIRST_NAME',$first_name,$sms);
      $msg=array('phone'=>$phone,'sms'=>$sms_to_send,'company_id'=>$company_id,'csv_id'=>$receiver_id,'child_type'=>$child_type,'first_name'=>$first_name);
      SendSms::dispatch($msg);  //queue dispatch job function//
    }
    Artisan::call('queue:work');
  }
  public static function send_set_to_sms_queue($post_data)
  {
    $company_csv_ids=$post_data['company_csv_ids'];
    $company_csv=explode(', ',$company_csv_ids);
    $sms=$post_data['message_body'];
    $company_id=$post_data['company'];
    $child_type=$post_data['ss_type'];
    $child_type=str_replace('text', 'sms', $child_type);
    foreach($company_csv as $receiver_id)
    {
      $receiver=DB::table('company_csv')->where('id',$receiver_id)->get(['firstname','phone']);
      $first_name=$receiver[0]->firstname;
      $phone=$receiver[0]->phone;
      $sms_to_send=str_replace('FIRST_NAME',$first_name,$sms);
      $msg=array('phone'=>$phone,'sms'=>$sms_to_send,'company_id'=>$company_id,'csv_id'=>$receiver_id,'child_type'=>$child_type,'first_name'=>$first_name);
      SendSms::dispatch($msg);
    }
    Artisan::call('queue:work');
  }

}
