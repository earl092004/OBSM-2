<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

 
 Laravel Project Setup Guide
<br><br>
Download the file  obsm (1).sql and import to the desired database name <br><br>

Prerequisites
<br><br>
- PHP installed
<br>
- Composer installed
<br>
- MySQL or your preferred database<br><br>

Database Setup<br><br>
1. Copy the `.env.example` file to `.env`<br><br>
2. Modify the `.env` file with your database credentials:<br><br><br>
DB_CONNECTION=mysql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=3306<br>
DB_DATABASE=your_database_name<br>
DB_USERNAME=your_database_username<br>
DB_PASSWORD=your_database_password<br><br><br>


3. Download the SQL file for database contents<br><br><br>
4. Import the SQL file into your database using a tool like phpMyAdmin or MySQL command line<br><br><br>

Project Setup<br><br>
1. Install dependencies:<br>
bash<br><br>
composer install<br>
<br>

2. Generate application key:<br>
bash<br><br><br>
php artisan key:generate<br>
<br>

3. Run database migrations (if applicable):<br>
bash<br><br><br>
php artisan migrate<br><br>

Running the Application<br><br>
1. Start the Laravel development server:<br><br>
bash<br><br>
php artisan serve<br><br>


2. **IMPORTANT**: After running `php artisan serve`, manually navigate to `http://localhost:8000/login` in your web browser<br><br><br>

3. Login with your credentials<br><br><br>

Troubleshooting<br><br><br>
- Ensure all dependencies are installed<br><br>
- Check your `.env` file configuration<br><br>
- Verify database connection<br><br>
