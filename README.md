## Install app

- ``git clone https://github.com/karataserkan/laravel-quiz.git``
- ``cd laravel-quiz``
- ``mv .env.example .env``
- Create mysql database named and configure ``.env`` file
``DB_CONNECTION=mysql``
``DB_HOST=127.0.0.1``
``DB_PORT=3306``
``DB_DATABASE=``
``DB_USERNAME=``
``DB_PASSWORD=``
- ``composer install``
- ``php artisan migrate``
- ``php artisan key:generate``
- ``npm install``
- ``npm run watch``
- open new terminal and run ``php artisan serve``
