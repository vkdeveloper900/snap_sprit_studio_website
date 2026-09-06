# 🎬 SNAP SPIRIT STUDIO - Laravel Admin Dashboard

**Premium Photography & Cinematography Studio Management System with Admin Dashboard**

A full-stack Laravel 12 application converting the static Snap Spirit Studio website into a dynamic platform with:
- ✨ Professional admin dashboard (Filament PHP)
- 📸 Portfolio management system
- 👥 Team & testimonials management
- 📧 Contact form & lead management
- 🎯 Dynamic content management (no code changes needed)

---

## 📋 PROJECT OVERVIEW

| Aspect | Details |
|--------|---------|
| **Framework** | Laravel 12.0 |
| **Database** | MySQL 8.0+ |
| **Admin Panel** | Filament PHP v3.x |
| **Frontend** | Bootstrap 5 + Blade Templates |
| **Build Tool** | Vite |
| **PHP Version** | 8.2+ |
| **Status** | 🚀 Ready for Development |

---

## 🎯 FEATURES

### Admin Dashboard
- 📊 Dashboard with analytics & statistics
- 📁 Portfolio/Work management with bulk image upload
- 🏷️ Service catalog management
- 👤 Team member profiles
- ⭐ Testimonials with approval workflow
- 📧 Contact enquiry management & tracking
- 🖼️ Media library (centralized image management)
- ❓ FAQ management
- ⚙️ Site settings & configuration
- 👨‍💼 User management with role-based access

### Frontend Pages (Dynamic)
- 🏠 Homepage with dynamic sections
- 📖 About page
- 🛠️ Services listing
- 🎨 Portfolio/Work showcase
- 🖼️ Interactive gallery with filters
- 👥 Team page
- 📋 Contact form with validation
- ❓ FAQ section

### Advanced Features
- 🔐 Role-based access control (Admin, Editor, Viewer)
- 🖼️ Image optimization & lazy loading
- 📧 Email notifications for new enquiries
- 💾 Lead management system
- 🔍 SEO optimization
- 📱 Fully responsive design

---

## 📁 PROJECT STRUCTURE

```
snap_sprit_studio_website/
├── app/
│   ├── Http/Controllers/        # Page controllers for frontend
│   ├── Models/                  # Database models (Portfolio, Service, Team, etc.)
│   ├── Filament/                # Admin panel resources & forms
│   └── Providers/
├── database/
│   ├── migrations/              # Database schema
│   ├── factories/               # Model factories for testing
│   └── seeders/                 # Sample data
├── resources/
│   ├── views/                   # Blade templates for frontend pages
│   ├── css/app.css              # Global styles
│   └── js/                      # JavaScript files
├── routes/
│   ├── web.php                  # Public routes & admin routes
│   └── console.php              # Artisan commands
├── config/
│   ├── app.php                  # App configuration
│   ├── database.php             # Database configuration
│   ├── auth.php                 # Authentication settings
│   └── [other configs]
├── storage/
│   ├── app/public/              # Public uploads (portfolios, images)
│   └── logs/                    # Log files
├── tests/                       # Test files
├── .env                         # Environment variables (MySQL config here)
├── .env.example                 # Example env file
├── composer.json                # PHP dependencies
├── package.json                 # Node dependencies
├── vite.config.js               # Vite build configuration
└── artisan                      # Laravel CLI tool
```

---

## 🚀 INSTALLATION & SETUP

### Prerequisites
- PHP 8.2 or higher
- MySQL 8.0 or higher
- Node.js 18+ (for npm)
- Composer 2.x

### Step 1: Clone & Install

```bash
cd D:\Vinod_Suthar\Projects\snap_sprit_studio_website

# Install PHP dependencies
composer install

# Install Node dependencies
npm install
```

### Step 2: Database Setup

```bash
# Create MySQL database
# Open MySQL and run:
# CREATE DATABASE snap_spirit_studio CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

**Update .env file (already configured):**
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=snap_spirit_studio
DB_USERNAME=root
DB_PASSWORD=your_password_here
```

### Step 3: Generate App Key & Run Migrations

```bash
# Generate application key
php artisan key:generate

# Run all migrations (creates tables)
php artisan migrate

# (Optional) Seed sample data
php artisan db:seed
```

### Step 4: Start Development Server

**Terminal 1 - Laravel Server:**
```bash
php artisan serve
```
Runs on: http://localhost:8000

**Terminal 2 - Vite (Frontend Build):**
```bash
npm run dev
```

**Terminal 3 - Queue (for emails):**
```bash
php artisan queue:listen
```

### Quick Start (All at once):
```bash
composer run dev
```

---

## 🔓 ACCESSING THE APPLICATION

| Page | URL | Access |
|------|-----|--------|
| **Homepage** | http://localhost:8000 | Public |
| **Admin Dashboard** | http://localhost:8000/admin | Login required |
| **Portfolio** | http://localhost:8000/work | Public |
| **Services** | http://localhost:8000/services | Public |
| **Team** | http://localhost:8000/team | Public |
| **Contact** | http://localhost:8000/contact | Public |
| **Gallery** | http://localhost:8000/gallery | Public |

---

## 🎛️ ADMIN DASHBOARD MODULES

### 1. Portfolio Management
- Create/Edit/Delete portfolio projects
- Upload multiple images per project
- Assign category (Wedding, Event, Commercial, etc.)
- Set featured image and display order
- SEO metadata

**Access:** `/admin/portfolio`

### 2. Services
- Manage service offerings
- Add service features/items
- Reorder services
- Set icons and descriptions

**Access:** `/admin/services`

### 3. Team Members
- Add/Edit team member profiles
- Upload profile photos
- Add specializations & skills
- Social media links
- Bio/description

**Access:** `/admin/team-members`

### 4. Testimonials
- Create/Edit testimonials
- Approve/Reject workflow
- Mark featured testimonials
- Client categorization

**Access:** `/admin/testimonials`

### 5. Contact Enquiries
- View all contact form submissions
- Change enquiry status (new → contacted → converted)
- Assign to team members
- Add internal notes
- Export enquiries

**Access:** `/admin/enquiries`

### 6. Media Library
- Centralized image management
- Bulk upload images
- Edit image metadata & alt text
- Organize by category

**Access:** `/admin/media`

### 7. FAQs
- Create/Edit/Delete FAQ items
- Organize by category
- Reorder for frontend display

**Access:** `/admin/faqs`

### 8. Site Settings
- Company contact information
- Social media links
- Business hours
- SEO settings
- Logo & branding images

**Access:** `/admin/settings`

### 9. User Management
- Create admin/editor/viewer accounts
- Assign roles and permissions
- Manage access levels
- View activity logs

**Access:** `/admin/users`

---

## 🗄️ DATABASE SCHEMA

### Core Tables

**portfolios**
- id, title, slug, category_id, description, featured_image_id, status, display_order

**portfolio_images**
- id, portfolio_id, media_id, caption, display_order

**services**
- id, title, slug, description, features (JSON), status, display_order

**team_members**
- id, name, position, image_id, bio, specializations (JSON), status, display_order

**testimonials**
- id, client_name, testimonial_text, rating, image_id, status, featured, display_order

**enquiries**
- id, name, email, phone, project_type, message, status, assigned_to, created_at

**faqs**
- id, question, answer, category, display_order, is_published

**media**
- id, filename, path, mime_type, size, width, height, alt_text

**categories**
- id, name, slug, description, icon, display_order

**site_settings**
- id, key, value, type, description

**users**
- id, name, email, password, role, is_active, last_login

---

## 📦 TECHNOLOGY STACK

### Backend
- **Laravel 12.0** - PHP Web Framework
- **Filament PHP** - Admin panel & CRUD generation
- **MySQL 8.0** - Database
- **Intervention Image** - Image manipulation
- **Laravel Mail** - Email notifications

### Frontend
- **Blade Templates** - Server-side templating
- **Bootstrap 5** - CSS framework
- **Vite** - Build tool & bundler
- **Alpine.js** - Interactive components (optional)

### Development
- **Laravel Sail** - Docker development
- **Laravel Tinker** - REPL for debugging
- **Laravel Debugbar** - Development tools
- **PHPUnit** - Unit testing

---

## 🔐 USER ROLES & PERMISSIONS

### Admin
✅ Full access to all features
✅ User management
✅ Site settings
✅ View all reports

### Editor
✅ Create/Edit content (Portfolio, Services, Team)
✅ Manage enquiries
✅ View only (Users & Settings)

### Viewer
✅ View-only access
✅ Cannot make changes
✅ Can view reports

---

## 📝 COMMON TASKS

### Add New Portfolio Work
```
1. Go to /admin/portfolio
2. Click "Create"
3. Enter title, description, category
4. Upload featured image
5. Upload gallery images
6. Click "Publish"
```

### Add Team Member
```
1. Go to /admin/team-members
2. Click "Create"
3. Enter name, position, bio
4. Upload profile photo
5. Add specializations
6. Save
```

### Manage Contact Enquiries
```
1. Go to /admin/enquiries
2. View new submissions
3. Change status as needed
4. Assign to team member
5. Add follow-up notes
```

### Update Site Information
```
1. Go to /admin/settings
2. Update phone, email, address
3. Update business hours
4. Update social media links
5. Save changes
```

---

## 🧪 TESTING

Run tests:
```bash
php artisan test
```

Generate test database:
```bash
php artisan test --database=testing
```

---

## 🚀 DEPLOYMENT

### Before Deploying
```bash
# Optimize for production
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Build frontend assets
npm run build

# Run migrations on server
php artisan migrate --force
```

### Deploy to Hosting
1. Upload files via FTP/Git
2. Install composer dependencies
3. Create `.env` file with production settings
4. Run `php artisan migrate`
5. Set proper file permissions
6. Configure SSL certificate

### Hosting Recommendations
- **Laravel Forge** - Easiest Laravel deployment
- **DigitalOcean App Platform** - Simple & affordable
- **AWS Lightsail** - Scalable solution
- **Shared Hosting** - Traditional FTP hosting (if PHP 8.2+ supported)

---

## 📧 EMAIL CONFIGURATION

For sending enquiry notifications:

### Using Mailtrap (Testing)
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=465
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
```

### Using Gmail
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=your_app_password
MAIL_ENCRYPTION=tls
```

### Using Mailgun
```env
MAIL_MAILER=mailgun
MAILGUN_DOMAIN=your-domain.mailgun.org
MAILGUN_SECRET=your-secret-key
```

---

## 🐛 TROUBLESHOOTING

### Database Connection Error
```
Check .env file has correct credentials
Ensure MySQL is running
Verify database exists: snap_spirit_studio
```

### "No application encryption key" Error
```bash
php artisan key:generate
```

### "Class not found" Error
```bash
composer dump-autoload
```

### Images Not Uploading
```bash
# Ensure storage is linked
php artisan storage:link

# Check write permissions on storage/app/public
```

### Queue Not Processing
```bash
# Make sure queue listener is running
php artisan queue:listen
```

### Permission Denied on Linux
```bash
chmod -R 775 storage bootstrap/cache
sudo chown -R www-data:www-data storage bootstrap/cache
```

---

## 📞 SUPPORT & DOCUMENTATION

- [Laravel Documentation](https://laravel.com/docs)
- [Filament PHP Documentation](https://filamentphp.com)
- [MySQL Documentation](https://dev.mysql.com/doc)
- [Bootstrap 5 Documentation](https://getbootstrap.com/docs/5.0)

---

## 📄 LICENSE

This project is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

## 🤝 DEVELOPMENT ROADMAP

### Phase 1 (Weeks 1-3) ✅ In Progress
- [ ] Install Filament PHP
- [ ] Create Portfolio models & migrations
- [ ] Build Portfolio admin CRUD
- [ ] Make homepage dynamic

### Phase 2 (Weeks 4-5) ⏳ Pending
- [ ] Create Service & Team models
- [ ] Build admin interfaces
- [ ] Add testimonials management
- [ ] Email notifications

### Phase 3 (Weeks 6-7) ⏳ Pending
- [ ] Enquiry management system
- [ ] FAQ management
- [ ] Site settings
- [ ] Performance optimization

### Phase 4 (Week 8+) ⏳ Pending
- [ ] Testing & QA
- [ ] Security audit
- [ ] Deployment setup
- [ ] Client training

---

## 📌 QUICK COMMANDS REFERENCE

```bash
# Development
php artisan serve                    # Start development server
npm run dev                          # Start frontend build watcher
php artisan queue:listen            # Start queue processor

# Database
php artisan migrate                 # Run migrations
php artisan migrate:rollback        # Rollback last migration
php artisan db:seed                 # Seed sample data
php artisan tinker                  # Interactive REPL

# Cache
php artisan cache:clear             # Clear application cache
php artisan config:clear            # Clear config cache
php artisan view:clear              # Clear view cache

# Production
npm run build                        # Build for production
php artisan optimize                # Optimize application
php artisan storage:link            # Link storage directory

# Testing
php artisan test                     # Run tests
php artisan test --filter=TestName   # Run specific test

# Admin
php artisan make:filament-resource PortfolioResource --model=Portfolio
php artisan make:model ModelName -m  # Create model with migration
```

---

**Created:** September 6, 2026  
**Version:** 1.0.0  
**Status:** 🚀 Ready for Development  

Built with ❤️ using Laravel 12 & Filament PHP
