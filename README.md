# Senior Back-end Test

## Instructions for Completing the Test
To complete this test, the first thing you need to do is download the repository. Once downloaded, you should make all the modifications. Finally, compress the entire repository (excluding the vendor/ folder) into a zip file and send this zip file to the email indicated to you previously in the email.

The test has a maximum duration of two and a half hours. It consists of two questions, the first of which is a purely programming question to analyze your knowledge of DDD/Clean Architecture. The second question is aimed at understanding how to structure certain functionality at the class level.

A test endpoint **/api/helloworld** has been created for guidance. More information is available in the **routes/api.php** file.

## QUESTION 1

In this question, we ask for a solution oriented towards a **DDD/Clean Architecture**.

In the repository, you have a Laravel 8 project that is practically clean. The only modifications that have been made are as follows:

- The necessary migrations have been created to carry out the test.
- The phpunit.xml file has been configured to be able to run the tests on an SQLite connection. You can modify this file if you prefer to run the tests on a mysql connection, for example.
- The necessary factories have been created to carry out the test.

Imagine that we have the following database:

budgets

- id - primary key, int autoincrement
- total_amount - decimal 10,2
- created_at - timestamp
- update_at - timestamp
- deleted_at - timestamp

budget_lines

- id - primary key, int autoincrement
- budget_id - FK to the *budgets* table
- total_amount - decimal 10,2
- net_amount - decimal 10,2
- vat_amount - decimal 10,2
- vat - decimal 10,2
- created_at - timestamp
- update_at - timestamp
- deleted_at - timestamp

and we are asked to perform the following tasks so that the API is able to retrieve and create a budget.

TASK T1

The API must be able to receive a POST request to api/invoices and be able to create a budget. The incoming DTO will be of this type:

- Array of budgetLine

budgetLine, in turn, will be a DTO of this type:

- netAmount (decimal, required)
- vat (decimal, required)
- vatAmount (decimal, required)

The VAT amount (vatAmount) is calculated as: (netAmount * vat) / 100.

The total amount of a budget line is calculated from the sum of the net amount (netAmount) and the VAT amount (vatAmount).

The total amount of a budget will be the sum of the total amounts of all the lines of the budget.

**All necessary Unit and Feature tests must be created to test the functionality.**

TASK T2

The API must be able to retrieve a budget depending on its ID, upon receiving a request of this type GET api/invoices/{invoiceId}. The result that the API should return should be as follows:

- budgetId
- Array of budgetLine
- totalAmount
- createdAt

budgetLine, in turn, will be a DTO of this type:

- budgetLineId
- netAmount
- vatAmount
- totalAmount
- createdAt

**For this task, ONLY the necessary Feature tests must be created to test the functionality.**

## QUESTION 2

Imagine we have a list of actors/actresses with a series of characteristics/attributes: gender, age, height, language, etc.

The business asks us to be able to choose candidates who best fit according to a series of criteria, for example: "We want to select all actresses over 40 years old."

Explain the class diagram that this functionality should have, always bearing in mind that over time filters can be created and deactivated. **Important**: no solution is requested to be coded, only explain the class diagram.
```
