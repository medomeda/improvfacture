<a class="btn btn-sm btn-primary" href="{{ route('admin.' . $crudRoutePart . '.show', $row->id) }}">
    view
</a>
<a class="btn btn-sm btn-info" href="{{ route('admin.' . $crudRoutePart . '.edit', $row->id) }}">
    edit
</a>

<form action="{{ route('admin.' . $crudRoutePart . '.destroy', $row->id) }}" method="POST" onsubmit="return confirm('areYouSure');" style="display: inline-block;">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" class="btn btn-sm btn-danger" value="delete">
</form>

