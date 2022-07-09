<?php

namespace App\Http\Controllers;

use App\Models\todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    
    public function index()
    {
        $todolists =Todolist::all();
        return view('home',compact('todolists'));
    }



    public function store(Request $request)
    {
        $data = $request->validate([
            'content' => 'required'
        ]);
        Todolist::create($data);
        return back();
    }

    
    public function destroy(todolist $todolist)
    {
        $todolist->delete();
        return back();
    }
}
