FROM ubuntu
EXPOSE 3306
ENV DEBIAN_FRONTEND=noninteractive
RUN apt update
RUN apt install -y mariadb-server
RUN mkdir /run/mysqld
ENTRYPOINT mysqld --user=root
