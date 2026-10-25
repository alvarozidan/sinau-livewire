<?php

use Livewire\Component;

use App\Models\Post;

new class extends Component
{
    public Post $post;

    public string $title = '';
    public string $content = '';
    public string $excerpt = '';

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->excerpt = $post->excerpt ?? '';
    }

    public function update()
    {
        $validated = $this->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'excerpt' => 'nullable|max:255',
        ]);

        $this->post->update($validated);

        session()->flash('pesan', 'Post berhasil diupdate');

        $this->redirectRoute('posts.index', navigate: true);
    }
};
?>

<div>
    {{-- Simplicity is the consequence of refined emotions. - Jean D'Alembert --}}
    <h1>Edit Post</h1>

    <form wire:submit='update'>
        <input type="text" wire:model='title'>
        @error('title')
            <span style="color: red">{{ $message }}</span>
        @enderror

        <textarea wire:model='content' rows='5'></textarea>
        @error('content')
        <span style="color: red">{{ $message }}</span>
        @enderror

        <input type="text" wire:model='excerpt'>
        @error('excerpt')
            <span style="color: red">{{ $message }}</span>
        @enderror

        <button type="submit">Update</button>

    </form>
</div>
