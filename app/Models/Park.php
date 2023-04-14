<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Park extends Model
{
    use HasFactory;
    protected $table = 'parks';
    protected $fillable = [
        'location'
    ];

    public function users(): MorphToMany
    {
        return $this->morphedByMany(User::class, 'userable');
    }
}
