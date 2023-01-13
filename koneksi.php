<?php 
    $konek = mysqli_connect("localhost", "root" ,"","dasar");
    function query ($query) {
        global $konek;
        $result = mysqli_query($konek, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result) ) {
        $rows [] = $row;
        }
        return $rows;
        };

    function tambah ($data) {
        global $konek;
        $nama = htmlspecialchars($data["NAMA"]);
        $nip = htmlspecialchars($data["NIP"]);
        $jurusan = htmlspecialchars($data["JURUSAN"]);
        $email = htmlspecialchars($data["EMAIL"]);

        $gambar = upload();
        if( !$gambar ) {
            return false;
        }

        $tambah = "INSERT INTO mahasiswa 
                    VALUES ('','$nama','$nip','$jurusan','$email','$gambar')";
        $result = mysqli_query($konek, $tambah);
        return mysqli_affected_rows($konek);
    };
    
    function upload() {

        $namaFile = $_FILES['GAMBAR']['name'];
        $ukuranFile = $_FILES['GAMBAR']['size'];
        $error = $_FILES['GAMBAR']['error'];
        $tmpName = $_FILES['GAMBAR']['tmp_name'];
    
        // cek apakah tidak ada gambar yang diupload
        if( $error === 4 ) {
            echo "<script>
                    alert('pilih gambar terlebih dahulu!');
                  </script>";
            return false;
        }
    
        // cek apakah yang diupload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
            echo "<script>
                    alert('yang anda upload bukan gambar!');
                  </script>";
            return false;
        }
    
        // cek jika ukurannya terlalu besar
        if( $ukuranFile > 1000000 ) {
            echo "<script>
                    alert('ukuran gambar terlalu besar!');
                  </script>";
            return false;
        }
    
        // lolos pengecekan, gambar siap diupload
        // generate nama gambar baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;
    
        move_uploaded_file($tmpName, '../img/img/' . $namaFileBaru);
    
        return $namaFileBaru;
    }
    
        


    function hapus($id){
        global $konek;
        mysqli_query($konek, "DELETE FROM mahasiswa WHERE ID=$id");
        return mysqli_affected_rows($konek);
    };

    function ubah ($data) {
        global $konek;
        $id = $data["ID"];
        $nama = htmlspecialchars($data["NAMA"]);
        $nip = htmlspecialchars($data["NIP"]);
        $jurusan = htmlspecialchars($data["JURUSAN"]);
        $email = htmlspecialchars($data["EMAIL"]);
        $gambarLama = htmlspecialchars($data["GAMBARLAMA"]);
        // cek apakah user pilih gambar baru atau tidak
	    if( $_FILES["GAMBAR"]["error"] === 4 ) {
		$gambar = $gambarLama;} 
        else {
		$gambar = upload();};
	
        $tambah = "UPDATE mahasiswa SET NAMA = '$nama' , NIP = '$nip' , JURUSAN = '$jurusan' , 
        EMAIL = '$email' , GAMBAR = '$gambar' where ID = $id"; 
        $result = mysqli_query($konek, $tambah);
        return mysqli_affected_rows($konek); };

        function cari($key){
            global $konek;
            $query = "SELECT * FROM mahasiswa WHERE NIP like '%$key%' OR NAMA like '%$key%' OR JURUSAN like '%$key%';";
            return query($query);
        };


        function regis($data) {
            global $konek;
            $userName = strtolower(stripslashes($data["username"]));
            $password = mysqli_real_escape_string($konek ,$data["password"]);
            $konfirmpass = mysqli_real_escape_string($konek ,$data["password2"]);

            //cek pasword apakah sama 
            $result = mysqli_query($konek, "SELECT user FROM user WHERE user = '$userName'");

            if(mysqli_fetch_assoc($result) ) {
                echo "<script>
                        alert('username sudah terdaftar!')
                      </script>";
                return false;
            }
        
        
            // cek konfirmasi password
            if( $password !== $konfirmpass ) {
                echo "<script>
                        alert('konfirmasi password tidak sesuai!');
                      </script>";
                return false;
            }
        
            // enkripsi password
            $password = password_hash($password, PASSWORD_DEFAULT);
                 
        
                $tambah = "INSERT INTO user 
                VALUES ('','$userName','$password')";
            $result1 = mysqli_query($konek, $tambah);
            return mysqli_affected_rows($konek);
            
        }   



        ?>