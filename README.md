Steps to run this project:
    1. Clone project using this command "git clone origin <branch> https://github.com/vitus121289/livewire-crud-app.git".
    2. Run "composer update".
    3. Create a .env file (You may also create a copy of the .env.example and rename it to .env).
    4. Generate APP_KEY using this command "php artisan key:generate".
    5. Launch sail with this command "./vendor/bin/sail up".
    6. Migrate database using this command "sail artisan migrate".
    7. Install npm on docker container using this command "sail npm install && npm run build".
    8. Project is now up and running. Access this project on the browser of your choice through localhost.