# 466Assignment

## Design
This folder hold both the raw and presentation versions of both the ER diagram and the schema.

## SQL Scripts
Here are two seperate scripts, one to regenerate the schema and another to insert the data into the database

## Site
Each page and helper files are in here. Simply open `index.html` to use the site.
All sites are in `.html` files and link to each other. `index.html` is simply a starting page with links. `admin.html` has buttons that will rebuild the database. `user.html` is a page that lets the user search and add songs to the dj queue. `dj.html` lets the dj choose a song and play it. To lower the amount of page reloads, `utils.js` adds a function that allows an ajax like action to make a specialized call to `executor.php`(which interacts with the database) and inserts anything returned into an element of our choice. `helpers.php` handles database login.

# Database Authentication
There needs to be a user supplied `Site/cred.php` file which simply defines `$name`(database username), `$pass`(database password), `$dbname`(database to use). Without it, interacting with the database is impossible.

# Guide
Here is a basic guide to add and play a song.
- [Link to website](https://students.cs.niu.edu/~z1963771/466Assignment/Site/index.html)
- Head over to the user `Request Songs` or `I'm a user` tab
- click on login in the top right and choose a user
- query for a song/artist/band in the field (all get search at once)
- click on the chosen row
- click on the chosen song file version
- choose a price, 0 for free
- go to the dj interface
- select the chosen song to play and click the `play` button
