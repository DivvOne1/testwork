

Задача: Реализовать систему подтверждения смены конкретной настройки пользователя по коду из смс / email / telegram с возможностью выбора пользователем другого метода.

## Установка

Следуйте этим шагам, чтобы установить и запустить проект локально.

### 1. Установите зависимости
```
composer install
```
### 2. Настройте файл окружения

Скопируйте файл .env.example в новый файл .env:
```
cp .env.example .env
```
Откройте файл .env и настройте его в соответствии с вашими параметрами базы данных и другими важными настройками:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=имя_вашей_базы_данных
DB_USERNAME=ваш_пользователь
DB_PASSWORD=ваш_пароль

### 3. Создайте базу данных

Создайте базу данных с именем, указанным в вашем .env файле.

### 4. Запустите миграции

Используйте следующую команду, чтобы создать таблицы в базе данных:
```
php artisan migrate
```
### 5. Заполняйте данные (опционально)
```
php artisan db:seed
```
### 6. Установите сервер
```
php artisan serve
```
После выполнения команды вы сможете открыть проект в вашем браузере по адресу http://localhost:8000.

### 8.Установите npm зависимости и соберите фронтенд

Если у вас есть фронтенд-часть, выполните следующие команды:
```
npm install
npm run dev
```
