<div class="flex h-screen antialiased text-gray-800">
    
  <a href="/dashboard">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-12 h-12 my-1 text-black ml-2 font-bold">
      <path class="fill-current"
        d="M9.41 11H17a1 1 0 0 1 0 2H9.41l2.3 2.3a1 1 0 1 1-1.42 1.4l-4-4a1 1 0 0 1 0-1.4l4-4a1 1 0 0 1 1.42 1.4L9.4 11z" />
    </svg>
  </a>
  <h1 class="text-center font-bold text-2xl">Chat With {{ $user->name }}</h1>


  <div class="flex flex-row h-full w-full overflow-x-hidden">
   
    <div class="flex flex-col flex-auto h-full p-6">
      <div class="flex flex-col flex-auto flex-shrink-0 rounded-2xl bg-gray-100 h-full p-4">
        <div class="flex flex-col h-full overflow-x-auto mb-4">
          <div class="flex flex-col h-full">
            <div class="grid grid-cols-12 gap-y-2">

              @foreach($messages as $message)
          @if($message['sender'] != auth()->user()->name)

        <div class="col-start-1 col-end-8 p-3 rounded-lg">
        <div class="flex flex-row items-center">
          
        <div class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0">
        {{ substr($message['sender'], 0, 1) }}

        </div>
        <button class="text-red-600 mx-2" wire:click="deleteMessage({{ $message['id'] }})">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
          <path class="fill-current"
          d="M9 3v1H4v2h16V4h-5V3H9zm3 5c-.552 0-1 .448-1 1v7c0 .552.448 1 1 1s1-.448 1-1V9c0-.552-.448-1-1-1zm-4 0c-.552 0-1 .448-1 1v7c0 .552.448 1 1 1s1-.448 1-1V9c0-.552-.448-1-1-1zm8 0c-.552 0-1 .448-1 1v7c0 .552.448 1 1 1s1-.448 1-1V9c0-.552-.448-1-1-1z" />
        </svg>
        </button>
        <div class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl">
        <div>{{ $message['message'] }}</div>
        </div>
        </div>
        </div>

      @else

      <div class="col-start-6 col-end-13 p-3 rounded-lg">
      <div class="flex items-center justify-start flex-row-reverse">
      <div class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0">
      A
      </div>
      <button class="text-red-600 mx-2" wire:click="deleteMessage({{ $message['id'] }})">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
        <path class="fill-current"
        d="M9 3v1H4v2h16V4h-5V3H9zm3 5c-.552 0-1 .448-1 1v7c0 .552.448 1 1 1s1-.448 1-1V9c0-.552-.448-1-1-1zm-4 0c-.552 0-1 .448-1 1v7c0 .552.448 1 1 1s1-.448 1-1V9c0-.552-.448-1-1-1zm8 0c-.552 0-1 .448-1 1v7c0 .552.448 1 1 1s1-.448 1-1V9c0-.552-.448-1-1-1z" />
      </svg>
      </button>
      <div class="relative mr-3 text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl">
      <div>{{ $message['message'] }}</div>

      </div>
      </div>
      </div>

       @endif
        @endforeach



            </div>
          </div>
        </div>
        <form wire:submit.prevent="sendMessage()">
          <div class="flex flex-row items-center h-16 rounded-xl bg-white w-full px-4">
            <div>
              <button type="button" class="flex items-center justify-center text-gray-400 hover:text-gray-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                  </path>
                </svg>
              </button>
            </div>
            <div class="flex-grow ml-4">
              <div class="relative w-full">
                <input type="text"
                  class="flex w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10"
                  wire:model="message" placeholder="Type your message here..." />
                <button type="submit"
                  class="absolute flex items-center justify-center h-full w-12 right-0 top-0 text-gray-400 hover:text-gray-600">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                  </svg>
                </button>
              </div>
            </div>
            <div class="ml-4">
              <button type="submit"
                class="flex items-center justify-center bg-indigo-500 hover:bg-indigo-600 rounded-xl text-white px-4 py-1 flex-shrink-0">
                <span>Send</span>
                <span class="ml-2">
                  <svg class="w-4 h-4 transform rotate-45 -mt-px" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                  </svg>
                </span>
              </button>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>