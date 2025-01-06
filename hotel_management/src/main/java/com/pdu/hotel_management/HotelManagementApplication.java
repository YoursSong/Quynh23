package com.pdu.hotel_management;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.data.jpa.repository.config.EnableJpaRepositories;

@SpringBootApplication(scanBasePackages = "com.pdu.hotel_management")
@EnableJpaRepositories("com.pdu.hotel_management.repository")
public class HotelManagementApplication {
	public static void main(String[] args) {
		SpringApplication.run(HotelManagementApplication.class, args);
	}
}