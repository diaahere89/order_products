# Order Management System

This **Order Management System** project is built using **Laravel**, and **ReactJS**. It allows you to manage orders, products, and stock levels.
<br>
Concurrent requests are handled by Database Transactions with Row Locking.
<br>
The API is versioned, current version is: V1.0.0. <br>
Order requests are managed by certain Stock Validation Rules for CreateOrder and UpdateOrder. <br>
Authorization is achieved by OrderPolicy. <br>
PUT: Request validated by ReplaceOrderRequest, <br>
PATCH: Request validated by UpdateOrderRequest, <br>
POST: Request validated by CreateOrderRequest, all inheriting from BaseOrderRequest.
<br>
GET: Orders are filtered by OrderFilter and QueryFilter. <br>
ex. using Postman or whatever: http://localhost:2202/api/v1/orders?filter[name]=*ordername*&filter[status]=P,C
<br>
This will filter the orders by name and status in Pending or Cancelled.
<br>
<br>
Response and payload is designed in the Resourse/Collection of each model according to the API endpoints.



---

## Table of Contents

1. [Features](#features)
2. [Technologies Used](#technologies-used)
3. [Prerequisites](#prerequisites)
4. [Setup Instructions](#setup-instructions)
   - [Backend Setup](#backend-setup)
   - [Frontend Setup](#frontend-setup)
5. [Running the Project](#running-the-project)
   - [Backend](#backend)
   - [Frontend](#frontend)
6. [Running Tests](#running-tests)
7. [API Documentation](#api-documentation)
8. [Troubleshooting](#troubleshooting)
9. [Contributing](#contributing)
10. [License](#license)

---

## Features

- **Order Management**: Create, read, update, and delete orders.
- **Product Management**: Manage products and track stock levels.
- **Stock Validation**: Prevent orders from exceeding available stock.
- **Authentication**: Secure API endpoints using Laravel Sanctum.
- **React Frontend**: A user-friendly interface for managing orders and viewing products.

---

## Technologies Used

- **Backend**:
  - Laravel Sail (Dockerized Laravel environment)
  - Laravel Sanctum (API authentication)
  - MySQL (Database)
  - PHPUnit (Testing)

- **Frontend**:
  - React (User interface)
  - Vite (Build tool)
  - Axios (HTTP client)

- **Other Tools**:
  - Composer (PHP dependency management)
  - npm (JavaScript dependency management)
  - Docker (Containerization)

---

## Prerequisites

Before you begin, ensure you have the following installed:

- **Docker**: [Install Docker](https://docs.docker.com/get-docker/)
- **Docker Compose**: [Install Docker Compose](https://docs.docker.com/compose/install/)
- **Node.js**: [Install Node.js](https://nodejs.org/)
- **Composer**: [Install Composer](https://getcomposer.org/)

---

## Setup Instructions

### Backend Setup

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/diaahere89/order_products.git
   cd order_products
    ```

2. **Install PHP Dependencies**:
   ```bash
   ./vendor/bin/sail composer install
    ```

3. **Set Up Environment Variables**:
   - Copy the `.env.example` file to `.env`:
    ```bash
    cp .env.example .env
    ```

    - Update the `.env` file with your database credentials and other settings.
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=sail
    DB_PASSWORD=password
    ```

   - Start the Laravel Sail development server in order to run artisan commands:
    ```bash
    ./vendor/bin/sail up
    ```
   - Open a new terminal window and run the following commands:
    - Generate an application key:
    ```bash
    ./vendor/bin/sail artisan key:generate
    ```

    - Run database migrations:
    ```bash
    ./vendor/bin/sail artisan migrate
    ```
    
    - Seed the database with sample data:
    ```bash
    ./vendor/bin/sail artisan db:seed
    ```

    - You can access the database running the following command:
    ```bash
    ./vendor/bin/sail mysql
    ```

    - Then pick a user from the users table, the password is always `password` in lowercase.

### Frontend Setup

1. **Navigate to the Frontend Directory**:
   ```bash
   cd frontend
    ```
2. **Install Node.js Dependencies**:
   ```bash
   npm install
   ```

3. **Set Up Development Environment**:
   - Run the development server:
    ```bash
    npm run dev
    ```
    - The frontend will be accessible at `http://localhost:3020`.

---

## Running the Project
### Backend
   - Start the Laravel Sail development server:
     ```bash
     ./vendor/bin/sail up
     ```

   - Access the backend API at `http://localhost:2202`.

### Frontend
   - Start the Development Server: 
   ```bash
   npm run dev
   ```

   - Access the React frontend at `http://localhost:3020`.

---


## Running Tests
To run the unit tests, use the following command:
```bash
./vendor/bin/sail test
```

---

## API Documentation
<!-- 
The API endpoints are documented using **Postman**. You can access the documentation at:
- **Postman Collection**: [Download Postman Collection](https://documenter.getpostman.com/view/10642536/2sAYXCmKYK) 
-->

### Available Endpoints

#### Orders
- **GET /api/v1/orders**: List all orders.
- **POST /api/v1/orders**: Create a new order.
- **GET /api/v1/orders/{id}**: Get details of a specific order.
- **DELETE /api/v1/orders/{id}**: Delete an order.
- **PUT/PATCH /api/v1/orders/{id}**: Replace/Update an existing order.

#### Products
- **GET /api/v1/products**: List all products.

#### Authentication
- **POST /api/login**: Authenticate a user and retrieve an access token.
- **POST /api/logout**: Revoke the user's access token.
<!-- - **POST /api/register**: Register a new user. -->

---

## Troubleshooting

### Common Issues

1. **Ports Occupied On Your Host Machine**:
   - Check if the ports 2202, 3020 or 3306 are already in use on your host machine.
   - If they are, you can either stop the services occuping those ports or change the ports in the `docker-compose.yml` file.
   - Then, run `docker-compose down && docker-compose up -d` to start the containers with the new ports.

2. **Docker Containers Not Starting**:
   - Ensure Docker is running.
   - Run `docker-compose up` to start the containers manually and see if there are any errors.
   - Run `docker-compose logs` to see the logs of the containers.

3. **Database Connection Issues**:
   - Verify the database credentials in the `.env` file.
   - Ensure the MySQL container is running.

4. **401 Unauthorized Errors**:
   - Ensure the user is authenticated and the correct token is included in API requests.
   - Verify that Laravel Sanctum is properly configured.

5. **Missing `order_product` Table**:
   - Run the migrations to create the `order_product` pivot table:
     ```bash
     ./vendor/bin/sail artisan migrate:fresh --seed
     ```

---

## Contributing

We welcome contributions! Please follow these steps:

1. Fork the repository.
2. Create a new branch: `git checkout -b feature/your-feature-name`.
3. Commit your changes: `git commit -m 'Add some feature'`.
4. Push to the branch: `git push origin feature/your-feature-name`.
5. Submit a pull request.

---

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.