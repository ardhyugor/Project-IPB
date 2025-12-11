<?php

namespace App\Filament\Traits;

use Filament\Tables;
use Illuminate\Support\Facades\Storage;

trait HasLihatBerkasAction
{
    public static function getLihatBerkasAction(): Tables\Actions\Action
    {
        return Tables\Actions\ViewAction::make('lihat_berkas')
                    ->label('Lihat Berkas')
                    ->modalHeading('Daftar File Data Scan')
                    ->modalWidth('3xl')
                    ->action(function ($record, $livewire) {
                        // ga perlu action di sini, kita pake modalContent
                    })
                    ->modalContent(function ($record) {
                        $basePath = 'DataScan';
                        $folders = Storage::disk('public')->directories($basePath);
                        // cari folder berdasarkan NIP atau NAMA

                        $keyword = $record->NIP;

                        $matchedFolder = collect($folders)->first(function ($folder) use ($keyword) {
                            return str_contains(strtolower($folder), strtolower($keyword));
                        });
                        // dd($matchedFolder);

 
                        if (!$matchedFolder) {
                            return new \Illuminate\Support\HtmlString('<p class="text-gray-500">Tidak ditemukan folder untuk NIP/Nama ini.</p>');
                        }

                        $files = Storage::disk('public')->files($matchedFolder);
                        // dd($files);

                        if (empty($files)) {
                            return new \Illuminate\Support\HtmlString('<p class="text-gray-500">Folder ditemukan, tapi tidak ada file di dalamnya.</p>');
                        }

                        $html = '<ul class="list-disc pl-5 space-y-2">';
                        foreach ($files as $path) {
                            $url = Storage::url($path);
                            $name = basename($path);
                            $html .= "<li><a href='{$url}' target='_blank' class='text-blue-600 hover:underline'>{$name}</a></li>";
                        }
                        $html .= '</ul>';

                        return new \Illuminate\Support\HtmlString($html);
                    })
                    ->color('success');
    }
}
