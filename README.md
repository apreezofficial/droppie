# **Mini Blog Application** ✍️

## Overview
A full-stack web application for creating and managing blog posts, built with Laravel for robust backend logic and data persistence, and powered by Vite for modern frontend asset compilation and development. Users can register, log in, create, view, and delete their own blog entries.

## Features
*   **User Authentication**: Secure registration, login, and logout functionalities.
*   **Blog Management**: Create, read, and delete personal blog posts.
*   **Database Integration**: Persistent storage for users and blog posts.
*   **Modern Frontend Tooling**: Leverages Vite for a fast and efficient development experience with Tailwind CSS.
*   **Responsive Design**: User interface adapts to various screen sizes.

## Technologies Used
| Category    | Technology        | Description                                                                  | Link                                                 |
| :---------- | :---------------- | :--------------------------------------------------------------------------- | :--------------------------------------------------- |
| **Backend** | Laravel 12.x      | PHP Framework for robust web application development.                        | [laravel.com](https://laravel.com/)                  |
| **Frontend**| Vite 7.x          | Next-generation frontend tooling for fast development.                       | [vitejs.dev](https://vitejs.dev/)                    |
|             | Tailwind CSS      | Utility-first CSS framework for rapid UI development.                        | [tailwindcss.com](https://tailwindcss.com/)          |
| **Database**| SQLite (default)  | Lightweight, file-based database for local development.                      | [sqlite.org](https://www.sqlite.org/)                |
|             | MySQL / PostgreSQL| Production-ready database support.                                           | [mysql.com](https://www.mysql.com/)                  |
| **Language**| PHP 8.2+          | Server-side scripting language.                                              | [php.net](https://www.php.net/)                      |
|             | JavaScript (ES6+) | Frontend scripting language.                                                 | [developer.mozilla.org/en-US/docs/Web/JavaScript](https://developer.mozilla.org/en-US/docs/Web/JavaScript) |

## Getting Started

### Prerequisites
Ensure you have the following installed on your system:
*   PHP 8.2 or higher
*   Composer
*   Node.js (LTS version recommended)
*   npm or Yarn

### Setup Steps
1.  **Clone the repository:**
    ```bash
    git clone https://github.com/your-username/mini-blog.git
    cd mini-blog
    ```
2.  **Install PHP dependencies:**
    ```bash
    composer install
    ```
3.  **Install JavaScript dependencies:**
    ```bash
    npm install
    # OR
    yarn install
    ```
4.  **Copy environment variables:**
    ```bash
    cp .env.example .env
    ```
5.  **Generate application key:**
    ```bash
    php artisan key:generate
    ```
6.  **Create an empty SQLite database file:**
    ```bash
    touch database/database.sqlite
    ```
7.  **Run database migrations:**
    ```bash
    php artisan migrate
    ```
8.  **Start the development server:**
    This command will run both the Laravel backend server and the Vite development server concurrently.
    ```bash
    npm run dev
    # OR
    yarn dev
    ```
    Alternatively, you can run them separately:
    ```bash
    php artisan serve
    npm run vite
    # OR
    yarn vite
    ```

    The application will typically be accessible at `http://localhost:8000`.

### Environment Variables
The application requires the following environment variables to be configured in your `.env` file:

| Variable            | Example Value               | Description                                          |
| :------------------ | :-------------------------- | :--------------------------------------------------- |
| `APP_NAME`          | `Mini Blog`                 | The name of your application.                        |
| `APP_ENV`           | `local`                     | The current application environment (e.g., `local`, `production`). |
| `APP_KEY`           | `base64:YOUR_GENERATED_KEY` | A random, 32-character string for encryption. Generate with `php artisan key:generate`. |
| `APP_DEBUG`         | `true`                      | Enable/disable debug mode. Set to `false` in production. |
| `APP_URL`           | `http://localhost`          | The base URL of your application.                    |
| `DB_CONNECTION`     | `sqlite`                    | Database driver (`sqlite`, `mysql`, `pgsql`, etc.).  |
| `DB_DATABASE`       | `database/database.sqlite`  | Path to SQLite file or database name.                |
| `DB_HOST`           | `127.0.0.1`                 | Database host (for MySQL, PostgreSQL).               |
| `DB_PORT`           | `3306`                      | Database port (for MySQL, PostgreSQL).               |
| `DB_USERNAME`       | `root`                      | Database username (for MySQL, PostgreSQL).           |
| `DB_PASSWORD`       | `null`                      | Database password (for MySQL, PostgreSQL).           |
| `SESSION_DRIVER`    | `database`                  | Session storage driver (e.g., `file`, `cookie`, `database`). |
| `MAIL_MAILER`       | `log`                       | Email driver (`smtp`, `sendmail`, `log`, `array`). |
| `MAIL_FROM_ADDRESS` | `"hello@example.com"`       | Default "From" email address.                        |
| `MAIL_FROM_NAME`    | `"${APP_NAME}"`             | Default "From" name.                                 |

## Application Routes

### Authentication Routes

#### `GET /register`
**Overview**: Displays the user registration form.
**Request**: No direct request payload.
**Response**: Renders `resources/views/auth/register.blade.php`.

#### `POST /register`
**Overview**: Handles user registration.
**Request**:
```json
{
  "name": "string",  // Required: Full name of the user.
  "email": "string", // Required: Unique email address.
  "password": "string", // Required: Minimum 6 characters.
  "password_confirmation": "string" // Required: Must match 'password'.
}
```
**Response**: Redirects to `/dashboard` on successful registration and login.
**Errors**:
- `422 Unprocessable Entity`: Validation errors (e.g., missing fields, invalid email, password mismatch, email already taken).

#### `GET /login`
**Overview**: Displays the user login form.
**Request**: No direct request payload.
**Response**: Renders `resources/views/auth/login.blade.php`.

#### `POST /login`
**Overview**: Handles user login.
**Request**:
```json
{
  "email": "string", // Required: User's email address.
  "password": "string" // Required: User's password.
}
```
**Response**: Redirects to `/dashboard` on successful login.
**Errors**:
- `422 Unprocessable Entity`: Validation errors (e.g., missing fields).
- `302 Redirect` (with errors): Redirects back to login with a session error if credentials are invalid.

#### `GET /logout`
**Overview**: Logs out the currently authenticated user.
**Request**: No direct request payload.
**Response**: Redirects to `/login` after invalidating the session.

### Blog Management Routes (Protected)
All blog management routes require an authenticated user.

#### `GET /dashboard`
**Overview**: Displays the user's personalized dashboard.
**Request**: No direct request payload.
**Response**: Renders `resources/views/dashboard.blade.php`, showing a welcome message and a link to create new posts.

#### `GET /blogs`
**Overview**: Displays a list of all blog posts, sorted by latest.
**Request**: No direct request payload.
**Response**: Renders `resources/views/blogs/index.blade.php` with a collection of `Blog` models.

#### `GET /blogs/create`
**Overview**: Displays the form to create a new blog post.
**Request**: No direct request payload.
**Response**: Renders `resources/views/blogs/create.blade.php`.

#### `POST /blogs`
**Overview**: Stores a new blog post in the database.
**Request**:
```json
{
  "title": "string", // Required: Title of the blog post.
  "body": "string"   // Required: Content of the blog post.
}
```
**Response**: Redirects to `/blogs` (index page) on successful creation.
**Errors**:
- `422 Unprocessable Entity`: Validation errors (e.g., missing title or body).

#### `GET /blogs/{blog}`
**Overview**: Displays a specific blog post.
**Request**: No direct request payload.
**Response**: Renders `resources/views/blogs/show.blade.php` with the specified `Blog` model.

#### `DELETE /blogs/{blog}`
**Overview**: Deletes a specific blog post.
**Request**: No direct request payload.
**Response**: Redirects to `/blogs` (index page) on successful deletion.
**Errors**:
- `404 Not Found`: If the blog post does not exist.

## License
The Mini Blog Application is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Author Info
Developed by a passionate developer. Connect with me!

*   **LinkedIn**: [Your LinkedIn Profile](https://www.linkedin.com/in/your-username)
*   **Twitter**: [@your_twitter](https://twitter.com/your_twitter)

---

### Badges
[![Laravel v12.x](https://img.shields.io/badge/Laravel-v12.x-FF2D20?style=flat-square&logo=laravel&logoColor=white)](https://laravel.com/)
[![PHP 8.2+](https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=flat-square&logo=php&logoColor=white)](https://www.php.net/)
[![Vite 7.x](https://img.shields.io/badge/Vite-7.x-646CFF?style=flat-square&logo=vite&logoColor=white)](https://vitejs.dev/)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind%20CSS-v4.x-06B6D4?style=flat-square&logo=tailwindcss&logoColor=white)](https://tailwindcss.com/)
[![npm](https://img.shields.io/badge/npm-enabled-CB3837?style=flat-square&logo=npm&logoColor=white)](https://www.npmjs.com/)
[![Readme was generated by Dokugen](https://img.shields.io/badge/Readme%20was%20generated%20by-Dokugen-brightgreen)](https://www.npmjs.com/package/dokugen)