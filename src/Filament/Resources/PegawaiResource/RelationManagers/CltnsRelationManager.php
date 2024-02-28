<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Artisan;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwCltnResource;

class CltnsRelationManager extends RelationManager
{
    protected static string $relationship = 'cltns';

    protected static ?string $title = 'CLTN';

    public function isReadOnly(): bool
    {
        return false;
    }

    public function form(Form $form): Form
    {
        return PnsRwCltnResource::form($form);
    }

    public function table(Table $table): Table
    {
        return PnsRwCltnResource::table($table)
            ->headerActions([
                Tables\Actions\Action::make('sync')
                    ->requiresConfirmation()
                    ->action(function ($livewire) {
                        Artisan::call("siasn-simpeg:pull-riwayat pns-rw-cltn --nipBaru={$livewire->getOwnerRecord()->nip_baru}");
                    }),
            ]);
    }
}
