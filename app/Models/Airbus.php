<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Airbus extends Model
{
    use HasFactory, SoftDeletes;

    public function airbusType()
    {
        return $this->belongsTo(AirbusType::class, 'airbusType_id', 'id');
    }
}
