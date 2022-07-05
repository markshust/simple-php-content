<?php declare(strict_types=1);

require __DIR__ . '/classes/Page.php';
$page = Page::getInstance();

switch ($_SERVER['REQUEST_URI']) {
    case '/':
        $page->setTitle('Home');
        $view = 'index';
        break;
    case '/about':
        $page->setTitle('About');
        $view = 'about';
        break;
    default:
        $page->setTitle('Not Found');
        $view = '404';
        http_response_code(404);
}

require __DIR__ . '/includes/htmlStart.php';
require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/bodyStart.php';
require __DIR__ . "/views/$view.php";
require __DIR__ . '/includes/bodyEnd.php';
require __DIR__ . '/includes/htmlEnd.php';
