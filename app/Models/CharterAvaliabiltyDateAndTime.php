<?php

namespace App\Models;

use App\Models\Charter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CharterAvaliabiltyDateAndTime extends Model
{
    use HasFactory;
    protected $table = 'charter_avaliabilty_date_and_times';
    protected $dates = ['date_of_avalability','time_of_avalability','end_time'];
    protected $fillable = [
        'charter_id',
        'date_of_avalability',
        'time_of_avalability',
        'end_time',
    ];

    public function charter()
    {
        return $this->belongsTo(Charter::class);
    }
}
