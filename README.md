# PHP MVC CRUD Application

A simple PHP MVC application with user authentication and product management. The application provides CRUD (Create, Read, Update, Delete) functionality using the MVC (Model-View-Controller) design pattern.

## Features

### Authentication
- User login page
- Session-based authentication
- Secure dashboard after login
- Logout functionality

### Products Management
- List all products
- Create new products (name, price, description)
- Update existing products
- Delete products

## Project Structure

```
├── public
│   └── index.php              # Entry point for the application
│
├── src
│   ├── Router.php             # Routing logic
│   ├── Config
│   │   └── Database.php       # Database connection
│   ├── Controllers
│   │   ├── UserController.php # Authentication & user management
│   │   └── ProductController.php # Product CRUD operations
│   ├── Core
│   │   └── Controller.php      # Base controller
│   ├── Models
│   │   ├── User.php           # User model
│   │   └── Product.php        # Product model
│   └── Views
│       ├── Layout
│       │   └── App.php        # Main layout template
│       ├── auth
│       │   ├── login.php      # Login page
│       │   └── dashboard.php  # Dashboard after login
│       └── product
│           ├── index.php      # List products
│           ├── create.php     # Add product form
│           └── update.php     # Edit product form
│
├── vendor/                    # Composer dependencies
├── composer.json
├── .gitignore
└── README.md
```

## Requirements

- PHP 8.0 or higher
- MySQL/MariaDB database
- Composer

## Installation

1. **Clone or download the project**
   ```bash
   cd php-crud-mvc
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Create database tables**

   **Users table:**
   ```sql
   CREATE TABLE users (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(255) NOT NULL,
       email VARCHAR(255) NOT NULL UNIQUE,
       password VARCHAR(255) NOT NULL,
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );

   INSERT INTO users (name, email, password) VALUES ('Test User', 'test@example.com', 'password123');
   ```

   **Products table:**
   ```sql
   CREATE TABLE products (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(255) NOT NULL,
       price DECIMAL(10, 2) NOT NULL,
       description TEXT NOT NULL,
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );
   ```

4. **Update database configuration** in `src/Config/Database.php` with your database credentials

5. **Run the development server**
   ```bash
   php -S localhost:8000 -t public
   ```

6. **Access the application**
   - Open your browser and go to `http://localhost:8000`
   - You will be redirected to the login page
   - Default login credentials:
     - Email: `test@example.com`
     - Password: `password123`

## Usage

### Authentication
- Access the home page and you'll be redirected to the login page
- Enter your credentials to authenticate
- After login, you'll be redirected to the dashboard

### Products Management
- Click "Products" in the navigation bar
- View all products
- Add new products using the "Add Product" button
- Edit products by clicking the "Update" button
- Delete products by clicking the "Delete" button

## Routes

| Method | Path | Controller | Action | Description |
|--------|------|-----------|--------|-------------|
| GET | login | UserController | login | Display login page |
| POST | verify | UserController | verify | Verify user credentials |
| GET | dashboard | UserController | dashboard | Display dashboard |
| GET | logout | UserController | logout | Logout user |
| GET | products | ProductController | index | List all products |
| GET | store_product | ProductController | store | Show create form |
| POST | create_product | ProductController | create | Create new product |
| GET | show_product | ProductController | show | Show edit form |
| POST | update_product | ProductController | update | Update product |
| GET | delete_product | ProductController | delete | Delete product |

## Security Notes

⚠️ **Important**: This is a basic educational project. For production use:
- Hash passwords using `password_hash()` instead of plain text
- Implement CSRF protection
- Use parameterized queries (already done with PDO prepared statements)
- Add input validation and sanitization
- Implement proper error handling
- Use HTTPS in production

## Technologies Used

- **Language**: PHP 8.0+
- **Pattern**: MVC (Model-View-Controller)
- **Database**: MySQL/MariaDB
- **Frontend**: HTML, Bootstrap 5
- **Autoloading**: Composer PSR-4

## License

This project is open source and available under the MIT License.
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
