<x-app-layout>
    <x-slot name="content">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Games') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(count($games) == 0)
                    <h2>No games found</h2>
                    @else
                        @foreach($games as $game)
                            <a href="/games/{{$game['id']}}" class="game">
                                <div>
                                    <img src="storage/{{$game['id']}}.png">
                                    {{$game['name']}}
                                </div>
                            </a>
                            {{$game['description']}}
                        @endforeach
                    @endif  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
