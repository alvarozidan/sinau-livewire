<?php

use Livewire\Attributes\Layout;
use Livewire\Component;

new class extends Component
{
    public string $title = '';
    public string $content = '';

    public function save()
    {
        $this->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        dd($this->title, $this->content);
    }
};
?>

<div>
    {{-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci --}}
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

    <button type='submit'>Save</button>

    </form>
</div>
