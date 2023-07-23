$("#form_login").submit(function (e) { 
    e.preventDefault()
    $.ajax({
        url : base_url + '/login',
        type: 'POST',
        dataType : 'JSON',
        beforePrint: function(){

        },
        data: {
            email : $("input[name='email']").val(),
            password : $("input[name='password']").val(),
        },
        success: function (data) { 
            console.log(data)
            if(data.status == 200) {
                document.location = base_url + '/beranda'
            }else{
                Swal.fire({
                    icon : 'error',
                    title: 'Gagal',
                    text : data.message,
                    showDenyButton: false,
                    showCancelButton: false,
                    confirmButtonText: 'Tutup',
                    denyButtonText: `Don't save`,
                    cancelButtonText: 'kembali',
                })
            }
        }
    })
})

$('#remember').click(function() {
    if ($(this).is(':checked')) {
        $('#password').attr('type', 'text')
        // $('#konfirmasi').attr('type', 'text')
        $("#textShow").text("Sembunyikan Kata Sandi")
    } else {
        $('#password').attr('type', 'password')
        // $('#konfirmasi').attr('type', 'password')
        $("#textShow").text("Tampilkan Kata Sandi")

    }
})