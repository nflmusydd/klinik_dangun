package jeniskonsultasicontroller

import (
	"net/http"
	"test/models"

	"github.com/gin-gonic/gin"
	"github.com/go-playground/validator/v10"
	"gorm.io/gorm"
)

func Index(c *gin.Context) {
	var jenis_konsultasi []models.Jenis_Konsultasi

	models.DB.Find(&jenis_konsultasi)

	c.JSON(http.StatusOK, gin.H{
		"status":  true,
		"message": "Datanya ditemukan",
		"data":    jenis_konsultasi,
	})

}

func Show(c *gin.Context) {
	var jenis_konsultasi models.Jenis_Konsultasi
	id := c.Param("id")

	if err := models.DB.First(&jenis_konsultasi, id).Error; err != nil {
		switch err {
		case gorm.ErrRecordNotFound:
			c.JSON(http.StatusOK, gin.H{
				"status":  false,
				"message": "Datanya tidak ditemukan",
			})
			return
		default:
			c.JSON(http.StatusOK, gin.H{
				"status":  false,
				"message": err.Error(),
			})
		}
	}

	c.JSON(http.StatusOK, gin.H{
		"status":  true,
		"message": "Data ditemukan",
		"data":    jenis_konsultasi,
	})
}

func Create(c *gin.Context) {
	var jenis_konsultasi models.Jenis_Konsultasi

	if err := c.ShouldBindJSON(&jenis_konsultasi); err != nil {
		c.JSON(http.StatusOK, gin.H{
			"status":  false,
			"message": "Gagal dalam membuat data",
			"data":    err.Error(),
		})
		return
	}
	validate := validator.New()
	if err := validate.Struct(jenis_konsultasi); err != nil {
		errors := err.(validator.ValidationErrors)
		c.JSON(http.StatusOK, gin.H{
			"status":  false,
			"message": "Tidak bisa menambahkan data",
			"data":    errors.Error(),
		})
		return
	}

	if err := models.DB.Create(&jenis_konsultasi).Error; err != nil {
		c.JSON(http.StatusOK, gin.H{
			"status":  false,
			"message": "Gagal memasukkan data",
			"data":    err.Error(),
		})
		return
	}

	c.JSON(http.StatusOK, gin.H{
		"status":  true,
		"message": "Sukses dalam menambahkan data",
	})
}

func Update(c *gin.Context) {
	var jenis_konsultasi models.Jenis_Konsultasi
	id := c.Param("id")

	if err := c.ShouldBindJSON(&jenis_konsultasi); err != nil {
		c.JSON(http.StatusOK, gin.H{
			"status":  false,
			"message": "Gagal melakukan update data",
			"data":    err.Error(),
		})
		return
	}

	if models.DB.Model(&jenis_konsultasi).Where("id_plg = ?", id).Updates(&jenis_konsultasi).RowsAffected == 0 {
		c.JSON(http.StatusOK, gin.H{
			"status":  false,
			"message": "Tidak ada perubahan",
			"data":    "Tidak ada perubahan",
		})
		return
	}

	c.JSON(http.StatusOK, gin.H{
		"status":  true,
		"message": "Sukses melakukan update data",
		"data":    jenis_konsultasi,
	})
}
func Delete(c *gin.Context) {
	var jenis_konsultasi models.Jenis_Konsultasi

	id := c.Param("id")

	if models.DB.Delete(&jenis_konsultasi, id).RowsAffected == 0 {
		c.JSON(http.StatusOK, gin.H{
			"status":  false,
			"message": "Tidak dapat menghapus data",
		})
		return
	}

	c.JSON(http.StatusOK, gin.H{
		"status":  true,
		"message": "Sukses melakukan delete data",
	})
}
