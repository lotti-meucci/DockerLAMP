FROM ubuntu
EXPOSE 3306
ENV DEBIAN_FRONTEND=noninteractive
RUN apt update && apt install -y mariadb-server
RUN mkdir /run/mysqld
RUN sed -Ei 's/^(bind-address|log)/#&/' /etc/mysql/my.cnf
ENTRYPOINT mysql_install_db && mysqld --user=root
