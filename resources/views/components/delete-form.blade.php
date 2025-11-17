<!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->
<form action="{{ $actionUrl }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this item ?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn-delete" id="deleteBtn">
        X
    </button>
</form>
