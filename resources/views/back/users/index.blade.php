@extends('layouts.master')
@section('heading', 'Utilisateurs')
@section('content')
   
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Utilisateurs</h3>

                    <div class="card-tools">
                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Créer Utilisateur</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                 
                    <table id="users-table" class="table table-hover">
                      @include('back.users.table')
                    </table>
                    {{-- <div class="clearfix"></div> --}}
                  
                </div>
                
            </div>
            <!-- /.card -->
        </div><!--/row -->
    </div>
@endsection


@push('scripts')

    <script type="text/javascript">
        $(function () {
            
            // var YajraDataTable = $('#users-table').DataTable({
            //     /*dom: 'Bfrtip',
            //     buttons: [
            //         'copy', 'csv', 'excel', 'pdf'
            //     ],*/
            //     ajax: "{{ route('admin.users.index') }}",
            //     columns: [
            //             { data: 'id', name: 'id', class:'text-center', width:'auto',  orderable: false, searchable: false  },
            //             { data: 'name', name: 'name' , title : 'User Name' },
            //             { data: 'email', name: 'email' , title : 'Email' },
            //             { data: 'created_at', name: 'created_at' , title : 'Crée le' },
            //             { data: 'actions', name: 'actions', class:'text-center', width:'auto', orderable: false,  searchable: false },
            //             /*{ data: 'id', class:'text-center', orderable: false,  searchable: false, 
            //                 render : function (data, type, row, meta){
            //                     var html = '';
            //                     html += '<a href="/admin/users/'+ data +'" data-toggle="tooltip"  data-id="'+ data + '" class="show"><i class="fa fa-list green"></i></a>';
            //                     html += ' <a href="/admin/users/'+ data +'/edit" data-toggle="tooltip"  data-id="'+ data + '" class="edit"><i class="fa fa-edit blue"></i></a>';
            //                     html += ' <a href="/admin/users/delete/'+ data +'" data-id="' + data +'"  class="del"><i class="fa fa-trash red"></i></a>';
            //                     return html;
                    
            //                 }
            //             }*/
            //         ],
            //         'columnDefs': [
            //             {
            //                 'targets': 0,
            //                 'className': 'select-checkbox',
            //                 'checkboxes': {
            //                     'selectRow': true
            //                 }                                  
            //             }
            //         ],
            //         'select': {
            //             'style': 'multi',
            //         },   
            //         'order': [[1, 'asc']]
            //     });

  
               $(document).on('click', '.del', function(e){
                    e.preventDefault();

                    var id = $(this).attr('data-id');
                    var token = $("meta[name='csrf-token']").attr("content");
                    var url = $(this).attr('href'); 

                    fpbConfirmation("Confirmez-vous la suppression ?", function(e){
                        if (e.value == true) {
                            $.ajax({
                                type: 'POST',
                                url: url, 
                                dataType: 'JSON',
                                data: { _token: token },
                                success: function (response){
                                    console.log(response);
                                    fpbInformation(null, response.message, function (e) {
                                        YajraDataTable.ajax.reload(null, false); 
                                    });                                  
                                }
                            });
                        }
                    });
                    
                    //return false;
               });  

            $("#btnSelectedRow").on('click', function (e) { 
                e.preventDefault();
                
                var rows_selected = YajraDataTable.column(0).checkboxes.selected();
                var data = rows_selected.map(function(elem){
                    return elem;
                }).join(",");
                console.log(rows_selected, data);

              
            })    
           
        });
    </script>
    
@endpush

