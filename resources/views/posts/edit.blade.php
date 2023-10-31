@extends('layouts.app')

@section('content')
    <div class="container p-8 my-8 bg-white shadow-2xl shadow-gray-300 mx-auto">
        <form method="post" action="/post/{{$post->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">The Post Title</label>
                <input type="text" id="text" name="title" value="{{$post->title}}" class="shadow-sm bg-gray-50 border border-gray-300 text-slate-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
                <span class="font-sm text-red-600 block">
                    @error('title')
                        {{$message}}
                    @enderror
                </span>
            </div>

            <div class="mb-6 flex flex-row">  
                <label for="editor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">The Post Content</label>
                <textarea id="editor" name="content" rows="4" class="block p-2.5 w-full text-sm text-slate-400 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{!!$post->content!!}</textarea>
                <span class="font-sm text-red-600 block">
                    @error('content')
                        {{$message}}
                    @enderror
                </span>
            </div>
        
            <div class="flex items-start mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload file</label>
                <input  type="file" name="image_post" value="{{$post->image_post}}" class="block w-full text-sm text-gray-300 border border-gray-200 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar">
                <span class="font-sm text-red-600 block">
                    @error('image_post')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add the post</button>
        </form>
    </div>
  
@endsection