# Easy html form for send Telegram messages.

![BRO Launcher](https://github.com/makhnanov/php8.2-simple-telegram-personal-form/blob/master/img/page.png?raw=true)
![BRO Launcher](https://github.com/makhnanov/php8.2-simple-telegram-personal-form/blob/master/img/tg.png?raw=true)

```shell
git clone git clone https://github.com/makhnanov/php8.2-simple-telegram-personal-form.git && \
    cd php8.2-simple-telegram-personal-form
```
```shell
make && \
xdg-open http://localhost:44353/ && \
xdg-open https://t.me/qwertsxfgdfg && \
sleep 20 && \
curl --location 'http://localhost:44353/' \
     --form 'user_name="NoEmail"' \
     --form 'user_phone="NoEmail"' \
     --form 'user_email[]="bad email 1"' \
     --form 'user_email[]="Array Not String"'
```