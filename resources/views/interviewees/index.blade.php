@extends('layouts.app')

@section('content')

@if (count($interviewees) > 0)
<ul class="user-list">
    @foreach ($interviewees as $interviewee)
        <li class="media">
            {{ $interviewee->name }} <a type="button" class="btn btn-info" href="{{ route('interviewees.show',$interviewee->id) }}">詳細</a>
        </li>
    @endforeach
</ul>
@endif


@endsection