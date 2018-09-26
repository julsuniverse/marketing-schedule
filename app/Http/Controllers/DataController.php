<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;
use App\SendToQueue;
use Twilio\Rest\Client;
use app\Exceptions\Handler;
class DataController extends BaseController
{
    public function get_data(Request $request)
    {
      $post_data=$request->all()['post_data']; //get all data from post request//
      $post_data=json_decode($post_data,true);
      if(isset($post_data['send_selected']))
      {
        SendToQueue::send_to_sms_queue($post_data);
        return 'success';
      }
      elseif(isset($post_data['send_set']))
      {
        SendToQueue::send_set_to_sms_queue($post_data);
        return 'success';
      }

    }
}
