<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corp extends Model
{
       protected $fillable = ['corp_name', 'address', 'tel', 'corp_url', 'corp_mail', 'profile_flg', 'info_text_flg', 'info_photo_flg', 'info_pdf_flg', 'info_video_flg'];
       
       public function makeRandStr($length)
       {
            $str = array_merge(range('a', 'z'), range('0', '9'), range('A', 'Z'));
            $r_str = null;
            for ($i = 0; $i < $length; $i++) {
                $r_str .= $str[rand(0, count($str) - 1)];
            }
            return $r_str;
       }
       
       
       
}
