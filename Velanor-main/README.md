# Velanor API Documentation 🚀

## Introduction 📝
Velanor API is a project aimed at providing a robust and flexible API for use in web and mobile applications. The project aims to provide a set of services that can be used to create powerful and flexible applications.

## Features 🌟

- ✅ Robust and flexible API that can be used in web and mobile applications
- ⚡ Set of services that can be used to create powerful and flexible applications
- 🖥️ Full support for PHP language
- 🚀 Built with Laravel framework
- 💾 Full support for MySQL database
- 🔒 Security features to ensure data protection
- 📩 Ability to receive email notifications

## Idea 💡
Developed a RESTful API with Laravel to allow users to send anonymous or identified messages. The system includes a follow feature enabling users to track others' activities. Additionally, integrated email notifications to inform users about new messages, enhancing user engagement and communication within the platform.

## Project Structure 📂
The project consists of a set of files and folders created using the Laravel framework. The project contains files that represent the API and the services provided.

### Files and Folders 📁

- `app/Http/Resources` - API resources
- `app/Http/Controllers` - API controllers
- `config` - General project settings
- `public` - Public-facing files
- `resources/views` - User interface views
- `routes` - API route definitions

## Database 🗄️
The project uses MySQL as the database management system to store and manage API data.

### Configuration ⚙️
Update the `config/database.php` file with your MySQL database credentials:

```php
'mysql' => [
    'driver' => 'mysql',
    'host' => env('DB_HOST', '127.0.0.1'),
    'port' => env('DB_PORT', '3306'),
    'database' => env('DB_DATABASE', 'velanor_api'),
    'username' => env('DB_USERNAME', 'root'),
    'password' => env('DB_PASSWORD', ''),
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix' => '',
    'strict' => false,
    'engine' => null,
],
```

## Email Notifications 📧
The project uses Laravel's Mail system to send email notifications. Configure it in `config/mail.php`:

```php
'mail' => [
    'driver' => env('MAIL_MAILER', 'smtp'),
    'host' => env('MAIL_HOST', 'smtp.gmail.com'),
    'port' => env('MAIL_PORT', 587),
    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Velanor API'),
    ],
    'encryption' => env('MAIL_ENCRYPTION', 'tls'),
    'username' => env('MAIL_USERNAME'),
    'password' => env('MAIL_PASSWORD'),
],
```

## Installation 🛠️
Install the project using the command:

```bash
composer install
```

## Running the Project ▶️
Run the project using:

```bash
php artisan serve
```

# 📌 API Routes Documentation 🚀

## 🔑 **Authentication Routes**  
| Method | Endpoint | Controller | Action |
|--------|---------|------------|--------|
| **POST** | `/api/register` | `AuthController` | `register` |
| **POST** | `/api/login` | `AuthController` | `login` |
| **POST** | `/api/logout` | `AuthController` | `logout` |
| **POST** | `/api/email-verification` | `AuthController` | `EmailVerification` |
| **POST** | `/api/resend-email-verification` | `AuthController` | `ResendEmailVerification` |
| **POST** | `/api/forget-password` | `AuthController` | `ForgetPassword` |
| **POST** | `/api/reset-password` | `AuthController` | `ResetPassword` |

---

## 👥 **User & Profile Routes**  
| Method | Endpoint | Controller | Action |
|--------|---------|------------|--------|
| **GET** | `/api/profile` | `UserController` | `show` |
| **PUT** | `/api/update-profile` | `UserController` | `update` |
| **GET** | `/api/users` | `UserController` | `index` |

---

## 🔏 **Privacy Settings**  
| Method | Endpoint | Controller | Action |
|--------|---------|------------|--------|
| **GET** | `/api/privacy-settings` | `UserPrivacySettingController` | `Show` |
| **PUT** | `/api/privacy-settings` | `UserPrivacySettingController` | `Update` |

---

## 💬 **Messages Routes**  
| Method | Endpoint | Controller | Action |
|--------|---------|------------|--------|
| **GET** | `/api/messages` | `MessageController` | `Index` |
| **GET** | `/api/messages/{message}` | `MessageController` | `show` |
| **PUT** | `/api/messages/{message}` | `MessageController` | `Favorite` |
| **DELETE** | `/api/messages/{message}` | `MessageController` | `delete` |
| **POST** | `/api/{username}` | `MessageController` | `store` |

---

## 🤝 **Followers Routes**  
| Method | Endpoint | Controller | Action |
|--------|---------|------------|--------|
| **POST** | `/api/follow/{user}` | `FollowerController` | `Follow` |
| **POST** | `/api/unfollow/{user}` | `FollowerController` | `UnFollow` |
| **GET** | `/api/followers` | `FollowerController` | `index` |

---

## 📄 **Documentation & Misc Routes**  
| Method | Endpoint | Controller | Action |
|--------|---------|------------|--------|
| **GET** | `/docs` | `Scribe` | - |
| **GET** | `/docs.openapi` | `Scribe` | - |
| **GET** | `/docs.postman` | `Scribe` | - |
| **GET** | `/sanctum/csrf-cookie` | `CsrfCookieController` | `show` |
| **GET** | `/storage/{path}` | `storage.local` | - |
| **GET** | `/up` | - | - |

---

### 🎯 **Notes:**
- 🛡️ **Protected routes** may require authentication.
- 🔄 `{username}` and `{message}` are **dynamic parameters**.
📌 **API Documentation:** [http://velanor.com/docs](http://velanor.com/docs)


## Contributing 🤝
Contributions are welcome! Submit a pull request on GitHub.

## License 📜
This project is licensed under the **MIT License**.

## Acknowledgments 🎉
Big thanks to all contributors for their support and contributions! 🙌
