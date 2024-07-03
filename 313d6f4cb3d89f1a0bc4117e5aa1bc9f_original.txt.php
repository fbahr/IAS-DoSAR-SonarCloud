<?php

function query($data)
{
    global $koneksi;
    $perintah = $koneksi->query($data);
    if (!$perintah) {
        die("Query gagal dilakukan" . $koneksi->error);
    }
    return $perintah;
}
function prepare($data)
{
    global $koneksi;
    $perintah = $koneksi->prepare($data);
    if (!$perintah) {
        die("Query gagal dilakukan" . $koneksi->error);
    }
    return $perintah;
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function ValidateEmail($data)
{
    if (!ereg("^.+@.+\\..+\$", $data)) {
        return true;
    } else {
        return false;
    }
}
function ValidateUsername($data)
{
    if (!preg_match("/^[a-zA-Z-0-9]*\$/", $data)) {
        return true;
    } else {
        return false;
    }
}
function ValidateUrl($data)
{
    if (!preg_match("#^http://[_a-z0-9-]+\\.[_a-z0-9-]+#i", $data)) {
        return true;
    } else {
        return false;
    }
}
function ValidateName($data)
{
    if (!preg_match("/^[a-zA-Z ]*\$/", $data)) {
        return true;
    } else {
        return false;
    }
}
function ValidateNumber($data)
{
    if (!preg_match("/^[0-9]*\$/", $data)) {
        return true;
    } else {
        return false;
    }
}
function ValidateNilai($data)
{
    if (!preg_match("/^[0-9-.]*\$/", $data)) {
        return true;
    } else {
        return false;
    }
}
function EscapeString($data)
{
    global $koneksi;
    $perintah = $koneksi->real_escape_string($data);
    return $perintah;
}
function CekEmail($data)
{
    $sql = "SELECT email FROM ppdb_user WHERE email =?";
    if ($stmt = prepare($sql)) {
        $stmt->bind_param("s", $param_email);
        $param_email = $data;
        if ($stmt->execute()) {
            $stmt->store_result();
            if ($stmt->num_rows == 1) {
                return true;
            } else {
                return false;
            }
        }
    }
    $stmt->close();
}
function CekUsername($data)
{
    $sql = "SELECT username FROM ppdb_user WHERE username =?";
    if ($stmt = prepare($sql)) {
        $stmt->bind_param("s", $param_email);
        $param_email = $data;
        if ($stmt->execute()) {
            $stmt->store_result();
            if ($stmt->num_rows == 1) {
                return true;
            } else {
                return false;
            }
        }
    }
    $stmt->close();
}
function Hari($data)
{
    switch ($data) {
        case "Monday":
            $data = "Senin";
            return "Senin";
        case "Tuesday":
            $data = "Selasa";
            return "Selasa";
        case "Wednesday":
            $data = "Rabu";
            return "Rabu";
        case "Thursday":
            $data = "Kamis";
            return "Kamis";
        case "Friday":
            $data = "Jumat";
            return "Jumat";
        case "Saturday":
            $data = "Sabtu";
            return "Sabtu";
        case "Sunday":
            $data = "Minggu";
            return "Minggu";
    }
}
function Bulan($data)
{
    switch ($data) {
        case "1":
            $data = "Januari";
            return "Januari";
        case "2":
            $data = "Februari";
            return "Februari";
        case "3":
            $data = "Maret";
            return "Maret";
        case "4":
            $data = "April";
            return "April";
        case "5":
            $data = "Mei";
            return "Mei";
        case "6":
            $data = "Juni";
            return "Juni";
        case "7":
            $data = "Juli";
            return "Juli";
        case "8":
            $data = "Agustus";
            return "Agustus";
        case "9":
            $data = "September";
            return "September";
        case "10":
            $data = "Oktober";
            return "Oktober";
        case "11":
            $data = "Nopember";
            return "Nopember";
        case "12":
            $data = "Desember";
            return "Desember";
    }
}
function TampilTanggal()
{
    $tanggal = Hari(date("l")) . ", ";
    $tanggal .= date("d") . " ";
    $tanggal .= Bulan(date("m")) . " ";
    $tanggal .= date("Y");
    return $tanggal;
}
function CekTLS_tanggal($data)
{
    if (!preg_match("/^[0-9-\\-]*\$/", $data)) {
        return true;
    } else {
        return false;
    }
}
function BCA_tanggal($data)
{
    $ar = explode("-", $data);
    if (checkdate($ar[1], $ar[0], $ar[2])) {
        return true;
    } else {
        return false;
    }
}
function BuatAkun($nama, $email, $username, $password)
{
    $sql = "INSERT INTO ppdb_user (nama, email, username, password) VALUES(?,?,?,?)";
    if ($stmt = prepare($sql)) {
        $stmt->bind_param("ssss", $param_nama, $param_email, $param_username, $param_password);
        $param_nama = $nama;
        $param_email = $email;
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    $stmt->close();
}
function BuatAkunInsertIdOrtu($data)
{
    $sql = "INSERT INTO ppdb_ortu (id_siswa) VALUES(?)";
    if ($stmt = prepare($sql)) {
        $stmt->bind_param("i", $param_id);
        $param_id = $data;
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
function BuatAkunInsertIdDokumen($data)
{
    $sql = "INSERT INTO ppdb_dokumen (id_siswa) VALUES(?)";
    if ($stmt = prepare($sql)) {
        $stmt->bind_param("i", $param_id);
        $param_id = $data;
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
function BuatAkunInsertIdRaport($data)
{
    $sql = "INSERT INTO ppdb_raport (id_siswa) VALUES(?)";
    if ($stmt = prepare($sql)) {
        $stmt->bind_param("i", $param_id);
        $param_id = $data;
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
function BuatAkunInsertIdUn($data)
{
    $sql = "INSERT INTO ppdb_un (id_siswa) VALUES(?)";
    if ($stmt = prepare($sql)) {
        $stmt->bind_param("i", $param_id);
        $param_id = $data;
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
function BuatAkunInsertIdAsalSekolah($data)
{
    $sql = "INSERT INTO ppdb_asalsekolah (id_siswa) VALUES(?)";
    if ($stmt = prepare($sql)) {
        $stmt->bind_param("i", $param_id);
        $param_id = $data;
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
function BuatAkunInsertIdMhs($data, $nama, $kode_daftar, $tgl_pendaftaran)
{
    $sql = "INSERT INTO ppdb_siswa (id_siswa, nama, kode_daftar, tgl_pendaftaran) VALUES(?,?,?,?)";
    if ($stmt = prepare($sql)) {
        $stmt->bind_param("isss", $param_data, $param_nama, $param_kode, $param_tgl);
        $param_data = $data;
        $param_nama = $nama;
        $param_kode = $kode_daftar;
        $param_tgl = $tgl_pendaftaran;
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    $stmt->close();
}
function BuatAkunInsertIdPembayaran($data, $nama, $kode_refrensi, $virtual_account)
{
    $sql = "INSERT INTO ppdb_pembayaran (id_siswa, nama, kode_refrensi, virtual_account) VALUES (?,?,?,?)";
    if ($stmt = prepare($sql)) {
        $stmt->bind_param("isss", $param_data, $param_nama, $param_kode, $param_virtual);
        $param_data = $data;
        $param_nama = $nama;
        $param_kode = $kode_refrensi;
        $param_virtual = $virtual_account;
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    $stmt->close();
}
function DataSiswa($data)
{
    $sql = "SELECT ppdb_siswa.id, ppdb_siswa.id_siswa, ppdb_siswa.nisn, ppdb_siswa.nama, no_ktp, no_kk, jl, tempat_lahir, tanggal_lahir, agama, golongan_darah, tinggi_badan, berat_badan, riwayat_penyakit, status_keluarga, anak_ke, jml_saudara, mode_transportasi, tempat_tinggal, jarak_rumah, titik_koordinat, hobi, prestasi, alamat, dusun, rt, rw, desa, kecamatan, kabupaten, provinsi, kontak_siswa, foto, jurusan, jalur_pendaftaran, kelas, no_kks, no_pkh, no_kip, ppdb_siswa.nomor_pendaftaran, kode_daftar, tgl_pendaftaran, tgl_update, status_pendaftaran, nama_ayah, nik_ayah, tgl_ayah, status_ayah, pendidikan_ayah, pekerjaan_ayah, penghasilan_ayah, nama_ibu, nik_ibu, tgl_ibu, status_ibu, pendidikan_ibu, pekerjaan_ibu, penghasilan_ibu, kontak_ortu, nama_wali, nik_wali, tgl_wali, pendidikan_wali, pekerjaan_wali, penghasilan_wali, kontak_wali, npsn_sekolah, asal_sekolah, nama_sekolah, status_sekolah, alamat_sekolah, no_ijazah, no_skhun, file_ijazah, file_skhun, file_sksd, file_ktp, file_kk, file_ktp_ibu, file_prestasi, file_akte, file_raport, ipa, matematika, bahasa_indonesia, bahasa_inggris, ipa_1, matematika_1, indonesia_1, inggris_1,ipa_2, matematika_2, indonesia_2, inggris_2,ipa_3, matematika_3, indonesia_3, inggris_3, ipa_4, matematika_4, indonesia_4, inggris_4, ipa_5, matematika_5, indonesia_5, inggris_5, kode_refrensi, bukti_transfer, tgl_pembayaran, status_pembayaran FROM ppdb_siswa INNER JOIN ppdb_ortu ON ppdb_siswa.id_siswa=ppdb_ortu.id_siswa INNER JOIN ppdb_asalsekolah ON ppdb_siswa.id_siswa=ppdb_asalsekolah.id_siswa INNER JOIN ppdb_dokumen ON ppdb_siswa.id_siswa=ppdb_dokumen.id_siswa INNER JOIN ppdb_raport ON ppdb_siswa.id_siswa=ppdb_raport.id_siswa INNER JOIN ppdb_un ON ppdb_siswa.id_siswa=ppdb_un.id_siswa INNER JOIN ppdb_pembayaran ON ppdb_siswa.id_siswa=ppdb_pembayaran.id_siswa WHERE ppdb_siswa.id_siswa='{$data}'";
    $perintah = query($sql);
    return $perintah;
}
function CekNisn($data)
{
    $sql = "SELECT nisn FROM ppdb_siswa WHERE nisn =?";
    if ($stmt = prepare($sql)) {
        $stmt->bind_param("s", $param_nisn);
        $param_nisn = $data;
        if ($stmt->execute()) {
            $stmt->store_result();
            if ($stmt->num_rows == 1) {
                return true;
            } else {
                return false;
            }
        }
    }
    $stmt->close();
}
function SimpanDataMhs($nomor_pendaftaran, $no_ktp, $no_kk, $nisn, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $agama, $golongan_darah, $tinggi_badan, $berat_badan, $riwayat_penyakit, $status_keluarga, $anak_ke, $jml_saudara, $mode_transportasi, $tempat_tinggal, $jarak_rumah, $titik_koordinat, $hobi, $prestasi, $alamat, $dusun, $rt, $rw, $desa, $kecamatan, $kabupaten, $provinsi, $kontak_siswa, $foto, $jurusan, $jalur_pendaftaran, $kelas, $no_kks, $no_pkh, $no_kip, $id)
{
    global $FileItem, $FileDestination;
    $sql = "UPDATE ppdb_siswa SET nomor_pendaftaran=?, no_ktp=?, no_kk=?, nisn=?, nama=?, jl=?, tempat_lahir=?, tanggal_lahir=?, agama=?, golongan_darah=?, tinggi_badan=?, berat_badan=?, riwayat_penyakit=?, status_keluarga=?, anak_ke=?, jml_saudara=?, mode_transportasi=?, tempat_tinggal=?, jarak_rumah=?, titik_koordinat=?, hobi=?, prestasi=?, alamat=?, dusun=?, rt=?, rw=?, desa=?, kecamatan=?, kabupaten=?, provinsi=?, kontak_siswa=?, foto=?, jurusan=?, jalur_pendaftaran=?, kelas=?, no_kks=?, no_pkh=?, no_kip=? WHERE id_siswa=? ";
    if ($stmt = prepare($sql)) {
        $stmt->bind_param("ssssssssssssssssssssssssssssssssssssssi", $param_nomor, $param_ktp, $param_kk, $param_nisn, $param_nama, $param_jl, $param_tmplahir, $param_tgllahir, $param_agama, $param_gol, $param_tinggi, $param_berat, $param_riwayat, $param_status_kel, $param_anak_ke, $param_jml_saudara, $param_mode_transportasi, $param_tempat_tinggal, $param_jarak_rumah, $param_koordinat, $param_hobi, $param_prestasi, $param_alamat, $param_dusun, $param_rt, $param_rw, $param_desa, $param_kec, $param_kab, $param_prov, $param_kontak, $param_foto, $param_jurusan, $param_jalur, $param_kelas, $param_kks, $param_pkh, $param_kip, $param_id);
        $param_nomor = $nomor_pendaftaran;
        $param_ktp = $no_ktp;
        $param_kk = $no_kk;
        $param_nisn = $nisn;
        $param_nama = $nama;
        $param_jl = $jenis_kelamin;
        $param_tmplahir = $tempat_lahir;
        $param_tgllahir = $tanggal_lahir;
        $param_agama = $agama;
        $param_gol = $golongan_darah;
        $param_tinggi = $tinggi_badan;
        $param_berat = $berat_badan;
        $param_riwayat = $riwayat_penyakit;
        $param_status_kel = $status_keluarga;
        $param_anak_ke = $anak_ke;
        $param_jml_saudara = $jml_saudara;
        $param_mode_transportasi = $mode_transportasi;
        $param_tempat_tinggal = $tempat_tinggal;
        $param_jarak_rumah = $jarak_rumah;
        $param_koordinat = $titik_koordinat;
        $param_hobi = $hobi;
        $param_prestasi = $prestasi;
        $param_dusun = $dusun;
        $param_rt = $rt;
        $param_rw = $rw;
        $param_desa = $desa;
        $param_kec = $kecamatan;
        $param_kab = $kabupaten;
        $param_prov = $provinsi;
        $param_kontak = $kontak_siswa;
        $param_alamat = $alamat;
        $param_foto = $FileItem;
        $param_jurusan = $jurusan;
        $param_jalur = $jalur_pendaftaran;
        $param_kelas = $kelas;
        $param_kks = $no_kks;
        $param_pkh = $no_pkh;
        $param_kip = $no_kip;
        $param_id = $id;
        if (empty($_FILES["foto"]["tmp_name"])) {
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            if ($stmt->execute() && move_uploaded_file($foto, $FileDestination . $FileItem)) {
                return true;
            } else {
                return false;
            }
        }
    }
}
function SimpanDataOrtu($nama_ayah, $nik_ayah, $tgl_ayah, $status_ayah, $pendidikan_ayah, $pekerjaan_ayah, $penghasilan_ayah, $nama_ibu, $nik_ibu, $tgl_ibu, $status_ibu, $pendidikan_ibu, $pekerjaan_ibu, $penghasilan_ibu, $kontak_ortu, $nama_wali, $nik_wali, $tgl_wali, $pendidikan_wali, $pekerjaan_wali, $penghasilan_wali, $kontak_wali, $id)
{
    $sql = "UPDATE ppdb_ortu SET nama_ayah=?, nik_ayah=?,  tgl_ayah=?, status_ayah=?, pendidikan_ayah=?, pekerjaan_ayah=?, penghasilan_ayah=?, nama_ibu=?, nik_ibu=?,  tgl_ibu=?, status_ibu=?, pendidikan_ibu=?, pekerjaan_ibu=?, penghasilan_ibu=?, kontak_ortu=?, nama_wali=?, nik_wali=?,  tgl_wali=?, pendidikan_wali=?, pekerjaan_wali=?, penghasilan_wali=?, kontak_wali=? WHERE id_siswa=? ";
    if ($stmt = prepare($sql)) {
        $stmt->bind_param("ssssssssssssssssssssssi", $param_ayah, $param_nik_ayah, $param_tgl_ayah, $param_status_ayah, $param_pendidikan_ayah, $param_pekerjaan_ayah, $param_penghasilan_ayah, $param_ibu, $param_nik_ibu, $param_tgl_ibu, $param_status_ibu, $param_pendidikan_ibu, $param_pekerjaan_ibu, $param_penghasilan_ibu, $param_kontak, $param_wali, $param_nik_wali, $param_tgl_wali, $param_pendidikan_wali, $param_pekerjaan_wali, $param_penghasilan_wali, $param_kontak_wali, $param_id);
        $param_ayah = $nama_ayah;
        $param_nik_ayah = $nik_ayah;
        $param_tgl_ayah = $tgl_ayah;
        $param_status_ayah = $status_ayah;
        $param_pendidikan_ayah = $pendidikan_ayah;
        $param_pekerjaan_ayah = $pekerjaan_ayah;
        $param_penghasilan_ayah = $penghasilan_ayah;
        $param_ibu = $nama_ibu;
        $param_nik_ibu = $nik_ibu;
        $param_tgl_ibu = $tgl_ibu;
        $param_status_ibu = $status_ibu;
        $param_pendidikan_ibu = $pendidikan_ibu;
        $param_pekerjaan_ibu = $pekerjaan_ibu;
        $param_penghasilan_ibu = $penghasilan_ibu;
        $param_kontak = $kontak_ortu;
        $param_wali = $nama_wali;
        $param_nik_wali = $nik_wali;
        $param_tgl_wali = $tgl_wali;
        $param_pendidikan_wali = $pendidikan_wali;
        $param_pekerjaan_wali = $pekerjaan_wali;
        $param_penghasilan_wali = $penghasilan_wali;
        $param_kontak_wali = $kontak_wali;
        $param_id = $id;
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    $stmt->close();
}
function SimpanAsalSekolah($npsn_sekolah, $asal_sekolah, $nama_sekolah, $status_sekolah, $alamat_sekolah, $no_ijazah, $no_skhun, $id)
{
    $sql = "UPDATE ppdb_asalsekolah SET npsn_sekolah=?, asal_sekolah=?, nama_sekolah=?, status_sekolah=?, alamat_sekolah=?, no_ijazah=?, no_skhun=? WHERE id_siswa =?";
    if ($stmt = prepare($sql)) {
        $stmt->bind_param("sssssssi", $param_npsn, $param_asal_sekolah, $param_nama, $param_status, $param_alamat, $param_ijazah, $param_skhun, $param_id);
        $param_npsn = $npsn_sekolah;
        $param_asal_sekolah = $asal_sekolah;
        $param_nama = $nama_sekolah;
        $param_status = $status_sekolah;
        $param_alamat = $alamat_sekolah;
        $param_ijazah = $no_ijazah;
        $param_skhun = $no_skhun;
        $param_id = $id;
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    $stmt->close();
}
function SimpanIjazah($ijazah, $id)
{
    global $FileItem, $FileDestination;
    $sql = "UPDATE ppdb_dokumen SET file_ijazah=? WHERE id_siswa=? ";
    if ($stmt = prepare($sql)) {
        $stmt->bind_param("si", $param_ijazah, $param_id);
        $param_ijazah = $FileItem;
        $param_id = $id;
        if ($stmt->execute() && move_uploaded_file($ijazah, $FileDestination . $FileItem)) {
            return true;
        } else {
            return false;
        }
    }
    $stmt->close();
}
function SimpanSksd($sksd, $id)
{
    global $FileItem, $FileDestination;
    $sql = "UPDATE ppdb_dokumen SET file_sksd=? WHERE id_siswa=? ";
    if ($stmt = prepare($sql)) {
        $stmt->bind_param("si", $param_sksd, $param_id);
        $param_sksd = $FileItem;
        $param_id = $id;
        if ($stmt->execute() && move_uploaded_file($sksd, $FileDestination . $FileItem)) {
            return true;
        } else {
            return false;
        }
    }
    $stmt->close();
}
function SimpanSkhun($skhun, $id)
{
    global $FileItem, $FileDestination;
    $sql = "UPDATE ppdb_dokumen SET file_skhun=? WHERE id_siswa=? ";
    if ($stmt = prepare($sql)) {
        $stmt->bind_param("si", $param_skhun, $param_id);
        $param_skhun = $FileItem;
        $param_id = $id;
        if ($stmt->execute() && move_uploaded_file($skhun, $FileDestination . $FileItem)) {
            return true;
        } else {
            return false;
        }
    }
    $stmt->close();
}
function SimpanKtp($ktp, $id)
{
    global $FileItem, $FileDestination;
    $sql = "UPDATE ppdb_dokumen SET file_ktp=? WHERE id_siswa=? ";
    if ($stmt = prepare($sql)) {
        $stmt->bind_param("si", $param_ktp, $param_id);
        $param_ktp = $FileItem;
        $param_id = $id;
        if ($stmt->execute() && move_uploaded_file($ktp, $FileDestination . $FileItem)) {
            return true;
        } else {
            return false;
        }
    }
    $stmt->close();
}
function SimpanKtp_Ibu($ktp, $id)
{
    global $FileItem, $FileDestination;
    $sql = "UPDATE ppdb_dokumen SET file_ktp_ibu=? WHERE id_siswa=? ";
    if ($stmt = prepare($sql)) {
        $stmt->bind_param("si", $param_ktp, $param_id);
        $param_ktp = $FileItem;
        $param_id = $id;
        if ($stmt->execute() && move_uploaded_file($ktp, $FileDestination . $FileItem)) {
            return true;
        } else {
            return false;
        }
    }
    $stmt->close();
}
function SimpanSertifikat($prestasi, $id)
{
    global $FileItem, $FileDestination;
    $sql = "UPDATE ppdb_dokumen SET file_prestasi=? WHERE id_siswa=?";
    if ($stmt = prepare($sql)) {
        $stmt->bind_param("si", $param_prestasi, $param_id);
        $param_prestasi = $FileItem;
        $param_id = $id;
        if ($stmt->execute() && move_uploaded_file($prestasi, $FileDestination . $FileItem)) {
            return true;
        } else {
            return false;
        }
    }
    $stmt->close();
}
function SimpanKartuKeluarga($kartu_keluarga, $id)
{
    global $FileItem, $FileDestination;
    $sql = "UPDATE ppdb_dokumen SET file_kk=? WHERE id_siswa=? ";
    if ($stmt = prepare($sql)) {
        $stmt->bind_param("si", $param_kartukeluarga, $param_id);
        $param_kartukeluarga = $FileItem;
        $param_id = $id;
        if ($stmt->execute() && move_uploaded_file($kartu_keluarga, $FileDestination . $FileItem)) {
            return true;
        } else {
            return false;
        }
    }
    $stmt->close();
}
function Simpan_Akte($akte, $id)
{
    global $FileItem, $FileDestination;
    $sql = "UPDATE ppdb_dokumen SET file_akte=? WHERE id_siswa=?";
    if ($stmt = prepare($sql)) {
        $stmt->bind_param("si", $param_akte, $param_id);
        $param_akte = $FileItem;
        $param_id = $id;
        if ($stmt->execute() && move_uploaded_file($akte, $FileDestination . $FileItem)) {
            return true;
        } else {
            return false;
        }
    }
    $stmt->close();
}
function Simpan_Raport($raport, $id)
{
    global $FileItem, $FileDestination;
    $sql = "UPDATE ppdb_dokumen SET file_raport=? WHERE id_siswa=?";
    if ($stmt = prepare($sql)) {
        $stmt->bind_param("si", $param_raport, $id);
        $param_raport = $FileItem;
        $param_id = $id;
        if ($stmt->execute() && move_uploaded_file($raport, $FileDestination . $FileItem)) {
            return true;
        } else {
            return false;
        }
    }
    $stmt->close();
}
function SimpanProfile($nama, $email, $username, $password, $id)
{
    $sql = "UPDATE ppdb_user SET nama=?, email=?, username=?, password=? WHERE id=?";
    if ($stmt = prepare($sql)) {
        $stmt->bind_param("ssssi", $param_nama, $param_email, $param_username, $param_password, $param_id);
        $param_nama = $nama;
        $param_email = $email;
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);
        $param_id = $id;
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    $stmt->close();
}
function SimpanNilaiRaport($nisn, $nama, $ipa_1, $matematika_1, $indonesia_1, $inggris_1, $ipa_2, $matematika_2, $indonesia_2, $inggris_2, $ipa_3, $matematika_3, $indonesia_3, $inggris_3, $ipa_4, $matematika_4, $indonesia_4, $inggris_4, $ipa_5, $matematika_5, $indonesia_5, $inggris_5, $id)
{
    $sql = "UPDATE ppdb_raport SET nisn=?, nama=?, ipa_1=?, matematika_1=?, indonesia_1=?, inggris_1=?, ipa_2=?, matematika_2=?, indonesia_2=?, inggris_2=?, ipa_3=?, matematika_3=?, indonesia_3=?, inggris_3=?, ipa_4=?, matematika_4=?, indonesia_4=?, inggris_4=?, ipa_5=?, matematika_5=?, indonesia_5=?, inggris_5=? WHERE id_siswa=?";
    if ($stmt = prepare($sql)) {
        $stmt->bind_param("ssssssssssssssssssssssi", $param_nisn, $param_nama, $param_ipa_1, $param_matematika_1, $param_indonesia_1, $param_inggris_1, $param_ipa_2, $param_matematika_2, $param_indonesia_2, $param_inggris_2, $param_ipa_3, $param_matematika_3, $param_indonesia_3, $param_inggris_3, $param_ipa_4, $param_matematika_4, $param_indonesia_4, $param_inggris_4, $param_ipa_5, $param_matematika_5, $param_indonesia_5, $param_inggris_5, $param_id);
        $param_nisn = $nisn;
        $param_nama = $nama;
        $param_ipa_1 = $ipa_1;
        $param_matematika_1 = $matematika_1;
        $param_indonesia_1 = $indonesia_1;
        $param_inggris_1 = $inggris_1;
        $param_ipa_2 = $ipa_2;
        $param_matematika_2 = $matematika_2;
        $param_indonesia_2 = $indonesia_2;
        $param_inggris_2 = $inggris_2;
        $param_ipa_3 = $ipa_3;
        $param_matematika_3 = $matematika_3;
        $param_indonesia_3 = $indonesia_3;
        $param_inggris_3 = $inggris_3;
        $param_ipa_4 = $ipa_4;
        $param_matematika_4 = $matematika_4;
        $param_indonesia_4 = $indonesia_4;
        $param_inggris_4 = $inggris_4;
        $param_ipa_5 = $ipa_5;
        $param_matematika_5 = $matematika_5;
        $param_indonesia_5 = $indonesia_5;
        $param_inggris_5 = $inggris_5;
        $param_id = $id;
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    $stmt->close();
}
function SimpanNilaiUn($nisn, $nama, $ipa, $matematika, $bahasa_indonesia, $bahasa_inggris, $id)
{
    $sql = "UPDATE ppdb_un SET nisn=?, nama=?, ipa=?, matematika=?, bahasa_indonesia=?, bahasa_inggris=? WHERE id_siswa=?";
    if ($stmt = prepare($sql)) {
        $stmt->bind_param("ssssssi", $param_nisn, $param_nama, $param_ipa, $param_mate, $param_indo, $param_ingg, $param_id);
        $param_nisn = $nisn;
        $param_nama = $nama;
        $param_ipa = $ipa;
        $param_mate = $matematika;
        $param_indo = $bahasa_indonesia;
        $param_ingg = $bahasa_inggris;
        $param_id = $id;
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    $stmt->close();
}
function SimpanDataPembayaran($nomor_pendaftaran, $nama, $bukti_transfer, $id)
{
    global $FileItem, $FileDestination;
    $sql = "UPDATE ppdb_pembayaran SET nomor_pendaftaran=?, nama=?, bukti_transfer=? WHERE id_siswa=?";
    if ($stmt = prepare($sql)) {
        $stmt->bind_param("sssi", $param_nomor, $param_nama, $param_bukti, $param_id);
        $param_nomor = $nomor_pendaftaran;
        $param_nama = $nama;
        $param_bukti = $FileItem;
        $param_id = $id;
        if (empty($_FILES["bukti_transfer"]["tmp_name"])) {
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            if ($stmt->execute() && move_uploaded_file($bukti_transfer, $FileDestination . $FileItem)) {
                return true;
            } else {
                return false;
            }
        }
    }
    $stmt->close();
}
function NilaiRaport($ipa, $matematika, $bhs_indonesia, $bhs_inggris)
{
    if (is_numeric($ipa) && is_numeric($matematika) && is_numeric($bhs_indonesia) && is_numeric($bhs_inggris)) {
        $nilai = $ipa + $matematika + $bhs_indonesia + $bhs_inggris;
        return $nilai / 4;
    } else {
        echo "-";
    }
}
function NilaiUN($un_ipa, $un_matematika, $un_indonesia, $un_inggris)
{
    if (is_numeric($un_ipa) && is_numeric($un_matematika) && is_numeric($un_indonesia) && is_numeric($un_inggris)) {
        $nilai = $un_ipa + $un_matematika + $un_indonesia + $un_inggris;
        return $nilai / 4;
    } else {
        echo "-";
    }
}
function Nilai_Rata_Raport($d1, $d2, $d3, $d4, $d5)
{
    $data = $d1 + $d2 + $d3 + $d4 + $d5;
    return $data / 5;
}
function InfoPmb()
{
    $sql = "SELECT id, judul, isi FROM ppdb_info";
    $perintah = query($sql);
    return $perintah;
}
function RemoveFoto($data)
{
    $perintah = unlink("content/foto/" . $data . '');
    if ($perintah) {
        return true;
    } else {
        return false;
    }
}
function RemoveFotoUpdate($data, $id)
{
    $sql = "UPDATE ppdb_siswa SET foto=? WHERE id=?";
    if ($stmt = prepare($sql)) {
        $stmt->bind_param("si", $param_foto, $param_id);
        $param_foto = $data;
        $param_id = $id;
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    $stmt->close();
}
function RemoveBayar($data)
{
    $perintah = unlink("content/pembayaran/" . $data . '');
    if ($perintah) {
        return true;
    } else {
        return false;
    }
}
function RemoveBayarUpdate($data, $id)
{
    $sql = "UPDATE ppdb_pembayaran SET bukti_transfer=? WHERE id=?";
    if ($stmt = prepare($sql)) {
        $stmt->bind_param("si", $param_bukti, $param_id);
        $param_bukti = $data;
        $param_id = $id;
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    $stmt->close();
}
function InfoPmbTampil()
{
    echo "\n\t\t\t<div id=\"content\" class=\"p-4 p-md-5 pt-5\">\n\t\t\t<ol class=\"breadcrumb mt-4\">\n\t                <li class=\"breadcrumb-item\">\n\t                  <a href=\"home\">Kembali</a>\n\t                </li>\n\t                <li class=\"breadcrumb-item active\">Informasi Pendaftaran</li>\n\t              </ol>\n\t              ";
    $result = InfoPmb();
    if ($result) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                echo "<div id='accordion'>";
                echo "<div class='card'>";
                echo "<div class='card-header' id='heading" . $row["id"] . "'>";
                echo "<h5 class='mb-0'>";
                echo " <button class='btn btn-text' data-toggle='collapse' data-target='#collapse" . $row["id"] . "' aria-expanded='true' aria-controls='collapse" . $row["id"] . "'>\n\t\t\t\t\t          " . $row["judul"] . "\n\t\t\t\t\t        </button>";
                echo "</h5>";
                echo "</div>";
                echo "<div id='collapse" . $row["id"] . "' class='collapse' aria-labelledby='heading" . $row["id"] . "' data-parent='#accordion'>";
                echo "<div class='card-body'>";
                echo htmlspecialchars_decode($row["isi"]);
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            $result->free_result();
        } else {
            echo "Belum ada informasi";
        }
    }
    echo "<br/>\n\t\t\t\n\t\t\t</div>\n\t\t\t";
}
function LoginUser($username, $password)
{
    global $id, $nama, $email;
    $sql = "SELECT id, nama, email, username, password FROM ppdb_user WHERE username=?";
    if ($stmt = prepare($sql)) {
        $stmt->bind_param("s", $param_username);
        $param_username = $username;
        if ($stmt->execute()) {
            $stmt->store_result();
            if ($stmt->num_rows == 1) {
                $stmt->bind_result($id, $nama, $email, $username, $hashed_password);
                if ($stmt->fetch()) {
                    if (password_verify($password, $hashed_password)) {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        }
    }
    $stmt->close();
}
function DataSitus()
{
    $sql = "SELECT nama_situs, alamat_situs, deskripsi_situs, metatag_situs, kontak_situs, author_situs, logo_situs, sidebarlogo_situs, pendaftaran, virtual_account, tema FROM ppdb_setting";
    $perintah = query($sql);
    return $perintah;
}
function GlobalDataSitus()
{
    global $GlobalDataSitus;
    $DataSitus = DataSitus();
    $RowSitus = $DataSitus->fetch_array();
    $nama_situs = $RowSitus["nama_situs"];
    $alamat_situs = $RowSitus["alamat_situs"];
    $deskripsi_situs = $RowSitus["deskripsi_situs"];
    $metatag_situs = $RowSitus["metatag_situs"];
    $kontak_situs = $RowSitus["kontak_situs"];
    $author_situs = $RowSitus["author_situs"];
    $logo_situs = $RowSitus["logo_situs"];
    $sidebarlogo_situs = $RowSitus["sidebarlogo_situs"];
    $BukaTutupDaftar = $RowSitus["pendaftaran"];
    $virtual_account = $RowSitus["virtual_account"];
    $tema = $RowSitus["tema"];
    $GlobalDataSitus = array($nama_situs, $alamat_situs, $deskripsi_situs, $metatag_situs, $kontak_situs, $author_situs, $logo_situs, $sidebarlogo_situs, $BukaTutupDaftar, $virtual_account, $tema);
}
function navigasi()
{
    $DataSitus = DataSitus();
    $RowSitus = $DataSitus->fetch_array();
    echo "\n\t\t<body>\t\t\n\t\t<div class=\"wrapper d-flex align-items-stretch\">";
    if ($RowSitus["tema"] == "sidebar07") {
        echo "\t\t\n\n\t\t\t\t<nav id=\"sidebar\" class=\"active\">\t\t\t\t\t \n\t\t\t\t\t\t\t<h1><a href=\"home\" class=\"logo\" >\t\t\n\t\t\t\t\t\t\t<img class=\"img-fluid\" src=\"assets/img/" . $RowSitus["sidebarlogo_situs"] . "\"></a>\n\t\t\t\t\t\t\t</h1>\t\n\t\t\t\t\t\t\t\n\t\t\t\t\t";
        if (isset($_SESSION["username"])) {
            echo "\n\t\t\t\t        <ul class=\"list-unstyled components mb-5\">\n\t\t\t\t          <li class=\"active\">\n\t\t\t\t            <a href=\"home\"><span class=\"fa fa-home\"></span> Home</a>\n\t\t\t\t          </li>\n\t\t\t\t           <li>\n\t\t\t\t\t\t        <a href=\"profile\"><span class=\"fa fa-user mr-3\"></span> profile</a>\n\t\t\t\t\t\t   </li>\n\t\t\t\t\t\t   <li>\n\t\t\t\t\t\t     \t<a href=\"home?page=info\"><span class=\"fa fa-bullhorn mr-3\"></span> Info</a>\n\t\t\t\t\t\t   </li>         \n\t\t\t\t\t\t   <li>\n\t\t\t\t\t\t        <a href=\"logout.php\"><span class=\"fa fa-sign-out-alt mr-3\"></span>Logout</a>\n\t\t\t\t\t\t    </li>\n\t\t\t\t\t\t   \n\t\t\t\t\t\t    <li>\n\t\t\t\t\t\t        <a href=\"home?page=hubungi-kami\"><span class=\"fa fa-phone mr-3\"></span>Kontak</a>\n\t\t\t\t\t\t    </li>\n\t\t\t\t\t\t    <li>\n\t\t\t\t\t\t        <a href=\"home?page=panduan\"><span class=\"fab fa-youtube mr-3\"></span>Panduan Daftar</a>\n\t\t\t\t\t\t    </li>\t\n\t\t\t\t         \n\t\t\t\t        </ul>";
        } else {
            echo "\n\t\t\t\t        <ul class=\"list-unstyled components mb-5\">\n\t\t\t\t          <li class=\"active\">\n\t\t\t\t            <a href=\"home\"><span class=\"fa fa-home\"></span> Home</a>\n\t\t\t\t          </li>\n\t\t\t\t          <li>\n\t\t\t\t              <a href=\"home?page=info\"><span class=\"fa fa-bullhorn mr-3\"></span>Info</a>\n\t\t\t\t          </li>\n\t\t\t\t          <li>\n\t\t\t\t            <a href=\"buat-akun\"><span class=\"fa fa-user-plus mr-3\"></span>Daftar</a>\n\t\t\t\t          </li>\n\t\t\t\t          <li>\n\t\t\t\t\t\t     <a href=\"login\"><span class=\"fa fa-sign-in-alt mr-3\"></span>Login</a>\n\t\t\t\t\t\t  </li>\n\t\t\t\t          <li>\n\t\t\t\t            <a href=\"home?page=hubungi-kami\"><span class=\"fa fa-phone mr-3\"></span>Kontak</a>\n\t\t\t\t          </li>\n\t\t\t\t          <li>\n\t\t\t\t\t\t        <a href=\"home?page=panduan\"><span class=\"fab fa-youtube mr-3\"></span>Panduan Daftar</a>\n\t\t\t\t\t\t    </li>\t\n\t\t\t\t        </ul>";
        }
        echo "\n\n\t\t\t        <div class=\"footer\">\n\t\t\t        \t<p>\n\t\t\t\t\t\t\t\t  Copyright &copy;<script>document.write(new Date().getFullYear());</script> " . $RowSitus["nama_situs"] . " <a href=\"https://root93.co.id\" target=\"_blank\" rel=\"dofollow\">root93</a>\n\t\t\t\t\t\t\t\t</p>\n\t\t\t        </div>\n\t\t\t    \t</nav>\n\t\t\t      \n\n\n\n\t\t\t\t";
    } elseif ($RowSitus["tema"] == "sidebar05") {
        echo "\n\t\t\t\n\t\t\t\t\t\t<nav id=\"sidebar\">\n\t\t\t\t\t\t\t<div class=\"custom-menu\">\n\t\t\t\t\t\t\t\t<button type=\"button\" id=\"sidebarCollapse\" class=\"btn btn-primary\">\n\t\t\t\t          <i class=\"fa fa-bars\"></i>\n\t\t\t\t          <span class=\"sr-only\">Toggle Menu</span>\n\t\t\t\t        </button>\n\t\t\t        </div>\n\t\t\t\t\t<div class=\"p-4\">\n\t\t\t\t\t<img class=\"img-fluid\" src=\"assets/img/" . $RowSitus["sidebarlogo_situs"] . "\"></a>\n\t\t\t  \t\t<h1><a href=\"home\" class=\"logo\">" . $RowSitus["nama_situs"] . " <span>" . substr($RowSitus["alamat_situs"], 0, 50) . "...</span></a></h1>\n\t\t\t  \t\t";
        if (isset($_SESSION["username"])) {
            echo "\n\t\t\t\t        <ul class=\"list-unstyled components mb-5\">\n\t\t\t\t          <li class=\"active\">\n\t\t\t\t            <a href=\"home\"><span class=\"fa fa-home mr-3\"></span> Home</a>\n\t\t\t\t          </li>\n\n\t\t\t\t       \t  <li>\n\t\t\t\t            <a href=\"profile\"><span class=\"fa fa-user mr-3\"></span> profile</a>\n\t\t\t\t          </li>\n\t\t\t\t          <li>\n\t\t\t\t            <a href=\"home?page=info\"><span class=\"fa fa-bullhorn mr-3\"></span> Informasi</a>\n\t\t\t\t          </li>         \n\t\t\t\t   \n\t\t\t\t          <li>\n\t\t\t\t            <a href=\"logout.php\"><span class=\"fa fa-sign-out-alt mr-3\"></span> Sign Out</a>\n\t\t\t\t          </li>\n\t\t\t\t          <li>\n\t\t\t\t            <a href=\"home?page=hubungi-kami\"><span class=\"fa fa-phone mr-3\"></span> Hubungi Kami</a>\n\t\t\t\t          </li>\t\n\t\t\t\t          <li>\n\t\t\t\t\t\t        <a href=\"home?page=panduan\"><span class=\"fab fa-youtube mr-3\"></span>Panduan Daftar</a>\n\t\t\t\t\t\t    </li>\t\n\t\t\t\t        </ul>\n\t\t\t\t       ";
        } else {
            echo "\n\t\t\t\t        <ul class=\"list-unstyled components mb-5\">\n\t\t\t\t          <li class=\"active\">\n\t\t\t\t            <a href=\"home\"><span class=\"fa fa-home mr-3\"></span> Home</a>\n\t\t\t\t          </li>\n\t\t\t\t   \n\t\t\t\t          <li>\n\t\t\t\t            <a href=\"home?page=info\"><span class=\"fa fa-bullhorn mr-3\"></span> Informasi</a>\n\t\t\t\t          </li>\n\t\t\t\t          <li>\n\t\t\t\t            <a href=\"buat-akun\"><span class=\"fa fa-user-plus mr-3\"></span> Buat Akun</a>\n\t\t\t\t          </li>\n\t\t\t\t      \n\t\t\t\t          <li>\n\t\t\t\t            <a href=\"login\"><span class=\"fa fa-sign-in-alt mr-3\"></span> Sign In</a>\n\t\t\t\t          </li>\n\t\t\t\t         <li>\n\t\t\t\t            <a href=\"home?page=hubungi-kami\"><span class=\"fa fa-phone mr-3\"></span> Hubungi Kami</a>\n\t\t\t\t          </li>\t\n\t\t\t\t         <li>\n\t\t\t\t\t\t        <a href=\"home?page=panduan\"><span class=\"fab fa-youtube mr-3\"></span>Panduan Daftar</a>\n\t\t\t\t\t\t </li>\t\n\t\t\t\t        </ul>\n\t\t\t\t       ";
        }
        echo "\n\n\t\t        \n\n\t\t         <div class=\"footer\">\n\t\t\t        \t<p>\n\t\t\t\t\t\t\t\t  Copyright &copy;<script>document.write(new Date().getFullYear());</script> " . $RowSitus["nama_situs"] . " <a href=\"https://root93.co.id\" target=\"_blank\" rel=\"dofollow\">root93</a>\n\t\t\t\t\t\t\t\t</p>\n\t\t\t        </div>\n\t\t\t    \t\n\n\t\t      </div>\n\t    \t</nav>\n\n\t\t\t\t";
    } elseif ($RowSitus["tema"] == "sidebar03") {
        echo "\n\n\t\t\t<nav id=\"sidebar\">\n\t\t\t\t<div class=\"custom-menu\">\t\t\t\n\t\t\t\t\t<button type=\"button\" id=\"sidebarCollapse\" class=\"btn btn-warning\">\n\t\t\t\t\t\t<i class=\"fa fa-bars\"></i>\n\t\t\t\t        </button>\n\t\t\t        </div>\n\t\t\t\t  \t<div class=\"img bg-wrap text-center py-4\" style=\"background-image: url(assets/img/bg_1.jpg);\">\n\t\t\t\t  \t\t<div class=\"user-logo\">\n\t\t\t\t\t  \t\t<div class=\"img\" style=\"background-image: url(assets/img/" . $RowSitus["sidebarlogo_situs"] . ");\"></div>\n\t\t\t\t\t  \t\t\t<h3>" . $RowSitus["nama_situs"] . "</h3>\n\t\t\t\t\t  \t\t</div>\n\t\t\t\t  \t\t</div>\n\t\t\t\t  \t";
        if (isset($_SESSION["username"])) {
            echo "\n\t\t\t\t        <ul class=\"list-unstyled components mb-5\">\n\t\t\t\t          <li class=\"active\">\n\t\t\t\t            <a href=\"home\"><span class=\"fa fa-home mr-3\"></span> Home</a>\n\t\t\t\t          </li>\n\n\t\t\t\t       \t  <li>\n\t\t\t\t            <a href=\"profile\"><span class=\"fa fa-user mr-3\"></span> profile</a>\n\t\t\t\t          </li>\n\t\t\t\t          <li>\n\t\t\t\t            <a href=\"home?page=info\"><span class=\"fa fa-bullhorn mr-3\"></span> Informasi</a>\n\t\t\t\t          </li>         \n\t\t\t\t   \n\t\t\t\t          <li>\n\t\t\t\t            <a href=\"logout.php\"><span class=\"fa fa-sign-out-alt mr-3\"></span> Sign Out</a>\n\t\t\t\t          </li>\n\t\t\t\t          <li>\n\t\t\t\t            <a href=\"home?page=hubungi-kami\"><span class=\"fa fa-phone mr-3\"></span> Hubungi Kami</a>\n\t\t\t\t          </li>\n\t\t\t\t          <li>\n\t\t\t\t\t\t        <a href=\"home?page=panduan\"><span class=\"fab fa-youtube mr-3\"></span>Panduan Daftar</a>\n\t\t\t\t\t\t    </li>\t\t\n\t\t\t\t        </ul>\n\t\t\t\t       ";
        } else {
            echo "\n\t\t\t\t        <ul class=\"list-unstyled components mb-5\">\n\t\t\t\t          <li class=\"active\">\n\t\t\t\t            <a href=\"home\"><span class=\"fa fa-home mr-3\"></span> Home</a>\n\t\t\t\t          </li>\n\t\t\t\t   \n\t\t\t\t          <li>\n\t\t\t\t            <a href=\"home?page=info\"><span class=\"fa fa-bullhorn mr-3\"></span> Informasi</a>\n\t\t\t\t          </li>\n\t\t\t\t          <li>\n\t\t\t\t            <a href=\"buat-akun\"><span class=\"fa fa-user-plus mr-3\"></span> Buat Akun</a>\n\t\t\t\t          </li>\n\t\t\t\t      \n\t\t\t\t          <li>\n\t\t\t\t            <a href=\"login\"><span class=\"fa fa-sign-in-alt mr-3\"></span> Sign In</a>\n\t\t\t\t          </li>\n\t\t\t\t         <li>\n\t\t\t\t            <a href=\"home?page=hubungi-kami\"><span class=\"fa fa-phone mr-3\"></span> Hubungi Kami</a>\n\t\t\t\t          </li>\n\t\t\t\t         <li>\n\t\t\t\t\t\t        <a href=\"home?page=panduan\"><span class=\"fab fa-youtube mr-3\"></span>Panduan Daftar</a>\n\t\t\t\t\t\t    </li>\t\t\n\t\t\t\t        </ul>\n\t\t\t\t       ";
        }
        echo "\n\t\t\t\n\t\t\t\t\t        <div class=\"footer\">\n\t\t\t\t\t        \t<p class=\"small text-center\">Copyright &copy;<script>document.write(new Date().getFullYear());</script>" . $RowSitus["nama_situs"] . " <br>Proudly Powered by : <a href=\"https://root93.co.id\" target=\"_blank\" rel=\"dofollow\">Root93</a></p>\n\t\t\t\t\t        </div>\n\t\t\t\t\t      \n\t  \t\t\t\t\t\t \n\t\t      \n\t\t\t\t    </nav>\n\t\t\t\t     <div class=\"whatsapp-float\"><a title=\"WhatsApp\" href=\"https://wa.me/" . $RowSitus["kontak_situs"] . "?text=Saya%20ingin%20tahu%20informasi%20PPDB%20" . $RowSitus["nama_situs"] . "\" id=\"whatsapp-float\" title=\"back to top\"><i class=\"fab fa-whatsapp\"/></i> WhatsApp </a></div>\n\t\t\t\t";
    } else {
        if ($RowSitus["tema"] == NULL) {
            die("Tema belum di konfigurasi");
        }
    }
}
function head()
{
    $DataSitus = DataSitus();
    $RowSitus = $DataSitus->fetch_array();
    echo "\n\t\t<!DOCTYPE html>\n\t\t<html lang=\"en\">\n\t\t<head>\n\t\t<meta charset=\"utf-8\">\n\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">\n\t\t<meta name=\"description\" content=\"" . $RowSitus["deskripsi_situs"] . "\">\n\t\t<meta name=\"author\" content=\"" . $RowSitus["author_situs"] . "\">\n\t\t<link rel=\"icon\" href=\"assets/img/" . $RowSitus["logo_situs"] . "\">\n\t\t<title>" . $RowSitus["nama_situs"] . "</title>\n\t\t";
}
function css()
{
    $DataSitus = DataSitus();
    $RowSitus = $DataSitus->fetch_array();
    echo "\n\t\t<link href=\"https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900\" rel=\"stylesheet\">\n\t\t<link href=\"themes/vendor/fontawesome-free/css/all.min.css\" rel=\"stylesheet\" type=\"text/css\">\n\t\t<link href=\"themes/" . $RowSitus["tema"] . "/css/bootstrap.css\" rel=\"stylesheet\">\t\n\t\t<link href=\"themes/" . $RowSitus["tema"] . "/css/costum.css\" rel=\"stylesheet\">\n\t\t<link href=\"themes/vendor/bootstrap/datepicker/css/bootstrap-datepicker3.css\" rel=\"stylesheet\">\n\t\t</head>\n\t\t";
}
function footer()
{
    $DataSitus = DataSitus();
    $RowSitus = $DataSitus->fetch_array();
    echo "\n\t\t<!--\n\t\tPlease Dont Remove\n\t\tProgrammer Name : Ahmad Zaelani\n\t\tSite : https://root93.co.id\n\t\tWhatsApp : 087870693200\n\t\t-->\n\t\t\n\t\t<!-- /#wrapper -->\n\t\t</div>\t\n\t\t <!-- Bootstrap core JavaScript -->\n\t\t <script src=\"themes/vendor/jquery/jquery.min.js\"></script>\n\t\t <script src=\"themes/vendor/bootstrap/js/bootstrap.min.js\"></script>\n\t\t <script src=\"themes/vendor/bootstrap/datepicker/js/bootstrap-datepicker.js\"></script>\n\t\t <script src=\"themes/vendor/bootstrap/datepicker/js/datepicker-format.js\"></script>\n\t\t <script src=\"themes/" . $RowSitus["tema"] . "/js/popper.js\"></script>\n\t\t <script src=\"themes/" . $RowSitus["tema"] . "/js/main.js\"></script>\n\t\t \n\t\t \n\t\t  <script>\n\t\t    \$(\"#menu-toggle\").click(function(e) {\n\t\t      e.preventDefault();\n\t\t      \$(\"#wrapper\").toggleClass(\"toggled\");\n\t\t    });\n\t\t  </script>\n\t\t\n\t\t  </body>\n\t\t  </html>\n\n\t\t";
}
function NomorPendaftaran($data1, $data2)
{
    $perintah = $data1 + $data2;
    return $perintah;
}
function TampilJurusan()
{
    $sql = "SELECT id, jurusan FROM ppdb_jurusan";
    $perintah = query($sql);
    return $perintah;
}
function TampilJalur()
{
    $sql = "SELECT id, jalur_daftar FROM ppdb_jalur";
    $perintah = query($sql);
    return $perintah;
}
function Tampil_JadwalTest()
{
    $sql = "SELECT id, tanggal_test, waktu_test, materi FROM ppdb_jadwaltest";
    $perintah = query($sql);
    return $perintah;
}
function PengaturanPembayaran()
{
    $sql = "SELECT * FROM ppdb_setting_pembayaran WHERE id_setting=1";
    $perintah = query($sql);
    return $perintah;
}
