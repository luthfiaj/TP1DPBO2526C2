<?php 

// CLASS PEGAWAI

class Pegawai 
{ 
    private $IdPegawai; 
    private $Nama; 
    private $Jabatan; 
    private $Tugas; 
    private $Gaji; 
    private $StatusShift; 
 
    // constructor
    public function __construct( 
        $IdPegawai, 
        $Nama, 
        $Jabatan, 
        $Tugas, 
        $Gaji, 
        $StatusShift 
    ) { 
        $this->IdPegawai = $IdPegawai; 
        $this->Nama = $Nama; 
        $this->Jabatan = $Jabatan; 
        $this->Tugas = $Tugas; 
        $this->Gaji = $Gaji; 
        $this->StatusShift = $StatusShift; 
    } 
 
    // setter
    public function setIdPegawai($IdPegawai) 
    { 
        $this->IdPegawai = $IdPegawai; 
        return $IdPegawai; 
    } 
 
    public function setNama($Nama) 
    { 
        $this->Nama = $Nama; 
        return $Nama; 
    } 
 
    public function setJabatan($Jabatan) 
    { 
        $this->Jabatan = $Jabatan; 
        return $Jabatan; 
    } 
 
    public function setTugas($Tugas) 
    { 
        $this->Tugas = $Tugas; 
        return $Tugas; 
    } 
 
    public function setGaji($Gaji) 
    { 
        $this->Gaji = $Gaji; 
        return $Gaji; 
    } 
 
    public function setStatusShift($StatusShift) 
    { 
        $this->StatusShift = $StatusShift; 
        return $StatusShift; 
    } 
 
    // getter
    public function getIdPegawai() 
    { 
        return $this->IdPegawai; 
    } 
 
    public function getNama() 
    { 
        return $this->Nama; 
    } 
 
    public function getJabatan() 
    { 
        return $this->Jabatan; 
    } 
 
    public function getTugas() 
    { 
        return $this->Tugas; 
    } 
 
    public function getGaji() 
    { 
        return $this->Gaji; 
    } 
 
    // menentukan jam shift
    public function getStatusShift() 
    { 
        if (strtolower($this->StatusShift) == "pagi") { 
 
            return "08.00 - 13.00 WIB (Pagi)"; 
 
        } else if (strtolower($this->StatusShift) == "siang") { 
 
            return "13.00 - 18.00 WIB (Siang)"; 
 
        } else if (strtolower($this->StatusShift) == "malam") { 
 
            return "18.00 - 23.00 WIB (Malam)"; 
 
        } else { 
 
            return "Shift tidak tersedia"; 
        } 
    } 
} 
 
 
// DATA PEGAWAI

$daftarPegawai = []; 
 
// data awal
$daftarPegawai[] = new Pegawai( 
    "A2521001", 
    "Agus Yamaha", 
    "Kasir", 
    "Melayani pembelian tiket bioskop", 
    3500000, 
    "pagi" 
); 
 
$daftarPegawai[] = new Pegawai( 
    "A2521002", 
    "Budiono Siregar", 
    "Petugas Tiket", 
    "Memeriksa tiket penonton sebelum masuk studio", 
    3200000, 
    "siang" 
); 
 
$daftarPegawai[] = new Pegawai( 
    "A2521003", 
    "Yusup Telolet", 
    "Cleaning Service", 
    "Membersihkan studio setelah pemutaran film", 
    3000000, 
    "malam" 
); 
 
$daftarPegawai[] = new Pegawai( 
    "A2521004", 
    "Tedy Boy Friend Prabowo", 
    "Security", 
    "Menjaga keamanan area bioskop", 
    4000000, 
    "pagi" 
); 
 
$daftarPegawai[] = new Pegawai( 
    "A2521005", 
    "Luthfi Aulia Jodi", 
    "Supervisor / CEO", 
    "Mengawasi kegiatan operasional bioskop", 
    9999999, 
    "malam" 
); 
 
$jumlahPegawai = count($daftarPegawai); 
 
// format gaji
function formatGaji($gaji) 
{ 
    return number_format($gaji, 1, '.', ''); 
} 
 
// pesan
$pesan = ""; 
$jenisPesan = ""; 
 
// tambah data
if (isset($_POST["aksi"]) && $_POST["aksi"] == "tambah") { 
 
    if ($jumlahPegawai >= 100) { 
 
        $pesan = "Data pegawai sudah penuh."; 
        $jenisPesan = "error"; 
 
    } else { 
 
        $IdPegawai = $_POST["IdPegawai"]; 
        $Nama = $_POST["Nama"]; 
        $Jabatan = $_POST["Jabatan"]; 
        $Tugas = $_POST["Tugas"]; 
        $Gaji = $_POST["Gaji"]; 
        $StatusShift = $_POST["StatusShift"]; 
 
        $idSudahAda = false; 
 
        // cek ID
        for ($i = 0; $i < $jumlahPegawai; $i++) { 
 
            if ( 
                strtolower($daftarPegawai[$i]->getIdPegawai()) 
                == 
                strtolower($IdPegawai) 
            ) { 
 
                $idSudahAda = true; 
                break; 
            } 
        } 
 
        if ($idSudahAda == true) { 
 
            $pesan = "ID Pegawai sudah digunakan."; 
            $jenisPesan = "error"; 
 
        } else { 
 
            $daftarPegawai[] = new Pegawai( 
                $IdPegawai, 
                $Nama, 
                $Jabatan, 
                $Tugas, 
                $Gaji, 
                $StatusShift 
            ); 
 
            $jumlahPegawai++; 
 
            $pesan = "Data pegawai berhasil ditambahkan."; 
            $jenisPesan = "success"; 
        } 
    } 
} 
 
// ubah data
if (isset($_POST["aksi"]) && $_POST["aksi"] == "ubah") { 
 
    $cariId = $_POST["cariId"]; 
 
    for ($i = 0; $i < $jumlahPegawai; $i++) { 
 
        if ( 
            strtolower($daftarPegawai[$i]->getIdPegawai()) 
            == 
            strtolower($cariId) 
        ) { 
 
            $ubah = $_POST["ubah"]; 
 
            if ($ubah == "Nama") { 
 
                $daftarPegawai[$i]->setNama($_POST["nilai"]); 
 
                $pesan = "Nama berhasil diubah."; 
 
            } else if ($ubah == "Jabatan") { 
 
                $daftarPegawai[$i]->setJabatan($_POST["nilai"]); 
 
                $pesan = "Jabatan berhasil diubah."; 
 
            } else if ($ubah == "Tugas") { 
 
                $daftarPegawai[$i]->setTugas($_POST["nilai"]); 
 
                $pesan = "Tugas berhasil diubah."; 
 
            } else if ($ubah == "Gaji") { 
 
                $daftarPegawai[$i]->setGaji($_POST["nilai"]); 
 
                $pesan = "Gaji berhasil diubah."; 
 
            } else if ($ubah == "Shift") { 
 
                $daftarPegawai[$i]->setStatusShift($_POST["nilai"]); 
 
                $pesan = "Shift berhasil diubah."; 
            } 
 
            $jenisPesan = "success"; 
 
            break; 
        } 
    } 
} 
 
// hapus data
if (isset($_POST["aksi"]) && $_POST["aksi"] == "hapus") { 
 
    $hapusId = $_POST["hapusId"]; 
 
    $ditemukan = false; 
 
    for ($i = 0; $i < $jumlahPegawai; $i++) { 
 
        if ( 
            strtolower($daftarPegawai[$i]->getIdPegawai()) 
            == 
            strtolower($hapusId) 
        ) { 
 
            $ditemukan = true; 
 
            if ( 
                isset($_POST["konfirmasi"]) 
                && 
                strtolower($_POST["konfirmasi"]) == "ya" 
            ) { 
 
                // geser data
                for ($j = $i; $j < $jumlahPegawai - 1; $j++) { 
 
                    $daftarPegawai[$j] = $daftarPegawai[$j + 1]; 
                } 
 
                array_pop($daftarPegawai); 
 
                $jumlahPegawai--; 
 
                $pesan = "Data pegawai berhasil dihapus."; 
                $jenisPesan = "success"; 
 
            } else { 
 
                $pesan = "Penghapusan dibatalkan."; 
                $jenisPesan = "info"; 
            } 
 
            break; 
        } 
    } 
 
    if ($ditemukan == false) { 
 
        $pesan = "Pegawai dengan ID " . $hapusId . " tidak ditemukan."; 
        $jenisPesan = "error"; 
    } 
} 
 
// menu aktif
$menu = isset($_GET["menu"]) ? $_GET["menu"] : "home"; 
 
// pencarian
$hasilCari = null; 
 
if ($menu == "cari" && isset($_GET["nama"])) { 
 
    $cariNama = $_GET["nama"]; 
 
    for ($i = 0; $i < $jumlahPegawai; $i++) { 
 
        if ( 
            strtolower($daftarPegawai[$i]->getNama()) 
            == 
            strtolower($cariNama) 
        ) { 
 
            $hasilCari[] = $daftarPegawai[$i]; 
        } 
    } 
} 
 
// detail pegawai
$detailPegawai = null; 
 
if ($menu == "detail" && isset($_GET["id"])) { 
 
    $cariId = $_GET["id"]; 
 
    for ($i = 0; $i < $jumlahPegawai; $i++) { 
 
        if ( 
            strtolower($daftarPegawai[$i]->getIdPegawai()) 
            == 
            strtolower($cariId) 
        ) { 
 
            $detailPegawai = $daftarPegawai[$i]; 
            break; 
        } 
    } 
} 
 
?> 
 
<!DOCTYPE html> 
<html lang="id"> 
 
<head> 
 
    <meta charset="UTF-8"> 
 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
 
    <title>Sistem Data Pegawai Bioskop</title> 
 
    <style> 
 
        * { 
            margin: 0; 
            padding: 0; 
            box-sizing: border-box; 
        } 
 
        body { 
            font-family: Arial, Helvetica, sans-serif; 
            background: #0b0d12; 
            color: #ffffff; 
            min-height: 100vh; 
        } 
 
        .layout { 
            display: flex; 
            min-height: 100vh; 
        } 
 
        /* sidebar */
        .sidebar { 
            width: 260px; 
            background: #11141b; 
            border-right: 1px solid #242832; 
            padding: 25px 18px; 
            position: fixed; 
            left: 0; 
            top: 0; 
            bottom: 0; 
        } 
 
        .logo { 
            display: flex; 
            align-items: center; 
            gap: 12px; 
            margin-bottom: 40px; 
            padding: 0 10px; 
        } 
 
        .logo-icon { 
            width: 42px; 
            height: 42px; 
            border-radius: 12px; 
            background: linear-gradient(135deg, #7c3aed, #4f46e5); 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            font-size: 21px; 
        } 
 
        .logo-text h2 { 
            font-size: 16px; 
        } 
 
        .logo-text p { 
            color: #858b99; 
            font-size: 12px; 
            margin-top: 3px; 
        } 
 
        .menu-title { 
            color: #626978; 
            font-size: 11px; 
            text-transform: uppercase; 
            letter-spacing: 1px; 
            padding: 0 12px; 
            margin-bottom: 10px; 
        } 
 
        .nav a { 
            display: flex; 
            align-items: center; 
            gap: 12px; 
            color: #9da3b0; 
            text-decoration: none; 
            padding: 12px; 
            border-radius: 10px; 
            margin-bottom: 5px; 
            font-size: 14px; 
            transition: 0.2s; 
        } 
 
        .nav a:hover, 
        .nav a.active { 
            background: #1d2030; 
            color: #ffffff; 
        } 
 
        .nav-icon { 
            width: 25px; 
            text-align: center; 
        } 
 
        /* main */
        .main { 
            margin-left: 260px; 
            width: calc(100% - 260px); 
            padding: 35px; 
        } 
 
        .topbar { 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            margin-bottom: 30px; 
        } 
 
        .page-title h1 { 
            font-size: 28px; 
            margin-bottom: 7px; 
        } 
 
        .page-title p { 
            color: #858b99; 
            font-size: 14px; 
        } 
 
        .profile { 
            display: flex; 
            align-items: center; 
            gap: 12px; 
        } 
 
        .profile-avatar { 
            width: 42px; 
            height: 42px; 
            background: #252936; 
            border-radius: 50%; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
        } 
 
        .profile-text strong { 
            display: block; 
            font-size: 13px; 
        } 
 
        .profile-text span { 
            color: #777d8b; 
            font-size: 11px; 
        } 
 
        /* dashboard */
        .dashboard-grid { 
            display: grid; 
            grid-template-columns: repeat(4, 1fr); 
            gap: 18px; 
            margin-bottom: 25px; 
        } 
 
        .stat-card { 
            background: #151820; 
            border: 1px solid #242832; 
            border-radius: 16px; 
            padding: 20px; 
        } 
 
        .stat-top { 
            display: flex; 
            justify-content: space-between; 
            margin-bottom: 15px; 
        } 
 
        .stat-icon { 
            width: 40px; 
            height: 40px; 
            border-radius: 10px; 
            background: #202331; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
        } 
 
        .stat-label { 
            color: #818795; 
            font-size: 12px; 
        } 
 
        .stat-number { 
            font-size: 26px; 
            font-weight: bold; 
        } 
 
        /* content */
        .card { 
            background: #151820; 
            border: 1px solid #242832; 
            border-radius: 16px; 
            padding: 25px; 
            margin-bottom: 20px; 
        } 
 
        .card-header { 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            margin-bottom: 20px; 
        } 
 
        .card-header h2 { 
            font-size: 18px; 
        } 
 
        .card-header p { 
            color: #7e8492; 
            font-size: 13px; 
            margin-top: 5px; 
        } 
 
        /* table */
        .table-wrapper { 
            overflow-x: auto; 
        } 
 
        table { 
            width: 100%; 
            border-collapse: collapse; 
        } 
 
        th { 
            text-align: left; 
            color: #737987; 
            font-size: 11px; 
            text-transform: uppercase; 
            letter-spacing: 0.5px; 
            padding: 13px; 
            border-bottom: 1px solid #292d37; 
        } 
 
        td { 
            padding: 15px 13px; 
            border-bottom: 1px solid #222630; 
            color: #d8dbe2; 
            font-size: 13px; 
        } 
 
        tr:last-child td { 
            border-bottom: none; 
        } 
 
        .employee-name { 
            display: flex; 
            align-items: center; 
            gap: 10px; 
        } 
 
        .avatar { 
            width: 35px; 
            height: 35px; 
            border-radius: 10px; 
            background: #24283a; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            font-size: 13px; 
        } 
 
        .name-main { 
            color: white; 
            font-weight: bold; 
        } 
 
        .name-id { 
            color: #717785; 
            font-size: 11px; 
            margin-top: 3px; 
        } 
 
        .badge { 
            display: inline-block; 
            padding: 6px 10px; 
            border-radius: 20px; 
            font-size: 11px; 
            background: #222631; 
            color: #bfc3cc; 
        } 
 
        /* button */
        .btn { 
            display: inline-block; 
            border: none; 
            border-radius: 9px; 
            padding: 10px 15px; 
            color: white; 
            text-decoration: none; 
            cursor: pointer; 
            font-size: 13px; 
            transition: 0.2s; 
        } 
 
        .btn-primary { 
            background: #635bff; 
        } 
 
        .btn-primary:hover { 
            background: #5149e8; 
        } 
 
        .btn-danger { 
            background: #422025; 
            color: #ff8f9b; 
        } 
 
        .btn-secondary { 
            background: #252934; 
            color: #c5c8d0; 
        } 
 
        .action-buttons { 
            display: flex; 
            gap: 7px; 
        } 
 
        /* form */
        .form-grid { 
            display: grid; 
            grid-template-columns: 1fr 1fr; 
            gap: 18px; 
        } 
 
        .form-group { 
            margin-bottom: 18px; 
        } 
 
        .form-group.full { 
            grid-column: span 2; 
        } 
 
        label { 
            display: block; 
            color: #9da3b0; 
            font-size: 12px; 
            margin-bottom: 8px; 
        } 
 
        input, 
        select, 
        textarea { 
            width: 100%; 
            padding: 12px 14px; 
            background: #0f1117; 
            border: 1px solid #2b2f3a; 
            border-radius: 9px; 
            color: white; 
            outline: none; 
            font-family: inherit; 
        } 
 
        textarea { 
            min-height: 100px; 
            resize: vertical; 
        } 
 
        input:focus, 
        select:focus, 
        textarea:focus { 
            border-color: #635bff; 
        } 
 
        .form-submit { 
            margin-top: 5px; 
        } 
 
        /* detail */
        .detail-grid { 
            display: grid; 
            grid-template-columns: 1fr 1fr; 
            gap: 15px; 
        } 
 
        .detail-item { 
            background: #101219; 
            border: 1px solid #252933; 
            border-radius: 12px; 
            padding: 17px; 
        } 
 
        .detail-label { 
            color: #6f7582; 
            font-size: 11px; 
            margin-bottom: 7px; 
        } 
 
        .detail-value { 
            font-size: 14px; 
        } 
 
        .salary { 
            font-size: 20px; 
            font-weight: bold; 
        } 
 
        /* alert */
        .alert { 
            padding: 14px 18px; 
            border-radius: 10px; 
            margin-bottom: 20px; 
            font-size: 13px; 
        } 
 
        .alert-success { 
            background: #142b21; 
            color: #78e2ad; 
            border: 1px solid #214c38; 
        } 
 
        .alert-error { 
            background: #32191d; 
            color: #ff929e; 
            border: 1px solid #5a282f; 
        } 
 
        .alert-info { 
            background: #19263a; 
            color: #8bb8f5; 
            border: 1px solid #293f62; 
        } 
 
        /* search */
        .search-box { 
            display: flex; 
            gap: 10px; 
            margin-bottom: 20px; 
        } 
 
        .search-box input { 
            flex: 1; 
        } 
 
        /* kosong */
        .empty { 
            text-align: center; 
            padding: 50px 20px; 
            color: #707684; 
        } 
 
        .empty-icon { 
            font-size: 35px; 
            margin-bottom: 12px; 
        } 
 
        /* responsive */
        @media (max-width: 1000px) { 
 
            .dashboard-grid { 
                grid-template-columns: repeat(2, 1fr); 
            } 
        } 
 
        @media (max-width: 750px) { 
 
            .sidebar { 
                width: 70px; 
                padding: 20px 10px; 
            } 
 
            .logo-text, 
            .menu-title, 
            .nav span { 
                display: none; 
            } 
 
            .logo { 
                justify-content: center; 
                padding: 0; 
            } 
 
            .nav a { 
                justify-content: center; 
            } 
 
            .main { 
                margin-left: 70px; 
                width: calc(100% - 70px); 
                padding: 20px; 
            } 
 
            .dashboard-grid { 
                grid-template-columns: 1fr; 
            } 
 
            .form-grid, 
            .detail-grid { 
                grid-template-columns: 1fr; 
            } 
 
            .form-group.full { 
                grid-column: span 1; 
            } 
 
            .topbar { 
                gap: 15px; 
            } 
 
            .profile { 
                display: none; 
            } 
        } 
 
    </style> 
 
</head> 
 
<body> 
 
<div class="layout"> 
 
    <!-- sidebar -->
    <aside class="sidebar"> 
 
        <div class="logo"> 
 
            <div class="logo-icon"> 
                🎬 
            </div> 
 
            <div class="logo-text"> 
 
                <h2>CineStaff</h2> 
 
                <p>Management System</p> 
 
            </div> 
 
        </div> 
 
        <div class="menu-title"> 
            MENU UTAMA 
        </div> 
 
        <nav class="nav"> 
 
            <a 
                href="?menu=home" 
                class="<?php echo $menu == 'home' ? 'active' : ''; ?>" 
            > 
                <span class="nav-icon">⌂</span> 
                <span>Dashboard</span> 
            </a> 
 
            <a 
                href="?menu=semua" 
                class="<?php echo $menu == 'semua' ? 'active' : ''; ?>" 
            > 
                <span class="nav-icon">▦</span> 
                <span>Data Pegawai</span> 
            </a> 
 
            <a 
                href="?menu=tambah" 
                class="<?php echo $menu == 'tambah' ? 'active' : ''; ?>" 
            > 
                <span class="nav-icon">＋</span> 
                <span>Tambah Pegawai</span> 
            </a> 
 
            <a 
                href="?menu=cari" 
                class="<?php echo $menu == 'cari' ? 'active' : ''; ?>" 
            > 
                <span class="nav-icon">⌕</span> 
                <span>Cari Pegawai</span> 
            </a> 
 
            <a 
                href="?menu=ubah" 
                class="<?php echo $menu == 'ubah' ? 'active' : ''; ?>" 
            > 
                <span class="nav-icon">✎</span> 
                <span>Ubah Data</span> 
            </a> 
 
            <a 
                href="?menu=hapus" 
                class="<?php echo $menu == 'hapus' ? 'active' : ''; ?>" 
            > 
                <span class="nav-icon">⌫</span> 
                <span>Hapus Data</span> 
            </a> 
 
            <br> 
 
            <div class="menu-title"> 
                INFORMASI 
            </div> 
 
            <a 
                href="?menu=jabatan" 
                class="<?php echo $menu == 'jabatan' ? 'active' : ''; ?>" 
            > 
                <span class="nav-icon">♙</span> 
                <span>Daftar Jabatan</span> 
            </a> 
 
            <a 
                href="?menu=shift" 
                class="<?php echo $menu == 'shift' ? 'active' : ''; ?>" 
            > 
                <span class="nav-icon">◷</span> 
                <span>Daftar Shift</span> 
            </a> 
 
            <a href="?menu=keluar"> 
 
                <span class="nav-icon">↪</span> 
                <span>Keluar</span> 
 
            </a> 
 
        </nav> 
 
    </aside> 
 
    <!-- main -->
    <main class="main"> 
 
        <div class="topbar"> 
 
            <div class="page-title"> 
 
                <h1> 
 
                    <?php 
 
                    if ($menu == "home") { 
                        echo "Dashboard"; 
                    } else if ($menu == "semua") { 
                        echo "Data Pegawai"; 
                    } else if ($menu == "tambah") { 
                        echo "Tambah Pegawai"; 
                    } else if ($menu == "detail") { 
                        echo "Detail Pegawai"; 
                    } else if ($menu == "cari") { 
                        echo "Cari Pegawai"; 
                    } else if ($menu == "ubah") { 
                        echo "Ubah Data"; 
                    } else if ($menu == "hapus") { 
                        echo "Hapus Data"; 
                    } else if ($menu == "jabatan") { 
                        echo "Daftar Jabatan"; 
                    } else if ($menu == "shift") { 
                        echo "Daftar Shift"; 
                    } else if ($menu == "keluar") { 
                        echo "Sistem Ditutup"; 
                    } 
 
                    ?> 
 
                </h1> 
 
                <p> 
                    Sistem Data Pegawai Bioskop 
                </p> 
 
            </div> 
 
            <div class="profile"> 
 
                <div class="profile-avatar"> 
                    👤 
                </div> 
 
                <div class="profile-text"> 
 
                    <strong>Administrator</strong> 
 
                    <span>Staff Management</span> 
 
                </div> 
 
            </div> 
 
        </div> 
 
        <!-- pesan -->
        <?php if ($pesan != "") { ?> 
 
            <div class="alert alert-<?php echo $jenisPesan; ?>"> 
 
                <?php echo $pesan; ?> 
 
            </div> 
 
        <?php } ?> 
 
        <!-- dashboard -->
        <?php if ($menu == "home") { ?> 
 
            <div class="dashboard-grid"> 
 
                <div class="stat-card"> 
 
                    <div class="stat-top"> 
 
                        <div class="stat-label"> 
                            TOTAL PEGAWAI 
                        </div> 
 
                        <div class="stat-icon"> 
                            👥 
                        </div> 
 
                    </div> 
 
                    <div class="stat-number"> 
                        <?php echo $jumlahPegawai; ?> 
                    </div> 
 
                </div> 
 
                <div class="stat-card"> 
 
                    <div class="stat-top"> 
 
                        <div class="stat-label"> 
                            KASIR 
                        </div> 
 
                        <div class="stat-icon"> 
                            💳 
                        </div> 
 
                    </div> 
 
                    <div class="stat-number"> 
 
                        <?php 
 
                        $jumlahKasir = 0; 
 
                        // hitung kasir
                        for ($i = 0; $i < $jumlahPegawai; $i++) { 
 
                            if ( 
                                strtolower( 
                                    $daftarPegawai[$i]->getJabatan() 
                                ) == "kasir" 
                            ) { 
                                $jumlahKasir++; 
                            } 
                        } 
 
                        echo $jumlahKasir; 
 
                        ?> 
 
                    </div> 
 
                </div> 
 
                <div class="stat-card"> 
 
                    <div class="stat-top"> 
 
                        <div class="stat-label"> 
                            PETUGAS TIKET 
                        </div> 
 
                        <div class="stat-icon"> 
                            🎟 
                        </div> 
 
                    </div> 
 
                    <div class="stat-number"> 
 
                        <?php 
 
                        $jumlahTiket = 0; 
 
                        // hitung petugas tiket
                        for ($i = 0; $i < $jumlahPegawai; $i++) { 
 
                            if ( 
                                strtolower( 
                                    $daftarPegawai[$i]->getJabatan() 
                                ) == "petugas tiket" 
                            ) { 
                                $jumlahTiket++; 
                            } 
                        } 
 
                        echo $jumlahTiket; 
 
                        ?> 
 
                    </div> 
 
                </div> 
 
                <div class="stat-card"> 
 
                    <div class="stat-top"> 
 
                        <div class="stat-label"> 
                            SECURITY 
                        </div> 
 
                        <div class="stat-icon"> 
                            🛡 
                        </div> 
 
                    </div> 
 
                    <div class="stat-number"> 
 
                        <?php 
 
                        $jumlahSecurity = 0; 
 
                        // hitung security
                        for ($i = 0; $i < $jumlahPegawai; $i++) { 
 
                            if ( 
                                strtolower( 
                                    $daftarPegawai[$i]->getJabatan() 
                                ) == "security" 
                            ) { 
                                $jumlahSecurity++; 
                            } 
                        } 
 
                        echo $jumlahSecurity; 
 
                        ?> 
 
                    </div> 
 
                </div> 
 
            </div> 
 
            <div class="card"> 
 
                <div class="card-header"> 
 
                    <div> 
 
                        <h2>Data Pegawai Terdaftar</h2> 
 
                        <p> 
                            Daftar pegawai yang saat ini terdaftar dalam sistem. 
                        </p> 
 
                    </div> 
 
                    <a 
                        href="?menu=tambah" 
                        class="btn btn-primary" 
                    > 
                        + Tambah Pegawai 
                    </a> 
 
                </div> 
 
                <div class="table-wrapper"> 
 
                    <table> 
 
                        <thead> 
 
                            <tr> 
 
                                <th>PEGAWAI</th> 
                                <th>JABATAN</th> 
                                <th>TUGAS</th> 
                                <th>GAJI</th> 
                                <th>SHIFT</th> 
 
                            </tr> 
 
                        </thead> 
 
                        <tbody> 
 
                        <?php 
 
                        // tampilkan semua pegawai
                        for ($i = 0; $i < $jumlahPegawai; $i++) { 
 
                            $nama = $daftarPegawai[$i]->getNama(); 
 
                            $huruf = strtoupper(substr($nama, 0, 1)); 
 
                        ?> 
 
                            <tr> 
 
                                <td> 
 
                                    <div class="employee-name"> 
 
                                        <div class="avatar"> 
                                            <?php echo $huruf; ?> 
                                        </div> 
 
                                        <div> 
 
                                            <div class="name-main"> 
                                                <?php echo $nama; ?> 
                                            </div> 
 
                                            <div class="name-id"> 
                                                <?php 
                                                echo $daftarPegawai[$i]->getIdPegawai(); 
                                                ?> 
                                            </div> 
 
                                        </div> 
 
                                    </div> 
 
                                </td> 
 
                                <td> 
 
                                    <span class="badge"> 
 
                                        <?php 
                                        echo $daftarPegawai[$i]->getJabatan(); 
                                        ?> 
 
                                    </span> 
 
                                </td> 
 
                                <td> 
                                    <?php 
                                    echo $daftarPegawai[$i]->getTugas(); 
                                    ?> 
                                </td> 
 
                                <td> 
                                    Rp 
                                    <?php 
                                    echo number_format( 
                                        $daftarPegawai[$i]->getGaji(), 
                                        0, 
                                        ',', 
                                        '.' 
                                    ); 
                                    ?> 
                                </td> 
 
                                <td> 
                                    <?php 
                                    echo $daftarPegawai[$i]->getStatusShift(); 
                                    ?> 
                                </td> 
 
                            </tr> 
 
                        <?php } ?> 
 
                        </tbody> 
 
                    </table> 
 
                </div> 
 
            </div> 
 
        <!-- semua data -->
        <?php } else if ($menu == "semua") { ?> 
 
            <div class="card"> 
 
                <div class="card-header"> 
 
                    <div> 
 
                        <h2>Data Semua Pegawai</h2> 
 
                        <p> 
                            Total <?php echo $jumlahPegawai; ?> pegawai terdaftar. 
                        </p> 
 
                    </div> 
 
                </div> 
 
                <div class="table-wrapper"> 
 
                    <table> 
 
                        <thead> 
 
                            <tr> 
 
                                <th>NO</th> 
                                <th>PEGAWAI</th> 
                                <th>JABATAN</th> 
                                <th>TUGAS</th> 
                                <th>GAJI</th> 
                                <th>SHIFT</th> 
                                <th>AKSI</th> 
 
                            </tr> 
 
                        </thead> 
 
                        <tbody> 
 
                        <?php 
 
                        for ($i = 0; $i < $jumlahPegawai; $i++) { 
 
                            $huruf = strtoupper( 
                                substr( 
                                    $daftarPegawai[$i]->getNama(), 
                                    0, 
                                    1 
                                ) 
                            ); 
 
                        ?> 
 
                            <tr> 
 
                                <td> 
                                    <?php echo $i + 1; ?> 
                                </td> 
 
                                <td> 
 
                                    <div class="employee-name"> 
 
                                        <div class="avatar"> 
                                            <?php echo $huruf; ?> 
                                        </div> 
 
                                        <div> 
 
                                            <div class="name-main"> 
                                                <?php 
                                                echo $daftarPegawai[$i]->getNama(); 
                                                ?> 
                                            </div> 
 
                                            <div class="name-id"> 
                                                <?php 
                                                echo $daftarPegawai[$i]->getIdPegawai(); 
                                                ?> 
                                            </div> 
 
                                        </div> 
 
                                    </div> 
 
                                </td> 
 
                                <td> 
                                    <?php 
                                    echo $daftarPegawai[$i]->getJabatan(); 
                                    ?> 
                                </td> 
 
                                <td> 
                                    <?php 
                                    echo $daftarPegawai[$i]->getTugas(); 
                                    ?> 
                                </td> 
 
                                <td> 
                                    Rp 
                                    <?php 
                                    echo number_format( 
                                        $daftarPegawai[$i]->getGaji(), 
                                        0, 
                                        ',', 
                                        '.' 
                                    ); 
                                    ?> 
                                </td> 
 
                                <td> 
                                    <?php 
                                    echo $daftarPegawai[$i]->getStatusShift(); 
                                    ?> 
                                </td> 
 
                                <td> 
 
                                    <div class="action-buttons"> 
 
                                        <a 
                                            class="btn btn-secondary" 
                                            href="?menu=detail&id=<?php 
                                            echo $daftarPegawai[$i]->getIdPegawai(); 
                                            ?>" 
                                        > 
                                            Detail 
                                        </a> 
 
                                    </div> 
 
                                </td> 
 
                            </tr> 
 
                        <?php } ?> 
 
                        </tbody> 
 
                    </table> 
 
                </div> 
 
            </div> 
 
        <!-- tambah -->
        <?php } else if ($menu == "tambah") { ?> 
 
            <div class="card"> 
 
                <div class="card-header"> 
 
                    <div> 
 
                        <h2>Tambah Data Pegawai</h2> 
 
                        <p> 
                            Masukkan informasi pegawai baru. 
                        </p> 
 
                    </div> 
 
                </div> 
 
                <form method="POST"> 
 
                    <input 
                        type="hidden" 
                        name="aksi" 
                        value="tambah" 
                    > 
 
                    <div class="form-grid"> 
 
                        <div class="form-group"> 
 
                            <label>ID Pegawai</label> 
 
                            <input 
                                type="text" 
                                name="IdPegawai" 
                                placeholder="Contoh: A2521006" 
                                required 
                            > 
 
                        </div> 
 
                        <div class="form-group"> 
 
                            <label>Nama Pegawai</label> 
 
                            <input 
                                type="text" 
                                name="Nama" 
                                placeholder="Masukkan nama pegawai" 
                                required 
                            > 
 
                        </div> 
 
                        <div class="form-group"> 
 
                            <label>Jabatan</label> 
 
                            <select name="Jabatan" required> 
 
                                <option value=""> 
                                    Pilih Jabatan 
                                </option> 
 
                                <option value="Kasir"> 
                                    Kasir 
                                </option> 
 
                                <option value="Petugas Tiket"> 
                                    Petugas Tiket 
                                </option> 
 
                                <option value="Cleaning Service"> 
                                    Cleaning Service 
                                </option> 
 
                                <option value="Security"> 
                                    Security 
                                </option> 
 
                                <option value="Supervisor"> 
                                    Supervisor 
                                </option> 
 
                            </select> 
 
                        </div> 
 
                        <div class="form-group"> 
 
                            <label>Gaji</label> 
 
                            <input 
                                type="number" 
                                name="Gaji" 
                                placeholder="Contoh: 3500000" 
                                required 
                            > 
 
                        </div> 
 
                        <div class="form-group full"> 
 
                            <label>Tugas Pegawai</label> 
 
                            <textarea 
                                name="Tugas" 
                                placeholder="Masukkan tugas pegawai" 
                                required 
                            ></textarea> 
 
                        </div> 
 
                        <div class="form-group"> 
 
                            <label>Status Shift</label> 
 
                            <select 
                                name="StatusShift" 
                                required 
                            > 
 
                                <option value=""> 
                                    Pilih Shift 
                                </option> 
 
                                <option value="pagi"> 
                                    Pagi 
                                </option> 
 
                                <option value="siang"> 
                                    Siang 
                                </option> 
 
                                <option value="malam"> 
                                    Malam 
                                </option> 
 
                            </select> 
 
                        </div> 
 
                    </div> 
 
                    <div class="form-submit"> 
 
                        <button 
                            type="submit" 
                            class="btn btn-primary" 
                        > 
                            Simpan Data Pegawai 
                        </button> 
 
                    </div> 
 
                </form> 
 
            </div> 
 
        <!-- detail -->
        <?php } else if ($menu == "detail") { ?> 
 
            <div class="card"> 
 
                <?php if ($detailPegawai != null) { ?> 
 
                    <div class="card-header"> 
 
                        <div> 
 
                            <h2>Detail Pegawai</h2> 
 
                            <p> 
                                Informasi lengkap data pegawai. 
                            </p> 
 
                        </div> 
 
                    </div> 
 
                    <div class="detail-grid"> 
 
                        <div class="detail-item"> 
 
                            <div class="detail-label"> 
                                ID PEGAWAI 
                            </div> 
 
                            <div class="detail-value"> 
                                <?php 
                                echo $detailPegawai->getIdPegawai(); 
                                ?> 
                            </div> 
 
                        </div> 
 
                        <div class="detail-item"> 
 
                            <div class="detail-label"> 
                                NAMA 
                            </div> 
 
                            <div class="detail-value"> 
                                <?php 
                                echo $detailPegawai->getNama(); 
                                ?> 
                            </div> 
 
                        </div> 
 
                        <div class="detail-item"> 
 
                            <div class="detail-label"> 
                                JABATAN 
                            </div> 
 
                            <div class="detail-value"> 
                                <?php 
                                echo $detailPegawai->getJabatan(); 
                                ?> 
                            </div> 
 
                        </div> 
 
                        <div class="detail-item"> 
 
                            <div class="detail-label"> 
                                GAJI 
                            </div> 
 
                            <div class="detail-value salary"> 
 
                                Rp 
                                <?php 
 
                                echo number_format( 
                                    $detailPegawai->getGaji(), 
                                    0, 
                                    ',', 
                                    '.' 
                                ); 
 
                                ?> 
 
                            </div> 
 
                        </div> 
 
                        <div 
                            class="detail-item" 
                            style="grid-column: span 2;" 
                        > 
 
                            <div class="detail-label"> 
                                TUGAS 
                            </div> 
 
                            <div class="detail-value"> 
                                <?php 
                                echo $detailPegawai->getTugas(); 
                                ?> 
                            </div> 
 
                        </div> 
 
                        <div 
                            class="detail-item" 
                            style="grid-column: span 2;" 
                        > 
 
                            <div class="detail-label"> 
                                STATUS SHIFT 
                            </div> 
 
                            <div class="detail-value"> 
 
                                <span class="badge"> 
 
                                    <?php 
                                    echo $detailPegawai->getStatusShift(); 
                                    ?> 
 
                                </span> 
 
                            </div> 
 
                        </div> 
 
                    </div> 
 
                <?php } else { ?> 
 
                    <div class="empty"> 
 
                        <div class="empty-icon"> 
                            🔍 
                        </div> 
 
                        <p> 
                            Pegawai tidak ditemukan. 
                        </p> 
 
                    </div> 
 
                <?php } ?> 
 
            </div> 
 
        <!-- cari -->
        <?php } else if ($menu == "cari") { ?> 
 
            <div class="card"> 
 
                <div class="card-header"> 
 
                    <div> 
 
                        <h2>Cari Pegawai</h2> 
 
                        <p> 
                            Cari pegawai berdasarkan nama. 
                        </p> 
 
                    </div> 
 
                </div> 
 
                <form 
                    method="GET" 
                    class="search-box" 
                > 
 
                    <input 
                        type="hidden" 
                        name="menu" 
                        value="cari" 
                    > 
 
                    <input 
                        type="text" 
                        name="nama" 
                        placeholder="Masukkan nama pegawai..." 
                        required 
                    > 
 
                    <button 
                        type="submit" 
                        class="btn btn-primary" 
                    > 
                        Cari Pegawai 
                    </button> 
 
                </form> 
 
                <?php if (isset($_GET["nama"])) { ?> 
 
                    <?php if ($hasilCari != null) { ?> 
 
                        <?php foreach ($hasilCari as $pegawai) { ?> 
 
                            <div class="detail-grid"> 
 
                                <div class="detail-item"> 
 
                                    <div class="detail-label"> 
                                        ID PEGAWAI 
                                    </div> 
 
                                    <div class="detail-value"> 
                                        <?php 
                                        echo $pegawai->getIdPegawai(); 
                                        ?> 
                                    </div> 
 
                                </div> 
 
                                <div class="detail-item"> 
 
                                    <div class="detail-label"> 
                                        NAMA 
                                    </div> 
 
                                    <div class="detail-value"> 
                                        <?php 
                                        echo $pegawai->getNama(); 
                                        ?> 
                                    </div> 
 
                                </div> 
 
                                <div class="detail-item"> 
 
                                    <div class="detail-label"> 
                                        JABATAN 
                                    </div> 
 
                                    <div class="detail-value"> 
                                        <?php 
                                        echo $pegawai->getJabatan(); 
                                        ?> 
                                    </div> 
 
                                </div> 
 
                                <div class="detail-item"> 
 
                                    <div class="detail-label"> 
                                        GAJI 
                                    </div> 
 
                                    <div class="detail-value salary"> 
 
                                        Rp 
                                        <?php 
 
                                        echo number_format( 
                                            $pegawai->getGaji(), 
                                            0, 
                                            ',', 
                                            '.' 
                                        ); 
 
                                        ?> 
 
                                    </div> 
 
                                </div> 
 
                                <div 
                                    class="detail-item" 
                                    style="grid-column: span 2;" 
                                > 
 
                                    <div class="detail-label"> 
                                        TUGAS 
                                    </div> 
 
                                    <div class="detail-value"> 
                                        <?php 
                                        echo $pegawai->getTugas(); 
                                        ?> 
                                    </div> 
 
                                </div> 
 
                                <div 
                                    class="detail-item" 
                                    style="grid-column: span 2;" 
                                > 
 
                                    <div class="detail-label"> 
                                        SHIFT 
                                    </div> 
 
                                    <div class="detail-value"> 
                                        <?php 
                                        echo $pegawai->getStatusShift(); 
                                        ?> 
                                    </div> 
 
                                </div> 
 
                            </div> 
 
                        <?php } ?> 
 
                    <?php } else { ?> 
 
                        <div class="empty"> 
 
                            <div class="empty-icon"> 
                                😕 
                            </div> 
 
                            <p> 
                                Pegawai dengan nama tersebut tidak ditemukan. 
                            </p> 
 
                        </div> 
 
                    <?php } ?> 
 
                <?php } ?> 
 
            </div> 
 
        <!-- ubah -->
        <?php } else if ($menu == "ubah") { ?> 
 
            <div class="card"> 
 
                <div class="card-header"> 
 
                    <div> 
 
                        <h2>Ubah Data Pegawai</h2> 
 
                        <p> 
                            Pilih pegawai dan data yang ingin diubah. 
                        </p> 
 
                    </div> 
 
                </div> 
 
                <div class="table-wrapper"> 
 
                    <table> 
 
                        <thead> 
 
                            <tr> 
 
                                <th>NO</th> 
                                <th>ID</th> 
                                <th>NAMA</th> 
                                <th>JABATAN</th> 
                                <th>AKSI</th> 
 
                            </tr> 
 
                        </thead> 
 
                        <tbody> 
 
                        <?php 
 
                        for ($i = 0; $i < $jumlahPegawai; $i++) { 
 
                        ?> 
 
                            <tr> 
 
                                <td> 
                                    <?php echo $i + 1; ?> 
                                </td> 
 
                                <td> 
                                    <?php 
                                    echo $daftarPegawai[$i]->getIdPegawai(); 
                                    ?> 
                                </td> 
 
                                <td> 
                                    <?php 
                                    echo $daftarPegawai[$i]->getNama(); 
                                    ?> 
                                </td> 
 
                                <td> 
                                    <?php 
                                    echo $daftarPegawai[$i]->getJabatan(); 
                                    ?> 
                                </td> 
 
                                <td> 
 
                                    <a 
                                        href="?menu=ubah_form&id=<?php 
                                        echo $daftarPegawai[$i]->getIdPegawai(); 
                                        ?>" 
                                        class="btn btn-primary" 
                                    > 
                                        Ubah 
                                    </a> 
 
                                </td> 
 
                            </tr> 
 
                        <?php } ?> 
 
                        </tbody> 
 
                    </table> 
 
                </div> 
 
            </div> 
 
        <!-- form ubah -->
        <?php } else if ($menu == "ubah_form") { ?> 
 
            <?php 
 
            $pegawaiUbah = null; 
 
            if (isset($_GET["id"])) { 
 
                for ($i = 0; $i < $jumlahPegawai; $i++) { 
 
                    if ( 
                        strtolower( 
                            $daftarPegawai[$i]->getIdPegawai() 
                        ) 
                        == 
                        strtolower($_GET["id"]) 
                    ) { 
 
                        $pegawaiUbah = $daftarPegawai[$i]; 
 
                        break; 
                    } 
                } 
            } 
 
            ?> 
 
            <div class="card"> 
 
                <?php if ($pegawaiUbah != null) { ?> 
 
                    <div class="card-header"> 
 
                        <div> 
 
                            <h2> 
                                Ubah Data Pegawai 
                            </h2> 
 
                            <p> 
                                <?php 
                                echo $pegawaiUbah->getNama(); 
                                ?> 
                            </p> 
 
                        </div> 
 
                    </div> 
 
                    <form method="POST"> 
 
                        <input 
                            type="hidden" 
                            name="aksi" 
                            value="ubah" 
                        > 
 
                        <input 
                            type="hidden" 
                            name="cariId" 
                            value="<?php 
                            echo $pegawaiUbah->getIdPegawai(); 
                            ?>" 
                        > 
 
                        <div class="form-group"> 
 
                            <label> 
                                Data yang ingin diubah 
                            </label> 
 
                            <select 
                                name="ubah" 
                                required 
                            > 
 
                                <option value="Nama"> 
                                    Nama 
                                </option> 
 
                                <option value="Jabatan"> 
                                    Jabatan 
                                </option> 
 
                                <option value="Tugas"> 
                                    Tugas 
                                </option> 
 
                                <option value="Gaji"> 
                                    Gaji 
                                </option> 
 
                                <option value="Shift"> 
                                    Shift 
                                </option> 
 
                            </select> 
 
                        </div> 
 
                        <div class="form-group"> 
 
                            <label> 
                                Nilai Baru 
                            </label> 
 
                            <input 
                                type="text" 
                                name="nilai" 
                                placeholder="Masukkan nilai baru" 
                                required 
                            > 
 
                        </div> 
 
                        <button 
                            type="submit" 
                            class="btn btn-primary" 
                        > 
                            Simpan Perubahan 
                        </button> 
 
                    </form> 
 
                <?php } else { ?> 
 
                    <div class="empty"> 
 
                        <div class="empty-icon"> 
                            🔍 
                        </div> 
 
                        <p> 
                            Pegawai tidak ditemukan. 
                        </p> 
 
                    </div> 
 
                <?php } ?> 
 
            </div> 
 
        <!-- hapus -->
        <?php } else if ($menu == "hapus") { ?> 
 
            <div class="card"> 
 
                <div class="card-header"> 
 
                    <div> 
 
                        <h2>Hapus Data Pegawai</h2> 
 
                        <p> 
                            Pilih pegawai yang ingin dihapus. 
                        </p> 
 
                    </div> 
 
                </div> 
 
                <div class="table-wrapper"> 
 
                    <table> 
 
                        <thead> 
 
                            <tr> 
 
                                <th>NO</th> 
                                <th>ID</th> 
                                <th>NAMA</th> 
                                <th>JABATAN</th> 
                                <th>AKSI</th> 
 
                            </tr> 
 
                        </thead> 
 
                        <tbody> 
 
                        <?php 
 
                        for ($i = 0; $i < $jumlahPegawai; $i++) { 
 
                        ?> 
 
                            <tr> 
 
                                <td> 
                                    <?php echo $i + 1; ?> 
                                </td> 
 
                                <td> 
                                    <?php 
                                    echo $daftarPegawai[$i]->getIdPegawai(); 
                                    ?> 
                                </td> 
 
                                <td> 
                                    <?php 
                                    echo $daftarPegawai[$i]->getNama(); 
                                    ?> 
                                </td> 
 
                                <td> 
                                    <?php 
                                    echo $daftarPegawai[$i]->getJabatan(); 
                                    ?> 
                                </td> 
 
                                <td> 
 
                                    <form method="POST"> 
 
                                        <input 
                                            type="hidden" 
                                            name="aksi" 
                                            value="hapus" 
                                        > 
 
                                        <input 
                                            type="hidden" 
                                            name="hapusId" 
                                            value="<?php 
                                            echo $daftarPegawai[$i]->getIdPegawai(); 
                                            ?>" 
                                        > 
 
                                        <input 
                                            type="hidden" 
                                            name="konfirmasi" 
                                            value="ya" 
                                        > 
 
                                        <button 
                                            type="submit" 
                                            class="btn btn-danger" 
                                            onclick="return confirm( 
                                                'Yakin ingin menghapus data ini?' 
                                            )" 
                                        > 
                                            Hapus 
                                        </button> 
 
                                    </form> 
 
                                </td> 
 
                            </tr> 
 
                        <?php } ?> 
 
                        </tbody> 
 
                    </table> 
 
                </div> 
 
            </div> 
 
        <!-- jabatan -->
        <?php } else if ($menu == "jabatan") { ?> 
 
            <div class="card"> 
 
                <div class="card-header"> 
 
                    <div> 
 
                        <h2>Daftar Jabatan</h2> 
 
                        <p> 
                            Jabatan yang tersedia dalam sistem bioskop. 
                        </p> 
 
                    </div> 
 
                </div> 
 
                <div class="dashboard-grid"> 
 
                    <div class="stat-card"> 
 
                        <div class="stat-top"> 
 
                            <div class="stat-label"> 
                                JABATAN 
                            </div> 
 
                            <div class="stat-icon"> 
                                💳 
                            </div> 
 
                        </div> 
 
                        <div class="stat-number"> 
                            Kasir 
                        </div> 
 
                    </div> 
 
                    <div class="stat-card"> 
 
                        <div class="stat-top"> 
 
                            <div class="stat-label"> 
                                JABATAN 
                            </div> 
 
                            <div class="stat-icon"> 
                                🎟 
                            </div> 
 
                        </div> 
 
                        <div class="stat-number"> 
                            Petugas Tiket 
                        </div> 
 
                    </div> 
 
                    <div class="stat-card"> 
 
                        <div class="stat-top"> 
 
                            <div class="stat-label"> 
                                JABATAN 
                            </div> 
 
                            <div class="stat-icon"> 
                                🧹 
                            </div> 
 
                        </div> 
 
                        <div class="stat-number"> 
                            Cleaning Service 
                        </div> 
 
                    </div> 
 
                    <div class="stat-card"> 
 
                        <div class="stat-top"> 
 
                            <div class="stat-label"> 
                                JABATAN 
                            </div> 
 
                            <div class="stat-icon"> 
                                🛡 
                            </div> 
 
                        </div> 
 
                        <div class="stat-number"> 
                            Security 
                        </div> 
 
                    </div> 
 
                    <div class="stat-card"> 
 
                        <div class="stat-top"> 
 
                            <div class="stat-label"> 
                                JABATAN 
                            </div> 
 
                            <div class="stat-icon"> 
                                👔 
                            </div> 
 
                        </div> 
 
                        <div class="stat-number"> 
                            Supervisor 
                        </div> 
 
                    </div> 
 
                </div> 
 
            </div> 
 
        <!-- shift -->
        <?php } else if ($menu == "shift") { ?> 
 
            <div class="card"> 
 
                <div class="card-header"> 
 
                    <div> 
 
                        <h2>Daftar Shift</h2> 
 
                        <p> 
                            Jadwal shift kerja pegawai bioskop. 
                        </p> 
 
                    </div> 
 
                </div> 
 
                <div class="dashboard-grid"> 
 
                    <div class="stat-card"> 
 
                        <div class="stat-top"> 
 
                            <div class="stat-label"> 
                                SHIFT 1 
                            </div> 
 
                            <div class="stat-icon"> 
                                🌅 
                            </div> 
 
                        </div> 
 
                        <div class="stat-number"> 
                            Pagi 
                        </div> 
 
                        <p style="color:#777d8b;margin-top:8px;"> 
                            08.00 - 13.00 
                        </p> 
 
                    </div> 
 
                    <div class="stat-card"> 
 
                        <div class="stat-top"> 
 
                            <div class="stat-label"> 
                                SHIFT 2 
                            </div> 
 
                            <div class="stat-icon"> 
                                ☀ 
                            </div> 
 
                        </div> 
 
                        <div class="stat-number"> 
                            Siang 
                        </div> 
 
                        <p style="color:#777d8b;margin-top:8px;"> 
                            13.00 - 18.00 
                        </p> 
 
                    </div> 
 
                    <div class="stat-card"> 
 
                        <div class="stat-top"> 
 
                            <div class="stat-label"> 
                                SHIFT 3 
                            </div> 
 
                            <div class="stat-icon"> 
                                🌙 
                            </div> 
 
                        </div> 
 
                        <div class="stat-number"> 
                            Malam 
                        </div> 
 
                        <p style="color:#777d8b;margin-top:8px;"> 
                            18.00 - 23.00 
                        </p> 
 
                    </div> 
 
                </div> 
 
            </div> 
 
        <!-- keluar -->
        <?php } else if ($menu == "keluar") { ?> 
 
            <div class="card"> 
 
                <div class="empty"> 
 
                    <div 
                        class="empty-icon" 
                        style="font-size:50px;" 
                    > 
                        🎬 
                    </div> 
 
                    <h2 style="margin-bottom:10px;"> 
                        Program ditutup. 
                    </h2> 
 
                    <p> 
                        Terima kasih telah menggunakan sistem. 
                    </p> 
 
                </div> 
 
            </div> 
 
        <?php } ?> 
 
    </main> 
 
</div> 
 
</body> 
 
</html> 