####Testing the REST API

curl -X GET http://localhost/CIL/index.php/CIL_REST_API/image/1/test_type

curl -X POST  -d "My data is here" http://localhost/CIL/index.php/CIL_REST_API/image/1

curl -X PUT  -d "My data is here" http://localhost/CIL/index.php/CIL_REST_API/image/1

curl -X DELETE   http://localhost/CIL/index.php/CIL_REST_API/image/1


#####Testing authentication API

DoPost method:  curl -X POST http://localhost/CIL/index.php/CIL_REST_API/user_key_auth --data '{"key":"32C7D1D31D817734B421CC346EE65"}'
