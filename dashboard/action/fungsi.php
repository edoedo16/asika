<?php

include "../../include/koneksi.php";

$nomoradmin = mysqli_query($koneksi, "SELECT `nomor` FROM `tb_user` WHERE `tb_user`.`role` = 'admin' ");
//$nu = mysqli_fetch_assoc($nomoradmin);


function tambah_reservasi($data)
{
    global $koneksi;
    global $nomoradmin;

    //$tujuan = $data['tujuan'];

    if ($data['lokasi'] == "lainnya") {
        $tujuan = $data['lokasi2'];
    } else {
        $tujuan = $data['lokasi'];
    }
    $maksud = $data['maksud'];
    $tanggal = $data['tanggal'];
    $waktu = $data['waktu'];
    $no_pesanan = $data['nopes'];
    $user = $data['user'];
    $id = $data['ids'];
    $nomor = $data['nomor'];
    $fungsi = $data['fungsi'];
    $pesan = "Reservasi berhasil, menunggu respon admin";
    $pesan2 = "Ada reservasil menunggu, mohon dicek";

    $sql = mysqli_query($koneksi, "INSERT INTO `tb_reservasi` (`no_pesanan`, `tujuan`, `maksud`,`user`, `fungsi`, `nomor`, `tanggal`, `waktu`, `id_user`) VALUES ('$no_pesanan', '$tujuan', '$maksud', '$user','$fungsi', '$nomor', '$tanggal', '$waktu', '$id'); ");

    waa($nomor, $pesan);


    foreach ($nomoradmin as $d) {
        $nomora = $d['nomor'];
        waadmin($nomora, $pesan2);
    }

    $hasil = mysqli_affected_rows($koneksi);

    return $hasil;
}

function tambah_data_mobil($data)
{
    global $koneksi;

    $id = $data['id'];
    $nopol = htmlspecialchars($data['nopol']);
    $model = htmlspecialchars($data['model']);

    $sql = mysqli_query($koneksi, "INSERT INTO `tb_kendaraan` (`id_kendaraan`, `no_polisi`, `model`) VALUES ('$id', '$nopol', '$model'); ");

    $hasil = mysqli_affected_rows($koneksi);

    return $hasil;
}

function tambah_data_driver($data)
{
    global $koneksi;

    $id = $data['id'];
    $nama = htmlspecialchars($data['nama']);
    $notelp = htmlspecialchars($data['notelp']);


    $sql = mysqli_query($koneksi, "INSERT INTO `tb_supir` (`id_supir`, `nama`, `nomor_telp`) VALUES ('$id', '$nama', '$notelp'); ");

    $hasil = mysqli_affected_rows($koneksi);

    return $hasil;
}

function tambah_user($data)
{
    global $koneksi;

    $nama = htmlspecialchars($data['nama']);
    $user = htmlspecialchars($data['user']);
    $pass = htmlspecialchars($data['pass']);
    $fungsi = htmlspecialchars($data['fungsi']);
    $role = htmlspecialchars($data['role']);
    $nomorwa = htmlspecialchars($data['nomor']);

    $passhash = password_hash($pass, PASSWORD_BCRYPT);

    $cekusername = mysqli_query($koneksi, "SELECT `username` FROM `tb_user` WHERE `tb_user`.`username` = '$user'");
    $count = mysqli_num_rows($cekusername);

    if ($count > 0) {
        $gagaltambah = "gagal";
        return $gagaltambah;
    } else {
        $sql = mysqli_query($koneksi, "INSERT INTO `tb_user` (`nama`,`nomor`, `fungsi`, `username`, `password`, `role`) VALUES ( '$nama','$nomorwa', '$fungsi', '$user', '$passhash', '$role'); ");

        $hasil = mysqli_affected_rows($koneksi);

        return $hasil;
    }
}

function tambah_lokasi($data)
{
    global $koneksi;

    $lokasi = $data['lok'];

    $sql = mysqli_query($koneksi, "INSERT INTO `tb_lokasi` (`nama_lokasi`) VALUES ( '$lokasi' ); ");

    $hasil = mysqli_affected_rows($koneksi);

    return $hasil;
}

function tambah_user_sementara($data)
{
    global $koneksi;
    global $nomoradmin;

    $nama = htmlspecialchars($data['nama']);
    $user = htmlspecialchars($data['user']);
    $pass = htmlspecialchars($data['pass']);
    $fungsi = htmlspecialchars($data['fungsi']);
    $nomorwa = htmlspecialchars($data['nomor']);

    $pesan = "Berhasil mendaftar akun, menunggu persetujuan admin. \n";
    $pesan .= "\n";
    $pesan .= "Terima Kasih telah menggunakan ASIKA. \n";
    $pesan .= "\n";
    $pesan .= "Tetap Semangat dan Stay Safe.";

    $cekusername = mysqli_query($koneksi, "SELECT `username` FROM `tb_user` WHERE `tb_user`.`username` = '$user'");
    $count = mysqli_num_rows($cekusername);

    if ($count > 0) {
        $gagaltambah = "gagal";
        return $gagaltambah;
    } else {

        $sql = mysqli_query($koneksi, "INSERT INTO `tb_user_sementara` (`nama`,`nomor`, `fungsi`, `username`, `password`) VALUES ( '$nama','$nomorwa', '$fungsi', '$user', '$pass'); ");

        $hasil = mysqli_affected_rows($koneksi);

        waa($nomorwa, $pesan);

        $pesanadmin = "Ada yang mendaftarkan akun ASIKA, mohon dicek di user sementara. \n";
        $pesanadmin .= "\n";
        $pesanadmin .= "Tetap Semangat dan Stay Safe. \n";
        $pesanadmin .= "Terima Kasih. \n";

        foreach ($nomoradmin as $d) {
            $nomora = $d['nomor'];
            waadmin($nomora, $pesanadmin);
        }

        return $hasil;
    }
}

function terima_user_sementara($data)
{
    global $koneksi;

    $nama = htmlspecialchars($data['nama']);
    $user = htmlspecialchars($data['username']);
    $pass = htmlspecialchars($data['pass']);
    $fungsi = htmlspecialchars($data['fungsi']);
    $nomorwa = htmlspecialchars($data['nomor']);
    $idu = $data['idu'];

    $pesan = "Pendaftaran telah disetujui oleh admin, sekarang anda dapat menggunakan ASIKA. \n";
    $pesan .= "\n";
    $pesan .= "Nama : " . $nama . "\n";
    $pesan .= "Fungsi : " . $fungsi . "\n";
    $pesan .= "Username : " . $user . "\n";
    $pesan .= "Password : " . $pass . "\n";
    $pesan .= "\n";
    $pesan .= "Terima Kasih telah menggunakan ASIKA. \n";
    $pesan .= "\n";
    $pesan .= "Tetap Semangat dan Stay Safe.";

    $passhash = password_hash($pass, PASSWORD_BCRYPT);

    $sql = mysqli_query($koneksi, "INSERT INTO `tb_user` (`nama`,`nomor`, `fungsi`, `username`, `password`, `role`) VALUES ( '$nama','$nomorwa', '$fungsi', '$user', '$passhash', 'user'); ");

    $sqll = mysqli_query($koneksi, "DELETE FROM `tb_user_sementara` WHERE `tb_user_sementara`.`id_user` = '$idu'");

    $hasil = mysqli_affected_rows($koneksi);

    waa($nomorwa, $pesan);

    return $hasil;
}

function tolak_user_sementara($data)
{

    global $koneksi;

    $idu = $data['idu'];
    $nomorwa = $data['nomorus'];
    $ket = $data['ket'];

    $pesan = "Halo Bpk/Ibu, Pendaftaran akun anda ditolak oleh admin \n";
    $pesan .= "\n";
    $pesan .= "Dengan Keterangan : " . $ket . "\n";
    $pesan .= "\n";
    $pesan .= "Mohon maaf atas ketidaknyamanannya. \n";
    $pesan .= "Terima Kasih telah menggunakan ASIKA. \n";
    $pesan .= "\n";
    $pesan .= "Tetap Semangat dan Stay Safe.";

    $sqll = mysqli_query($koneksi, "DELETE FROM `tb_user_sementara` WHERE `tb_user_sementara`.`id_user` = '$idu'");

    $hasil = mysqli_affected_rows($koneksi);

    waa($nomorwa, $pesan);

    return $hasil;
}

function hapus_reservasi($data)
{
    global $koneksi;

    $id = $data['id'];

    $sql = mysqli_query($koneksi, "DELETE FROM `tb_reservasi` WHERE `tb_reservasi`.`id_reservasi` = '$id'");

    $hasil = mysqli_affected_rows($koneksi);

    return $hasil;
}

function hapus_data_mobil($data)
{
    global $koneksi;

    $id = $data['id'];

    $sql = mysqli_query($koneksi, "DELETE FROM `tb_kendaraan` WHERE `tb_kendaraan`.`id_kendaraan` = '$id'");

    $hasil = mysqli_affected_rows($koneksi);

    return $hasil;
}

function hapus_data_driver($data)
{
    global $koneksi;

    $id = $data['id'];

    $sql = mysqli_query($koneksi, "DELETE FROM `tb_supir` WHERE `tb_supir`.`id_supir` = '$id'");

    $hasil = mysqli_affected_rows($koneksi);

    return $hasil;
}

function hapus_data_user($data)
{

    global $koneksi;

    $id = $data['id'];

    $sql = mysqli_query($koneksi, "DELETE FROM `tb_user` WHERE `tb_user`.`id_user` = '$id'");

    $hasil = mysqli_affected_rows($koneksi);

    return $hasil;
}

function hapus_lokasi($data)
{
    global $koneksi;

    $id = $data['id'];

    $sql = mysqli_query($koneksi, "DELETE FROM `tb_lokasi` WHERE `tb_lokasi`.`id_lokasi` = '$id'");

    $hasil = mysqli_affected_rows($koneksi);

    return $hasil;
}

function edit_reservasi($data)
{
    global $koneksi;

    $tujuan = htmlspecialchars($data['tujuan']);
    $maksud = htmlspecialchars($data['maksud']);
    $tanggal = htmlspecialchars($data['tanggal']);
    $waktu = htmlspecialchars($data['waktu']);
    $id = $data['id'];

    $sql = mysqli_query($koneksi, "UPDATE `tb_reservasi` SET `tujuan`='$tujuan', `maksud`='$maksud', `tanggal`='$tanggal', `waktu`='$waktu' WHERE `tb_reservasi`.`id_reservasi`='$id'");

    $hasil = mysqli_affected_rows($koneksi);

    return $hasil;
}

function edit_data_mobil($data)
{
    global $koneksi;

    $nopol = htmlspecialchars($data['nopol']);
    $model = htmlspecialchars($data['model']);
    $id = $data['id'];

    $sql = mysqli_query($koneksi, "UPDATE `tb_kendaraan` SET `no_polisi`='$nopol', `model`='$model' WHERE `tb_kendaraan`.`id_kendaraan`='$id'");

    $hasil = mysqli_affected_rows($koneksi);

    return $hasil;
}

function edit_data_driver($data)
{

    global $koneksi;

    $nama = htmlspecialchars($data['nama']);
    $notelp = htmlspecialchars($data['notelp']);
    $id = $data['id'];

    $sql = mysqli_query($koneksi, "UPDATE `tb_supir` SET `nama`='$nama', `nomor_telp`='$notelp' WHERE `tb_supir`.`id_supir`='$id'");

    $hasil = mysqli_affected_rows($koneksi);

    return $hasil;
}

function edit_data_user($data)
{
    global $koneksi;

    $nama = htmlspecialchars($data['nama']);
    $nomor = htmlspecialchars($data['nomor']);
    $fungsi = htmlspecialchars($data['fungsi']);
    $user = htmlspecialchars($data['user']);
    $pass = htmlspecialchars($data['pass']);
    $role = htmlspecialchars($data['role']);
    $id = $data['id'];

    $pesan = "Informasi akun ASIKA anda berubah. \n";
    $pesan .= "\n";
    $pesan .= "Nama : " . $nama . "\n";
    $pesan .= "Fungsi : " . $fungsi . "\n";
    $pesan .= "Username : " . $user . "\n";
    $pesan .= "Password : " . $pass . "\n";
    $pesan .= "\n";
    $pesan .= "Terima Kasih telah menggunakan ASIKA. \n";
    $pesan .= "\n";
    $pesan .= "Tetap Semangat dan Stay Safe.";

    $passhash = password_hash($pass, PASSWORD_BCRYPT);

    // $cekusername = mysqli_query($koneksi, "SELECT `username` FROM `tb_user` WHERE `tb_user`.`username` = '$user'");
    // $count = mysqli_num_rows($cekusername);

    // if ($count > 0) {
    //     $gagaltambah = "gagal";
    //     return $gagaltambah;
    // } else {
    $sql = mysqli_query($koneksi, "UPDATE `tb_user` SET `nama`='$nama', `nomor`='$nomor', `fungsi`='$fungsi', `username`='$user', `password`='$passhash', `role`='$role' WHERE `tb_user`.`id_user`='$id'");

    waa($nomor, $pesan);

    $hasil = mysqli_affected_rows($koneksi);

    return $hasil;
    //}
}

function edit_lokasi($data)
{
    global $koneksi;

    $id = $data['id'];
    $lok = $data['lok'];

    $sql = mysqli_query($koneksi, "UPDATE `tb_lokasi` SET `nama_lokasi`='$lok' WHERE `tb_lokasi`.`id_lokasi`='$id'");

    $hasil = mysqli_affected_rows($koneksi);

    return $hasil;
}

function setuju_reservasi($data)
{
    global $koneksi;

    $id_supir = $data['iddriver'];
    $id_mobil = $data['idmobil'];
    $status = $data['status'];
    $id_reservasi = $data['ids'];
    $id_setuju = $data['setujuid'];
    $nomor = $data['nomor'];
    $nopes =  $data['nopes'];
    $nodriver = $data['nodriver'];


    $sqll = mysqli_query($koneksi, "INSERT INTO `tb_setuju` (`id_setuju`, `id_reservasi`, `id_supir`, `id_kendaraan`) VALUES ('$id_setuju','$id_reservasi','$id_supir','$id_mobil')");

    $sql = mysqli_query($koneksi, "UPDATE `tb_reservasi` SET `status`='$status' WHERE `tb_reservasi`.`id_reservasi`='$id_reservasi'");

    $sqlll = mysqli_query($koneksi, "UPDATE `tb_status` SET `id_setuju` = '$id_setuju', `status` = 'Sibuk' WHERE `tb_status`.`id_supir` = '$id_supir'");

    $setuju = mysqli_query($koneksi, "SELECT * FROM `tb_setuju` JOIN `tb_reservasi` JOIN `tb_supir` JOIN `tb_kendaraan` WHERE `tb_reservasi`.`id_reservasi` = `tb_setuju`.`id_reservasi` AND `tb_supir`.`id_supir` = `tb_setuju`.`id_supir` AND `tb_kendaraan`.`id_kendaraan` = `tb_setuju`.`id_kendaraan` AND `tb_reservasi`.`no_pesanan` ='$nopes'");

    $data = mysqli_fetch_assoc($setuju);


    $pesan = "Halo Bpk/Ibu, Reservasi anda telah disetujui admin. \n";
    $pesan .= "\n";
    $pesan .= "Driver : " . $data['nama'] . "\n";
    $pesan .= "Mobil : " . $data['no_polisi'] . " - " . $data['model'] . "\n";
    $pesan .= "Nomor : " . $data['nomor_telp'] . "\n";
    $pesan .= "\n";
    $pesan .= "Mohon menunggu sampai driver datang atau bisa langsung menghubungi nomor driver yang tertera. \n";
    $pesan .= "\n";
    $pesan .= "*Jangan lupa konfirmasi jika telah selesai menggunakan kendaraan di ASIKA* \n";
    $pesan .= "\n";
    $pesan .= "Terima Kasih dan Selamat Bekerja";

    $pesandriver = "Halo Bpk Driver, ada reservasi mobil yang telah admin setujui. \n";
    $pesandriver .= "\n";
    $pesandriver .= "Atas Nama : " . $data['user'] . "\n";
    $pesandriver .= "Fungsi : " . $data['fungsi'] . "\n";
    $pesandriver .= "Tujuan : " . $data['tujuan'] . "\n";
    $pesandriver .= "Maksud : " . $data['maksud'] . "\n";
    $pesandriver .= "Tanggal : " . $data['tanggal'] . "\n";
    $pesandriver .= "Jam : " . $data['waktu'] . "\n";
    $pesandriver .= "\n";
    $pesandriver .= "Mohon segera dikerjakan, Tetap Semangat dan Stay Safe. \n";
    $pesandriver .= "\n";
    $pesandriver .= "Terima Kasih.";

    waa($nomor, $pesan);

    waa($nodriver, $pesandriver);

    $hasil = mysqli_affected_rows($koneksi);

    return $hasil;
}

function tolak_reservasi($data)
{
    global $koneksi;

    $ket = $data['ket'];
    $id = $data['idres'];
    $nomor = $data['nomoru'];

    $sql = mysqli_query($koneksi, "UPDATE `tb_reservasi` SET `status` = 'ditolak', `keterangan` = '$ket' WHERE `tb_reservasi`.`id_reservasi`='$id'");

    $pesan = "Halo Bpk/Ibu, Reservasi anda ditolak oleh admin. \n";
    $pesan .= "\n";
    $pesan .= "Dengan Keterangan : " . $ket . "\n";
    $pesan .= "\n";
    $pesan .= "Mohon maaf atas ketidaknyamanannya. Silahkan lakukan reservasi kembali. \n";
    $pesan .= "\n";
    $pesan .= "Terima Kasih telah menggunakan ASIKA. \n";
    $pesan .= "\n";
    $pesan .= "Tetap Semangat dan Stay Safe.";

    waa($nomor, $pesan);

    $hasil = mysqli_affected_rows($koneksi);

    return $hasil;
}

function selesai_reservasi($data)
{
    global $koneksi;

    $status = $data['status'];
    $id = $data['idres'];
    $nopes = $data['nopes'];
    $tujuan = $data['tujuan'];
    $maksud = $data['maksud'];
    $user = $data['user'];
    $fungsi = $data['fungsi'];
    $tanggal = $data['tanggal'];
    $waktu = $data['waktu'];
    $iduser = $data['iduser'];
    $wsel = $data['wsel'];
    $ket = $data['ket'];
    $id_supir = $data['idsupir'];
    $nama = $data['nama'];
    $nomor = $data['nomor'];
    $nodriver = $data['nodriver'];
    $idker = $data['idker'];
    $nopol = $data['nopol'];
    $model = $data['model'];
    $pesan = "Terima Kasih telah menggunakan ASIKA. \n";
    $pesan .= "\n";
    $pesan .= "Tetap Semangat dan Stay Safe.";
    $pesandriver = "Pekerjaan kali ini telah selesai.  \n";
    $pesandriver .= "Tetap Semangat dan Stay Safe untuk pekerjaan berikutnya. \n";
    $pesandriver .= "\n";
    $pesandriver .= "Terima kasih.";

    $sql = mysqli_query($koneksi, "UPDATE `tb_reservasi` SET `status`='selesai' WHERE `tb_reservasi`.`id_reservasi`='$id'");

    $sqll = mysqli_query($koneksi, "UPDATE `tb_status` SET `id_setuju`='',  `status`='Ready' WHERE `tb_status`.`id_supir` = '$id_supir'");

    $sqlll = mysqli_query($koneksi, "INSERT INTO `tb_log`(`id_reservasi`, `no_pesanan`, `tujuan`, `maksud`, `user`, `fungsi`, `nomor`, `tanggal`, `waktu`, `status`, `id_user`, `waktu_selesai`, `keterangan`, `id_supir`, `nama`, `nomor_telp`, `id_kendaraan`, `no_polisi`, `model`) VALUES ('$id','$nopes','$tujuan','$maksud','$user','$fungsi','$nomor','$tanggal', '$waktu','selesai','$iduser','$wsel','$ket','$id_supir','$nama','$nodriver','$idker','$nopol','$model');");

    waa($nomor, $pesan);

    waa($nodriver, $pesandriver);


    $hasil = mysqli_affected_rows($koneksi);

    return $hasil;
}

function pilih_mobil($data)
{

    global $koneksi;
    $id = $data['supir'];
    $mobil = $data['idmobil'];
    $nopol = $data['nopol'];
    $model = $data['model'];

    $sql = mysqli_query($koneksi, "UPDATE `tb_supir` SET `id_kendaraan`='$mobil', `no_polisi`='$nopol', `model`='$model' WHERE `tb_supir`.`id_supir`='$id'");

    $sql2 = mysqli_query($koneksi, "INSERT INTO `tb_status` (`id_supir`, `status`) VALUES ('$id', 'Ready')");

    $hasil = mysqli_affected_rows($koneksi);

    return $hasil;
}

function logout()
{
    unset($_SESSION);

    session_destroy();

    return true;
}

function waa($nomor, $pesan)
{

    $nomor_telepon = $nomor;

    $nomor_telepon = preg_replace('/[^0-9]/', '', $nomor_telepon);

    $nomor_telepon = preg_replace('/^0/', '62', $nomor_telepon);

    $url = "https://pekapge.net/wascm.php";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
        "Content-Type: application/x-www-form-urlencoded",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $data = "kepada=" . $nomor_telepon . "&pesanku=" . $pesan . "&key=ZZAWICGWsx11h";

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $resp = curl_exec($curl);
    curl_close($curl);
    //var_dump($resp);
}



function waadmin($nomor, $pesan)
{

    $nomor_telepon = $nomor;

    $nomor_telepon = preg_replace('/[^0-9]/', '', $nomor_telepon);

    $nomor_telepon = preg_replace('/^0/', '62', $nomor_telepon);

    $url = "https://pekapge.net/wascm.php";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
        "Content-Type: application/x-www-form-urlencoded",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $data = "kepada=" . $nomor_telepon . "&pesanku=" . $pesan . "&key=ZZAWICGWsx11h";

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $resp = curl_exec($curl);
    curl_close($curl);
    //var_dump($resp);
}
