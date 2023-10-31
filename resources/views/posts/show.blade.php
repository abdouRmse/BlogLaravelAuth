@extends('layouts.app')
@section('content')
    <div class="container flex p-8 mx-auto shadow shadow-lg my-8">
        <div class="h-96 flex bg-red-300 shadow shadow-lg">
            <img src="/images/{{$post->image_path}}" height="50" alt="">
        </div>
        <div class="container flex flex-col justify-between p-2">
            <h1 class="bg-gray-900 text-3xl text-gray-100 font-bold uppercase flex mx-auto p-4 rounded-lg">{{$post->title}}</h1>
            <p class="font-normal font-light p-8 text-gray-900 mb-4">{!!$post->content!!}</p>
            <div class="flex pl-8 justify-end items-center">
                @if($post->user->avatar)
                    <div class="avatar">
                        <img class="avatar_img rounded-lg shadow shadow-sm border-2 border-gray-500" src="/images/users_avatar/{{$post->user->avatar}}" alt="" class="rounded-full">
                    </div>
                @else
                    <h6 class="bg-blue-800 text-center py-2 px-3 text-gray-50 rounded-full ">{{$post->user->name[0]}}</h6> <!-- the string is considerd as an array in laravel, get the first string -->
                @endif
                <div class="flex flex-col">
                    <span class="font-medium px-8 text-xs text-gray-500">Created By {{$post->user->name}}</span>
                    <span class="font-medium text-xs px-8 text-gray-500"> On {{date('d M Y',$post->updated_at=null)}} At {{date('H:m:i',$post->updated_at=null)}}</span>    
                </div>
            </div>
        </div>
    </div>
    @auth  
        @if($post->user_id == Auth::user()->id)  
            <div class="container flex mx-auto mb-8 pb-8"> 
                <a href="/post/{{$post->id}}/edit" class="btn btn-warning bg-yellow-500 px-8 mr-8 py-2 rounded-sm w-64 text-center text-white font-bold">Edit</a>
                <form action="/post/{{$post->id}}" method="post">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger bg-red-800 px-8 mr-8 py-2 rounded-sm text-white font-bold">Delete</button>
                </form>
            </div>
        @endif
    @endauth
@endsection