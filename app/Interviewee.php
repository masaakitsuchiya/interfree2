<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

// class Interviewee extends Model
class Interviewee extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password', 'corp_id', 'name_kana', 'job_post_id', 'birthday', 'sex', 'post_code', 'address', 'github', 'portfolio', 'motivation', 'channel',
    ];
 

    protected $hidden = [
        'password', 'remember_token',
    ];
    
   
    //softdelete
    protected $dates = ['deleted_at'];
    
    public function corp()
    {
        return $this->belongsTo(Corp::class);
    }
}
