<?php

use Livewire\Component;

use App\Models\Post;

new class extends Component
{
    public Post $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

};
?>

<div>
    {{-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead --}}
    <h1>{{ $post->title }}</h1>
    <h3>{{ $post->excerpt }}</h3>
    <div>
        <p>{{ $post->content }}</p>
        <small>{{ $post->created_at->format('d M Y') }}</small>
    </div>

    <div>
        <a href="{{ route('posts.index') }}" wire:navigate>Kembali</a>
        <a href="{{ route('posts.edit', $post) }}" wire:navigate>Edit</a>
    </div>
</div>
