# 📝 Personal Blog

A simple and elegant personal blog platform built with Laravel, designed for writing, managing, and publishing articles with a clean and readable interface.

---

## 🚀 Overview

This is a personal blogging system where I can write and publish articles, manage content easily, and focus on clean reading experience.

The project demonstrates:

* Laravel backend development
* CRUD operations for blog posts
* Clean UI design using Blade and Tailwind CSS
* Basic content management system structure

---

## ✨ Features

### 👤 Blog Management

* Create, edit, and delete blog posts
* Draft and publish system
* Slug-based URLs for SEO-friendly routing

### 📖 Reading Experience

* Clean and minimal blog layout
* Responsive design (mobile-friendly)
* Organized post listing with pagination

### 🔍 Content Features

* Markdown support 
* Code snippet support
* Timestamped posts (created/updated dates)


## 🧱 Tech Stack

* **Backend:** Laravel (PHP)
* **Frontend:** Blade, Tailwind CSS
* **Database:** MySQL
* **Testing:** PHPUnit
* **Version Control:** Git & GitHub
* Auth:** Laravel Breeze
* **Testing:** PHPUnit
* **Caching (optional):** Redis

---

<!-- ## 🗂️ Project Structure (Simplified)

```bash
app/
├── Models/
├── Http/
│   ├── Controllers/
│   └── Middleware/
database/
├── migrations/
resources/
├── views/
routes/
├── web.php
```

--- -->

<!-- ## ⚙️ Installation

Follow these steps to run the project locally:

```bash
git clone https://github.com/pads-only/personal-blog.git
cd personal-blog

composer install
npm install && npm run dev

cp .env.example .env
php artisan key:generate
```

### Configure Environment

DB_DATABASE=your_database
DB_USERNAME=root
DB_PASSWORD=

Update your `.env` file with your database credentials.

```bash
php artisan migrate
php artisan serve
```

Visit:

```
http://127.0.0.1:8000
```

---

## 🔐 Roles & Permissions

| Role      | Permissions                     |
| --------- | ------------------------------- |
| User      | Create and manage own posts     |
| Moderator | Review and approve/reject posts |
| Admin     | Full system access              |

---

## 🔄 Moderation Workflow

1. User creates a blog post (saved as **pending**)
2. Moderator reviews the submission
3. Post is either:

   * ✅ Approved → becomes public
   * ❌ Rejected → feedback provided

---

## 📸 Screenshots

> *(Add screenshots here for better presentation)*

* Blog listing page
* Create post page
* Moderation dashboard

---

## 🧪 Testing

```bash
php artisan test
```

--- -->

## 🚧 Project Status

🚧 In Development

---

## 👨‍💻 Author

**Juan Carlos**

* GitHub: https://github.com/pads-only

---

## 📄 License

This project is open-source and available under the MIT License.
