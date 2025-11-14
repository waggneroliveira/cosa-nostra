<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use App\Services\ActivityLogService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use Notifiable, HasFactory, LogsActivity;
    
    protected $fillable = [
        'name_complete',
        'phone_whatsapp',
        'email',
        'number_of_people',
        'date',
        'location_area',
        'hours',
        'message',
        'status'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        $activityLogService = new ActivityLogService($this);
        
        return LogOptions::defaults()
            ->logOnly($activityLogService->getLoggableAttributes());
    }
}
