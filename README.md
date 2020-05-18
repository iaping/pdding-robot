## PHP DingTalk Robot

PHP DingTalk Robot SDK（PHP钉钉机器人开发包）

## Install

composer
```php
php composer.phar require aping/pdding-robot
```
或
```php
"require": {
    "aping/pdding-robot": "dev-master"
}
```

## Usage
```php
$fast = \Aping\PddingRobot\Fast::new('机器人TOKEN', '签名密钥');

//text类型
$fast->sendText('Hello World');

//link类型
$fast->sendLink('Hello', '这个即将发布的新版本，创始人xx称它为红树林。而在此之前，每当面临重大升级，产品经理们都会取一个应景的代号，这一次，为什么是红树林', 'http://www.baidu.com', 'https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png');

//markdown类型
$fast->sendMarkdown('Hello', "#### 杭州天气 \n9度，西北风1级，空气良89，相对温度73%\n> ![screenshot](https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png)\n> ###### 10点20分发布 [天气](https://www.dingalk.com) \n");

//整体跳转ActionCard类型
$fast->sendSingleActionCard('Hello', '![screenshot](@lADOpwk3K80C0M0FoA) ### 乔布斯 20 年前想打造的苹果咖啡厅 Apple Store 的设计正从原来满满的科技感走向生活化，而其生活化的走向其实可以追溯到 20 年前苹果一个建立咖啡馆的计划', '阅读全文', 'https://www.dingtalk.com/');

//独立跳转ActionCard类型
$fast->sendMultiActionCard('Hello', '![screenshot](@lADOpwk3K80C0M0FoA) ### 乔布斯 20 年前想打造的苹果咖啡厅 Apple Store 的设计正从原来满满的科技感走向生活化，而其生活化的走向其实可以追溯到 20 年前苹果一个建立咖啡馆的计划', [
    ['title'=>'钉钉','actionURL'=>'https://www.dingtalk.com/']
]);

//FeedCard类型
$fast->sendFeedCard([['title' => '钉钉', 'messageUrl' => 'https://www.dingtalk.com/', 'picUrl' => 'https://gw.alicdn.com/tfs/TB1ayl9mpYqK1RjSZLeXXbXppXa-170-62.png']]);
```

## Reference
https://ding-doc.dingtalk.com/doc#/serverapi2/qf2nxq
