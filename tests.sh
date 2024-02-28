#!/bin/bash

docker compose run --rm php composer phpcs
docker compose run --rm php composer test
docker compose run --rm php composer phpcs:fix
docker compose run --rm php composer phpstan
