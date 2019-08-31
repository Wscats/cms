## CMS API

登录界面:
url根据服务器域名对应更改(例如本机url就是localhost)

>**url**/news/php/index.php/login

>**main** = url/news/php/index.php

### 登录接口
|Port|URL|Method|
|-|-|-|
|登录接口|main/login_api/login|POST|

|Params|Other|
|-|-|
|username,password|账号:yaojialong,12345678|

### 频道接口
|Port|URL|Method|
|-|-|-|
|频道接口|main/news_api/get_channel|GET|

|Params|Other|
|-|-|
|无||

### 自动登录接口
|Port|URL|Method|
|-|-|-|
|自动登录接口|main/login_api/auto_login|POST|

|Params|Other|
|-|-|
|username,token||

### 根据频道显示对应新闻
|Port|URL|Method|
|-|-|-|
|根据频道显示对应新闻|main/news_api/show_detail_by_channel_id|GET|

|Params|Other|
|-|-|
|page,channel_id|例如:channel_id:4 军事 6 推荐 7 热点 8 娱乐|

### 新闻根据id显示详细内容的接口
|Port|URL|Method|
|-|-|-|
|新闻根据id显示详细内容的接口|main/news_api/show_detail|GET|

|Params|Other|
|-|-|
|id||

### 注册用户的接口
|Port|URL|Method|
|-|-|-|
|注册用户的接口|main/login_api/register|POST|

|Params|Other|
|-|-|
|params{username,password}||

### 插入新闻的接口
|Port|URL|Method|
|-|-|-|
|插入新闻的接口|main/news_api/insert_news|GET|

|Params|Other|
|-|-|
|title,text||

### 删除新闻的接口
|Port|URL|Method|
|-|-|-|
|删除新闻的接口|main/news_api/delete_news|GET|

|Params|Other|
|-|-|
|id||
