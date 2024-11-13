#!/bin/bash
source .env
#export LD_LIBRARY_PATH=/usr/lib/oracle/12.1/client64/lib
sqlplus64 "${SQL_USERNAME}/${SQL_PASSWORD}@(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(Host=oracle12c.scs.ryerson.ca)(Port=1521))(CONNECT_DATA=(SID=orcl12c)))" <<EOF
DROP TABLE Benefits CASCADE CONSTRAINTS;
DROP TABLE Bonus CASCADE CONSTRAINTS;
DROP TABLE Deductions CASCADE CONSTRAINTS;
DROP TABLE TimeSheets CASCADE CONSTRAINTS;
DROP TABLE BankingInformation CASCADE CONSTRAINTS;
DROP TABLE Salary CASCADE CONSTRAINTS;
DROP TABLE Status CASCADE CONSTRAINTS;
DROP TABLE Employee CASCADE CONSTRAINTS;
DROP TABLE Department CASCADE CONSTRAINTS;
DROP TABLE Company CASCADE CONSTRAINTS;

EOF