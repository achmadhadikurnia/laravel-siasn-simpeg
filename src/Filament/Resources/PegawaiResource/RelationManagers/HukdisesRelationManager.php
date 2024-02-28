<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Artisan;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwHukdisResource;

class HukdisesRelationManager extends RelationManager
{
    protected static string $relationship = 'hukdises';

    protected static ?string $title = 'Hukdis';

    public function isReadOnly(): bool
    {
        return false;
    }

    public function form(Form $form): Form
    {
        return PnsRwHukdisResource::form($form);
    }

    public function table(Table $table): Table
    {
        return PnsRwHukdisResource::table($table)
            ->headerActions([
                Tables\Actions\Action::make('sync')
                    ->requiresConfirmation()
                    ->action(function ($livewire) {
                        Artisan::call("siasn-simpeg:pull-riwayat pns-rw-hukdis --nipBaru={$livewire->getOwnerRecord()->nip_baru}");
                    }),
            ]);
    }
}
