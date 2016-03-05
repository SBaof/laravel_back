<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Mail;
use Storage;

class MailController extends Controller
{
    //
    public function send(Request $request)
    {
        $name = 'SBaof';
        $flag = Mail::send('emails.test',
            ['name' => $name],
            function ($message) {
                $to = '184040280@qq.com';
                $message->to($to)->subject('测试haha');

                $attachment = storage_path('app/files/xxx.docx');
                $message->attach($attachment, ['as' => 'xxx.docx']);
                // 解决中文编码问题
                // $message->attach($attachment,['as'=>"=?UTF-8?B?".base64_encode('测试文档')."?=.doc"]);
            }
        );

        if ($flag)
        {
            echo "success", "\n";
        }
        else
        {
            echo "failed", "\n";
        }
    }
}
