FROM ubuntu
EXPOSE 80
ENV DEBIAN_FRONTEND=noninteractive
RUN apt update
RUN apt install -y apache2 php
ENTRYPOINT apache2ctl -D FOREGROUND
