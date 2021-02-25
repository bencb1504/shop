<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Repositories\User\UserRepositoryInterface;

class CartController extends Controller
{
    public $userRepo;

    public function __construct(UserRepositoryInterface $userRepoInterface)
    {
        $this->userRepo = $userRepoInterface;
    }

    public function index()
    {
        return view('web.cart');
    }
}
