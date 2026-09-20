class Pegawai:

    def __init__(self, IdPegawai, Nama, Jabatan, Tugas, Gaji, StatusShift):
        self.IdPegawai = IdPegawai
        self.Nama = Nama
        self.Jabatan = Jabatan
        self.Tugas = Tugas
        self.Gaji = Gaji
        self.StatusShift = StatusShift

    def setIdPegawai(self, IdPegawai):
        self.IdPegawai = IdPegawai
        return IdPegawai

    def setNama(self, Nama):
        self.Nama = Nama
        return Nama

    def setJabatan(self, Jabatan):
        self.Jabatan = Jabatan
        return Jabatan

    def setTugas(self, Tugas):
        self.Tugas = Tugas
        return Tugas

    def setGaji(self, Gaji):
        self.Gaji = Gaji
        return Gaji

    def setStatusShift(self, StatusShift):
        self.StatusShift = StatusShift
        return StatusShift

    def getIdPegawai(self):
        return self.IdPegawai

    def getNama(self):
        return self.Nama

    def getJabatan(self):
        return self.Jabatan

    def getTugas(self):
        return self.Tugas

    def getGaji(self):
        return self.Gaji

    def getStatusShift(self):

        if self.StatusShift.lower() == "pagi":
            return "08.00 - 13.00 WIB (Pagi)"

        elif self.StatusShift.lower() == "siang":
            return "13.00 - 18.00 WIB (Siang)  "

        elif self.StatusShift.lower() == "malam":
            return "18.00 - 23.00 WIB (Malam)"

        else:
            return "Shift tidak tersedia"