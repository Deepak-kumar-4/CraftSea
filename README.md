# CraftSea 🛍️

A full-stack e-commerce platform for handmade crafts, built with PHP and MySQL — featuring a complete customer storefront and an independent admin back-office for managing products, orders, and shipping.

![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat-square&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?style=flat-square&logo=bootstrap&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=flat-square)

---

## 📑 Table of Contents

- [Overview](#-overview)
- [Key Features](#-key-features)
- [Tech Stack](#-tech-stack)
- [Security Hardening](#-security-hardening)
- [System Design](#-system-design)
- [Screenshots](#-screenshots)
- [Project Structure](#-project-structure)
- [Getting Started](#-getting-started)
- [Known Limitations](#-known-limitations)
- [Author](#-author)

---

## 🧩 Overview

CraftSea is an online craft store offering a wide range of handmade crafting supplies. Customers can browse products, manage a cart and wishlist, check out, and track orders — while a separate admin panel handles inventory, order fulfillment, and sales reporting.

The project is split into two independent applications sharing the same database:

- **`User/`** — the customer-facing storefront
- **`admin/`** — the back-office management panel

---

## ✨ Key Features

**Customer Storefront**

- Product browsing with category, brand, and price-range filtering, plus keyword search
- Cart and wishlist management
- Full checkout flow with shipping address collection
- Account dashboard with order tracking and order cancellation
- Contact and newsletter subscription forms

**Admin Panel**

- Dashboard with order, sales, and revenue visualization
- Full product CRUD (add, edit, delete, with multi-image support)
- Order status management and shipping address lookup
- Registered customer and newsletter subscriber views
- Sales reporting

---

## 🛠️ Tech Stack

| Category     | Technology                            |
| ------------ | ------------------------------------- |
| **Backend**  | PHP (procedural, mysqli)              |
| **Database** | MySQL / MariaDB                       |
| **Frontend** | HTML5, CSS3, JavaScript, Bootstrap    |
| **Server**   | Apache (XAMPP)                        |
| **Auth**     | PHP Sessions, bcrypt password hashing |

---

## 🔐 Security Hardening

This codebase went through a dedicated security audit and hardening pass:

- **SQL Injection** — every query built from `$_GET`/`$_POST` input was rewritten using `mysqli` prepared statements (`prepare` / `bind_param` / `execute`), closing injection points across both the storefront and admin panel.
- **Password Security** — customer passwords are hashed with `password_hash()` (bcrypt) and verified with `password_verify()`. Previously stored as plaintext integers — now `varchar(255)` bcrypt hashes.
- **XSS Prevention** — all user-input and database-fetched values are escaped at the point of output: `htmlspecialchars()` for HTML context, `json_encode()` for values embedded in inline `<script>` blocks or JS attributes (a distinction often missed, since HTML-escaping alone doesn't protect JS string contexts).
- **Admin Authentication** — credentials moved from hardcoded values to environment variables (`ADMIN_EMAIL` / `ADMIN_PASSWORD`), with safe fallback defaults for local development only.
- **Data Hygiene** — the committed database seed data was scrubbed of real-looking personal information (names, emails, phone numbers, addresses), replaced with clearly fake demo accounts.

---

## 📐 System Design

**Entity-Relationship Diagram**

![ER Diagram](assets/diagrams/er-diagram.png)
_From initial project planning; some later features (e.g. Wishlist) were added during development._

**Data Flow Diagrams**

![DFD Level 0](assets/diagrams/dfd-level-0.png)
_Level 0 — context diagram_

![DFD Level 1](assets/diagrams/dfd-level-1.png)
_Level 1_

![DFD Level 2](assets/diagrams/dfd-level-2.png)
_Level 2_

### Database Schema

The schema as actually implemented (see `craftsea.sql`):

| Table         | Key Columns                                                                                                         |
| ------------- | ------------------------------------------------------------------------------------------------------------------- |
| `customer`    | `customer_id` (PK), `password` (bcrypt hash), `name`, `address`, `phone_no`, `email`, `dob`                         |
| `product`     | `product_id` (PK), `name`, `description`, `specification`, `brand`, `price`, `category`, `build_type`, `image1/2/3` |
| `cart`        | `product_id`, `customer_id`, `image`, `name`, `price`, `quantity`                                                   |
| `wishlist`    | `product_id`, `customer_id`, `name`, `price`, `image`                                                               |
| `orders`      | `order_id` (PK), `customer_id`, product/shipping snapshot fields, `status`, `reason`                                |
| `contactus`   | `name`, `email`, `subject`, `message`                                                                               |
| `newsletters` | `email`, `customer_id`, `name`                                                                                      |

Admin authentication is environment-variable based (`ADMIN_EMAIL` / `ADMIN_PASSWORD`), not backed by a database table.

---

## 📸 Screenshots

### User Module

![Home Page](assets/screenshots/user/home-page.png)
_Home page_

![Login Page](assets/screenshots/user/login-page.png)
_Customer login_

![Registration Page](assets/screenshots/user/registration-page.png)
_New account registration_

![Product Listing](assets/screenshots/user/product-listing.png)
_Product catalog with filtering_

![Product Detail](assets/screenshots/user/product-detail.png)
_Individual product detail page_

![Cart Page](assets/screenshots/user/cart-page.png)
_Shopping cart_

![Wishlist Page](assets/screenshots/user/wishlist-page.png)
_Saved wishlist_

![Checkout Page](assets/screenshots/user/checkout-page.png)
_Checkout with shipping details_

![Account Dashboard](assets/screenshots/user/account-dashboard.png)
_Account dashboard — order tracking, saved address, account details_

![Contact Us](assets/screenshots/user/contact-us.png)
_Contact form_

![About Us](assets/screenshots/user/about-us.png)
_About page_

### Admin Module

![Admin Dashboard](assets/screenshots/admin/dashboard.png)
_Orders, sales, and revenue visualization_

![Admin Profile](assets/screenshots/admin/profile-page.png)
_Admin profile and password management_

![Add Product](assets/screenshots/admin/add-product.png)
_Product creation with full details_

![Shipping Address](assets/screenshots/admin/shipping-address.png)
_Customer shipping address lookup_

---

## 📁 Project Structure

```
CraftSea/
├── craftsea.sql
├── .env.example
├── .gitignore
├── README.md
│
├── User/              (customer storefront)
│   ├── index.php
│   ├── product.php
│   ├── product-detail.php
│   ├── cart.php
│   ├── wishlist.php
│   ├── checkout.php
│   ├── registration.php
│   ├── userdata.php
│   ├── my-account.php
│   ├── contact.php
│   ├── css/ | js/ | img/ | lib/
│
├── admin/             (back-office panel)
│   ├── index.php
│   ├── loginadmin.php
│   ├── addproducts.php
│   ├── editeproduct.php
│   ├── order.php
│   ├── sales-report.php
│   ├── regusers.php
│   ├── css/ | js/ | img/ | lib/
│
└── assets/
    ├── screenshots/
    │   ├── user/
    │   └── admin/
    └── diagrams/
```

---

## 🚀 Getting Started

### Prerequisites

- [XAMPP](https://www.apachefriends.org/) (Apache + MySQL/MariaDB + PHP)

### Setup

1. **Clone the repository into your XAMPP `htdocs` folder:**

```bash
cd C:\xampp\htdocs
git clone https://github.com/Deepak-kumar-4/CraftSea.git
```

2. **Start Apache and MySQL** via the XAMPP Control Panel.

3. **Import the database** — open phpMyAdmin, create a database named `Craftsea`, and import `craftsea.sql`.

4. **(Optional) Configure admin credentials** — copy `.env.example` to `.env` and set `ADMIN_EMAIL` / `ADMIN_PASSWORD`. Note: this project has no dotenv loader, so these must be set as real environment variables (e.g. via Apache's `SetEnv` config) to take effect — otherwise the app falls back to local-dev defaults.

5. **Visit the site:**
   - Storefront: `http://localhost/CraftSea/User/index.php`
   - Admin panel: `http://localhost/CraftSea/admin/loginadmin.php`

### Demo Account

A demo customer account is seeded in the database for testing:

- **Email:** `test@example.com`
- **Password:** `Test1234!`

---

## ⚠️ Known Limitations

- No real payment gateway integration — checkout collects shipping/billing details but doesn't process live payments
- No automated email/SMS notifications for order status changes
- No inventory/stock quantity tracking per product
- No product reviews or ratings system
- No automated test suite (unit/integration tests)

---

## 👤 Author

**Deepak Kumar B**
Full Stack Developer | MCA, St Joseph's University

[GitHub](https://github.com/Deepak-kumar-4) · [LinkedIn](https://linkedin.com/in/deepak-kumar-b-dee412)
