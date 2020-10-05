SQLServer to Elasticsearch sample
====

It is sample program.

## Dependencies
- SQLServer
- Elasticsearch
- Kibana
- Logstash

## Install
### Build and Run.
```bash
docker-compose up -d
```
### Prepare Data.
```sql
CREATE DATABASE search;
```
```bash
docker-compose exec app sh
php artisan db:seed
```
