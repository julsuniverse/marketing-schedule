<form action="{{ route('social-profile.destroy', $social) }}" method="POST" class="display-inline-block">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-xs btn-danger fa fa-trash btn-action"></button>
</form>