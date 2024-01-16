## Laravel API Demo

This is a small backend API using Laravel that consumes the public API [PokeAPI](https://pokeapi.co/), extracts data
relative to
1st generation Pokémon and transforms them to fit a relational database (SQLite to make it simpler).

Then it offers an API to the front-end where you can use the data for other purposes.

## Test it

Set the environment file

```
mv .env.example .env
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

Pull the data from the PokeAPI and create a testing user (test@mail.com) (password test)

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

### Pokemon list

It will return a list of all first generation Pokémon with its name, Pokédex ID, image and types. It also provides a
parameter for filtering by Pokédex ID.

```
GET /api/pokemon?pokedex=121
```

```
{
    "data": [
        {
            "id": "4c2bce04-a3e4-443b-b478-3d29c293b04e",
            "pokedex": 121,
            "name": "Starmie",
            "image": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/121.png",
            "types": [
                {
                    "id": "49edee0e-70bb-4c3e-83b0-617c7e50d940",
                    "name": "Water"
                },
                {
                    "id": "75637aac-cbca-4228-bee4-6e31d4fc15cd",
                    "name": "Psychic"
                }
            ]
        }
    ]
}
```

### Pokémon types

It will return a list of all Pokémon types

```
GET /api/types
```

```
{
    "data": [
        {
            "id": "3677d87f-97cd-4356-b021-ed7798c3c72e",
            "name": "Normal"
        },
        {
            "id": "010efc25-d1e5-40f8-b5ba-8dcd229c7443",
            "name": "Fighting"
        },
        {
            "id": "a47dce0e-48be-4576-b747-6a03f24bb7dc",
            "name": "Flying"
        },
        {
            "id": "e3101dfc-ac7d-4b99-97a9-3d0fe9f04c79",
            "name": "Poison"
        },
        {
            "id": "87ac97c2-7f7f-4b23-ba69-5707c7783e89",
            "name": "Ground"
        },
        {
            "id": "fd084be8-0d9f-43c3-b790-3332be532acd",
            "name": "Rock"
        },
        {
            "id": "8ce1df6f-1903-42aa-9b3b-2b8bc1f870e8",
            "name": "Bug"
        },
        {
            "id": "363f0a31-f585-4028-9984-857a84695384",
            "name": "Ghost"
        },
        {
            "id": "2c7d9e98-22bb-444f-bdb1-be0f8e22a0ad",
            "name": "Steel"
        },
        {
            "id": "1a2ef5f7-5887-4b9c-8de2-8b3a7ff1ca8d",
            "name": "Fire"
        },
        {
            "id": "49edee0e-70bb-4c3e-83b0-617c7e50d940",
            "name": "Water"
        },
        {
            "id": "fccc775f-8f03-43d4-8829-06ccd001938c",
            "name": "Grass"
        },
        {
            "id": "064b1c3c-83d0-4a2a-aed5-2c9f4b3e6dd0",
            "name": "Electric"
        },
        {
            "id": "75637aac-cbca-4228-bee4-6e31d4fc15cd",
            "name": "Psychic"
        },
        {
            "id": "83ad03a5-4878-4f90-a3ea-d4b5793312f0",
            "name": "Ice"
        },
        {
            "id": "1dc3ffd5-3141-4bec-b9b9-f87e2de1806c",
            "name": "Dragon"
        },
        {
            "id": "959f9569-2795-4741-968a-ea885803ecb8",
            "name": "Dark"
        },
        {
            "id": "95ed7b46-916c-48b1-8116-dc657ed3e4d1",
            "name": "Fairy"
        }
    ]
}
```
