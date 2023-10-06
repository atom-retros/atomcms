# Testing schema

This schema is made, so we can run tests without worrying about the database from outside (i.e. Arcturus Morningstar db).

This file (`testing-schema.sql`) needs to be generated again when the database is updated. It is currently generated from https://github.com/ObjectRetros/arcturus-ms-3-5-base-db/blob/23ae66bc2b67a3504d6e3c2e01a4e54f48b7daa4/arcturus-3-5-base-db.sql

To generate the contents of the file, I've used this tool: https://github.com/dumblob/mysql2sqlite.
I downloaded the file (`mysql2sqlite`) in the root of this project and ran it like so 
```bash
.\mysql2sqlite my_mysql_sql_file.sql > database/schema/testing-schema.sql
```

To make it work with laravel migrations, we need to add this as the first table it creates, after `BEGIN TRANSACTION;` if that exists in the generated sql file.
```sqlite
CREATE TABLE `migrations`
(
    `id`        integer      NOT NULL PRIMARY KEY AUTOINCREMENT,
    `migration` varchar(255) NOT NULL,
    `batch`     integer      NOT NULL
);
```
