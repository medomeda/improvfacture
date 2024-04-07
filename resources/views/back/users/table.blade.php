<thead>
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Type</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
  
    @foreach ($users as $key => $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->type }}</td>
        <td>
            <a href="{{ route('admin.users.show',$user->id) }}">
                <i class="fa fa-list green"></i>
            </a>
          
            <a  href="{{ route('admin.users.edit',$user->id) }}">
                <i class="fa fa-edit blue"></i>
            </a>
        
            <a href="{{ route('admin.users.destroy',$user->id)}}" data-method="DELETE" data-confirm="Confirmez-vous la suppression de cet enregistrement ?">
                <i class="fa fa-trash red"></i>
            </a>
                             
        </td>
    </tr>
    @endforeach
</tbody>
