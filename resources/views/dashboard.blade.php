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
                    {{ __("You're logged in!") }}
                </div>
                <div class="p-6 text-gray-900">
                    <a href="{{ route('SchoolClass.index') }}" class="p-6 text-gray-900">
                        {{ __("Class List" )}}
                    </a>
                </div>
                <div class="p-6 text-gray-900">
                    <a href="{{ route('subject.index') }}" class="p-6 text-gray-900">
                        {{ __("Subject List" )}}
                    </a>
                </div>
                <div class="p-6 text-gray-900">
                    <a href="{{ route('student.index') }}" class="p-6 text-gray-900">
                        {{ __("Student List" )}}
                    </a>
                </div>
                <div class="p-6 text-gray-900">
                    <a href="{{ route('mark.index') }}" class="p-6 text-gray-900">
                        {{ __("Marks List" )}}
                    </a>
                </div>
                <div class="p-6 text-gray-900">
                    <a href="{{ route('echalk.index') }}" class="p-6 text-gray-900">
                        {{ __("EChalk" )}}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
