# Web Development Project

This is a Symfony-based web application featuring API Platform for RESTful APIs, JWT authentication, and entity management for Events, Users, and Venues.

## Features

- User registration and login with JWT authentication
- CRUD operations for Events, Venues, and Users
- API endpoints powered by API Platform
- Doctrine ORM for database management
- Twig templates for frontend views
- Asset management with Asset Mapper

## Requirements

- PHP 8.2 or higher
- Composer
- Docker (for containerized setup)
- Node.js and npm (for frontend assets)

## Installation

1. Clone the repository:
   ```
   git clone <https://github.com/OyanibTech-iii/webdev_Api-activity.git>
   cd web-development-2-b-OyanibTech-iii
   ```

2. Install PHP dependencies:
   ```
   composer install
   ```

3. Install JavaScript dependencies:
   ```
   npm install
   ```

4. Set up the database:
   ```
   php bin/console doctrine:database:create
   php bin/console doctrine:migrations:migrate
   php bin/console doctrine:fixtures:load
   ```

5. Build assets:
   ```
   npm run build
   ```

6. Start the development server:
   ```
   php bin/console cache:clear
   symfony server:start
   ```

## Usage

- Access the application at `http://localhost:8000`
- API documentation available at `http://localhost:8000/api/docs`
- Admin dashboard at `http://localhost:8000/dashboard`

## Testing

Run the test suite with:
```
php bin/phpunit
```

## Configuration

Configuration files are located in the `config/` directory. Key files include:
- `security.yaml`: Security configuration
- `doctrine.yaml`: Database configuration
- `api_platform.yaml`: API Platform settings

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Run tests
5. Submit a pull request

## License

This project is licensed under the MIT License.