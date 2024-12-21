const flashData = $('.flash-data').data('flashdata');

if(flashData){
    if(flashData == 'berhasil'){
        console.log(flashData);
        Swal.fire({ 
            title: 'WIKA Internship',
            text: 'Selamat Bergabung di Wika Intership !!!',
            icon: 'success',
            timer: 3000
        });
    }else if(flashData == 'gagal'){
        // $('#modalRegister').modal('show');
        Swal.fire({
            title: 'WIKA Internship',
            text: 'Anda Gagal Mendaftar Diharapkan Untuk Mengulang Kembali !!!',
            icon: 'error',
            timer: 3000
        });
    }else if(flashData == 'tidakTerdaftar'){
        Swal.fire({
            title: 'WIKA Internship',
            text: 'Alamat Email Belum Terdaftar !!!',
            icon: 'warning',
            timer: 3000
        });
    }else if(flashData == 'TidakAktive'){
        Swal.fire({
            title: 'WIKA Internship',
            text: 'Email/Account Belum Di Aktivasi Segera Hubungi Operator !!!',
            icon: 'info',
            timer: 4000
        });
    }else if(flashData == 'passwordSalah'){
        console.log(flashData);
        Swal.fire({
            title: 'WIKA Internship',
            text: 'Password salah, Pastikan penulisan denngan benar!!!',
            icon: 'error',
            timer: 4000
        });
    }else if(flashData == 'Gagal Update'){
        console.log(flashData);
        Swal.fire({
            title: 'WIKA Internship',
            text: 'Gagal Update Silahkan Coba Lagi',
            icon: 'error',
            timer: 4000
        });
    }else if(flashData == "Berhail Update"){
        console.log(flashData);
        Swal.fire({
            title: 'WIKA Internship',
            text: 'Berhasil Di Update!!!',
            icon: 'error',
            timer: 4000
        });
    }else if(flashData == "suratSuccess"){
        console.log(flashData);
        Swal.fire({
            title: 'WIKA Internship',
            text: 'Surat Berhasil Dibuat!!!',
            icon: 'success',
            timer: 4000
        });
    }
}
 
    // Single Pages Application (SPA)
    $(document).ready(function() {
      

        // All Menu
        $('.listMenu').click(function() {
            var value = $(this).attr('value');
            console.log(value);

            $.ajax({ 
                url: 'View/' + value, 
                method: 'POST',
                success: function(response) {        
                    // console.log(response);
                    $('#content').html(response);
                },
                error: function() {
                  console.log('Terjadi kesalahan saat memuat konten.');
                }
              });
        });
        

    });
    

    // Single Pages Application (SPA)
    
    