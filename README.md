# RazorPay X Laravel Payment Gateway

[![Latest Version on Packagist](https://img.shields.io/packagist/v/optimoapps/razorpay-x.svg?style=flat-square)](https://packagist.org/packages/optimoapps/razorpay-x)
[![Total Downloads](https://img.shields.io/packagist/dt/optimoapps/razorpay-x.svg?style=flat-square)](https://packagist.org/packages/optimoapps/razorpay-x)
![run-tests](https://github.com/OptimoApps/razorpay-x/workflows/run-tests/badge.svg)
![Check & fix styling](https://github.com/OptimoApps/razorpay-x/workflows/Check%20&%20fix%20styling/badge.svg)
 <a href="https://github.com/OptimoApps/razorpay-x/blob/master/LICENSE.md"><img alt="License" src="https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square"></a>

RazorPay X Laravel Package. Supports <a href="https://github.com/JsonMapper/JsonMapper">JsonMapper</a>

RazorPay X Laravel requires PHP 7.4. Supports Laravel 6 , 7 & 8.
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
 RazorPayX::account()->create($account);
 
 /* To Create a Payment */
 $payment = new Payment();
 $payment->account_number = '2323230002025787';
 $payment->fund_account_id = 'fa_EzFCyMGCEwTgmS';
 $payment->amount = 102;
 $payment->currency = 'INR';
 $payment->mode = PaymentModeEnum::IMPS;
 $payment->purpose = 'payout';
 RazorPayX::payment()->create($account);

/* To fetch Account */
 $account = new Account();
 $account->account_type = AccountTypeEnum::BANK_ACCOUNT;
 RazorPayX::account()->fetch($account);
 
/* result AccountCollection */

OptimoApps\RazorPayX\Entity\AccountCollection {#7246
  +entity: "collection"
  +count: 3
  +items: array:3 [
    0 => OptimoApps\RazorPayX\Entity\Account {#8386
      +id: "fa_F41TFrtuUZDim2"
      +entity: "fund_account"
      +contact_id: "cont_F0Rb5C4ZpfaTAV"
      +account_type: "bank_account"
      +bank_account: OptimoApps\RazorPayX\Entity\Bank {#9582
        +name: "Gaurav Kumar"
        +ifsc: "HDFC0000053"
        +account_number: "765432123456789"
        +bank_name: "HDFC Bank"
      }
      +vpa: null
      +active: true
      +batch_id: ""
      +created_at: 1592469241
    }
    1 => OptimoApps\RazorPayX\Entity\Account {#8369
      +id: "fa_F0RsxScNwK4C0t"
      +entity: "fund_account"
      +contact_id: "cont_F0Rb5C4ZpfaTAV"
      +account_type: "bank_account"
      +bank_account: OptimoApps\RazorPayX\Entity\Bank {#11794
        +name: "sathish kumar"
        +ifsc: "HDFC0000053"
        +account_number: "765432123456789"
        +bank_name: "HDFC Bank"
      }
      +vpa: null
      +active: true
      +batch_id: ""
      +created_at: 1591688903
    }
    2 => OptimoApps\RazorPayX\Entity\Account {#9580
      +id: "fa_EzFCyMGCEwTgmS"
      +entity: "fund_account"
      +contact_id: "cont_EyrHb3f1S0axBg"
      +account_type: "bank_account"
      +bank_account: OptimoApps\RazorPayX\Entity\Bank {#13996
        +name: "Gaurav Kumar"
        +ifsc: "HDFC0000053"
        +account_number: "765432123456789"
        +bank_name: "HDFC Bank"
      }
      +vpa: null
      +active: true
      +batch_id: ""
      +created_at: 1591425919
    }
  ]
}


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
