این پروزه یک پروزه کوچک برای مدیریت پروژه ها و تسکهای ان است


## Prerequisites

- PHP >= 8.2
- Composer
- MySQL
- Node.js & npm 

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/username/project-name.git
    ```

2. Navigate to the project directory:
    ```bash
    cd project-name
    ```

3. Install dependencies:
    ```bash
    composer install
    npm install
    ```

4. Set up the environment variables:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

5. Configure your `.env` file with the correct database credentials:
    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

6. Run migrations and seed the database:
    ```bash
    php artisan migrate --seed
    ```

7. Start the development server:
    ```bash
    php artisan serve
    npm run dev
    ```

## Login with test  user:
   - get to http://127.0.0.1:8000/login url
   - enter this email and password:

    email: test@example.com
    password: password

## click on projects link on top navigator


## api Endpoint for get projects list with tasks :
    - http://127.0.0.1:8000/api/project

## License

This project is licensed under the MIT License.

## Acknowledgements

- Special thanks to [Laravel](https://laravel.com/) for the framework.
