# SweetBoy News

## Configuration and Installation

Clone the repository and make a copy of the **.env.example** file and save it as **.env**

### Configuration

Open **.env** file and set the values for the following variables

-   DB_DATABASE=
-   DB_USERNAME=
-   DB_PASSWORD=

### Software Requirements

-   PHP 7.4 or above
-   MySQL
-   NodeJS
-   Composer

### Installation

Open terminal or command prompt in the directory of the project and run the following commands.

1. composer install
2. php artisan key:generate
3. npm install

### Migrate Tables

-   php artisan migrate

### Seed Posts

-   php artisan db:seed

### Start Application

Open terminal in the project's directory and run the following commands.

1. npm run dev
2. php artisan serve
