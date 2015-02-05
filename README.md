Yii2 Application Skeleton
===================================

Yii2 Application Skeleton basis on Yii2 Advanced Application Template.

The template includes two tiers: frontend, backend, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/maxmirazh33/yii2-app-skeleton/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/maxmirazh33/yii2-app-skeleton/?branch=master)
[![Code Climate](https://codeclimate.com/github/maxmirazh33/yii2-app-skeleton/badges/gpa.svg)](https://codeclimate.com/github/maxmirazh33/yii2-app-skeleton)
[![Dependency Status](https://www.versioneye.com/user/projects/54d1fa7d3ca0849531000115/badge.svg?style=flat)](https://www.versioneye.com/user/projects/54d1fa7d3ca0849531000115)
[![Build Status](https://scrutinizer-ci.com/g/maxmirazh33/yii2-app-skeleton/badges/build.png?b=master)](https://scrutinizer-ci.com/g/maxmirazh33/yii2-app-skeleton/build-status/master)

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
backend
    assets/              contains application assets such as JavaScript and CSS
    components/          contains end user's components
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```


REQUIREMENTS
------------

The minimum requirement by this application template that your Web server supports PHP 5.4.0.


INSTALLATION
------------

### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install the application using the following command:

~~~
php composer.phar global require "fxp/composer-asset-plugin:1.0.0"
php composer.phar create-project --prefer-dist --stability=dev maxmirazh33/yii2-app-skeleton app
~~~
