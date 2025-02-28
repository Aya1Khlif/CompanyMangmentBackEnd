<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $modelLabel = 'Projects';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Projects';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Title')
                    ->maxLength(255)
                    ->required(),

                Forms\Components\TextInput::make('sub_title')
                    ->label('Subtitle')
                    ->maxLength(255),

                Forms\Components\Textarea::make('description')
                    ->label('Description')
                    ->maxLength(65535)
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('image')
                    ->label('Upload Main Image')
                    ->preserveFilenames()
                    ->directory('images/Product')
                    ->imageEditor()
                    ->getUploadedFileNameForStorageUsing(
                        fn(TemporaryUploadedFile $file): string => now()->timestamp . '_' . $file->getClientOriginalName(),
                    )
                    ->openable()
                    ->downloadable()
                    ->required(),

                Forms\Components\FileUpload::make('card_image')
                    ->label('Upload Card Image')
                    ->preserveFilenames()
                    ->directory('images/Product')
                    ->imageEditor()
                    ->getUploadedFileNameForStorageUsing(
                        fn(TemporaryUploadedFile $file): string => now()->timestamp . '_' . $file->getClientOriginalName(),
                    )
                    ->openable()
                    ->downloadable()
                    ->required(),

                Forms\Components\TextInput::make('client')
                    ->label('Client')
                    ->maxLength(255),

                Forms\Components\TextInput::make('status')
                    ->label('Status'),

                Forms\Components\TextInput::make('link')
                    ->label('Link')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->searchable(),

                Tables\Columns\TextColumn::make('sub_title')
                    ->label('Subtitle')
                    ->searchable(),

                Tables\Columns\ImageColumn::make('image')
                    ->label('Main Image'),

                Tables\Columns\ImageColumn::make('card_image')
                    ->label('Card Image'),

                Tables\Columns\TextColumn::make('client')
                    ->label('Client')
                    ->searchable(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status'),

                Tables\Columns\TextColumn::make('link')
                    ->label('Link')
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Updated At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'view' => Pages\ViewProduct::route('/{record}'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
