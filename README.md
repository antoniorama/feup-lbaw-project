# Community Connect - Collaborative Q&A

The goal of this project is the development of a web-based information system that allows users to share questions and get answers on various topics, with the aim of providing answers to common problems in an environment of mutual support. We used **Laravel framework** and **PostgreSQL**.

<img width="1438" alt="image" src="https://github.com/antoniorama/feup-lbaw-project/assets/96125703/8dece9c9-f8cc-4ec9-b5b0-9232a1ba8125">

<img width="1429" alt="image" src="https://github.com/antoniorama/feup-lbaw-project/assets/96125703/a7eb6297-963b-460d-99fe-7d98af7fd727">

<img width="1438" alt="image" src="https://github.com/antoniorama/feup-lbaw-project/assets/96125703/4c85dbc7-030c-4797-9875-e84cea0b44c6">

## Set up

The command to start the image available on the *GitLab Container Registry* (using the production database) is as follows:
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
