<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $users = [
            [
                'name' => 'Alex',
                'age' =>'30',
            ],
            [
                'name' => 'Yassine',
                'age' =>'22',
            ],
            [
                'name' => 'Salma',
                'age' =>'17',
            ]
        ];


        return view('dashboard' ,['users' => $users]);
    }
}
