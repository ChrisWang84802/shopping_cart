<?php

namespace App\Http\Controllers;
use View;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class UserdataController extends Controller
{
    use ValidatesRequests;
    public function show(){
        $users = User::all();
     	return $users;
	}
    public function index($users){
        return User::find($users);
    }
    public function logout(){
    
    }
}
