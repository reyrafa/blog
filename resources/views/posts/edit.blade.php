<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="">
            <div class="bg-white shadow p-6 w-1/2 mx-auto rounded">
                <x-posts.form :post="$post" method="PUT" action="{{ route('posts.update', $post->id) }}" btn_txt="Update"/>
            </div>

        </div>
    </div>
</x-app-layout>
