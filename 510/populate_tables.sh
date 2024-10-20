#!/bin/bash
#export LD_LIBRARY_PATH=/usr/lib/oracle/12.1/client64/lib
source ./.env
echo ${SQL_USERNAME}
echo ${SQL_PASSWORD}

sqlplus64 "${SQL_USERNAME}/${SQL_PASSWORD}@(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(Host=oracle12c.scs.ryerson.ca)(Port=1521))(CONNECT_DATA=(SID=orcl12c)))" <<EOF

INSERT INTO Company (companyID, companyName, address, phoneNumber, email, taxIDNumber) 
VALUES ('1', 'Tech Inc.', '123 Tech Lane, CA', '555-0123', 'info@tech.com', '123-45-6789');

INSERT INTO Department (departmentID, departmentName, companyID) 
VALUES 
(1, 'Sales', 1);

INSERT INTO Department (departmentID, departmentName, companyID) 
VALUES 
(2, 'Human Resources', 1);

INSERT INTO Department (departmentID, departmentName, companyID) 
VALUES 
(3, 'Finance', 1);

INSERT INTO Employee (employeeID, firstName, lastName, birthday, gender, phoneNumber, email, address, hireDate, jobTitle, socialInsuranceNumber, departmentID) 
VALUES 
(1, 'John', 'Doe', TO_DATE('1990-01-15', 'YYYY-MM-DD'), 'Male', '555-1234', 'johndoe@example.com', '456 Worker Lane', TO_DATE('2020-05-01', 'YYYY-MM-DD'), 'Software Engineer', 'SIN123456', 1);

INSERT INTO Employee (employeeID, firstName, lastName, birthday, gender, phoneNumber, email, address, hireDate, jobTitle, socialInsuranceNumber, departmentID) 
VALUES 
(2, 'Jane', 'Smith', TO_DATE('1985-07-22', 'YYYY-MM-DD'), 'Female', '555-5678', 'janesmith@example.com', '789 Business Rd', TO_DATE('2019-08-15', 'YYYY-MM-DD'), 'HR Manager', 'SIN654321', 2);


INSERT INTO Benefits (benefitID, employeeID, benefitType, benefitCost, benefitStart, benefitExpirationDate) 
VALUES 
(1, 1, 'Health', 500.00, TO_DATE('2021-01-01', 'YYYY-MM-DD'), TO_DATE('2024-01-01', 'YYYY-MM-DD'));

INSERT INTO Benefits (benefitID, employeeID, benefitType, benefitCost, benefitStart, benefitExpirationDate) 
VALUES 
(2, 2, 'Dental', 200.00, TO_DATE('2021-01-01', 'YYYY-MM-DD'), TO_DATE('2024-01-01', 'YYYY-MM-DD'));

INSERT INTO BankingInformation (bankingInformationID, bankName, employeeID, accountNumber, accountType, dateAdded, currencyType) 
VALUES 
(1, 'Bank of America', 1, 12345678, 'Checking', TO_DATE('2020-06-01', 'YYYY-MM-DD'), 'USD');

INSERT INTO BankingInformation (bankingInformationID, bankName, employeeID, accountNumber, accountType, dateAdded, currencyType) 
VALUES 
(2, 'Wells Fargo', 2, 87654321, 'Savings', TO_DATE('2019-08-20', 'YYYY-MM-DD'), 'USD');


INSERT INTO Salary (salaryID, employeeID, departmentID, salaryLevel, effectiveDate, endDate) 
VALUES 
(1, 1, 1, 75000.00, TO_DATE('2020-05-01', 'YYYY-MM-DD'), NULL);

INSERT INTO Salary (salaryID, employeeID, departmentID, salaryLevel, effectiveDate, endDate) 
VALUES 
(2, 2, 2, 65000.00, TO_DATE('2019-08-15', 'YYYY-MM-DD'), NULL);


INSERT INTO Status (statusID, employeeID, startDate, endDate, statusType) 
VALUES 
(1, 1, TO_DATE('2020-05-01', 'YYYY-MM-DD'), NULL, 'Full-Time');

INSERT INTO Status (statusID, employeeID, startDate, endDate, statusType) 
VALUES 
(2, 2, TO_DATE('2019-08-15', 'YYYY-MM-DD'), NULL, 'Full-Time');


INSERT INTO Bonus (bonusID, employeeID, bonusType, bonusAmount, payPeriod, salaryID) 
VALUES 
(1, 1, 'sales', 1500.00, TO_DATE('2023-09-30', 'YYYY-MM-DD'), 1);

INSERT INTO Bonus (bonusID, employeeID, bonusType, bonusAmount, payPeriod, salaryID) 
VALUES 
(2, 2, 'Holiday', 1000.00, TO_DATE('2023-12-31', 'YYYY-MM-DD'), 2);


INSERT INTO Deductions (deductionID, employeeID, deductionType, deductionAmount, payPeriod, salaryID) 
VALUES 
(1, 1, 'Tax', 500.00, TO_DATE('2023-09-30', 'YYYY-MM-DD'), 1);

INSERT INTO Deductions (deductionID, employeeID, deductionType, deductionAmount, payPeriod, salaryID) 
VALUES 
(2, 2, 'Retirement', 300.00, TO_DATE('2023-12-31', 'YYYY-MM-DD'), 2);

EOF
