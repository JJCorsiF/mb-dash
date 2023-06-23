# MB-Dash

Your go-to place to get the most of visualizing your data.

## Setting up the workspace

### Install PHP

-   Installing php depends on your OS. You can learn more on [https://www.php.net/downloads](https://www.php.net/downloads) or [https://www.php.net/git.php](https://www.php.net/git.php).

### Install Composer

-   Follow the instructions on [https://getcomposer.org/download/](https://getcomposer.org/download/).

### Install MySQL

On Windows machines, go to [https://dev.mysql.com/downloads/installer/](https://dev.mysql.com/downloads/installer/), click ‘Download’ and follow the installer instructions. On Ubuntu, you can install by typing `sudo apt install mysql-server` in the terminal before configuring the root database user.

### Open a MySQL shell

```bash
sudo mysql
```

or if you configured the **root** account password: `mysql -u root -p`

### Create the databases needed:

```sql
CREATE DATABASE mb_dash;
CREATE DATABASE mb_dash_tests;
use mb_dash;
```

### Create a new MySQL user

```sql
CREATE USER 'mb-dash-app'@'localhost' IDENTIFIED BY '#AsTr0nGSeCrEt.D0NtTeLlAnYoNe';
```

### Grant enough permissions to the databases we just created

```sql
GRANT ALL PRIVILEGES ON mb_dash.* TO 'mb-dash-app'@'localhost';
GRANT ALL PRIVILEGES ON mb_dash_tests.* TO 'mb-dash-app'@'localhost';
```

## Installing dependencies

### Install app dependencies:

```bash
composer install
```

### Ensure frontend dependencies are installed as well:

```bash
yarn install
```

or

```bash
npm install
```

## Setting up the app to use the created database

### Rename the .env.example to .env and update it with your database settings:

```
(...)

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mb_dash
DB_USERNAME=mb-dash-app
DB_PASSWORD='#AsTr0nGSeCrEt.D0NtTeLlAnYoNe'

(...)
```

### Duplicate the .env file, call it .env.testing and update it with your test database settings:

```
(...)

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mb_dash_tests
DB_USERNAME=mb-dash-app
DB_PASSWORD='#AsTr0nGSeCrEt.D0NtTeLlAnYoNe'

(...)
```

### Apply migrations to the database:

```bash
php artisan migrate
```

### Seed the database with **mock data**

```bash
php artisan db:seed
```

---

### To run the tests:

```bash
php artisan test --coverage
```

### To run the application:

```bash
php artisan serve
```

#### When app is running, use these credentials:

> email: admin@mbdash.com
>
> password: #KeEpItSeCr3t
