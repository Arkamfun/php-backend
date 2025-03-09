
# PHP Backend

This project was created as a form of test results made by HNI (Halal Network International) whose test content is to create CRUD using node.JS /HP.




## Authors

- [@arkamfun](https://github.com/Arkamfun)


## API Reference

#### Get all users

```http
  GET http://localhost/php-backend/api/user.php
```



| Parameter | Type     | Description                | result |
| :-------- | :------- | :------------------------- | :------------------ |
|  |  |  | array(user)|

#### Get user by id

```http
  GET http://localhost/php-backend/api/user.php/{$id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. Id of item to fetch |

#### delete user by id

```http
  DELETE http://localhost/php-backend/api/user.php/{$id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. Id of item to fetch |

#### create user

```http
  POST http://localhost/php-backend/api/user.php
```

| Body | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `name`     | `string` | **Required** |
| `email`     | `string` | **Required** |
| `role`     | `enum(admin, user)` | **Required** |
| `password`     | `string` | **Required** |



#### login

```http
  POST http://localhost/php-backend/api/auth.php
```

| Body | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `email`     | `string` | **Required** |
| `password`     | `string` | **Required** |


