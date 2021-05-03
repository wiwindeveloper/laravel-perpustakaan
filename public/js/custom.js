$(document).ready(function () {
    // confirm delete
    $(document.body).on('submit', '.js-confirm', function () {
    var $el = $(this)
    var text = $el.data('confirm') ? $el.data('confirm') : 'Anda yakin melakukan tindakan ini?'
    var c = confirm(text);
    return c;
    });

    // add selectize to select element
    $('#select-beast').selectize({
        create: true,
        sortField: {
            field: 'text',
            direction: 'asc'
        },
        dropdownParent: 'body'
    });

    //multiple select
    $('#select-state').selectize({
        maxItems:3
    });

    //delete review book
    $(document.body).on('submit', 'js-review-delete', function () {
        var $el = $(this);
        var text = $el.data('confirm') ? $el.data('confirm') : 'Anda yakin melakukan tindakan ini?';
        var c = confirm(text);

        //cancel delete
        if(c === false) return c;

        //delete via ajax
        //disable behaviour default dari tombol submit
        event.preventDefault();
        //hapus data buku dengan ajax
        $.ajax({
            type : 'POST',
            url : $(this).attr('action'),
            dataType : 'json',
            data : {
                _method : 'DELETE',
                //Menambah csrf token dari Laravel
                _token : $( this ).children( 'input[name=_token]' ).val()
            }
        }).done(function(data) {
            //cari baris yang dihapus
            baris = $('#form-'+data.id).closet('tr');
            //hilangkan baris (fadeout kemudian remove)
            baris.fadeOut(300, function() {$(this).remove()});
        })
    })
});    