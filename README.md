<h1 align="center">
  Documentation
</h1>

```scala
src
├── Controller //Entrypoint
│   └── User
│       ├── CreateController.php
│       └── GetController.php
├── DataFixtures
│   └── AppFixtures.php
├── Kernel.php
├── Shared // Dir contains all Infrastucture and Domain Infrastucture Bounded Context
│   ├── Domain
│   │   ├── Bus
│   │   │   ├── Command
│   │   │   └── Query
│   │   ├── Notifier
│   │   │   └── Notifier.php
│   │   └── ValueObject
│   │       └── Uuid.php
│   └── Infrastructure
│       ├── Bus
│       │   ├── Command
│       │   ├── HandlerBuilder.php
│       │   └── Query
│       ├── Doctrine
│       │   └── DoctrineRepository.php // An implementation of the repository
│       └── Notifier // Notifier configuration
│           └── EmailNotifier.php
└── User
    ├── Application // Uses Cases
    │   ├── Create
    │   │   ├── CreateUserCommandHandler.php
    │   │   ├── CreateUserCommand.php
    │   │   └── UserCreator.php
    │   ├── Find
    │   │   ├── FindUserQueryHandler.php
    │   │   ├── FindUserQuery.php
    │   │   └── UserFinder.php
    │   └── Notification
    │       └── NotificationSender.php
    ├── Domain
    │   ├── UserEmail.php // ValueObject
    │   ├── UserId.php // ValueObject
    │   ├── User.php // Entity
    │   ├── UserRepository.php // Interface of repository
    │   └── UserResponse.php
    ├── Exception // All users exceptions
    │   ├── UserEmailNotValidException.php
    │   └── UserNotFoundException.php
    └── Infrastructure
        ├── Doctrine
        │   └── User.orm.xml
        └── UserRepositoryMysql.php

```