FROM mattrayner/lamp:0.8.0-1804-php7

RUN apt-get -y update
RUN apt-get install -y \
    curl \
    gnupg
RUN curl -sL https://deb.nodesource.com/setup_11.x | bash -
RUN apt-get install -y nodejs
RUN npm install npm@latest -g

RUN groupadd -g 1000 centos
RUN usermod -g 1000 -s /bin/bash www-data

CMD ["/run.sh"]

