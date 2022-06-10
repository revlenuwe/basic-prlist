
# Simple products list



## Run locally

Clone

```bash
  git clone https://github.com/revlenuwe/basic-prlist.git
  cd basic-prlist
```
Install dependencies & build

```bash
  composer install
  npm install & npm run build
```
    
Setup database connection (import the `basic-prlist.sql` beforehand)

``` php
// bootstrap/database.php

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',

    'database' => 'DATABASE',
    'username' => 'USERNAME',
    'password' => 'PASSWORD',

    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
]);

```
Run server
```bash
  php -S localhost:8000
```

Authorization - use test account or register
```bash
  username: tester
  password: tester111
```

## Author

- [@revlenuwe](https://www.github.com/revlenuwe)
