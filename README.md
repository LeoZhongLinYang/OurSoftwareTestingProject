# Food Ordering System

We are students from the Software Testing course at NYCU, and our final project for this semester is to test the following system, this project involves software testing on a PHP website.

https://github.com/haxxorsid/food-ordering-system



## Group 15

葉昭宏 310554040
林愉修 311554046
楊忠霖 311554037



## Coverage

![352733960_1037759324276956_4671824824699867884_n](https://github.com/LeoZhongLinYang/OurSoftwareTestingProject/assets/106806791/e73b882e-fa3e-42e8-b768-4a3aa2c385fe)



## Bug

### Bug1
Unable to log in to the website is caused by an SQL syntax issue.

### Bug1 solution
The SQL syntax modification for 'wallet.php' is as follows:

$sql = mysqli_query($con, "SELECT * FROM wallet WHERE customer_id = '$user_id';");

$sql = mysqli_query($con, "SELECT * FROM wallet_details where wallet_id = '$wallet_id';");
![image](https://github.com/LeoZhongLinYang/OurSoftwareTestingProject/assets/106806791/57187129-59b0-4888-8808-1d89743b1c5a)



### Bug2
An error occurs when attempting to register an account with duplicate credentials.

### Bug2 solution
We have added a duplicate registration check feature to 'routers/register-router.php'.
![image](https://github.com/LeoZhongLinYang/OurSoftwareTestingProject/assets/106806791/0012619e-af9e-43bf-9464-f9239d2fb79e)



## SQL injection
![image](https://github.com/LeoZhongLinYang/OurSoftwareTestingProject/assets/106806791/a76ceb35-e610-4395-8f3a-049836222ce3)

![image](https://github.com/LeoZhongLinYang/OurSoftwareTestingProject/assets/106806791/0430bd58-d2f5-40e7-808a-8f7661a16f30)

## Hashing password using Bcrypt
![image](https://github.com/LeoZhongLinYang/OurSoftwareTestingProject/assets/106806791/ba80a547-cfd8-4293-b2b2-18e149b9ed0d)

![image](https://github.com/LeoZhongLinYang/OurSoftwareTestingProject/assets/106806791/f607354b-3b80-4a00-aa4f-b9385429c30d)



## selenium 

### test login
![348363454_769436411339435_1730165271847671558_n](https://github.com/LeoZhongLinYang/OurSoftwareTestingProject/assets/106806791/91c016a4-aaf3-4854-b2ac-b0c6ed0ea3e8)


## Note
---------
1. The test code is located in the 'tests' folder.
2. The source code is located in the 'src' folder.

