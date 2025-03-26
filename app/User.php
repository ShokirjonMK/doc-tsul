<?php

namespace App;

use App\Models\Mk\Pass;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getfio()
    {
        $now_user = User::find($this->id);
        if ($now_user->last_name) {
            $fio = $now_user->last_name . " " . $now_user->first_name;
        } else {
            $fio = $now_user->username;
        }

        return $fio;
    }

    public function department()
    {
        return $this->belongsTo('App\Models\Mk\Department');
    }
    public function pass()
    {
        return $this->belongsTo('App\Models\Mk\Pass', 'id', 'user_id');
    }
    public function getPass()
    {
        $pass = Pass::where('user_id', $this->id)->first();
        if ($pass) {
            return $pass->password;
        } else {
            return 'Aniqlanmadi ;)';
        }
        // return $this->belongsTo('App\Models\Mk\Pass', 'id', 'user_id');
    }
}
