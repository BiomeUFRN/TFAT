# TFAT - Transcription Factor Analysis Toolkit
Created by Lucas Felipe

## Software Required:

### PHP 7.2 Server
- Recommended: [Apache HTTPD 2.4](https://httpd.apache.org/download.cgi#apache24)
### Database Server: 
- MariaDB 5.5 ([download here](https://downloads.mariadb.org/mariadb/5.5.58/))
### Python 2.7:
- With SciPy package installed

## Configuration

### Edit the information in the 'model/TFATConfig.php' file
```php
$mysqlAddress = "127.0.0.1";
$tfatServerAddress = "127.0.0.1";
$pythonPath = "python"
$mysqlUser = "<insert_username>";
$mysqlUserPasswd = "<insert_password>";
$dbName = "tfat_db";
```

### Create the database
The SQL script 'create_db.sql' creates a database named 'tfat_db' with all the information required for the TFAT server.

## TODO:
Add link to the 'create_db.sql' file.