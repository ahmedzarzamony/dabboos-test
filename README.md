# Laravel RESTful CRUD API Task

## Overview
This project is a **RESTful CRUD API** built with **Laravel** as part of a technical assessment. The goal is to demonstrate clean architecture, proper REST principles, validation, authentication, and code organization using **Service & Repository patterns**.

The API manages a single resource (e.g. `Post`) and is protected using **Laravel Sanctum** token-based authentication.

---

## Tech Stack
- PHP 8.2
- Laravel 12
- Laravel Sanctum (API Authentication)
- SQLite (for simplicity in testing)
- Postman (API testing)

---

## Architecture
The project follows a clean layered architecture:

```
Controller  →  Service  →  Repository  →  Model
```

- **Controller**: Handles HTTP requests and responses  
- **Service**: Contains business logic  
- **Repository**: Handles data access and database interaction  
- **Form Requests**: Handle validation  

This ensures separation of concerns, testability, and maintainability.

---

## Authentication
Authentication is implemented using **Laravel Sanctum**.

- A test user is seeded into the database
- Only a **login endpoint** is provided (no registration)

### Test User Credentials
```
Email: test@test.com
Password: password
```

### Login Endpoint
```
POST /api/login
```

Response:
```json
{
  "token": "YOUR_ACCESS_TOKEN"
}
```

Use the token in protected requests:

```
Authorization: Bearer YOUR_ACCESS_TOKEN
Accept: application/json
```

---

## Resource: Posts (CRUD)

### Endpoints
| Method | Endpoint | Description |
|------|--------|------------|
| GET  | /api/posts | List all posts |
| POST | /api/posts | Create a posts |
| PUT  | /api/posts/{id} | Update a posts |
| DELETE | /api/posts/{id} | Delete a posts |

All endpoints are protected by `auth:sanctum`.

---

## Validation Rules
The `name` field accepts **Arabic characters only**, validated on the backend:

```php
regex:/^[\p{Arabic}\s]+$/u
```

---

## Error Handling
Standard HTTP status codes are used:

- 200 OK
- 201 Created
- 401 Unauthorized
- 404 Not Found
- 422 Validation Error

---

## Setup Instructions
```bash
git clone https://github.com/ahmedzarzamony/dabboos-test.git
cd task-api
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```


