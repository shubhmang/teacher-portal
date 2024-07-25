# teacher-portal
i developed login and curd functionality in php 

First, pull from github and then start Apache and MySQL on the XAMPP server. Add all files to the htdocs folder and set up the database connectivity. Run the following SQL queries in the MySQL database:

sql
Copy code
CREATE DATABASE teacher_portal;

USE teacher_portal;

CREATE TABLE teachers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    subject VARCHAR(50) NOT NULL,
    mark INT NOT NULL,
    UNIQUE(name, subject)
);
Then, hit the URL http://localhost/teacher-portal/login.php with the username Admin and password Admin@123.
