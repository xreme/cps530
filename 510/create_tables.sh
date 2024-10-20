#!/bin/bash
#export LD_LIBRARY_PATH=/usr/lib/oracle/12.1/client64/lib
source ./.env
echo ${SQL_USERNAME}
echo ${SQL_PASSWORD}

sqlplus64 "${SQL_USERNAME}/${SQL_PASSWORD}@(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(Host=oracle12c.scs.ryerson.ca)(Port=1521))(CONNECT_DATA=(SID=orcl12c)))" <<EOF

CREATE TABLE Company (
    companyID INT PRIMARY KEY,
    companyName VARCHAR(50) NOT NULL,
    address VARCHAR(50),
    phoneNumber VARCHAR(20),
    email VARCHAR(30),
    taxIDNumber VARCHAR(50)
);

CREATE TABLE Department (
    departmentID INT PRIMARY KEY,
    departmentName VARCHAR(50) NOT NULL,
    companyID INT,
    FOREIGN KEY (companyID) REFERENCES Company(companyID)
);

CREATE TABLE Employee (
    employeeID INT PRIMARY KEY,
    firstName VARCHAR(30) NOT NULL,
    lastName VARCHAR(30) NOT NULL,
    birthday DATE,
    gender VARCHAR(15),
    phoneNumber VARCHAR(20),
    email VARCHAR(30),
    address VARCHAR(30),
    hireDate DATE,
    jobTitle VARCHAR(50),
    socialInsuranceNumber VARCHAR(9),
    departmentID INT,
    FOREIGN KEY (departmentID) REFERENCES Department(departmentID)
);

CREATE TABLE Benefits (
    benefitID INT PRIMARY KEY,
    employeeID INT,
    benefitType VARCHAR(20),
    benefitCost DECIMAL(10, 2),
    benefitStart DATE,
    benefitExpirationDate DATE,
    FOREIGN KEY (employeeID) REFERENCES Employee(employeeID)
);

CREATE TABLE TimeSheets (
    timeSheetID INT PRIMARY KEY,
    employeeID INT,
    workDay DATE,
    hoursWorked DECIMAL(4, 2),
    FOREIGN KEY (employeeID) REFERENCES Employee(employeeID)
);

CREATE TABLE BankingInformation (
    bankingInformationID INT PRIMARY KEY,
    bankName VARCHAR(20),
    employeeID INT,
    accountNumber INT,
    accountType VARCHAR(15),
    dateAdded DATE,
    currencyType VARCHAR(3),
    FOREIGN KEY (employeeID) REFERENCES Employee(employeeID)
);

CREATE TABLE Salary (
    salaryID INT PRIMARY KEY,
    employeeID INT,
    departmentID INT,
    salaryLevel DECIMAL(8, 2),
    effectiveDate DATE,
    endDate DATE,
    FOREIGN KEY (employeeID) REFERENCES Employee(employeeID),
    FOREIGN KEY (departmentID) REFERENCES Department(departmentID)
);

CREATE TABLE Status (
    statusID INT PRIMARY KEY,
    employeeID INT,
    startDate DATE,
    endDate DATE,
    statusType VARCHAR(10),
    FOREIGN KEY (employeeID) REFERENCES Employee(employeeID)
);

CREATE TABLE Bonus (
    bonusID INT PRIMARY KEY,
    employeeID INT,
    bonusType VARCHAR(10),
    bonusAmount DECIMAL(6, 2),
    payPeriod DATE,
    salaryID INT,
    FOREIGN KEY (employeeID) REFERENCES Employee(employeeID),
    FOREIGN KEY (salaryID) REFERENCES Salary(salaryID)
);

CREATE TABLE Deductions (
    deductionID INT PRIMARY KEY,
    employeeID INT,
    deductionType VARCHAR(10),
    deductionAmount DECIMAL(6, 2),
    payPeriod DATE,
    salaryID INT,
    FOREIGN KEY (employeeID) REFERENCES Employee(employeeID),
    FOREIGN KEY (salaryID) REFERENCES Salary(salaryID)
);
EOF
