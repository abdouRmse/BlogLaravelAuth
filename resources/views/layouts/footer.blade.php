<!-- Footer container -->

<footer
  class="px-8 bg-neutral-100 mt-4 text-center dark:bg-neutral-600 lg:text-left">
  <div class="container">
    <div class="flex items-start py-8 justify-around">
      <!--First links section-->
      <div class="mb-6 w-1/2">
        @if(isset($recent))
          <h5
            class="mb-2.5 font-bold uppercase text-neutral-800 dark:text-neutral-200">
            Recent Posts
          </h5>
        @endif
        @if(isset($recent) && count($recent) >0)
          <div class="footer-posts container w-1/2">
              @foreach($recent as $post)
                <div class="bg-gray-200 py-2 footer-post flex items-center rounded-sm">
                  <img src="images/{{$post->image_path}}" alt="{{$post->title}}">
                  <div class="flex flex-col">
                    <h5>{{$post->title}}</h5>
                    <p class="truncate">{!!$post->content!!}</p>
                  </div>
                </div>
              @endforeach
          </div>
        @endif
      </div>

      
      <!--Fourth links section-->
      <div class="mb-6">
        <h5
          class="mb-2.5 font-bold uppercase text-neutral-800 dark:text-neutral-200">
          Pages
        </h5>

        <ul class="mb-0 list-none">
          <li>
            <a href="/" class="text-neutral-800 dark:text-neutral-200"
              >Home</a
            >
          </li>
          <li>
            <a href="{{route('post.index')}}" class="text-neutral-800 dark:text-neutral-200"
              >Bolg</a
            >
          </li>
          <li>
            <a href="{{route('login')}}" class="text-neutral-800 dark:text-neutral-200"
              >Login</a
            >
          </li>
          <li>
            <a href="{{route('register')}}" class="text-neutral-800 dark:text-neutral-200"
              >Register</a
            >
          </li>
        </ul>
      </div>
    </div>
  </div>

  <!--Copyright section-->
  <div
    class="w-full bg-neutral-200 p-4 text-center text-neutral-700 dark:bg-neutral-700 dark:text-neutral-200">
    © 2023 Copyright:
    <a
      class="text-neutral-800 dark:text-neutral-400"
      href="/dashbord"
      >BlogAbdou</a
    >
  </div>
</footer>