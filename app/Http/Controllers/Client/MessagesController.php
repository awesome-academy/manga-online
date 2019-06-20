<?php

namespace App\Http\Controllers\Client;

use App\Events\SendMessage;
use App\Http\Controllers\Controller;
use App\Models\Messages;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function getMessages()
    {
        $messages = Messages::with('user')->latest()->limit(config('paginate.client.messages'))->get();
        return response()->json($messages, 200);
    }

    public function sendMessage(Request $request)
    {
        $message = Messages::create($request->all());
        if ($message) {
            $message->load('user');
            broadcast(new SendMessage($message, $message->user))->toOthers();

            return response([
                'status' => 'success',
                'messages' => null,
                'data' => $message,
            ]);
        }

        return response([
            'status' => 'danger',
            'messages' => null,
            'data' => null,
        ]);
    }
}
