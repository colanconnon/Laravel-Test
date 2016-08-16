<?php
/**
 * Created by PhpStorm.
 * User: colanconnan
 * Date: 8/16/16
 * Time: 10:26 AM
 */

namespace app\Listeners;


use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserLoginListener
{
    public function onUserLogin()
    {
        Auth::user()->email;

        Storage::prepend('file.log',"User logged in " . Auth::user()->email);
    }
}