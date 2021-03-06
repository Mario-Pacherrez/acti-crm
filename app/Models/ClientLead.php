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
        'active',
    ];

    protected $hidden = [
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    // Relationships
    public function channels(): BelongsToMany
    {
        return $this->belongsToMany(Channel::class, 'channel_x_client_lead', 'fk_client_lead', 'fk_channel');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_x_client_lead', 'fk_client_lead', 'user_id');
    }

    public function leadsDetails(): HasMany
    {
        return $this->hasMany(LeadDetail::class, 'fk_client_lead', 'id_client_lead');
    }
}