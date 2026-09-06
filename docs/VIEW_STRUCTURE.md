# 🎨 BLADE VIEW STRUCTURE - SNAP SPIRIT STUDIO

**Complete directory structure and all Blade template files created**

---

## 📊 SUMMARY

✅ **Total View Files Created: 35**
- Website Views: 13
- Admin Views: 22

---

## 📁 COMPLETE VIEW DIRECTORY STRUCTURE

```
resources/views/
├── welcome.blade.php                        (Default Laravel welcome)
│
├── website/
│   ├── layouts/
│   │   └── app.blade.php                   (Master layout for website)
│   │
│   ├── components/
│   │   ├── navbar.blade.php                (Navigation component)
│   │   └── footer.blade.php                (Footer component)
│   │
│   └── pages/
│       ├── index.blade.php                 (Homepage)
│       ├── about.blade.php                 (About page)
│       ├── services.blade.php              (Services page)
│       ├── portfolio.blade.php             (Portfolio/Work showcase)
│       ├── gallery.blade.php               (Interactive gallery)
│       ├── team.blade.php                  (Team page)
│       └── contact.blade.php               (Contact page)
│
└── admin/
    ├── layouts/
    │   └── app.blade.php                   (Master layout for admin)
    │
    ├── components/
    │   ├── sidebar.blade.php               (Admin sidebar navigation)
    │   └── header.blade.php                (Admin page header)
    │
    ├── auth/
    │   ├── login.blade.php                 (Login page)
    │   └── register.blade.php              (Registration page)
    │
    ├── dashboard.blade.php                 (Admin dashboard home)
    │
    ├── portfolio/
    │   ├── index.blade.php                 (List all portfolio items)
    │   ├── create.blade.php                (Create new portfolio)
    │   └── edit.blade.php                  (Edit portfolio item)
    │
    ├── services/
    │   ├── index.blade.php                 (List all services)
    │   ├── create.blade.php                (Create new service)
    │   └── edit.blade.php                  (Edit service)
    │
    ├── team/
    │   ├── index.blade.php                 (List all team members)
    │   ├── create.blade.php                (Add team member)
    │   └── edit.blade.php                  (Edit team member)
    │
    ├── testimonials/
    │   ├── index.blade.php                 (List all testimonials)
    │   ├── create.blade.php                (Add testimonial)
    │   └── edit.blade.php                  (Edit testimonial)
    │
    ├── enquiries/
    │   ├── index.blade.php                 (List all enquiries)
    │   └── show.blade.php                  (View single enquiry)
    │
    ├── faqs/
    │   ├── index.blade.php                 (List all FAQs)
    │   ├── create.blade.php                (Create new FAQ)
    │   └── edit.blade.php                  (Edit FAQ)
    │
    ├── media/
    │   └── index.blade.php                 (Media library)
    │
    └── settings/
        └── edit.blade.php                  (Site settings)
```

---

## 🌐 WEBSITE VIEWS

### Layout & Components (3 files)
| File | Purpose |
|------|---------|
| `website/layouts/app.blade.php` | Master layout for all website pages |
| `website/components/navbar.blade.php` | Navigation bar component |
| `website/components/footer.blade.php` | Footer component |

### Page Views (7 files)
| File | Purpose |
|------|---------|
| `website/pages/index.blade.php` | Homepage (hero, featured works, CTA) |
| `website/pages/about.blade.php` | About the studio page |
| `website/pages/services.blade.php` | Services listing page |
| `website/pages/portfolio.blade.php` | Portfolio/Work showcase page |
| `website/pages/gallery.blade.php` | Interactive gallery with filters |
| `website/pages/team.blade.php` | Team members page |
| `website/pages/contact.blade.php` | Contact form & information |

---

## 🔐 ADMIN VIEWS

### Admin Layout & Components (3 files)
| File | Purpose |
|------|---------|
| `admin/layouts/app.blade.php` | Master layout for admin panel |
| `admin/components/sidebar.blade.php` | Admin sidebar navigation |
| `admin/components/header.blade.php` | Admin page header |

### Authentication Views (2 files)
| File | Purpose |
|------|---------|
| `admin/auth/login.blade.php` | Admin login page |
| `admin/auth/register.blade.php` | Admin registration page |

### Dashboard (1 file)
| File | Purpose |
|------|---------|
| `admin/dashboard.blade.php` | Admin dashboard home page |

### Content Management Views (16 files)

#### Portfolio Management (3 files)
```
admin/portfolio/
├── index.blade.php    - List all portfolio items with actions
├── create.blade.php   - Form to create new portfolio item
└── edit.blade.php     - Form to edit existing portfolio item
```

#### Services Management (3 files)
```
admin/services/
├── index.blade.php    - List all services
├── create.blade.php   - Form to create new service
└── edit.blade.php     - Form to edit existing service
```

#### Team Management (3 files)
```
admin/team/
├── index.blade.php    - List all team members
├── create.blade.php   - Form to add new team member
└── edit.blade.php     - Form to edit team member
```

#### Testimonials Management (3 files)
```
admin/testimonials/
├── index.blade.php    - List all testimonials
├── create.blade.php   - Form to add new testimonial
└── edit.blade.php     - Form to edit testimonial
```

#### FAQ Management (3 files)
```
admin/faqs/
├── index.blade.php    - List all FAQs
├── create.blade.php   - Form to create new FAQ
└── edit.blade.php     - Form to edit FAQ
```

#### Enquiry Management (2 files)
```
admin/enquiries/
├── index.blade.php    - List all contact enquiries
└── show.blade.php     - View single enquiry details
```

#### Media Management (1 file)
```
admin/media/
└── index.blade.php    - Media library with image gallery
```

#### Settings (1 file)
```
admin/settings/
└── edit.blade.php     - Site settings form
```

---

## 🔗 VIEW STRUCTURE HIERARCHY

### Website Structure
```
website/layouts/app.blade.php (Master)
    ├── website/components/navbar.blade.php
    ├── @yield('content')
    │   └── website/pages/*.blade.php
    └── website/components/footer.blade.php
```

### Admin Structure
```
admin/layouts/app.blade.php (Master)
    ├── admin/components/sidebar.blade.php
    ├── admin/components/header.blade.php
    ├── @yield('content')
    │   └── admin/**/*.blade.php
    └── [No separate footer]
```

---

## 📝 BLADE TEMPLATE PATTERNS USED

### Extending Master Layout
```blade
@extends('website.layouts.app')
@section('title', 'Page Title')
@section('content')
    <!-- Content here -->
@endsection
```

### Including Components
```blade
@include('website.components.navbar')
@include('website.components.footer')
```

### Admin Forms Pattern
```blade
<form method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')  <!-- For edit forms -->
    <!-- Form fields -->
</form>
```

### Route References
```blade
href="{{ route('admin.portfolio.index') }}"
action="{{ route('admin.portfolio.store') }}"
```

---

## 🚀 NEXT STEPS

### 1. **Update Routes**
Connect all views to controllers via routes in:
- `../routes/web.php` - Website routes
- `../routes/admin.php` - Admin routes

### 2. **Create Controllers**
Build controllers to render these views:
```
Website Controllers:
- HomeController
- AboutController
- ServicesController
- PortfolioController
- GalleryController
- TeamController
- ContactController

Admin Controllers:
- DashboardController
- PortfolioController
- ServiceController
- TeamController
- TestimonialController
- EnquiryController
- FAQController
- MediaController
- SettingController
```

### 3. **Create Database Models**
```
Models to Create:
- Portfolio
- Service
- TeamMember
- Testimonial
- Enquiry
- FAQ
- Media
- Category
- SiteSetting
```

### 4. **Add Content to Views**
Fill in each view with:
- Form fields
- Table layouts
- UI components
- Bootstrap classes

---

## 💡 IMPORTANT NOTES

✅ All views are **empty scaffolds** - ready for content
✅ Proper **Blade syntax** is already in place
✅ Views follow **Laravel conventions**
✅ Components are **reusable** across multiple pages
✅ Admin layout includes **sidebar & header** structure
✅ Forms use **CSRF protection** (@csrf)
✅ Route names referenced are **placeholders** - create matching routes

---

## 📊 FILE COUNT

```
Website Views:      13 files
Admin Views:        22 files
─────────────────────
Total:              35 files (+ 1 welcome.blade.php)
```

---

## 🎯 STATUS

✅ View structure complete
✅ All directory paths created
✅ Blade scaffolding in place
⏳ Next: Create routes & controllers
⏳ Then: Create database models & migrations

---

**Created:** September 6, 2026  
**Last Updated:** September 6, 2026  
**Version:** 1.0.0
