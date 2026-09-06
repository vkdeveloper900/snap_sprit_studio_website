# 🛣️ ROUTES DOCUMENTATION - SNAP SPIRIT STUDIO

**Complete routing structure for website and admin panel**

---

## 📊 ROUTES SUMMARY

| Category | Count | Status |
|----------|-------|--------|
| Website Routes | 7 | ✅ Created |
| Admin Auth Routes | 5 | ✅ Created |
| Admin CRUD Routes | 40+ | ✅ Created |
| **TOTAL** | **52+** | **✅ COMPLETE** |

---

## 🌐 PUBLIC WEBSITE ROUTES

### File: `../routes/web.php`

All public routes that don't require authentication.

```php
// Homepage
GET  /                    → HomeController@index        (name: 'home')

// About Page
GET  /about              → PageController@about         (name: 'about')

// Services Page
GET  /services           → PageController@services      (name: 'services')

// Portfolio/Work Page
GET  /work               → PageController@portfolio     (name: 'portfolio')

// Gallery Page
GET  /gallery            → PageController@gallery       (name: 'gallery')

// Team Page
GET  /team               → PageController@team          (name: 'team')

// Contact Page
GET  /contact            → PageController@contact       (name: 'contact')

// Contact Form Submission
POST /contact            → PageController@submitContact (name: 'contact.submit')
```

### Route Usage in Blade Templates

```blade
<!-- Homepage link -->
<a href="{{ route('home') }}">Home</a>

<!-- About link -->
<a href="{{ route('about') }}">About</a>

<!-- Contact form -->
<form action="{{ route('contact.submit') }}" method="POST">
    @csrf
    <!-- form fields -->
</form>
```

---

## 🔐 ADMIN AUTHENTICATION ROUTES

### File: `../routes/admin.php`

Authentication routes (no middleware required)

```php
// Login Page
GET  /admin/login                  → AuthController@showLoginForm  (name: 'admin.login')

// Login Process
POST /admin/login                  → AuthController@login          (name: 'admin.login.post')

// Logout
POST /admin/logout                 → AuthController@logout         (name: 'admin.logout')

// Registration Page
GET  /admin/register               → AuthController@showRegisterForm  (name: 'admin.register')

// Registration Process
POST /admin/register               → AuthController@register       (name: 'admin.register.post')
```

### Route Usage

```blade
<!-- Login link -->
<a href="{{ route('admin.login') }}">Admin Login</a>

<!-- Logout button -->
<form action="{{ route('admin.logout') }}" method="POST">
    @csrf
    <button>Logout</button>
</form>
```

---

## 🎛️ ADMIN PROTECTED ROUTES

All routes below require authentication: `middleware(['auth'])`

### Dashboard

```php
GET  /admin/                       → DashboardController@index     (name: 'admin.dashboard')
```

**Example:**
```blade
<a href="{{ route('admin.dashboard') }}">Dashboard</a>
```

---

### PORTFOLIO MANAGEMENT

**Prefix:** `/admin/portfolio` | **Name Prefix:** `admin.portfolio.`

```php
// List all portfolio items
GET  /admin/portfolio              → PortfolioController@index     (name: 'index')

// Show create form
GET  /admin/portfolio/create       → PortfolioController@create    (name: 'create')

// Store new portfolio
POST /admin/portfolio              → PortfolioController@store     (name: 'store')

// Show edit form
GET  /admin/portfolio/{id}/edit    → PortfolioController@edit      (name: 'edit')

// Update portfolio
PUT  /admin/portfolio/{id}         → PortfolioController@update    (name: 'update')

// Delete portfolio
DELETE /admin/portfolio/{id}       → PortfolioController@destroy   (name: 'destroy')
```

**Route Names:**
```
admin.portfolio.index
admin.portfolio.create
admin.portfolio.store
admin.portfolio.edit
admin.portfolio.update
admin.portfolio.destroy
```

**Blade Examples:**
```blade
<!-- List link -->
<a href="{{ route('admin.portfolio.index') }}">Portfolio</a>

<!-- Create new -->
<a href="{{ route('admin.portfolio.create') }}" class="btn">Add New</a>

<!-- Edit form -->
<form action="{{ route('admin.portfolio.update', $portfolio->id) }}" method="POST">
    @csrf
    @method('PUT')
</form>

<!-- Delete -->
<form action="{{ route('admin.portfolio.destroy', $portfolio->id) }}" method="POST">
    @csrf
    @method('DELETE')
</form>
```

---

### SERVICES MANAGEMENT

**Prefix:** `/admin/services` | **Name Prefix:** `admin.services.`

```php
GET    /admin/services             → ServiceController@index
GET    /admin/services/create      → ServiceController@create
POST   /admin/services             → ServiceController@store
GET    /admin/services/{id}/edit   → ServiceController@edit
PUT    /admin/services/{id}        → ServiceController@update
DELETE /admin/services/{id}        → ServiceController@destroy
```

**Route Names:**
```
admin.services.index
admin.services.create
admin.services.store
admin.services.edit
admin.services.update
admin.services.destroy
```

---

### TEAM MANAGEMENT

**Prefix:** `/admin/team` | **Name Prefix:** `admin.team.`

```php
GET    /admin/team                 → TeamController@index
GET    /admin/team/create          → TeamController@create
POST   /admin/team                 → TeamController@store
GET    /admin/team/{id}/edit       → TeamController@edit
PUT    /admin/team/{id}            → TeamController@update
DELETE /admin/team/{id}            → TeamController@destroy
```

**Route Names:**
```
admin.team.index
admin.team.create
admin.team.store
admin.team.edit
admin.team.update
admin.team.destroy
```

---

### TESTIMONIALS MANAGEMENT

**Prefix:** `/admin/testimonials` | **Name Prefix:** `admin.testimonials.`

```php
GET    /admin/testimonials         → TestimonialController@index
GET    /admin/testimonials/create  → TestimonialController@create
POST   /admin/testimonials         → TestimonialController@store
GET    /admin/testimonials/{id}/edit → TestimonialController@edit
PUT    /admin/testimonials/{id}    → TestimonialController@update
DELETE /admin/testimonials/{id}    → TestimonialController@destroy
```

**Route Names:**
```
admin.testimonials.index
admin.testimonials.create
admin.testimonials.store
admin.testimonials.edit
admin.testimonials.update
admin.testimonials.destroy
```

---

### ENQUIRIES MANAGEMENT

**Prefix:** `/admin/enquiries` | **Name Prefix:** `admin.enquiries.`

```php
GET    /admin/enquiries            → EnquiryController@index
GET    /admin/enquiries/{id}       → EnquiryController@show
PUT    /admin/enquiries/{id}       → EnquiryController@update
DELETE /admin/enquiries/{id}       → EnquiryController@destroy
```

**Route Names:**
```
admin.enquiries.index
admin.enquiries.show
admin.enquiries.update
admin.enquiries.destroy
```

**Note:** No create/store - enquiries come from contact form on website

---

### FAQ MANAGEMENT

**Prefix:** `/admin/faqs` | **Name Prefix:** `admin.faqs.`

```php
GET    /admin/faqs                 → FAQController@index
GET    /admin/faqs/create          → FAQController@create
POST   /admin/faqs                 → FAQController@store
GET    /admin/faqs/{id}/edit       → FAQController@edit
PUT    /admin/faqs/{id}            → FAQController@update
DELETE /admin/faqs/{id}            → FAQController@destroy
```

**Route Names:**
```
admin.faqs.index
admin.faqs.create
admin.faqs.store
admin.faqs.edit
admin.faqs.update
admin.faqs.destroy
```

---

### MEDIA MANAGEMENT

**Prefix:** `/admin/media` | **Name Prefix:** `admin.media.`

```php
GET    /admin/media                → MediaController@index
POST   /admin/media/upload         → MediaController@upload
DELETE /admin/media/{id}           → MediaController@destroy
```

**Route Names:**
```
admin.media.index
admin.media.upload
admin.media.destroy
```

**Note:** Special upload route for bulk image uploads

---

### SETTINGS MANAGEMENT

**Prefix:** `/admin/settings` | **Name Prefix:** `admin.settings.`

```php
GET    /admin/settings             → SettingController@edit
PUT    /admin/settings             → SettingController@update
```

**Route Names:**
```
admin.settings.edit
admin.settings.update
```

---

## 📋 COMPLETE ROUTE LIST TABLE

| HTTP | URL | Controller@Method | Route Name |
|------|-----|-------------------|-----------|
| **PUBLIC WEBSITE** |
| GET | / | HomeController@index | home |
| GET | /about | PageController@about | about |
| GET | /services | PageController@services | services |
| GET | /work | PageController@portfolio | portfolio |
| GET | /gallery | PageController@gallery | gallery |
| GET | /team | PageController@team | team |
| GET | /contact | PageController@contact | contact |
| POST | /contact | PageController@submitContact | contact.submit |
| **ADMIN AUTH** |
| GET | /admin/login | AuthController@showLoginForm | admin.login |
| POST | /admin/login | AuthController@login | admin.login.post |
| POST | /admin/logout | AuthController@logout | admin.logout |
| GET | /admin/register | AuthController@showRegisterForm | admin.register |
| POST | /admin/register | AuthController@register | admin.register.post |
| **ADMIN DASHBOARD** |
| GET | /admin | DashboardController@index | admin.dashboard |
| **ADMIN PORTFOLIO** |
| GET | /admin/portfolio | PortfolioController@index | admin.portfolio.index |
| GET | /admin/portfolio/create | PortfolioController@create | admin.portfolio.create |
| POST | /admin/portfolio | PortfolioController@store | admin.portfolio.store |
| GET | /admin/portfolio/{id}/edit | PortfolioController@edit | admin.portfolio.edit |
| PUT | /admin/portfolio/{id} | PortfolioController@update | admin.portfolio.update |
| DELETE | /admin/portfolio/{id} | PortfolioController@destroy | admin.portfolio.destroy |
| **ADMIN SERVICES** |
| GET | /admin/services | ServiceController@index | admin.services.index |
| GET | /admin/services/create | ServiceController@create | admin.services.create |
| POST | /admin/services | ServiceController@store | admin.services.store |
| GET | /admin/services/{id}/edit | ServiceController@edit | admin.services.edit |
| PUT | /admin/services/{id} | ServiceController@update | admin.services.update |
| DELETE | /admin/services/{id} | ServiceController@destroy | admin.services.destroy |
| **ADMIN TEAM** |
| GET | /admin/team | TeamController@index | admin.team.index |
| GET | /admin/team/create | TeamController@create | admin.team.create |
| POST | /admin/team | TeamController@store | admin.team.store |
| GET | /admin/team/{id}/edit | TeamController@edit | admin.team.edit |
| PUT | /admin/team/{id} | TeamController@update | admin.team.update |
| DELETE | /admin/team/{id} | TeamController@destroy | admin.team.destroy |
| **ADMIN TESTIMONIALS** |
| GET | /admin/testimonials | TestimonialController@index | admin.testimonials.index |
| GET | /admin/testimonials/create | TestimonialController@create | admin.testimonials.create |
| POST | /admin/testimonials | TestimonialController@store | admin.testimonials.store |
| GET | /admin/testimonials/{id}/edit | TestimonialController@edit | admin.testimonials.edit |
| PUT | /admin/testimonials/{id} | TestimonialController@update | admin.testimonials.update |
| DELETE | /admin/testimonials/{id} | TestimonialController@destroy | admin.testimonials.destroy |
| **ADMIN ENQUIRIES** |
| GET | /admin/enquiries | EnquiryController@index | admin.enquiries.index |
| GET | /admin/enquiries/{id} | EnquiryController@show | admin.enquiries.show |
| PUT | /admin/enquiries/{id} | EnquiryController@update | admin.enquiries.update |
| DELETE | /admin/enquiries/{id} | EnquiryController@destroy | admin.enquiries.destroy |
| **ADMIN FAQS** |
| GET | /admin/faqs | FAQController@index | admin.faqs.index |
| GET | /admin/faqs/create | FAQController@create | admin.faqs.create |
| POST | /admin/faqs | FAQController@store | admin.faqs.store |
| GET | /admin/faqs/{id}/edit | FAQController@edit | admin.faqs.edit |
| PUT | /admin/faqs/{id} | FAQController@update | admin.faqs.update |
| DELETE | /admin/faqs/{id} | FAQController@destroy | admin.faqs.destroy |
| **ADMIN MEDIA** |
| GET | /admin/media | MediaController@index | admin.media.index |
| POST | /admin/media/upload | MediaController@upload | admin.media.upload |
| DELETE | /admin/media/{id} | MediaController@destroy | admin.media.destroy |
| **ADMIN SETTINGS** |
| GET | /admin/settings | SettingController@edit | admin.settings.edit |
| PUT | /admin/settings | SettingController@update | admin.settings.update |

---

## 🔗 MIDDLEWARE & PROTECTION

### Public Routes (No Auth)
- Homepage, About, Services, Portfolio, Gallery, Team, Contact
- Contact form submission
- Admin login/register pages

### Protected Routes (Auth Required)
- All `/admin/*` routes except login/register
- Middleware: `auth`

### Protected Routes (Optional Roles)
Future enhancement: Add role-based permissions
```php
Route::middleware(['auth', 'role:admin'])->group(...)
```

---

## 📝 NAMING CONVENTIONS

### Website Routes
```
route('home')
route('about')
route('services')
route('portfolio')
route('gallery')
route('team')
route('contact')
route('contact.submit')
```

### Admin Dashboard
```
route('admin.dashboard')
```

### Admin CRUD Routes Pattern
```
route('admin.{resource}.index')      - List all
route('admin.{resource}.create')     - Show create form
route('admin.{resource}.store')      - Save new item
route('admin.{resource}.edit', $id)  - Show edit form
route('admin.{resource}.update', $id) - Save changes
route('admin.{resource}.destroy', $id) - Delete item
```

---

## ✅ REQUIRED CONTROLLERS

These controllers must be created to handle the routes:

### Website Controllers
```
App\Http\Controllers\Website\Home\HomeController
App\Http\Controllers\Website\PageController
```

### Admin Controllers
```
App\Http\Controllers\Admin\Auth\AuthController
App\Http\Controllers\Admin\DashboardController
App\Http\Controllers\Admin\PortfolioController
App\Http\Controllers\Admin\ServiceController
App\Http\Controllers\Admin\TeamController
App\Http\Controllers\Admin\TestimonialController
App\Http\Controllers\Admin\EnquiryController
App\Http\Controllers\Admin\FAQController
App\Http\Controllers\Admin\MediaController
App\Http\Controllers\Admin\SettingController
```

---

## 🧪 TESTING ROUTES

### List all routes:
```bash
php artisan route:list
```

### Filter routes:
```bash
php artisan route:list --name=admin.portfolio
php artisan route:list --path=admin
php artisan route:list --method=POST
```

### Cache routes (production):
```bash
php artisan route:cache
php artisan route:clear  # Clear cache
```

---

## 🚀 NEXT STEPS

1. ✅ Routes created
2. ⏳ Create Controllers
3. ⏳ Create Models & Migrations
4. ⏳ Build Views & Forms
5. ⏳ Add validation & logic

---

**Created:** September 6, 2026  
**Status:** ✅ COMPLETE  
**Version:** 1.0.0
