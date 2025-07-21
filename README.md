# 🚀 BokMap – Full-Stack Home Services Platform (Laravel + Blade)

BokMap is a modern web-based platform built with Laravel that connects users to trusted home service providers across Kolkata. Inspired by Urban Company, it offers seamless discovery, booking, and management of services like appliance repair, AC servicing, home cleaning, and more — all from a clean, responsive interface.

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
</p>

---

## ✨ Features

- 🔎 **Smart Navigation**  
  Location and service search built into the navbar.

- 📚 **Dynamic Service Pages**  
  Auto-generated service details at `/service-details/{slug}` using database values.

- 🛒 **Cart System (Session-Based)**  
  Add/remove services to cart, update quantity, auto price calculations, date selection, and cart count update via AJAX.

- 📱 **Mobile-Responsive UI**  
  Built with Blade + Bootstrap + Font Awesome, optimized for all devices.

- 🧾 **Booking Flow Ready**  
  Checkout flow design in place with options like UPI, Card, and COD (integration in progress).

- 🗂️ **Categorized Services**  
  Grouped under Home Services, Kitchen Services, Interior, and Two-Wheeler Maintenance.

- 🌐 **SEO & Google Search Console Integrated**  
  Sitemap generated, custom URLs with slugs, verified ownership with Google.

- 🔒 **Admin Login Panel**  
  Secure login for admin via `/admin/bookings/login`.

- 🧱 **Scalable Codebase**  
  MVC architecture following Laravel conventions for routes, controllers, models, and Blade views.

---

## 📦 Tech Stack

| Frontend      | Backend     | Database    | Auth      | Misc              |
|---------------|-------------|-------------|-----------|-------------------|
| HTML/CSS, Bootstrap, JS | Laravel 10.x | MySQL      | Laravel Auth (custom admin login) | Font Awesome, jQuery, Google Search Console |

---

## 🧪 Local Setup

```bash
git clone https://github.com/your-username/bokmap.git
cd bokmap
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
