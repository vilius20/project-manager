## School Project Manager

This school project manager (SPM) can:

-   Create project.
-   Auto-initalize groups (using event in API).
-   Creating students
-   Delete students
-   Delete projects
-   Add students to groups.
-   Visit live only laravel-blade and public (link: https://www.dotask.eu) [demo](https://dotask.eu).
-   Also API and front-end solution (link: https://www.plexas.lt) [demo](https://plexas.lt).
-   API login/registration
-   Bonus requirements fulfilled.

Using Node 16.13.1 and Laravel 9.14.0

## Features

-   For design used TailwindCSS
-   Responsive design
-   For design used TailwindCSS
-   Maximum 30 groups per project
-   Maximum 100 students per project
-   Validations for inputs
-   Updating projects page every 10 seconds (fron-vue/src/store/index.js uncomment line 54 and 59)
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
-   Start XAMPP services
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

-   Clone this GitHub repo cd into project and run:
-   composer install
-   After that run: npm install
-   Now create .env file and copy everything from .env.example to .env file
-   Generate app encryption key by typing: php artisan key:generate
-   Make sure to have correct credentials in .env file for database
-   Run custom command to create database: php artisan mysql:createdb projects_school (If there is issues create database manualy)
-   Migrate database by typing: php artisan migrate
-   Now you can run: php artisan serve
-   Everything should be working :)

-   For Vue.js front-end: cd front-vue
-   Now: npm install
-   Now create .env file and copy everything from .env.example to .env file
-   Edit API url
-   After that run: npm run serve

### Installation (Composer)(Linux/Ubuntu)(Node)(PHP)(XAMPP)

-   Run following commands:
-   sudo apt-get update
-   sudo apt -y install software-properties-common
-   sudo add-apt-repository ppa:ondrej/php
-   sudo apt-get update
-   sudo apt -y install php8.1
-   php -v

-   Composer installation:
-   sudo apt install php-cli unzip
-   cd ~
-   curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php
-   HASH=`curl -sS https://composer.github.io/installer.sig`
-   php -r "if (hash_file('SHA384', '/tmp/composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
-   sudo php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer
-   Now run: composer

-   Nodejs installation:
-   sudo apt install nodejs
-   sudo apt install npm

-   Download and install XAMPP from https://www.apachefriends.org/download.html [XAMPP](https://www.apachefriends.org/download.html)
-   Run following commands:
-   cd /home/[username]/Downloads
-   chmod 755 [package name]
-   ls -l [package name]
-   sudo ./[package name]
-   After installation run: sudo /opt/lampp/lampp start
-   If getting errors run: sudo apt install net-tools
-   Again try running: sudo /opt/lampp/lampp start

-   Project installation:
-   Clone this GitHub repo cd into project and run:
-   composer install
-   After that run: npm install
-   Now create .env file and copy everything from .env.example to .env file
-   Generate app encryption key by typing: php artisan key:generate
-   Make sure to have correct credentials in .env file for database
-   Run custom command to create database: php artisan mysql:createdb projects_school (If there is issues create database manualy)
-   Migrate database by typing: php artisan migrate
-   Now you can run: php artisan serve
-   Everything should be working :)

-   For Vue.js front-end: cd front-vue
-   Now: npm install
-   Now create .env file and copy everything from .env.example to .env file
-   Edit API url
-   After that run: npm run serve

### Installation (Composer)(MacOS)(Node)(PHP)(XAMPP)

-   Download and install HomeBrew from https://brew.sh/ [HomeBrew](https://brew.sh/)
-   Next run:
-   brew update
-   If you are getting the ‘brew’ command not found error. You have to run two commands to add Homebrew to your PATH:
-   echo 'eval "$(/opt/homebrew/bin/brew shellenv)"'
-   Note: substitute ‘<username>’ to the username of your macOS account: >> /Users/<username>/.zorofile eval "$(/opt/homebrew/bin/brew shellenv)"
-   brew tap shivammathur/php
-   brew install shivammathur/php/php@8.0
-   echo 'export PATH="/opt/homebrew/opt/php@8.0/bin:$PATH"' >> ~/.zshrc
-   echo 'export PATH="/opt/homebrew/opt/php@8.0/sbin:$PATH"' >> ~/.zshrc
-   export LDFLAGS="-L/opt/homebrew/opt/php@8.0/lib"
-   export CPPFLAGS="-I/opt/homebrew/opt/php@8.0/include"
-   php -v

-   Download and install XAMPP from https://www.apachefriends.org/download.html [XAMPP](https://www.apachefriends.org/download.html)
-   Run XAMPP

-   Download and install Composer from https://getcomposer.org/doc/00-intro.md https://getcomposer.org/doc/00-intro.md [Compser](https://getcomposer.org/doc/00-intro.md)

-   Download and install Nodejs from https://nodejs.org/en/download/ [Nodejs](https://nodejs.org/en/download/)

-   Project installation:
-   Clone this GitHub repo cd into project and run:
-   composer install
-   After that run: npm install
-   Now create .env file and copy everything from .env.example to .env file
-   Generate app encryption key by typing: php artisan key:generate
-   Make sure to have correct credentials in .env file for database
-   Run custom command to create database: php artisan mysql:createdb projects_school (If there is issues create database manualy)
-   Migrate database by typing: php artisan migrate
-   Now you can run: php artisan serve
-   Everything should be working :)

-   For Vue.js front-end: cd front-vue
-   Now: npm install
-   Now create .env file and copy everything from .env.example to .env file
-   Edit API url
-   After that run: npm run serve
