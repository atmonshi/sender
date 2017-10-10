# Sender Provider manager
[![Build Status](https://travis-ci.org/wa7eedem/sender.svg?branch=master)](https://travis-ci.org/wa7eedem/sender)
[![Code Climate](https://codeclimate.com/github/wa7eedem/sender/badges/gpa.svg)](https://codeclimate.com/github/wa7eedem/sender)
[![Latest Stable Version](https://poser.pugx.org/wa7eedem/smsgate/v/stable?format=flat)](https://packagist.org/packages/wa7eedem/smsgate)
[![Total Downloads](https://poser.pugx.org/wa7eedem/smsgate/downloads?format=flat)](https://packagist.org/packages/wa7eedem/smsgate)
[![License](https://poser.pugx.org/wa7eedem/smsgate/license?format=flat)](https://packagist.org/packages/wa7eedem/smsgate)


an sms gate to send messages form a provider .

## supported providers :
* [newtags](http://www.newtags.com.sa.com/)
* [mobily.ws](https://mobily.ws/)


## Getting Started

this is a laravel package , to install laravel see the [laravel Docs](https://laravel.com/docs/master/).


## Installing

after installing laravel , simply run :

```
composer require wa7eedem/smsgate
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
