<div class="dropdown">
  
    <button class="btn btn-sm btn-secondary dropdown  fas fa-ellipsis-v px-2" 
    type="button" id="dropdown-menu-{{ $row->id }}" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
    </button>
  
    <div class="dropdown-menu" aria-labelledby="dropdown-menu-{{ $row->id }}">
       
        <a class="dropdown-item" href="{{ route('admin.' . $crudRoutePart . '.show', $row->id) }}">
            <i class="fa fa-eye"></i>
            Voir
        </a>
    
        <a class="dropdown-item" href="{{ route('admin.' . $crudRoutePart . '.edit', $row->id) }}">
            <i class="fa fa-edit"></i>
           Modifier
        </a>
    
        <form id="delete-{{ $row->id }}" action="{{ route('admin.' . $crudRoutePart . '.destroy', $row->id) }}" method="POST">
            @method('DELETE')
            @csrf
        </form>
        <a class="dropdown-item" href="#" onclick="if(confirm('Êtes-vous sûr ?')) document.getElementById('delete-{{ $row->id }}').submit()">
            <i class="fa fa-trash"></i>
           Supprimer
        </a>
        <a class="dropdown-item" href="{{ route('admin.' . $crudRoutePart . '.destroy', $row->id)}}" class="btn btn-sm btn-danger"
            data-method="DELETE" data-confirm="Confirmez-vous la suppression de cet enregistrement ?">
            <i class="fa fa-trash"></i>
            Supprimer2
        </a>
       
    </div>
</div>


