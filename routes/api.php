<?php

 /*
 |--------------------------------------------------------------------------
 | Файл маршрутизации SDFramework
 |--------------------------------------------------------------------------
 |
 | Нужен для реализация маршрутов внутри ресурса
 | Подробнее: 
 |
 */

namespace Roast\Routes;
$route->get('/', '\Roast\Controllers\Regular\DefaultController@welcome');

$route->post('/api/registration/(\w+)', function($who) {
  echo \Roast\Controllers\Regular\DefaultController::registration($who);
});

$route->post('/api/msg', function() {
    echo \Roast\Controllers\Regular\DefaultController::msg();
});

$route->post('/api/set_new_mark_is_present', function() {
    echo \Roast\Controllers\Regular\DefaultController::setIsPresent();
});

$route->post('/api/set_new_mark_home_work', function() {
    echo \Roast\Controllers\Regular\DefaultController::setHomeWork();
});

$route->post('/api/set_new_mark_active', function() {
    echo \Roast\Controllers\Regular\DefaultController::setActive();
});

$route->post('/api/set_new_marks_list', function() {
    echo \Roast\Controllers\Regular\DefaultController::newJournalItem();
});

$route->post('/api/set_year_summ', function() {
    echo \Roast\Controllers\Regular\DefaultController::setYearSumm();
});

$route->get('/api/enter/(\w+)', function($login) {
    echo \Roast\Controllers\Regular\DefaultController::getUser($login);
});

$route->get('/api/user/(\w+)', function($id) {
    echo \Roast\Controllers\Regular\DefaultController::getUserById($id);
});

$route->get('/api/users', function() {
    echo \Roast\Controllers\Regular\DefaultController::users();
});

$route->get('/api/chats/(\w+)/(\w+)', function($from_user, $to_user) {
    echo \Roast\Controllers\Regular\DefaultController::getChat($from_user, $to_user);
});

$route->get('/api/journal', function() {
    echo \Roast\Controllers\Regular\DefaultController::journal();
});

$route->get('/api/journal_item/(\w+)/(\w+)/(\w+)', function($journal_place, $journal_group, $lesson_date) {
    echo \Roast\Controllers\Regular\DefaultController::journalItem($journal_place, $journal_group, $lesson_date);
});

$route->get('/api/get_year_summ/(\w+)/(\w+)', function($journal_place, $journal_group) {
    echo \Roast\Controllers\Regular\DefaultController::getYearSumm($journal_place, $journal_group);
});

$route->get('/api/users_journal/(\w+)/(\w+)', function($journal_place, $journal_group) {
    echo \Roast\Controllers\Regular\DefaultController::usersJournal($journal_place, $journal_group);
});


