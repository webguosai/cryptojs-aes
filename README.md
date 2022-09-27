<h1 align="center">cryptojs-php-aes</h1>

<p align="center">
<a href="https://packagist.org/packages/webguosai/cryptojs-php-aes"><img src="https://poser.pugx.org/webguosai/cryptojs-php-aes/v/stable" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/webguosai/cryptojs-php-aes"><img src="https://poser.pugx.org/webguosai/cryptojs-php-aes/downloads" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/webguosai/cryptojs-php-aes"><img src="https://poser.pugx.org/webguosai/cryptojs-php-aes/v/unstable" alt="Latest Unstable Version"></a>
<a href="https://packagist.org/packages/webguosai/cryptojs-php-aes"><img src="https://poser.pugx.org/webguosai/cryptojs-php-aes/license" alt="License"></a>
</p>


## 运行环境

- php >= 5.6
- composer

## 安装

```Shell
$ composer require webguosai/cryptojs-php-aes
```

## 在php中使用
```php
use \Webguosai\AesCBC;

$array = [
    'name1' => '123',
    'name2' => '456'
];
$key   = 'key123';
$iv    = 'iv34567890123456';

//加密
$encode = AesCBC::encrypt($array, $key, $iv); //d235985c278b9a81acb3ab3b89eee069b0609b8680261589a1b8aca6398a93e1

//解密
$data   = AesCBC::decrypt($encode, $key, $iv);
```

## 在JS中使用
> npm install crypto-js
```html
<script type="text/javascript" src="node_modules/crypto-js/crypto-js.js"></script>
<script>
//加密
function encrypt(array, key, iv){
    let encrypt = CryptoJS.AES.encrypt(array, CryptoJS.enc.Utf8.parse(key),{
        iv:CryptoJS.enc.Utf8.parse(iv),
        mode:CryptoJS.mode.CBC,
        padding:CryptoJS.pad.Pkcs7
    })
    
    return encrypt.ciphertext.toString(CryptoJS.enc.Hex);
}
//解密
function decrypt(encrypt, key, iv){
    encrypt = CryptoJS.enc.Base64.stringify(CryptoJS.enc.Hex.parse(encrypt));
    
    let decrypted = CryptoJS.AES.decrypt(encrypt, CryptoJS.enc.Utf8.parse(key),{
        iv:CryptoJS.enc.Utf8.parse(iv),
        mode:CryptoJS.mode.CBC,
        padding:CryptoJS.pad.Pkcs7
    })

    return decrypted.toString(CryptoJS.enc.Utf8)
}
</script>
```

## 打赏

<p>
  <img src="https://wx4.sinaimg.cn/mw1024/008voDx3gy1h6l1azpwysj30u014wt9h.jpg" width="250" />
  <img src="https://wx2.sinaimg.cn/mw1024/008voDx3gy1h6l1azp5vhj30u01aoadc.jpg" width="250" />
</p>

## License

MIT
