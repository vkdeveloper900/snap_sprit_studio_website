# 🚀 SNAP SPIRIT STUDIO - SETUP GUIDE

**Complete setup instructions for MySQL database and Laravel project**

---

## ✅ PREREQUISITES

Before starting, ensure you have installed:

- ✅ **PHP 8.2+** - Download from [php.net](https://www.php.net)
- ✅ **MySQL 8.0+** - Download from [mysql.com](https://www.mysql.com/downloads/)
- ✅ **Composer** - Download from [getcomposer.org](https://getcomposer.org)
- ✅ **Node.js 18+** - Download from [nodejs.org](https://nodejs.org)
- ✅ **Git** (optional) - Download from [git-scm.com](https://git-scm.com)

### Verify Installation
```bash
php -v          # Should show PHP 8.2+
mysql --version # Should show MySQL 8.0+
composer -v     # Should show Composer version
npm -v          # Should show Node.js version
```

---

## 📝 STEP 1: CREATE MYSQL DATABASE

### Option A: Using MySQL Command Line

1. **Open Command Prompt/Terminal**
2. **Connect to MySQL:**
   ```bash
   mysql -u root -p
   ```
   (Enter your MySQL root password when prompted)

3. **Create the database:**
   ```sql
   CREATE DATABASE snap_spirit_studio CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```

4. **Verify creation:**
   ```sql
   SHOW DATABASES;
   ```
   You should see `snap_spirit_studio` in the list.

5. **Exit MySQL:**
   ```sql
   EXIT;
   ```

### Option B: Using MySQL Workbench (GUI)

1. Open MySQL Workbench
2. Connect to your MySQL server
3. Right-click on "Databases" → "Create New Database"
4. **Name:** `snap_spirit_studio`
5. **Charset:** utf8mb4
6. **Collation:** utf8mb4_unicode_ci
7. Click "Apply"

### Option C: Using phpMyAdmin

1. Open phpMyAdmin in browser (usually http://localhost/phpmyadmin)
2. Login with your MySQL credentials
3. Click "New" → "Create database"
4. **Database name:** `snap_spirit_studio`
5. **Charset:** utf8mb4_unicode_ci
6. Click "Create"

---

## 🔧 STEP 2: CONFIGURE PROJECT

### 1. Navigate to Project Directory
```bash
cd D:\Vinod_Suthar\Projects\snap_sprit_studio_website
```

### 2. Create .env File
The `../.env` file is already created and configured for MySQL. Verify it has:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=snap_spirit_studio
DB_USERNAME=root
DB_PASSWORD=
```

**If your MySQL has a password, update `DB_PASSWORD`:**
```env
DB_PASSWORD=your_password_here
```

### 3. Verify .env File
```bash
# Check if .env exists
cat .env | grep DB_
```

---

## 📦 STEP 3: INSTALL DEPENDENCIES

### 1. Install PHP Dependencies
```bash
composer install
```
This downloads all Laravel packages and dependencies (~5-10 minutes)

### 2. Install Node Dependencies
```bash
npm install
```
This downloads frontend build tools (~3-5 minutes)

**Verify both completed successfully without errors.**

---

## 🔑 STEP 4: GENERATE APPLICATION KEY

```bash
php artisan key:generate
```

This creates a unique encryption key for your application. You should see:
```
Application key set successfully.
```

---

## 🗄️ STEP 5: RUN DATABASE MIGRATIONS

### 1. Create All Database Tables
```bash
php artisan migrate
```

This creates all necessary tables in your MySQL database:
- users (admin accounts)
- portfolio_items (work/projects)
- portfolio_images (gallery images)
- services
- team_members
- testimonials
- enquiries (contact form submissions)
- faqs
- categories
- media (image library)
- site_settings
- [and system tables]

**You should see messages like:**
```
Migrating: 2024_01_01_000000_create_users_table
Migrated:  2024_01_01_000000_create_users_table
...
Database migrations completed successfully.
```

### 2. Verify Tables Created
Open MySQL and check:
```sql
USE snap_spirit_studio;
SHOW TABLES;
```

You should see 15+ tables listed.

---

## 👤 STEP 6: CREATE ADMIN USER (OPTIONAL)

Create your first admin account:

```bash
php artisan tinker
```

Then in the Tinker REPL:
```php
$user = \App\Models\User::create([
    'name' => 'Admin Name',
    'email' => 'admin@example.com',
    'password' => bcrypt('password123'),
    'role' => 'admin',
]);

exit
```

Or use the admin panel when it's ready to create users.

---

## 🎨 STEP 7: BUILD FRONTEND ASSETS (OPTIONAL)

For development with hot reload:
```bash
npm run dev
```

For production build:
```bash
npm run build
```

---

## 🚀 STEP 8: START DEVELOPMENT SERVER

### Terminal 1 - Laravel Server
```bash
php artisan serve
```
Runs on: **http://localhost:8000**

### Terminal 2 - Frontend Build (Keep running)
```bash
npm run dev
```
Automatically rebuilds CSS/JS on changes.

### Terminal 3 - Queue Processor (For emails)
```bash
php artisan queue:listen
```
Processes background jobs like sending emails.

---

## ✅ VERIFY SETUP

Open browser and visit:

| URL | Expected |
|-----|----------|
| http://localhost:8000 | Homepage loads ✅ |
| http://localhost:8000/admin | Admin panel (login required) |

### Test Database Connection
```bash
php artisan tinker
DB::connection()->getPDO();
```
Should show connection info without errors.

---

## 🔧 TROUBLESHOOTING

### Error: "SQLSTATE[HY000] [2002] No such file or directory"
**Problem:** MySQL not running

**Solution:**
```bash
# On Windows
net start mysql80        # Start MySQL service

# On Mac
brew services start mysql

# On Linux
sudo service mysql start
```

### Error: "Access denied for user 'root'@'localhost'"
**Problem:** Wrong MySQL password in .env

**Solution:**
1. Update `../.env` file with correct password:
   ```env
   DB_PASSWORD=your_actual_password
   ```
2. Try again

### Error: "Unknown database 'snap_spirit_studio'"
**Problem:** Database not created

**Solution:**
Run the MySQL CREATE DATABASE command from STEP 1 again.

### Error: "Class not found"
**Problem:** Dependencies not installed

**Solution:**
```bash
composer dump-autoload
php artisan config:clear
```

### Error: "No application encryption key has been specified"
**Problem:** APP_KEY not generated

**Solution:**
```bash
php artisan key:generate
```

### Port 8000 Already in Use
**Problem:** Another app using port 8000

**Solution:**
```bash
php artisan serve --port=8001
```

---

## 📊 CHECK DATABASE WITH MySQL

```bash
# Connect to MySQL
mysql -u root -p

# Select database
USE snap_spirit_studio;

# List all tables
SHOW TABLES;

# Check users table structure
DESCRIBE users;

# Exit
EXIT;
```

---

## 🎯 NEXT STEPS

Once setup is complete and running:

1. ✅ Application available at http://localhost:8000
2. ⏳ Install Filament PHP admin panel
3. ⏳ Create admin CRUD interfaces
4. ⏳ Build dynamic frontend pages
5. ⏳ Add portfolio management
6. ⏳ Add contact form handling

---

## 📞 COMMON COMMANDS

```bash
# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Rollback database (undo migrations)
php artisan migrate:rollback

# Seed sample data
php artisan db:seed

# Interactive PHP shell
php artisan tinker

# View running processes
php artisan serve --list

# Run tests
php artisan test
```

---

## 🎬 QUICK START AFTER SETUP

Every time you want to develop:

**Terminal 1:**
```bash
php artisan serve
```

**Terminal 2:**
```bash
npm run dev
```

**Terminal 3:**
```bash
php artisan queue:listen
```

Then open: http://localhost:8000

---

## ✨ YOU'RE READY!

If you've completed all steps without errors, your Laravel project is ready for development! 🎉

Next step: Install Filament PHP admin panel and start building the dashboard modules.

---

**Created:** September 6, 2026  
**Last Updated:** September 6, 2026  
**Version:** 1.0.0
