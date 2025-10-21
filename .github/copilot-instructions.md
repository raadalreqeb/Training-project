# Copilot Instructions - Hotel Booking System

## Project Overview
This is a Laravel 12 hotel booking management system ("Abd AlQader Hotel") with role-based access control, room reservations, and Google OAuth integration. Uses SQLite database and Tailwind CSS v4 for styling.

## Architecture & Key Components

### Authentication & Authorization
- **Role-based middleware**: Custom `CheckRole` middleware (`app/Http/Middleware/CheckRole.php`) validates user roles via relationship
- **Three user roles** (seeded via `RoleSeeder`): admin (ID=1), receptionist (ID=2), customer (ID=3)
- **Google OAuth**: Integrated via Laravel Socialite - creates users with role_id=2 by default and stores avatar URLs
- **Role checking**: Use `auth()->user()->role->name` or `auth()->user()->role_id` (not direct role property on User)

### Database Schema Conventions
- **Non-standard primary keys**: All models use custom PKs
  - `User`: `user_id` (not `id`)
  - `Room`: `room_id` (not `id`)
  - `Reservations`: `Reservation_ID` (not `id`)
  - `Role`: `role_id` with `id` column for relationships
- **Mass assignment**: All models use `protected $guarded = []` (no fillable arrays)
- **Foreign key cascade**: All relationships use `cascadeOnDelete()` in migrations

### Routing Patterns
- **Admin routes**: Prefixed with `/admin` and protected by `['auth', 'role:admin']` middleware
- **Dual room routes**: 
  - Admin: `admin/rooms/*` → `AdminController`
  - Users: `/rooms` → `RoomsController@indexuser`
- **Separate admin reservation controller**: `AdminReservationController` handles admin CRUD, `ReservationsController` for users
- **Route model binding**: Controllers expect `{room}` and `{reservation}` route parameters

### View Structure
- **Component-based**: Uses `<x-layout>` wrapper with slot-based heading (`<x-slot:heading>`)
- **Blade components** in `resources/views/Components/`:
  - `layout.blade.php` - Main layout with nav
  - `nav-link.blade.php`, `user-dropdown.blade.php` - Navigation
  - `form-*.blade.php` - Form field components
- **No traditional layout extends**: Uses component syntax, not `@extends`
- **Tailwind CDN**: Currently using CDN in layout.blade.php (not compiled Vite assets for main styles)

## Development Workflows

### Running the Application
```powershell
# Full dev stack (uses concurrently - defined in composer.json)
composer dev
# Runs: php artisan serve + queue:listen + npm run dev

# Individual commands
php artisan serve              # Start server
npm run dev                    # Vite dev server for assets
php artisan queue:listen       # Background jobs
```

### Database Management
```powershell
# Fresh migration with seeding
php artisan migrate:fresh --seed

# Note: RoleSeeder MUST run before UserFactory (role_id foreign key)
# DatabaseSeeder order: RoleSeeder → User → Room → Reservations factories
```

### Testing
```powershell
composer test                  # Runs config:clear + artisan test
# Uses in-memory SQLite for tests (phpunit.xml)
```

## Project-Specific Patterns

### Model Relationships
```php
// Always specify custom foreign keys
User::class -> role(): belongsTo(Role::class, 'role_id', 'id')
User::class -> reservations(): hasMany(Reservations::class, 'user_id', 'user_id')
Reservations::class -> user(): belongsTo(User::class, 'user_id', 'user_id')
Room::class -> reservations(): hasMany(Reservations::class, 'room_id')
```

### Controller Naming
- `AdminController` - handles room CRUD for admins + createAdmin method
- `AdminReservationController` - admin-specific reservation management
- `ReservationsController` - user-facing reservation operations
- `RoomsController` - public room viewing (has `indexuser` method for non-admin view)

### Migration Conventions
- Timestamps: Use `$table->date()` for start/end dates (not datetime)
- Status fields: Default string values ('pending', 'unpaid')
- Price: `decimal(8, 2)` for monetary values

### Configuration
- **Database**: SQLite by default (`config/database.php` - 'default' => 'sqlite')
- **Vite**: Custom config with Tailwind CSS v4 Vite plugin (`@tailwindcss/vite`)
- **Middleware aliases**: Registered in `bootstrap/app.php` → `'role' => CheckRole::class`

## Common Gotchas

1. **Role access**: Always check `auth()->user()->role_id === 1` for admin (not string comparison unless using `->role->name`)
2. **Primary keys**: Remember to use custom PK names when creating/finding records
3. **Reservation model**: Class name is `Reservations` (plural), table is `reservations`
4. **Google users**: Have nullable password, use `google_id` column, default avatar stored
5. **Room validation**: `number` field must be unique across rooms table

## Key Files Reference
- `routes/web.php` - All route definitions (study dual admin/user patterns)
- `app/Http/Middleware/CheckRole.php` - Role authorization logic
- `database/seeders/RoleSeeder.php` - Role IDs (critical for user creation)
- `resources/views/Components/layout.blade.php` - Main UI shell
- `bootstrap/app.php` - Middleware registration
