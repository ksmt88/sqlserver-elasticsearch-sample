FROM docker.elastic.co/logstash/logstash:7.9.2

RUN rm -f /usr/share/logstash/pipeline/logstash.conf

COPY ./docker/logstash/config /usr/share/logstash/config
COPY ./docker/logstash/pipeline /usr/share/logstash/pipeline

USER root

COPY --chown=logstash:root ./docker/logstash/mssql-jdbc-8.4.1.jre11.jar /usr/share/logstash/logstash-core/lib/jars/mssql-jdbc-8.4.1.jre11.jar

RUN logstash-plugin install logstash-integration-jdbc
