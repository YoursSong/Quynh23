package com.pdu.hotel_management.services;

import com.pdu.hotel_management.entities.Category;
import com.pdu.hotel_management.entities.Hotel;
import com.pdu.hotel_management.entities.Room;
import com.pdu.hotel_management.repository.CategoryRepository;
import com.pdu.hotel_management.repository.HotelRepository;
import com.pdu.hotel_management.repository.RoomRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Optional;

@Service
public class HotelServices {

    @Autowired
    private HotelRepository hotelRepository;

    @Autowired
    private RoomRepository roomRepository;

    // Create a new hotel booking
    public Hotel createBooking(Hotel hotel) {
        return hotelRepository.save(hotel);
    }

    // Get all hotel bookings
    public List<Hotel> getAllBookings() {
        return hotelRepository.findAll();
    }

    // Get a hotel booking by ID
    public Optional<Hotel> getBookingById(Long id) {
        return hotelRepository.findById(id);
    }

    // Update a hotel booking
    public Hotel updateBooking(Long id, Hotel hotelDetails) {
        Hotel hotel = hotelRepository.findById(id)
                .orElseThrow(() -> new RuntimeException("Hotel booking not found with id " + id));

        hotel.setUsername(hotelDetails.getUsername());
        hotel.setTenPhong(hotelDetails.getTenPhong());
        hotel.setSoLuong(hotelDetails.getSoLuong());
        hotel.setTotal(hotelDetails.getTotal());
        hotel.setStatus(hotelDetails.getStatus());
        hotel.setRooms(hotelDetails.getRooms());

        return hotelRepository.save(hotel);
    }

    // Delete a hotel booking
    public void deleteBooking(Long id) {
        Hotel hotel = hotelRepository.findById(id)
                .orElseThrow(() -> new RuntimeException("Hotel booking not found with id " + id));
        hotelRepository.delete(hotel);
    }

    // Find a room by ID
    public Optional<Room> findRoomById(Long roomId) {
        return roomRepository.findById(roomId);
    }

    // Add a room to a hotel booking
    public Room addRoom(Long hotelId, Room room) {
        Hotel hotel = hotelRepository.findById(hotelId)
                .orElseThrow(() -> new RuntimeException("Hotel booking not found with id " + hotelId));

        // Check if the room is new or detached
        if (room.getIdRoom() == null) {
            // New room, save it
            hotel.getRooms().add(room);
            roomRepository.save(room); // Save the room to the database
        } else {
            // Detached room, merge it
            Room managedRoom = roomRepository.findById(room.getIdRoom())
                    .orElseThrow(() -> new RuntimeException("Room not found with id " + room.getIdRoom()));
            // Update the managed room with new details
            managedRoom.setNameRoom(room.getNameRoom());
            managedRoom.setPriceRoom(room.getPriceRoom());
            managedRoom.setPicture(room.getPicture());
            managedRoom.setCategoryRoom(room.getCategoryRoom());
            managedRoom.setDesRoom(room.getDesRoom());
            managedRoom.setSoLuong(room.getSoLuong());
            managedRoom.setArea(room.getArea());
            managedRoom.setStatus(room.getStatus());
            roomRepository.save(managedRoom); // Save the updated room
        }

        hotelRepository.save(hotel); // Update the hotel booking
        return room;
    }

    // Update a room in a hotel booking
    public Room updateRoom(Long hotelId, Long roomId, Room roomDetails) {
        Hotel hotel = hotelRepository.findById(hotelId)
                .orElseThrow(() -> new RuntimeException("Hotel booking not found with id " + hotelId));

        Room room = roomRepository.findById(roomId)
                .orElseThrow(() -> new RuntimeException("Room not found with id " + roomId));

        room.setNameRoom(roomDetails.getNameRoom());
        room.setPriceRoom(roomDetails.getPriceRoom());
        room.setPicture(roomDetails.getPicture());
        room.setCategoryRoom(roomDetails.getCategoryRoom());
        room.setDesRoom(roomDetails.getDesRoom());
        room.setSoLuong(roomDetails.getSoLuong());
        room.setArea(roomDetails.getArea());
        room.setStatus(roomDetails.getStatus());

        return roomRepository.save(room);
    }

    // Delete a room from a hotel booking
    public void deleteRoom(Long hotelId, Long roomId) {
        Hotel hotel = hotelRepository.findById(hotelId)
                .orElseThrow(() -> new RuntimeException("Hotel booking not found with id " + hotelId));

        Room room = roomRepository.findById(roomId)
                .orElseThrow(() -> new RuntimeException("Room not found with id " + roomId));

        // Remove the room from the hotel booking
        hotel.getRooms().remove(room);
        roomRepository.delete(room); // Delete the room from the database
        hotelRepository.save(hotel); // Update the hotel booking
    }

    // Get all rooms in a hotel booking
    public List<Room> getRooms(Long hotelId) {
        Hotel hotel = hotelRepository.findById(hotelId)
                .orElseThrow(() -> new RuntimeException("Hotel booking not found with id " + hotelId));

        return hotel.getRooms();
    }
}