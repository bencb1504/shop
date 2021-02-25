<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Repositories\User\UserRepositoryInterface;
use URL;
use Session;

class LoginController extends Controller
{
    public $userRepo;

    public function __construct(UserRepositoryInterface $userRepoInterface)
    {
        $this->userRepo = $userRepoInterface;
    }

    public function index()
    {
        Session::put('backUrl', URL::previous());

        return view('web.login');
    }

    public function login(Request $request)
    {
        
        // $data = [
        //     'username' => $request->username,
        //     'password' => Hash::make($request->password),
        // ];

        // if (!Auth::check()) {
        //     $data['email'] = $request->email;
        // }
        $credentials = request()->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
        //     dd($user);
        // // $user = $this->userRepo->create($data);
        //     Auth::login($user);
        } else {
            dd(1);
        }

        if (Session::get('backUrl')) {
            return redirect(Session::get('backUrl'));
        }

        return route('web.index');
    }

    public function logOut()
    {
        if(Auth::check()) {
            Auth::logout();
        }

        return redirect()->route('web.index');
    }
}
