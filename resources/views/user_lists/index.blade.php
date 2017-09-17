@extends('layouts.app')

@section('content')

@foreach($interview_infos as $interview_info)
<?php var_dump($interview_info); ?>
<!--$interview = $interview_info['interview'];-->
<!--$interviewee = $interview_info['interviewee']-->
<!--{{ $interview->id }}-->
<!--{{ $interview->name }}-->


@endforeach

<!--@foreach($interviews as $interview)-->

<!--@endforeach-->

@endsection