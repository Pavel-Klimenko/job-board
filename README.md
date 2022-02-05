![Logo](https://github.com/Pavel-Klimenko/job-board/blob/master/public/img/logo.png)

<h1>Job Board</h1>
<h3>Job board for software developers</h3>
Responsive website template from: https://colorlib.com/

Technology stack:
    
-PHP Version 7.4.27
-Laravel Framework 8.65.0
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


<h3>Установка проекта:</h3>

1) Клонировать проект на сервер: git clone https://github.com/Pavel-Klimenko/job-board.git
2) Установить внешние покеты PHP: composer install
3) Установить внешние покеты JS: npm install
4) Скопировать файл .env.example в .env в корневой папке: copy .env.example .env
5) Открыть файл .env и прописать подключение к базе данных проекта, название приложения и url адрес APP_URL
6) Сгенерировать Application key: php artisan key:generate
7) Накатить существующие миграции: php artisan migrate
8) Заполнить сайт демо данными: php artisan db:seed --class=DemoDataSeeder
9) Запустить Job-board!
