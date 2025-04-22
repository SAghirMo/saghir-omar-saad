# S&B Store Diagrams

## Use Case Diagram

```
+------------------+     +------------------+
|      User        |     |      Admin       |
+------------------+     +------------------+
        |                      |
        v                      v
+------------------------------------------+
|               S&B Store                   |
+------------------------------------------+
|                                          |
|  + Browse Products                       |
|  + View Product Details                  |
|  + Add to Cart                          |
|  + Checkout                             |
|  + Contact Support                      |
|  + Register Account                     |
|  + Login                               |
|  + View Orders                         |
|                                          |
|  + Manage Products                      |
|  + Manage Categories                    |
|  + View Contacts                        |
|  + Manage Users                         |
|                                          |
+------------------------------------------+
```

## Class Diagram

```
+------------------+     +------------------+
|      User        |     |    Category      |
+------------------+     +------------------+
| - id             |     | - id             |
| - name           |     | - name           |
| - email          |     | - created_at     |
| - password       |     | - updated_at     |
| - email_verified |     +------------------+
| - remember_token |             |
| - created_at     |             |
| - updated_at     |             |
+------------------+             |
        |                        |
        |                        v
+------------------+     +------------------+
|    Contact       |     |    Product       |
+------------------+     +------------------+
| - id             |     | - id             |
| - first_name     |     | - name           |
| - last_name      |     | - description    |
| - email          |     | - price          |
| - message        |     | - category       |
| - status         |     | - image          |
| - category_id    |     | - stock          |
| - created_at     |     | - created_at     |
| - updated_at     |     | - updated_at     |
+------------------+     +------------------+

+------------------+
|PasswordResetToken|
+------------------+
| - email          |
| - token          |
| - created_at     |
+------------------+
```

## Database Relationships

1. User to Contact (1-to-many)
   - One user can submit many contacts
   - Contact belongs to one user

2. Category to Contact (1-to-many)
   - One category can have many contacts
   - Contact belongs to one category

3. User to PasswordResetToken (1-to-many)
   - One user can have many password reset tokens
   - PasswordResetToken belongs to one user

## Table Structure

### Users Table
```sql
CREATE TABLE users (
    id bigint unsigned NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    email varchar(255) NOT NULL UNIQUE,
    email_verified_at timestamp NULL,
    password varchar(255) NOT NULL,
    remember_token varchar(100) NULL,
    created_at timestamp NULL,
    updated_at timestamp NULL,
    PRIMARY KEY (id)
);
```

### Categories Table
```sql
CREATE TABLE categories (
    id bigint unsigned NOT NULL AUTO_INCREMENT,
    name varchar(255) NULL UNIQUE,
    created_at timestamp NULL,
    updated_at timestamp NULL,
    PRIMARY KEY (id)
);
```

### Products Table
```sql
CREATE TABLE products (
    id bigint unsigned NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    description text NOT NULL,
    price decimal(10,2) NOT NULL,
    category varchar(255) NOT NULL,
    image varchar(255) NOT NULL,
    stock int NOT NULL,
    created_at timestamp NULL,
    updated_at timestamp NULL,
    PRIMARY KEY (id)
);
```

### Contacts Table
```sql
CREATE TABLE contacts (
    id bigint unsigned NOT NULL AUTO_INCREMENT,
    first_name varchar(255) NULL,
    last_name varchar(255) NULL,
    email varchar(255) NULL,
    message text NULL,
    status enum('1','0') DEFAULT '1',
    category_id bigint unsigned NULL,
    created_at timestamp NULL,
    updated_at timestamp NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (category_id) REFERENCES categories(id)
);
```

### Password Reset Tokens Table
```sql
CREATE TABLE password_reset_tokens (
    email varchar(255) NOT NULL,
    token varchar(255) NOT NULL,
    created_at timestamp NULL,
    PRIMARY KEY (email)
);
``` 