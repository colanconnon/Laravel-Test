<?php

namespace App\Http\Middleware;

use App\ApiManagement;
use Closure;

class HMacMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


        if(!empty($request->input('public_key'))) {
            $input = $request->input('public_key');
            $hashedData = $request->input('hashed_data');
            //we need to get the public key to retrieve the private key
            $apiItem = ApiManagement::where('public_api_key', $input)->first();
            //then hash the data and see if it matches the data given
            $serverHash = hash_hmac("sha256", json_encode($request->input('public_key')),$apiItem->private_api_key);
            if($serverHash === $hashedData) {
                return $next($request);
            } else {
                dd(['serverHash' => $serverHash, 'hashedData'=> $hashedData]);
                abort('401', 'Not Authorized');
            }

            //if so the api request is valid so let it succeed.
        } else {
            abort('401', 'Not Authorized');
        }

    }
}
