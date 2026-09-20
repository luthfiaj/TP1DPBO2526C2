import java.util.Scanner;

public class main {

    public static void main(String[] args) {

        Scanner input = new Scanner(System.in);

        Pegawai[] daftarPegawai = new Pegawai[100];

        int jumlahPegawai = 0;
        int pilihan;

        // data awal
        daftarPegawai[0] = new Pegawai(
            "A2521001",
            "Agus Yamaha",
            "Kasir",
            "Melayani pembelian tiket bioskop",
            3500000,
            "pagi"
        );

        daftarPegawai[1] = new Pegawai(
            "A2521002",
            "Budiono Siregar",
            "Petugas Tiket",
            "Memeriksa tiket penonton sebelum masuk studio",
            3200000,
            "siang"
        );

        daftarPegawai[2] = new Pegawai(
            "A2521003",
            "Yusup Telolet",
            "Cleaning Service",
            "Membersihkan studio setelah pemutaran film",
            3000000,
            "malam"
        );

        daftarPegawai[3] = new Pegawai(
            "A2521004",
            "Tedy Boy Friend Prabowo",
            "Security",
            "Menjaga keamanan area bioskop",
            4000000,
            "pagi"
        );

        daftarPegawai[4] = new Pegawai(
            "A2521005",
            "Luthfi Aulia Jodi",
            "Supervisor / CEO",
            "Mengawasi kegiatan operasional bioskop",
            9999999,
            "malam"
        );

        jumlahPegawai = 5;

        do {

            System.out.println("\n========================================");
            System.out.println("       SISTEM DATA PEGAWAI BIOSKOP");
            System.out.println("========================================");
            System.out.println("1. Tambah Data Pegawai");
            System.out.println("2. Lihat Semua Data Pegawai");
            System.out.println("3. Lihat Detail Pegawai");
            System.out.println("4. Cari Pegawai");
            System.out.println("5. Ubah Data Pegawai");
            System.out.println("6. Hapus Data Pegawai");
            System.out.println("7. Lihat Daftar Jabatan");
            System.out.println("8. Lihat Daftar Shift");
            System.out.println("9. Keluar");
            System.out.println("========================================");
            System.out.print("Pilih menu: ");
            pilihan = input.nextInt();

            // tambah data
            if (pilihan == 1) {

                System.out.println("\n========================================");
                System.out.println("--- TAMBAH DATA PEGAWAI ---");
                System.out.println("========================================");

                if (jumlahPegawai >= 100) {

                    System.out.println("Data pegawai sudah penuh.");

                } else {

                    System.out.print("Masukan ID Pegawai: ");
                    String IdPegawai = input.next();

                    boolean idSudahAda = false;

                    // cek ID
                    for (int i = 0; i < jumlahPegawai; i++) {

                        if (daftarPegawai[i].getIdPegawai().equalsIgnoreCase(IdPegawai)) {

                            idSudahAda = true;
                            break;
                        }
                    }

                    if (idSudahAda == true) {

                        System.out.println("ID Pegawai sudah digunakan.");

                    } else {

                        input.nextLine();

                        System.out.print("Masukan Nama Pegawai: ");
                        String Nama = input.nextLine();

                        System.out.print("Masukan Jabatan Pegawai: ");
                        String Jabatan = input.nextLine();

                        System.out.print("Masukan Tugas Pegawai: ");
                        String Tugas = input.nextLine();

                        System.out.print("Masukan Gaji Pegawai: ");
                        double Gaji = input.nextDouble();

                        input.nextLine();

                        System.out.print("Masukan Status Shift Pegawai (pagi/siang/malam): ");
                        String StatusShift = input.nextLine();

                        daftarPegawai[jumlahPegawai] = new Pegawai(
                            IdPegawai,
                            Nama,
                            Jabatan,
                            Tugas,
                            Gaji,
                            StatusShift
                        );

                        jumlahPegawai++;

                        System.out.println("\nData pegawai berhasil ditambahkan.");
                    }
                }

            // lihat semua data
            } else if (pilihan == 2) {

                System.out.println("\n========================================");
                System.out.println("--- DATA SEMUA PEGAWAI ---");
                System.out.println("========================================");

                if (jumlahPegawai == 0) {

                    System.out.println("Data pegawai tidak tersedia.");

                } else {

                    for (int i = 0; i < jumlahPegawai; i++) {

                        System.out.println("\n================================");
                        System.out.println("Data Pegawai ke-" + (i + 1));
                        System.out.println("================================");

                        System.out.println("ID       : " + daftarPegawai[i].getIdPegawai());
                        System.out.println("Nama     : " + daftarPegawai[i].getNama());
                        System.out.println("Jabatan  : " + daftarPegawai[i].getJabatan());
                        System.out.println("Tugas    : " + daftarPegawai[i].getTugas());
                        System.out.println("Gaji     : " + daftarPegawai[i].getGaji());
                        System.out.println("Shift    : " + daftarPegawai[i].getStatusShift());

                        System.out.println("========================================");
                    }
                }

            // detail pegawai
            } else if (pilihan == 3) {

                System.out.println("\n========================================");
                System.out.println("--- DETAIL PEGAWAI ---");
                System.out.println("========================================");

                if (jumlahPegawai == 0) {

                    System.out.println("Data pegawai tidak tersedia.");

                } else {

                    System.out.print("Masukkan ID Pegawai: ");
                    String cariId = input.next();

                    boolean ditemukan = false;

                    // cari berdasarkan ID
                    for (int i = 0; i < jumlahPegawai; i++) {

                        if (daftarPegawai[i].getIdPegawai().equalsIgnoreCase(cariId)) {

                            System.out.println("\n================================");
                            System.out.println("        DETAIL PEGAWAI");
                            System.out.println("================================");

                            System.out.println("ID       : " + daftarPegawai[i].getIdPegawai());
                            System.out.println("Nama     : " + daftarPegawai[i].getNama());
                            System.out.println("Jabatan  : " + daftarPegawai[i].getJabatan());
                            System.out.println("Tugas    : " + daftarPegawai[i].getTugas());
                            System.out.println("Gaji     : " + daftarPegawai[i].getGaji());
                            System.out.println("Shift    : " + daftarPegawai[i].getStatusShift());

                            System.out.println("========================================");

                            ditemukan = true;
                            break;
                        }
                    }

                    if (ditemukan == false) {

                        System.out.println(
                            "\nPegawai dengan ID " + cariId + " tidak ditemukan."
                        );
                    }
                }

            // cari pegawai
            } else if (pilihan == 4) {

                System.out.println("\n========================================");
                System.out.println("--- CARI PEGAWAI ---");
                System.out.println("========================================");

                if (jumlahPegawai == 0) {

                    System.out.println("Data pegawai tidak tersedia.");
                    System.out.println("Silahkan input data pegawai terlebih dahulu.");

                } else {

                    System.out.print("Masukkan nama pegawai: ");

                    input.nextLine();

                    String cariNama = input.nextLine();

                    boolean ditemukan = false;

                    // cari berdasarkan nama
                    for (int i = 0; i < jumlahPegawai; i++) {

                        if (daftarPegawai[i].getNama().equalsIgnoreCase(cariNama)) {

                            System.out.println("\n================================");
                            System.out.println("Data Pegawai Ditemukan");
                            System.out.println("================================");

                            System.out.println("ID       : " + daftarPegawai[i].getIdPegawai());
                            System.out.println("Nama     : " + daftarPegawai[i].getNama());
                            System.out.println("Jabatan  : " + daftarPegawai[i].getJabatan());
                            System.out.println("Tugas    : " + daftarPegawai[i].getTugas());
                            System.out.println("Gaji     : " + daftarPegawai[i].getGaji());
                            System.out.println("Shift    : " + daftarPegawai[i].getStatusShift());

                            ditemukan = true;
                        }
                    }

                    if (ditemukan == false) {

                        System.out.println(
                            "\nPegawai dengan nama tersebut tidak ditemukan."
                        );
                    }
                }

            // ubah data
            } else if (pilihan == 5) {

                System.out.println("\n================================");
                System.out.println("--- UBAH DATA PEGAWAI ---");
                System.out.println("================================");

                if (jumlahPegawai == 0) {

                    System.out.println("Data pegawai tidak tersedia.");
                    System.out.println("Silahkan input data pegawai terlebih dahulu!");

                } else {

                    System.out.println("\n================================");
                    System.out.println("       DAFTAR PEGAWAI");
                    System.out.println("================================");

                    System.out.printf(
                        "%-5s %-10s %-20s%n",
                        "No.",
                        "ID",
                        "Nama"
                    );

                    System.out.println("--------------------------------");

                    // tampilkan daftar
                    for (int i = 0; i < jumlahPegawai; i++) {

                        System.out.printf(
                            "%-5d %-10s %-20s%n",
                            (i + 1),
                            daftarPegawai[i].getIdPegawai(),
                            daftarPegawai[i].getNama()
                        );
                    }

                    System.out.println("================================");

                    System.out.print("Masukkan ID Pegawai: ");
                    String cariId = input.next();

                    boolean ditemukan = false;

                    // cari ID
                    for (int i = 0; i < jumlahPegawai; i++) {

                        if (daftarPegawai[i].getIdPegawai().equalsIgnoreCase(cariId)) {

                            ditemukan = true;

                            int ubah;

                            do {

                                System.out.println("\n================================");
                                System.out.println("       UBAH DATA PEGAWAI");
                                System.out.println("================================");

                                System.out.println(
                                    "ID       : " + daftarPegawai[i].getIdPegawai()
                                );

                                System.out.println(
                                    "Nama     : " + daftarPegawai[i].getNama()
                                );

                                System.out.println(
                                    "Jabatan  : " + daftarPegawai[i].getJabatan()
                                );

                                System.out.println(
                                    "Tugas    : " + daftarPegawai[i].getTugas()
                                );

                                System.out.println(
                                    "Gaji     : " + daftarPegawai[i].getGaji()
                                );

                                System.out.println(
                                    "Shift    : " + daftarPegawai[i].getStatusShift()
                                );

                                System.out.println("========================================");

                                System.out.println("\nYang ingin diubah:");
                                System.out.println("1. Nama");
                                System.out.println("2. Jabatan");
                                System.out.println("3. Tugas");
                                System.out.println("4. Gaji");
                                System.out.println("5. Shift");
                                System.out.println("6. Kembali");

                                System.out.print("Pilih perubahan: ");
                                ubah = input.nextInt();

                                input.nextLine();

                                if (ubah == 1) {

                                    System.out.print("Masukkan nama baru: ");
                                    String namaBaru = input.nextLine();

                                    daftarPegawai[i].setNama(namaBaru);

                                    System.out.println("Nama berhasil diubah.");

                                } else if (ubah == 2) {

                                    System.out.print("Masukkan jabatan baru: ");
                                    String jabatanBaru = input.nextLine();

                                    daftarPegawai[i].setJabatan(jabatanBaru);

                                    System.out.println("Jabatan berhasil diubah.");

                                } else if (ubah == 3) {

                                    System.out.print("Masukkan tugas baru: ");
                                    String tugasBaru = input.nextLine();

                                    daftarPegawai[i].setTugas(tugasBaru);

                                    System.out.println("Tugas berhasil diubah.");

                                } else if (ubah == 4) {

                                    System.out.print("Masukkan gaji baru: ");
                                    double gajiBaru = input.nextDouble();

                                    daftarPegawai[i].setGaji(gajiBaru);

                                    System.out.println("Gaji berhasil diubah.");

                                } else if (ubah == 5) {

                                    System.out.print(
                                        "Masukkan shift baru (pagi/siang/malam): "
                                    );

                                    String shiftBaru = input.next();

                                    daftarPegawai[i].setStatusShift(shiftBaru);

                                    System.out.println("Shift berhasil diubah.");

                                } else if (ubah == 6) {

                                    System.out.println("Kembali ke menu utama.");

                                } else {

                                    System.out.println("Pilihan tidak tersedia.");
                                }

                            } while (ubah != 6);

                            break;
                        }
                    }

                    if (ditemukan == false) {

                        System.out.println(
                            "\nPegawai dengan ID " + cariId + " tidak ditemukan."
                        );
                    }
                }

            // hapus data
            } else if (pilihan == 6) {

                System.out.println("\n========================================");
                System.out.println("--- HAPUS DATA PEGAWAI ---");
                System.out.println("========================================");

                if (jumlahPegawai == 0) {

                    System.out.println("Data pegawai tidak tersedia.");
                    System.out.println("Silahkan input data pegawai terlebih dahulu!");

                } else {

                    System.out.println("\n================================");
                    System.out.println("       DAFTAR PEGAWAI");
                    System.out.println("================================");

                    System.out.printf(
                        "%-5s %-10s %-20s%n",
                        "No.",
                        "ID",
                        "Nama"
                    );

                    System.out.println("--------------------------------");

                    // tampilkan daftar
                    for (int i = 0; i < jumlahPegawai; i++) {

                        System.out.printf(
                            "%-5d %-10s %-20s%n",
                            (i + 1),
                            daftarPegawai[i].getIdPegawai(),
                            daftarPegawai[i].getNama()
                        );
                    }

                    System.out.println("================================");

                    System.out.print(
                        "Masukkan ID Pegawai yang ingin dihapus: "
                    );

                    String hapusId = input.next();

                    boolean ditemukan = false;

                    // cari data
                    for (int i = 0; i < jumlahPegawai; i++) {

                        if (daftarPegawai[i].getIdPegawai().equalsIgnoreCase(hapusId)) {

                            ditemukan = true;

                            System.out.println("\nData yang akan dihapus:");

                            System.out.println(
                                "ID   : " + daftarPegawai[i].getIdPegawai()
                            );

                            System.out.println(
                                "Nama : " + daftarPegawai[i].getNama()
                            );

                            System.out.print(
                                "\nYakin ingin menghapus data ini? (ya/tidak): "
                            );

                            String konfirmasi = input.next();

                            if (konfirmasi.equalsIgnoreCase("ya")) {

                                // geser data
                                for (int j = i; j < jumlahPegawai - 1; j++) {

                                    daftarPegawai[j] = daftarPegawai[j + 1];
                                }

                                jumlahPegawai--;

                                System.out.println(
                                    "\nData pegawai berhasil dihapus."
                                );

                            } else {

                                System.out.println(
                                    "\nPenghapusan dibatalkan."
                                );
                            }

                            break;
                        }
                    }

                    if (ditemukan == false) {

                        System.out.println(
                            "\nPegawai dengan ID " + hapusId +
                            " tidak ditemukan."
                        );
                    }
                }

            // daftar jabatan
            } else if (pilihan == 7) {

                System.out.println("\n========================================");
                System.out.println("--- DAFTAR JABATAN ---");
                System.out.println("========================================");
                System.out.println("1. Kasir");
                System.out.println("2. Petugas Tiket");
                System.out.println("3. Cleaning Service");
                System.out.println("4. Security");
                System.out.println("5. Supervisor");
                System.out.println("========================================");

            // daftar shift
            } else if (pilihan == 8) {

                System.out.println("\n========================================");
                System.out.println("--- DAFTAR SHIFT ---");
                System.out.println("========================================");
                System.out.println("1. Pagi  : 08.00 - 13.00");
                System.out.println("2. Siang : 13.00 - 18.00");
                System.out.println("3. Malam : 18.00 - 23.00");
                System.out.println("========================================");

            // keluar
            } else if (pilihan == 9) {

                System.out.println("\n========================================");
                System.out.println("Program ditutup.");
                System.out.println("Terima kasih telah menggunakan sistem.");
                System.out.println("========================================");

            // pilihan salah
            } else {

                System.out.println("\nPilihan tidak tersedia!");
            }

        } while (pilihan != 9);

        input.close();
    }
}