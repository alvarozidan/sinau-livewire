<?php

use Livewire\Attributes\Layout;
use Livewire\Component;

use App\Models\Post;

new class extends Component
{
    public string $title = '';
    public string $content = '';
    public string $excerpt = '';

    public function save()
    {
        $validated = $this->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'excerpt' => 'nullable|max:255',
        ]);

        Post::create($validated);
        $this->reset(['title', 'content', 'excerpt']);

        session()->flash('pesan', 'Post berhasil disimpan');
    }
};
?>

<div>
    {{-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci --}}
    @if (session('pesan'))
        <p style="color: green;">{{ session('pesan') }}</p>
    @endif

    <form wire:submit='save'>
    <label>
        Title
        <input type="text" wire:model='title'>
        @error('title')
            <span style="color: red;">{{ $message }}</span>
        @enderror
    </label>

    <label>
        Content
        <textarea wire:model='content' rows='5'></textarea>
        @error('content')
            <span style='color: red;'>{{ $message }}</span>
        @enderror
    </label>

    <label>
        Excerpt
        <textarea wire:model='excerpt' rows='5'></textarea>
        @error('excerpt')
            <span style='color: red;'>{{ $message }}</span>
        @enderror
    </label>

    <button type='submit'>Save</button>

    </form>
    <a href="/posts">index</a>
</div>
