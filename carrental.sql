
create database car_rental;
use car_rental;
CREATE TABLE users (
  id int NOT NULL AUTO_INCREMENT,
  full_name varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  password varchar(255) NOT NULL,
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE cars (
  car_id int NOT NULL AUTO_INCREMENT,   -- New car_id column
  model varchar(255) NOT NULL,
  price decimal(10,2) NOT NULL,
  image varchar(255) NOT NULL,
  details text NOT NULL,
  PRIMARY KEY (car_id)                  -- Set car_id as the primary key
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
INSERT INTO cars (model, price, image, details) VALUES
('Tata Curvv', 30, 'https://imgd.aeplcdn.com/370x208/n/cw/ec/139651/curvv-exterior-right-front-three-quarter.jpeg?isig=0&q=80', 'Stylish compact SUV with modern features.'),
('Tata Nexon', 28, 'https://imgd.aeplcdn.com/370x208/n/cw/ec/141867/nexon-exterior-right-front-three-quarter-71.jpeg?isig=0&q=80', 'Compact SUV with great performance and features.'),
('Maruti Suzuki Fronx', 25, 'https://imgd.aeplcdn.com/370x208/n/cw/ec/130591/fronx-exterior-right-front-three-quarter-110.jpeg?isig=0&q=80', 'Sporty design with advanced technology.'),
('Mahindra XUV 3XO', 35, 'https://imgd.aeplcdn.com/370x208/n/cw/ec/156405/xuv-3xo-exterior-right-front-three-quarter-33.jpeg?isig=0&q=80', 'Versatile SUV for family adventures.'),
('Maruti Suzuki Brezza', 30, 'https://imgd.aeplcdn.com/370x208/n/cw/ec/107543/brezza-exterior-right-front-three-quarter-7.jpeg?isig=0&q=80', 'Compact SUV with excellent fuel efficiency.'),
('Maruti Suzuki Baleno', 22, 'https://imgd.aeplcdn.com/370x208/n/cw/ec/102663/baleno-exterior-right-front-three-quarter-66.jpeg?isig=0&q=80', 'Stylish hatchback with ample space.'),
('Toyota Urban Cruiser Taisor', 34, 'https://imgd.aeplcdn.com/370x208/n/cw/ec/132427/taisor-exterior-right-front-three-quarter-2.png?isig=0&q=80', 'Compact SUV designed for urban driving.'),
('Mahindra XUV700', 45, 'https://imgd.aeplcdn.com/370x208/n/cw/ec/42355/xuv700-exterior-right-front-three-quarter-3.jpeg?isig=0&q=80', 'Luxury SUV with cutting-edge technology.'),
('Maruti Suzuki Ertiga', 40, 'https://imgd.aeplcdn.com/370x208/n/cw/ec/115777/ertiga-exterior-right-front-three-quarter-5.jpeg?isig=0&q=80', 'Spacious MPV perfect for family trips.'),
('Tata Harrier', 42, 'https://imgd.aeplcdn.com/370x208/n/cw/ec/139139/harrier-facelift-exterior-right-front-three-quarter-5.jpeg?isig=0&q=80', 'Powerful SUV with bold styling.'),
('Hyundai Grand i10 Nios', 18, 'https://imgd.aeplcdn.com/370x208/n/cw/ec/136183/grand-i10-nios-exterior-right-front-three-quarter-15.jpeg?isig=0&q=80', 'Compact hatchback with a comfortable interior.'),
('Renault Kwid', 15, 'https://imgd.aeplcdn.com/370x208/n/cw/ec/141125/kwid-exterior-right-front-three-quarter-3.jpeg?isig=0&q=80', 'Affordable hatchback with modern features.'),
('Skoda Kushaq', 36, 'https://imgd.aeplcdn.com/370x208/n/cw/ec/175993/kushaq-exterior-right-front-three-quarter-2.jpeg?isig=0&q=80', 'Stylish compact SUV with premium features.'),
('Volkswagen Virtus', 32, 'https://imgd.aeplcdn.com/370x208/n/cw/ec/144681/virtus-exterior-right-front-three-quarter-7.jpeg?isig=0&q=80', 'Elegant sedan with high performance.'),
('Land Rover Defender', 60, 'https://imgd.aeplcdn.com/370x208/n/cw/ec/55215/defender-exterior-right-front-three-quarter-3.jpeg?isig=0&q=80', 'Rugged SUV built for adventure.'),
('Nissan Magnite', 20, 'https://imgd.aeplcdn.com/370x208/n/cw/ec/45795/magnite-exterior-right-front-three-quarter-11.jpeg?isig=0&q=80', 'Compact SUV with a stylish look.'),
('Toyota Fortuner', 55, 'https://imgd.aeplcdn.com/370x208/n/cw/ec/44709/fortuner-exterior-right-front-three-quarter-20.jpeg?isig=0&q=80', 'Robust SUV for every terrain.'),
('Kia Carnival', 50, 'https://imgd.aeplcdn.com/370x208/n/cw/ec/138947/new-carnival-exterior-right-front-three-quarter-2.jpeg?isig=0&q=80', 'Luxury MPV with ample seating.'),
('Maruti Suzuki XL6', 38, 'https://imgd.aeplcdn.com/370x208/n/cw/ec/115601/xl6-exterior-right-front-three-quarter-13.jpeg?isig=0&q=80', 'Spacious and versatile MPV.'),
('Citroen C3', 26, 'https://imgd.aeplcdn.com/370x208/n/cw/ec/103611/c3-exterior-right-front-three-quarter-4.jpeg?isig=0&q=80', 'Stylish hatchback with unique design.'),
('Jeep Compass', 48, 'https://imgd.aeplcdn.com/370x208/n/cw/ec/47051/compass-exterior-right-front-three-quarter-75.jpeg?isig=0&q=80', 'Compact SUV with premium features.'),
('Mercedes-Benz G-Class', 90, 'https://imgd.aeplcdn.com/370x208/n/cw/ec/150621/g-class-exterior-right-front-three-quarter-3.jpeg?isig=0&q=80', 'Iconic luxury SUV with off-road capability.');





CREATE TABLE car_details (
  id int NOT NULL AUTO_INCREMENT,
  car_id int NOT NULL,
  engine varchar(255) NOT NULL,
  fuel_type varchar(50) NOT NULL,
  transmission varchar(50) NOT NULL,
  seating_capacity int NOT NULL,
  color varchar(50) NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_car_id FOREIGN KEY (car_id) REFERENCES cars (car_id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO car_details (car_id, engine, fuel_type, transmission, seating_capacity, color) VALUES
(1, '1.5L Turbo Petrol', 'Petrol', 'Automatic', 5, 'Red'),
(2, '1.2L Turbo Petrol', 'Petrol', 'Manual', 5, 'Blue'),
(3, '1.0L Turbo Petrol', 'Petrol', 'Automatic', 5, 'Silver'),
(4, '2.0L Diesel', 'Diesel', 'Automatic', 7, 'Black'),
(5, '1.5L Petrol', 'Petrol', 'Manual', 5, 'White'),
(6, '1.2L Petrol', 'Petrol', 'Automatic', 5, 'Yellow'),
(7, '1.5L Diesel', 'Diesel', 'Automatic', 5, 'Green'),
(8, '2.2L Diesel', 'Diesel', 'Automatic', 7, 'Brown'),
(9, '1.5L Petrol', 'Petrol', 'Automatic', 7, 'Grey'),
(10, '2.0L Diesel', 'Diesel', 'Manual', 5, 'Navy Blue'),
(11, '1.2L Petrol', 'Petrol', 'Automatic', 5, 'Orange'),
(12, '1.0L Petrol', 'Petrol', 'Manual', 5, 'Pink'),
(13, '1.5L Turbo Petrol', 'Petrol', 'Automatic', 5, 'Purple'),
(14, '2.0L Diesel', 'Diesel', 'Automatic', 5, 'Teal'),
(15, '3.0L Diesel', 'Diesel', 'Automatic', 5, 'Beige'),
(16, '1.0L Petrol', 'Petrol', 'Manual', 5, 'Lime'),
(17, '2.8L Diesel', 'Diesel', 'Automatic', 7, 'Maroon'),
(18, '3.5L Petrol', 'Petrol', 'Automatic', 8, 'Copper'),
(19, '1.5L Petrol', 'Petrol', 'Automatic', 7, 'Cyan'),
(20, '1.2L Petrol', 'Petrol', 'Manual', 5, 'Magenta'),
(21, '2.0L Petrol', 'Petrol', 'Automatic', 5, 'Violet'),
(22, '4.0L Diesel', 'Diesel', 'Automatic', 5, 'Charcoal');



CREATE TABLE bookings (
  id int NOT NULL AUTO_INCREMENT,
  user_id int NOT NULL,
  car_id int NOT NULL,
  rental_start_date datetime NOT NULL,
  rental_end_date datetime NOT NULL,
  insurance tinyint(1) NOT NULL DEFAULT '0',
  gps tinyint(1) NOT NULL DEFAULT '0',
  payment_method enum('credit_card','paypal') NOT NULL,
  terms_agreed tinyint(1) NOT NULL DEFAULT '0',
  number_of_days int NOT NULL DEFAULT '0',
  daily_rate decimal(10,2) NOT NULL DEFAULT '0.00',
  total_price decimal(10,2) NOT NULL DEFAULT '0.00',
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  CONSTRAINT fk_user_id FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE,
  CONSTRAINT fk_booking_car_id FOREIGN KEY (car_id) REFERENCES cars (car_id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
