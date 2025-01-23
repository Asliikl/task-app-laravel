@extends('layouts.app')
@section('title',isset($task) ? 'Edit task':'Add Task')

@section('content')
    <div class="bg-white rounded-lg shadow-sm p-6">
        <form method="POST" action="{{isset($task) ? route('tasks.update', ['task'=>$task->id]) : route('tasks.store')}}" 
              class="space-y-4">
            @csrf
            @isset($task)
                @method('PUT')
            @endisset
            
            <div>
                <label for="title">Başlık</label>
                <input type="text" name="title" id="title"
                       @class(['border-red-300' => $errors->has('title')])
                       value="{{ $task->title ?? old('title')}}" />
                @error('title')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>

            <div>
                <label for="description">Açıklama</label>
                <textarea name="description" id="description" rows="2"
                          @class(['border-red-300' => $errors->has('description')])
                >{{$task->description ?? old('description')}}</textarea>
                @error('description')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>

            <div>
                <label for="long_description">Detaylı Açıklama</label>
                <textarea name="long_description" id="long_description" rows="3"
                          @class(['border-red-300' => $errors->has('long_description')])
                >{{$task->long_description ?? old('long_description')}}</textarea>
                @error('long_description')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>

            <div class="flex items-center gap-3 pt-2">
                <button type="submit" class="btn btn-primary">
                    {{ isset($task) ? 'Görevi Güncelle' : 'Görev Ekle' }}
                </button>
                <a href="{{route('tasks.index')}}" class="link">İptal</a>
            </div>
        </form>
    </div>
@endsection
