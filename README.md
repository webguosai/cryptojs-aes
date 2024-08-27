<h1 align="center">cryptojs-aes</h1>

<p align="center">
<a href="https://packagist.org/packages/webguosai/cryptojs-aes"><img src="https://poser.pugx.org/webguosai/cryptojs-aes/v/stable" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/webguosai/cryptojs-aes"><img src="https://poser.pugx.org/webguosai/cryptojs-aes/downloads" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/webguosai/cryptojs-aes"><img src="https://poser.pugx.org/webguosai/cryptojs-aes/v/unstable" alt="Latest Unstable Version"></a>
<a href="https://packagist.org/packages/webguosai/cryptojs-aes"><img src="https://poser.pugx.org/webguosai/cryptojs-aes/license" alt="License"></a>
</p>


## 运行环境

- php >= 5.6
- composer

## 安装

```Shell
$ composer require webguosai/cryptojs-aes
```

## 在php中使用
```php
use \Webguosai\Aes;

$array = [
    'name1' => '123',
    'name2' => '456'
];
$key   = 'key4567890123456';
$iv    = 'iv34567890123456';

//加密
$encode = Aes::encrypt($array, $key, $iv); // dc530b22204d3ee7ce729062600fb5c389c43ededed5e5c12d22b82a791fc15e

//解密
$data   = Aes::decrypt($encode, $key, $iv); // ['name1' => '123', 'name2' => '456']
```

## 在JS中使用
> npm install crypto-js
- crypto-js@4.2.0

```html
<script type="text/javascript" src="node_modules/crypto-js/crypto-js.js"></script>
<script>
const key = 'key4567890123456'
const iv = 'iv34567890123456'
const keySize = 128

// 填充key,对照(128=16位,192=24位,256=32位)
const padKey = key.padEnd(keySize / 8, '\0')

// 填充iv(固定16位)
const padIv = iv.padEnd(16, '\0')

// 加密
function encrypt(data) {
    data = JSON.stringify(data)
    const encrypt = CryptoJS.AES.encrypt(data, CryptoJS.enc.Utf8.parse(padKey), {
        mode: CryptoJS.mode.CBC,
        padding: CryptoJS.pad.Pkcs7,
        iv: CryptoJS.enc.Utf8.parse(padIv)
    })
    
    return encrypt.ciphertext.toString(CryptoJS.enc.Hex);
}
// 解密
function decrypt(encrypt) {
    encrypt = CryptoJS.enc.Base64.stringify(CryptoJS.enc.Hex.parse(encrypt));
    
    const decrypted = CryptoJS.AES.decrypt(encrypt, CryptoJS.enc.Utf8.parse(padKey), {
        mode: CryptoJS.mode.CBC,
        padding: CryptoJS.pad.Pkcs7,
        iv: CryptoJS.enc.Utf8.parse(padIv)
    })

    return JSON.parse(decrypted.toString(CryptoJS.enc.Utf8))
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
