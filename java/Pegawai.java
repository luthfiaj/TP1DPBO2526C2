public class Pegawai{
    private String IdPegawai;
    private String Nama;
    private String Jabatan;
    private String Tugas;
    private double Gaji;
    private String StatusShift;

    public Pegawai(String IdPegawai, String Nama, String Jabatan, String Tugas, double Gaji, String StatusShift){
        this.IdPegawai = IdPegawai;
        this.Nama = Nama;
        this.Jabatan = Jabatan;
        this.Tugas = Tugas;
        this.Gaji = Gaji;
        this.StatusShift = StatusShift;
    }

    public String setIdPegawai(String IdPegawai) {
        this.IdPegawai = IdPegawai;
        return IdPegawai;
    }

    public String setNama(String Nama) {
        this.Nama = Nama;
        return Nama;
    }

    public String setJabatan(String Jabatan) {
        this.Jabatan = Jabatan;
        return Jabatan;
    }

    public String setTugas(String Tugas) {
        this.Tugas = Tugas;
        return Tugas;
    }

    public double setGaji(double Gaji) {
        this.Gaji = Gaji;
        return Gaji;
    }
    
    public String setStatusShift(String StatusShift) {
        this.StatusShift = StatusShift;
        return StatusShift;
    }

    public String getIdPegawai() {
        return IdPegawai;
    }

    public String getNama() {
        return Nama;
    }

    public String getJabatan() {
        return Jabatan;
    }

    public String getTugas() {
        return Tugas;
    }

    public double getGaji() {
        return Gaji;
    }

    public String getStatusShift() {
        if (StatusShift.equalsIgnoreCase("pagi")){
            return "08.00 - 13.00 WIB (Pagi)";
        }else if(StatusShift.equalsIgnoreCase("siang")){
            return "13.00 - 18.00 WIB (Siang)  ";
        }else if(StatusShift.equalsIgnoreCase("malam")){
            return "18.00 - 23.00 WIB (Malam)";
        }else {
            return "Shift tidak tersedia";
        }
    }
}