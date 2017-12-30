function res_pertanahan(){
    swal({
        title: 'Apa Anda Yakin?',
        text: "Database Pertanahan Akan di Reset Permanen !",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iya, Reset!'
    }, function isConfirm() {
        $.ajax({
            url: baseUrl + 'reset/pertanahan',
            type: "POST",
            dataType: "JSON",
            success: function (data) {
                swal('Selamat !', 'Berhasil Reset Database !', 'success');
                location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                swal('Astagapeer', 'Ade Nok Salah Mudel e...!', 'error');
                location.reload();
            }
        });
    });
}

function res_arsip() {
    swal({
        title: 'Apa Anda Yakin?',
        text: "Database Arsip Akan di Reset Permanen !",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iya, Reset!'
    }, function isConfirm() {
        $.ajax({
            url: baseUrl + 'reset/arsip',
            type: "POST",
            dataType: "JSON",
            success: function (data) {
                swal('Selamat !', 'Berhasil Reset Database !', 'success');
                location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                swal('Astagapeer', 'Ade Nok Salah Mudel e...!', 'error');
                location.reload();
            }
        });
    });
}

function res_notifikasi() {
    swal({
        title: 'Apa Anda Yakin?',
        text: "Database Notifikasi Akan di Reset Permanen !",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iya, Reset!'
    }, function isConfirm() {
        $.ajax({
            url: baseUrl + 'reset/notifikasi',
            type: "POST",
            dataType: "JSON",
            success: function (data) {
                swal('Selamat !', 'Berhasil Reset Database !', 'success');
                location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                swal('Astagapeer', 'Ade Nok Salah Mudel e...!', 'error');
                location.reload();
            }
        });
    });
}

function res_session() {
    swal({
        title: 'Apa Anda Yakin?',
        text: "Database Log Akan di Reset Permanen !",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iya, Reset!'
    }, function isConfirm() {
        $.ajax({
            url: baseUrl + 'reset/session',
            type: "POST",
            dataType: "JSON",
            success: function (data) {
                swal('Selamat !', 'Berhasil Reset Database !', 'success');
                location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                swal('Astagapeer', 'Ade Nok Salah Mudel e...!', 'error');
                location.reload();
            }
        });
    });
}