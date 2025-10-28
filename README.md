# 🏨 Abd AlQader Hotel Management System

A comprehensive **hotel management system** built with **Laravel 11**, featuring room reservations, invoice management, and payment processing. Designed for flexibility and efficiency, this system allows admins, receptionists, and customers to manage hotel operations seamlessly.

---

## 🛏️ Room Management

Dynamic room management with full control over types, pricing, and availability.

**Features:**
- **Customizable Room Types** – Add, edit, or delete room types anytime.
- **Flexible Pricing** – Adjust prices for each room type.
- **Room Status Tracking** – Track each room as Available, Booked, or Under Maintenance.
- **Image Gallery & Descriptions** – Detailed images and descriptions for each room.
- **Dynamic Availability** – Only available rooms are shown; statuses update automatically.

---

## 👥 User Management

Manage all users with role-based access and secure authentication.

**Roles:**
- **Admin (role_id: 1)** – Full system access.
- **Receptionist (role_id: 2)** – Handles front desk operations.
- **Customer (role_id: 3)** – Book rooms and manage reservations.

**Features:**
- Email verification authentication
- Google OAuth integration
- Admin creation feature

---

## 📅 Reservation System

User-friendly booking system for smooth operations.

**Features:**
- Easy room booking interface
- Date range selection (check-in/check-out)
- Automatic availability checking
- Reservation status tracking (Pending, Confirmed, Canceled, Completed)
- User reservation history

---

## 💰 Invoice & Payment System

Automated invoice generation and payment tracking.

**Features:**
- **Automatic Invoice Generation**
  - Created when a reservation is made
  - 16% tax calculation
  - Unique invoice numbering (INV-YYYY-NNNN)
  - Discount support
- **Multiple Payment Methods**
  - Cash (confirmed at reception)
  - Visa Card
  - Online Payment (simulated)
- **Payment Status Tracking**
  - Pending, Completed, Failed, Refunded

---

## 📊 Admin Dashboard

Centralized dashboard for managing all hotel operations.

**Features:**
- View all invoices and payments
- Confirm cash payments
- Apply discounts
- Cancel invoices
- User management
- Room management

---

## 💻 Tech Stack

- **Framework:** Laravel 11  
- **Database:** SQLite  
- **Frontend:** Blade Templates + Tailwind CSS  
- **Authentication:** Laravel Breeze  
- **Image Storage:** Local storage with symlink  

---

## ⚙️ Installation

**Prerequisites:**
- PHP 8.2 or higher  
- Composer  

**Setup Steps:**
```bash
git clone https://github.com/raadalreqeb/Training-project.git
cd Training-project
composer install
php artisan migrate
php artisan serve

