#!/bin/sh
set -e

# Set default port to 80 if PORT environment variable is not provided by Vercel
PORT="${PORT:-80}"

# Substitute PORT_PLACEHOLDER in Nginx configuration with actual $PORT
sed -i "s/PORT_PLACEHOLDER/${PORT}/g" /etc/nginx/http.d/default.conf

# Execute supervisord in foreground
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
