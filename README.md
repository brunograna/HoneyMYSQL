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
After that the HoneyMYSQL library is configured. To instantiate the object just do it:
```
  require_once('HoneyMYSQL');
  $honey = new HoneyMYSQL();
```

## Insert Data Example

Insert data in database.

```  
  $honey->insert('tablename', array( 'field1', 'field2' ),array( 'value1', 'value2' ));
```

## Insert Not Repeated Data Example

Insert unique data in database. If the data exist, the function returns 0.

```  
  $honey->insert_nr('tablename', array( 'field1', 'field2' ),array( 'value1', 'value2' ));
```
