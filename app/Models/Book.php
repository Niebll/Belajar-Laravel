<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function scopeFilter($query, array $filters)
    {

        if (isset ($filters['search']) ? $filters['search'] : false) {
            return $query->where('nama', 'like', '%' . $filters['search'] . '%')
                ->orWhere('author', 'like', '%' . $filters['search'] . '%')
                ->orWhere('price', 'like', '%' . $filters['search'] . '%')
                ->orWhere('release', 'like', '%' . $filters['search'] . '%');
        }

        if (isset ($filters['publisher_id']) ? $filters['publisher_id'] : false) {
            return $query->where('publisher_id', $filters['publisher_id']);
        }
    }
}