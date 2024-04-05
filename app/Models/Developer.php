<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use App\Http\Requests\Filter\QueryFilterRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static filter(QueryFilterRequest $request)
 */
class Developer extends Model
{
    use HasFactory, Filterable;
    protected $fillable = ['name', 'email', 'salary'];

    public function framework(): HasMany
    {
        return $this->hasMany(DeveloperFramework::class);
    }

    public function site(): HasMany
    {
        return $this->hasMany(DeveloperSite::class);
    }
}
