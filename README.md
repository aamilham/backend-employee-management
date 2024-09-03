
# Employee Management Backend Installation Guide

Step by step backend installation for employee management website

## Prerequisites

prerequisites to install:

- [PHP 8.x](https://www.php.net/downloads)
- [Composer](https://getcomposer.org/download/)
- [MySQL](https://www.mysql.com/downloads/)

## Installation Steps

### 1. Clone the Repository

Clone the repository to your local

### 2. Install Dependencies

Install the PHP dependencies using Composer:

```bash
composer install
```

### 3. Set Up Environment Variables

Copy the example environment file and configure your environment variables:

```bash
cp .env.example .env
```

Open the `.env` file and update the following settings to match your environment:

- **Database Configuration**:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
    ```

- **JWT Secret**:
    ```env
    JWT_SECRET=your_generated_jwt_secret
    ```

Generate the JWT secret if not done already:

```bash
php artisan jwt:secret
```

### 4. Create the Database

Create a new MySQL database for the project:

```sql
CREATE DATABASE your_database_name;
```

### 5. Run Migrations

Run the database migrations to set up the database schema:

```bash
php artisan migrate
```

### 6. Seed the Database (Optional)

If you have seeders to populate the database with initial data, run:

```bash
php artisan db:seed
```

### 7. Start the Development Server

Start the Laravel development server:

```bash
php artisan serve
```

The backend should now be running at `http://localhost:8000`.

### 8. API Endpoints

You can test the API endpoints using tools like Postman or cURL. Below are some example routes:

- **User Registration**: `POST /api/register`
- **User Login**: `POST /api/login`
- **Get All Employees**: `GET /api/employees` (Requires authentication)
- **Create New Employee**: `POST /api/employees` (Requires authentication)
- **Update Employee**: `PUT /api/employees/{id}` (Requires authentication)
- **Delete Employee**: `DELETE /api/employees/{id}` (Requires authentication)
- **User Logout**: `POST /api/logout` (Requires authentication)
- **User self-identification**: `POST /api/me` (Requires authentication)
- **Get Employees Sorted by Salary**: `GET /api/employees-by-salary` (Requires authentication and superadmin role)

### 9. Add Ons - Deploying to Production

For production deployment, ensure you:

- Set the appropriate environment variables in your `.env` file.
- Use a production server with a proper web server configuration (e.g., Apache or Nginx).
- Consider using a process manager like [Supervisor](http://supervisord.org/) to keep the application running.
- Set up HTTPS for secure connections.

### 10. Troubleshooting

If you encounter any issues during the installation:

- Check the logs in `storage/logs/laravel.log`.
- Ensure the `.env` file is configured correctly.
- Verify that all services (e.g., MySQL, PHP) are running.
