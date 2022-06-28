<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\userTinknet;
use App\Helpers\validAPI;

class userTinknetController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function validAccount(Request $request)
    {
        if ($request->username and $request->password) {
            $kand = array($request->username, hash("md5", hash("sha256", $request->password)));
            $data = userTinknet::orderBy("username", "asc")->get();

            for ($i = 0; $i < count($data); $i++) {
                if ($data[$i]["username"] == $kand[0] and $data[$i]["password"] == $kand[1]) {
                    return validAPI::createAPI(hash("md5", $data[$i]["role"]));
                }
            }

            return validAPI::createAPI("jangan_login");
        }
        return validAPI::createAPI("undefined");
    }
}
