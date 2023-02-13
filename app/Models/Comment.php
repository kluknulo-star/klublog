<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $primaryKey = 'comment_id';
    protected $guarded = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function getDateAsCarbon()
    {
        $time = Carbon::parse($this->created_at)->addHour(3);
        $day = $time->diffForHumans();
        if ($time->diffInDays(Carbon::now()) < 1)
        {
            $day = 'сегодня';
        }

        return $day . ' в ' . $time->format('H:i');
    }
}
