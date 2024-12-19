<?php

namespace App\Providers;


use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Illuminate\Support\ServiceProvider;
use BezhanSalleh\FilamentShield\Facades\FilamentShield;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\URL;
use Filament\Actions;
use Filament\Actions\Exports\ExportColumn;
use Filament\Forms\Components;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;

use Filament\Support\Facades\FilamentView;
use Filament\Tables;

use Filament\Tables\Filters\BaseFilter;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Event;

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

        Model::unguard();
        $this->autoTranslateLabels();
        FilamentView::registerRenderHook(
            PanelsRenderHook::STYLES_AFTER,
            fn(): string => Blade::render(
                '<link href="' . asset('css/custom.css') . '" rel="stylesheet" />'
            )
        );
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['th', 'en',])
                ->flags([
                    'th' => asset('images/flags/thailand-round.svg'),
                    'en' => asset('images/flags/usa-round.svg'),
                ]); // also accepts a closure
        });

        DatePicker::configureUsing(function (DatePicker $datePicker) {
            $datePicker->buddhist(['th'])->displayFormat('d/m/Y');
        });
    }
    private function autoTranslateLabels()
    {
        $this->translateLabels([
            Components\Field::class,
            BaseFilter::class,
            Components\Placeholder::class,
            Components\Fieldset::class,
            Components\Wizard\Step::class,
            Tables\Actions\CreateAction::class,
            Tables\Columns\Column::class,
            Actions\Action::class,
            Components\Tabs\Tab::class,
            Components\DatePicker::class,
            Components\Section::class,
            Components\TextInput::class,
            // or even `BaseAction::class`,
        ]);
    }

    private function translateLabels(array $components = [])
    {
        foreach ($components as $component) {
            $component::configureUsing(function ($c): void {
                if (App::isLocale('th')) {
                    $c->translateLabel();
                } else {
                    $c->label(ucwords($c->getLabel()));
                }
            });
        }
    }
}
