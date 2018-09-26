<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\File;
use Twilio\Rest\Client;
use DB;
use app\Exceptions\Handler;
class SendSms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $msg_data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($msg) //construct received job eg: store in the db in jobs table//
    {
        //set recieved data//
        $this->msg_data=$msg;
    }

    //Execute the job.//

    //  @return void

    public function handle()
    {
      //queue item executiong//
          $job=$this->msg_data;
          $sender="(754) 208-1880";
          $phone=$job['phone'];
          $msg=$sms=$job['sms'];
          $csv_id=$job['csv_id'];
          $company_id=$job['company_id'];
          $child_type=$job['child_type'];
          $first_name=$job['first_name'];
          $sid="AC6379ecee21eae81429b38b3b2a1fbf4f";
          $token="2187fb286b3378e25e00467594c7a296";
          try
          {
            if(!empty($phone))
            {
            $client=new Client($sid,$token);
            $sms=$client->messages->create($phone,array('from' => $sender,'body' => $sms));
            $message_sid = $sms->sid;
            $message = $client->messages($message_sid)->fetch();
            $status = $message->status;
            $phone = $message->to;
            $uri = $message->uri;
            $date = $message->dateSent->format('Y-m-d H:i:s');
            }
            else
            {
              $status='failed';
            }
            /////////////////////////////////////////////
            /////////////////////////////////////////////
            /////////////////////////////////////////////
            if($status == 'sent' || $status == 'delivered' || $status == 'queued' || $status == 'sending')
            {

                $status_to_save="delivered";
                $count=DB::table('sms_email_reports')->where('company_id',$company_id)->where('csv_id',$csv_id)->where('is_active',1)->count();
                if($count==0)
                {
                  if($child_type == 'sms1'){$sms_status='sms1_status'; $sms_timestamp='sms1_timestamp';}
                  if($child_type == 'sms2'){$sms_status='sms2_status'; $sms_timestamp='sms2_timestamp';}
                  if($child_type == 'sms3'){$sms_status='sms3_status'; $sms_timestamp='sms3_timestamp';}
                  DB::table('sms_email_reports')
                  ->insert
                  ([
                    'company_id'=>$company_id,
                    'csv_id'=>$csv_id,
                    'phone' => $phone,
                    'name'=>$first_name,
                    "$child_type"=>$msg,
                    "$sms_status"=>$status_to_save,
                    "$sms_timestamp"=>$date,
                    'is_active'=>1
                  ]);
                }
                else
                {
                  if($child_type == 'sms1'){$sms_status='sms1_status'; $sms_timestamp='sms1_timestamp';}
                  if($child_type == 'sms2'){$sms_status='sms2_status'; $sms_timestamp='sms2_timestamp';}
                  if($child_type == 'sms3'){$sms_status='sms3_status'; $sms_timestamp='sms3_timestamp';}
                  DB::table('sms_email_reports')->where('company_id',$company_id)->where('csv_id',$csv_id)->where('is_active',1)
                 ->update
                 ([
                   'phone' => $phone,
                   'name'=>$first_name,
                   "$child_type"=>$msg,
                   "$sms_status"=>$status_to_save,
                   "$sms_timestamp"=>$date
                 ]);
             }
              $date=strtotime($date);
              $month=date('m',$date);
              $year=date('Y',$date);
              // sms counter
              $count_sc=DB::table('sms_counter')->where('company_id',$company_id)->where('sc_month',$month)->where('sc_year',$year)->count();
              if($count_sc > 0 )
               {
                  DB::table('sms_counter')
                  ->where('company_id',$company_id)
                  ->where('sc_month',$month)
                  ->where('sc_year',$year)
                  ->update
                  ([
                    'sc_counter'=>DB::raw('sc_counter+1')
                  ]);
               }
               else
               {
                 DB::table('sms_counter')->insert
                 ([
                   'company_id'=>$company_id,
                   'sc_counter'=>1,
                   'sc_month'=>$month,
                   'sc_year'=>$year
                 ]);
               }
         //////////////////////////////////////////////////////////////////////////////
         //////////////////////////////////////////////////////////////////////////////
         //////////////////////////////////////////////////////////////////////////////
          }
        }
         catch(\Exception $e)
          {
            $error_code=$e->getCode();
            if($error_code==21211 or $error_code==21401 or $error_code==21421 or $error_code==21451 or $error_code==21614)
             {
               DB::table('company_csv')->where('id',$csv_id)->update(['phone'=>NULL]);
             }

          }
    }
}
