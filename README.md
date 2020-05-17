# CodeIgniter - Email registry application test

## About this project

This application was built using PHP, Rest operations, Javascript (using jQuery), CSS, HTML and a database connection (initially using MySql) in order to show the knowledges that I own in these technologies and also for the purposes of studying the CodeIgniter 4 framework.

This project was my first contact with CodeIgniter, and what I can say about this framework is that it have a lot of similarities with Laravel (at least this version 4 of CI). Some of this similarities are:

- Organization
- Routing config
- Model strucuture

So, it was easier to learn and build an application with it.

---

## Config

After download the project, go to the root project folder and execute the following command to download all necessary libs:

    composer install

## Installation

To install this application, it is necessary to configure some parameters in "env" file and then execute the migration command. See it in the next steps.

## env file configuration

### reCaptcha keys:

To make recaptcha works, it is necessary to add on env these two parameters:

    RECAPTCHA_SECRET_KEY = <<your_secret_key>>
    RECAPTCHA_SITE_KEY = <<public_site_key>>

### E-mail validation

The email validation was built using Kickbox API, therefore, to make it works the following parameters should be assigned:

    validatemail.KICKBOX.key = <<your_kickbox_key>>
    validatemail.KICKBOX.ACCEPTANCE_LEVEL = <<0|1|2|3>>

The parameter ACCEPTANCE_LEVEL defines what kind of response will be accepted from e-mail validation API when the evaluation is performed. Regarding the assigned value, the following behaviors are assigned:
- 1: DELIVERABLE or UNKNOWN responses are acceptables 
- 2: DELIVERABLE or RISKY responses are acceptables 
- 3: only DELIVERABLE response is acceptable
- 0 (or any other value that is not related above): it will assumes that DELIVERABLE, UNKNOWN or RISKY responses are acceptables

### Database configuration

As an example, below there are the parameters that are necessary to be defined to make a mysql connection:

    database.default.hostname = <<db_host>>
    database.default.database = <<db_name>>
    database.default.username = <<username>>
    database.default.password = <<passwd>>
    database.default.DBDriver = MySQLi
    database.default.port     = 3306

## Migration

> This operation can be performed only after setting the parameters to a valid database connection.

Run the following script on the project root folder:

    php spark migrate

Two tables should be created on the defined database:

- email
- migrations

## Runnning the application

On a development enviroment, it is possible to run the application using the following command:

    php spark serve

It will create an execution instance of application (generally in localhost:8080).

Otherwise, it is necessary to configure a virtualhost to the project folder "public".

# Some external libs used

- [google recaptcha v1.2](https://github.com/google/recaptcha)
- [bootstrap v4.5.0](https://getbootstrap.com/docs/4.5/getting-started/introduction)
- [Fontawesome v4.7.0](https://fontawesome.com/v4.7.0/)
- [JQuery v3.5.1](https://github.com/jquery/jquery/tree/3.x-stable)
- [Popper.js v1.16.0](https://github.com/popperjs/popper-core/tree/v1.x)