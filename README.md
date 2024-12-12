# NextPHP | Next Generation PHP Framework

![Patreon](https://img.shields.io/static/v1?message=Patreon&logo=patreon&label=&color=F96854&logoColor=white&labelColor=&style=for-the-badge)
![Twitter](https://img.shields.io/static/v1?message=Twitter&logo=twitter&label=&color=1DA1F2&logoColor=white&labelColor=&style=for-the-badge)
![Codepen](https://img.shields.io/static/v1?message=Codepen&logo=codepen&label=&color=000000&logoColor=white&labelColor=&style=for-the-badge)
![Stackoverflow](https://img.shields.io/static/v1?message=Stackoverflow&logo=stackoverflow&label=&color=FE7A16&logoColor=white&labelColor=&style=for-the-badge)
![Slack](https://img.shields.io/static/v1?message=Slack&logo=slack&label=&color=4A154B&logoColor=white&labelColor=&style=for-the-badge)
![LinkedIn](https://img.shields.io/static/v1?message=LinkedIn&logo=linkedin&label=&color=0077B5&logoColor=white&labelColor=&style=for-the-badge)

## About NextPHP

NextPHP is a next-generation, lightweight PHP framework designed for rapid web application development. Optimized for modern cloud environments, it excels in speed, performance, and efficiency, making it the ideal choice for developers aiming to build scalable and secure applications swiftly.

### Key Features

- **Agile and Lean:** Ideal for rapid MVP development with minimal setup.
- **Cloud-Ready:** Runs seamlessly on any PHP hosting, ensuring high performance.
- **Integrated Core Features:** Built-in error handling, logging, email, JWT authentication, and more.
- **Minimalist Architecture:** Lightweight and efficient, reducing resource usage.
- **RESTful API Support:** Robust and easy-to-use API creation.

### Mission

Our mission is to provide a lightweight, easy-to-use PHP framework that helps developers and startups quickly bring their ideas to life. We believe in simplicity, efficiency, and delivering value without unnecessary complexity.

### Vision

We envision a world where developers can focus on building innovative solutions without being bogged down by complex setups and configurations. NextPHP aims to be the go-to framework for rapid development and agile methodologies.

### Why NextPHP?

In today’s digital transformation era, the speed of development, application performance, and resource efficiency are crucial. NextPHP addresses these needs by offering:

- **Simplicity:** Quick and easy setup, no extensive configurations.
- **Performance:** High-speed execution and low resource consumption.
- **Flexibility:** Adaptable for both simple web apps and complex APIs.
- **Community and Support:** Active community with professional support options.

### Development History

NextPHP evolved from LeanPHP, NovaPHP, and NGPHP, each bringing unique strengths such as minimalism, optional composer support, and a fully modular architecture. NextPHP combines the strengths of its predecessors with comprehensive support for modern web development needs, optimized for cloud-based projects.

### Packages

NextPHP offers a range of packages to enhance functionality and streamline development:

- **nextphp/rest:** - [Nextphp\Data](https://github.com/nextphp-projects/rest): RESTful API operations. 
- **nextphp/data:** - [Nextphp\Rest](https://github.com/nextphp-projects/data): CRUD and All operations and database adapters.
- **nextphp/jwt:**  - [Nextphp\JWT](https://github.com/nextphp-projects/data): JWT package
- **nextphp/logging:** Logging operations.
- **nextphp/reporting:** Reporting functionalities.
- **nextphp/mail:** Email operations.
- **nextphp/auth:** Authorization and authentication.
- **nextphp/jwt:** JWT-based authentication.
- **nextphp/testing:** Testing operations.
- **nextphp/qa:** Quality assurance and testing.
- **nextphp/cache:** Caching operations.
- **nextphp/queue:** Background jobs and task queues.
- **nextphp/config:** Application configurations.
- **nextphp/files:** File management and uploads.
- **nextphp/uploads:** File upload operations.

## Comparison with Other Frameworks

Unlike some other frameworks that can be cumbersome and resource-intensive, NextPHP is designed to be lean and efficient. This means faster development times, lower resource consumption, and reduced hosting costs.

| Feature                               | NextPHP               | Other Frameworks      |
|---------------------------------------|-----------------------|-----------------------|
| Easy Setup & Rapid Development        | ★★★★★                 | ★★★                   |
| Integrated Core Features              | ★★★★★                 | ★★★★                  |
| Ease of Learning                      | ★★★★★                 | ★★★                   |
| Performance & Speed                   | ★★★★★                 | ★★★                   |
| Community Support                     | ★★★★                  | ★★★★★                 |
| Ideal for Startups                    | ★★★★★                 | ★★★                   |
| Download & Use Capability             | ★★★★★                 | ★★★                   |
| Source Code Size                      | ★★★★★ (Kilobytes)     | ★★ (Megabytes)        |
| RESTful API Support                   | ★★★★★                 | ★★★★                  |

### Unique Advantages of NextPHP

- **No Bloat:** Only include what you need. This makes NextPHP exceptionally fast and responsive.
- **Resource Efficiency:** Optimized for low resource consumption, making it perfect for cloud environments and cost-effective deployments.
- **Rapid Prototyping:** Quickly go from concept to prototype with minimal overhead.
- **Scalability:** Designed with scalability in mind, making it easy to grow your application as your business expands.
- **Security:** Built-in security features ensure your applications are protected from common vulnerabilities.

# NextPHP Framework Usage Documentation

## Overview
The NextPHP Framework is a modern and lightweight PHP framework. Designed for high performance and scalability, it offers a comprehensive set of tools and libraries to accelerate the development process. The framework includes various packages such as NextPHP Rest and NextPHP Data.

## Features
- Supports all RESTful methods (GET, POST, PUT, DELETE, PATCH, OPTIONS, HEAD, TRACE, CONNECT, PRI)
- Response formats: JSON, XML, HTML, TEXT, CSV
- Attribute-based route definitions
- Middleware and JWT support
- Attribute-based entity definitions with ORM
- Direct SQL query capabilities
- Relationship management (OneToMany, ManyToOne, etc.)
- Easy integration with existing projects

## Installation

### Installation with Composer
To add the NextPHP package to your project, run the following command using Composer:

```bash
composer require nextphp/nextphp
```

## Basic Usage
NextPHP comes ***with an example project demonstrating a full multi-layered architecture CRUD operation*** with ***User*** and ***Post*** examples.


### Defining Entities
Entities represent the tables in your database. Use attributes to define the properties and their types.

```php
<?php
namespace Example;

use NextPHP\Data\Persistence\Column;
use NextPHP\Data\Persistence\Entity;
use NextPHP\Data\Persistence\GeneratedValue;
use NextPHP\Data\Persistence\Id;
use NextPHP\Data\Persistence\Table;

#[Entity(name: "users")]
class User
{
    #[Id]
    #[Column('INT AUTO_INCREMENT PRIMARY KEY', false)]
    public int $id;

    #[Column('VARCHAR(255)', false)]
    public string $name;

    #[Column('VARCHAR(255)', false)]
    public string $email;

    #[Column('VARCHAR(255)', false)]
    public string $password;

    // getters and setters
}
```

### Advanced Entity Usage
Relationships OneToMany, OnetoOne, ManyToOne and ManytoMany. 
Define relationships using attributes.

```php
<?php
namespace Example;

use NextPHP\Data\Persistence\Column;
use NextPHP\Data\Persistence\Entity;
use NextPHP\Data\Persistence\GeneratedValue;
use NextPHP\Data\Persistence\Id;
use NextPHP\Data\Persistence\Table;

#[Entity(name: "users")]
class Post
{
    #[Id]
    #[Column('INT AUTO_INCREMENT PRIMARY KEY', false)]
    public int $id;

    #[Column('VARCHAR(255)', false)]
    public string $title;

    #[Column('TEXT', false)]
    public string $content;

    #[Column('INT', false)]
    public int $user_id;

    // example for ManyToMany, OneToMany etc.
    #[ManyToOne(targetEntity: User::class, inversedBy: 'posts')]
    private User $user;

    // getters and setters
}
```

### Using Repository
Repositories handle database operations for entities. Extend ***BaseRepository*** and specify the entity class.

```php
<?php
namespace Example;

use NextPHP\Data\BaseRepository;

#[Repository(entityClass: User::class)]
class UserRepository extends BaseRepository
{
    // No need for constructor
}
```

### Service Layer
Services provide business logic and interact with repositories.

```php
<?php
namespace Example;

#[Service(description: 'User management service')]
class UserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    #[Transactional]
    public function registerUser(array $userData): User
    {
        $user = new User();
        $user->name = $userData['name'];
        $user->email = $userData['email'];
        $user->password = password_hash($userData['password'], PASSWORD_DEFAULT);

        $userArray = [
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
        ];

        $this->userRepository->save($userArray);

        return $user;
    }

    public function getAllUsers(): array
    {
        return $this->userRepository->findAll();
    }

    public function getUserById(int $id): ?User
    {
        $userArray = $this->userRepository->find($id);
        if (!$userArray) {
            return null;
        }

        $user = new User();
        $user->id = $userArray['id'];
        $user->name = $userArray['name'];
        $user->email = $userArray['email'];
        $user->password = $userArray['password'] ?? '';

        return $user;
    }

    public function updateUser(int $id, array $data): ?User
    {
        $user = $this->getUserById($id);
        if (!$user) {
            return null;
        }

        foreach ($data as $key => $value) {
            if (property_exists($user, $key)) {
                $user->$key = $value;
            }
        }

        $userArray = get_object_vars($user);
        $this->userRepository->update($id, $userArray);

        return $user;
    }

    public function deleteUser(int $id): bool
    {
        $user = $this->getUserById($id);
        if (!$user) {
            return false;
        }

        $this->userRepository->delete($id);

        return true;
    }
}
```

### Using Resource
This is an example project demonstrating the usage of the NextPHP Rest package, which includes routing and HTTP handling capabilities.
Basic Usage Defining Routes Define routes using attributes to map HTTP methods to controller actions.

```php
<?php

namespace NextPHP\App\Resource;

use NextPHP\Rest\Http\Request;
use NextPHP\Rest\Http\Response;
use NextPHP\Rest\Http\Get;
use NextPHP\Rest\Http\Post;
use NextPHP\Rest\Http\Put;
use NextPHP\Rest\Http\Delete;
use NextPHP\Rest\Http\Patch;
use NextPHP\Rest\Http\RouteGroup;
use NextPHP\Rest\Http\Middleware;
use NextPHP\App\Middleware\RequestLoggerMiddleware;
use NextPHP\App\Service\UserService;

#[RouteGroup('/api')]
// #[Middleware(AuthMiddleware::class)]
class UserResource
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    #[Get('/users')]
    public function getAllUsers(Request $request, Response $response)
    {
        $users = $this->userService->getAllUsers();
        return $response->withJSON(['users' => $users]);
    }

    #[Get('/users2')]
    public function getAllUsers2(Request $request, Response $response)
    {
        // Middleware'i burada çağırıyoruz
        $middleware = new RequestLoggerMiddleware();
        $middleware->handle($request, function($request) use ($response) {
            $users = $this->userService->getAllUsers();
            return $response->withJSON(['users' => $users]);
        });
        
        // Middleware handle işlemi sonucu response döner
        return $response;
    }

    #[Get('/users/{id}')]
    public function getUserById(Request $request, Response $response, $id)
    {
        $user = $this->userService->getUserById((int)$id);
        if ($user) {
            return $response->withJSON($user);
        } else {
            return $response->withStatus(404)->withJSON(['error' => 'User not found']);
        }
    }

    #[Post('/users')]
    public function createUser(Request $request, Response $response)
    {
        $data = json_decode($request->getBody(), true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return $response->withStatus(400)->withJSON(['error' => 'Invalid JSON provided']);
        }

        $user = $this->userService->registerUser($data);
        return $response->withStatus(201)->withJSON($user);
    }

    #[Put('/users/{id}')]
    public function updateUser(Request $request, Response $response, $id)
    {
        $data = json_decode($request->getBody(), true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return $response->withStatus(400)->withJSON(['error' => 'Invalid JSON provided']);
        }
    
        $user = $this->userService->updateUser((int)$id, $data);
        if ($user) {
            return $response->withJSON($user);
        } else {
            return $response->withStatus(404)->withJSON(['error' => 'User not found']);
        }
    }
    
    #[Patch('/users/{id}')]
    public function patchUser(Request $request, Response $response, $id)
    {
        $data = json_decode($request->getBody(), true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return $response->withStatus(400)->withJSON(['error' => 'Invalid JSON provided']);
        }
    
        $user = $this->userService->patchUser((int)$id, $data);
        if ($user) {
            return $response->withJSON($user);
        } else {
            return $response->withStatus(404)->withJSON(['error' => 'User not found']);
        }
    }

    #[Delete('/users/{id}')]
    public function deleteUser(Request $request, Response $response, $id)
    {
        $success = $this->userService->deleteUser((int)$id);
        if ($success) {
            return $response->withStatus(204);
        } else {
            return $response->withStatus(404)->withJSON(['error' => 'User not found']);
        }
    }
}
```


## Generate the index.php file

To start the NextPHP package, you can create an `index.php` file and use the service layer to perform various CRUD operations. Here is an example of how you can do this:

### Example index or example.php

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

use NextPHP\Rest\DI\Container;
use NextPHP\Rest\Router;
use NextPHP\Rest\Http\Request;
use NextPHP\Rest\Http\Response;
use NextPHP\App\Resource\UserResource;
use NextPHP\App\Resource\PostResource;

$container = new Container();

$router = new Router([
    'baseUri' => '/nextphp-beta',
    'allowedOrigins' => [
        'http://allowed-origin.com' => ['GET', 'POST'],
        'http://another-allowed-origin.com' => ['GET', 'PUT'],
        '*' => ['GET', 'POST', 'PUT', 'DELETE', 'PATCH', 'OPTIONS', 'HEAD', 'TRACE', 'CONNECT', 'PRI']
    ]
], $container);

// DI
$router->registerRoutesFromController(UserResource::class);
$router->registerRoutesFromController(PostResource::class);

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$request = new Request($method, $uri, getallheaders(), file_get_contents('php://input'), $_GET, $_POST);
$response = new Response();

$response = $router->dispatch($request, $response);

if ($response) {
    http_response_code($response->getStatusCode());
    foreach ($response->getHeaders() as $name => $value) {
        header("$name: $value");
    }
    echo $response->getBody();
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Internal Server Error', 'message' => 'No response returned.']);
}
```

### Project Architecture
Example for your Project Structure

```code
example/
├── src/
│   ├── Entity/
│   │   ├── User.php
│   │   ├── Post.php
│   ├── Repository/
│   │   ├── UserRepository.php
│   │   ├── PostRepository.php
│   ├── Service/
│   │   ├── UserService.php
│   │   ├── PostService.php
│   ├── Resource/
│   │   ├── UserResource.php
│   │   ├── PostResource.php
├── index.php
├── composer.json
└── README.md
```

## Contributing

We welcome contributions! Here’s how you can help:

- **Report Issues:** Found a bug? Report it on GitHub.
- **Suggest Features:** Have an idea? Share it with us.
- **Submit Pull Requests:** Improve the codebase.
- **Enhance Documentation:** Help us improve our docs.

For more details, see our [Contribution Guidelines](contribution.md).

## Resources

- [Official Website](https://nextphp.io)
- [GitHub Repository](https://github.com/nextphp-projects/nextphp)
- [Documentation](https://nextphp.io/documentation)

## Join Our Community

- **Twitter:** Follow us on [Twitter](https://twitter.com/NextPHPOfficial)
- **Discord:** Join our [Discord](https://discord.gg/nextphp) community.

## Contact Us

- **Email:** support@nextphp.io
- **Forum:** [NextPHP Mastodon](https://mastodon.social/@nextphp)
- **GitHub Issues:** [NextPHP GitHub](https://github.com/nextphp-projects/nextphp/issues)

Thank you for being part of the NextPHP community!
