<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserList;
use App\User;
use App\Interviewee;
use App\Interview;


class UserListsController extends Controller
{
    public function index()
    {
        if(\Auth::check()){
            $corp_id = \Auth::user()->corp_id;
            $user_id = \Auth::user()->id;
            $user = User::find($user_id);
            $user_lists = $user->user_lists()->where('corp_id', $corp_id)->get();
        
            $interview_infos = [];
            foreach($user_lists as $user_list){
                $interview = $user_list->interview();
                
                // $interviewee = $interview->interviewee();
                $interview_info = [
                    'interview'   => $interview,
                    // 'interviewee' => $interviewee,
                    ];
                array_push($interview_infos, $interview_info);
            }
            
            return view('user_lists.index',[
                'interview_infos' => $interview_infos,
                ]);
        }
    }
    
    public function result_create()
    {
        //resultの値を入力するフォーム表示
    }

    
    public function result_store()
    {
        //
    }
    
    public function result_edit()
    {
        //修正フォーム
    }
    
    public function result_update()
    {
        //修正
    }
    
    public function show()
    {
        //resultの入力表示、他の人が評価した内容も見れる
    }
    
    
    
    
}
