# 📝 Personal Blog (Laravel)

A clean, lightweight personal blog built with Laravel, designed to demonstrate backend engineering skills, clean architecture, and production-ready coding practices.

This project focuses on **real-world backend design principles** rather than feature overload.

---

## 🚀 Live Demo

> (Add your deployed link here)

---

## 📸 Preview

> (Add screenshots or GIFs here)
- Home page
- Blog post view
- Admin post editor

---

## 🧠 Project Goals

This project was built to:

- Strengthen backend development skills using Laravel
- Practice clean architecture and separation of concerns
- Implement real-world features like slug systems and publishing workflows
- Demonstrate testing and maintainable code structure
- Serve as a portfolio project for backend engineering roles

---

## ✨ Features

### 📝 Blog System
- Create, edit, and delete blog posts
- Draft and publish workflow
- SEO-friendly URLs using slugs

### 🔗 Slug-based Routing
- Human-readable URLs:/posts/laravel-clean-architecture


### 🏷️ Tags System
- Assign multiple tags to posts
- Filter posts by tag

### 📖 Public Blog View
- Only published posts are visible to the public
- Clean, minimal reading experience

### 💬 Comments System (Optional)
- Users can leave comments on posts

### 🌐 API Endpoints
- Public REST API for posts

### ⚡ Performance
- Basic caching for frequently accessed data

### 🧪 Testing
- Feature tests for core post workflows
- Validation of publishing rules and visibility

---

## 🏗️ Tech Stack

- **Backend:** Laravel 11+
- **Frontend:** Blade + Tailwind CSS
- **Database:** MySQL / PostgreSQL
- **Authentication:** Laravel Breeze
- **Caching (optional):** Redis
- **Testing:** PHPUnit

---

## 🧱 Architecture Overview

The project follows a clean and simple layered structure:
Controllers → Actions/Services → Models → Database


### Key Design Decisions:

- Thin controllers (no business logic inside)
- Action-based service layer for core operations
- Route model binding using slugs
- Query scopes for clean data filtering
- Form Requests for validation

---

## 🧾 Database Structure

### Main Tables:

- `users`
- `posts`
- `tags`
- `post_tag`
- `comments` (optional)

### Posts Table Highlights:

- title
- slug (unique)
- content
- status (draft / published)
- published_at
- user_id

---

## 🔐 Authentication

- Built with Laravel Breeze
- Single-user focused (admin-only blog management)

---

## 🧪 Testing

This project includes feature tests for:

- Post creation
- Publishing workflow
- Public visibility rules
- Comment submission (if enabled)

Run tests:

```bash
php artisan test

⚙️ Installation
1. Clone the repository
git clone https://github.com/your-username/personal-blog.git
cd personal-blog
2. Install dependencies
composer install
npm install && npm run dev
3. Setup environment
cp .env.example .env
php artisan key:generate
4. Configure database

Update .env file:

DB_DATABASE=your_db
DB_USERNAME=root
DB_PASSWORD=
5. Run migrations
php artisan migrate
6. Start server
php artisan serve
📌 Example Routes
Public
GET /  
GET /posts/{slug}
GET /tags/{tag}
Authenticated (Admin)
GET /dashboard
POST /posts
PUT /posts/{post}
DELETE /posts/{post}
🧠 Key Learnings

This project demonstrates:

Real-world Laravel backend structure
Slug generation and routing strategies
Separation of business logic using service/actions
Query scopes and clean Eloquent usage
Authentication and authorization basics
Writing maintainable and testable code
📷 Screenshots

Add images here for better portfolio impact:

Homepage
Post page
Admin editor
🚀 Future Improvements
Markdown editor support
Post versioning
Advanced caching layer
Search functionality
Better admin dashboard UI
👨‍💻 Author

Juan Carlos Padillo
Backend-focused Laravel Developer

📄 License

This project is open-source and available under the MIT License.