<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Movie extends Model
{
    use HasFactory;

    public function classification(): BelongsTo
    {
        return $this->BelongsTo(Classification::class);
    }

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class);
    }

    public function employees(): BelongsToMany
    {
        return $this->belongsToMany(Employee::class);
    }

    protected function cover(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Str::startsWith($value, 'https') ? $value : Storage::url($value),
        );
    }

    public function showGenreIds(): array
    {
        $genres = [];

        foreach($this->genres as $genre) {
            $genres[] = $genre->id;
        }

        return $genres;
    }
}
