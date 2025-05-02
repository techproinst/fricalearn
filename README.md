# Frika Learn

**Frika Learn** is a language learning platform focused on teaching Nigerian languages — **Yoruba**, **Igbo**, and **Hausa**. Each course is structured into three levels: **Beginner**, **Introductory**, and **Intermediate**. 

Parents can register, enroll their children in a course and level, and manage a monthly subscription. The platform includes scheduling, learning materials, and demo courses, all managed by an admin dashboard.

---

## 🧩 Features

- Registration for demo courses
- Parent registration (via form or Google OAuth)
- Student registration linked to parent account
- Payment system via receipt upload
- Monthly subscription management
- Admin timezone-based class scheduling
- Admin uploads course materials/resources
- Admin uploads demo course links

---

## 🛠️ Tech Stack

- **Frontend:** HTML, CSS, JavaScript, jQuery  
- **Backend:** PHP, Laravel 12  
- **Authentication:** Google OAuth (optional)

---

## 🚀 Setup & Installation Guide

### ✅ Prerequisites

- PHP 8.1 or higher
- Composer
- MySQL or compatible database
- Node.js & NPM
- Laravel 12
- Web server (Apache or Nginx)

---

### 📦 2. Install Dependencies

```bash
composer install
npm install && npm run build
```

---

### ⚙️ 3. Environment Configuration

```bash
cp .env.example .env
php artisan key:generate
```

Then update the `.env` file with your:

- Database credentials
- Mail configuration
- Google OAuth credentials (if using Google login)

---

### 🗃️ 4. Database Migration & Seeding

```bash
php artisan migrate --seed
```

This command creates all necessary tables and seeds initial data.

---

### 🗂️ 5. Storage Setup

Link the storage folder to the public directory:

```bash
php artisan storage:link
```

---

### 📅 6. Set Up Cron Job (for Subscription Expiration)

Add the following cron job to your server's crontab:

```bash
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```

This checks and deactivates expired subscriptions automatically.

---

### 📬 7. Set Up Laravel Job Queue

Start the queue worker with:

```bash
php artisan queue:work
```

On a live server, use a process manager like **Supervisor** to keep it running continuously.

---

### 👨‍🏫 8. Admin Tasks After Deployment

- Upload class schedules based on timezones (Africa/Europe, USA/Canada, Asia/Australia)
- Upload demo course links
- Upload course materials/resources (PDFs, links, etc.)

---

## 🧾 License

This project is licensed under the **MIT License**.

---

## 🙋‍♀️ Contributing

Pull requests are welcome! For major changes, please open an issue first to discuss what you would like to change.

---

## 📫 Contact

For support or feedback, email: [support@frikalearn.com](mailto:support@frikalearn.com)