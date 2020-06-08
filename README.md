# RazorPay X Laravel Payment Gateway

[![Latest Version on Packagist](https://img.shields.io/packagist/v/optimoapps/razorpay-x.svg?style=flat-square)](https://packagist.org/packages/optimoapps/razorpay-x)
[![Build Status](https://img.shields.io/travis/optimoapps/razorpay-x/master.svg?style=flat-square)](https://travis-ci.org/optimoapps/razorpay-x)
[![Total Downloads](https://img.shields.io/packagist/dt/optimoapps/razorpay-x.svg?style=flat-square)](https://packagist.org/packages/optimoapps/razorpay-x)

RazorPay X Laravel Package. Supports JsonMapper

## Installation

You can install the package via composer:

```bash
composer require optimoapps/razorpay-x
```

## Usage

``` php
 <?php
 use RazorPayX;

 /**
 *  Create Account
 *  Returns Account
 */
 $bankAccount = new Bank();
 $bankAccount->name = 'Gaurav Kumar';
 $bankAccount->account_number = '765432123456789';
 $bankAccount->ifsc = 'HDFC0000053';
 $account = new Account();
 $account->contact_id = 'cont_EyrHb3f1S0axBg';
 $account->account_type = AccountTypeEnum::BANK_ACCOUNT;
 $account->bank_account = $bankAccount;
 RazorPayX::account()->create($account)
 
 
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email sathish.thi@gmail.com instead of using the issue tracker.

## Credits

- [satz](https://github.com/optimoapps)
- [mani](https://github.com/optimoapps)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
