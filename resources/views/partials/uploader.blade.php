@php
    use Illuminate\Support\Str;
    $dropzoneId = isset($dz_id) ? $dz_id : Str::random();
    //$otitle = isset($title) ? $title :  'Drop files here or click to upload.'
@endphp

<div id="{{$dropzoneId}}" class="dropzone">
    <div class="dz-default dz-message">
        <p class="icon">
            <i class="fa fa-file-invoice fa-4x"></i>
        </p>
        <h4>{{ $title ??  'Glisser-déposer ici ou cliquer pour télécharger vos fichiers.'}}</h4>
        @if(isset($desc))
            <p class="text-muted">{{ $desc ?? 'Any related files you can upload' }} <br>
            <small>Taille Max autorisée {{ config('parametres.medias.max_size', 0) / 1000 }} MB</small></p>
        @endif
    </div>
</div>

@push('scripts')
    <script>
        // Turn off auto discovery
        Dropzone.autoDiscover = false;

        $(function () {
            // Attach dropzone on element
            $("#{{ $dropzoneId }}").dropzone({
                url: "{{ route('admin.attachments.store') }}",
                addRemoveLinks: true,
                //maxFiles:  {{ isset($maxFiles) ? $maxFiles : null }},
                maxFilesize: {{ isset($maxFileSize) ? $maxFileSize : config('parametres.medias.max_size', 1000) / 1000 }},
                acceptedFiles: "{!! isset($acceptedFiles) ? $acceptedFiles : config('parametres.medias.allowed') !!}",
                headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
                params: {!! isset($params) ? json_encode($params) : '{}'  !!},
                init: function () {
                    // uploaded files
                    var uploadedFiles = [];
                    @if(isset($uploadedFiles) && count($uploadedFiles))
                        // show already uploaded files
                        uploadedFiles = {!! json_encode($uploadedFiles) !!};
                        var self = this;
                        uploadedFiles.forEach(function (file) {
                        // Create a mock uploaded file:
                        var uploadedFile = {
                            name: file.filename,
                            size: file.size,
                            type: file.mime,
                            dataURL: file.url
                        };

                        // Call the default addedfile event
                        self.emit("addedfile", uploadedFile);

                        // Image? lets make thumbnail
                        if( file.mime.indexOf('image') !== -1) {

                            self.createThumbnailFromUrl(
                                uploadedFile,
                                self.options.thumbnailWidth,
                                self.options.thumbnailHeight,
                                self.options.thumbnailMethod,
                                true, function(thumbnail) {
                                    self.emit('thumbnail', uploadedFile, thumbnail);
                                });

                        } else {
                            // we can get the icon for file type
                            self.emit("thumbnail", uploadedFile, getIconFromFilename(uploadedFile));
                        }

                        // fire complete event to get rid of progress bar etc
                        self.emit("complete", uploadedFile);
                    })

                    @endif

                    // Handle added file
                    this.on('addedfile', function(file) {
                        console.log(file);
                        var thumb = getIconFromFilename(file);
                        $(file.previewElement).find(".dz-image img").attr("src", thumb);
                    })

                    this.on("complete", function(){
                        if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
                        {
                        var _this = this;
                        _this.removeAllFiles();
                        }
                        load_images();
                    });

                    // handle remove file to delete on server
                    this.on("removedfile", function (file) {
                        // try to find in uploadedFiles

                        var found = uploadedFiles.find(function (item) {
                            // check if filename and size matched
                            return (item.filename === file.name) && (item.size === file.size);
                        })

                        // If got the file lets make a delete request by id
                        if( found ) {
                            $.ajax({
                                url:"admin/attachments/destroy" , 
                                type: 'DELETE',
                                data: {filename:file.name},
                                headers: {
                                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                                },
                                success: function(response) {
                                    console.log('deleted');
                                    //window.location.reload();
                                    load_images();
                                }
                            });
                        }
                    });

                    // Handle errors
                    this.on('error', function(file, response) {
                        var errMsg = response;

                        if( response.message ) errMsg = response.message;
                        if( response.file ) errMsg = response.file[0];

                        $(file.previewElement).find('.dz-error-message').text(errMsg);
                    });
                }
            });
        })

        load_images();

        function load_images(){
            $.get("{{ route('admin.images.list') }}", function(data) {
                $('#attachments-table').empty();
                $('#attachments-table').append(data['html']);
            });
        }

        // Get Icon for file type
        function getIconFromFilename(file) {
            // get the extension
            var ext = file.name.split('.').pop().toLowerCase();

            // if its not an image
            if( file.type.indexOf('image') === -1 ) {

                // handle the alias for extensions
                if(ext === 'docx') {
                    ext = 'doc'
                } else if (ext === 'xlsx') {
                    ext = 'xls'
                }

                return "/images/icon/"+ext+".svg";
            }

            // return a placeholder for other files
            return '/images/icon/txt.svg';
        }

        $(document).on('click', '.remove_image', function(e){
            e.preventDefault();
            var file_name = $(this).data('filename');
            var id =  $(this).data('fileid');

            $.ajax({
                url:"/admin/attachments/destroy/"+id , 
                type: 'DELETE',
                data: {filename:file_name},
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(response) {
                    console.log('deleted');
                    //window.location.reload();
                    load_images();
                }
            });
        });
    </script>
@endpush