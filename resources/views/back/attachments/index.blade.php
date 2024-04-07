@extends('layouts.master')
@section('heading', 'Fichiers')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                @include('partials.uploader', [
                    'title' => 'Glisser déposer les fichiers ici',
                    'acceptedFiles' => '.jpg,.png'
                ])
            </div>
        </div>
      
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
           
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
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
            </div>

           
            <!-- /.card-body -->
            <div class="card-footer">
            
            </div>
        </div>
        <!-- /.card -->
    </div><!--/row -->
</div>
@include('back.attachments.preview')
    
@endsection
@push('scripts')
    <script>
      
        $(document).ready(function () {

            $('.thumbnail').click(function (e) {
                e.preventDefault();
                
                /*var name = $(this).find('img').attr('src');
                var mname = $('.carousel-inner').find("img[src='" + $(this).find('img').attr('src') + "']");
                $('.carousel-innerdiv').removeClass("active");
                $(mname).parent().addClass("active");
                $('#myModal').modal({
                    backdrop: 'static',
                }, 'show');*/
            }); 


           
        });
    </script> 
    
@endpush