<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Channel extends Model
{
    use HasFactory;

    protected $table = 'channels';
    protected $primaryKey = 'id_channel';

    protected $fillable = [
        'channel_name',
        'active',
        'created_by',
    ];

    protected $hidden = [
        'updated_by',
        'deleted_by',
    ];

    // Relationships
    public function clientsLeads(): BelongsToMany
    {
        return $this->belongsToMany(ClientLead::class, 'channel_x_client_lead', 'fk_channel', 'fk_client_lead');
    }
}