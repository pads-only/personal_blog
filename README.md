# 📝 Moderated Blog Platform

A full-featured blogging platform built with Laravel that allows users to create and share content, with an integrated moderation system to ensure quality and control over published posts.

---

## 🚀 Overview

This project is a **content-driven web application** where users can write blog posts using a rich text/markdown editor, while administrators or moderators review and approve content before it becomes publicly visible.

It is designed to demonstrate:

* Backend architecture using Laravel
* Content moderation workflows
* Clean UI with Blade + Tailwind CSS
* Scalable and maintainable code structure

---

## ✨ Features

### 👤 Authentication

* User registration & login
* Role-based access (Admin, Moderator, User)

### 📝 Blog Management

* Create, edit, and delete blog posts
* Draft and publish system
* Slug-based URLs for SEO-friendly links

### 🛡️ Moderation System

* Posts require approval before publishing
* Admin/Moderator dashboard for reviewing posts
* Approve or reject submissions
* Optional feedback for rejected posts

### 💬 Engagement (Optional if implemented)

* Comment system
* Like or reaction system

### 🔍 Additional Features

* Pagination
* Search and filtering
* Clean UI with responsive design

---

## 🧱 Tech Stack

* **Backend:** Laravel (PHP)
* **Frontend:** Blade, Tailwind CSS
* **Database:** MySQL
* **Testing:** PHPUnit
* **Version Control:** Git & GitHub

---

## 🗂️ Project Structure (Simplified)

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

---

## ⚙️ Installation

Follow these steps to run the project locally:

```bash
git clone https://github.com/your-username/moderated-blog.git
cd moderated-blog
composer install
cp .env.example .env
php artisan key:generate
```

### Configure Environment

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

---

## 🚧 Project Status

🚧 In Development

---

## 📌 Future Improvements

* Rich text editor (e.g. Tiptap)
* Tagging system
* User profiles
* Notifications for approval/rejection
* API support (for mobile or SPA frontend)

---

## 👨‍💻 Author

**Juan Carlos Padillo**

* GitHub: https://github.com/pads-only

---

## 📄 License

This project is open-source and available under the MIT License.
