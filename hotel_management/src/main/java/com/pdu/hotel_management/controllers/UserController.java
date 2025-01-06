package com.pdu.hotel_management.controllers;

import com.pdu.hotel_management.entities.User;
import com.pdu.hotel_management.services.UserService;
import jakarta.validation.Valid;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/api/user_rooms")
public class UserController {

    @Autowired
    private UserService userService;

    @GetMapping
    public List<User> getAllUserRooms() {
        return userService.findAll();
    }

    @GetMapping("/{id}")
    public ResponseEntity<User> getUserRoomById(@PathVariable Long id) {
        User userRoom = userService.findById(id);
        return ResponseEntity.ok(userRoom);
    }

    @PostMapping
    public ResponseEntity<User> createUserRoom(@Valid @RequestBody User userRoom) {
        User createdUserRoom = userService.save(userRoom);
        return ResponseEntity.status(HttpStatus.CREATED).body(createdUserRoom);
    }

    @PutMapping("/{id}")
    public ResponseEntity<User> updateUserRoom(@PathVariable Long id, @Valid @RequestBody User userRoomDetails) {
        User updatedUserRoom = userService.update(id, userRoomDetails);
        return ResponseEntity.ok(updatedUserRoom);
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<Void> deleteUserRoom(@PathVariable Long id) {
        userService.deleteById(id);
        return ResponseEntity.noContent().build();
    }
}