<?php

namespace App\Models;
/**
 * Created by PhpStorm.
 * User: sigfried
 * Date: 09.03.18
 * Time: 22:05
 */

use Illuminate\Support\Facades\Redis;

class StreamingUser
{
    private $redis_key;

    public function __construct ()
    {
        $this->redis_key = config('justcoding.redis_live_users_key');
    }

    public function getUsers ()
    {
        return (array) Redis::smembers($this->redis_key);
    }

    /**
     * @param integer $user_id
     */
    public function addUser ($user_id)
    {
        Redis::sadd($this->redis_key, $user_id);
    }

    /**
     * @param integer $user_id
     */
    public function removeUser ($user_id)
    {
        Redis::srem($this->redis_key, $user_id);
    }
}