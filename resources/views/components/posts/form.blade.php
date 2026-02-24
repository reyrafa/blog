@props(['action', 'method' => 'POST'])
<form action="{{ $action }}" method="{{ $method }}">
    @csrf
    <div class="">
        <div class="mb-3">
            <label for="">Title <span class="text-red-500">*</span></label>
            <input type="text" name="title" class="w-full rounded mt-1" placeholder="Enter Title" value="{{ old('title') }}" required>
            @error('title')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Content <span class="text-red-500">*</span></label>
            <textarea name="body" class="w-full rounded mt-1" placeholder="Enter Content" required>{{ old('body') }}</textarea>
            @error('body')
            <span>{{ $message }}</span>
            @enderror
        </div>
        <div class="flex justify-end">
            <button class="bg-green-500 p-2 rounded text-white w-full" type="submit">Post</button>
        </div>
    </div>
</form>
