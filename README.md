# CTF

## Docker

```
docker build -t ctf .
docker run -d -p 80:80 ctf
```

Access by `http://localhost`

*Avoid using port 8080 because if you use Burp to intercept request, the port 8080 will bind for interception*

## Source Code

- [source folder](src)
- [Docker file](Dockerfile)
- [docker compose](docker-compose.yml)
- [Solution](solution.md)
- [meta](meta.yml)
- [write up](writeup.md)