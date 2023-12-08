<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Status extends Model
{
    use HasFactory;
    protected $table = 'status';
    protected $guarded = ['id'];

    public function produkStatus(): HasOne
    {
        return $this->hasOne(Produk::class, 'id');
    }
}
