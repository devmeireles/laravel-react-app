## Overview

The application has two main components:

- **Front-end:** Built with React, the front-end provides an interactive and responsive user interface for customers to browse hotels and make reservations.

- **Back-end:** Powered by Laravel 8 and Postgres, the back-end handles data storage, Rest API requests and CLI to data import

## Technologies Used

### Development

#### Front-end

- **React:** A JavaScript library for building user interfaces.
- **React Router:** Declarative routing for React.js.
- **Tailwind CSS:** A utility-first CSS framework.
- **@tanstack/react-query:** State management library for fetching and caching data.

#### Back-end

- **Laravel:** A PHP web application framework.
- **Postgres:** A relational database management system.
- **L5 Swagger:** A Swagger integration for Laravel.

### DevOps

- **Docker:** A containerization platform for automating application deployment.
- **Docker Compose:** A tool for defining and running multi-container Docker applications.

## Getting Started

To run the application locally, follow these steps:

1. Clone the repository: `git clone [repository-url]`
2. Navigate to the project directory: `cd [cloned-folder]`
3. Build and start the Docker containers: `docker-compose up --build`
4. Install dependencies: `docker-compose exec -it app composer install`
5. Generate the application key: `docker-compose exec -it app php artisan key:generate`
6. Access the application at `http://localhost:5173` for the front-end and `http://localhost:8000` for the back-end.

More details are available on stack documentation

## Deployment

The application can be deployed using Docker Compose or adapted to other hosting services. Detailed deployment instructions will be provided separately.