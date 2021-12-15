FROM node:lts-alpine3.9

COPY ./docker-entrypoint.sh /
RUN chmod u=rwx /docker-entrypoint.sh

WORKDIR /app
ENTRYPOINT ["/docker-entrypoint.sh"]
