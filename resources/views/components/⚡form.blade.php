<?php

use Livewire\Component;
use Livewire\Attributes\Layout;

new class extends Component
{
    public string $nama = '';

    public function simpan()
    {
        $this->validate([
            'nama' => 'required|max:255',
        ]);

        session()->flash('pesan', 'Nama berhasil disimpan');
    }
};
?>

<div class="flex felx-col items-center gap-4 p-10">
    {{-- Because you are alive, everything is possible. - Thich Nhat Hanh --}}
    <input type="text" wire:model='nama' placeholder="Ketik nama anda" class="rounded border px-3 py-2">

    @error('nama')
        <span class="text-red-600"> {{ $message }}</span>
    @enderror

    <p>Halo, {{ $nama }}</p>
    <button wire:click='simpan' class="rounded bg-blue-600 px-4 py-2 text=-white hover:bg-blue-700">
        Kirim
    </button>

    @if (session('pesan'))
        <p class="text-green-600">{{ session('pesan') }}</p>
    @endif
</div>
