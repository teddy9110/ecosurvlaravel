<?php

namespace App\Http\Controllers;

use App\Models\Park;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function associate(Request $request, User $user){
        // Had to stop here as my laravel isntance refused to connect to the DB anymore 
        $park = Park::updateOrCreate(['location' => strtolower($request->location)]);
        $user->parks()->save($park);
        dd($user);
    }
}
