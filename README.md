## School Project Manager

This school project manager (SPM) can:

-   Create project.
-   auto-initalize groups (using event in API).
-   add students to groups.
-   Visit live only laravel-blade and public (link: https://www.dotask.eu) [demo](https://dotask.eu).
-   Also API and front-end solution (link: https://www.plexas.lt) [demo](https://plexas.lt).
-   Bonus requirements fulfilled.

Using Node 16.13.1 and Laravel 9.14.0

## Features

-   For design used TailwindCSS
-   Responsive design
-   For design used TailwindCSS
-   Maximum 30 groups per project
-   Maximum 100 students per project
-   Validations for inputs
-   Updating projects page every 10 seconds
-   Custom command for creating database (make sure to have working connection in .env file): php artisan mysql:createdb dbnamehere
-   Database migrations ready to be migrated after creating database: php artisan migrate
-   For front-end: Vue.js

## Future plans

-   Implementing OAuth to secure API
-   Making HttpOnly cookie token in front-end
-   Project edit feature
-   Group remove feature
-   Forgot password feature
-   Remember me feature

### Installation (Composer)(Windows)(XAMPP)(Node)

-   Download Nodejs from https://nodejs.org/en/ [Nodejs](https://nodejs.org/en/) "Recommended For Most Users"

-   Download XAMPP from https://www.apachefriends.org/index.html [XAMPP](https://www.apachefriends.org/index.html)
-   Edit Environment Variables to use PHP commands:
    Start by typing in Environment Variables in your Search and click on the Edit the system environment variables result.
    In the System Properties window click Environment Variables. Make sure that you’re on the Advanced tab.
    Scroll down to the Path variable and click Edit.
    Click on the Browse button.
    Navigate to C:/xampp/php and click OK.
    You will now see the path to php inside the window. Click OK to exit.
    Restart your Command Prompt window if it’s open and type in: php -v
    You should see the PHP version being displayed.

-   Download Composer from (Windows installer) https://getcomposer.org/download/ [Composer](https://getcomposer.org/download/)

-   Clone this GitHub repo cd into project and run: composer install
-   After that run: npm install
-   Now create .env file and copy everything from .env.example to .env file
-   Generate app encryption key by typing: php artisan key:generate
-   Make sure to have correct credentials in .env file for database
-   Run custom command to create database: php artisan mysql:createdb projects_school
-   Migrate database by typing: php artisan migrate
-   Now you can run: php artisan serve
-   Everything should be working :)

-   For Vue.js front-end: cd front-vue
-   Now: npm install
-   After that run: npm run serve
