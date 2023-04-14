<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Breed extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected $fillable = [
        'breed'
    ];

    public function users(): MorphToMany
    {
        return $this->morphedByMany(User::class, 'userable');
    }

}
