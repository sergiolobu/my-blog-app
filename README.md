<h1 align="center">
  Documentation
</h1>

```scala
src
├── Controller
│   └── User
│       └── CreateController.php  //Entrypoint to create user 
├── Kernel.php
├── Shared // Dir contains all Infrastucture and Domain Infrastucture Bounded Context
│   ├── Domain
│   │   └── ValueObject
│   │       └── Uuid.php
│   └── Infrastucture
│       └── Doctrine
│           └── DoctrineRepository.php
└── User
├── Application // Uses Cases
│   └── Create
│       ├── CreateUserCommandHandler.php
│       ├── CreateUserCommand.php
│       └── UserCreator.php
├── Domain 
│   ├── UserId.php
│   ├── User.php
│   └── UserRepository.php
└── Infrastructure
├── Doctrine
│   └── User.orm.xml
└── UserRepositoryMysql.php
```