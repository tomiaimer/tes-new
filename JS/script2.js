$(document).ready(function() {
    $('#tombol-cari').hide();

    // event ketika keyword ditulis
    $('#keyword').on('keyup', function() {
        // munculkan icon loading
        $('#loader').show();

        // ajax menggunakan load
        // $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());

        // $.get()
        $.get('ajax/mahas.php?key=' + $('#keyword').val(), function(data) {

            $('#container').html(data);
            $('#loader').hide();

        });
    })

})