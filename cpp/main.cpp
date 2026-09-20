#include <iostream> 
#include <string> 
#include <iomanip> 
using namespace std; 
 
#include "pegawai.cpp" 
 
 
int main() { 
 
    Pegawai daftarPegawai[100]; 
 
    int jumlahPegawai = 0; 
    int pilihan; 
 
 
    // data awal
    daftarPegawai[0] = Pegawai( 
        "A2521001", 
        "Agus Yamaha", 
        "Kasir", 
        "Melayani pembelian tiket bioskop", 
        3500000, 
        "pagi" 
    ); 
 
    daftarPegawai[1] = Pegawai( 
        "A2521002", 
        "Budiono Siregar", 
        "Petugas Tiket", 
        "Memeriksa tiket penonton sebelum masuk studio", 
        3200000, 
        "siang" 
    ); 
 
    daftarPegawai[2] = Pegawai( 
        "A2521003", 
        "Yusup Telolet", 
        "Cleaning Service", 
        "Membersihkan studio setelah pemutaran film", 
        3000000, 
        "malam" 
    ); 
 
    daftarPegawai[3] = Pegawai( 
        "A2521004", 
        "Tedy Boy Friend Prabowo", 
        "Security", 
        "Menjaga keamanan area bioskop", 
        4000000, 
        "pagi" 
    ); 
 
    daftarPegawai[4] = Pegawai( 
        "A2521005", 
        "Luthfi Aulia Jodi", 
        "Supervisor / CEO", 
        "Mengawasi kegiatan operasional bioskop", 
        9999999, 
        "malam" 
    ); 
 
    jumlahPegawai = 5; 
 
 
    do { 
 
        cout << "\n========================================" << endl; 
        cout << "       SISTEM DATA PEGAWAI BIOSKOP" << endl; 
        cout << "========================================" << endl; 
        cout << "1. Tambah Data Pegawai" << endl; 
        cout << "2. Lihat Semua Data Pegawai" << endl; 
        cout << "3. Lihat Detail Pegawai" << endl; 
        cout << "4. Cari Pegawai" << endl; 
        cout << "5. Ubah Data Pegawai" << endl; 
        cout << "6. Hapus Data Pegawai" << endl; 
        cout << "7. Lihat Daftar Jabatan" << endl; 
        cout << "8. Lihat Daftar Shift" << endl; 
        cout << "9. Keluar" << endl; 
        cout << "========================================" << endl; 
        cout << "Pilih menu: "; 
        cin >> pilihan; 
 
 
        // tambah data
        if (pilihan == 1) { 
 
            cout << "\n========================================" << endl; 
            cout << "--- TAMBAH DATA PEGAWAI ---" << endl; 
            cout << "========================================" << endl; 
 
            if (jumlahPegawai >= 100) { 
 
                cout << "Data pegawai sudah penuh." << endl; 
 
            } else { 
 
                cout << "Masukan ID Pegawai: "; 
 
                string IdPegawai; 
                cin >> IdPegawai; 
 
                bool idSudahAda = false; 
 
 
                // cek ID
                for (int i = 0; i < jumlahPegawai; i++) { 
 
                    if (daftarPegawai[i].getIdPegawai() == IdPegawai) { 
 
                        idSudahAda = true; 
                        break; 
                    } 
                } 
 
 
                if (idSudahAda == true) { 
 
                    cout << "ID Pegawai sudah digunakan." << endl; 
 
                } else { 
 
                    cin.ignore(); 
 
                    cout << "Masukan Nama Pegawai: "; 
 
                    string Nama; 
                    getline(cin, Nama); 
 
 
                    cout << "Masukan Jabatan Pegawai: "; 
 
                    string Jabatan; 
                    getline(cin, Jabatan); 
 
 
                    cout << "Masukan Tugas Pegawai: "; 
 
                    string Tugas; 
                    getline(cin, Tugas); 
 
 
                    cout << "Masukan Gaji Pegawai: "; 
 
                    double Gaji; 
                    cin >> Gaji; 
 
 
                    cin.ignore(); 
 
                    cout << "Masukan Status Shift Pegawai (pagi/siang/malam): "; 
 
                    string StatusShift; 
                    getline(cin, StatusShift); 
 
 
                    daftarPegawai[jumlahPegawai] = Pegawai( 
                        IdPegawai, 
                        Nama, 
                        Jabatan, 
                        Tugas, 
                        Gaji, 
                        StatusShift 
                    ); 
 
                    jumlahPegawai++; 
 
                    cout << "\nData pegawai berhasil ditambahkan." << endl; 
                } 
            } 
 
 
        // lihat semua data
        } else if (pilihan == 2) { 
 
            cout << "\n========================================" << endl; 
            cout << "--- DATA SEMUA PEGAWAI ---" << endl; 
            cout << "========================================" << endl; 
 
 
            if (jumlahPegawai == 0) { 
 
                cout << "Data pegawai tidak tersedia." << endl; 
 
            } else { 
 
                for (int i = 0; i < jumlahPegawai; i++) { 
 
                    cout << "\n================================" << endl; 
                    cout << "Data Pegawai ke-" << (i + 1) << endl; 
                    cout << "================================" << endl; 
 
                    cout << "ID       : " << daftarPegawai[i].getIdPegawai() << endl; 
                    cout << "Nama     : " << daftarPegawai[i].getNama() << endl; 
                    cout << "Jabatan  : " << daftarPegawai[i].getJabatan() << endl; 
                    cout << "Tugas    : " << daftarPegawai[i].getTugas() << endl; 
 
                    cout << "Gaji     : " 
                         << fixed << setprecision(0) 
                         << daftarPegawai[i].getGaji() 
                         << endl; 
 
                    cout << "Shift    : " << daftarPegawai[i].getStatusShift() << endl; 
 
                    cout << "========================================" << endl; 
                } 
            } 
 
 
        // detail pegawai
        } else if (pilihan == 3) { 
 
            cout << "\n========================================" << endl; 
            cout << "--- DETAIL PEGAWAI ---" << endl; 
            cout << "========================================" << endl; 
 
 
            if (jumlahPegawai == 0) { 
 
                cout << "Data pegawai tidak tersedia." << endl; 
 
            } else { 
 
                cout << "Masukkan ID Pegawai: "; 
 
                string cariId; 
                cin >> cariId; 
 
                bool ditemukan = false; 
 
 
                for (int i = 0; i < jumlahPegawai; i++) { 
 
                    if (daftarPegawai[i].getIdPegawai() == cariId) { 
 
                        cout << "\n================================" << endl; 
                        cout << "        DETAIL PEGAWAI" << endl; 
                        cout << "================================" << endl; 
 
                        cout << "ID       : " << daftarPegawai[i].getIdPegawai() << endl; 
                        cout << "Nama     : " << daftarPegawai[i].getNama() << endl; 
                        cout << "Jabatan  : " << daftarPegawai[i].getJabatan() << endl; 
                        cout << "Tugas    : " << daftarPegawai[i].getTugas() << endl; 
 
                        cout << "Gaji     : " 
                             << fixed << setprecision(0) 
                             << daftarPegawai[i].getGaji() 
                             << endl; 
 
                        cout << "Shift    : " << daftarPegawai[i].getStatusShift() << endl; 
 
                        cout << "========================================" << endl; 
 
                        ditemukan = true; 
                        break; 
                    } 
                } 
 
 
                if (ditemukan == false) { 
 
                    cout << "\nPegawai dengan ID " 
                         << cariId 
                         << " tidak ditemukan." 
                         << endl; 
                } 
            } 
 
 
        // cari pegawai
        } else if (pilihan == 4) { 
 
            cout << "\n========================================" << endl; 
            cout << "--- CARI PEGAWAI ---" << endl; 
            cout << "========================================" << endl; 
 
 
            if (jumlahPegawai == 0) { 
 
                cout << "Data pegawai tidak tersedia." << endl; 
                cout << "Silahkan input data pegawai terlebih dahulu." << endl; 
 
            } else { 
 
                cout << "Masukkan nama pegawai: "; 
 
                cin.ignore(); 
 
                string cariNama; 
                getline(cin, cariNama); 
 
                bool ditemukan = false; 
 
 
                for (int i = 0; i < jumlahPegawai; i++) { 
 
                    if (daftarPegawai[i].getNama() == cariNama) { 
 
                        cout << "\n================================" << endl; 
                        cout << "Data Pegawai Ditemukan" << endl; 
                        cout << "================================" << endl; 
 
                        cout << "ID       : " << daftarPegawai[i].getIdPegawai() << endl; 
                        cout << "Nama     : " << daftarPegawai[i].getNama() << endl; 
                        cout << "Jabatan  : " << daftarPegawai[i].getJabatan() << endl; 
                        cout << "Tugas    : " << daftarPegawai[i].getTugas() << endl; 
 
                        cout << "Gaji     : " 
                             << fixed << setprecision(0) 
                             << daftarPegawai[i].getGaji() 
                             << endl; 
 
                        cout << "Shift    : " << daftarPegawai[i].getStatusShift() << endl; 
 
                        ditemukan = true; 
                    } 
                } 
 
 
                if (ditemukan == false) { 
 
                    cout << "\nPegawai dengan nama tersebut tidak ditemukan." 
                         << endl; 
                } 
            } 
 
 
        // ubah data
        } else if (pilihan == 5) { 
 
            cout << "\n================================" << endl; 
            cout << "--- UBAH DATA PEGAWAI ---" << endl; 
            cout << "================================" << endl; 
 
 
            if (jumlahPegawai == 0) { 
 
                cout << "Data pegawai tidak tersedia." << endl; 
                cout << "Silahkan input data pegawai terlebih dahulu!" << endl; 
 
            } else { 
 
                // tampilkan daftar
                cout << "\n================================" << endl; 
                cout << "       DAFTAR PEGAWAI" << endl; 
                cout << "================================" << endl; 
 
                cout << left 
                     << setw(5) << "No." 
                     << setw(10) << "ID" 
                     << setw(20) << "Nama" 
                     << endl; 
 
                cout << "--------------------------------" << endl; 
 
 
                for (int i = 0; i < jumlahPegawai; i++) { 
 
                    cout << left 
                         << setw(5) << (i + 1) 
                         << setw(10) << daftarPegawai[i].getIdPegawai() 
                         << setw(20) << daftarPegawai[i].getNama() 
                         << endl; 
                } 
 
 
                cout << "================================" << endl; 
 
                cout << "Masukkan ID Pegawai: "; 
 
                string cariId; 
                cin >> cariId; 
 
                bool ditemukan = false; 
 
 
                for (int i = 0; i < jumlahPegawai; i++) { 
 
                    if (daftarPegawai[i].getIdPegawai() == cariId) { 
 
                        ditemukan = true; 
 
                        int ubah; 
 
 
                        do { 
 
                            cout << "\n================================" << endl; 
                            cout << "       UBAH DATA PEGAWAI" << endl; 
                            cout << "================================" << endl; 
 
                            cout << "ID       : " 
                                 << daftarPegawai[i].getIdPegawai() 
                                 << endl; 
 
                            cout << "Nama     : " 
                                 << daftarPegawai[i].getNama() 
                                 << endl; 
 
                            cout << "Jabatan  : " 
                                 << daftarPegawai[i].getJabatan() 
                                 << endl; 
 
                            cout << "Tugas    : " 
                                 << daftarPegawai[i].getTugas() 
                                 << endl; 
 
                            cout << "Gaji     : " 
                                 << fixed << setprecision(0) 
                                 << daftarPegawai[i].getGaji() 
                                 << endl; 
 
                            cout << "Shift    : " 
                                 << daftarPegawai[i].getStatusShift() 
                                 << endl; 
 
                            cout << "========================================" << endl; 
 
                            cout << "\nYang ingin diubah:" << endl; 
                            cout << "1. Nama" << endl; 
                            cout << "2. Jabatan" << endl; 
                            cout << "3. Tugas" << endl; 
                            cout << "4. Gaji" << endl; 
                            cout << "5. Shift" << endl; 
                            cout << "6. Kembali" << endl; 
 
                            cout << "Pilih perubahan: "; 
                            cin >> ubah; 
 
                            cin.ignore(); 
 
 
                            if (ubah == 1) { 
 
                                cout << "Masukkan nama baru: "; 
 
                                string namaBaru; 
                                getline(cin, namaBaru); 
 
                                daftarPegawai[i].setNama(namaBaru); 
 
                                cout << "Nama berhasil diubah." << endl; 
 
 
                            } else if (ubah == 2) { 
 
                                cout << "Masukkan jabatan baru: "; 
 
                                string jabatanBaru; 
                                getline(cin, jabatanBaru); 
 
                                daftarPegawai[i].setJabatan(jabatanBaru); 
 
                                cout << "Jabatan berhasil diubah." << endl; 
 
 
                            } else if (ubah == 3) { 
 
                                cout << "Masukkan tugas baru: "; 
 
                                string tugasBaru; 
                                getline(cin, tugasBaru); 
 
                                daftarPegawai[i].setTugas(tugasBaru); 
 
                                cout << "Tugas berhasil diubah." << endl; 
 
 
                            } else if (ubah == 4) { 
 
                                cout << "Masukkan gaji baru: "; 
 
                                double gajiBaru; 
                                cin >> gajiBaru; 
 
                                daftarPegawai[i].setGaji(gajiBaru); 
 
                                cout << "Gaji berhasil diubah." << endl; 
 
 
                            } else if (ubah == 5) { 
 
                                cout << "Masukkan shift baru (pagi/siang/malam): "; 
 
                                string shiftBaru; 
                                cin >> shiftBaru; 
 
                                daftarPegawai[i].setStatusShift(shiftBaru); 
 
                                cout << "Shift berhasil diubah." << endl; 
 
 
                            } else if (ubah == 6) { 
 
                                cout << "Kembali ke menu utama." << endl; 
 
 
                            } else { 
 
                                cout << "Pilihan tidak tersedia." << endl; 
                            } 
 
 
                        } while (ubah != 6); 
 
                        break; 
                    } 
                } 
 
 
                if (ditemukan == false) { 
 
                    cout << "\nPegawai dengan ID " 
                         << cariId 
                         << " tidak ditemukan." 
                         << endl; 
                } 
            } 
 
 
        // hapus data
        } else if (pilihan == 6) { 
 
            cout << "\n========================================" << endl; 
            cout << "--- HAPUS DATA PEGAWAI ---" << endl; 
            cout << "========================================" << endl; 
 
 
            if (jumlahPegawai == 0) { 
 
                cout << "Data pegawai tidak tersedia." << endl; 
                cout << "Silahkan input data pegawai terlebih dahulu!" << endl; 
 
            } else { 
 
                // tampilkan daftar
                cout << "\n================================" << endl; 
                cout << "       DAFTAR PEGAWAI" << endl; 
                cout << "================================" << endl; 
 
                cout << left 
                     << setw(5) << "No." 
                     << setw(10) << "ID" 
                     << setw(20) << "Nama" 
                     << endl; 
 
                cout << "--------------------------------" << endl; 
 
 
                for (int i = 0; i < jumlahPegawai; i++) { 
 
                    cout << left 
                         << setw(5) << (i + 1) 
                         << setw(10) << daftarPegawai[i].getIdPegawai() 
                         << setw(20) << daftarPegawai[i].getNama() 
                         << endl; 
                } 
 
 
                cout << "================================" << endl; 
 
                cout << "Masukkan ID Pegawai yang ingin dihapus: "; 
 
                string hapusId; 
                cin >> hapusId; 
 
                bool ditemukan = false; 
 
 
                for (int i = 0; i < jumlahPegawai; i++) { 
 
                    if (daftarPegawai[i].getIdPegawai() == hapusId) { 
 
                        ditemukan = true; 
 
 
                        cout << "\nData yang akan dihapus:" << endl; 
 
                        cout << "ID   : " 
                             << daftarPegawai[i].getIdPegawai() 
                             << endl; 
 
                        cout << "Nama : " 
                             << daftarPegawai[i].getNama() 
                             << endl; 
 
 
                        cout << "\nYakin ingin menghapus data ini? (ya/tidak): "; 
 
                        string konfirmasi; 
                        cin >> konfirmasi; 
 
 
                        if (konfirmasi == "ya" || konfirmasi == "Ya") { 
 
                            // geser data
                            for (int j = i; j < jumlahPegawai - 1; j++) { 
 
                                daftarPegawai[j] = daftarPegawai[j + 1]; 
                            } 
 
                            jumlahPegawai--; 
 
                            cout << "\nData pegawai berhasil dihapus." << endl; 
 
                        } else { 
 
                            cout << "\nPenghapusan dibatalkan." << endl; 
                        } 
 
                        break; 
                    } 
                } 
 
 
                if (ditemukan == false) { 
 
                    cout << "\nPegawai dengan ID " 
                         << hapusId 
                         << " tidak ditemukan." 
                         << endl; 
                } 
            } 
 
 
        // daftar jabatan
        } else if (pilihan == 7) { 
 
            cout << "\n========================================" << endl; 
            cout << "--- DAFTAR JABATAN ---" << endl; 
            cout << "========================================" << endl; 
            cout << "1. Kasir" << endl; 
            cout << "2. Petugas Tiket" << endl; 
            cout << "3. Cleaning Service" << endl; 
            cout << "4. Security" << endl; 
            cout << "5. Supervisor" << endl; 
            cout << "========================================" << endl; 
 
 
        // daftar shift
        } else if (pilihan == 8) { 
 
            cout << "\n========================================" << endl; 
            cout << "--- DAFTAR SHIFT ---" << endl; 
            cout << "========================================" << endl; 
            cout << "1. Pagi  : 08.00 - 13.00" << endl; 
            cout << "2. Siang : 13.00 - 18.00" << endl; 
            cout << "3. Malam : 18.00 - 23.00" << endl; 
            cout << "========================================" << endl; 
 
 
        // keluar
        } else if (pilihan == 9) { 
 
            cout << "\n========================================" << endl; 
            cout << "Program ditutup." << endl; 
            cout << "Terima kasih telah menggunakan sistem." << endl; 
            cout << "========================================" << endl; 
 
 
        // pilihan salah
        } else { 
 
            cout << "\nPilihan tidak tersedia!" << endl; 
        } 
 
 
    } while (pilihan != 9); 
 
 
    return 0; 
}