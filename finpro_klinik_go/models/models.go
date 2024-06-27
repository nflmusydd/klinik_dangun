package models

type Dokters struct {
	Id                   int64  `gorm:"primarykey" json:"id"`
	Nama_dokter          string `gorm:"type:varchar(255)" json:"nama_dokter" binding:"required"`
	Nomor_telepon        string `gorm:"type:varchar(255)" json:"no_telp_dokter" binding:"required"`
	Tanggal_lahir_dokter string `gorm:"type:varchar(255)" json:"tanggal_lahir_dokter" binding:"required"`
	Alamat_dokter        string `gorm:"type:varchar(255)" json:"alamat_dokter" binding:"required"`
	Spesialisasi         string `gorm:"type:varchar(255)" json:"spesialisasi" binding:"required"`
	Ruangan              string `gorm:"type:varchar(255)" json:"ruagan" binding:"required"`
	Foto_dokter          string `gorm:"type:varchar(255)" json:"foto_dokter" binding:"required"`
}

type Jenis_Konsultasi struct {
	Id              int64  `gorm:"primarykey" json:"id"`
	Nama_konsultasi string `gorm:"type:varchar(255)" json:"nama_konsultasi" binding:"required"`
	Deskripsi       string `gorm:"type:varchar(255)" json:"deskripsi" binding:"required"`
	Gambar          string `gorm:"type:varchar(255)" json:"gambar" binding:"required"`
}

type User struct {
	Id          int64  `gorm:"primarykey" json:"id"`
	Nama        string `gorm:"type:varchar(255)" json:"nama" binding:"required"`
	Email       string `gorm:"type:varchar(255)" json:"email" binding:"required"`
	Phone       string `gorm:"type:varchar(255)" json:"no_telp_user" binding:"required"`
	Alamat_user string `gorm:"type:varchar(255)" json:"Alamat_user" binding:"required"`
	Usertype    string `gorm:"type:varchar(255)" json:"usertyper" binding:"required"`
	Password    string `gorm:"type:varchar(255)" json:"password" binding:"required"`
}

type Riwayat struct {
	Id              int64  `gorm:"primaryKey" json:"id"`
	Id_pasien       int16  `gorm:"foreignKey:Id" json:"id_pasien"` // Mengacu pada primary key Id dari tabel Pasien
	Id_antrian      string `gorm:"type:varchar(255)" json:"id_antrian" binding:"required"`
	Nama_pasien     string `gorm:"type:varchar(255)" json:"nama_pasien" binding:"required"`
	Nama_konsultasi string `gorm:"type:varchar(255)" json:"nama_konsultasi" binding:"required"`
	Nama_dokter     string `gorm:"type:varchar(255)" json:"nama_dokter" binding:"required"`
	Tanggal         string `gorm:"type:date" json:"tanggal" binding:"required"`
	Waktu           string `gorm:"type:time" json:"waktu" binding:"required"`
	Ruang           string `gorm:"type:varchar(255)" json:"ruang" binding:"required"`
	Status_booking  string `gorm:"type:varchar(255)" json:"status_booking" binding:"required"`
}

type Konsultasi struct {
	Id              int64  `gorm:"primaryKey" json:"id"`
	Id_antrian      int16  `gorm:"type:varchar(255)" json:"id_antrian" binding:"required"`
	Nama_konsultasi string `gorm:"type:varchar(255)" json:"nama_konsultasi" binding:"required"`
	Nama_dokter     string `gorm:"type:varchar(255)" json:"nama_dokter" binding:"required"`
	Tanggal         string `gorm:"type:date" json:"tanggal" binding:"required"`
	Waktu           string `gorm:"type:time" json:"waktu" binding:"required"`
	Harga           int64  `gorm:"type:int(11)" json:"Harga" binding:"required"`
	Ruangan         string `gorm:"type:varchar(255)" json:"ruangan" binding:"required"`
	Status          string `gorm:"type:varchar(255)" json:"status" binding:"required"`
	Nama_user       string `gorm:"type:varchar(255)" json:"nama_user" binding:"required"`
	Id_user         int16  `gorm:"foreignKey:Id" json:"id_pasien"`
}

type Tabler interface {
	TableName() string
}

func (Dokters) TableName() string {
	return "Dokters"
}

func (Jenis_Konsultasi) TableName() string {
	return "Jenis_konsultasi"
}

func (User) TableName() string {
	return "User"
}

func (Riwayat) TableName() string {
	return "Riwayat"
}

func (Konsultasi) TableName() string {
	return "Konsultasi"
}
