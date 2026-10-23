<?php

use Livewire\Component;

new class extends Component
{
    public int $count = 0;

    public function increment()
    {
        $this->count++;
    }
};
?>

<div class="flex flex-col items-center gap-4 p-10">
    {{-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh --}}
    <h1 class="text-3xl font-bold">Angka: {{ $count }}</h1>
    <button wire:click='increment' class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">Tambah Angka</button>
</div>
