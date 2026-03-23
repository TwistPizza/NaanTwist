<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SeoResource\Pages;
use App\Models\Seo;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Forms\Components\Select;
class SeoResource extends Resource
{
    protected static ?string $model = Seo::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';

    public static function form(Form $form): Form
    {
        return $form->schema([

            Section::make('SEO Information')
                ->schema([
                   Select::make('page')
                    ->label('Page Name')
                    ->required()
                    ->options([
                        'home' => 'Home',
                        'store-detail' => 'Store Detail',
                    ])
                    ->unique(ignoreRecord: true),
                    TextInput::make('meta_title')
                        ->required()
                        ->maxLength(70)
                        ->label('Meta Title'),

                    Textarea::make('meta_description')
                        ->required()
                        ->rows(4)
                        ->maxLength(160)
                        ->label('Meta Description')
                        ->columnSpan('full'),

                    Textarea::make('meta_keywords')
                        ->rows(2)
                        ->label('Meta Keywords (comma separated)')
                        ->columnSpan('full'),
                ])
                ->columns(2),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('page')->searchable()->sortable(),
                TextColumn::make('meta_title')->limit(50),
                TextColumn::make('meta_description')->limit(50),
                TextColumn::make('created_at')->dateTime(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListSeos::route('/'),
            'create' => Pages\CreateSeo::route('/create'),
            'edit'   => Pages\EditSeo::route('/{record}/edit'),
        ];
    }
}