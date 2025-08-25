<x-filament::page>
    <div class="space-y-6">
        {{-- Input Pencarian --}}
        <div>
            <x-filament::input.wrapper>
                <x-filament::input
                    wire:model.debounce.500ms="search"
                    placeholder="Cari NIP atau Nama..."
                />
            </x-filament::input.wrapper>
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
                        @foreach ($this->pnsAktif as $row)
                            <tr class="border-b">
                                <td class="p-2">{{ $row->NIP }}</td>
                                <td class="p-2">{{ $row->NAMA }}</td>
                                <td class="p-2">{{ $row->LEMARI }}</td>
                                <td class="p-2">{{ $row->HAMBALAN }}</td>
                                <td class="p-2">{{ $row->NOMORBERKAS }}</td>
                            </tr>
                        @endforeach
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
                        @foreach ($this->pnsPensiun as $row)
                            <tr class="border-b">
                                <td class="p-2">{{ $row->NIP }}</td>
                                <td class="p-2">{{ $row->NAMA }}</td>
                                <td class="p-2">{{ $row->LEMARI }}</td>
                                <td class="p-2">{{ $row->LACI }}</td>
                                <td class="p-2">{{ $row->KODEBERKAS }}</td>
                            </tr>
                        @endforeach
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
                        @foreach ($this->nonPnsTetap as $row)
                            <tr class="border-b">
                                <td class="p-2">{{ $row->NIP }}</td>
                                <td class="p-2">{{ $row->NAMA }}</td>
                                <td class="p-2">{{ $row->LEMARI }}</td>
                                <td class="p-2">{{ $row->LACI }}</td>
                                <td class="p-2">{{ $row->KODEBERKAS }}</td>
                            </tr>
                        @endforeach
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
                        @foreach ($this->nonPnsKontrak as $row)
                            <tr class="border-b">
                                <td class="p-2">{{ $row->NIP }}</td>
                                <td class="p-2">{{ $row->NAMA }}</td>
                                <td class="p-2">{{ $row->LEMARI }}</td>
                                <td class="p-2">{{ $row->LACI }}</td>
                                <td class="p-2">{{ $row->KODEBERKAS }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $this->nonPnsKontrak->links() }}
            </x-filament::card>
        </div>
    </div>
</x-filament::page>
