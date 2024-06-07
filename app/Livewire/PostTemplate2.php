<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Http\Request; // Agrega esta línea para importar la clase Request
use App\Models\Post;

class PostTemplate2 extends Component
{
    public $title;
    public $email;
    public $description;
    public $description1;
    public $description2;

    public function render()
    {
        $this->title = request()->query('title');
        $this->email = request()->query('email');
        $this->description = request()->query('description');
        return view('livewire.post-template2');
    }

    public function savePost(Request $request)
    {
        // Guardar la imagen en el servidor
        $imagePath = 'public/images';
    
        // Crear un nuevo post
        $post = new Post();
        $post->title = $this->title;
        $post->email = $this->email;
        $post->email = $this->email;
        $post->description = $this->description;
        $post->description1 = $this->description1; 
        $post->description2 = $this->description2;  
        $post->image = $imagePath;
        $post->template = "template2";
        $post->likes = "0";
        
        $post->save();
        // Redirigir a la página de dashboard o a donde necesites
        return redirect()->route('dashboard')->with('success', 'Post created successfully!');
    }    
}
