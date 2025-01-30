<?php

namespace Mozhuilungdsuo\Impersonator\Models;


use Illuminate\Database\Eloquent\Model;

class ImpersonationLog extends Model
{
    protected $table = 'impersonation_logs';
    protected $fillable = [
        'original_user_id',
        'impersonated_user_id',
        'ip_address',
        'user_agent',
        'action',
    ];
}
