<h1 align='center'>Brain Games</h1>

### Hexlet tests and linter status:

[![Actions Status](https://github.com/XXMargoRitaXX/php-project-45/actions/workflows/hexlet-check.yml/badge.svg)](https://github.com/XXMargoRitaXX/php-project-45/actions)
[![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=XXMargoRitaXX_php-project-45&metric=alert_status)](https://sonarcloud.io/summary/new_code?id=XXMargoRitaXX_php-project-45)
[![Bugs](https://sonarcloud.io/api/project_badges/measure?project=XXMargoRitaXX_php-project-45&metric=bugs)](https://sonarcloud.io/summary/new_code?id=XXMargoRitaXX_php-project-45)
[![Code Smells](https://sonarcloud.io/api/project_badges/measure?project=XXMargoRitaXX_php-project-45&metric=code_smells)](https://sonarcloud.io/summary/new_code?id=XXMargoRitaXX_php-project-45)
[![Duplicated Lines (%)](https://sonarcloud.io/api/project_badges/measure?project=XXMargoRitaXX_php-project-45&metric=duplicated_lines_density)](https://sonarcloud.io/summary/new_code?id=XXMargoRitaXX_php-project-45)

### Description:

"Brain Games" is a collection of five console games based on popular mobile brain training apps. Each game asks questions that require correct answers. After three correct answers, the game is completed. Incorrect answers end the game and require a repeat playthrough. Games:
* ```make brain-even``` - Identifying an even number (<a href="https://asciinema.org/a/6KR0hHjspNunvLa9" target="_blank">Demo</a>)
* ```make brain-calc``` - Calculator. Arithmetic expressions to be calculated (<a href="https://asciinema.org/a/wsofxVkFKPKGRWMw" target="_blank">Demo</a>)
* ```make brain-gcd``` - Identifying the greatest common divisor (<a href="https://asciinema.org/a/9lYOuMrfXXkqVKED" target="_blank">Demo</a>)
* ```make brain-progression``` - Progression. Finding missing numbers in a sequence (<a href="https://asciinema.org/a/y7BmITm2Y3M4v2YC" target="_blank">Demo</a>)
* ```make brain-prime``` - Identifying a prime number (<a href="https://asciinema.org/a/DqwMaFdgW8TQG4zE" target="_blank">Demo</a>)

 ### Requirements:

 * Linux, macOS, WSL
 * Git
 * PHP >= 8.3.0
 * Composer
 * Make
 
 ### Installation:

 1. Cloning the repository

```sh
 git clone https://github.com/XXMargoRitaXX/php-project-45.git
```

2. Changing to the php-project-45 directory

```sh
 cd php-project-45
```

3. Installing dependencies

```sh
 make install
```

4. Checking functionality (greeting only)

```sh
 make brain-games
```