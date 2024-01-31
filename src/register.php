<?php
/**
 * Created by PhpStorm.
 * User: hugh.li
 * Date: 2024/1/31
 * Time: 21:59
 */

use Lmmot\Container;
use Lmmot\Support\Proxy;


/**
 * 加载路由
 */
Container::instance()->route->add('GET', '/hello-world', 1, function () {
    return 'Hello World';
});

/**
 * 插槽
 */
Container::instance()->slot->add('hello-world', function () {
    return 'Hello World';
});

/**
 * 代理类
 * 之所以使用闭包的方式，是因为尽可能的在项目的class等依赖被加载后才执行
 */
Container::instance()->register->add(function () {
    /** 该方法永远不可能被执行 */
    Proxy::macro('hello-world', 1, function () {
        return 'Hello World';
    });
});
