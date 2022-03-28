<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LeadDetail extends Model
{
    use HasFactory;

    protected $table = 'leads_details';
    protected $primaryKey = 'id_lead_detail';

    protected $fillable = [
        'title',
        'detail_date',
        'description',
    ];

    protected $hidden = [
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    // Relationships
    public function clientLead(): BelongsTo
    {
        return $this->belongsTo(ClientLead::class, 'fk_client_lead', 'id_client_lead');
    }
}