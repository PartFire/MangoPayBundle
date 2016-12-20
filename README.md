# MangoPay Bundle for Symfony

[![Build Status](https://scrutinizer-ci.com/g/PartFire/MangoPayBundle/badges/build.png?b=master)](https://scrutinizer-ci.com/g/PartFire/MangoPayBundle/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/PartFire/MangoPayBundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/PartFire/MangoPayBundle/?branch=master)
[![Packagist](https://img.shields.io/packagist/l/doctrine/orm.svg)](https://packagist.org/packages/partfire/mangopay-bundle)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/71938a84-6958-447f-bce6-d7c55012d883/mini.png)](https://insight.sensiolabs.com/projects/71938a84-6958-447f-bce6-d7c55012d883)
[![Twitter Follow](https://img.shields.io/twitter/follow/espadrine.svg?style=social&label=Follow)](https://twitter.com/partfire)

A set of Symfony services for use in your project to ease integration with Mangopay API. 

This bundle depends upon the [official Mangopay SDK PHP for Mangopay API v2](https://github.com/Mangopay/mangopay2-php-sdk).  This means that this bundle only supports Mangopay API version v2.01 but not the earlier versions.  Please check which version you are using.

## Installation

Using composer you can simply require master for now until we have a stable release:

    $ composer require partfire/mangopay-bundle:dev-master
    
## Configuration

Add your details to your `app/config/parameters.yml` file.  For example:
```yaml
    mangopay_client_id: my_mango_id
    mangopay_client_password: XXXXXXXXXXXXXXXXXXXXXX
    mangopay_base_url: 'https://api.sandbox.mangopay.com'
```
Also add to your `app/AppKernel.php` file:

```php
    new PartFire\MangoPayBundle\PartFireMangoPayBundle()
```

## Example Usage

### Users

#### Create a user

```php
    $userService = $this->container->get('part_fire_mango_pay.services.user');
    
    $userDto = new \PartFire\MangoPayBundle\Models\DTOs\User();
    $userDto->setFirstName('Dick');
    $userDto->setLastName('Jones');
    $userDto->setBirthday(new \DateTime());
    $userDto->setEmail('dick.jones@test.com');
    $userDto->setNationality('GB');
    $userDto->setCountryOfResidence('GB');
    
    $userDtoUpdated = $userService->create($userDto);
    
    if ($userDtoUpdated instanceof \PartFire\MangoPayBundle\Models\DTOs\User) {
        $userDtoUpdated->getId(); //The users MangoPay ID, DTO fully populated.
    }
    
    if ($userDtoUpdated instanceof \PartFire\MangoPayBundle\Models\Exception) {
        //an error you can deal with
    }
 ```
 
### Wallets

#### Create a wallet

```php
    $walletService = $this->container->get('part_fire_mango_pay.services.wallet');

    $walletDto = new \PartFire\MangoPayBundle\Models\DTOs\Wallet();
    $walletDto->setTag('TAG1');
    $walletDto->setOwenerId('123456');
    //$walletDto->setOwenerIds(['123456']);
    $walletDto->setDescription('A natural users wallet');
    $walletDto->setCurrency('GBP');
    
    $walletDtoUpdated = $walletService->create($walletDto);
        
    if ($walletDtoUpdated instanceof \PartFire\MangoPayBundle\Models\DTOs\Wallet) {
        $walletDtoUpdated->getId(); //The wallet DTO populated with MangoPay ID.
    }
    
    if ($walletDtoUpdated instanceof \PartFire\MangoPayBundle\Models\Exception) {
        //an error you can deal with
    }
```
    
## Service List

    part_fire_mango_pay.services.user
    part_fire_mango_pay.services.wallet
    part_fire_mango_pay.services.kyc
    part_fire_mango_pay.services.transfer
    
### Code Structure Explanation

In the 'Services' directory are the services that should be used my your client code.  These services depend upon interfaces which are located inside the 'Models' directory.  We then have an implementation of these abstractions in the 'Models/Adapters' directory.  This means our services depend upon our abstractions, while the adapters also depend upon our abstractions.  

The objects passed into the services and then adapters are simple DTOs (data type objects).  These are just keys and values with setters and getters.  We pass these in and out of the adapters so that none of our services / client code is dependant upon the MangoPay SDK.

### Contributing

Feel free to add more methods to the services etc and create a pull request.  I will merge them in if they follow the existing structure or you teach me a better way.
