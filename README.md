# HoneyMYSQL a PHP Library (under development)
A PHP Library that helps to make CRUD (Create, Read, Update and Delete) system with one line using MYSQL databases.'

## Getting Started
To configure HoneyMYSQL you just need to know this server settings:
* Servername
* Username
* Password
* Database

After knowing that you just have to put all these information in the __constructor of 'Connection.php' file.

```
public function __construct() {
  $this->setServername("localhost");
  $this->setUsername("root");
  $this->setPassword("");
  $this->setDatabase("DatabaseName");
}
```
After that the HoneyMYSQL library is configured.

## Insert Data Example

```
  require_once('HoneyMYSQL');
  $honey = new HoneyMYSQL();
  $honey->insert('tablename', array('login','password'),array('admin','1234'));
```
