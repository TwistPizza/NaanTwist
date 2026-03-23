<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OurDealResource\Pages;
use App\Models\OurDeal;
use App\Models\Store;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Filters\SelectFilter;

class OurDealResource extends Resource
{
    protected static ?string $model = OurDeal::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationLabel = 'Our Deals';

    protected static ?string $pluralModelLabel = 'Our Deals';

    protected static ?string $modelLabel = 'Deal';

    public static function form(Form $form): Form
    {
        return $form->schema([

        
            Section::make('Deal Details')
                ->schema([
                     Select::make('section')
                            ->required()
                            ->label('Section')
                            ->options([
                                'home'  => 'Home',
                                'store' => 'Store Details',
                            ]),
                    Select::make('stores')
                        ->label('Stores')
                        ->relationship('stores', 'name')
                        ->multiple()
                        ->searchable()
                        ->preload()
                        ->required(),

                    TextInput::make('name')
                        ->required()
                        ->label('Deal Name'),

                    Toggle::make('is_available')
                        ->label('Available')
                        ->default(true),

                    Textarea::make('description')
                        ->rows(3)
                        ->label('Description')
                        ->columnSpan('full'),
                ])
                ->columns(2),

            Section::make('Deal Image')
                ->schema([
                    FileUpload::make('image')
                        ->label('Image')
                        ->image()
                        ->imageEditor()
                        ->directory('our-deals')
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
                TextColumn::make('stores.name')
                    ->label('Stores')
                    ->badge()
                    ->separator(','),
                TextColumn::make('name')->sortable()->searchable()->label('Deal Name'),
                TextColumn::make('description')->limit(40),
                IconColumn::make('is_available')
                    ->label('Available')
                    ->boolean(),
                TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->filters([
                SelectFilter::make('stores')
                    ->label('Store')
                    ->relationship('stores', 'name'),
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
            'index'  => Pages\ListOurDeals::route('/'),
            'create' => Pages\CreateOurDeal::route('/create'),
            'edit'   => Pages\EditOurDeal::route('/{record}/edit'),
        ];
    }
}