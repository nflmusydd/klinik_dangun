package main

import (
	"test/controller/dokterscontroller"
	"test/controller/jeniskonsultasicontroller"
	"test/controller/konsultasicontroller"
	"test/controller/riwayatcontroller"
	"test/controller/usercontroller"
	"test/models"

	"github.com/gin-gonic/gin"
)

func main() {
	route := gin.Default()

	models.ConnectDatabase()

	//untuk dokters
	route.GET("/api/dokters", dokterscontroller.Index)
	route.GET("/api/dokters/:id", dokterscontroller.Show)
	route.POST("/api/dokters", dokterscontroller.Create)
	route.PUT("/api/dokters/:id", dokterscontroller.Update)
	route.DELETE("/api/dokters/:id", dokterscontroller.Delete)

	//untuk jenis konsultasi
	route.GET("/api/jenis_konsultasi", jeniskonsultasicontroller.Index)
	route.GET("/api/jenis_konsultasi/:id", jeniskonsultasicontroller.Show)
	route.POST("/api/jenis_konsultasi", jeniskonsultasicontroller.Create)
	route.PUT("/api/jenis_konsultasi/:id", jeniskonsultasicontroller.Update)
	route.DELETE("/api/jenis_konsultasi/:id", jeniskonsultasicontroller.Delete)

	//untuk user
	route.GET("/api/user", usercontroller.Index)
	route.GET("/api/user/:id", usercontroller.Show)
	route.POST("/api/user", usercontroller.Create)
	route.PUT("/api/user/:id", usercontroller.Update)
	route.DELETE("/api/user/:id", usercontroller.Delete)

	//untuk riwayat
	route.GET("/api/riwayat", riwayatcontroller.Index)
	route.GET("/api/riwayat/:id", riwayatcontroller.Show)
	route.POST("/api/riwayat", riwayatcontroller.Create)
	route.PUT("/api/riwayat/:id", riwayatcontroller.Update)
	route.DELETE("/api/riwayat/:id", riwayatcontroller.Delete)

	//untuk konsultasi
	route.GET("/api/konsultasi", konsultasicontroller.Index)
	route.GET("/api/konsultasi/:id", konsultasicontroller.Show)
	route.POST("/api/konsultasi", konsultasicontroller.Create)
	route.PUT("/api/konsultasi/:id", konsultasicontroller.Update)
	route.DELETE("/api/konsultasi/:id", konsultasicontroller.Delete)

	route.Run()
}
