This is a project model based in containers that allows debug PHP code using Xdebug

# Configuration
## Docker - PHP Image

```
cd ./form-test
docker build -t ImageName .
docker image ls | grep ImageName
```

## Run Docker Image
```
docker-compose up
```

## Run Docker container in the background
```
docker-compose up -d
```

## When updating the project
```
docker-compose up -d --build
```