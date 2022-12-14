USE reygiv;

DROP TABLE IF EXISTS users;
CREATE TABLE users(
	user_id INT NOT NULL AUTO_INCREMENT,
    full_name VARCHAR(255) NOT NULL,
    user_name VARCHAR(50) NOT NULL,
    phone_number VARCHAR(10) NOT NULL,
    email VARCHAR(100) NOT NULL,
    user_password VARCHAR(100) NOT NULL,
    gender VARCHAR(20) NOT NULL,
    time_created DATE NOT NULL,
    
    PRIMARY KEY(user_id)
);

INSERT INTO users(full_name, user_name, email, phone_number, user_password, gender, time_created)
VALUES ("Administrator", "admin", "admin@reygiv.co.ke", "0722419556" ,"admin", "Female", current_date()),
("Farouz Lima", "joyboy", "onejoyboy@gmail.com", "0712291015" ,"gear5", "Male", current_date());


DROP TABLE IF EXISTS properties;
CREATE TABLE properties(
	property_id INT NOT NULL AUTO_INCREMENT,
    property_name VARCHAR(100) NOT NULL,
    classification VARCHAR(100) NOT NULL,
    property_description LONGTEXT NOT NULL,
    property_location VARCHAR(255) NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    rent INT NOT NULL,
    available_rooms INT UNSIGNED NOT NULL,
    PRIMARY KEY(property_id)
);

INSERT INTO properties(property_name, classification, property_location, property_description, image_url, rent, available_rooms)
VALUES ("Friendly Meadows", "1 Bedroom", "Juja", "Fresh water is available", "./images/image1", 8000, 2),
("Savannah Hostel", "Bedsitter", "Juja", "Mall nearby", "./images/image2", 5000, 1),
("Dope Living", "2 Bedroom", "Allsops", "Close proximity to Garden City Mall", "./images/image3", 15000, 5),
("Mlandizi", "1 Bedroom", "Thika", "Swimming pool available", "./images/image4", 9000, 3),
("Cadbury", "2 Bedroom", "Rongai", "Close proximity to MMU", "./images/image5", 13000, 1),
("Nyumbani Apartments", "Single Rooms", "Buruburu", "Close proximity to The Point Mall", "./images/image6", 5000, 0),
("Tora Homes", "3 Bedroom", "Parklands", "Spacious house", "./images/image7", 25000, 7),
("Lolianda", "Bedsitter", "Baba Dogo", "Complimentary Wi-Fi", "./images/image8", 4000, 1),
("Highrise", "2 Bedroom", "Utawala", "Greater safety due to close proximity to Utawala Police Station", "./images/image9", 15000, 5),
("Hoshi Quarters", "1 Bedroom", "Allsops", "Close proximity to Garden City Mall", "./images/image10", 10000, 3),
("Capstone", "Bedsitter", "Thika", "Sanitation is well observed", "./images/image11", 4500, 9),
("Tech House", "Single Room", "JKUAT", "Complimentary chairs and desks and whiteboards", "./images/image12", 1400, 20);



DROP TABLE IF EXISTS bookings;
CREATE TABLE bookings(
	booking_id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    property_id INT NOT NULL,
    time_booked DATE NOT NULL,
    PRIMARY KEY(booking_id)
);

DROP TABLE IF EXISTS basket;
CREATE TABLE basket(
	basket_entry_id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    property_id INT NOT NULL,
    date_created DATE NOT NULL,
    PRIMARY KEY(basket_entry_id)
);

-- INSERT INTO bookings(user_id, property_id, time_booked)
-- VALUES (
-- (SELECT user_id FROM users
-- WHERE user_name = "joyboy"), 
-- (SELECT property_id FROM properties
-- WHERE property_id = 2),
-- current_date()
-- );