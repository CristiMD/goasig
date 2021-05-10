<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;


class UsersController extends Controller
{

    public function index()
    {
        $users = User::all();
        return $users;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function numara()
    {
        $users = User::count();
        return $users;
    }

    public function cont()
    {
        return view('contul-meu');
    }

}
