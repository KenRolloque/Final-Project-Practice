
CREATE DATABASE iot;


USE iot;
SET GLOBAL sql_mode = "NO_ZERO_DATE";


CREATE TABLE sensor_data(

    id int AUTO_INCREMENT PRIMARY KEY,
    data_date DATE NOT NULL,
    data_time TIME NOT NULL
)

