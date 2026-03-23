<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Models\Banner;
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

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Banners';

    protected static ?string $pluralModelLabel = 'Banners';

    protected static ?string $modelLabel = 'Banner';

    public static function form(Form $form): Form
    {
        return $form->schema([

            Section::make('Banner Details')
                ->schema([
                    TextInput::make('title')
                        ->required()
                        ->maxLength(255)
                        ->label('Banner Title'),

                    Select::make('section')
                            ->required()
                            ->label('Section')
                            ->options([
                                'home'  => 'Home',
                                'store' => 'Store Details',
                                'store-near-me' => 'Store Near Me',
                            ]),

                    Toggle::make('status')
                        ->label('Active')
                        ->default(true),

                    Textarea::make('description')
                        ->rows(3)
                        ->label('Description')
                        ->columnSpan('full'),
                ])
                ->columns(2),

            Section::make('Banner Image')
                ->schema([
                    FileUpload::make('image')
                        ->label('Image')
                        ->image()
                        ->imageEditor()
                        ->directory('banners')
                        ->visibility('public')
                        ->maxSize(2048)
                        ->required()
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
                TextColumn::make('title')
                    ->sortable()
                    ->searchable()
                    ->label('Banner Title'),
                TextColumn::make('section')
                    ->sortable()
                    ->searchable()
                    ->label('Section'),
                TextColumn::make('description')->limit(40),
                IconColumn::make('status')
                    ->label('Active')
                    ->boolean(),
                TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->filters([
                SelectFilter::make('section')
                    ->label('Section')
                    ->options(fn () => Banner::query()->pluck('section', 'section')->toArray()),
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
            'index'  => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit'   => Pages\EditBanner::route('/{record}/edit'),
        ];
    }
}