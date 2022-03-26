<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChannelPivotClientLead extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'channels_has_clients_leads';
    protected $primaryKey = 'id_channel_has_client_lead';

    protected $hidden = [
        'active',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}