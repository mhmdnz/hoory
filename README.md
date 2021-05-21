# Hoory

The Application is wrriten on Laravel, if you are not familier with the environment please check the link below:

[Laravel Installation](https://laravel.com/docs/8.x/installation)

# For The Interviewer

- [For The Interviewer](#Instalation-and-test)

# Installation Guid

## Manualy
  - [Clone project from Git repository](https://github.com/mhmdnz/hoory.git)
  - [Edit ENV file](#Edit-env-File)
  - [Install Composer Packages](#Install-Composer-Packages)
  - [Run DB migrations](#Run-DB-migrations)
  - [Run Tests](#Run-Tests)
  
## Docker
- [Docker](#Docker-Installation-Guid)

### For The Interviewer
> you will be able to run the program by just run the docker and run the preparation file (explained on docker section)<br>
> so if you dont have enough time to read all the readme file skip them and jum to "Docker Installation Guid" section
> I have used following technologies and services :
> - breeze (for the authentication and admin dashboard)
> - socialite (to communicate with google and facebook oAuth)
> - mailtrap (to send email verification forget-password and ...)
> 
> I put all my accounts data in .env.example and you will use them automatically, but in order to change them you will need
> - Google Client_id, Secret
> - Facebook Client_id, Secret
> - Mailtrap Username, Password
>
> To Check Mailtrap by my account you have to use following email for the app register you need to keep in mind without verification you wont be able to see the dashboard
> - f25137d641-dd1607@inbox.mailtrap.io
> - then you need to ask me to send you the verification email (as only I have to access to that email account)
>


### Clone project From Git

```sh
$ mkdir hoory
$ cd hoory
$ git clone "https://github.com/mhmdnz/hoory.git" .
```

### Edit env File

To run laravel applications you have to define your system configuration for the laravel in .env file

```sh
$ mv .env.example .env
$ vim .env
```

### Install Composer Packages

```sh
$ composer install
```

### Run DB migrations

> Do not forget to create your database and give it to the .env file or you will get and Error<br>
> - If you got any error you could simply use <strong>fresh</strong> parameter<br>
> - Or if you are not familier with laravel migrations just drop and create your database again
```sh
//Create database example
//login to mysql console then use below command
$ mysql -u{enter user name here} -p{enter password here}
$ Create Database hoory
```
```sh
$ php artisan migrate --seed
```

### Run Tests

Because of the time I just wrote some tests as an example (so the project doesnt cover all the sections)
```sh
//you could run all the tests by running below command in the project root
$ phpunit
//or 
$ ./vendor/bin/phpunit
```

```sh
//you could run only one test by using this command
$ phpunit /address of the test
```

# Docker Installation Guid

  - [Clone project from Git repository](https://github.com/mhmdnz/hoory.git)
  - [Run Prepration File](#Run-Prepration-File)
  
```sh
//it will bring project up
$ docker-compose up --build -d
$ docker exec -it php sh /tmp/Prepration.sh
```
> Check the result : localhost:8080

> I seed user table with a test user (just run the docker "exec -it php sh /tmp/Prepration.sh" command) for the quick test So you could login to system
> With following email and password :
```
Email : test@test.com
Password : password
```
## Some helpful commands

```sh
//to Run Tests
$ docker exec -it php sh /tmp/RunTests.sh

//to get fresh migration
$ docker exec -it php sh /tmp/FreshMigrations.sh

//to run composer install
$ docker exec -it php sh /tmp/ComposerInstall.sh
```
