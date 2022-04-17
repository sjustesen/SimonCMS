#!/bin/bash

echo running server localhost on port 8080...
php -S localhost:8080 -t server/public &

echo Starting Yarn watcher
cd ./client/simoncms_client/
yarn watch &

cd ../../
