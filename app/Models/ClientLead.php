<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Carbon\Carbon;

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
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /*protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];*/

    /*public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = Carbon::createFromFormat('d/m/Y H:i:s', $value)->format('Y-m-d H:i:s');
    }*/

    // Relationships
    /*public function channels(): BelongsToMany
    {
        return $this->belongsToMany(Channel::class, 'channel_x_client_lead', 'fk_client_lead', 'fk_channel');
    }*/

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_x_client_lead', 'fk_client_lead', 'user_id')->withTimestamps();
    }

    public function leadStatus(): BelongsTo
    {
        return $this->belongsTo(LeadStatus::class, 'fk_lead_status', 'id_lead_status');
    }

    public function channel(): BelongsTo
    {
        return $this->belongsTo(Channel::class, 'fk_channel', 'id_channel');
    }

    public function leadsDetails(): HasMany
    {
        return $this->hasMany(LeadDetail::class, 'fk_client_lead', 'id_client_lead');
    }

    public function scopeSearch($query, $names)
    {
        return $query->where('names', 'LIKE', '%'.$names.'%');
    }

    public function  setDate($value)
    {
        $this->attributes['created_at'] = Carbon::createFromFormat('Y/m/d', $value)->format('d/m/Y');
    }
}