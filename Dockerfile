# production, sealed off container

FROM ubuntu
ENV DEBIAN_FRONTEND=noninteractive
ENV APACHE_RUN_USER=www-data APACHE_RUN_GROUP=www-data APACHE_LOG_DIR=/var/log/apache2 APACHE_LOCK_DIR=/var/lock/apache2 APACHE_PID_FILE=/var/run/apache2.pid
ENV TZ=America/New_York
# timezone: https://serverfault.com/a/683651/456938
RUN apt-get update && \
  apt-get -qq -y install apt-utils git tzdata apache2 php libapache2-mod-php php-mcrypt php-mysql curl && \
  ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
COPY . /var/www/html/
WORKDIR /var/www/html/
RUN curl -sL https://github.com/EnvironmentalDashboard/calendar/archive/master.tar.gz | tar xz && mv calendar-master calendar && \
curl -sL https://github.com/EnvironmentalDashboard/buildingnavigation/archive/master.tar.gz | tar xz && mv buildingnavigation-master buildingnavigation && \
curl -sL https://github.com/EnvironmentalDashboard/chart/archive/master.tar.gz | tar xz && mv chart-master chart && \
curl -sL https://github.com/EnvironmentalDashboard/GoogleDriveAPI/archive/master.tar.gz | tar xz && mv GoogleDriveAPI-master GoogleDriveAPI && \
curl -sL https://github.com/EnvironmentalDashboard/search/archive/master.tar.gz | tar xz && mv search-master search && \
curl -sL https://github.com/EnvironmentalDashboard/includes/archive/master.tar.gz | tar xz && mv includes-master includes && \
curl -sL https://github.com/EnvironmentalDashboard/citywide-dashboard/archive/master.tar.gz | tar xz && mv citywide-dashboard-master citywide-dashboard && \
curl -sL https://github.com/EnvironmentalDashboard/prefs/archive/master.tar.gz | tar xz && mv prefs-master prefs && \
curl -sL https://github.com/EnvironmentalDashboard/gauges/archive/master.tar.gz | tar xz && mv gauges-master gauges
EXPOSE 80
CMD /usr/sbin/apache2ctl -D FOREGROUND
# to run:
# docker build -t prod-site .
# docker run -dit -p 80:80 --name environmentaldashboard.org prod-site
