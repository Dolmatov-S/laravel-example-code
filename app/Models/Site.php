<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use App\Http\Requests\Filter\QueryFilterRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static filter(QueryFilterRequest $request)
 */
class Site extends Model
{
    use HasFactory, Filterable;
    protected $fillable = ['name', 'framework_id'];


    public function framework(): BelongsTo
    {
        return $this->belongsTo(Framework::class);
    }

    public function developer(): HasMany
    {
        return $this->hasMany(DeveloperSite::class);
    }
}
