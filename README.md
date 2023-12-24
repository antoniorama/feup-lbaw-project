# lbaw23114 - *Community Connect*

**Community Connect** is a web-based information system that allows users to share questions and get answers on various topics, with the aim of providing answers to common problems in an environment of mutual support.

## Set up

O comando para iniciar a imagem disponível no *GitLab Container Registry* (usando a base de dados de produção) é o seguinte:
```bash
docker run -it -p 8000:80 --name=lbaw23114 -e DB_DATABASE="lbaw23114" -e DB_SCHEMA="lbaw23114" -e DB_USERNAME="lbaw23114" -e DB_PASSWORD="ypBZFVzH" git.fe.up.pt:5050/lbaw/lbaw2324/lbaw23114
```

## URL

***Community Connect*** is available at: https://lbaw23114.lbaw.fe.up.pt.

## Credentials

The credentials for accessing ***Community Connect*** are shown in the table below.

| Type | Username | Email | Password |
| ---- | -------- | ----- | -------- |
| Authenticated User | user | user@email.com | CCpassword |
| Moderator | johnmod | johnmod@gmail.com | CCpassword |
| Administrator | admin | admin@email.com | Lbaw23114 |

## Team

* António Henrique Martins Azevedo, up202108689@up.pt
* António Marujo Rama, up202108801@up.pt
* Manuel Ramos Leite Carvalho Neto, up202108744@up.pt
* Matilde Isabel da Silva Simões, up202108782@up.pt
