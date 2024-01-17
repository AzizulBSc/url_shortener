# Project Setup Guide

Follow these steps to set up the project:

1. Run cmd in root directory:

   ```bash
   composer install
   ```
2. Copy the `.env.example` file to create a new `.env` file:

   ```bash
   cp .env.example .env
   ```

3. Generate the application key:

   ```bash
   php artisan key:generate
   ```

4. Run database migrations & Seedeer:

   ```bash
   php artisan migrate:refresh --seed
   ```

5. Start the development server:

   ```bash
   php artisan serve
   ```


## User Credentials for Login

Use the following credentials for login in:

- **Name:** User One
- **Email:** user1@email.com
- **Password:** 12345678

- **Name:** User Two
- **Email:** user2@email.com
- **Password:** 12345678


## API details
api collection available in root directory(Url_Shortner.postman_collection.json) where contain login api and url shortener api
````
