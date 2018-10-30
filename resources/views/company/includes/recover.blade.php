<form action="{{ route('company.archive.recover', $company) }}" method="POST" class="display-inline-block">
    @csrf
    @method('PUT')
    <button type="submit" class="btn btn-xs btn-danger btn-action">Recover</button>
</form>