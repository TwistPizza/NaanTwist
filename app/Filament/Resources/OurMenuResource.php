<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OurMenuResource\Pages;
use App\Models\OurMenu;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;

class OurMenuResource extends Resource
{
    protected static ?string $model = OurMenu::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationLabel = 'Our Menu';

    protected static ?string $pluralModelLabel = 'Our Menu';

    protected static ?string $modelLabel = 'Menu Item';

    public static function form(Form $form): Form
    {
        return $form->schema([

            Section::make('Menu Item Details')
                ->schema([
                    TextInput::make('name')
                        ->required()
                        ->label('Item Name'),

                    Toggle::make('is_available')
                        ->label('Available')
                        ->default(true),

                    Textarea::make('description')
                        ->rows(3)
                        ->label('Description')
                        ->columnSpan('full'),
                ])
                ->columns(2),

            Section::make('Item Image')
                ->schema([
                    FileUpload::make('image')
                        ->label('Image')
                        ->image()
                        ->imageEditor()
                        ->directory('menu-items')
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
                ImageColumn::make('image')->label('Image')->circular(),
                TextColumn::make('name')->sortable()->searchable()->label('Item Name'),
                TextColumn::make('description')->limit(40),
                IconColumn::make('is_available')
                    ->label('Available')
                    ->boolean(),
                TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->filters([
                //
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
            'index'  => Pages\ListOurMenus::route('/'),
            'create' => Pages\CreateOurMenu::route('/create'),
            'edit'   => Pages\EditOurMenu::route('/{record}/edit'),
        ];
    }
}