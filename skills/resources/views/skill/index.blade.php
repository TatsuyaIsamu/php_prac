<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            スキル
        </h2>
    </x-slot>
    <div id="app">
    @if (session('status'))

        <flash-message-component session="{{session('status')}}"></flash-message-component>

    @endif
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <button onclick="location.href='/skill/new'" class="shadow bg-yellow-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                        新規作成
                    </button>
                    <table class="table-auto">
                        <thead>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">スキル</th>
                            <th class="px-4 py-2">ステータス</th>
                            <th class="px-4 py-2">経験年数</th>
                            <th class="px-4 py-2">特記事項</th>
                        </thead>
                        <tbody>
                            @foreach ($skills as $skill)
                            <tr>
                                <td class="border px-4 py-2">{{ $skill->id }}</td>
                                <td class="border px-4 py-2">{{ $skill->skill_name }}</td>
                                <td class="border px-4 py-2">{{ \App\Models\Skill::SKILL_STATUS_OBJECT[$skill->skill_status]}}</td>
                                <td class="border px-4 py-2">{{ $skill->experience_years }}</td>
                                <td class="border px-4 py-2"><a href="/skill/detail/{{ $skill->id }}">{{ Str::limit($skill->remarks, 40, $end='...') }}</a></td>
                                <td class="border px-4 py-2">
                                    <button onclick="location.href='/skill/detail/{{ $skill->id }}'" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                                        詳細ページ
                                    </button>
                                    <button onclick="location.href='/skill/edit/{{ $skill->id }}'" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                                        編集ページ
                                    </button>
                                    <form action="/skill/remove/{{$skill->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                                            削除
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="flex justify-center mt-3">
                        {{ $skills->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
