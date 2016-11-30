####Testing the REST API

curl -X GET http://localhost/CIL/index.php/CIL_REST_API/image/1/test_type

curl -X POST  -d "My data is here" http://localhost/CIL/index.php/CIL_REST_API/image/1

curl -X PUT  -d "My data is here" http://localhost/CIL/index.php/CIL_REST_API/image/1

curl -X DELETE   http://localhost/CIL/index.php/CIL_REST_API/image/1