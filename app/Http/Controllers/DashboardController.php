<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $uss=\App\Models\User::query()->orderBy("created_at","DESC")->limit(5)->get();
        $comments=\App\Models\Comment::query()->with(["author","post"])->orderBy("created_at","DESC")->limit(6)->get();
        return view("panel.dashboard",["title"=>"Form","uss"=>$uss,"comments"=>$comments]);
    }
}
