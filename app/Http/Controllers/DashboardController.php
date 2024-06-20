<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $users = [
            [
                "name" => "Guilherme",
                "age" => 23,
            ],
            [
                "name"=> "Pietro",
                "age"=> 9,
            ]
        ];


        return view("dashboard", ["users" => $users]);
    }
}
