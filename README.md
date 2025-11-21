# Biodata Laravel Application

This is a simple web application built with Laravel to manage personal data.

## Features

-   Create, Read, Update, and Delete (CRUD) personal data entries.
-   Database storage for biodata information.

## Installation

Follow these steps to set up the project locally:

1.  **Clone the repository:**

    ```bash
    git clone https://github.com/abyanmaheswara/biodata-laravel.git
    cd biodata-laravel
    ```

2.  **Install Composer dependencies:**

    ```bash
    composer install
    ```

3.  **Copy the environment file:**

    ```bash
    cp .env.example .env
    ```

4.  **Generate an application key:**

    ```bash
    php artisan key:generate
    ```

5.  **Configure your database:**
    Open the `.env` file and update the database configuration. For SQLite, you can simply ensure the `DB_CONNECTION` is set to `sqlite` and the `DB_DATABASE` points to `database/database.sqlite`. If `database.sqlite` does not exist, create it:

    ```bash
    touch database/database.sqlite
    ```

6.  **Run database migrations and seeders:**

    ```bash
    php artisan migrate --seed
    ```
    This will create the necessary tables and populate them with initial data.

7.  **Install Node.js dependencies (for frontend assets):**

    ```bash
    npm install
    ```

8.  **Compile frontend assets:**

    ```bash
    npm run dev
    ```
    Or for production:
    ```bash
    npm run build
    ```

## Usage

To run the application, start the Laravel development server:

```bash
php artisan serve
```

Then, open your web browser and navigate to `http://127.0.0.1:8000`.

## Contributing

Feel free to contribute to this project by submitting issues or pull requests.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).