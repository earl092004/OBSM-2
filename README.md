<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

 
 
# Laravel Project Setup Guide

## Prerequisites
- PHP installed
- Composer installed
- MySQL or your preferred database

## Database Setup
1. Copy the `.env.example` file to `.env`
2. Modify the `.env` file with your database credentials:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

3. Download the SQL file for database contents
4. Import the SQL file into your database using a tool like phpMyAdmin or MySQL command line

## Project Setup
1. Install dependencies:
```bash
composer install
```

2. Generate application key:
```bash
php artisan key:generate
```

3. Run database migrations (if applicable):
```bash
php artisan migrate
```

## Running the Application
1. Start the Laravel development server:
```bash
php artisan serve
```

2. **IMPORTANT**: After running `php artisan serve`, manually navigate to `http://localhost:8000/login` in your web browser

3. Login with your credentials

## Troubleshooting
- Ensure all dependencies are installed
- Check your `.env` file configuration
- Verify database connection
