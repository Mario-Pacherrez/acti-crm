<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ClientLead extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'clients_leads';
    protected $primaryKey = 'id_client_lead';

    protected $fillable = [
        'names',
        'email',
        'phone',
        'courses_name',
    ];

    protected $hidden = [
        'active',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    // Relationships
}