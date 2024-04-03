<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Developer extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'salary'];

    public function framework(): HasMany
    {
        return $this->hasMany(DeveloperFramework::class);
    }
}
