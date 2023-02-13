FROM ubuntu
EXPOSE 80
ENV DEBIAN_FRONTEND=noninteractive
RUN apt update && apt install -y apache2 php php-mysql
ENTRYPOINT apache2ctl -D FOREGROUND
