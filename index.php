<?php
$server_name = "localhost";
$user_name = "root";
$password = "";
$DB_name = "Test";
$con = new mysqli($server_name, $user_name, $password);
//-------------------------------------------------------------------------------------------
// 1. Write a SQL statement to create a simple table countries including columns country_id,country_name and region_id.
mysqli_select_db($con, $DB_name);
$q1 = "CREATE TABLE countries ( 
    country_id int(8),
    country_name varchar(30),
    region_id int(10)
    );
";
if(mysqli_query($con, $q1)) {
    echo "Created (countries)Table Successfully <br>";
} else {
    echo "Error Creating Table".mysqli_error($con);
}
//-------------------------------------------------------------------------------------------
$dropT = "DROP TABLE countries";
$del = mysqli_query($con, $dropT);
if($del !== FALSE) {
    echo("Table (countries) has been Deleted <br>");
} else {
    echo("Table (countries) has not been deleted <br>");
}
//-------------------------------------------------------------------------------------------
// 2. Write a SQL statement to create a simple table countries including columns country_id,country_name and region_id which is already exists.
$q2 = "CREATE TABLE IF NOT EXISTS countries (
    country_id int(8),
    country_name varchar(30),
    region_id int(10)
    );
";
if(mysqli_query($con, $q2)) {
    echo "Created (countries) Table Successfully <br>";
}else {
    echo "error".mysqli_error($con);
}
//-------------------------------------------------------------------------------------------
//3. Write a SQL statement to create the structure of a table dup_countries similar to countries.
$q3 = "CREATE TABLE IF NOT EXISTS dup_countries LIKE countries";
if(mysqli_query($con, $q3)) {
    echo "Created (dup_countries)Table Successfully <br>";
}else {
    echo "error".mysqli_error($con);
}
//-------------------------------------------------------------------------------------------
//4. Write a SQL statement to create a duplicate copy of countries table including structure and data by name dup_countries.
$q4 = "CREATE TABLE IF NOT EXISTS dup_countries AS SELECT * FROM countries";
if(mysqli_query($con, $q4)) {
    echo "Created (dup_countries)Table Successfully <br>";
} else {
    echo "Error: ".mysqli_error($con);
}
//-------------------------------------------------------------------------------------------
//5. Write a SQL statement to create a table countries set a constraint NOT NULL (all the fields should be not null).
$q5 = "CREATE TABLE IF NOT EXISTS countries (
    country_id int(2) NOT NULL,
    country_name varchar(30) NOT NULL,
    region_id int(10) NOT NULL
)";
if(mysqli_query($con, $q5)) {
    echo "Created Table Successfully <br>";
} else {
    echo "Error: ".mysqli_error($con);
}
//-------------------------------------------------------------------------------------------
//6. Write a SQL statement to create a table named jobs including columns job_id, job_title, min_salary, max_salary and check whether the max_salary amount exceeding the upper limit 25000.
$q6 = "CREATE TABLE IF NOT EXISTS jobs (
    job_id int(6) NOT NULL,
    job_title varchar(30) NOT NULL, 
    min_salary decimal(4, 0),
    max_salary decimal(6, 0)
    CHECK(max_salary <= 25000)
)";
if(mysqli_query($con, $q6)) {
    echo "Created Table Successfully <br>";
} else {
    echo "Error: ".mysqli_error($con);
}
//-------------------------------------------------------------------------------------------
//7.Write a SQL statement to create a table named countries including columns country_id, country_name and region_id and make sure that no countries except Italy, India and China will be entered in the table.
$q7 = "CREATE TABLE IF NOT EXISTS countries (
    country_id int(6), 
    country_name varchar(30)
    CHECK(country_name IN ('Italy', 'India', 'China')),
    region_id int(10)
)";
if(mysqli_query($con, $q7)) {
    echo "Created Table Successfully <br>";
} else {
    echo "Error: ".mysqli_error($con);
}
//-------------------------------------------------------------------------------------------
//8.Write a SQL statement to create a table named job_history including columns employee_id, start_date, end_date, job_id and department_id and make sure that the value against column end_date will be entered at the time of insertion to the format like '--/--/----'.
$q8 = "CREATE TABLE IF NOT EXISTS job_history (
    employee_id int(4) NOT NULL, 
    start_date date NOT NULL, 
    end_date date NOT NULL
    CHECK (end_date LIKE '--/--/----'), 
    job_id int(4) NOT NULL, 
    department_id int(6) NOT NULL
)";
//-------------------------------------------------------------------------------------------
//9.Write a SQL statement to create a table named countries including columns country_id,country_name and region_id and make sure that no duplicate data against column country_id will be allowed at the time of insertion.
$q9 = "CREATE TABLE IF NOT EXISTS countries (
    country_id int(8) NOT NULL,
    country_name varchar(40) NOT NULL, 
    region_id int(6) NOT NULL,
    UNIQUE(country_id)
)";
//-------------------------------------------------------------------------------------------
//10. Write a SQL statement to create a table named jobs including columns job_id, job_title, min_salary and max_salary, and make sure that, the default value for job_title is blank and min_salary is 8000 and max_salary is NULL will be entered automatically at the time of insertion if no value assigned for the specified columns.
$q10 = "CREATE TABLE IF NOT EXISTS jobs (
    job_id int(4) NOT NULL UNIQUE, 
    job_title varchar(40) NOT NULL DEFAULT ' ', 
    min_salary decimal(5, 0) DEFAULT 8000, 
    max_salary decimal(6, 0) DEFAULT NULL,
)";
//-------------------------------------------------------------------------------------------
//11. Write a SQL statement to create a table named countries including columns country_id, country_name and region_id and make sure that the country_id column will be a key field which will not contain any duplicate data at the time of insertion.
$q11 = "CREATE TABLE IF NOT EXISTS countries (
    country_id int(8) NOT NULL PRIMARY KEY, 
    country_name varchar(40) NOT NULL,
    region_id int(6) NOT NULL
)";
//-------------------------------------------------------------------------------------------
//12. Write a SQL statement to create a table countries including columns country_id, country_name and region_id and make sure that the column country_id will be unique and store an auto incremented value.
$q12 = "CREATE TABLE IF NOT EXISTS countries (
    country_id int(8) NOT NULL UNIQUE AUTO_INCREMENT, 
    country_name varchar(40) NOT NULL,
    region_id int(6) NOT NULL
)";
//-------------------------------------------------------------------------------------------
//13. Write a SQL statement to create a table countries including columns country_id, country_name and region_id and make sure that the combination of columns country_id and region_id will be unique.
$q13 = "CREATE TABLE IF NOT EXISTS countries (
    country_id int(8) NOT NULL, 
    country_name varchar(40) NOT NULL,
    region_id int(6) NOT NULL,
    UNIQUE (COUNTRY_ID,REGION_ID))
)";

//-------------------------------------------------------------------------------------------
//14. Write a SQL statement to create a table job_history including columns employee_id, start_date, end_date, job_id and department_id and make sure that, the employee_id column does not contain any duplicate value at the time of insertion and the foreign key column job_id contain only those values which are exists in the jobs table.
$q14 = " CREATE TABLE job_history ( 
    EMPLOYEE_ID decimal(6,0) NOT NULL PRIMARY KEY, 
    START_DATE date NOT NULL, 
    END_DATE date NOT NULL, 
    JOB_ID varchar(10) NOT NULL, 
    DEPARTMENT_ID decimal(4,0) DEFAULT NULL, 
    FOREIGN KEY (job_id) REFERENCES jobs(job_id)
)";
//-------------------------------------------------------------------------------------------
//15. Write a SQL statement to create a table employees including columns employee_id, first_name, last_name, email, phone_number hire_date, job_id, salary, commission, manager_id and department_id and make sure that, the employee_id column does not contain any duplicate value at the time of insertion and the foreign key columns combined by department_id and manager_id columns contain only those unique combination values, which combinations are exists in the departments table.
$q15 = "CREATE TABLE IF NOT EXISTS employees ( 
    EMPLOYEE_ID decimal(6,0) NOT NULL PRIMARY KEY, 
    FIRST_NAME varchar(20) DEFAULT NULL, 
    LAST_NAME varchar(25) NOT NULL, 
    EMAIL varchar(25) NOT NULL, 
    PHONE_NUMBER varchar(20) DEFAULT NULL, 
    HIRE_DATE date NOT NULL, 
    JOB_ID varchar(10) NOT NULL, 
    SALARY decimal(8,2) DEFAULT NULL, 
    COMMISSION_PCT decimal(2,2) DEFAULT NULL, 
    MANAGER_ID decimal(6,0) DEFAULT NULL, 
    DEPARTMENT_ID decimal(4,0) DEFAULT NULL, 
    FOREIGN KEY(DEPARTMENT_ID,MANAGER_ID) 
    REFERENCES  departments(DEPARTMENT_ID,MANAGER_ID)
)";
//-------------------------------------------------------------------------------------------
//16.
$q16 = "CREATE TABLE IF NOT EXISTS employees ( 
    EMPLOYEE_ID decimal(6,0) NOT NULL PRIMARY KEY, 
    FIRST_NAME varchar(20) DEFAULT NULL, 
    LAST_NAME varchar(25) NOT NULL, 
    EMAIL varchar(25) NOT NULL, 
    PHONE_NUMBER varchar(20) DEFAULT NULL, 
    HIRE_DATE date NOT NULL, 
    JOB_ID varchar(10) NOT NULL, 
    SALARY decimal(8,2) DEFAULT NULL, 
    COMMISSION_PCT decimal(2,2) DEFAULT NULL, 
    MANAGER_ID decimal(6,0) DEFAULT NULL, 
    DEPARTMENT_ID decimal(4,0) DEFAULT NULL, 
    FOREIGN KEY(DEPARTMENT_ID) 
    REFERENCES  departments(DEPARTMENT_ID),
    FOREIGN KEY(JOB_ID) 
    REFERENCES  jobs(JOB_ID)
)";
//-------------------------------------------------------------------------------------------
//17.
$q17 = "CREATE TABLE IF NOT EXISTS employees ( 
    EMPLOYEE_ID decimal(6,0) NOT NULL PRIMARY KEY, 
    FIRST_NAME varchar(20) DEFAULT NULL, 
    LAST_NAME varchar(25) NOT NULL, 
    EMAIL varchar(25) NOT NULL, 
    PHONE_NUMBER varchar(20) DEFAULT NULL, 
    HIRE_DATE date NOT NULL, 
    JOB_ID varchar(10) NOT NULL, 
    SALARY decimal(8,2) DEFAULT NULL, 
    COMMISSION_PCT decimal(2,2) DEFAULT NULL, 
    MANAGER_ID decimal(6,0) DEFAULT NULL, 
    DEPARTMENT_ID decimal(4,0) DEFAULT NULL, 
    FOREIGN KEY(DEPARTMENT_ID) 
    REFERENCES  departments(DEPARTMENT_ID),
    FOREIGN KEY(JOB_ID) 
    REFERENCES  jobs(JOB_ID)
)";
//-------------------------------------------------------------------------------------------
//18.
$q18 = "CREATE TABLE IF NOT EXISTS employees ( 
    EMPLOYEE_ID decimal(6,0) NOT NULL PRIMARY KEY, 
    FIRST_NAME varchar(20) DEFAULT NULL, 
    LAST_NAME varchar(25) NOT NULL, 
    JOB_ID INTEGER NOT NULL, 
    SALARY decimal(8,2) DEFAULT NULL, 
    FOREIGN KEY(JOB_ID) 
    REFERENCES  jobs(JOB_ID) 
    ON DELETE CASCADE ON UPDATE RESTRICT
)";
//-------------------------------------------------------------------------------------------
//19.
$q19 = "CREATE TABLE IF NOT EXISTS employees ( 
    EMPLOYEE_ID decimal(6,0) NOT NULL PRIMARY KEY, 
    FIRST_NAME varchar(20) DEFAULT NULL, 
    LAST_NAME varchar(25) NOT NULL, 
    JOB_ID INTEGER, 
    SALARY decimal(8,2) DEFAULT NULL, 
    FOREIGN KEY(JOB_ID) 
    REFERENCES  jobs(JOB_ID)
    ON DELETE SET NULL 
    ON UPDATE SET NULL
)";
//-------------------------------------------------------------------------------------------
//20.
$q20 = "CREATE TABLE IF NOT EXISTS employees ( 
    EMPLOYEE_ID decimal(6,0) NOT NULL PRIMARY KEY, 
    FIRST_NAME varchar(20) DEFAULT NULL, 
    LAST_NAME varchar(25) NOT NULL, 
    JOB_ID INTEGER NOT NULL, 
    SALARY decimal(8,2) DEFAULT NULL, 
    FOREIGN KEY(JOB_ID) 
    REFERENCES  jobs(JOB_ID)
    ON DELETE NO ACTION 
    ON UPDATE NO ACTION
)";
?>