# Abd AlQader Hotel Management System

A comprehensive hotel management system built with Laravel 11, featuring room reservations, invoice management, and payment processing.

## Features

### 🏨 Room Management
- **30 Available Rooms** with different types:
  - Single Rooms (101-110): $65 - $85/night
  - Double Rooms (201-210): $115 - $135/night
  - Suite Rooms (301-310): $230 - $300/night
- Room status tracking (available, booked, maintenance)
- Image gallery for each room
- Detailed room descriptions

### 👥 User Management
- **Role-based Access Control:**
  - Admin (role_id: 1) - Full system access
  - Receptionist (role_id: 2) - Front desk operations
  - Customer (role_id: 3) - Book rooms and manage reservations
- User authentication with email verification
- Google OAuth integration
- Admin creation feature

### 📅 Reservation System
- Easy room booking interface
- Date range selection
- Automatic availability checking
- Reservation status tracking
- User reservation history

### 💰 Invoice & Payment System
- **Automatic Invoice Generation:**
  - Created automatically when reservation is made
  - 16% tax calculation
  - Unique invoice numbering (INV-YYYY-NNNN)
  - Discount support
  
- **Multiple Payment Methods:**
  - Cash (confirmed at reception)
  - Visa Card
  - Online Payment (simulated)
  
- **Payment Status Tracking:**
  - Pending
  - Completed
  - Failed
  - Refunded

### 📊 Admin Dashboard
- View all invoices and payments
- Confirm cash payments
- Apply discounts
- Cancel invoices
- User management
- Room management

## Tech Stack

- **Framework:** Laravel 11
- **Database:** SQLite
- **Frontend:** Blade Templates + Tailwind CSS
- **Authentication:** Laravel Breeze
- **Image Storage:** Local storage with symlink

## Installation

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js & NPM

### Setup Steps

1. **Clone the repository**
```bash
git clone https://github.com/raadalreqeb/Training-project.git
cd Training-project
