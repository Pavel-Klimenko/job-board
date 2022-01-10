![Logo](https://github.com/Pavel-Klimenko/job-board/blob/master/public/img/logo.png)

<h1>Job Board</h1>
<h3>Биржа труда для программистов</h3>
Использован адаптивный шаблон с сайта: https://colorlib.com/

Стек технологий:
PHP Version 7.4.27
Laravel Framework 8.65.0
MySQL

Основный разделы портала:

1) Главная страница (Home)
2) Вакансии (browse-job)
3) Кандидаты (candidates)
4) Форма обратной связи с администрацией (Contact)
5) Форма для отзыва о портале (Leave Review)
6) Личный кабинет (Personal Area)


Реализованный функционал:
1) списки вакансий и резюме кандидатов, категорий вакансий, компаний
2) фильтр по вакансиям, кандидатам
3) регистрация с указанием типа аккаунта (кандидата, компания)
4) авторизация
5) постраничная навигация
6) форма обратной связи
7) форма отзыва о портале job-board
8) Личный кабинет компании и кандидата
9) Возможность оставлять отклики на вакансии (кандидат)
10) Возможность подтверждать или отклонять отклик кандидата (компании)
11) Возможность создавать и удалять вакансии в личном кабинете (компании)
12) Возможность редактировать персональную информацию и менять логотип


Установка проекта:
1) Клонировать проект на сервер
2) Установить внешние покеты PHP: composer install
3) Установить внешние покеты JS: npm install
4) Скопировать файл .env.example в .env в корневой папке: copy .env.example .env
5) Открыть файл .env и прописать подключение к базе данных проекта, название приложения и url адрес APP_URL
6) Сгенерировать Application key: php artisan key:generate
7) Накатить существующие миграции: php artisan migrate
8) Заполнить сайт демо данными: php artisan db:seed --class=DemoDataSeeder
9) Запустить Job-board!
