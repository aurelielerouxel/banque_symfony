
# Realize a Symfony project

## Project week #19 AFPA Web Developer
Pair project on the creation of a bank application managed with Symfony.

Acquired skills :
- Understand the query/response model
- Starting a Symfony project via the CLI
- Manage application routing
- Develop controllers and associate routes to methods
- Using the twig template engine to display views
- Manage its database and entities with the Doctrine orm
- Create forms and manage their submission
- Manage its users and the security of the application
- Validate your data
- Display flash messages
- Populate its base with fixtures
- Test its application using unit tests


Below is an excerpt from the statement :

> ### Functional specifications (week n°19)
>
>- The application is only accessible to logged-in users.
>- When a user not logged in goes to the application he is redirected to a login page with a form.
>- A user logs in with an email address and a password.
>- A logged-in user can log out
>- Once logged in, the user only sees his personal bank accounts.
>- When the user clicks on a bank account, he or she is taken to a page dedicated to the account where he or she sees the account information and the last transactions made on the account.
>- Via a dedicated page a user can create a new personal account using a form. Once created the account appears on the home page. Please note that the account must meet the minimum requirements for account creation (right type and amount).
>- The user can make deposits or withdrawals to the account of his choice.  The account amount is then updated and a new transaction is recorded on the account.
>
>In addition to these specifications, you will try to:
>- populate the database with fixtures
>- validate the data entered in the forms using the validator

> ### Some tips for project management:
>
>- Make sure you have a consistent UseCase or tree structure
>- Choose a project manager
>- Take the time to prepare your Kanban and carefully cut out the tasks by estimating their time and date of completion.
>- Create a work schedule (possibly a glove diagram to ensure the sequence of tasks)
>- Hold at least one meeting at the beginning and end of the day to review the work done and to be done.
>- Build your DB schema, class and entity diagram + migrations together to have a common base
>- Do not exchange anything by email or key, everything goes through GitHub.
>- Don't forget to pull before pushing
>- Always check if you have recovered any migrations as they need to be executed.
>- Never modify the DB manually, you are modifying the entities you are migrating.
>- Launch an update composer regularly



&nbsp;

&nbsp;

     You will find the basic functional project in the "main" branch.

 &nbsp;
