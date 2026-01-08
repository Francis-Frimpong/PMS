<?php
return [
    'GET /login' => ['LoginController', 'showLogin'],
    'POST /login' => ['LoginController', 'authenticate'],
    'POST /logout' => ['LogoutController', 'logout'],

];