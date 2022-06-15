<?php

use App\controllers\Controller_Main;
use App\controllers\Controller_Comment;
use App\controllers\Controller_Country;
use App\controllers\Controller_Dashboard;
use App\controllers\Controller_Kuleba;
use App\controllers\Controller_Login;
use App\controllers\Controller_Register;
use App\controllers\Controller_Result;
use App\controllers\Controller_User;
use App\controllers\Controller_Weapon;
use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::get('/', [Controller_Main::class, 'action_index']);
SimpleRouter::post('/user/check', [Controller_User::class, 'action_check']);
SimpleRouter::post('/user/save', [Controller_User::class, 'action_save']);
SimpleRouter::get('/dashboard', [Controller_Dashboard::class, 'action_index']);
SimpleRouter::get('/user/logout', [Controller_User::class, 'action_logout']);
SimpleRouter::get('/result', [Controller_Result::class, 'action_index']);
SimpleRouter::get('/kuleba', [Controller_Kuleba::class, 'action_index']);
SimpleRouter::get('/comment', [Controller_Comment::class, 'action_index']);
SimpleRouter::get('/login', [Controller_Login::class, 'action_index']);
SimpleRouter::get('/register', [Controller_Register::class, 'action_index']);
SimpleRouter::post('/result/save', [Controller_Result::class, 'action_save']);
SimpleRouter::post('/country/save', [Controller_Country::class, 'action_save']);
SimpleRouter::post('/weapon/save', [Controller_Weapon::class, 'action_save']);
