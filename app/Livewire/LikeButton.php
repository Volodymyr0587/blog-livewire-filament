<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class LikeButton extends Component
{
    public Post $post;

    public function toggleLike()
    {
        if (auth()->guest()) {
            return $this->redirect(route('login'), true);
        }

        $user = auth()->user();

        $hasLiked = $user->likes()->where('post_id', $this->post->id)->exists();

        if ($hasLiked) {
            $user->likes()->detach($this->post);
            return;
        }

        $user->likes()->attach($this->post);
    }

    public function render()
    {
        return view('livewire.like-button');
    }
}
