# 🚀 Laravel eCommerce Application

# Overview

This project is a full-featured eCommerce web application built using Laravel, PHP, and MySQL. The application enables users to browse products, manage shopping carts, securely complete purchases through Stripe Payment Gateway, and view order details. The project follows Laravel's MVC architecture and implements industry-standard development practices including authentication, middleware, Eloquent ORM relationships, form validation, and secure payment processing.

The goal of this project was to gain hands-on experience in developing a real-world eCommerce platform while implementing core Laravel concepts and third-party payment integration.
## 🛠️ Requirements
* PHP 8.x
* Laravel 11
* MySQL
## 💻 Database Relationships

# User
* One User can have multiple Cart Items
* One User can place multiple Orders

# Product
* One Product can belong to multiple Cart Items
* One Product can appear in multiple Orders

# Cart
* Belongs to User
* Belongs to Product

# Order
* Belongs to User
* Contains multiple Order Items

## 💻 Project Architecture

# Models
* User
* Product
* Cart
* Order
* Orderitem

# Controllers
* ProductController
* CartController
* OrderController
* CheckoutController

# Views
* Product Listing
* Product Detail Page
* Cart Page
* Checkout Page
* Order Success Page

# Key Laravel Concepts Implemented
* MVC Architecture
* Authentication & Authorization
* Middleware
* Route Groups
* Eloquent ORM Relationships
* Database Migrations
* Form Request Validation
* Pagination
* File Uploads
* Payment Integration
* Session Management

 # Learning Outcomes

Through this project, I gained practical experience in:

* Building scalable Laravel applications
* Designing relational database schemas
* Implementing authentication and authorization
* Integrating third-party APIs and payment gateways
* Working with Eloquent ORM relationships
* Managing shopping cart and order workflows
* Following Laravel best practices and clean code principles


