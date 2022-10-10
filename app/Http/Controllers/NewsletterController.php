<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use App\Services\EmailServices;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function store()
    {
        $attributes=request()->validate([
           "email"=>"required|email|unique:newsletters,email"
        ]);
        Newsletter::create($attributes);
        return back()->with("success","You have registered in newsletter!");
    }

    public function create()
    {
        return view("panel.newsletter");
    }

    public function send()
    {
        $attributes= request()->validate([
            "title"=>"required|min:3",
            "body"=>"required|min:3"
        ]);

        foreach (Newsletter::all("email") as $email){
            EmailServices::send($attributes["title"],$attributes["body"],$email);
        }
        return back()->with("success","The email has been sent to the registered users!");
    }
}
