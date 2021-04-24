To be able to test this project you will need create a setenv.php file.

You will add your database username and password to setenv.php:

$_SESSION['SQLUSER'] = "username";
$_SESSION['SQLPW'] = "password";

In connection.php you will need to set the database connection information:

$SERVER_NAME = '';
$DATABASE_USER = $_SESSION['SQLUSER'];
$DATABASE_PASS = $_SESSION['SQLPW'];
$DATABASE_NAME = 'schema_name';

We used MySQL Work bench to make the database and we created 3 tables for this project.

user table: user_id(int(11)), first_name (varhar(45)), last_name(varchar(45)), username(varchar(45)), password(varchar(70))
family_member table: family_member_id(int(11)), user_id(int(11)), family_member_name(varchar(45)), family_member_color(char(6))
task table: task_id(int(11)), task_name(varchar(45)), task_start(varchar(45)), task_description(varchar(500)), user_id(int(11)), family_member_id(int(11))
