var App = new function () {
    var _baseURL = "";
    return {
        BaseURL: function (url) {
            _baseURL = url;
        },
    }
}

$(function () {

    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    })

    $.fn.dataTable.ext.errMode = function (settings, helpPage, message) {
        console.log(message);
    };
   
    $.extend(true, $.fn.dataTable.defaults, {
        //"dom" : 'Bfrtip',
        "pageLength": 10,
        "lengthMenu": [[10, 20, 50, 100], [10, 20, 50, 100]],
        "processing": true,
        "serverSide": true,
        "autoWidth": false,
        "responsive": true,
        "deferRender": true,
        "filter": true,
        "order": [0, 'asc'],
        "language": {
            "sProcessing":     "Traitement en cours...",
            "sSearch":         "Rechercher&nbsp;:",
            "sLengthMenu":     "Afficher _MENU_",
            "sInfo":           "Page _START_ - _END_ sur _TOTAL_",
            "sInfoEmpty":      "",
            "sInfoFiltered":   "",
            "sInfoPostFix":    "",
            "sLoadingRecords": "Chargement en cours...",
            "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
            "sEmptyTable":     "Aucune donnée disponible dans le tableau",
            "oPaginate": {
                "sNext": '<i class="fa fa-forward"></i>',
                "sPrevious": '<i class="fa fa-backward"></i>',
                "sFirst": '<i class="fa fa-step-backward"></i>',
                "sLast": '<i class="fa fa-step-forward"></i>'
            },
            "oAria": {
              "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
              "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
            }
        }
    });

    //Date picker
    $('.bdatepicker').datetimepicker({
        format: 'L'
    });

    /*$('.bdatepicker').datepicker({
        language: 'fr',
        format: 'dd/mm/yyyy',
        autoclose: true,
        clearBtn: true,
        todayBtn: true,
        todayHighlight: true,
        endDate: new Date()
    });

    
    $('.datepickersingle').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format('YYYY'),10),
        locale: {
          format: 'YYYY-MM-DD'
        }
    });*/

    
    $('.select2').select2({
      //theme: 'bootstrap4',
      language: "fr",
      placeholder: "Choisir un élément",
      allowClear: true
    });

    $('.select2').on('select2:clear', function (e) {
      $('.select2').trigger('change');
    });

    $(document).on('click','.delaction', function(e) {
        e.preventDefault();
        $.ajax({
            method: 'delete',
            url: that.attr('href'),
        })
        .done(() => {
            document.location.reload(true);
        })
        .fail(() => {
            fpbError();
        });
    });    

  });


function loadCombo(id, options) {
    $(id).empty();
    $.ajax({
        type: options.type || "GET",
        dataType: "json",
        url: options.url,
        data: options.data || {},
        async: options.async || true,
        success: function (data) {
            if (options.ligneVide == true)
                $(id).append("<option value=''></option>");
            $.each(data, function (index, result) {
                dataItems = [];
                for (var i = 0; i < options.items.length; i++) {
                    dataItems.push(result[options.items[i]])
                }
                $(id).append("<option data-items='" + dataItems.join(";") + "' value='" + result[options.First] + "'>" + result[options.Second] + "</option>");
            });
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log('Erreur de chargement des données ' + xhr.responseText);
        }
    });
}

function loadSelect2(element, options) {
    dontBlock = true;
    $(element).select2({
        ajax: {
            url: options.url,
            dataType: 'json',
            type: 'GET',
            delay: 250,
            cache: false,
            data: function (params) {
                params.page = params.page || 1;
                return $.extend({
                    searchTerm: params.term || '',
                    pageSize: 30,
                    pageNumber: params.page
                }, options.params);

                /*return {
                searchTerm: params.term || '',
                pageSize: 30,
                pageNumber: params.page
                };*/
            },
            processResults: function (data, params) {
                params.page = params.page || 1;
                return {
                    results: $.map(data.Results, function (data) {
                        return {
                            text: data[options.itemsText],
                            id: data[options.itemsId]
                        }
                    }),
                    pagination: {
                        more: (params.page * 30) < data.Total
                    }
                };
            },
        },
        language: 'fr',
        allowClear: options.allowClear || false,
        placeholder: options.placeholder || 'Rechercher un élément',
        minimumInputLength: 2,
        escapeMarkup: function (markup) { return markup; },
        //initSelection: function (element, callback) {
        //    //if (options.initSelectedId == null) return;
        //    //callback({ id: options.initSelectedId, text: options.initSelectedText });
        //}
    })
}

function ChargerSelect2(element, options) {
    $(element).select2({
        ajax: {
            global :options.url || true,
            url: options.url,
            dataType: 'json',
            type: 'GET',
            delay: 250,
            data: function (params) {
                params.page = params.page || 1;
                return {
                    searchTerm: params.term || '',
                    pageSize: 30,
                    pageNumber: params.page
                };
            },
            processResults: function (data, params) {
                params.page = params.page || 1;
                console.log(data);
                return {
                    results: $.map(data.Results, function (data) {
                        return {
                            text: data[options.text],
                            id: data[options.id],
                            items: data
                        }
                    }),
                    pagination: {
                        more: (params.page * 30) < data.Total
                    }
                };
            },
            cache: true
        },
        language: "fr",
        placeholder: options.placeholder || 'Rechercher un élément',
        escapeMarkup: function (markup) { return markup; },
        minimumInputLength: 2
    });
}


function resizeJquerySteps() {
    $('.wizard .content').animate({
       height: $('.body.current').outerHeight()
   }, 'slow');
}

//$(window).resize($.debounce(250, resizeJquerySteps));

function adjustIframeHeight() {
    var $body   = $('body'),
        $iframe = $body.data('iframe.fv');
    if ($iframe) {
        // Adjust the height of iframe
        $iframe.height($body.height());
    }
}

function fpbConfirmation (message, callback) {
    Swal.fire({
        title: message || "Êtes-vous sûr ?" ,
        text: "Vous ne pourriez pas revenir en arrière !",
        type: "error",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Oui',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Non'
    }).then((result) => {
        return callback(result)
    });
}

function  fpbInformation (type, message, callback){
    Swal.fire({
        title: message,
        //text: message,
        type:type || 'success',
    }).then((result) => {
        return callback(result);                    
    })
}      
    
function fpbSuccess (message) {
    Swal.fire('Information', message,'success')
}

function fpbError (message) {
    
    Swal.fire('Erreur !', 
        message || "Une erreur est survenue dans l' application", 
        'error'
    );
    /*Swal.fire({
        title: 'Erreur !',
        html: message || "Une erreur est survenue dans l' application",
        type : 'error',                       
        //confirmButtonText: 'Fermer',
        //confirmButtonColor: '#d33',
    });*/
}

/***  */

async function   getFetchJsonData  (url) {
    let response = await fetch(url);
    let data = await response.json();
    console.log(data);
    return data;
}
async function    getFetchTextData  (url) {
    let response = await fetch(url);
    let data = await response.text();
    console.log(data);
    return data;
}

/** Colors */

const COLORS = [
    '#4dc9f6',
    '#f67019',
    '#f53794',
    '#537bc4',
    '#acc236',
    '#166a8f',
    '#00a950',
    '#58595b',
    '#8549ba'
];
const CHART_COLORS = {
    red: 'rgb(255, 99, 132)',
    orange: 'rgb(255, 159, 64)',
    yellow: 'rgb(255, 205, 86)',
    green: 'rgb(75, 192, 192)',
    blue: 'rgb(54, 162, 235)',
    purple: 'rgb(153, 102, 255)',
    grey: 'rgb(201, 203, 207)'
};



