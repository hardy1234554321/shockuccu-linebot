首先到 <a href="https://developers.line.biz/zh-hant/">LINE Developers</a> 建立一個新的 Channel
<img src="https://lh3.googleusercontent.com/-DY0JRKsHTCQ/YV_5EcMlNTI/AAAAAAAAODw/fuhzo_iOoFspmNi3g0YZH_9SWxriY6iQwCNcBGAsYHQ/w640-h378/image.png">


Channel 的類別選擇 Messaging API，填完基本資料
<img src="https://lh3.googleusercontent.com/-sKt2r8zdkM0/YV_5XnsbO7I/AAAAAAAAOD4/MGjnpKjL6Z0-uq6y6JXUNNdrvNz2H69SwCNcBGAsYHQ/w640-h290/image.png">

基本資料設定
1. Channel icon (optional)
2. Channel name
3. Channel description
4. Privacy policy URL (optional)
5. Terms of use URL (optional)

檢查 Channel 是否新增成功
<img src="https://lh3.googleusercontent.com/-Nu64zKSnnL8/YV_8y4filLI/AAAAAAAAOEI/Ri57A_ZqsqMFEGiKe4W1T6rUgs2P4Xy9gCNcBGAsYHQ/w640-h402/image.png">

參考官方提供的SDK <a href="https://github.com/line/line-bot-sdk-php">LINE Messaging API SDK for PHP</a> 可以很簡單的建立聊天機器人，
透過 composer 安裝 LINE Messaging API SDK

```
composer require linecorp/line-bot-sdk
```

目錄結構
<img src="https://lh3.googleusercontent.com/-xQ8DasFgMqw/YWABAIUAEJI/AAAAAAAAOEY/LekbiZvqqT0grceutJtpwsbsnfl0dbObgCNcBGAsYHQ/w400-h352/image.png">



1. index.php：此 webhook URL 為聊天機器人 server 的 endpoint，由此發出 webhook payload
2. api/LINEBot/EchoBot.php：主要處理接收訊息、回覆訊息
3. api/LINEBot/Setting.php：設定LINEBOT_CHANNEL_TOKEN、LINEBOT_CHANNEL_SECRET

把專案部署到 Heroku 完成後，回到 LINE Developers 介面找到 Webhook settings：
1. Webhook URL 輸入剛剛部署完成的 URL
2. 啟用 webhook
<img src="https://lh3.googleusercontent.com/-wTOORHlsmes/YWAKT2tWd_I/AAAAAAAAOEg/kXJgXWiSKKsD0iDVzyBDYkWgQzBAzBNqQCNcBGAsYHQ/w640-h220/image.png">

按下 Verify 出現 Success
<img src="https://lh3.googleusercontent.com/-J4FMBXkABi8/YWALHbhbw6I/AAAAAAAAOEo/7ykqolTMHQAso7M8ETMhEpLRXOHE90xOgCNcBGAsYHQ/w640-h204/image.png">

有了基本的回覆資訊之後，就可以進一步研究機器人的互動囉!
<img src="https://lh3.googleusercontent.com/-JQcuKk6sYdw/YWANCw4r-uI/AAAAAAAAOE4/B05scu_eZ8kFi4xhI2EHU56o281SjymoACNcBGAsYHQ/w640-h619/image.png">










