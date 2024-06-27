package konsultasicontroller

import (
	"net/http"
	"test/models"

	"github.com/gin-gonic/gin"
	"github.com/go-playground/validator/v10"
	"gorm.io/gorm"
)

func Index(c *gin.Context) {
	var konsultasi []models.Konsultasi

	models.DB.Find(&konsultasi)

	c.JSON(http.StatusOK, gin.H{
		"status":  true,
		"message": "Datanya ditemukan",
		"data":    konsultasi,
	})

}

func Show(c *gin.Context) {
	var konsultasi models.Konsultasi
	id := c.Param("id")

	if err := models.DB.First(&konsultasi, id).Error; err != nil {
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
		"data":    konsultasi,
	})
}

func Create(c *gin.Context) {
	var konsultasi models.Konsultasi

	if err := c.ShouldBindJSON(&konsultasi); err != nil {
		c.JSON(http.StatusOK, gin.H{
			"status":  false,
			"message": "Gagal dalam membuat data",
			"data":    err.Error(),
		})
		return
	}
	validate := validator.New()
	if err := validate.Struct(konsultasi); err != nil {
		errors := err.(validator.ValidationErrors)
		c.JSON(http.StatusOK, gin.H{
			"status":  false,
			"message": "Tidak bisa menambahkan data",
			"data":    errors.Error(),
		})
		return
	}

	if err := models.DB.Create(&konsultasi).Error; err != nil {
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
	var konsultasi models.Konsultasi
	id := c.Param("id")

	if err := c.ShouldBindJSON(&konsultasi); err != nil {
		c.JSON(http.StatusOK, gin.H{
			"status":  false,
			"message": "Gagal melakukan update data",
			"data":    err.Error(),
		})
		return
	}

	if models.DB.Model(&konsultasi).Where("id_plg = ?", id).Updates(&konsultasi).RowsAffected == 0 {
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
		"data":    konsultasi,
	})
}
func Delete(c *gin.Context) {
	var konsultasi models.Konsultasi

	id := c.Param("id")

	if models.DB.Delete(&konsultasi, id).RowsAffected == 0 {
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
