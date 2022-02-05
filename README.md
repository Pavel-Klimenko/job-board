![Logo](https://github.com/Pavel-Klimenko/job-board/blob/master/public/img/logo.png)

<h1>Job Board</h1>
<h3>Job board for software developers</h3>
Responsive website template from: https://colorlib.com/

Technology stack:
    
-PHP Version 7.4.27<br/>
-Laravel Framework 8.65.0<br/>
-MySQL

<h3>Main sections of the portal:</h3>

1) Main page
2) Vacancies page
3) Candidates page
4) Administration feedback form
5) Portal feedback form
6) Personal area

<h3>Main functionality:</h3>

1) lists of vacancies and resumes of candidates, categories of vacancies, companies
2) filter by vacancies, candidates
3) registration indicating the type of account (candidate, company)
4) authorization
5) page navigation
6) forms
7) personal account of the company and the candidate
8) opportunity to leave responses to vacancies (candidate)
9) possibility to confirm or reject the candidate's (company's) response
10) ability to create and delete vacancies in your account (company)
11) ability to edit personal information and change the logo
12) email alerts to email addresses of candidates and companies
13) queues
14) caching
15) scheduled tasks    


<h3>Deploying the project:</h3>

1) clone the project: git clone https://github.com/Pavel-Klimenko/job-board.git
2) install external assets: composer install; npm install
3) copy file .env.example to .env in root folder: copy .env.example .env
5) open the .env file and set the connection to the project database, the name of the application and the url address APP_URL
6) generate Application key: php artisan key:generate
7) create cache folder tree: 
mkdir storage; mkdir storage/framework/; mkdir storage/logs; mkdir storage/app; mkdir storage/framework/{cache,sessions,views}; mkdir storage/framework/cache/data; 
8) create tables in database: php artisan migrate
9) seeding demo data: php artisan db:seed --class=DemoDataSeeder
