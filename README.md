# Trip Builder - FlightHub

![Screenshot](/screenshots/sample-web.png?raw=true)

![Screenshot](/screenshots/sample-web2.png?raw=true)

## Description

Trip builder is an API, created using the Laravel Framework and PHP, that allows you to find flights for a passenger, based on search criteria.

## Features

- API & Web routing to search for flights or modify content
- Data Validation
- Simple visual website
- Easy to understand API
- Very scalable

## Tools and Languages

- Laravel - PHP framework
- PHP
- Valet - Local development environment for Laravel
- Livewire - full-stack framework for Laravel to build dynamic interfaces
- TailwindCSS - CSS Framework
- TablePlus - Database tool to access the database data and preform queries
- DBngin - To create MySQL database and nginx server
- Postman - To test and see API operations

## Installation

1. Clone this Github repository using HTTPS or SSH
2. 'cd' to the cloned folder
3. Run 'compose install' and 'npm install' to install the necessary packages
4. Create '.env' file in the root folder by copying the contents of the '.env.example' folder found in the repository, or run 'cp .env.example .env'
5. Generate encrpytion key by running 'php artisan key:generate'. This will add a new key in the .env file
6. Create an empty database (SQL)
7. Configure '.env' file to add 'DB_HOST', 'DB_PORT', 'DB_DATABASE', 'DB_USERNAME' and 'DB_PASSWORD' to establish connection with the newly created database.
8. Generate the tables and database architecture using the command 'php artisan migrate'
9. Add the test data using the command 'php artisan db:seed'
10. You can use the command 'php artisan serve' to serve the project in your browser or use another local server.

## Sample Data

- The database is in the normalized 3NF form.
- Laravel's Factory class was used in conjuction with FakerPHP to generate some of the data as a proof of concept

![Screenshot](/screenshots/airlines.png?raw=true)

![Screenshot](/screenshots/airports.png?raw=true)

![Screenshot](/screenshots/flights.png?raw=true)

![Screenshot](/screenshots/data-generator.png?raw=true)

## Sample API Request / Response

[GET] http://trip-builder.test/api/v1/airlines/ -> Returns all the airlines
[GET] http://trip-builder.test/api/v1/airlines/5 -> Returns airline with ID=5
[DEL] http://trip-builder.test/api/v1/airlines/300/delete -> Deletes airline with ID=300

[POST] http://trip-builder.test/api/v1/airlines/ -> Adds a new airline
[PUT] http://trip-builder.test/api/v1/airlines/10/edit -> Edits & Updates airline with ID=10 with new values

```
{
    "iata": "AC",
    "name": "Air Canada Test"
}
```

The same oprations can also be done with:
http://trip-builder.test/api/v1/[INPUT]
by replacing the [INPUT] field with the following

- 'airlines'
- 'airports'
- 'citycodes'
- 'countrycodes'
- 'flights'
- 'regioncodes'
- 'timezones'

**To search for flights:**
[POST] http://trip-builder.test/api/v1/findflight
Example body:

```
{
    "departure_airport": "YUL",
    "arrival_airport": "YVR",
    "trip_type": "round-trip"
}
```

![Screenshot](/screenshots/postman.png?raw=true)
