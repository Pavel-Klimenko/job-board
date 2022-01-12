<?php
namespace App;

class Constants
{
    const ADDRESS = '273 Jersey City Blvd Jersey City, NJ 07305, USA';
    const PHONE = '+100 (440) 9865 562';
    const EMAIL = 'jobBoardIT@gmail.com';

    const USER_ROLE_NAMES = [
        'admin' => 'admin',
        'company' => 'company',
        'candidate' => 'candidate',
    ];


    const INTERVIEW_ADVICES_STATUSES = [
        'ACCEPTED' => 'accepted',
        'REJECTED' => 'rejected',
        'NO_STATUS' => 'no_status',
    ];


    const USER_IMAGE_FOLDERS = [
        'companies' => '/img/usersData/companies/',
        'candidates' => '/img/usersData/candidates/',
        'reviews' => '/img/usersData/reviews/',
    ];



    //Demo data

    const DEMO_ICONS = [
        '/img/svg_icon/1.svg',
        '/img/svg_icon/2.svg',
        '/img/svg_icon/3.svg',
        '/img/svg_icon/4.svg',
        '/img/svg_icon/5.svg',
        '/img/svg_icon/6.svg',
    ];


    const DEMO_IMAGES = [
        'candidate-alexander' => '/img/demoData/candidates/alexander.jpg',
        'candidate-olga' => '/img/demoData/candidates/olga.jpg',
        'candidate-pavel' => '/img/demoData/candidates/pavel.jpg',
        'candidate-victor' => '/img/demoData/candidates/victor.jpg',

        'companies-belhard' => '/img/demoData/companies/belhard.jpg',
        'companies-epam' => '/img/demoData/companies/epam.png',
        'companies-giperlink' => '/img/demoData/companies/giperlink.jpg',
        'companies-itechart' => '/img/demoData/companies/itechart.png',
        'companies-techin' => '/img/demoData/companies/techin.jpg',

        'review-alex' => '/img/demoData/reviews/alex.jpg',
        'review-bob' => '/img/demoData/reviews/bob.jpg',
        'review-igor' => '/img/demoData/reviews/igor.png',
        'review-pavel' => '/img/demoData/reviews/pavel.jpg',
    ];
}