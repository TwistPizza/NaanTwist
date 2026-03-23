<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StoreGalleryResource\Pages;
use App\Models\StoreGallery;
use App\Models\Store;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Filters\SelectFilter;

class StoreGalleryResource extends Resource
{
    protected static ?string $model = StoreGallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Store Gallery';

    protected static ?string $pluralModelLabel = 'Store Gallery';

    protected static ?string $modelLabel = 'Gallery Image';

    public static function form(Form $form): Form
    {
        return $form->schema([

            Section::make('Gallery Details')
                ->schema([
                    Select::make('store_id')
                        ->label('Store')
                        ->options(fn () => Store::pluck('name', 'id'))
                        ->required()
                        ->searchable(),

                    TextInput::make('caption')
                        ->label('Caption')
                        ->nullable(),

                    TextInput::make('sort_order')
                        ->label('Sort Order')
                        ->numeric()
                        ->default(0),
                ])
                ->columns(2),

            Section::make('Image')
                ->schema([
                    FileUpload::make('image')
                        ->label('Image')
                        ->image()
                        ->imageEditor()
                        ->directory('store-gallery')
                        ->visibility('public')
                        ->maxSize(2048)
                        ->columnSpan('full'),
                ]),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                ImageColumn::make('image')->label('Image'),
                TextColumn::make('store.name')->label('Store')->sortable()->searchable(),
                TextColumn::make('caption')->label('Caption')->limit(40),
                TextColumn::make('sort_order')->label('Sort')->sortable(),
                TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->defaultSort('sort_order')
            ->filters([
                SelectFilter::make('store_id')
                    ->label('Store')
                    ->options(fn () => Store::pluck('name', 'id')),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListStoreGalleries::route('/'),
            'create' => Pages\CreateStoreGallery::route('/create'),
            'edit'   => Pages\EditStoreGallery::route('/{record}/edit'),
        ];
    }
}