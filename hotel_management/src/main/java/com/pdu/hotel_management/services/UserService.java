package com.pdu.hotel_management.services;

import com.pdu.hotel_management.entities.User;
import com.pdu.hotel_management.repository.UserRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;


import java.util.List;

@Service
public class UserService {

    @Autowired
    private UserRepository userRepository;

    public List<User> findAll() {
        return userRepository.findAll();
    }

    public User findById(Long id) {
        return userRepository.findById(id)
                .orElseThrow(() -> new RuntimeException("User  Room not found with id " + id));
    }

    public User save(User userRoom) {
        return userRepository.save(userRoom);
    }

    public User update(Long id, User userRoomDetails) {
        User userRoom = findById(id);
        userRoom.setUser (userRoomDetails.getUser ());
        userRoom.setEmail(userRoomDetails.getEmail());
        userRoom.setPhone(userRoomDetails.getPhone());
        userRoom.setPass(userRoomDetails.getPass());
        return userRepository.save(userRoom);
    }

    public void deleteById(Long id) {
        userRepository.deleteById(id);
    }
}
