@extends('layouts.app')
@section('title', $task->title)

@section('content')
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="mb-6">
            <a href="{{route('tasks.index')}}" class="link flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Listeye Dön
            </a>
        </div>

        <div class="space-y-4">
            <p class="text-gray-600">{{$task->description}}</p>

            @if($task->long_description)
                <p class="text-gray-600">{{$task->long_description}}</p>
            @endif

            <div class="flex items-center gap-2 text-xs text-gray-500">
                <span>Oluşturulma: {{$task->created_at->diffForHumans()}}</span>
                <span>•</span>
                <span>Güncellenme: {{$task->updated_at->diffForHumans()}}</span>
            </div>

            <div>
                @if($task->completed)
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-600">
                        Tamamlandı
                    </span>
                @else
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-rose-100 text-rose-600">
                        Devam Ediyor
                    </span>
                @endif
            </div>

            <div class="flex items-center gap-2 pt-2">
                <form action="{{route('tasks.toggle-complete', ['task' => $task])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-success">
                        {{ $task->completed ? 'Tamamlanmadı' : 'Tamamlandı' }}
                    </button>
                </form>

                <a href="{{route('tasks.edit', ['task'=>$task])}}" 
                   class="btn btn-secondary">Düzenle</a>

                <form action="{{route('tasks.destroy', ['task'=>$task])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Sil</button>
                </form>
            </div>
        </div>
    </div>
@endsection
