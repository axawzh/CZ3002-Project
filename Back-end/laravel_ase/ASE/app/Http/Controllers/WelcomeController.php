<?php
namespace App\Http\Controllers;

class WelcomeController extends Controller {
    public function index() {
        if (auth()->check()) {
            return redirect('/home');
        }
        else {
            return view('welcome');
        }
    }
}