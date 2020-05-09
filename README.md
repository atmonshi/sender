# Sender Provider manager
[![Build Status](https://travis-ci.org/atmonshi/sender.svg?branch=master)](https://travis-ci.org/atmonshi/sender)
[![Maintainability](https://api.codeclimate.com/v1/badges/4a8416b74f8607cd631e/maintainability)](https://codeclimate.com/github/atmonshi/sender/maintainability)
[![Latest Stable Version](https://poser.pugx.org/atmonshi/sender/v/stable?format=flat)](https://packagist.org/packages/atmonshi/sender)
[![Total Downloads](https://poser.pugx.org/atmonshi/sender/downloads?format=flat)](https://packagist.org/packages/atmonshi/sender)
[![License](https://poser.pugx.org/atmonshi/sender/license?format=flat)](https://packagist.org/packages/atmonshi/sender)


an sms gate to send messages form a provider .

## supported providers :
* [newtags](http://www.newtags.com.sa.com/)
* [mobily.ws](https://mobily.ws/)


## Getting Started

this is a laravel package , to install laravel see the [laravel Docs](https://laravel.com/docs/master/).


## Installing

after installing laravel , simply run :

```
composer require atmonshi/sender
```

to publish the config file :

```
php artisan vendor:publish --tag=config
```


## NewTags available functions

### get Balance :

```
api::getBalance('STag')
```

### get Senders Names :

```
api::getSenderNames('STag')
```

##_____________________________________

## mobily.ws available functions

### get Balance :

```
api::getBalance('mobilyWs')
```




.
