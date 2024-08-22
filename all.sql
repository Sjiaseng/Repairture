SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE users (
  user_ID int PRIMARY KEY AUTO_INCREMENT,
  user_email text,
  user_passwrd text,
  user_firstname text,
  user_lastname text,
  user_age int(3),
  user_gender text,
  user_mobilenum int(11),
  user_icnum int(12),
  user_addressline text,
  user_city text,
  user_state text,
  user_poscode int(5),
  user_profilepic VARCHAR(255),
  user_icpic VARCHAR(255),
  user_verify INT(1)
);

CREATE TABLE  technicians (
  tech_ID int PRIMARY KEY AUTO_INCREMENT,
  tech_email text,
  tech_passwrd text,
  tech_firstname text,
  tech_lastname text,
  tech_age int(3),
  tech_gender text,
  tech_mobilenum int(11),
  tech_icnum int(12),
  services_name varchar(50),
  service_location text,
  tech_addressline text,
  tech_city text,
  tech_state text,
  tech_poscode int(5),
  tech_profilepic VARCHAR(255),
  tech_icpic VARCHAR(255),
  tech_certpic VARCHAR(255),
  tech_verify INT(1)
);

CREATE TABLE admins (
  admin_ID int PRIMARY KEY AUTO_INCREMENT,
  admin_email text ,
  admin_passwrd text ,
  admin_firstname text ,
  admin_lastname text ,
  admin_mobilenum int(11) ,
  admin_profilepic VARCHAR(255)
);

CREATE TABLE inbox (
  inbox_ID INT PRIMARY KEY AUTO_INCREMENT,
  user_ID INT,
  tech_ID INT,
  admin_ID INT,
  inbox_message TEXT,
  created_at DATE,
  inbox_read INT,
  FOREIGN KEY (user_ID) REFERENCES users(user_ID),
  FOREIGN KEY (tech_ID) REFERENCES technicians(tech_ID),
  FOREIGN KEY (admin_ID) REFERENCES admins(admin_ID)
);

CREATE TABLE booking (
  booking_ID INT PRIMARY KEY AUTO_INCREMENT,
  user_ID INT,
  tech_ID INT,
  booking_date_time DATETIME,
  booking_status VARCHAR(10),
  booking_title TEXT(50),
  booking_comment LONGTEXT,
  services_name VARCHAR(50),
  created_at DATE,
  user_cancel_note INT,
  tech_cancel_note INT,
  FOREIGN KEY (user_ID) REFERENCES users(user_ID),
  FOREIGN KEY (tech_ID) REFERENCES technicians(tech_ID)
);

CREATE TABLE contactus (
  contactus_ID INT PRIMARY KEY AUTO_INCREMENT,
  name TEXT(50),
  email VARCHAR(50),
  message LONGTEXT,
  created_at DATE,
  read_note INT
);

CREATE TABLE todolist (
  todo_ID INT PRIMARY KEY AUTO_INCREMENT,
  admin_ID INT,
  tech_ID INT,
  todo_subject TEXT,
  todo_date DATE,
  todo_starred VARCHAR(5),
  FOREIGN KEY (admin_ID) REFERENCES admins(admin_id),
  FOREIGN KEY (tech_ID) REFERENCES technicians(tech_id)
);




INSERT INTO users (user_email, user_passwrd, user_firstname, user_lastname, user_age, user_gender, user_mobilenum, user_icnum, user_addressline, user_city, user_state, user_poscode, user_profilepic, user_icpic) 
VALUES ('user1@example.com', 'password1', 'John', 'Doe', 70, 'male', '1234567890', '023456789012', '123 Main St', 'Ampang', 'Selangor', '12345', 'user1_profile.jpg', 'user1_ic.jpg');
INSERT INTO users (user_email, user_passwrd, user_firstname, user_lastname, user_age, user_gender, user_mobilenum, user_icnum, user_addressline, user_city, user_state, user_poscode, user_profilepic, user_icpic) 
VALUES ('user2@example.com', 'password2', 'Jane', 'Doe', 75, 'female', '0987654321', '123456789012', '456 Main St', 'Kuala Lumpur', 'Kuala Lumpur', '54321', 'user2_profile.jpg', 'user2_ic.jpg');

INSERT INTO technicians (tech_email, tech_passwrd, tech_firstname, tech_lastname, tech_age, tech_gender, tech_mobilenum, tech_icnum, services_name, service_location, tech_addressline, tech_city, tech_state, tech_poscode, tech_profilepic, tech_icpic, tech_certpic) 
VALUES ('tech1@example.com', 'password1', 'Bob', 'Smith', 35, 'male', '1234567890', '123456789012', 'Plumbing', 'Selangor', '789 Main St', 'Klang', 'Selangor', '12345', 'tech1_profile.jpg', 'tech1_ic.jpg', 'tech1_cert.jpg');
INSERT INTO technicians (tech_email, tech_passwrd, tech_firstname, tech_lastname, tech_age, tech_gender, tech_mobilenum, tech_icnum, services_name, service_location, tech_addressline, tech_city, tech_state, tech_poscode, tech_profilepic, tech_icpic, tech_certpic) 
VALUES ('tech2@example.com', 'password2', 'Carla', 'Doe', 30, 'female', '9876543210', '234567890123', 'Upholstery Cleaning', 'Kuala Lumpur', '456 Park Ave', 'Kepong', 'Kuala Lumpur', '54321', 'tech2_profile.jpg', 'tech2_ic.jpg', 'tech2_cert.jpg');


INSERT INTO admins (admin_email, admin_passwrd, admin_firstname, admin_lastname, admin_mobilenum, admin_profilepic) 
VALUES ('admin1@example.com', 'password1', 'Alice', 'Smith', '1234567890', 'admin1_profile.jpg');
INSERT INTO admins (admin_email, admin_passwrd, admin_firstname, admin_lastname, admin_mobilenum, admin_profilepic) 
VALUES ('admin2@example.com', 'password2', 'Bob', 'Jones', '0987654321', 'admin2_profile.jpg');

INSERT INTO inbox (user_ID, tech_ID, admin_ID, inbox_message, created_at, inbox_read) 
VALUES (1, NULL, NULL, 'Your Appointment has been submited', '2022-01-01', 0);
INSERT INTO inbox (user_ID, tech_ID, admin_ID, inbox_message, created_at, inbox_read) 
VALUES (2, NULL, NULL, 'Your Appointment has been make', '2022-01-02', 0);
INSERT INTO inbox (user_ID, tech_ID, admin_ID, inbox_message, created_at, inbox_read) 
VALUES (1, NULL, NULL, 'Your Appointment has been cancel', '2022-01-02', 1);

INSERT INTO booking (user_ID, tech_ID, booking_date_time, booking_status, booking_title, booking_comment, services_name, created_at, user_cancel_note, tech_cancel_note) 
VALUES (1, 1, '2022-01-03 10:00:00', 'Pending', 'House Dirty', 'Please clean my house', 'Upholstery Cleaning', '2022-01-03', 0, 0);
INSERT INTO booking (user_ID, tech_ID, booking_date_time, booking_status, booking_title, booking_comment, services_name, created_at, user_cancel_note, tech_cancel_note) 
VALUES (2, 2, '2022-01-04 12:00:00', 'ComingSoon', 'Plumbing Issue', 'Water leak in kitchen', 'Plumbing', '2022-01-02', 0, 0);
INSERT INTO booking (user_ID, tech_ID, booking_date_time, booking_status, booking_title, booking_comment, services_name, created_at, user_cancel_note, tech_cancel_note) 
VALUES (1, 1, '2022-01-04 12:00:00', 'Cancel', 'House Dirty', 'Please clean my house', 'Upholstery Cleaning', '2022-01-01', 0, 0);


INSERT INTO contactus (name, email, message, created_at, read_note) 
VALUES ('John Smith', 'johnsmith@example.com', 'I have a question about your services', '2022-01-01', 0);
INSERT INTO contactus (name, email, message, created_at, read_note) 
VALUES ('Jane Doe', 'janedoe@example.com', 'I would like to request a quote', '2022-01-02', 1);


INSERT INTO todolist (admin_ID, tech_ID, todo_subject, todo_starred, todo_date) 
VALUES (1, NULL, 'Approve user',NULL, '2022-01-01');
INSERT INTO todolist (admin_ID, tech_ID, todo_subject, todo_date) 
VALUES (NULL, 1, 'Bring spana',NULL, '2022-01-02');



