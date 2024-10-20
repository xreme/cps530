#!/bin/bash
source .env

#export LD_LIBRARY_PATH=/usr/lib/oracle/12.1/client64/lib
sqlplus64 "${SQL_USERNAME}/${SQL_PASSWORD}@(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(Host=oracle12c.scs.ryerson.ca)(Port=1521))(CONNECT_DATA=(SID=orcl12c)))" <<EOF

SELECT companyName, address FROM Company;

SELECT benefitType, benefitCost
FROM Benefits
WHERE benefitCost > 300 AND employeeID = 1
ORDER BY benefitCost DESC;

SELECT salaryLevel, effectiveDate, departmentID
FROM Salary
WHERE salaryLevel > 20
ORDER BY departmentID DESC, salaryLevel DESC;

SELECT startDate, statusType
FROM Status
WHERE employeeID = 1 AND statusType = 'Full-Time'
ORDER BY startDate DESC;

EOF
