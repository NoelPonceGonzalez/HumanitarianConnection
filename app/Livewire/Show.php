<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class Show extends Component
{
    public $post;

    public function mount()
    {
        $postId = request()->route('post'); // Obtener el postId de la URL
        $this->post = Post::findOrFail($postId);
    }

    public function render()
    {
        return view('livewire.show');
    }
}