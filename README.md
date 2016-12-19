# Welcome to Slim Skeleton [McG]
* Develop based on Slim PHP microframework for lightweight and fast computing - full stack
* MVC & OOP
* HTML templating using .twig
* last develop: 14 Dec 2016

# Install
* open terminal and cd to your preferred folder to develop your project
* git clone git@bitbucket.org:mikegani/slim-skeleton.git
* after successfully cloned, cd to the repo
* on the root folder, type "composer install"

# Setup
* direct your server setting (i.e nginx) to route to /public/index.php
* rename file ".env_copy" to ".env"
* fill the necessary credentials on .env file
* create folder "storage" on the root path (for storing cache and log)
* chmod -R 775 on the storage folder

# Note
* please make sure you have installed php-curl
* please make sure you have installed php-fpm if you are using nginx
* after add new class (controller, service, core, etc), run "composer dumpautoload -o" to update the namespace

# Usage
* restart server after configuring (i.e nginx restart)
* open browser
* GET localhost:port               ==> (hello world)
* GET localhost:port/api/v1/token  ==> (generate JTW Token)
* start developing your routes on /route/develop.php (routing)
* have fun!

# MVC Hierarchy (in order):
1. Routing 
2. Controller
3. Service
4. Model

# Class Description:
1. Controller
Purpose: View & Render. First point of contact from routing
Return: JSON data or render HTML
Allow: 
call / include multiple Services
call / include Core, Constant
Not Allow:
call / include other Controller
call / include Models

2. Service 
Purpose: Database Operation (CRUD layer)
Return: Associative array
Allow: 
call / include multiple Models
call / include Core, Constant
Not Allow:
call / include other Service
call / include Controller

3. Model 
Purpose: Database Instance (Eloquent)
Return: Associative array
Allow: 
call / include Core, Constant
Not Allow:
call / include Service
call / include Controller

4. Core
Purpose: Helper function. Independent class.
Return: JSON or Assoc array
Allow:  
call / include Model
call / include other Core
Not Allow:
call / include Controller
call / include Service


#Middleware:
  - Please note that ALL POST methods are by default will go through JWT Middleware
  - Please input your routing on /app/middleware/rules/passthrough to by-pass

#Routing:
  - Toggle between develop and production routing by changing .ENV

#Database:
  - Currently, only support single RDS MySQL
  - Future support multiple RDS host, mongo
  - Database setting are set in .ENV

#Enum:
  - Use constant/definition for global constant and enum

#HTML:
  - should be managed in /component folder

#JS / CSS:
  - should be managed in /public


Please feel free to send me critics, suggestions or feedbacks.
I hope this could be beneficial to you!

Cheers,

Mike