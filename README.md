# Laravel Task

## Small Description
A small admin panel + API using the Laravel framework

- database - MySQL
- Tables:
- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pages (title, short description, full description)
- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Categories (title, picture, short description, full description)
- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Products (name,category id, picture, short description, full description)

Email and password to access the admin panel
- email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;admin123@gmail.com
- password &nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;admin123

Ordinary email and password to check 
- email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;admin123@gmail.com
- password &nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;admin123

API for categories and products

- Requests:
1) Get all categories: GET /api/categories
2) Get one category: GET /api/categories/1
3) Create a category: POST /api/categories
4) Edit category: PUT /api/categories/1
5) Get all products: GET /api/products
6) Get one product: GET /api/products/1
7) Delete a category: DELETE /api/categories/1


## Installation
Step-by-step instructions on how to get the development environment running.

```bash
# Clone the repository
git clone https://github.com/Shakhzod0307/Task-Laravel.git

# Navigate to the project directory
cd yourproject

# Install dependencies
composer install

# Copy the example env file and make the required configuration changes
cp .env.example .env

# Generate an application key
php artisan key:generate

# Run the migrations
php artisan migrate
