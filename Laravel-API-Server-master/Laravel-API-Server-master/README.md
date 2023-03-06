<p align="center"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

<span>Application made with Laravel 8 that consists of the creation of a CRUD of a games api that contains the following functionalities:</span>
<ul>
  <li>Relationships between different models with polymorphic tables.</li>
  <li>Contains endpoints of type GET, POST, PUT and DELETE</li>
  <li>Some endpoints contain the function of sending files and the files are stored locally.</li>
  <li>Implementation of API Dropbox in the <a href="https://github.com/JAVI-CC/Laravel-API-Server/tree/dropbox">dropbox</a> branch the difference with the master branch is that in the dropbox branch it is configured so that the files that are sent through the api are saved in a shared Dropbox directory instead of a local directory of the project.</li>
  <li>Postman collection.json file to import and create use endpoints.</li>
  <li>Resource file to show the values of some endpoints in a personalized way.</li>
  <li>Requests validations.</li>
  <li>Exception handling.</li>
  <li>Traits.</li>
  <li>Migration file to create all the tables in the database.</li>
  <li>File seeder with +50 games to insert the data into the database.</li>
  <li>Seeders are in JSON format</li>
  <li>It is compatible with PHP 8</li>
  <li>Search filters of the games that are inserted in the database.</li>
  <li>Websockets with Pusher.</li>
  <li>Documentation of all the api enpoints with the Laravel Swagger 3.0.</li>
  <li>Users can be registered through the Api and it contains authentication by Sanctum to be able to carry out the action of some endpoints.</li>
  <li>The Api is uploaded in railway <a href="https://laravel-api-server.up.railway.app/api/juegos" target="_blank">https://laravel-api-server.up.railway.app</a> so that users can use the endpoints without having to download the project.</li>
  <li>The project contains the files to deploy it in Docker.</li>
  <li>Demonstration of a <b>Laravel</b> project on the client interface side using this api <a href="https://github.com/JAVI-CC/Laravel-API-Client" target="_blank">https://github.com/JAVI-CC/Laravel-API-Client</a>.</li>
  <li>Demonstration of a <b>VUE 3 and Quasar Framework</b> project on the client interface side using this api <a href="https://github.com/JAVI-CC/VUE3-API-client" target="_blank">https://github.com/JAVI-CC/VUE3-API-client</a>.</li>
</ul> 

<h3>Demo API</h3>
<p><a href="https://laravel-api-server.up.railway.app/api/juegos" target="_blank">https://laravel-api-server.up.railway.app</p>

<h3>Documentation API SWAGGER 3.0</h3>
<p><a href="http://laravel-api-server.up.railway.app/api/documentation" target="_blank">http://laravel-api-server.up.railway.app/api/documentation</p>

<h3>Laravel Api client interface</h3>
<p><a href="https://github.com/JAVI-CC/Laravel-API-Client" target="_blank">https://github.com/JAVI-CC/Laravel-API-Client</a></p>

<h3>VUE 3 and Quasar Framework Api client interface</h3>
<p><a href="https://github.com/JAVI-CC/VUE3-API-client" target="_blank">https://github.com/JAVI-CC/VUE3-API-client</a></p>


<h3>Headers</h3>
<table>
<thead>
<tr>
<th>Key</th>
<th>Value</th>
</tr>
</thead>
<tbody>
<tr>
<td>Authorization</td>
<td>{Token provided by Sanctum}</td>
</tr>
<tr>
<td>Accept</td>
<td>application/json</td>
</tr>
<tr>
<td>Content-Type</td>
<td>application/json</td>
</tr>
</tbody>
</table>

<h3>Setup</h3>
<pre>
<code>$ composer install && php artisan key:generate && php artisan migrate --seed</code>
</pre>

<hr>

<h3>Endpoints Games:</h3>
<table>
<thead>
<tr>
<th>Method</th>
<th>Path</th>
<th>Description</th>
<th>Auth</th>
</tr>
</thead>
<tbody>
<tr>
<td>GET</td>
<td>/api/juegos</td>
<td>Get all the games</td>
<td>No</td>
</tr>
<tr>
<td>POST</td>
<td>/api/juegos/</td>
<td>Add a game</td>
<td>Yes</td>
</tr>
<tr>
<td>GET</td>
<td>/api/juegos/{slug}</td>
<td>Get a game</td>
<td>No</td>
</tr>
<tr>
<td>POST</td>
<td>/api/juegos/edit</td>
<td>Update a game</td>
<td>Yes</td>
</tr>
<tr>
<td>DELETE</td>
<td>/api/juegos/delete/{slug}</td>
<td>Delete a game</td>
<td>Yes</td>
</tr>
<tr>
<td>POST</td>
<td>/api/juegos/filter/search</td>
<td>Search games</td>
<td>No</td>
</tr>
<tr>
<td>GET</td>
<td>/api/juegos/desarrolladoras/{slug}</td>
<td>Get games from a developer</td>
<td>No</td>
</tr>
<tr>
<td>GET</td>
<td>/api/juegos/desarrolladoras/show/all</td>
<td>Get list all developers</td>
<td>No</td>
</tr>
<tr>
<td>GET</td>
<td>/api/juegos/generos/{slug}</td>
<td>Get games from a genere</td>
<td>No</td>
<tr>
<td>GET</td>
<td>/api/juegos/generos/show/all</td>
<td>Get list all generes</td>
<td>No</td>
</tr>
<tr>
<td>GET</td>
<td>/api/juegos/paginate</td>
<td>Get paginate games</td>
<td>No</td>
</tr>
<tr>
<td>GET</td>
<td>/api/juegos/random</td>
<td>Get random games</td>
<td>No</td>
</tr>
</tbody>
</table>

<h3>Endpoints User:</h3>
<table>
<thead>
<tr>
<th>Method</th>
<th>Path</th>
<th>Description</th>
<th>Auth</th>
</tr>
</thead>
<tbody>
<tr>
<td>POST</td>
<td>/api/auth/register</td>
<td>Register a user</td>
<td>No</td>
</tr>
<tr>
<td>POST</td>
<td>/api/auth/login</td>
<td>Login a user</td>
<td>No</td>
</tr>
<tr>
<td>GET</td>
<td>/api/auth/userinfo</td>
<td>To view a user information</td>
<td>Yes</td>
</tr>
<tr>
<td>GET</td>
<td>/api/auth/check</td>
<td>Check if user authenticated</td>
<td>No</td>
</tr>
<tr>
<td>POST</td>
<td>/api/auth/logout</td>
<td>Log out a user</td>
<td>Yes</td>
</tr>
<tr>
<td>DELETE</td>
<td>/api/auth/delete</td>
<td>Delete user authenticated</td>
<td>Yes</td>
</tr>
</tbody>
</table>

<h4><a href="http://laravel-api-server.up.railway.app/api/documentation" target="_blank">Attributes</a></h4>

<br>

<h2>Start the websockets with Pusher (Optional)</h2>
<pre><code>1. In your <a href="https://pusher.com/" target="_blank">Pusher account</a> create a channel called: <strong>juegos-api</strong></code></pre>
<pre><code>2. Enter the file: <strong>.env</strong></code></pre>
<pre><code>3. fill in the following credentials:
<strong>PUSHER_APP_ID=</strong>{App Keys in the channel juegos-api app_id}
<strong>PUSHER_APP_KEY=</strong>{App Keys in the channel juegos-api key}
<strong>PUSHER_APP_SECRET=</strong>{App Keys in the channel juegos-api secret}
<strong>PUSHER_APP_CLUSTER=</strong>{App Keys in the channel juegos-api cluster}
</code></pre>

<br>

<h2>Deploy to Docker <g-emoji class="g-emoji" alias="whale" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f433.png">🐳</g-emoji></h2>

<h4>Containers:</h4>
<ul>
<li><span>nginx:alpine</span> - <code>:8000->80/tcp</code></li>
<li><span>mariadb:latest</span> - <code>:3306</code></li>
<li><span>php:8.0.6-fpm</span> - <code>:9000</code></li>
</ul>

<h4>Containers structure:</h4>
<div class="highlight highlight-source-shell"><pre>├── laravel-api-server-app
├── laravel-api-server-web
└── laravel-api-server-db</pre></div>

<h4>Setup:</h4>
<pre>
<code>$ git clone https://github.com/JAVI-CC/Laravel-API-Server.git
$ cd Laravel-API-Server
$ cp .env.example .env
$ docker-compose up -d
$ docker-compose exec --user=root app chmod -R 777 /var/www/
$ docker-compose exec app composer install
$ docker-compose exec app php artisan key:generate
$ docker-compose exec app php artisan migrate --seed</code>
</pre>

<span>Once you have the containers deployed, you can access the API at </span> <a href="http://localhost:8000" target="_blank">http://localhost:8000</a>
