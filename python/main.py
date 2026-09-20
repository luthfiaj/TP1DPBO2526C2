
from pegawai import Pegawai 
 
 
# program utama
 
# list pegawai
daftarPegawai = [None] * 100 
 
jumlahPegawai = 0 
pilihan = 0 
 
 
# data awal
 
daftarPegawai[0] = Pegawai( 
    "A2521001", 
    "Agus Yamaha", 
    "Kasir", 
    "Melayani pembelian tiket bioskop", 
    3500000, 
    "pagi" 
) 
 
 
daftarPegawai[1] = Pegawai( 
    "A2521002", 
    "Budiono Siregar", 
    "Petugas Tiket", 
    "Memeriksa tiket penonton sebelum masuk studio", 
    3200000, 
    "siang" 
) 
 
 
daftarPegawai[2] = Pegawai( 
    "A2521003", 
    "Yusup Telolet", 
    "Cleaning Service", 
    "Membersihkan studio setelah pemutaran film", 
    3000000, 
    "malam" 
) 
 
 
daftarPegawai[3] = Pegawai( 
    "A2521004", 
    "Tedy Boy Friend Prabowo", 
    "Security", 
    "Menjaga keamanan area bioskop", 
    4000000, 
    "pagi" 
) 
 
 
daftarPegawai[4] = Pegawai( 
    "A2521005", 
    "Luthfi Aulia Jodi", 
    "Supervisor / CEO", 
    "Mengawasi kegiatan operasional bioskop", 
    9999999, 
    "malam" 
) 
 
 
jumlahPegawai = 5 
 
 
# menu utama
 
while pilihan != 9: 
 
    print("\n========================================") 
    print("       SISTEM DATA PEGAWAI BIOSKOP") 
    print("========================================") 
    print("1. Tambah Data Pegawai") 
    print("2. Lihat Semua Data Pegawai") 
    print("3. Lihat Detail Pegawai") 
    print("4. Cari Pegawai") 
    print("5. Ubah Data Pegawai") 
    print("6. Hapus Data Pegawai") 
    print("7. Lihat Daftar Jabatan") 
    print("8. Lihat Daftar Shift") 
    print("9. Keluar") 
    print("========================================") 
 
    pilihan = int(input("Pilih menu: ")) 
 
 
    # tambah data
 
    if pilihan == 1: 
 
        print("\n========================================") 
        print("--- TAMBAH DATA PEGAWAI ---") 
        print("========================================") 
 
 
        if jumlahPegawai >= 100: 
 
            print("Data pegawai sudah penuh.") 
 
        else: 
 
            IdPegawai = input("Masukan ID Pegawai: ") 
 
            idSudahAda = False 
 
 
            # cek ID
            for i in range(jumlahPegawai): 
 
                if daftarPegawai[i].getIdPegawai().lower() == IdPegawai.lower(): 
 
                    idSudahAda = True 
                    break 
 
 
            if idSudahAda == True: 
 
                print("ID Pegawai sudah digunakan.") 
 
            else: 
 
                Nama = input("Masukan Nama Pegawai: ") 
 
                Jabatan = input("Masukan Jabatan Pegawai: ") 
 
                Tugas = input("Masukan Tugas Pegawai: ") 
 
                Gaji = float(input("Masukan Gaji Pegawai: ")) 
 
                StatusShift = input( 
                    "Masukan Status Shift Pegawai (pagi/siang/malam): " 
                ) 
 
 
                daftarPegawai[jumlahPegawai] = Pegawai( 
                    IdPegawai, 
                    Nama, 
                    Jabatan, 
                    Tugas, 
                    Gaji, 
                    StatusShift 
                ) 
 
 
                jumlahPegawai += 1 
 
 
                print("\nData pegawai berhasil ditambahkan.") 
 
 
    # lihat semua data
 
    elif pilihan == 2: 
 
        print("\n========================================") 
        print("--- DATA SEMUA PEGAWAI ---") 
        print("========================================") 
 
 
        if jumlahPegawai == 0: 
 
            print("Data pegawai tidak tersedia.") 
 
        else: 
 
            for i in range(jumlahPegawai): 
 
                print("\n================================") 
                print("Data Pegawai ke-" + str(i + 1)) 
                print("================================") 
 
                print("ID       : " + daftarPegawai[i].getIdPegawai()) 
                print("Nama     : " + daftarPegawai[i].getNama()) 
                print("Jabatan  : " + daftarPegawai[i].getJabatan()) 
                print("Tugas    : " + daftarPegawai[i].getTugas()) 
                print("Gaji     : " + str(daftarPegawai[i].getGaji())) 
                print("Shift    : " + daftarPegawai[i].getStatusShift()) 
 
                print("========================================") 
 
 
    # detail pegawai
 
    elif pilihan == 3: 
 
        print("\n========================================") 
        print("--- DETAIL PEGAWAI ---") 
        print("========================================") 
 
 
        if jumlahPegawai == 0: 
 
            print("Data pegawai tidak tersedia.") 
 
        else: 
 
            cariId = input("Masukkan ID Pegawai: ") 
 
            ditemukan = False 
 
 
            for i in range(jumlahPegawai): 
 
                if daftarPegawai[i].getIdPegawai().lower() == cariId.lower(): 
 
                    print("\n================================") 
                    print("        DETAIL PEGAWAI") 
                    print("================================") 
 
                    print("ID       : " + daftarPegawai[i].getIdPegawai()) 
                    print("Nama     : " + daftarPegawai[i].getNama()) 
                    print("Jabatan  : " + daftarPegawai[i].getJabatan()) 
                    print("Tugas    : " + daftarPegawai[i].getTugas()) 
                    print("Gaji     : " + str(daftarPegawai[i].getGaji())) 
                    print("Shift    : " + daftarPegawai[i].getStatusShift()) 
 
                    print("========================================") 
 
                    ditemukan = True 
                    break 
 
 
            if ditemukan == False: 
 
                print( 
                    "\nPegawai dengan ID " 
                    + cariId 
                    + " tidak ditemukan." 
                ) 
 
 
    # cari pegawai
 
    elif pilihan == 4: 
 
        print("\n========================================") 
        print("--- CARI PEGAWAI ---") 
        print("========================================") 
 
 
        if jumlahPegawai == 0: 
 
            print("Data pegawai tidak tersedia.") 
            print("Silahkan input data pegawai terlebih dahulu.") 
 
        else: 
 
            print("Masukkan nama pegawai: ") 
 
            cariNama = input() 
 
            ditemukan = False 
 
 
            for i in range(jumlahPegawai): 
 
                if daftarPegawai[i].getNama().lower() == cariNama.lower(): 
 
                    print("\n================================") 
                    print("Data Pegawai Ditemukan") 
                    print("================================") 
 
                    print("ID       : " + daftarPegawai[i].getIdPegawai()) 
                    print("Nama     : " + daftarPegawai[i].getNama()) 
                    print("Jabatan  : " + daftarPegawai[i].getJabatan()) 
                    print("Tugas    : " + daftarPegawai[i].getTugas()) 
                    print("Gaji     : " + str(daftarPegawai[i].getGaji())) 
                    print("Shift    : " + daftarPegawai[i].getStatusShift()) 
 
                    ditemukan = True 
 
 
            if ditemukan == False: 
 
                print( 
                    "\nPegawai dengan nama tersebut tidak ditemukan." 
                ) 
 
 
    # ubah data
 
    elif pilihan == 5: 
 
        print("\n================================") 
        print("--- UBAH DATA PEGAWAI ---") 
        print("================================") 
 
 
        if jumlahPegawai == 0: 
 
            print("Data pegawai tidak tersedia.") 
            print("Silahkan input data pegawai terlebih dahulu!") 
 
        else: 
 
            # tampilkan daftar
            print("\n================================") 
            print("       DAFTAR PEGAWAI") 
            print("================================") 
 
            print( 
                "{:<5} {:<10} {:<20}".format( 
                    "No.", 
                    "ID", 
                    "Nama" 
                ) 
            ) 
 
            print("--------------------------------") 
 
 
            for i in range(jumlahPegawai): 
 
                print( 
                    "{:<5} {:<10} {:<20}".format( 
                        i + 1, 
                        daftarPegawai[i].getIdPegawai(), 
                        daftarPegawai[i].getNama() 
                    ) 
                ) 
 
 
            print("================================") 
 
            cariId = input("Masukkan ID Pegawai: ") 
 
            ditemukan = False 
 
 
            for i in range(jumlahPegawai): 
 
                if daftarPegawai[i].getIdPegawai().lower() == cariId.lower(): 
 
                    ditemukan = True 
 
                    ubah = 0 
 
 
                    while ubah != 6: 
 
                        print("\n================================") 
                        print("       UBAH DATA PEGAWAI") 
                        print("================================") 
 
                        print( 
                            "ID       : " 
                            + daftarPegawai[i].getIdPegawai() 
                        ) 
 
                        print( 
                            "Nama     : " 
                            + daftarPegawai[i].getNama() 
                        ) 
 
                        print( 
                            "Jabatan  : " 
                            + daftarPegawai[i].getJabatan() 
                        ) 
 
                        print( 
                            "Tugas    : " 
                            + daftarPegawai[i].getTugas() 
                        ) 
 
                        print( 
                            "Gaji     : " 
                            + str(daftarPegawai[i].getGaji()) 
                        ) 
 
                        print( 
                            "Shift    : " 
                            + daftarPegawai[i].getStatusShift() 
                        ) 
 
                        print("========================================") 
 
 
                        print("\nYang ingin diubah:") 
                        print("1. Nama") 
                        print("2. Jabatan") 
                        print("3. Tugas") 
                        print("4. Gaji") 
                        print("5. Shift") 
                        print("6. Kembali") 
 
 
                        ubah = int(input("Pilih perubahan: ")) 
 
 
                        if ubah == 1: 
 
                            namaBaru = input("Masukkan nama baru: ") 
 
                            daftarPegawai[i].setNama(namaBaru) 
 
                            print("Nama berhasil diubah.") 
 
 
                        elif ubah == 2: 
 
                            jabatanBaru = input( 
                                "Masukkan jabatan baru: " 
                            ) 
 
                            daftarPegawai[i].setJabatan(jabatanBaru) 
 
                            print("Jabatan berhasil diubah.") 
 
 
                        elif ubah == 3: 
 
                            tugasBaru = input( 
                                "Masukkan tugas baru: " 
                            ) 
 
                            daftarPegawai[i].setTugas(tugasBaru) 
 
                            print("Tugas berhasil diubah.") 
 
 
                        elif ubah == 4: 
 
                            gajiBaru = float( 
                                input("Masukkan gaji baru: ") 
                            ) 
 
                            daftarPegawai[i].setGaji(gajiBaru) 
 
                            print("Gaji berhasil diubah.") 
 
 
                        elif ubah == 5: 
 
                            shiftBaru = input( 
                                "Masukkan shift baru (pagi/siang/malam): " 
                            ) 
 
                            daftarPegawai[i].setStatusShift(shiftBaru) 
 
                            print("Shift berhasil diubah.") 
 
 
                        elif ubah == 6: 
 
                            print("Kembali ke menu utama.") 
 
 
                        else: 
 
                            print("Pilihan tidak tersedia.") 
 
 
                    break 
 
 
            if ditemukan == False: 
 
                print( 
                    "\nPegawai dengan ID " 
                    + cariId 
                    + " tidak ditemukan." 
                ) 
 
 
    # hapus data
 
    elif pilihan == 6: 
 
        print("\n========================================") 
        print("--- HAPUS DATA PEGAWAI ---") 
        print("========================================") 
 
 
        if jumlahPegawai == 0: 
 
            print("Data pegawai tidak tersedia.") 
            print("Silahkan input data pegawai terlebih dahulu!") 
 
        else: 
 
            # tampilkan daftar
            print("\n================================") 
            print("       DAFTAR PEGAWAI") 
            print("================================") 
 
            print( 
                "{:<5} {:<10} {:<20}".format( 
                    "No.", 
                    "ID", 
                    "Nama" 
                ) 
            ) 
 
            print("--------------------------------") 
 
 
            for i in range(jumlahPegawai): 
 
                print( 
                    "{:<5} {:<10} {:<20}".format( 
                        i + 1, 
                        daftarPegawai[i].getIdPegawai(), 
                        daftarPegawai[i].getNama() 
                    ) 
                ) 
 
 
            print("================================") 
 
 
            hapusId = input( 
                "Masukkan ID Pegawai yang ingin dihapus: " 
            ) 
 
            ditemukan = False 
 
 
            for i in range(jumlahPegawai): 
 
                if daftarPegawai[i].getIdPegawai().lower() == hapusId.lower(): 
 
                    ditemukan = True 
 
 
                    print("\nData yang akan dihapus:") 
 
                    print( 
                        "ID   : " 
                        + daftarPegawai[i].getIdPegawai() 
                    ) 
 
                    print( 
                        "Nama : " 
                        + daftarPegawai[i].getNama() 
                    ) 
 
 
                    konfirmasi = input( 
                        "\nYakin ingin menghapus data ini? (ya/tidak): " 
                    ) 
 
 
                    if konfirmasi.lower() == "ya": 
 
                        # geser data
                        for j in range(i, jumlahPegawai - 1): 
 
                            daftarPegawai[j] = daftarPegawai[j + 1] 
 
 
                        daftarPegawai[jumlahPegawai - 1] = None 
 
                        jumlahPegawai -= 1 
 
 
                        print("\nData pegawai berhasil dihapus.") 
 
 
                    else: 
 
                        print("\nPenghapusan dibatalkan.") 
 
 
                    break 
 
 
            if ditemukan == False: 
 
                print( 
                    "\nPegawai dengan ID " 
                    + hapusId 
                    + " tidak ditemukan." 
                ) 
 
 
    # daftar jabatan
 
    elif pilihan == 7: 
 
        print("\n========================================") 
        print("--- DAFTAR JABATAN ---") 
        print("========================================") 
        print("1. Kasir") 
        print("2. Petugas Tiket") 
        print("3. Cleaning Service") 
        print("4. Security") 
        print("5. Supervisor") 
        print("========================================") 
 
 
    # daftar shift
 
    elif pilihan == 8: 
 
        print("\n========================================") 
        print("--- DAFTAR SHIFT ---") 
        print("========================================") 
        print("1. Pagi  : 08.00 - 13.00") 
        print("2. Siang : 13.00 - 18.00") 
        print("3. Malam : 18.00 - 23.00") 
        print("========================================") 
 
 
    # keluar
 
    elif pilihan == 9: 
 
        print("\n========================================") 
        print("Program ditutup.") 
        print("Terima kasih telah menggunakan sistem.") 
        print("========================================") 
 
 
    # pilihan salah
 
    else: 
 
        print("\nPilihan tidak tersedia!")

