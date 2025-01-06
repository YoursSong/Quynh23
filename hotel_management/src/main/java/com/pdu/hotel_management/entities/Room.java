package com.pdu.hotel_management.entities;

import jakarta.persistence.*;

@Entity
@Table(name = "room")
public class Room {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long idRoom; // PRIMARY KEY

    @Column(name = "name_room", nullable = false)
    private String nameRoom;

    @Column(name = "price_room", nullable = false)
    private double priceRoom;

    @Column(name = "picture")
    private String picture;

    @Column(name = "CategoryRoom")
    private String categoryRoom;

    @Column(name = "des_room")
    private String desRoom;

    @Column(name = "soluong", nullable = false)
    private int soLuong;

    @Column(name = "area")
    private Double area;

    @Column(name = "status")
    private String status;

    // Getters and Setters
    public Long getIdRoom() {
        return idRoom;
    }

    public void setIdRoom(Long idRoom) {
        this.idRoom = idRoom;
    }

    public String getNameRoom() {
        return nameRoom;
    }

    public void setNameRoom(String nameRoom) {
        this.nameRoom = nameRoom;
    }

    public double getPriceRoom() {
        return priceRoom;
    }

    public void setPriceRoom(double priceRoom) {
        this.priceRoom = priceRoom;
    }

    public String getPicture() {
        return picture;
    }

    public void setPicture(String picture) {
        this.picture = picture;
    }

    public String getCategoryRoom() {
        return categoryRoom;
    }

    public void setCategoryRoom(String categoryRoom) {
        this.categoryRoom = categoryRoom;
    }

    public String getDesRoom() {
        return desRoom;
    }

    public void setDesRoom(String desRoom) {
        this.desRoom = desRoom;
    }

    public int getSoLuong() {
        return soLuong;
    }

    public void setSoLuong(int soLuong) {
        this.soLuong = soLuong;
    }

    public Double getArea() {
        return area;
    }

    public void setArea(Double area) {
        this.area = area;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }
}