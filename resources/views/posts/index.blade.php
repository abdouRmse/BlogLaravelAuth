@extends('layouts.app')
@section('content')
<div class="w-full">
    <div name="header" class="cost-head mx-auto w-full" >
        <h2 style='width: 170px' class="font-bold mt-10 mx-auto text-3xl text-gray-800 dark:text-gray-200 leading-tight">
            All Posts
        </h2>
        @auth
            <a class="btn btn-primary my-4" href="{{route("post.create")}}">New Post</a>
        @endauth
    </div>
    <div class="px-20">
        @foreach($posts as $post)
            <article class="py-6 mt-10 mb-20 bg-neutral-100 p-20 rounded-br-3xl rounded-tl-xl">
                <div class="flex items-center justify-between mb-3 text-gray-500">
                    <div>
                        <a class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 hover:bg-blue-200 dark:hover:bg-blue-300 dark:text-blue-800 mb-2" href="/blog/tag/angular/">#Angular</a>
                    </div>
                    <span class="text-sm">Published on <time datetime="1667903925000">{{date("d M Y",$post->updated_at=null)}}</time><br><span style="margin-left: 100px"> At  <time datetime="1667903925000">{{date("H:m:i",$post->updated_at=null)}}</time></span></span>
                </div>
                <h2 class=" mb-2 text-2xl truncate font-bold tracking-tight text-gray-900 dark:text-white hover:underline" >
                    <a href="/blog/top-10-scalable-angularjs-frameworks/">{{$post->title}}</a>
                </h2>
                <p class="truncate mb-5 text-gray-500 dark:text-gray-400">{{$post->content}}</p>
                <div class="md:flex-row flex items-center justify-between sm:flex flex-col">
                    <span class="flex items-center space-x-2" href="/blog/author/harikrishna/">
                        <img class="rounded-full w-7 h-7" src="/images/users_avatar/{{$post->user->avatar}}" alt="{{$post->user->avatar}}">
                        <span class="font-medium dark:text-white">{{$post->user->name}}</span>
                    </span>
                    <a class="inline-flex items-center font-medium text-blue-600 hover:underline dark:text-blue-500" href="/blog/top-10-scalable-angularjs-frameworks/">Read more
                        <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </article>                                                                                                           
        @endforeach
         
    </div>
</div>
    
@endsection

