<div>
    <div style="overscroll-behavior: none;">
        <div class="fixed w-full bg-green-400 h-16 pt-2 text-white flex justify-between shadow-md" style="top:0px; overscroll-behavior: none;">
            <!-- back button -->
            <a href="/dashboard">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-12 h-12 my-1 text-green-100 ml-2">
                    <path class="text-green-100 fill-current" d="M9.41 11H17a1 1 0 0 1 0 2H9.41l2.3 2.3a1 1 0 1 1-1.42 1.4l-4-4a1 1 0 0 1 0-1.4l4-4a1 1 0 0 1 1.42 1.4L9.4 11z" />
                </svg>
            </a>
            <div class="my-3 text-green-100 font-bold text-lg tracking-wide">{{ auth()->user()->name }}</div>
            <!-- 3 dots -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="icon-dots-vertical w-8 h-8 mt-2 mr-2">
                <path class="text-green-100 fill-current" fill-rule="evenodd" d="M12 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 7a2 2 0 1 1 0-4 2 2 0 1 1 0 4zM12 21a2 2 0 1 1 0-4 2 2 0 0 1 0 4z" />
            </svg>
        </div>

        <div class="mt-20 mb-16">
            @foreach($messages as $message)
                @if($message['sender'] != auth()->user()->name)
                    <div class="clearfix w-full flex items-start">
                        <div class="bg-gray-300 mx-4 my-2 p-2 rounded-lg inline-block">
                            <b>{{ $message['sender'] }}: </b>{{ $message['message'] }}
                        </div>
                        <div class="flex items-center">
                            <button class="text-gray-600 mx-2" wire:click="editMessage({{ $message['id'] }})">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                    <path class="fill-current" d="M15.232 5.232l3.536 3.536L7.536 20H4v-3.536L15.232 5.232zM19.768 3.768a1.414 1.414 0 0 0-2-2l-1.536 1.536 3.536 3.536 1.536-1.536a1.414 1.414 0 0 0 0-2z"/>
                                </svg>
                            </button>
                            <button class="text-red-600 mx-2" wire:click="deleteMessage({{ $message['id'] }})">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                    <path class="fill-current" d="M9 3v1H4v2h16V4h-5V3H9zm3 5c-.552 0-1 .448-1 1v7c0 .552.448 1 1 1s1-.448 1-1V9c0-.552-.448-1-1-1zm-4 0c-.552 0-1 .448-1 1v7c0 .552.448 1 1 1s1-.448 1-1V9c0-.552-.448-1-1-1zm8 0c-.552 0-1 .448-1 1v7c0 .552.448 1 1 1s1-.448 1-1V9c0-.552-.448-1-1-1z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                @else
                    <div class="clearfix w-full flex justify-end items-start">
                        <div class="bg-green-300 mx-4 my-2 p-2 rounded-lg inline-block text-right">
                            {{ $message['message'] }} <b>: You</b>
                        </div>
                        <div class="flex items-center">
                            <button class="text-gray-600 mx-2" wire:click="editMessage({{ $message['id'] }})">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                    <path class="fill-current" d="M15.232 5.232l3.536 3.536L7.536 20H4v-3.536L15.232 5.232zM19.768 3.768a1.414 1.414 0 0 0-2-2l-1.536 1.536 3.536 3.536 1.536-1.536a1.414 1.414 0 0 0 0-2z"/>
                                </svg>
                            </button>
                            <button class="text-red-600 mx-2" wire:click="deleteMessage({{ $message['id'] }})">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                    <path class="fill-current" d="M9 3v1H4v2h16V4h-5V3H9zm3 5c-.552 0-1 .448-1 1v7c0 .552.448 1 1 1s1-.448 1-1V9c0-.552-.448-1-1-1z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <!-- Input field for new message -->
    <div class="fixed w-full bg-white bottom-0 h-16 flex items-center">
        <input type="text" wire:model="message" class="flex-grow mx-2 p-2 border rounded-lg" placeholder="Type your message...">
        <button wire:click="sendMessage" class="bg-green-500 text-white p-2 rounded-lg mr-2">Send</button>
    </div>

    <!-- Edit Message Modal -->
    @if($editMode)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
            <div class="bg-white p-4 rounded-lg">
                <h2 class="text-lg font-bold mb-2">Edit Message</h2>
                <textarea wire:model="editMessageContent" class="w-full p-2 border rounded-lg"></textarea>
                <div class="mt-4 flex justify-end">
                    <button wire:click="updateMessage" class="bg-green-500 text-white p-2 rounded-lg mr-2">Update</button>
                    <button wire:click="$set('editMode', false)" class="bg-gray-500 text-white p-2 rounded-lg">Cancel</button>
                </div>
            </div>
        </div>
    @endif
</div>
