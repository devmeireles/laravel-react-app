- [Building and executing](#Building-and-executing)
- [Importing Data](#Importing-Data)
- [Developing](#developing)
- [REST API](#Rest-API)


## Building and executing

Building and executing the API Server:

```
docker-compose up --build
```

Installing dependencies

```
docker-compose exec -it app composer install
```

Generating application key

```
docker-compose exec -it app php artisan key:generate
```

Migrating data

```
docker-compose exec -it app php artisan migrate
```

## Importing Data
With CLI is possible to import hotel data on application database, so make sure to have a hotels.csv file on project root, then execute:

```
cp ../hotels.csv ./hotels.csv && docker-compose exec -it app php artisan import:hotels hotels.csv
```

## Developing
Throughout the development process you can add Swagger resources on API structure, so after that make sure run the L5 Swagger compiler to generate the proper json schema, so you can execute:

```
docker-compose exec -it app php artisan l5-swagger:generate
```

## Rest API
Swagger provides a convenient way to explore and test the REST API. Access the Swagger documentation at [your-api-url]/api/documentation to view available endpoints and interact with them.