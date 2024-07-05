### Q: How do I define a repository?

A: Extend the `BaseRepository` class and use the `#[Repository(entityClass: EntityClass::class)]` attribute to specify the entity class.

By extending the `BaseRepository` class, your repository automatically inherits several powerful methods for interacting with the database. Here are some of the key methods available:

- **save(array $data)**: Saves a new entity to the database.
    ```php
    $userArray = [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => password_hash('secret', PASSWORD_DEFAULT),
    ];
    $userRepository->save($userArray);
    ```

- **update(int $id, array $data)**: Updates an existing entity in the database.
    ```php
    $updateData = ['name' => 'Jane Doe'];
    $userRepository->update(1, $updateData);
    ```

- **delete(int $id)**: Deletes an entity from the database by its ID.
    ```php
    $userRepository->delete(1);
    ```

- **find(int $id)**: Finds an entity by its ID.
    ```php
    $user = $userRepository->find(1);
    ```

- **findAll()**: Retrieves all entities from the database.
    ```php
    $users = $userRepository->findAll();
    ```

- **findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)**: Finds entities based on specified criteria.
    ```php
    $criteria = ['email' => 'john@example.com'];
    $users = $userRepository->findBy($criteria);
    ```

- **count(array $criteria)**: Counts entities based on specified criteria.
    ```php
    $count = $userRepository->count(['email' => 'john@example.com']);
    ```

- **distinct($field, array $criteria = [])**: Finds distinct values for a specified field.
    ```php
    $distinctEmails = $userRepository->distinct('email');
    ```

- **orderBy(array $criteria, array $orderBy)**: Orders entities based on specified criteria and order.
    ```php
    $orderedUsers = $userRepository->orderBy(['name' => 'John Doe'], ['email' => 'ASC']);
    ```

- **having(array $criteria, array $having)**: Filters entities based on specified criteria and having conditions.
    ```php
    $havingUsers = $userRepository->having(['name' => 'John Doe'], ['count' => '> 1']);
    ```

These methods provide a flexible and powerful way to interact with your database, making CRUD operations and more complex queries straightforward and efficient.

### Q: How do I perform transactional operations?

A: Use the #[Transactional] attribute on methods that should be executed within a transaction.

***This documentation provides a comprehensive guide to using the NextPHP Data package, including installation, basic and advanced usage, and an example project.***