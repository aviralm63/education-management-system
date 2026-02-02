# EdTech Learning Platform

<p align="center">
  <strong>A Comprehensive Learning Management System for Educational Excellence</strong>
</p>

---

## 📋 Project Overview

EdTech Learning Platform is a robust Laravel-based web application designed to provide a complete solution for educational institutions. It serves students, instructors, and administrators with an integrated platform for course management, task assignment, video content delivery, and comprehensive role-based access control.

**Key Features:**
- ✅ User Management (Students, Instructors, Administrators)
- ✅ Role-Based Access Control (RBAC)
- ✅ Course/Product Management
- ✅ Task Management System with Calendar View
- ✅ Video Content Management
- ✅ Category and Tag Organization
- ✅ RESTful API with Token Authentication

---

## 🚀 Getting Started

### System Requirements

Before proceeding with the installation, ensure you have the following installed:

- **PHP** >= 8.0
- **Composer** (Dependency Manager for PHP)
- **Node.js** and **npm** (Frontend Asset Management)
- **MySQL** or **PostgreSQL** Database Server
- **Git** Version Control

### Installation Instructions

#### Step 1: Clone the Repository

```bash
git clone <repository-url>
cd ed
```

#### Step 2: Install PHP and JavaScript Dependencies

```bash
# Install PHP packages
composer install

# Install JavaScript packages
npm install
```

#### Step 3: Configure Environment Variables

```bash
# Copy the example environment file
cp .env.example .env

# Generate the application encryption key
php artisan key:generate
```

Edit the `.env` file and configure the following variables:

```env
APP_NAME="EdTech Learning Platform"
APP_URL=http://localhost:8000

# Database Configuration
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=edtech_db
DB_USERNAME=root
DB_PASSWORD=

# Mail Configuration (Optional)
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
```

#### Step 4: Set Up the Database

```bash
# Execute database migrations
php artisan migrate

# Populate database with seed data
php artisan db:seed

# Or run migrations and seeding together
php artisan migrate:fresh --seed
```

#### Step 5: Build Frontend Assets

```bash
# Development environment
npm run dev

# Production environment
npm run production
```

#### Step 6: Start the Development Server

```bash
# Terminal 1: Start Laravel development server
php artisan serve

# Terminal 2 (Optional): Watch for file changes
npm run watch
```

The application will be available at **http://localhost:8000**

---

## 📁 Project Structure

```
ed/
├── app/
│   ├── Http/
│   │   ├── Controllers/          # Application controllers (Web & API)
│   │   ├── Middleware/           # Custom middleware
│   │   ├── Requests/             # Form validation classes
│   │   └── Resources/            # API response transformers
│   ├── Models/                   # Eloquent ORM models
│   │   ├── User.php
│   │   ├── Product.php
│   │   ├── Task.php
│   │   ├── Video.php
│   │   └── ...
│   └── Providers/                # Service providers
│
├── config/                       # Application configuration files
│   ├── app.php
│   ├── database.php
│   ├── mail.php
│   └── ...
│
├── database/
│   ├── migrations/               # Database schema definitions
│   ├── seeders/                  # Database seed classes
│   └── factories/                # Model factory classes
│
├── resources/
│   ├── views/                    # Blade template files
│   ├── js/                       # JavaScript source files
│   └── css/                      # CSS stylesheets
│
├── routes/
│   ├── web.php                   # Web application routes
│   ├── api.php                   # API routes
│   └── ...
│
├── tests/                        # Test suites (Feature & Unit)
├── storage/                      # Cache, logs, and file uploads
├── public/                       # Public web root directory
├── composer.json                 # PHP package dependencies
└── package.json                  # JavaScript package dependencies
```

---

## 🔑 Core Features

### 1. User Management
- Multi-role user system (Admin, Instructor, Student)
- User registration and authentication
- Password recovery functionality
- User profile management and updates

### 2. Role-Based Access Control (RBAC)
- Granular permission system
- Dynamic role assignment
- Gate-based authorization for admin panel
- Middleware-protected routes

### 3. Course/Product Management
- Create, read, update, and delete courses
- Organize courses by categories
- Apply multiple tags to courses
- Media file upload support
- Complete API endpoints for course operations

### 4. Task Management System
- Create and assign tasks to users
- Track task status (To Do, In Progress, Completed)
- Categorize tasks with tags
- Calendar view for task visualization
- Task deadline management

### 5. Video Content Management
- Upload and manage video content
- Organize videos in a library
- Stream video content
- Video metadata tracking

### 6. RESTful API
- Token-based authentication using Laravel Sanctum
- Full CRUD operations for all resources
- JSON response format
- Comprehensive API endpoints at `/api/v1/*`

---

## 📊 Database Models and Relationships

| Model | Purpose |
|-------|---------|
| **User** | System users (Students, Instructors, Administrators) |
| **Role** | User role definitions |
| **Permission** | Granular permission definitions |
| **Product** | Course content and learning materials |
| **ProductCategory** | Course categorization |
| **ProductTag** | Course tagging and organization |
| **Task** | Assignments and tasks |
| **TaskStatus** | Task state management |
| **TaskTag** | Task categorization |
| **Video** | Video learning content |

---

## 🛣️ API Endpoints

### Authentication Endpoints
```
POST   /api/auth/login              - Authenticate user and receive token
POST   /api/auth/register           - Create new user account
POST   /api/auth/logout             - Invalidate user token
```

### Product Management
```
GET    /api/v1/admin/products              - Retrieve all products
POST   /api/v1/admin/products              - Create new product
GET    /api/v1/admin/products/{id}         - Retrieve product details
PUT    /api/v1/admin/products/{id}         - Update product information
DELETE /api/v1/admin/products/{id}         - Delete product
```

### Task Management
```
GET    /api/v1/admin/tasks                 - Retrieve all tasks
POST   /api/v1/admin/tasks                 - Create new task
GET    /api/v1/admin/tasks/{id}            - Retrieve task details
PUT    /api/v1/admin/tasks/{id}            - Update task information
DELETE /api/v1/admin/tasks/{id}            - Delete task
```

**Additional endpoints available for:** Videos, Task Statuses, Task Tags, Product Categories, Product Tags

---

## 🔐 Authentication & Authorization

### Web Application Login

Default credentials from database seeders:

```
Email:    admin@example.com
Password: password
```

### API Authentication

#### 1. Obtain Authentication Token

```bash
curl -X POST http://localhost:8000/api/auth/login \
  -H "Content-Type: application/json" \
  -d '{
    "email": "admin@example.com",
    "password": "password"
  }'
```

The response will include a `token` field.

#### 2. Use Token in API Requests

Include the token in the Authorization header for all subsequent requests:

```bash
curl -H "Authorization: Bearer YOUR_TOKEN_HERE" \
  http://localhost:8000/api/v1/admin/products
```

---

## 📝 Useful Commands

### Database Operations
```bash
php artisan migrate                 # Run pending migrations
php artisan migrate:fresh           # Reset and re-run all migrations
php artisan migrate:rollback        # Rollback last migration batch
php artisan db:seed                 # Run database seeders
php artisan db:seed --class=UsersTableSeeder  # Run specific seeder
```

### Cache and Configuration
```bash
php artisan cache:clear             # Clear application cache
php artisan view:clear              # Clear compiled views
php artisan config:clear            # Clear configuration cache
php artisan config:cache            # Cache configuration files
```

### Routing and Generation
```bash
php artisan route:list              # Display all application routes
php artisan make:model ModelName -m # Create model with migration
php artisan make:controller ControllerName  # Generate controller
php artisan make:request RequestName        # Generate form request class
php artisan make:migration create_table_name # Create migration file
```

### Media and Storage
```bash
php artisan storage:link            # Create storage symbolic link
```

---

## 🧪 Running Tests

```bash
# Execute all tests
php artisan test

# Run tests in a specific file
php artisan test tests/Feature/ProductTest.php

# Generate code coverage report
php artisan test --coverage
```

---

## 🐛 Troubleshooting

### Database Connection Issues
- Verify database credentials in `.env` file
- Ensure MySQL/PostgreSQL server is running
- Confirm database name matches the `.env` configuration
- Check that database user has necessary privileges

### Permission Denied Errors
```bash
# Set proper permissions on storage and bootstrap directories
chmod -R 775 storage bootstrap/cache
```

### Composer-Related Issues
```bash
# Reinstall dependencies
composer install --no-interaction

# Update dependencies
composer update
```

### Frontend Assets Not Loading
```bash
# Install dependencies
npm install

# Build assets for development
npm run dev

# Or watch for changes during development
npm run watch
```

### Port Already in Use
```bash
# Run on a different port
php artisan serve --port=8001
```

---

## 📚 Additional Resources

- **Laravel Documentation:** https://laravel.com/docs
- **Laravel Eloquent ORM:** https://laravel.com/docs/eloquent
- **Laravel API Documentation:** https://laravel.com/api
- **Blade Template Engine:** https://laravel.com/docs/blade

---

## 📄 License

This project is distributed under the MIT License. See the LICENSE file for more details.

---

**Version:** 1.0.0  
**Last Updated:** February 2, 2026  
**Maintained by:** Development Team

For issues, feature requests, or contributions, please open an issue on the project repository.

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
