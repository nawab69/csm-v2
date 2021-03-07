<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetchMessages($id)
    {
         return Message::with('user')->where('trade_id',$id)->get();
    }

    public function sendMessage(Request $request)
    {
        if(request()->has('file')){
            $filename = request('file')->store('chat');
            $message=Message::create([
                'user_id' => request()->user()->id,
                'image' => $filename,
                'receiver_id' => request('receiver_id')
            ]);
        }else{
            $message = auth()->user()->messages()->create(['message' => $request->message,'trade_id' => $request->trade]);
        }
        broadcast(new MessageSent(auth()->user(),$message->load('user'),$request->trade))->toOthers();

        return response(['status'=>'Message sent successfully','message'=>$message]);
    }
}
