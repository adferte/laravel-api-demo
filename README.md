## Laravel API Demo

This is a small backend API using Laravel that consumes the public API [PokeAPI](https://pokeapi.co/), extracts data from 1st generation Pokémon and transforms them to fit a relational database (SQLite to make it simpler).

Then it offers an API to the front-end where you can use the data for other purposes.

It uses DDD and implements a small version of CQRS pattern. It also includes tests for the use cases.

## Test it

Set the environment file

```
cp .env.example .env
```

Install composer dependencies

```
composer install
```

Generate an app key

```
php artisan key:generate
```

Regenerate all database tables

```
php artisan migrate:fresh
```

Command to pull the data from PokeAPI (it may take a minute or two) and create a testing user (test@mail.com) (password test)

```
php artisan pokeapi:get
```

Run a local server to test it out

```
php artisan serve
```

## Endpoints

In Postman, or a similar software, you can try the next endpoints:

### Login

It will return an API token to use for the next endpoints or a validation error. You need to send the token as a Bearer
token in the next API call to make sure you are authorized.

```
POST /api/login
{
    'email': 'test@mail.com',
    'password': 'test',
}
```

```
1|zg2VEW2odlJgB0xynmexCBTMjPq5neHV4V8ihnOd
```

### Current user info

Info about the user currently logged in

```
GET /api/user/me
```

```
{
    "id": "8935c1cb-ce85-46dd-8fdf-0b81fa5aa480",
    "name": "NmEAahhY4zBBbuZR",
    "email": "test@mail.com"
}
```

### Create new users

Endpoint to create a new user providing a name, email and password

```
POST /api/user
{
    "name": "Pepe Perez",
    "email": "pepeperez@pepemail.com"
    "password": "PepePassword123!!",
}
```

```
Result:
{
    "id": "8935c1cb-ce85-46dd-8fdf-0b81fa5aa480",
    "name": "Pepe Perez",
    "email": "pepeperez@pepemail.com"
}
```

### Pokemon info

Endpoint to search a Pokémon by its Pokédex number

```
GET /api/pokemon?pokedex=121
```

```
{
    "id": "1aab0121-a578-446b-a36e-4d4fc0751af8",
    "pokedex": 121,
    "name": "Starmie",
    "image": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/121.png",
    "types": [
        {
            "id": "7289e14c-2a68-448d-9409-ed4b2599ea9b",
            "name": "Water"
        },
        {
            "id": "01119535-38aa-4089-8a84-999d3b213eb7",
            "name": "Psychic"
        }
    ]
}
```

### Pokémon types

It will return a list of all Pokémon types

```
GET /api/type
```

```
[
    {
        "id": "01c3b70c-b6b5-4185-b0fb-b5aceea2234d",
        "name": "Normal"
    },
    {
        "id": "d8207e7a-9d5c-4943-957a-48794a760557",
        "name": "Fighting"
    },
    {
        "id": "b6b5e599-a3ee-4eb5-a10e-a5f6a081f13c",
        "name": "Flying"
    },
    ...
]
```
