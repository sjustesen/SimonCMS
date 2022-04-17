#!/bin/bash
PROJECT_ROOT = $(pwd)

echo running server localhost on port 8080...
./server/php -S localhost:8080

echo Starting Yarn watcher
cd ./client/simoncms_client/
yarn watch

cd $PROJECT_ROOT
