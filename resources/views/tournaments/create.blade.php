<x-app-layout>
    <x-slot name="content">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create tournament') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form name = "add-tournament-form" id = "add-tournament-form" method="post" action="{{url('tournament-store-form')}}">
                        @csrf
                        <div>
                            <label for="game_id">Wybierz gre</label>
                            <select name="game_id" id = "game_id">
                                @foreach ($games as $game)
                                    <option value = "{{$game['id']}}">{{$game['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="game_id">Wybierz gre</label>
                            <input type = "text" name = "name" id = "name">
                        </div>
                        <div>
                            <label for="game_id">Wybierz gre</label>
                            <textarea name = "description" id = "description"></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>