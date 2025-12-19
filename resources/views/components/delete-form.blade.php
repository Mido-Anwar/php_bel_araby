<!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->
<form action="{{ $actionUrl }}" method="POST" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn-delete"  title="Delete this item">
        X
    </button>
</form>
