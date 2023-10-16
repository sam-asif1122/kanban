## Development
Steps to get a working development env:
1. Copy the **.env.example** file and change the value of the environment variables needed
```
$ cp .env.example .env
```
2. Install required packager
```
$ composer install
```
3. Generate the **APP_KEY** variable value
```
$ php artisan key:generate
```
3. Install npm packages
```
$ npm install
```
5. Run the migrations
```
$ php artisan migrate
```
6. Seed the Database
```
$ php artisan db:seed
```