<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="text-green-500 mb-3 mt-1">{{session('success')}}</div>
            @endif
            <div class="overflow-hidde sm:rounded-lg">
                <div class=" mb-8">
                    <a href="{{ route('posts.create') }}" class="bg-green-500 rounded p-2 text-white">Create Post</a>
                </div>
                <div>
                    @foreach($posts as $post)
                        <div class="bg-white mb-8 rounded shadow p-6">
                            @php
                                $profile = substr($post->user->name, 0, 2);
                            @endphp
                            <div class="mb-3 font-bold uppercase tracking-wide text-lg">{{ $post->title }}</div>
                            <div class="flex items-center gap-1">
                                <div
                                    class="bg-blue-600 text-white w-8 h-8 rounded-full flex justify-center items-center uppercase tracking-wide text-sm">{{ $profile }}</div>
                                <div class="tracking-wide">
                                    {{ $post->user->name }}
                                </div>

                            </div>
                            <div class="text-center mt-5 whitespace-pre-line">"{{ $post->body }}"</div>
                            @can('update', $post)
                                <div class="flex justify-end gap-3">
                                    <a href="{{ route('posts.edit', $post->uuid) }}"
                                       class="bg-blue-800 text-white p-2 rounded">Update</a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" class="delete-btn" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-800 text-white p-2 rounded">Delete</button>
                                    </form>

                                </div>
                            @endcan
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            document.querySelectorAll('.delete-btn').forEach(function (deleteBtn) {
                deleteBtn.addEventListener('submit', function (e) {
                    e.preventDefault();
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#536266",
                        confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            deleteBtn.submit();
                        }
                    });
                });
            });
        </script>
    @endpush
</x-app-layout>

