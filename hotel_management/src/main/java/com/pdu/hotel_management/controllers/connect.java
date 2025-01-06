package com.pdu.hotel_management.controllers;

import org.springframework.context.annotation.Configuration;
import org.springframework.web.servlet.config.annotation.CorsRegistry;
import org.springframework.web.servlet.config.annotation.WebMvcConfigurer;
@Configuration
public class connect implements WebMvcConfigurer {
        @Override
        public void addCorsMappings(CorsRegistry registry) {
            registry.addMapping("/api/hotels") // Đường dẫn API của bạn
                    .allowedOrigins("http://localhost:8080") // Thay đổi thành domain frontend của bạn
                    .allowedMethods("GET", "POST", "PUT", "DELETE", "OPTIONS");
        }
}