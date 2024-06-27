package usercontroller

import (
	"net/http"
	"test/models"

	"github.com/gin-gonic/gin"
	"github.com/go-playground/validator/v10"
	"gorm.io/gorm"
)

func Index(c *gin.Context) {
	var user []models.User

	models.DB.Find(&user)

	c.JSON(http.StatusOK, gin.H{
		"status":  true,
		"message": "Datanya ditemukan",
		"data":    user,
	})

}

func Show(c *gin.Context) {
	var user models.User
	id := c.Param("id")

	if err := models.DB.First(&user, id).Error; err != nil {
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
		"data":    user,
	})
}

func Create(c *gin.Context) {
	var user models.User

	if err := c.ShouldBindJSON(&user); err != nil {
		c.JSON(http.StatusOK, gin.H{
			"status":  false,
			"message": "Gagal dalam membuat data",
			"data":    err.Error(),
		})
		return
	}
	validate := validator.New()
	if err := validate.Struct(user); err != nil {
		errors := err.(validator.ValidationErrors)
		c.JSON(http.StatusOK, gin.H{
			"status":  false,
			"message": "Tidak bisa menambahkan data",
			"data":    errors.Error(),
		})
		return
	}

	if err := models.DB.Create(&user).Error; err != nil {
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
	var user models.User
	id := c.Param("id")

	if err := c.ShouldBindJSON(&user); err != nil {
		c.JSON(http.StatusOK, gin.H{
			"status":  false,
			"message": "Gagal melakukan update data",
			"data":    err.Error(),
		})
		return
	}

	if models.DB.Model(&user).Where("id_plg = ?", id).Updates(&user).RowsAffected == 0 {
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
		"data":    user,
	})
}
func Delete(c *gin.Context) {
	var user models.User

	id := c.Param("id")

	if models.DB.Delete(&user, id).RowsAffected == 0 {
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
