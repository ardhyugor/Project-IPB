<div class="flex justify-end mb-4">
    <x-filament::button wire:click="toggleViewBtn">
        📊 Ubah ke Chart
    </x-filament::button>
</div>

<?php
class RekapitulasiTabel extends Component
{
    public function getData()
    {
        return LayananBerkas::select('TAHUN', 'BULAN')
            ->selectRaw('COUNT(*) AS total')
            ->groupBy('TAHUN', 'BULAN')
            ->get();
    }

    public function render()
    {
        return view('filament.widgets.rekapitulasi-tabel', [
            'rows' => $this->getData(),
        ]);
    }
}
