@extends('layouts.master')
@section('heading', 'Liste des Tiers')
@section('content')
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6 text-right" style="padding-bottom: 10px;">
            <a href="#" class="btn btn-success" data-toggle="collapse" data-target="#demo" >
                <i class="fa fa-search"></i> Filtres
            </a>
            <a href="{{ route('admin.tiers.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Ajouter
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
               
                <div class="card-body table-responsive">
                    <div id="demo" class="collapse">
                        <form method="GET" action="" accept-charset="UTF-8">       
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="categorie_id">Catégorie</label>
                                        {{ 
                                            Form::select('categorie_id', [], null , 
                                                [
                                                    'id'=> 'categorie_id',
                                                    'placeholder' => 'Sélectionner une catégorie', 
                                                    'class' => 'form-control select2', 
                                                    'style' =>'width: 100%;'
                                                ]) 
                                        }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="typearticle_id">Type Article</label>
                                        {{ 
                                            Form::select('typearticle_id',  [], null , 
                                                [
                                                    'id'=> 'typearticle_id',
                                                    'placeholder' => 'Sélectionner une délégation', 
                                                    'class' => 'form-control select2', 
                                                    'style' =>'width: 100%;'
                                                ]) 
                                        }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="q" class="control-label">{{ __('Rechercher') }}</label>
                                        <input type="text" name="q" id="q" placeholder="{{ __('Saisir le texte de recherche') }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                           <input type="button" value="{{ __('Rechercher') }}" class="btn btn-secondary btnsearch">
                        </form>
                    </div>
                    <br/>

                    <table id="tiers-table" class="table table-hover mydatatable">
                        {{-- @include('back.tiers.table') --}}
                    </table>
                </div>
                <!-- /.card-body -->
                {{-- <div class="card-footer">
                    {{ $tiers->links() }}
                </div> --}}

            </div>
            <!-- /.card -->
        </div><!--/row -->
    </div>
@endsection


@push('scripts')
    <script type="text/javascript">
        $(function() {
            
            $('.select2').select2({
                allowClear: true,
                placeholder: "Sélectionner un élément"
            });
       

            var YajraDataTable = $('#tiers-table').DataTable({
                //dom: 'Blfrtip',
                //dom:"bfrt<'row pt-5'<'col-md-6 left'li><'col-md-6 right'p>>'",
                buttons: ['copy', 'csv', 'excel', 'pdf'],
                processing: true,
                serverSide: true,
                //filter: false,
                ajax: {
                    type: "GET",
                    url: "{{ route('admin.tiers.index') }}",
                    data: function (d) {
                        d.categorie = $('#categorie_id option:selected').val(),
                        d.typearticle = $('#typearticle_id option:selected').val(),
                        d.q = $('#q').val()
                    }
                },
                columns: [
                    { data: 'id', name: 'id', class:'text-center', width:'auto',  orderable: false, searchable: false  },
                    { data: 'code', name: 'code' , title : 'Code' },
                    { data: 'nom', name: 'nom' , title : 'Nom' },
                    { data: 'prenoms', name: 'prenoms' , title : 'Prénoms' },
                    { data: 'typetier_id', name: 'typetier_id' , title : 'Type tiers' , render: function (data, type) {
                        let libtiers = '';
                            switch (data) {
                                case 1:
                                    libtiers = 'Client';
                                    break;
                                case 2:
                                    libtiers = 'Fournisseur';
                                    break;
                                case 3:
                                    libtiers = 'Employé';
                                    break;
                            }
                            return libtiers;
                        }    
                    },
                    { data: 'telephone', name: 'telephone' , class:'text-center', title : 'N° Tel' },
                    { data: 'actions', name: 'actions', class:'text-center', width:'auto', orderable: false,  searchable: false },
                ],
                columnDefs: [
                    {
                        'targets': 0,
                        'className': 'select-checkbox',
                        'checkboxes': {
                            'selectRow': true
                        }                                  
                    }
                ],
                select: {
                    'style': 'multi',
                },   
                order: [[1, 'asc']]
            });

            $(document).on('click', '.btnsearch', function(e){
                e.preventDefault();
                YajraDataTable.draw();
            });


        
        });
    </script>
@endpush
