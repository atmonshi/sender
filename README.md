# Sender Provider manager

an sms gate to send messages form a provider .

## supported providers :
* [newtags](http://www.newtags.com.sa.com/) 
* [mobily.ws](https://mobily.ws/)

## Getting Started

this is a laravel package , to install laravel see the [laravel Docs](https://laravel.com/docs/master/). 


## Installing

after installing laravel , simply run :

```
composer require wa7eedem/sender
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

## mobily.ws available functions

### get Balance :

```
api::getBalance('mobilyWs')
```




.