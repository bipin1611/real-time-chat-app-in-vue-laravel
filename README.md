# Real Time Chat App in Vue and Laravel

Build a real time chat app with Laravel, Vue.js and Pusher. You are able to chat with multiple users on the site.

## Getting Started

Clone the project repository by running the command below 

```
git clone https://github.com/bipin1611/real-time-chat-app-in-vue-laravel.git
```

After cloning,run:

```
composer update
```
make sure that you have installed [Composer](https://getcomposer.org/).


Duplicate `.env.example` and rename it `.env`

Then run:

```
php artisan key:generate
```

### Setup Pusher

If you don't have one already, you can create a free Pusher account at [https://pusher.com/](https://pusher.com/) then login to your dashboard and create an app.

Set the `BROADCAST_DRIVER` in your `.env` file to **pusher**:

```
BROADCAST_DRIVER=pusher
```

Then fill in your Pusher app credentials in your `.env` file:

```
PUSHER_APP_ID=xxxxxx
PUSHER_APP_KEY=xxxxxxxxxxxxxxxxxxxx
PUSHER_APP_SECRET=xxxxxxxxxxxxxxxxxxxx
PUSHER_APP_CLUSTER=xxx
```

#### Database Migrations

Be sure to fill in your database details in your `.env` file before running the migrations:

```
php artisan migrate
```

And Last, start the application: by running,

```
php artisan serve
```

and visit [http://localhost:8000/](http://localhost:8000/) to see the application in action.

## Built With

* [Pusher](https://pusher.com/) - APIs to enable devs building realtime features
* [Laravel](https://laravel.com) - The PHP Framework For Web Artisans
* [Vue.js](https://vuejs.org) - The JavaScript Framework

