## Argon - Calendar Exam - igmsebastian@gmail.com

### System Specifications

| Requirements | Versions |
| :----------: | :------: |
|   LARAVEL    |   7.x    |
|     PHP      |  ^7.2.5  |
|    MYSQL     |   ^5.7   |

## Configuration

1.  Clone this repository.

    ```bash
        $   git clone https://github.com/igmsebastian/argon-events.git
    ```

2.  Recreate environment variable file.

    ```bash
        $   cp .env.example .env
    ```

    -   To create the environment variable file for testing **_(optional)_**

    ```bash
        $   cp .env .env.testing
    ```

3.  Install composer

    ```bash
        $   composer install
    ```
    > If failing due to Memory Limit Exceeded
    ```bash
        $   COMPOSER_MEMORY_LIMIT=-1 composer install
    ```

4.  Install NPM

    ```bash
        $   npm install && npm run prod
    ```

5.  Generate Application Key

    ```bash
        $   php artisan key:generate
    ```

6.  Execute Database Migration and Seeders

    ```bash
        $   php artisan migrate:fresh --seed
    ```

7.  Execute Swagger API Documentation and access to `{{ROOT}}/api/documentation`

    ```bash
        $   php artisan l5-swagger:generate
    ```

## Development

### Frontend Development

#### Assets

1.  Place your `scss` to this path `resources\sass\...`.

2.  Execute the following command to compile.
    -   One at a time compilation
        ```bash
            $   npm run dev
        ```
    -   Every saving files compilation
        ```bash
            $   npm run watch
        ```
    -   Publishing files compilation
        ```bash
            $   npm run prod
        ```

### Backend Development

1.  Observe Model-View-Controller (MVC) Design Pattern.

2.  Models should store to this path `app\models`.

3.  DB Migration names should starts with [Action]. Make it readable at all times.

    ```
    2014_10_12_000000_create_users_table
    2014_10_12_000000_alter_users_table_add_hobbies_column
    2014_10_12_000000_alter_users_table_remove_motto_column
    2014_10_12_000000_alter_users_table_update_motto_column_to_longText
    2014_10_12_000000_alter_users_table_update_age_column_to_integer
    2014_10_12_000000_alter_users_table_add_sex_default_male
    2014_10_12_000000_alter_users_table_add_index_keys
    2014_10_12_000000_alter_users_table_add_foreign_key_to_tasks_table
    ```

4.  Add comment headers on every functions.

    ```php
        /**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \Closure  $next
         * @param  string|null  $guard
         * @return mixed
         */
        public function handle($request, Closure $next, $guard = null)
        {
            ...
                code goes here ...
            ...

            retrun $next($request);
        }
    ```

## Deployment

| Develop | Staging | Production |
| :-----: | :-----: | :--------: |
| -soon-  | -soon-  |   -soon-   |

### Post Deployment

1.  Execute this for Composer can quickly find the proper file to load for a given class.

    ```php
            $   composer install --optimize-autoloader --no-dev
    ```

2.  Execute this command reduces all of your route registrations into a single method call within a cached file, improving the performance of route registration when registering hundreds of routes.

    ```php
            $   php artisan config:cache
    ```

3.  Execute this command to clear the cache views.

    ```php
            $   php artisan view:cache
    ```

## Branching and Versioning

1.  Snake Case is the naming convention for branching.

    > Make sure the changes are relevant with the codes.

    | Issue Number |          Phrase          |    Expected Branch Name     |
    | :----------: | :----------------------: | :-------------------------: |
    |      1       |    create login page     |    #1_create_login_page     |
    |      2       | create user landing page | #2_create_user_landing_page |

2)  Commit Messages Convention.

    > Make the first sentence is the summary of your commit.

    > Make sure the changes are relevant with the codes.

    ```
    Slight modifications on the users table.
    [add] Condition to fetch user by email
    [delete] Condition to fetch user by name
    [update] Add [hobbies - longText] field in user table
    [enhance] Add Logic that can accept dynamic fields
    ```

## Testing

1. Unit Testing 
   > Execute `php artisan test`


## Screenshots

1. Event Page
<p align="center">
    <img src="https://github.com/igmsebastian/argon-events/blob/feature/add_documentation/storage/screenshots/1.PNG?raw=true" width="800">
</p>

2. Event Page Creation Success
<p align="center">
    <img src="https://github.com/igmsebastian/argon-events/blob/feature/add_documentation/storage/screenshots/2.PNG?raw=true" width="800">
</p>

3. Event Page
<p align="center">
    <img src="https://github.com/igmsebastian/argon-events/blob/feature/add_documentation/storage/screenshots/3.PNG?raw=true" width="800">
</p>
