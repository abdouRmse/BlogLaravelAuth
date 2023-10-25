@extends('layouts.app')
@section('content')
    <div class="container flex p-8 mx-auto shadow shadow-lg my-8">
        <div class="h-96 flex bg-red-300">
            <img src="/images/{{$post->image_path}}" height="50" alt="">
        </div>
        <div class="container flex flex-col justify-between p-2">
            <h1 class="bg-gray-900 text-3xl text-gray-100 font-bold uppercase flex mx-auto p-4 rounded-lg">{{$post->title}}</h1>
            <p class="font-normal font-light p-8 text-gray-900 mb-4">{{$post->content}}</p>
            <div class="flex px-8 justify-center items-center">
                <img class="avatar_img rounded-lg shadow shadow-sm border-2 border-gray-500" src="/images/users_avatar/{{$post->user->avatar}}" alt="" class="rounded-full">
                <div class="flex flex-col">
                    <span class="font-medium px-8 text-gray-500">Created By {{$post->user->name}}</span>
                    <span class="font-medium text-sm px-8 text-gray-500"> On {{date('d M Y',$post->updated_at=null)}} At {{date('H:m:i',$post->updated_at=null)}}</span>    
                </div>
            </div>
        </div>
    </div>
    <div class="container flex mx-auto mb-8 pb-8"> 
        <a href="/post/1/edit" class="btn btn-warning bg-yellow-500 px-8 mr-8 py-2 rounded-sm w-64 text-center text-white font-bold">Edit</a>
        <a href="/post/1/destroy" class="btn btn-danger bg-red-800 px-8 mr-8 py-2 rounded-sm text-white font-bold">Delete</a>
    </div>
@endsection