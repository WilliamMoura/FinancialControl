<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\TypeCategory;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "name",
        "type_id",
        "user_id",
    ];

    protected $hidden = [
        "created_at",
        "updated_at",
        "deleted_at"
    ];

    public function typeCategory(): HasOne
    {
        return $this->hasOne(TypeCategory::class, 'id', 'type_id');
    }
}
