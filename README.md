# Intro
As in the interview, my company uses Laravel. So, I built a simple api web application using Laravel + Vuejs.

# Environment
Laravel 7 + VueJS: vuex, vuetify,...

# Install 
1. Clone repo 
2. Change to directory
3. Install dependencies
     ````
     composer install
   ````
4. Copy .env file
    ````
    cp .env.example .env
    ````

5. Create database
    - Config database info in .env file

6. Generate application key:
    ````
    php artisan key:generate
    ````
7. Migrate
    ````
    php artisan migrate
   ````
8. Run seeder
    ````
    php artisan db:seed
   ````
9. Generate secret key jwt 
    ````
    php artisan jwt:generate
   ````

10. Install Node modules
    ````
    npm install
    ````
11. Run client 
    ````
    npm run watch
    ````
12. Run server
    ````
    php artisan serv
    ````
13. Access:  http://127.0.0.1:8000    

    Login with account: alliedtechbase@gmail.com/123456789
