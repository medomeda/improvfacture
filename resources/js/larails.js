jQuery(function () {

    var larails = {
        
        // Define the name of the hidden input field for method submission
        methodInputName: '_method',
        // Define the name of the hidden input field for token submission
        tokenInputName: '_token',
        // Define the name of the meta tag from where we can get the csrf-token
        metaNameToken: 'csrf-token',

        initialize: function()
        {
            //$('a[data-method]').on('click', this.handleMethod);
            $(document).on('click','a[data-method]', this.handleMethod);
        },

        handleMethod: function(e)
        {
            e.preventDefault();

            var link = $(this),
                httpMethod = link.data('method').toUpperCase(),
                confirmMessage = link.data('confirm'),
                confirmTag = link.data('confirm-btn'),
                confirmButton = $(confirmTag),
                cancelTag = link.data('cancel-btn'),
                cancelButton = $(cancelTag),
                form;

            // Exit out if there is no data-methods of PUT, PATCH or DELETE.
            if ($.inArray(httpMethod, ['PUT', 'PATCH', 'DELETE']) === -1)
            {
                return;
            }

            // Allow user to optionally provide data-confirm-btn="#query-selector" and data-cancel-btn="#query-selector"
            if (confirmTag && confirmButton.length)
            {
                confirmButton.on('click', function(){
                    form = larails.createForm(link);
                    form.submit();
                });
                if (cancelTag && cancelButton.length)
                {
                    cancelButton.on('click', function() {
                        confirmButton.off('click');
                    });
                }
            }
            // Allow user to optionally provide data-confirm="Are you sure?"
            else if (confirmMessage)
            {
                
                
                /*if( confirm(confirmMessage) ) {
                    form = larails.createForm(link);
                    form.submit();
                }*/

                Swal.fire({
                    title: "Suppression !" ,
                    text: "Confirmez-vous la suppression de cet enregistrement ?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Oui',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Non'
                  }).then((result) => {
                    if (result.value) {
                        form = larails.createForm(link);
                        form.submit();
                    }
                  })

            } else {
               form = larails.createForm(link);
               form.submit();
            }
        },

        createForm: function(link)
        {
            var token = link.data('token');
            if (!token)
                token = $('meta[name=' + larails.metaNameToken + ']').prop('content');
            var form = $('<form>',
                {
                    'method': 'POST',
                    'action': link.prop('href')
                });

            var token =	$('<input>',
                {
                    'type': 'hidden',
                    'name': larails.tokenInputName,
                    'value': token
                });

            var method = $('<input>',
                {
                    'type': 'hidden',
                    'name': larails.methodInputName,
                    'value': link.data('method')
                });

            return form.append(token, method).appendTo('body');
        },

        deleteAjax: function() {
              
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            })

           
            $(document).on("click", ".deleteItems", function(e){
                e.preventDefault();

                Swal.fire({
                    title: 'Êtes-vous sûr ?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui, supprimer!',
                    cancelButtonText: 'Non'
                  }).then((result) => {
                    if (result.value) {
                      
                        var id = $(this).data("id");
                        //var id = $(this).attr('data-id');
                        var token = $("meta[name='csrf-token']").attr("content");
                        var url = e.target;
            
                        $.ajax({
                            url: url.href, //or you can use url: "company/"+id,
                            type: 'DELETE',
                            data: {
                                _token: token,
                                id: id
                            },
                            success: function (response){
                                $("#success").html(response.message)
                                Swal.fire(
                                    'Suppression !',
                                     response.message,
                                    'success'
                                )
                            }
                        });
                    }
                  })

                return false;
            });

        }

    };

    larails.initialize();

    


});

