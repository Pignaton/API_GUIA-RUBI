[![N|Solid](http://guiaperus.tk/media/places/unnemad.png)](https://nodesource.com/products/nsolid)

# Guia Perus API

[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)

A API é a principal maneira como aplicativos e serviços interagem com o Guiaa Perus. Ele fornece acesso extensivo aos dados sobre lojas individuais de Perus e permite que você adicione seus próprios recursos à experiência do usuário no Aplicativo.

### Requerimento

* PHP >= 7.2

Verifique a implantação navegando para o endereço do servidor no seu navegador preferido.

Base Endpoint da URL para consumir serviços usando HTTP.
```sh
http://guiaperus.tk/api/
```

#### Endpoints

| Method | URL |
| ------ | ------ |
| POST | [/api/place/create] |
```sh
Cria uma ordem
```
| Method | URL |
| ------ | ------ |
| GET | /api/place/list |

```sh
Recupera toda alista de pedidos
```
| Method | URL |
| ------ | ------ |
| GET | /api/search |
```sh
Recupera uma lista de pedidos
```
| Method | URL |
| ------ | ------ |
| GET | /api/info/list |
```sh
Recupera uma lista de noticias
```
| Method | URL |
| ------ | ------ |
| GET | /api/category |
```sh
Recupera uma lista por categoria
```

[//]: # (Ainda está em desenvolvimento)

   [dill]: <https://github.com/joemccann/dillinger>

   [PlGa]: <https://github.com/RahulHP/dillinger/blob/master/plugins/googleanalytics/README.md>
