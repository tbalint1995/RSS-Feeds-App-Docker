#!/bin/bash
while :
do
    echo "Waiting..."
    sleep 60
    echo "Refresh channels."
    php artisan refresh-all-channels
    echo "Done."
done
