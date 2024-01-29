# Pizza Ordering System

## Overview

This project is a simple pizza ordering system that allows users to view available pizzas and get more details about each pizza. The system is built using PHP and MySQL, and it utilizes XAMPP as the local development environment.

## Setup Instructions

To set up and run the project locally, follow these steps:

1. **Install XAMPP**: Download and install XAMPP from the [official website](https://www.apachefriends.org/index.html). XAMPP provides an easy-to-install Apache web server, MySQL database, PHP, and Perl.

2. **Clone the Repository**: Clone this repository to your local machine using Git:
    ```bash
    git clone https://github.com/your-username/pizza-ordering-system.git
    ```

3. **Start Apache and MySQL Servers**: Launch the XAMPP control panel and start the Apache and MySQL servers.

4. **Import Database**: Import the provided `pizza_database.sql` file into your MySQL database. This file contains the necessary tables and sample data for the pizza ordering system.

5. **Configure Database Connection**: Open the `config/db_connect.php` file and update the database connection settings with your MySQL credentials.

6. **Access the Application**: Open your web browser and navigate to `http://localhost/tuts/index.php` to access the pizza ordering system.

## Features

- View a list of available pizzas.
- Click on a pizza to view more details.
- Customize toppings and crust options.
- Add/create pizzas 
- Delete Pizza info

## File Structure

