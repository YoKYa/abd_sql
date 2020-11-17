# Blog CodeIgniter
### by Yogi Eka Prastiya (18050623013)

#### Yang dibutuhkan 
1. Download dan Install Git
2. XAMPP (MySQL) pastikan mysql aktif

## Cara Pakai
1. Buka CMD
2. ketik "cd C:\xampp\htdocs\" (bisa direktori yang lain)
3. ketik "git clone https://github.com/YoKYa/abd_sql.git" (Tunggu sampai selesai)
4. Copy Paste file "env", lalu rename dengan ".env"
5. buka file .env dengan aplikasi editor dan cari 

#### '# database.default.hostname = localhost'
#### '# database.default.database = ci4'
#### '# database.default.username = root'
#### '# database.default.password = root'
#### '# database.default.DBDriver = MySQLi'

#### hapus tanda pagar dan atur sesuai database kalian

6. Buka cmd dan ketik "cd C:\xampp\htdocs\abd_sql\app\ThirdParty"
7. ketik "git clone https://github.com/lonnieezell/myth-auth.git" (Tunggu sampai selesai)
8. Buka di aplikasi editor file di direktori ini
C:\xampp\htdocs\abd_sql\app\ThirdParty\myth-auth\src\config\Auth.php
Cari : 

#### public $requireActivation = .... 
dan ganti
#### public $requireActivation false 

#### public $allowRemembering = false;
dan ganti
### public $allowRemembering = true;

9. buka cmd ketik "cd C:\xampp\htdocs\abd_sql\"
10. ketik lagi "php spark migrate"
11. jika tidak ada error maka bisa ketik "php spark serve"

=========================================================
# CodeIgniter 4 Framework

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible, and secure. 
More information can be found at the [official site](http://codeigniter.com).

This repository holds the distributable version of the framework,
including the user guide. It has been built from the 
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [the announcement](http://forum.codeigniter.com/thread-62615.html) on the forums.

The user guide corresponding to this version of the framework can be found
[here](https://codeigniter4.github.io/userguide/). 


## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!
The user guide updating and deployment is a bit awkward at the moment, but we are working on it!

## Repository Management

We use Github issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script. 
Problems with it can be raised on our forum, or as issues in the main repository.

## Contributing

We welcome contributions from the community.

Please read the [*Contributing to CodeIgniter*](https://github.com/codeigniter4/CodeIgniter4/blob/develop/contributing.md) section in the development repository.

## Server Requirements

PHP version 7.2 or higher is required, with the following extensions installed: 

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
