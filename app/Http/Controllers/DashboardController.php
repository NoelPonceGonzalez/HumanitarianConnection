<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtener todos los posts desde la base de datos
        $posts = Post::all();
        
        // Pasar los posts a la vista
        return view('dashboard', compact('posts'));
    }
}
