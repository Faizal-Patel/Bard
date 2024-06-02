
# Bard Text

Originally made as a senior year elective project at Lake Forest College, Bard has evolved from a simple PHP and SQL application into a sleek, modern web app built on PHP Laravel, Jetstream, Vue, and Inertia.js.

Bard lets users view Shakespearean works. Enhanced user authentication ensures security while granting access to personalized API tokens for text retrieval. Profile customization is intuitive and a dedicated history page tracks users' search queries for easy reference.

Below are some screenshots of the project before I developed this more modern version.


## Old Project Screenshots
#### Register: 
![Alt text](/ReadmeScreenshots/oldRegister.png?raw=true "Old Register")
#### Login: 
![Alt text](/ReadmeScreenshots/oldLogin.png?raw=true "Old Login")
#### Home: 
![Alt text](/ReadmeScreenshots/oldHome.png?raw=true "Old Home")
#### Editing Profile: 
![Alt text](/ReadmeScreenshots/oldProfile.png?raw=true "Old Profile Edit")
#### API Stats: 
![Alt text](/ReadmeScreenshots/oldAPIstats.png?raw=true "Old Stats")
### To access the API in the old project I had to configure URL like this. I had to input the generated token, works, acts, and scenes manually
#### Search results: 
![Alt text](/ReadmeScreenshots/oldSearchResults.png?raw=true "Old Results")
## Features

- User authentication and secure login with support for MFA and password recovery.

- API Tokens: Easily generate, manage, and name read tokens for accessing Shakespearean texts.

- Navigation: Access to works, acts, and scenes.

- Update and manage profile settings effortlessly.

- Track and view your previous search queries for easy reference.

## Modern App Screenshots
#### Home: 
![Alt text](/ReadmeScreenshots/NewHome.png?raw=true "New App Home")
#### Register: 
![Alt text](/ReadmeScreenshots/NewRegister.png?raw=true "New Register")
#### Login: 
![Alt text](/ReadmeScreenshots/NewLogin.png?raw=true "New Login")
#### Password Recovery: 
![Alt text](/ReadmeScreenshots/NewPasswordRecovery.png?raw=true "New Password Recovery")
#### Editing Profile: 
![Alt text](/ReadmeScreenshots/NewPasswordEdit.png?raw=true "New Profile Edit")
#### Creating API Tokens: 
![Alt text](/ReadmeScreenshots/NewApiToken.png?raw=true "New API token")
#### Dashboard: 
![Alt text](/ReadmeScreenshots/NewDashboard.png?raw=true "New Dashboard")
#### Search History: 
![Alt text](/ReadmeScreenshots/NewHistory.png?raw=true "New History")
#### Postman (using postman to test user and API features): 
![Alt text](/ReadmeScreenshots/postmanUserTest.png?raw=true "New History")
![Alt text](/ReadmeScreenshots/postmanAPITest.png?raw=true "New History")

## Tech Stack

**Client:** Vue, Inertia.js, and Vite

**Server:** PHP and LaravelNe

**Database:** MySQL

Clone the project

```bash
  git clone https://github.com/Faizal-Patel/Bard
```

Go to the project directory

```bash
  cd Bard
```

Install dependencies

```bash
  npm install
```

Start the server

```bash
  npm run (dev/start)
```

Use PHP artisan server

```bash
  php artisan serve
```
## Authors
- [@Faizal-Patel](https://www.github.com/Faizal-Patel)

## License

The Laravel framework is open-sourced software licensed under the 
[MIT license](https://opensource.org/licenses/MIT).

