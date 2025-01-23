@extends('layouts.app')
@section('title','Görev Listesi')
@section('content')
    <div class="bg-white rounded-lg shadow-sm p-4">
        <div class="flex justify-between items-center mb-6">
            <div class="flex items-center gap-4">
                <a href="{{ route('tasks.create') }}" class="btn btn-primary">Yeni Görev</a>
                <div class="text-sm text-gray-500">Toplam: {{ $tasks->total() }} görev</div>
            </div>
            <!-- İleride kullanılabilecek filtreler için yer tutucu -->
           
        </div>

        <div class="grid gap-2">
            @forelse($tasks as $task)
                <div class="group flex items-center justify-between p-3 hover:bg-gray-50 rounded-md border border-gray-100 transition-colors duration-200">
                    <div class="flex items-center gap-3">
                        @if($task->completed)
                            <span class="flex-shrink-0 w-2 h-2 rounded-full bg-green-400"></span>
                        @else
                            <span class="flex-shrink-0 w-2 h-2 rounded-full bg-rose-400"></span>
                        @endif
                        
                        <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
                            @class(['text-sm font-medium hover:text-rose-500 transition-colors duration-200', 
                            'text-gray-400' => $task->completed])> 
                            {{ $task->title }}
                        </a>
                        
                        <span class="text-xs text-gray-400">
                            {{ $task->created_at->diffForHumans(['short' => true]) }}
                        </span>
                    </div>

                    <div class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" 
                           class="text-gray-400 hover:text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                            </svg>
                        </a>
                        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" 
                              method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-gray-400 hover:text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="py-8 text-sm text-gray-500 text-center bg-gray-50 rounded-md">
                    <p>Henüz görev bulunmuyor!</p>
                    <p class="text-xs mt-1">Yeni görev ekleyerek başlayın</p>
                </div>
            @endforelse
        </div>

        @if($tasks->count())
            <div class="mt-4">
                {{ $tasks->links() }}
            </div>
        @endif
    </div>
@endsection
