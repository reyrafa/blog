@props(['action', 'method' => 'POST'])
<form action="{{ $action }}" method="POST">
    @csrf
    <div>
        <textarea rows="5" class="w-full rounded shadow" name="comment" placeholder="Enter your comment here" required></textarea>
    </div>
    <div class="mt-3">
        <button type="submit" class="bg-blue-900 p-2 rounded tracking-wide text-white">Comment</button>
    </div>
</form>
