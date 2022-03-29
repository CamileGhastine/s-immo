#!/bin/sh
docker run \
  -e MERCURE_PUBLISHER_JWT_KEY='!ChangeMe!' \
  -e MERCURE_SUBSCRIBER_JWT_KEY='!ChangeMe!' \
  -e CORS_ALLOWED_ORIGINS='http://localhost:3000' \
  -e ALLOW_ANONYMOUS=1 \
  -e MERCURE_EXTRA_DIRECTIVES='auto_https off' \
  -p 81:80 \
  dunglas/mercure caddy run -config /etc/caddy/Caddyfile.dev