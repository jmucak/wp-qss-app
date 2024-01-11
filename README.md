# wp-qss-app

# Table of Contents

1. [Features](#features)
2. [Requirements](#requirements)
3. [Installation](#installation)

## Project info/Features

Theme

1. QSS Api client class
2. QSS Api admin menu with login form (if only one user needs to be logged in)
3. QSS Api page template with login form (if multiple users needs to be logged in)
4. single/detail page template for "Movies" CPT => single-movie.php

Plugin (Movies)

1. custom post type "Movie"
2. Meta box for movies CPT with "Movie title" post meta field
3. "Favorite Movie Quote" block in gutenberg

## Requirements

- php v8.0+
- composer v2
- mariadb v10.5+

## Installation

1. Download and install WordPress locally

2. Clone repository inside the `wp-content` folder. (Add “`.`” at the end, so the parent folder is not created)
   - `git clone git@github.com:jmucak/wp-qss-app.git .`
3. Open project in code editor and run `composer install`
4. For Feature Theme 3 you need to create page and assign `QSS App Template` page template