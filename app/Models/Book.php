<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'author', 'description', 'price', 'image','vendor_id'];

    public function vendor() {
        return $this->belongsTo(Vendor::class);
    }
}
