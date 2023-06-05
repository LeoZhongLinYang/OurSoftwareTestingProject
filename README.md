# Food Ordering System

We are students from the Software Testing course at NYCU, and our final project for this semester is to test the following system, this project involves software testing on a PHP website.

https://github.com/haxxorsid/food-ordering-system



## Group 15

葉昭宏 310554040
林愉修 311554046
楊忠霖 311554037



## Coverage

login.php ok

register.php ok



## Bug

### Bug1
Unable to log in to the website is caused by an SQL syntax issue.

### Bug1 solution
The SQL syntax modification for 'wallet.php' is as follows:

$sql = mysqli_query($con, "SELECT * FROM wallet WHERE customer_id = '$user_id';");

$sql = mysqli_query($con, "SELECT * FROM wallet_details where wallet_id = '$wallet_id';");



### Bug2
An error occurs when attempting to register an account with duplicate credentials.

### Bug2 solution
We have added a duplicate registration check feature to 'routers/register-router.php'.



## SQL injection



## Note
---------
1. The test code is located in the 'tests' folder.
2. The source code is located in the 'src' folder.

