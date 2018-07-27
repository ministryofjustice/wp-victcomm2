#!/bin/bash
set -e

###
# Build Script
# Use this script to build theme assets,
# and perform any other build-time tasks.
##

# Install PHP dependencies (WordPress, plugins, etc.)
composer install

# Build theme assets here
cd web/app/themes/victcomm2
composer install
npm install
npm run-script build:production

cd ../../../../
