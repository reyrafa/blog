<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comment') }}
        </h2>
    </x-slot>
    <div class="mt-10 bg-white rounded shadow w-full md:w-1/2 md:mx-auto">
        <form action="{{ route('comments.update', $comment->id) }}" method="POST" class="p-5">
            @csrf
            @method('PUT')
            <div>
                <textarea rows="5" cols="3" class="rounded w-full" placeholder="Write your Comments here"
                          name="comment">{{ $comment->comment }}</textarea>
                @error('comment')
                <span class="text-red-500 mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <button class="bg-blue-800 text-white p-2 rounded" type="submit">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>
