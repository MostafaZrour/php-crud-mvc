
# PHP MVC CRUD Users

This is a simple PHP MVC application for managing users. The application provides CRUD (Create, Read, Update, Delete) functionality for user data using the MVC (Model-View-Controller) design pattern.

## Project Structure

```
├───public
│       index.php        # Entry point for the application
│
└───src
    │   Router.php       # Handles routing logic
    │
    ├───Config
    │       Database.php # Database connection class
    │
    ├───Controllers
    │       UserController.php # Controller for handling user actions
    │
    ├───Core
    │       Controller.php # Base controller for loading views
    │
    ├───Models
    │       User.php      # User model for database interactions
    │
    └───Views
        │   create.php    # View for creating a user
        │   index.php     # View for listing users
        │   update.php    # View for updating a user
        │
        └───Layout
                App.php   # Main layout for the application
```

## Features

- List users
- Create new users
- Update existing users
- Delete users

## Requirements

- PHP 8.0 or higher
- MySQL database
- Composer (for autoloading)

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/your-repo/php-mvc-crud-users.git
   cd php-mvc-crud-users
   ```

2. Install dependencies using Composer:

   ```bash
   composer install
   ```

3. Create a MySQL database and import the schema:

   ```sql
   CREATE DATABASE mvc_crud_users;
   USE mvc_crud_users;

   CREATE TABLE users (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(100) NOT NULL,
       email VARCHAR(100) NOT NULL UNIQUE
   );
   ```

4. Configure the database connection in `src/Config/Database.php`:

   ```php
   $host = '127.0.0.1';
   $dbname = 'mvc_crud_users';
   $username = 'your_username';
   $password = 'your_password';
   ```

5. Start the built-in PHP server:

   ```bash
   php -S localhost:8000 -t public
   ```

6. Visit the application in your browser at [http://localhost:8000](http://localhost:8000).

## Usage

### Adding a User
1. Navigate to the "Create User" page.
2. Enter the user's name and email.
3. Submit the form.

### Editing a User
1. Navigate to the "Edit" action for a user.
2. Update the user details.
3. Submit the form.

### Deleting a User
1. Click on the "Delete" action for a user.
2. Confirm the deletion.

## License

This project is open-source and free to use.

## Contributing

Feel free to submit issues and pull requests to enhance this project.

---

Enjoy using the PHP MVC CRUD application! 🚀
