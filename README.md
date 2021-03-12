## Simple Docker Compose for Local Environment
### PHP application with Apache2, MySQL and PHPMyAdmin

Project structure:
```
.
├── docker-compose.yaml
├── app
    ├── Dockerfile
    └── index.php
```

[_docker-compose.yaml_](docker-compose.yaml)
```
services:
  web:
    build: app
    container_name: php-webserver
    ports: 
      - '80:80'
    volumes:
      - ./app:/var/www/html/
    depends_on:
      - localdb
    networks: 
      - webserver
	...
	...
```

## Deploy with docker-compose

```
$ docker-compose up -d
Creating network "ws_network" with the default driver
Building web
failed to get console mode for stdout: The handle is invalid.
[+] Building 0.1s (7/7) FINISHED
 => [internal] load build definition from Dockerfile                       0.0s
 => => transferring dockerfile: 221B                                       0.0s
...
...
Successfully built 5f9998a13e99...
...
Creating mysql ... done
Creating pma           ... done
Creating php-webserver ... done

```

## Expected result

Listing containers must show one container running and the port mapping as below:
```
$ docker container ls
CONTAINER ID   IMAGE            COMMAND                  CREATED              STATUS              PORTS                               NAMES
21fb4cdbd933   apache-php_web   "docker-php-entrypoi…"   About a minute ago   Up About a minute   0.0.0.0:80->80/tcp                  php-webserver
7ecbc8acdeee   phpmyadmin       "/docker-entrypoint.…"   About a minute ago   Up About a minute   0.0.0.0:8080->80/tcp                pma
756c89e4e745   mysql            "docker-entrypoint.s…"   About a minute ago   Up About a minute   0.0.0.0:3306->3306/tcp, 33060/tcp   mysql
```

After the application starts, navigate to `http://localhost:80` in your web browser or run:
```
$ curl localhost
Hello World!
Database Connected successfully
```

Stop and remove the containers
```
$  docker-compose down
Stopping php-webserver ... done
Stopping pma           ... done
Stopping mysql         ... done
Removing php-webserver ... done
Removing pma           ... done
Removing mysql         ... done
Removing network ws_network
```
