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

# Example Project using NextPHP Data

This is an example project demonstrating the usage of the NextPHP Data package, which includes ORM and direct SQL query capabilities.

## Basic Usage
### Defining Entities
Entities represent the tables in your database. Use attributes to define the properties and their types.

### Using Entity

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
Relationships OneToMany and ManyToOne
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

### Example Project
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

### Using Resource
This is an example project demonstrating the usage of the NextPHP Rest package, which includes routing and HTTP handling capabilities.
Basic Usage Defining Routes Define routes using attributes to map HTTP methods to controller actions.

```php
<?php

namespace NextPHP\App\Service;

use NextPHP\App\Repository\UserRepository;
use NextPHP\App\Entity\User;
use NextPHP\Data\Service;
use NextPHP\Data\Persistence\Transactional;

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

    public function patchUser(int $id, array $data)
    {
        $user = $this->getUserById($id);
        if (!$user) {
            return null;
        }

        $this->userRepository->save($user);

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


## Testing

To test the NextPHP Data package, you can create an `index.php` file and use the service layer to perform various CRUD operations. Here is an example of how you can do this:

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
