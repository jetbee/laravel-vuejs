FROM mattrayner/lamp:latest-1804

RUN apt-get -y install sqlite3
RUN groupadd -g 1000 centos
RUN usermod -g 1000 -s /bin/bash www-data

CMD ["/run.sh"]

