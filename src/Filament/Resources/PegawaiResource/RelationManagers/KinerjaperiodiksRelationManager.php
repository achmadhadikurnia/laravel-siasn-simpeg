<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsRwKinerjaperiodikResource;

class KinerjaperiodiksRelationManager extends RelationManager
{
    protected static string $relationship = 'kinerjaperiodiks';

    protected static ?string $title = 'Kinerja Periodik';

    public function isReadOnly(): bool
    {
        return false;
    }

    public function form(Form $form): Form
    {
        return PnsRwKinerjaperiodikResource::form($form);
    }

    public function table(Table $table): Table
    {
        return PnsRwKinerjaperiodikResource::table($table);
    }
}
