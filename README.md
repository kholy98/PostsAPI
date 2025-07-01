## Requirements
Ensure the following tools are installed on your system:
- PHP (>= 8.2)
- Composer
- MySQL
- Node.js (>= 16.x)
- npm (or yarn)




## Installation
Follow these steps to install and run the project locally:

```bash
# Clone the repository
git clone https://github.com/kholy98/PostsAPI.git
cd PostsAPI 
```

# Install PHP dependencies
```bash
composer install
```

# Set up the environment file
```bash
cp .env.example .env
```

# Update the .env file with your database credentials and other settings

# Generate application key
```bash
php artisan key:generate
```

# Run migrations to create necessary tables
```bash
php artisan migrate
```

```bash
php artisan dp:seed
```




