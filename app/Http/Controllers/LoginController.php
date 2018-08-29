<?php

namespace App\Http\Controllers;
use View;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use ValidatesRequests;
    public function show(){
        $users = User::all();
     	return $users;
	}
    public function index(User $users){
        return $users;
    }
    public function logout(){
    
    }
}
