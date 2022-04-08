<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Relations\HasMany;

class LeadStatus extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'leads_status';
    protected $primaryKey = 'id_lead_status';

    protected $fillable = [
        'status_name',
        'active',
        'created_by',
    ];

    protected $hidden = [
        'updated_by',
        'deleted_by',
    ];

    // Relationships
    /*public function usersClientsLeads(): HasMany
    {
        return $this->hasMany(UserClientLeadPivot::class, 'fk_lead_status', 'id_lead_status');
    }*/

    public function clientsLeads(): HasMany
    {
        return $this->hasMany(ClientLead::class, 'fk_lead_status', 'id_lead_status');
    }
}