# HoneyMYSQL a PHP Library
A PHP Library that helps to make CRUD (Create, Read, Update and Delete) system with one line using MYSQL databases.'

## Getting Started
To configure HoneyMYSQL you just need to know this settings:
* Servername
* Username
* Password
* Database

After knowing that you just have to put all these information in the __constructor of 'Connection.php' file.

```
public function __construct() {
  $this->setServername("localhost");
  $this->setUsername("Username");
  $this->setPassword("Password");
  $this->setDatabase("DatabaseName");
}
```
