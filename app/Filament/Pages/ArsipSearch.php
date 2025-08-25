<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Livewire\WithPagination;
use App\Models\ArsipPersonalPnsAktif;
use App\Models\ArsipPersonalPnsPensiun;
use App\Models\ArsipPersonalNonPnsTetap;
use App\Models\ArsipPersonalNonPnsKontrak;

class ArsipSearch extends Page
{
    use WithPagination;

    protected static ?string $navigationIcon = 'heroicon-o-magnifying-glass';
    protected static string $view = 'filament.pages.arsip-search';
    protected static ?string $title = 'Pencarian Arsip';

    public string $search = '';

    // reset pagination setiap kali keyword berubah
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function getPnsAktifProperty()
    {
        return ArsipPersonalPnsAktif::query()
            ->when($this->search, fn($q) =>
                $q->where(fn($sub) =>
                    $sub->where('NAMA', 'like', "%{$this->search}%")
                        ->orWhere('NIP', 'like', "%{$this->search}%")
                )
            )
            ->paginate(10, ['*'], 'pnsAktifPage');
    }

    public function getPnsPensiunProperty()
    {
        return ArsipPersonalPnsPensiun::query()
            ->when($this->search, fn($q) =>
                $q->where(fn($sub) =>
                    $sub->where('NAMA', 'like', "%{$this->search}%")
                        ->orWhere('NIP', 'like', "%{$this->search}%")
                )
            )
            ->paginate(10, ['*'], 'pnsPensiunPage');
    }

    public function getNonPnsTetapProperty()
    {
        return ArsipPersonalNonPnsTetap::query()
            ->when($this->search, fn($q) =>
                $q->where(fn($sub) =>
                    $sub->where('NAMA', 'like', "%{$this->search}%")
                        ->orWhere('NIP', 'like', "%{$this->search}%")
                )
            )
            ->paginate(10, ['*'], 'nonPnsTetapPage');
    }

    public function getNonPnsKontrakProperty()
    {
        return ArsipPersonalNonPnsKontrak::query()
            ->when($this->search, fn($q) =>
                $q->where(fn($sub) =>
                    $sub->where('NAMA', 'like', "%{$this->search}%")
                        ->orWhere('NIP', 'like', "%{$this->search}%")
                )
            )
            ->paginate(10, ['*'], 'nonPnsKontrakPage');
    }
}
