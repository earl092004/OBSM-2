<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

 
 
# Laravel Project Setup Guide
<br>
## Prerequisites
<br>
- PHP installed
<br>
- Composer installed
<br>
- MySQL or your preferred database<br>

## Database Setup<br>
1. Copy the `.env.example` file to `.env`<br>
2. Modify the `.env` file with your database credentials:<br>
```
DB_CONNECTION=mysql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=3306<br>
DB_DATABASE=your_database_name<br>
DB_USERNAME=your_database_username<br>
DB_PASSWORD=your_database_password<br>
```

3. Download the SQL file for database contents<br>
4. Import the SQL file into your database using a tool like phpMyAdmin or MySQL command line<br>

## Project Setup<br>
1. Install dependencies:<br>
```bash<br>
composer install<br>
```<br>

2. Generate application key:<br>
```bash<br>
php artisan key:generate<br>
```<br>

3. Run database migrations (if applicable):<br>
```bash<br>
php artisan migrate<br>
```

## Running the Application<br>
1. Start the Laravel development server:<br>
```bash<br>
php artisan serve<br>
```

2. **IMPORTANT**: After running `php artisan serve`, manually navigate to `http://localhost:8000/login` in your web browser<br>

3. Login with your credentials<br>

## Troubleshooting<br>
- Ensure all dependencies are installed<br>
- Check your `.env` file configuration<br>
- Verify database connection<br>
