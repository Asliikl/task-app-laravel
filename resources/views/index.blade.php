@extends('layouts.app')
@section('title','The List Of Tasks')

@section('content')
        {{--@if(count($tasks))--}}
        @forelse($tasks as $task)
            <div>
            <a href="{{route('tasks.show', ['id' => $task->id])}}"> {{$task->title}}</a>
            </div>
        @empty
            <div>there are no tasks!</div>
        @endforelse
         {{--@endif--}}
@endsection
