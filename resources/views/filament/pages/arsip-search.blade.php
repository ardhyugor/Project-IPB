<x-filament::page>
    <div class="space-y-6">
        {{-- Input Pencarian --}}
        <div class="flex items-center gap-2">
            <x-filament::input.wrapper class="flex-1">
                <x-filament::input wire:model.live="search" placeholder="Cari NIP atau Nama..." />
            </x-filament::input.wrapper>

            {{-- Tombol Reset --}}
            <x-filament::button wire:click="$set('search', '')" color="gray">
                Reset
            </x-filament::button>
        </div>
        <div wire:loading wire:target="search" class="text-center text-gray-500">
            <x-filament::loading-indicator class="w-6 h-6 inline-block mr-2" />
            Sedang memuat data...
        </div>

        <div class="grid grid-cols-2 gap-6">
            {{-- PNS Aktif --}}
            <x-filament::card>
                <h2 class="text-lg font-bold">PNS / CPNS Aktif</h2>
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b">
                            <th class="p-2">NIP</th>
                            <th class="p-2">Nama</th>
                            <th class="p-2">Lemari</th>
                            <th class="p-2">Laci</th>
                            <th class="p-2">Nomor Berkas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($this->pnsAktif as $row)
                            <tr class="border-b">
                                <td class="p-2">{{ $row->NIP }}</td>
                                <td class="p-2">{{ $row->NAMA }}</td>
                                <td class="p-2">{{ $row->LEMARI }}</td>
                                <td class="p-2">{{ $row->HAMBALAN }}</td>
                                <td class="p-2">{{ $row->NOMORBERKAS }}</td>
                            </tr>
                        @empty
                            <div class="border-b">
                                <td class="p-2" colspan="5">Data tidak ditemukan</td>
                            </div>
                        @endforelse
                    </tbody>
                </table>
                {{ $this->pnsAktif->links() }}
            </x-filament::card>

            {{-- PNS Pensiun --}}
            <x-filament::card>
                <h2 class="text-lg font-bold">PNS Pensiun</h2>
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b">
                            <th class="p-2">NIP</th>
                            <th class="p-2">Nama</th>
                            <th class="p-2">Lemari</th>
                            <th class="p-2">Laci</th>
                            <th class="p-2">Nomor Berkas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($this->pnsPensiun as $row)
                            <tr class="border-b">
                                <td class="p-2">{{ $row->NIP }}</td>
                                <td class="p-2">{{ $row->NAMA }}</td>
                                <td class="p-2">{{ $row->LEMARI }}</td>
                                <td class="p-2">{{ $row->LACI }}</td>
                                <td class="p-2">{{ $row->KODEBERKAS }}</td>
                            </tr>
                        @empty
                            <tr class="border-b text-center">
                                <td class="p-2" colspan="5">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $this->pnsPensiun->links() }}
            </x-filament::card>

            {{-- Non PNS Tetap --}}
            <x-filament::card>
                <h2 class="text-lg font-bold">Non PNS Tenaga Tetap</h2>
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b">
                            <th class="p-2">NIP</th>
                            <th class="p-2">Nama</th>
                            <th class="p-2">Lemari</th>
                            <th class="p-2">Laci</th>
                            <th class="p-2">Nomor Berkas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($this->nonPnsTetap as $row)
                            <tr class="border-b">
                                <td class="p-2">{{ $row->NIP }}</td>
                                <td class="p-2">{{ $row->NAMA }}</td>
                                <td class="p-2">{{ $row->LEMARI }}</td>
                                <td class="p-2">{{ $row->LACI }}</td>
                                <td class="p-2">{{ $row->KODEBERKAS }}</td>
                            </tr>
                        @empty
                            <tr class="border-b text-center">
                                <td class="p-2" colspan="5">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $this->nonPnsTetap->links() }}
            </x-filament::card>

            {{-- Non PNS Kontrak --}}
            <x-filament::card>
                <h2 class="text-lg font-bold">Non PNS Tenaga Kontrak</h2>
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b">
                            <th class="p-2">NIP</th>
                            <th class="p-2">Nama</th>
                            <th class="p-2">Lemari</th>
                            <th class="p-2">Laci</th>
                            <th class="p-2">Nomor Berkas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($this->nonPnsKontrak as $row)
                            <tr class="border-b">
                                <td class="p-2">{{ $row->NIP }}</td>
                                <td class="p-2">{{ $row->NAMA }}</td>
                                <td class="p-2">{{ $row->LEMARI }}</td>
                                <td class="p-2">{{ $row->LACI }}</td>
                                <td class="p-2">{{ $row->KODEBERKAS }}</td>
                            </tr>
                        @empty
                            <tr class="border-b text-center">
                                <td class="p-2" colspan="5">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $this->nonPnsKontrak->links() }}
            </x-filament::card>
        </div>
    </div>
</x-filament::page>