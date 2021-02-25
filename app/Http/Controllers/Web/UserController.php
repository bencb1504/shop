<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface;
use App\Models\User;

class UserController extends Controller
{
    public $userRepo;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepo = $userRepository;
    }
    
    public function index()
    {
        dd($this->userRepo->findById(1)->orders()->first());
    }
}
