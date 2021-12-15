<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            スキル
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-202 flex justify-center">
                    <div class="w-full max-w-xs">
                        <form class="w-full max-w-sm">
                            <div class="md:flex md:items-center mb-6">
                                <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
                                    ID
                                </label>
                                </div>
                                <div class="md:w-2/3">
                                    {{ $skill->id }}
                                </div>
                            </div>
                            <div class="md:flex md:items-center mb-6">
                                <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
                                    スキル
                                </label>
                                </div>
                                <div class="md:w-2/3">
                                    {{ $skill->skill_name }}
                                </div>
                            </div>
                            <div class="md:flex md:items-center mb-6">
                                <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-password">
                                    ステータス
                                </label>
                                </div>
                                <div class="md:w-2/3">
                                    {{ \App\Models\Skill::SKILL_STATUS_OBJECT[$skill->skill_status]}}
                                </div>
                            </div>
                            <div class="md:flex md:items-center">
                                <div class="md:w-2/3">
                                    <button onclick="location.href='/skill'" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                                        戻る
                                    </button>
                                    <button onclick="location.href='/skill/edit/{{ $skill->id }}'" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                                        更新ページへ
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
