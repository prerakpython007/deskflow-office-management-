# DeskFlow Office Management System

A simple yet powerful office management system built with Laravel, MySQL, and DataTables. DeskFlow allows you to manage companies and employees with full CRUD operations, dynamic filtering, and real-time Country/State/City selection.

---

## 🚀 Tech Stack

- **Backend:** Laravel 13
- **Database:** MySQL / MariaDB
- **Frontend:** Blade Templates + Tailwind CSS (CDN)
- **Tables:** DataTables (jQuery)
- **External API:** CountriesNow API (Country/State/City)

---

## ✨ Features

- **Company Management** — Create, view, edit and delete companies
- **Employee Management** — Create, view, edit and delete employees
- **Manager Self-Reference** — An employee can be assigned as a manager of other employees
- **DataTables Integration** — Pagination, search, and filtering on employee listings
- **Filter by Company & Position** — Quickly filter employees by their company or job position
- **Country / State / City Dropdowns** — Dynamic location selection powered by the CountriesNow API
- **Success Notifications** — Flash messages on create, update and delete actions
- **Responsive UI** — Clean dark-themed interface built with Tailwind CSS

---

## ⚙️ Setup Instructions

### Prerequisites

Make sure you have the following installed:

- PHP 8.1 or higher
- Composer
- MySQL or MariaDB
- Git

### Step 1 — Clone the Repository

```bash
git clone https://github.com/your-username/deskflow-office-management.git
cd deskflow-office-management
```

### Step 2 — Install Dependencies

```bash
composer install
```

### Step 3 — Create Environment File

```bash
cp .env.example .env
php artisan key:generate
```

### Step 4 — Configure Database

Open `.env` and update the database section:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=deskflow
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_password
```

### Step 5 — Create Database

Log into MySQL and create the database:

```bash
mysql -u root -p -h 127.0.0.1
```

```sql
CREATE DATABASE deskflow;
EXIT;
```

### Step 6 — Run Migrations

```bash
php artisan migrate
```

### Step 7 — Start the Development Server

```bash
php artisan serve
```

Visit `http://127.0.0.1:8000` in your browser.

---

## 📁 Project Structure

deskflow-office-management/
├── app/
│   ├── Http/Controllers/
│   │   ├── CompanyController.php
│   │   └── EmployeeController.php
│   └── Models/
│       ├── Company.php
│       └── Employee.php
├── database/
│   └── migrations/
├── resources/
│   └── views/
│       ├── companies/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   └── edit.blade.php
│       └── employees/
│           ├── index.blade.php
│           ├── create.blade.php
│           └── edit.blade.php
└── routes/
└── web.php


---

## 🗄️ Database Schema

### Companies Table
| Column | Type |
|---|---|
| id | Primary Key |
| name | String |
| location | String (nullable) |
| created_at | Timestamp |
| updated_at | Timestamp |

### Employees Table
| Column | Type |
|---|---|
| id | Primary Key |
| name | String |
| email | String (unique) |
| position | String (nullable) |
| company_id | Foreign Key → companies |
| manager_id | Foreign Key → employees (self) |
| country | String (nullable) |
| state | String (nullable) |
| city | String (nullable) |
| created_at | Timestamp |
| updated_at | Timestamp |

---

## 🌐 External API

This project uses the **CountriesNow API** for dynamic Country, State, and City dropdowns during employee creation and editing.

- API Base URL: `https://countriesnow.space/api/v0.1`
- No API key required
- Endpoints used:
  - `GET /countries/positions` — Fetch all countries
  - `POST /countries/states` — Fetch states by country
  - `POST /countries/state/cities` — Fetch cities by country and state

---

## 📝 Notes

- No API key is required for the CountriesNow API
- Tailwind CSS is loaded via CDN — no build step required
- DataTables is loaded via CDN — no npm installation required
- The manager field is self-referencing — any employee can be assigned as a manager

---

## 👨‍💻 Author

Built as part of an office management system assignment using Laravel and MySQL.
