<?php

namespace App\Http\Controllers;

use App\Models\USER;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class UserController extends Controller
{
    public function login(Request $request)
    {

        $user = USER::where('EMAIL', $request->email)->first();

        if ($user != null) {
            $pass = DB::select('select AES_DECRYPT((SELECT PASS FROM USER WHERE COD_USER=?),?)', [$user->COD_USER, $user->USERNAME])[0];
            foreach ($pass as $key => $value) {

                $userPass = $value;
            }

            if ($request->password == $userPass) {
                session(['COD_USER' => $user->COD_USER]);
                $request->session()->put('COD_USER', $user->COD_USER);
                return redirect()->route('listgame.viewList');
            } else {


                return redirect()->route('login');
            }
        } else {

            return redirect()->route('login');
        }
    }

    public function register(Request $request)
    {

        try {
            DB::insert('insert into USER (USERNAME, PASS , EMAIL) values (?,AES_ENCRYPT(?,?), ?)', [$request->username,$request->password,$request->username, $request->email]);
            return redirect()->route('login');
        } catch (\Illuminate\Database\QueryException $ex) {
            $message='El usuario o el email ya existen';
            return redirect()->route('register.message',$message);
        }


    }

    public function logout()
    {

        session(['COD_USER' => ""]);

        return redirect()->route('login');

    }

    public function registerMessage($message){

        return view('forms.register',['message'=>$message]);

    }
}
