<?php

namespace App\Providers\Filament;

use App\Filament\Widgets\BlogPostsChart;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Devonab\FilamentEasyFooter\EasyFooter;
use Devonab\FilamentEasyFooter\EasyFooterPlugin;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->brandName('Layanan Arsip IPB')
            ->profile(isSimple: false)
            ->login()
            ->spa()
            ->sidebarCollapsibleOnDesktop()
            ->renderHook(
                'sidebar.end',
                fn() => view('partials.footer')
            )
            ->colors([
                'primary' => '#08457aff',
                'gray' => '#0D8AF5',
                'secondary' => '#6B7280',
                'danger' => '#DC2626',
                'success' => '#16A34A',
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->plugins([
                EasyFooterPlugin::make()
                    ->withLinks(
                        [
                            ['title' => 'About', 'url' => 'https://example.com/about'],
                            ['title' => 'CGV', 'url' => 'https://example.com/cgv'],
                            ['title' => 'Privacy Policy', 'url' => 'https://example.com/privacy-policy']
                        ]
                    )
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([


                BlogPostsChart::class, // Widget Chart
                \App\Filament\Widgets\AgendaBerkasPerBulan::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->plugins([
                FilamentShieldPlugin::make(),
                
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
