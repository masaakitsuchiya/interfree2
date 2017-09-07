<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corp extends Model
{
       protected $fillable = ['corp_name', 'address', 'tel', 'corp_url', 'corp_mail', 'profile_flg', 'info_text_flg', 'info_photo_flg', 'info_pdf_flg', 'info_video_flg'];
       

    public function users()
    {
        return $this->hasMany(User::class);
    }
    
    public function interviewees()
    {
        return $this->hasMany(Interviewee::class);
    } 
    
    public function job_posts()
    {
        return $this->hasMany(JopPost::class);
    } 
}
