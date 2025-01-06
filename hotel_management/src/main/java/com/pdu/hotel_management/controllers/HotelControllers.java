package com.pdu.hotel_management.controllers;

import com.pdu.hotel_management.entities.Hotel;
import com.pdu.hotel_management.entities.Room;
import com.pdu.hotel_management.services.HotelServices;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Optional;

@RestController
@RequestMapping("/api/hotels")
public class HotelControllers {

    @Autowired
    private HotelServices hotelServices;

    // Create a new booking
    @PostMapping
    public ResponseEntity<Hotel> createBooking(@RequestBody Hotel hotel) {
        Hotel createdBooking = hotelServices.createBooking(hotel);
        return new ResponseEntity<>(createdBooking, HttpStatus.CREATED);
    }

    // Get all bookings
    @GetMapping
    public ResponseEntity<List<Hotel>> getAllBookings() {
        List<Hotel> hotels = hotelServices.getAllBookings();
        return new ResponseEntity<>(hotels, HttpStatus.OK);
    }

    // Get a booking by ID
    @GetMapping("/{id}")
    public ResponseEntity<Hotel> getBookingById(@PathVariable Long id) {
        Optional<Hotel> booking = hotelServices.getBookingById(id);
        return booking.map(ResponseEntity::ok)
                .orElseGet(() -> ResponseEntity.notFound().build());
    }

    // Update a booking
    @PutMapping("/{id}")
    public ResponseEntity<Hotel> updateBooking(@PathVariable Long id, @RequestBody Hotel bookRoomDetails) {
        Hotel updatedBooking = hotelServices.updateBooking(id, bookRoomDetails);
        return new ResponseEntity<>(updatedBooking, HttpStatus.OK);
    }

    // Delete a booking
    @DeleteMapping("/{id}")
    public ResponseEntity<Void> deleteBooking(@PathVariable Long id) {
        hotelServices.deleteBooking(id);
        return ResponseEntity.noContent().build();
    }
    // Find a room by ID
    @GetMapping("/{hotelId}/rooms/{roomId}")
    public ResponseEntity<Room> findRoomById(@PathVariable Long hotelId, @PathVariable Long roomId) {
        return hotelServices.findRoomById(roomId)
                .map(ResponseEntity::ok)
                .orElse(ResponseEntity.notFound().build());
    }

    // Add a room to a hotel booking
    @PostMapping("/{hotelId}/rooms")
    public Room addRoom(@PathVariable Long hotelId, @RequestBody Room room) {
        return hotelServices.addRoom(hotelId, room);
    }

    // Update a room in a hotel booking
    @PutMapping("/{hotelId}/rooms/{roomId}")
    public Room updateRoom(@PathVariable Long hotelId, @PathVariable Long roomId, @RequestBody Room roomDetails) {
        return hotelServices.updateRoom(hotelId, roomId, roomDetails);
    }

    // Delete a room from a hotel booking
    @DeleteMapping("/{hotelId}/rooms/{roomId}")
    public ResponseEntity<Void> deleteRoom(@PathVariable Long hotelId, @PathVariable Long roomId) {
        hotelServices.deleteRoom(hotelId, roomId);
        return ResponseEntity.noContent().build();
    }

    // Get all rooms in a hotel booking
    @GetMapping("/{hotelId}/rooms")
    public List<Room> getRooms(@PathVariable Long hotelId) {
        return hotelServices.getRooms(hotelId);
    }

}