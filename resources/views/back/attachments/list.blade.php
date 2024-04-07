<table class="table table-hover table-valign-middle">
    <tbody>
        <tr>
            <th>Fichier</th>
            <th>Nom</th>
            <th>Taille</th>
            <th>Extension</th>
            <th>Actions</th>
        </tr>
        @foreach ($attachments as $attachment)
            <tr>

                <td><img src="{{ $attachment->url }}" alt="" width="48px" height="48px"/></td>
                <td>{{ $attachment->filename }}</td>
                <td>{{ $attachment->size }}</td>
                <td>{{ $attachment->mime }}</td>

                <td>
                    <a href="{{ route('admin.attachments.destroy', $attachment->id)}}">
                        <i class="fa fa-edit blue"></i>
                    </a>
                    
                    <a href="#" class="thumbnail">
                        <i class="fa fa-eye"></i>
                    </a>
                    
                    <a href="{{ route('admin.attachments.destroy',$attachment->id)}}" data-method="DELETE" data-confirm="Confirmez-vous la suppression de cet enregistrement ?">
                        <i class="fa fa-trash red"></i>
                    </a>
                    
                </td>
                
            </tr>

        @endforeach

    </tbody>
</table>