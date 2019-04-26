#!/usr/bin/env bash
set -e

# reset
wp --allow-root db reset

for i in *.sql; do
    wp --allow-root db import "$i"

    # only run the first .sql file
    break
done

read -p "Enter the URL of the site most used in the backup. This will be like http://thesite.gov.uk - don't include a forward slash: " IMPORTED_SERVER_NAME

echo "The URL entered was: $IMPORTED_SERVER_NAME"
echo "To be replaced with: $WP_HOME"

read -p "OK to continue? [y/n] " CAN_CONTINUE

if [[ "$CAN_CONTINUE" =~ "y" ]]; then
	wp --allow-root search-replace "$IMPORTED_SERVER_NAME" "http://$WP_HOME/" --recurse-objects --skip-columns=guid --skip-tables=wp_users

	NO_PROTOCOL_IMPORTED_NAME=${IMPORTED_SERVER_NAME/https\:\/\//""}

	echo "NEW SEARCH..."
	echo "URL to find: $NO_PROTOCOL_IMPORTED_NAME"
    echo "To be replaced with: $VIRTUAL_HOST"

    read -p "OK to continue? [y/n] " CAN_CONTINUE_2

    if [[ "$CAN_CONTINUE_2" =~ "y" ]]; then
	    wp --allow-root search-replace "$NO_PROTOCOL_IMPORTED_NAME" "$VIRTUAL_HOST" --recurse-objects --skip-columns=guid --skip-tables=wp_users
	else
	    echo "The operation was aborted"
    fi
else
	echo "The operation was aborted"
fi
