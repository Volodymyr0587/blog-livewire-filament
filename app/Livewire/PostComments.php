<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Component;

class PostComments extends Component
{

    public Post $post;

    #[Computed()]
    public function comments()
    {
        return $this?->post->comments;
    }
    public function render()
    {
        return view('livewire.post-comments');
    }
}
