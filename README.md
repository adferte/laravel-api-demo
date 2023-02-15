## Laravel API Demo

This is a small web using Laravel that consumes the public API [PokeAPI](https://pokeapi.co/), extracts data relative to
1st generation Pokemon and transforms them to fit a relational database (SQLite to make it simpler).

Then, acting as a backend service, it offers an API to the front-end where you can use the data for other purposes.

About the data, I'm only storing the 1st generation of Pokemon, with their names, 
