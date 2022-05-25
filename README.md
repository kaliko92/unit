# Unit Laravel

git clone https://github.com/kaliko92/unit.git


go to mysql and create database "unit"

write this command in visual code
- php artisan migrate
- php artisan db:seed



# Rest API

# Products

|**Method**| **URL**                        | **Action**                 |
|:--------:|:------------------------------:|:--------------------------:|
|**Get**   |localhos:8000/api/product       | Get all products           |
|**Get**   |localhos:8000/api/product/id    | Get a specific product     |
|**Post**  |localhos:8000/api/product       | Create a new product       |
|**Put**   |localhos:8000/api/product/id    | Update an existing product |
|**Delete**|localhos:8000/api/product/id    | Delete an existing product |

# Units
|**Method**| **URL**                     | **Action**              |
|:--------:|:---------------------------:|:-----------------------:|
|**Get**   |localhos:8000/api/unit       | Get all units           |
|**Get**   |localhos:8000/api/unit/id    | Get a specific unit     |
|**Post**  |localhos:8000/api/unit       | Create a new unit       |
|**Put**   |localhos:8000/api/unit/id    | Update an existing unit |
|**Delete**|localhos:8000/api/unit/id    | Delete an existing unit |

# Stock
|**Method**| **URL**                     | **Action**              |
|:--------:|:---------------------------:|:-----------------------:|
|**Get**   |localhos:8000/api/stock       | Get all stocks           |
|**Get**   |localhos:8000/api/stock/id    | Get a specific stock     |
|**Post**  |localhos:8000/api/stock       | Create a new stock       |
|**Put**   |localhos:8000/api/stock/id    | Update an existing stock |
|**Delete**|localhos:8000/api/stock/id    | Delete an existing stock |

# Functions
|**Method**| **URL**                                                        | **Action**                                 |
|:--------:|:--------------------------------------------------------------:|:------------------------------------------:|
|**Get**   |localhos:8000/api/product/list                                  | Get all product in several units           |
|**Get**   |localhos:8000/api/product/{productId}/unit/{unitId}             | Get a product in specific unit with total  |
|**Get**   |localhos:8000/api/convert/{fromUnitId}/{toUnitId}/{value}       | Unit conversion function                   |

