<?php

namespace App\Helpers;
use Request;
use App\Models\Log_activities as LogActivityModel;
  
  
class LogActivity
{
  
  
    public static function addToLog($subject)
    {
        $log = [];
        $log['subject'] = $subject;
        $log['url'] = Request::fullUrl();
        $log['method'] = Request::method();
        $log['agent'] = Request::header('user-agent');
        $log['user_id'] = auth()->check() ? auth()->user()->id : 1;
        LogActivityModel::create($log);
    }
  
  
    public static function logActivityLists()
    {
        return LogActivityModel::latest()->get();
    }
  
  
}