# Zend framework API CRUD

This simple project was generated to learn the framework

## Authors

* **Gilberto Prudêncio Vaz de Moraes** - *Initial work* - [MoraesGil](https://github.com/Moraesgil)

## License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details


## Installation  
run command to create sqlite fresh database with 3 simple inserts

```
php data/load_db.php   
```
them run this command to start server

```
composer serve
```

## You can executing Rest APIs using CURL

```
product List
	$ curl -v -X GET http://127.0.0.1:8080/api/product

Adding Product
	$ curl -d "name=uva&description=purple fruit" -v -X POST http://127.0.0.1:8080/api/product

Product Details
	$ curl -v -X GET http://127.0.0.1:8080/api/product/1

Update Product
	$ curl -d "name=uva edited&description=big purple fruit " -v -X PUT http://127.0.0.1:8080/api/product/4

Delete Product
	$ curl -v -X DELETE http://127.0.0.1:8080/api/product/4
```
