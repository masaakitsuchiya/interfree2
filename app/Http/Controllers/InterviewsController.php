<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interviewee;
use App\Interview;
use App\User;
use App\InterviewReserveTime;
use App\UserList;

class InterviewsController extends Controller
{
    //
    public function index()
    {
        return view('interviews.index');
    }
    
    
    public function style_select($id,$interview_type){
        if(\Auth::check()){
        $interviewee = Interviewee::find($id);
        session(['interviewee_id' => $id, 'interview_type' => $interview_type]);
        return view('interviews.setting.style_select', [
            'interviewee' => $interviewee,
            'interview_type' => $interview_type,
        ]);
        }
    }
    public function user_select($intervivew_style){
        if(\Auth::check()){
        session(['interview_style' => $intervivew_style]);
        $users = User::where('corp_id',\Auth::user()->corp_id)->where('life_flg',1)->get();
        return view('interviews.setting.user_select',[
            'users' => $users,
            ]);
        }
    }
    
    
    public function interview_time_select(Request $request){
        if(\Auth::check()){
        session(['users_list' => $request->users]);
            return view('interviews.setting.interview_time_select',[
                'users_list' => $request->users,
                ]);
        }
        
    }
    public function interview_setting_confirm(Request $request){
        $interviewee_id  = $request->session()->get('interviewee_id');
        $interview_type  = $request->session()->get('interview_type');
        $interview_style = $request->session()->get('interview_style');
        $users_list      = $request->session()->get('users_list');
        
        $users = new User;
        $users_name_list = $users->users_name($users_list);
        if(\Auth::check()){
        session(['reserve_times' => $request->reserve_times]);
        return view('interviews.setting.interview_setting_confirm',[
                'reserve_times' => $request->reserve_times,
                'interviewee_id'               => $interviewee_id,
                'interview_type'               => $interview_type,
                'interview_style'              => $interview_style,
                'users_list'                   => $users_list,
                'users_name_list'              => $users_name_list,
                ]);
        }
    }
    public function interview_setting_store(Request $request)
    {
        if(\Auth::check()){
            
            $interview = new Interview;
            $interview->corp_id = \Auth::user()->corp_id;
            $interview->interview_type = $request->interview_type;
            $interview->interview_style = $request->interview_style;
            $interview->interviewee_id = $request->interviewee_id;
            $interview->stage_flg = 1;
            $interview->save();
            
            $last_insert_id = $interview->id;
            
            $users = $request->users;
            foreach($users as $user){
                $user_list = new UserList;
                $user_list->corp_id = \Auth::user()->corp_id;
                $user_list->interview_id = $last_insert_id;
                $user_list->user_id = $user;
                $user_list->save();
            }
            
            $reserve_times = $request->reserve_times;
            foreach($reserve_times as $reserve_time){
                    $interview_reserve_time = new InterviewReserveTime;
                    $interview_reserve_time->corp_id = \Auth::user()->corp_id;
                    $interview_reserve_time->interview_id = $last_insert_id;
                    $interview_reserve_time->reserve_time = $reserve_time; 
                    $interview_reserve_time->save();
            }
            return redirect('interviews.index');
        }    
    }
}
