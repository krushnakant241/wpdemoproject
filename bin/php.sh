#!/usr/bin/env bash

docker exec -it $(docker-compose ps -q wordpress) /bin/bash

