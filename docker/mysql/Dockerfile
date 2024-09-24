FROM mysql:latest

ENV MYSQL_USER user
ENV MYSQL_PASSWORD password
ENV MYSQL_ROOT_PASSWORD password

COPY ./init.sql /docker-entrypoint.d/ 
