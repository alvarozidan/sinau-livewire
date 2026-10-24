<?php

use Livewire\Component;
use Livewire\Attributes\Computed;

use App\Models\Post;

new class extends Component
{
    #[Computed]
    public function posts()
    {
        return Post::latest()->get();
    }
};
?>

<div>
    {{-- We must ship. - Taylor Otwell --}}

    <h1>Daftar Post</h1>
    <small>Total post: {{ $this->posts->count() }} post</small>

    @forelse ($this->posts as $post)
        <div wire:key='post-{{ $post->id }}'>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->excerpt ?: Str::limit($post->content,100) }}</p>
            <small>{{ $post->created_at->diffForHumans() }}</small>
        </div>
    @empty
        <p>Belum ada post.</p>
    @endforelse
    <a href="{{ route('post.create') }}" wire:navigate>tambah</a>
</div>
