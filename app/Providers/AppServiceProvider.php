<?php

namespace App\Providers;

use Filament\Forms\Components\TextInput;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        TextInput::macro('revealOnMouseOver', function () {
            /** @var TextInput $this */
            return $this->autocomplete('false')
                ->extraInputAttributes([
                    'class' => 'key',
                    'x-on:focus' => "\$el.classList.remove('key')",
                    'x-on:mouseover' => "\$el.classList.remove('key')",
                    'x-on:blur' => "\$el.classList.add('key')",
                    'x-on:mouseout' => "\$el.classList.add('key')",

                ]);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        FilamentView::registerRenderHook(
            PanelsRenderHook::STYLES_AFTER,
            fn(): string => Blade::render(
                '<link href="' . asset('css/custom.css') . '" rel="stylesheet" />'
            )
        );
    }
}
