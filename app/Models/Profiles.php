<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profiles extends User 
{
    use HasFactory;
    use SoftDeletes ; 
    protected $dates = ['create_at'] ; 
    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'image'
    ];
    public function getImageAttribute ($value) {
        return $value??'/' ;
    }
    public function publications() {
        return $this->hasMany(Publication::class) ;
    }
}
