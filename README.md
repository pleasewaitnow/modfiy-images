<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Hi!

This is a sample project for modifying images.

Please, clone the project and open it. Next, you need to run docker.

Either run it in: 

```
docker-compose up -d
```

Then you get the visual explanation on how to use the API:


There are 3 images provided to the API in the /public folder:

```
happy.jpg
xbox.png
planty.jpg
```

There are 2 sets of modifiers supported:

```
?resize_height=X&resize_width=X
OR
?crop_height=X&crop_width=X
```

It automatically makes the file and redirects.


## Where is the code?

the code is in the /Task folder.

## Where are the tests?

the tests are in the /tests folder.




## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
