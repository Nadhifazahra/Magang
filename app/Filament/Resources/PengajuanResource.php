<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengajuanResource\Pages;
use App\Filament\Resources\PengajuanResource\RelationManagers;
use App\Models\Pengajuan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Livewire\Notifications;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Select;


class PengajuanResource extends Resource
{
    protected static ?string $model = Pengajuan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nik')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jenis_kelamin')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('alamat')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('no_hp')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('instansi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jurusan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('start_date')
                    ->required(),
                Forms\Components\DatePicker::make('end_date')
                    ->required(),
                Forms\Components\Textarea::make('surat_pengantar')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('kartu')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('proposal')
                    ->columnSpanFull(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nik')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_kelamin')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_hp')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('instansi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jurusan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('keterangan')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Waiting' => 'gray',
                        'Approved' => 'info',
                        'Rejected' => 'danger',
                        'Active' => 'success',
                        'Finished' => 'warning',
                    }),
            ])
            ->filters([
                SelectFilter::make('keterangan')
                    ->options([
                        'Waiting' => 'Waiting',
                        'Approved' => 'Approved',
                        'Rejected' => 'Rejected',
                        'Active' => 'Active',
                        'Finished' => 'Finished',
                    ])
            ])
            ->actions([
                Action::make('Approve')
                    ->button()
                    ->color('success')
                    ->requiresConfirmation()
                    ->action(function (Pengajuan $dataPengajuan) {
                        Pengajuan::find($dataPengajuan->id)->update([
                            'keterangan' => 'Approved'
                        ]);
                        Notification::make()->success()->title('Pengajuan Approved!')->body('Pengajuan Telah Diterima')->icon('heroicon-o-check')->send();
                    })
                    ->hidden(fn (Pengajuan $dataPengajuan) => $dataPengajuan->keterangan !== 'Waiting'),

                Action::make('Reject')
                    ->button()
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function (Pengajuan $dataPengajuan) {
                        Pengajuan::find($dataPengajuan->id)->update([
                            'keterangan' => 'Rejected'
                        ]);
                        Notification::make()->success()->title('Pengajuan Rejected!')->body('Pengajuan Telah Ditolak')->icon('heroicon-o-check')->send();
                    })
                    ->hidden(fn (Pengajuan $dataPengajuan) => $dataPengajuan->keterangan !== 'Waiting'),

                Action::make('Active')
                    ->button()
                    ->color('success')
                    ->requiresConfirmation()
                    ->action(function (Pengajuan $dataPengajuan) {
                        Pengajuan::find($dataPengajuan->id)->update([
                            'keterangan' => 'Active'
                        ]);
                        Notification::make()->success()->title('Pengajuan Activated!')->body('Pengajuan Telah Diaktifkan')->icon('heroicon-o-check')->send();
                    })
                    ->hidden(fn (Pengajuan $dataPengajuan) => $dataPengajuan->keterangan !== 'Approved'),

                Action::make('Finished')
                    ->button()
                    ->color('warning')
                    ->requiresConfirmation()
                    ->action(function (Pengajuan $dataPengajuan) {
                        Pengajuan::find($dataPengajuan->id)->update([
                            'keterangan' => 'Finished'
                        ]);
                        Notification::make()->success()->title('Pengajuan Finished!')->body('Pengajuan Telah Selesai')->icon('heroicon-o-check')->send();
                    })
                    ->hidden(fn (Pengajuan $dataPengajuan) => $dataPengajuan->keterangan !== 'Active'),
            ])

            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPengajuans::route('/'),
            'create' => Pages\CreatePengajuan::route('/create'),
            'edit' => Pages\EditPengajuan::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
