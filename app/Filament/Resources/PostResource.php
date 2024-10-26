<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Forms\Components\BelongsToSelect;



use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Посты';
    protected static ?string $pluralLabel = 'Посты';

    public static function form(Form $form): Form
    {
        return $form->schema([
            // Поле для названия
            TextInput::make('name')
                ->label('Название')
                ->required()
                ->placeholder('Введите название поста')
                ->helperText('Заголовок вашего поста.')
                ->reactive() // позволяет обновлять другие поля на основе ввода
                ->maxLength(255) // устанавливает максимальную длину

                ->afterStateUpdated(function ($state) {
                    // Можно добавить логику для изменения состояния других полей
                }),

            // Поле для категории
            Select::make('category_id')
                ->label('Категория')
                ->relationship('categories', 'name')
                ->required()
                ->placeholder('Выберите категорию'),

            // Поле для описания
            // Textarea::make('description')
            //     ->label('Описание')
            //     ->placeholder('Введите описание поста')
            //     ->helperText('Подробное описание вашего поста.')
            //     ->required()
            //     ->rows(4),
            // устанавливает количество видимых строк
            TiptapEditor::make('description')
                ->label('Описание')
                ->required(),

            // Поля для казахского языка
            TextInput::make('name_kk')
                ->label('Название (каз)')
                ->required()
                ->placeholder('Введите название на казахском')
                ->maxLength(255),

            // Textarea::make('description_kk')
            //     ->label('Описание (каз)')
            //     ->required()
            //     ->placeholder('Введите описание на казахском')
            //     ->rows(4),

            TiptapEditor::make('description_kk')
                ->label('Описание (каз)')
                ->required(),


            // Поле для загрузки изображений
            FileUpload::make('image')
                ->label('Фотографии')
                ->image()
                ->nullable(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Название')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('categories.name')
                    ->label('Категория')
                    ->sortable()
                    ->searchable(),


                TextColumn::make('created_at')
                    ->label('Дата создания')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                // Здесь можно добавить фильтры
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Здесь можно указать связи, если они есть
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'view' => Pages\ViewPost::route('/{record}'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
