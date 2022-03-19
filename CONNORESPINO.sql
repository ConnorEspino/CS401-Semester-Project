CREATE TABLE user(
	user_id INT AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL UNIQUE,
	password VARCHAR(64) NOT NULL,
    balance INT DEFAULT 0,
    signup_time DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(user_id)
);

CREATE TABLE owned_img(
    owned_img_id INT AUTO_INCREMENT,
    user_id INT NOT NULL REFERENCES user(user_id),
    listing_id INT NOT NULL REFERENCES listing(listing_id),
    image_id INT NOT NULL REFERENCES image(image_id),

    PRIMARY KEY(owned_img_id)
);

CREATE TABLE image(
    image_id INT AUTO_INCREMENT,
    listing_id INT NOT NULL REFERENCES listing(listing_id),
    PRIMARY KEY(image_id)
);

CREATE TABLE listing(
    listing_id INT AUTO_INCREMENT,
    price INT NOT NULL,
    status INT(1),
    creation_time DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(listing_id)
);

CREATE TABLE math_problem(
    problem_id INT AUTO_INCREMENT,
    problem VARCHAR(256),
    PRIMARY KEY(problem_id)
);