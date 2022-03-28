<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChannelClientLeadPivot extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'channel_x_client_lead';
    protected $primaryKey = 'id_channel_x_client_lead';

    protected $hidden = [
        'active',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}