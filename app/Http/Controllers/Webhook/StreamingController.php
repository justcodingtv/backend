<?php

namespace App\Http\Controllers\Webhook;

use App\Models\StreamingUser;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Webhook\Stream\StartStreamRequest;

class StreamingController extends Controller
{
    public function startStream (StartStreamRequest $request)
    {
        $user = User::where('uuid', $request->get('name'))->firstOrFail();

        if ($request->get('key') === $user->livestreamingKey->streaming_key) {
            $streaming_users = new StreamingUser();

            $streaming_users->addUser($user->id);

            return response(null, 200);
        }

        return response(null, 401);
    }

    public function stopStream (StartStreamRequest $request)
    {
        $user = User::where('uuid', $request->get('name'))->firstOrFail();

        if ($request->get('key') === $user->livestreamingKey->streaming_key) {
            $streaming_users = new StreamingUser();

            $streaming_users->removeUser($user->id);

            return response(null, 200);
        }

        return response(null, 401);
    }
}