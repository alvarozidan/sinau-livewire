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

    public function delete(int $id)
    {
        Post::findOrFail($id)->delete();

        session()->flash('pesan', 'Post berhasil dihapus');
    }
};
?>

<div>
    {{-- We must ship. - Taylor Otwell --}}

    <h1>Daftar Post</h1>
    <small>Total post: {{ $this->posts->count() }} post</small>
    @if (session('pesan'))
        <p style="color: green">{{ session('pesan') }}</p>
    @endif

    @forelse ($this->posts as $post)
        <div wire:key='post-{{ $post->id }}'>
            <a href="{{ route('posts.show', $post) }}" wire:navigate>
                <h2>{{ $post->title }}</h2>
            </a>
            <p>{{ $post->excerpt ?: Str::limit($post->content,100) }}</p>
            <small>{{ $post->created_at->diffForHumans() }}</small>
            <a href="{{ route('posts.edit', $post) }}" wire:navigate>Edit Post</a>
            <button wire:click='delete({{ $post->id }})'
                    wire:confirm='Yakin mau hapus post ini?'>
                Hapus
            </button>
        </div>
    @empty
        <p>Belum ada post.</p>
    @endforelse
    <a href="{{ route('posts.create') }}" wire:navigate>tambah</a>
</div>
