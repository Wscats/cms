## CI-News-CMS
登录界面:
>url/news/php/index.php/login

|Port|URL|Method|Params|Other|
|-|-|-|-|-|
|登录接口|**url**/news/php/index.php/login_api/login|POST|username,password|账号:yaojialong,12345678|
|频道接口|**url**/news/php/index.php/news_api/get_channel|GET|无||
|自动登录接口|url/news/php/index.php/login_api/auto_login|POST|username,token||
|根据频道显示对应新闻|url/news/php/index.php/news_api/show_detail_by_channel_id|GET|page,channel_id|例如:channel_id:4 军事 6 推荐 7 热点 8 娱乐|
|新闻根据id显示详细内容的接口|url/news/php/index.php/news_api/show_detail|GET|id||
|注册用户的接口|url/news/php/index.php/login_api/register|POST|params{username,password}||
|插入新闻的接口|url/news/php/index.php/news_api/insert_news|GET|title,text||
|删除新闻的接口|url/news/php/index.php/news_api/delete_news|GET|id||