<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StoreResource\Pages;
use App\Models\Store;
use App\Models\State;
use App\Models\City;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Section;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;

class StoreResource extends Resource
{
    protected static ?string $model = Store::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    public static function form(Form $form): Form
    {
        return $form->schema([

            // ================= Store Information =================
            Section::make('Store Information')
                ->schema([
                    TextInput::make('store_code')
                        ->label('Store Code')
                        ->required()
                        ->unique(ignoreRecord: true),

                    TextInput::make('name')->required(),

                    TextInput::make('owner')->required(),

                    TextInput::make('email')->email(),

                    TextInput::make('phone'),

                    Textarea::make('address')
                        ->rows(3)
                        ->columnSpan('full'),

                    RichEditor::make('description')
                        ->label('Store Description')
                        ->columnSpan('full')->toolbarButtons([
                            'bold',
                            'italic',
                            'underline',
                            'strike',
                            'bulletList',
                            'orderedList',
                            'link',
                            'h2',
                            'h3',
                            'blockquote',
                            'codeBlock',
                        ])
                        ->required(),

                    TextInput::make('order_link')
                        ->label('Order Link / Add Order URL')
                        ->url()
                        ->placeholder('https://example.com/order')
                        ->columnSpan('full'),
                    FileUpload::make('image')
                    ->label('Store Image')
                    ->image()
                    ->directory('store-images')
                    ->maxSize(1024)
                    ->columnSpan('full')
                    ->helperText('Upload the store image (max 1MB).')
                    ->required(false),
                ])
                ->columns(2),

            // ================= Location & Map =================
            Section::make('Location & Map')
                ->schema([
                    Select::make('state_id')
                        ->label('State')
                        ->options(fn () => State::pluck('name', 'id'))
                        ->reactive()
                        ->required(),

                    Select::make('city_id')
                        ->label('City')
                        ->options(function ($get) {
                            $state = $get('state_id');
                            return $state ? City::where('state_id', $state)->pluck('name', 'id') : [];
                        })
                        ->required(),

                    TextInput::make('map_link')
                        ->label('Google Maps Link')
                        ->url()
                        ->prefix('🗺️')
                        ->placeholder('https://maps.google.com/?q=...')
                        ->helperText('Google Maps par store dhundh kar link copy karein aur yahan paste karein.')
                        ->suffixAction(
                            \Filament\Forms\Components\Actions\Action::make('open_map')
                                ->icon('heroicon-o-arrow-top-right-on-square')
                                ->url(fn ($get) => $get('map_link'))
                                ->openUrlInNewTab()
                                ->visible(fn ($get) => filled($get('map_link')))
                        )
                        ->columnSpan('full'),
                ])
                ->columns(2),

            // ================= Store Schedules =================
            Section::make('Store Schedules')
                ->schema([
                    Repeater::make('schedules')
                        ->relationship('schedules')
                        ->schema([
                            Select::make('day')
                                ->options([
                                    'Monday'    => 'Monday',
                                    'Tuesday'   => 'Tuesday',
                                    'Wednesday' => 'Wednesday',
                                    'Thursday'  => 'Thursday',
                                    'Friday'    => 'Friday',
                                    'Saturday'  => 'Saturday',
                                    'Sunday'    => 'Sunday',
                                ])
                                ->required(),

                            TimePicker::make('open_time')->required(),
                            TimePicker::make('close_time')->required(),
                        ])
                        ->columns(2)
                        ->required(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('store_code')->label('Code')->sortable()->searchable(),
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('owner')->sortable()->searchable(),
                TextColumn::make('state.name')->label('State'),
                TextColumn::make('city.name')->label('City'),

                TextColumn::make('map_link')
                    ->label('Map')
                    ->formatStateUsing(fn ($state) => $state ? '🗺️ View Map' : '—')
                    ->url(fn ($record) => $record->map_link ?? null, shouldOpenInNewTab: true)
                    ->color('primary'),

                TextColumn::make('order_link')
                    ->label('Order Link')
                    ->formatStateUsing(fn ($state) => $state ? '🛒 Go to Order' : '—')
                    ->url(fn ($record) => $record->order_link ?? null, shouldOpenInNewTab: true)
                    ->color('success'),

                TextColumn::make('schedules_count')->counts('schedules')->label('Schedules'),
            ])
            ->filters([])
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
            'index'  => Pages\ListStores::route('/'),
            'create' => Pages\CreateStore::route('/create'),
            'edit'   => Pages\EditStore::route('/{record}/edit'),
        ];
    }
}