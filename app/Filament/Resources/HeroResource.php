<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroResource\Pages;
use App\Filament\Resources\HeroResource\RelationManagers;
use App\Models\Hero;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;

class HeroResource extends Resource
{
    protected static ?string $model = Hero::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Hero Details')
                    ->tabs([
                        Tab::make('Basic Info')
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(255),
                                
                                FileUpload::make('image')
                                    ->image()
                                    ->directory('heroes')
                                    ->required()
                                    ->imagePreviewHeight(300)
                                    ->maxSize(5120)
                                    ->panelAspectRatio('2:3')
                                    ->imageResizeMode('cover')
                                    ->imageCropAspectRatio('2:3'),
                            ]),
                        
                        Tab::make('Roles & Lanes')
                            ->schema([
                                Select::make('role')
                                    ->label('Primary Role')
                                    ->options([
                                        'Tank' => 'Tank',
                                        'Fighter' => 'Fighter',
                                        'Assassin' => 'Assassin',
                                        'Mage' => 'Mage',
                                        'Marksman' => 'Marksman',
                                        'Support' => 'Support',
                                    ])
                                    ->required(),

                                Select::make('second_role')
                                    ->label('Secondary Role')
                                    ->options([
                                        'Tank' => 'Tank',
                                        'Fighter' => 'Fighter',
                                        'Assassin' => 'Assassin',
                                        'Mage' => 'Mage',
                                        'Marksman' => 'Marksman',
                                        'Support' => 'Support',
                                    ])
                                    ->nullable(),

                                Select::make('lane')
                                    ->label('Primary Lane')
                                    ->options([
                                        'Midlaner' => 'Midlaner',
                                        'Jungler' => 'Jungler',
                                        'EXP Laner' => 'EXP Laner',
                                        'Gold Laner' => 'Gold Laner',
                                        'Roamer' => 'Roamer',
                                    ])
                                    ->required(),

                                Select::make('second_lane')
                                    ->label('Secondary Lane')
                                    ->options([
                                        'Midlaner' => 'Midlaner',
                                        'Jungler' => 'Jungler',
                                        'EXP Laner' => 'EXP Laner',
                                        'Gold Laner' => 'Gold Laner',
                                        'Roamer' => 'Roamer',
                                    ])
                                    ->nullable(),
                            ]),
                        
                        Tab::make('Counters')
                            ->schema([
                                Select::make('counters')
                                    ->multiple()
                                    ->relationship('counters', 'name')
                                    ->preload()
                                    ->label('Countered By')
                                    ->helperText('Heroes yang counter hero ini'),

                                Select::make('countered')
                                    ->multiple()
                                    ->relationship('countered', 'name')
                                    ->preload()
                                    ->label('Counters')
                                    ->helperText('Heroes yang di-counter oleh hero ini'),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->square()
                    ->width(100)
                    ->height(100)
                    ->extraImgAttributes(['class' => 'object-cover rounded-lg'])
                    ->defaultImageUrl(url('/images/default-hero.jpg')),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->size('lg'),
            ])
            ->defaultSort('name', 'asc');
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
            'index' => Pages\ListHeroes::route('/'),
            'create' => Pages\CreateHero::route('/create'),
            'edit' => Pages\EditHero::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Game Data';  // Opsional: untuk mengelompokkan di sidebar
    }

    public static function getNavigationLabel(): string
    {
        return 'Heroes List';  // Label yang muncul di sidebar
    }

    public static function getModelLabel(): string
    {
        return 'Hero';  // Label untuk single item
    }

    public static function getPluralModelLabel(): string
    {
        return 'Heroes';  // Label untuk multiple items
    }
}
