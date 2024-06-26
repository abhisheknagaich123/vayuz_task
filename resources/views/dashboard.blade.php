<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- @foreach($users as $user)
                        <p><a href="{{ route('chat', $user->id) }}">{{ $user->name }}</a></p>
                    @endforeach -->
                   <ul>
    @foreach ($users as $user)
        <li class="flex items-center justify-between mb-2">
            <span class="text-lg">
                <a href="{{ route('chat', $user->id) }}">{{ $user->name }}</a>
            </span>
            <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium 
                {{ $user->is_online ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                {{ $user->is_online ? 'Online' : 'Offline' }}
            </span>
        </li>
    @endforeach
</ul>

                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
