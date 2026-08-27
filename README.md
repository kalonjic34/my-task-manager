# My Task Manager

A simple task management web application built with **Laravel**. The application allows users to create, view, edit, complete, and delete tasks through a clean and responsive interface.

This project was built as a practical Laravel project to learn and demonstrate core concepts such as **routing, Blade templates, Eloquent ORM, form validation, migrations, CRUD operations, and database integration**.

## Features

* Create new tasks
* View a list of tasks
* View individual task details
* Edit existing tasks
* Mark tasks as completed or incomplete
* Delete tasks
* Form validation with helpful error messages
* Pagination for task lists
* Success notifications after actions
* Responsive user interface
* SQLite database support

## Tech Stack

* **PHP 8.3+**
* **Laravel 13**
* **SQLite**
* **Blade**
* **Eloquent ORM**
* **Tailwind CSS**
* **Alpine.js**
* **Vite**
* **Composer**
* **npm**

The project requires PHP `^8.3` and Laravel `^13.17`.

## Application Overview

The application is centered around a `Task` model. Each task contains:

* Title
* Short description
* Detailed description
* Completion status
* Created timestamp
* Updated timestamp

The database migration defines the task table with these fields and sets newly created tasks to incomplete by default.

## CRUD Functionality

### Create

Users can create a task by providing:

* Task name
* Brief description
* Detailed description

The application validates the submitted data before creating the task in the database.

### Read

The application provides:

* A paginated task overview
* Individual task detail pages

Tasks on the overview page are ordered by the most recently created.

### Update

Existing tasks can be edited through the task edit page. The same validation rules are applied when updating a task.

### Complete / Incomplete

Tasks can be toggled between completed and incomplete. The `Task` model contains a `toggleComplete()` method that changes the completion state and saves the updated model.

### Delete

Tasks can be permanently deleted from their individual task page.

## Validation

Task submissions are handled through a dedicated `TaskRequest` form request.

The current validation rules require:

* `title` — required, maximum 255 characters
* `description` — required
* `long_description` — required

## Project Structure

```text
my-task-manager/
├── app/
│   ├── Http/
│   │   └── Requests/
│   │       └── TaskRequest.php
│   ├── Models/
│   │   └── Task.php
│   └── Providers/
│
├── bootstrap/
│
├── config/
│
├── database/
│   ├── factories/
│   ├── migrations/
│   │   └── 2026_08_22_121823_create_tasks_table.php
│   └── seeders/
│
├── public/
│
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php
│       ├── create.blade.php
│       ├── edit.blade.php
│       ├── form.blade.php
│       ├── index.blade.php
│       └── show.blade.php
│
├── routes/
│   └── web.php
│
├── storage/
├── tests/
├── .env.example
├── artisan
├── composer.json
├── package.json
└── vite.config.js
```

## Routes

The application uses Laravel web routes for task management.

| Method | Route                          | Purpose                      |
| ------ | ------------------------------ | ---------------------------- |
| GET    | `/`                            | Redirects to the task list   |
| GET    | `/tasks`                       | Display all tasks            |
| GET    | `/tasks/create`                | Display the create task form |
| POST   | `/tasks`                       | Create a task                |
| GET    | `/tasks/{task}`                | Display a task               |
| GET    | `/tasks/{task}/edit`           | Display the edit form        |
| PUT    | `/tasks/{task}`                | Update a task                |
| DELETE | `/tasks/{task}`                | Delete a task                |
| PUT    | `/task/{task}/toggle-complete` | Toggle completion status     |

These routes use Laravel's route model binding for individual tasks.

## Getting Started

### Prerequisites

Make sure you have the following installed:

* PHP 8.3 or higher
* Composer
* Node.js and npm
* SQLite

### 1. Clone the repository

```bash
git clone https://github.com/kalonjic34/my-task-manager.git
cd my-task-manager
```

### 2. Install PHP dependencies

```bash
composer install
```

### 3. Create the environment file

```bash
cp .env.example .env
```

On Windows Command Prompt, you can use:

```cmd
copy .env.example .env
```

The project is configured to use SQLite by default.

### 4. Generate the application key

```bash
php artisan key:generate
```

### 5. Create the SQLite database

If `database/database.sqlite` does not already exist, create an empty file:

```bash
touch database/database.sqlite
```

On Windows Command Prompt:

```cmd
type nul > database\database.sqlite
```

### 6. Run migrations

```bash
php artisan migrate
```

This creates the application's database tables, including the `tasks` table.

### 7. Install frontend dependencies

```bash
npm install
```

### 8. Start the development server

In one terminal:

```bash
php artisan serve
```

Then open:

```text
http://127.0.0.1:8000
```

For frontend asset development, run:

```bash
npm run dev
```

## Alternative Setup

The repository's Composer configuration also includes a setup script that can automate the initial installation process:

```bash
composer run setup
```

The script installs PHP dependencies, creates the environment file if necessary, generates the application key, runs migrations, installs npm dependencies, and builds the frontend assets.

## UI

The application uses Blade templates for its interface, with Tailwind CSS utility classes for styling and Alpine.js for small interactive elements such as dismissible success notifications.

The interface includes:

* Task overview
* Task creation form
* Task editing form
* Individual task pages
* Completion status indicators
* Success notifications
* Pagination

## What I Learned

Building this project provided practical experience with several Laravel concepts:

* Laravel project structure
* Routing
* Route model binding
* Blade templating
* Layouts and reusable views
* Eloquent models
* Mass assignment
* Form requests
* Validation
* Database migrations
* SQLite
* CRUD operations
* HTTP methods
* CSRF protection
* Pagination
* Flash session messages
* Tailwind CSS
* Alpine.js
* Vite

## Future Improvements

Potential improvements for future versions include:

* User authentication
* User-specific tasks
* Task priorities
* Task categories
* Due dates
* Search and filtering
* Task sorting
* Better automated test coverage
* API endpoints
* MySQL/PostgreSQL support
* Improved UI and accessibility
* Deployment to a production environment

## License

This project is intended as a learning and portfolio project.

---

**Built with Laravel, PHP, Blade, Eloquent, SQLite, Tailwind CSS, and Alpine.js.**
