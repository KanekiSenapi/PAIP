# Library Management System - LMS
**[LMS-PAIP](https://github.com/KanekiSenapi/PAIP)** is the basic version of management system for library.

## Requirements
- PHP 7.4 and above.
- PostgreSQL 14.2 and above.

## Installation
For local usage you can use prepared docker compose file which contains:
- PHP-FPM
- Nginx
- Postgres

Command: `docker-compose up` in root folder of project.

After that just enter at `http://localhost:8080/`

## Configuration
### Datasource
To configure datasource use file `Config.php`.
```php
const DB_HOST = "postgres"; //Database host
const DB_PORT = "5432"; //Database port
const DB_USER = "paip"; //Database user
const DB_PASSWORD = "paip"; //Database password
const DB_DATABASE = "paip"; //Database name
```

## Database
### Clean
File `database_clean.sql` contains database structure with required data.

### Sample
File `database_dump.sql` contains database structure with sample data.

For both database admin user credentials are:
- `admin@admin.com:admin`

For sample database all credentials are:
- `admin@admin.com:admin` - admin
- `world@gmail.com:admin` - user
- `lag@agmail.pl:admin` - user
- `leg@eg.pl:admin` - user
