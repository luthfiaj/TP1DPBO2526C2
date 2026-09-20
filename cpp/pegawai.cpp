#include <string>
using namespace std;


class Pegawai {

private:
    string IdPegawai;
    string Nama;
    string Jabatan;
    string Tugas;
    double Gaji;
    string StatusShift;

public:
    // constructor default
    Pegawai() {
        IdPegawai = "";
        Nama = "";
        Jabatan = "";
        Tugas = "";
        Gaji = 0;
        StatusShift = "";
    }   
    // constructor
    Pegawai(string IdPegawai, string Nama, string Jabatan, string Tugas, double Gaji, string StatusShift) {
        this->IdPegawai = IdPegawai;
        this->Nama = Nama;
        this->Jabatan = Jabatan;
        this->Tugas = Tugas;
        this->Gaji = Gaji;
        this->StatusShift = StatusShift;
    }


 //setter

    string setIdPegawai(string IdPegawai) {
        this->IdPegawai = IdPegawai;
        return IdPegawai;
    }

    string setNama(string Nama) {
        this->Nama = Nama;
        return Nama;
    }

    string setJabatan(string Jabatan) {
        this->Jabatan = Jabatan;
        return Jabatan;
    }

    string setTugas(string Tugas) {
        this->Tugas = Tugas;
        return Tugas;
    }

    double setGaji(double Gaji) {
        this->Gaji = Gaji;
        return Gaji;
    }

    string setStatusShift(string StatusShift) {
        this->StatusShift = StatusShift;
        return StatusShift;
    }


 //getter

    string getIdPegawai() {
        return IdPegawai;
    }

    string getNama() {
        return Nama;
    }

    string getJabatan() {
        return Jabatan;
    }

    string getTugas() {
        return Tugas;
    }

    double getGaji() {
        return Gaji;
    }

    string getStatusShift() {

        if (StatusShift == "pagi" || StatusShift == "Pagi") {
            return "08.00 - 13.00 WIB (Pagi)";

        } else if (StatusShift == "siang" || StatusShift == "Siang") {
            return "13.00 - 18.00 WIB (Siang)";

        } else if (StatusShift == "malam" || StatusShift == "Malam") {
            return "18.00 - 23.00 WIB (Malam)";

        } else {
            return "Shift tidak tersedia";
        }
    }
};