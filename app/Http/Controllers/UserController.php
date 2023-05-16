<?php

namespace App\Http\Controllers;

use App\Library\Roles;
use App\Library\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class UserController extends Controller {
    

    function list(Request $request){

        $query = User::query();

        $query->when($request->keyword, function(Builder $query, $keyword){
            $query->where('name', 'LIKE', "%$keyword%")->orWhere('email', 'LIKE', "%$keyword%");
        });

        $users = $query->isAUser()->get();

        return view('users', [
            'users' => $users
        ]);
    }

    function update(Request $request){  
        
    }

}
