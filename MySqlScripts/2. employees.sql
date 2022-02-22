CREATE TABLE employees
   ( employee_id INTEGER
   , first_name VARCHAR(20)
   , last_name VARCHAR(25) 
   , email VARCHAR(25)
   , phone_number VARCHAR(20)
   , hire_date DATE
   , job_id VARCHAR(10)
   , salary INTEGER
   , commission_pct INTEGER
   , manager_id INTEGER
   , department_id INTEGER
   , constraint pk_emp primary key (employee_id) 
   , constraint fk_deptno foreign key (department_id) references departments(department_id)  
   ) ;

   
   #join employees table and departments table
select *
from employees
JOIN departments
on employees.department_id=departments.department_id;
#refer to the employees table creation script
#department id is created as a foreign key to employee table

#display how many employees work in each department
select department_name,
count(employee_id)
from employees
JOIN departments
on employees.department_id=departments.department_id
GROUP by departments.department_name;





