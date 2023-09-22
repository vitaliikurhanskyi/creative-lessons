<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    // For GET params filtering adn JSON to
    use Filterable;

    protected $guarded = [];

    public function ptags() {
        return $this->belongsToMany(Ptag::class, 'product_ptags', 'product_id', 'ptag_id');
    }

}
