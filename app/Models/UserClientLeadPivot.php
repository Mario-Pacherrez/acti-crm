<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserClientLeadPivot extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'user_x_client_lead';
    protected $primaryKey = 'id_user_x_client_lead';

    protected $fillable = [
        'active',
    ];

    protected $hidden = [
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    // Relationships
}