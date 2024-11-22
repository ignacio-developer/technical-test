## About Software Development @ Cyberhawk

## The task
We've designed this task to try and give you the ability to show us what you can do and hopefully flex your technical and creative muscles. You can't show off too much here, show us you at your best and wow us!

To make things as simple as we could, we've opted to use [Laravel Sail](https://laravel.com/docs/8.x/sail) to provide a quick and convenient development environment, this will require you to install
[Docker Desktop](https://www.docker.com/products/docker-desktop) before you can start the test. We've provided [some more detailed instructions](#setting-everything-up) below in case this is your first time using Docker or Sail.

We'd like you to build an application that will display an example wind farm, its turbines and their components.
We'd like to be able to see components and their grades (measurement of damage/wear) ranging between 1 - 5.

For example, a turbine could contain the following components:
- Blade
- Rotor
- Hub
- Generator

Don't worry about using real names for components or accurate looking data, we're more interested in how you structure the application and how you present the data.

Don't be afraid of submitting incomplete code or code that isn't quite doing what you would like, just like your maths teacher, we like to see your working.
Just Document what you had hoped to achieve and your thoughts behind any unfinished code, so that we know what your plan was.

### Requirements
- Display a list of turbine inspections
- Each Turbine should have a number of components
- A component can be given a grade from 1 to 5 (1 being perfect and 5 being completely broken/missing)
- Use Laravel Models to represent the Entities in the task.

### Bonus Points
- Great UX/UI
- Use of React JS
- Use of Tailwind CSS
- Use of 3D
- Use of a web map technology in the display of the data
- Automated tests
- API Authentication
- Use of coding style guidelines (we use PSR-12 and AirBnb)
- Use of git with clear logical commits
- Specs/Plans/Designs

### Submitting The Task
Ideally you will fork this repo, work on it then email us with details of where to access it.
Alternatively you can download locally and email us a zip of your completed work.

## Setting Everything Up
As mentioned above we have chosen to make use of Laravel Sail as the foundation of this technical test.
- If you haven't already, you will need to install [Docker Desktop](https://www.docker.com/products/docker-desktop).
- One that is installed your next step is to install this projects composer dependencies (including Sail).
    - This will require either PHP 8 installed on your local machine or the use of [a small docker container](https://laravel.com/docs/8.x/sail#installing-composer-dependencies-for-existing-projects) that runs PHP 8 that can install the dependencies for us.
- If you haven't done so already copy the `.env.example` file to `.env`
    - If you are running a local development environment you may need to change some default ports in the `.env` file
        - We've already changed mysql to 33060 and NGINX to 81 for you
- It should now be time to [start Sail](https://laravel.com/docs/8.x/sail#starting-and-stopping-sail) and the task

### Installing Composer Dependencies
https://laravel.com/docs/9.x/sail#installing-composer-dependencies-for-existing-projects
```bash
docker run --rm \
-u "$(id -u):$(id -g)" \
-v $(pwd):/var/www/html \
-w /var/www/html \
laravelsail/php81-composer:latest \
composer install --ignore-platform-reqs
```

## Your Notes
This is a place for you to add your notes, plans, thinking and any feedback you have for us of the task, please feel free to include whatever you like here, we'll make sure to read it. 

## My Notes:


I started by reading the whole task specifications and proceeded with setting up the environment. I installed Docker Desktop, configured my environment file, checked my ports and I learnt more about Laravel Sail.

So to set this project up and test it follow the next steps:

- Clone this repository: git clone https://github.com/cologiamp/technical-test.git 
- Install Docker Desktop
- Inside the repository folder, install Composer dependencies by running:
    * docker run --rm \
    * -u "$(id -u):$(id -g)" \
    * -v $(pwd):/var/www/html \
    * -w /var/www/html \
    * laravelsail/php81-composer:latest \
    * composer install --ignore-platform-reqs

- Copy .env.example to .env file.
- Run: composer install, if error: composer --ignore-platform-req=php update
- Run: npm install
- Run: npm run dev
- Run: ./vendor/bin/sail up 
        - (In case of error: if you are in a MacBook (with MacBook chip m1, m2, etc.), please add to docker-compose.yml the next lines):
        -     selenium:
        -         platform: linux/amd64
- And check at your browser: http://localhost:81/
  
- php artisan key:generate
- To run migrations and seeders the config at .env (should be DB_HOST=127.0.0.1), then:
    - php artisan migrate
    - php artisan db:seed
 
- If you are unable to get API responses (lists). Please set the .env config to -> DB_HOST=mysql


Once you are here you should be able to see welcomed to the Wind Farm App!
-----------------------------------------------------------------------------------
Key points I consider during the development process.

I decided to implement the solution by having three main entities: Turbines, Components and Inspections.

I proceeded to design the database structure (tables, fields/columns and their types, relationships).

Turbine: id(int), name(string), timestamps.
Component: id(int), turbine_id(foreign key to Turbine->id), name(string), timestamps.
Inspections: id(int), turbine_id(foreign key to Turbine->id), title(string), notes(string), timestamps.
Inspection_components: id(int), turbine_id(foreignKey to Turbine->id), component_id(foreignKey to Component->id), grade(int + check(1-5)).

Here some questions came up. And with them, some answers that I would love to discuss. Like why did I choose this way to for the app model design.  How would I relate them? Do I need a Grade column for the Components table? Should I be updating it every time there is an inspection?

So I decided that the relationships were going to be:
- A Inspection belongsTo a Turbine.
- A Turbine hasMany Components.
- And a Inspection will assign a Grade to a component from a turbine (in the inspection_component table).

I created Seeders to populate the database: with at least 5 turbines records with 4 of the mentioned components (Rotor, Hub, Blade, Generator) and also at least 3 inspections per turbine.

From then on, I decided to develop Laravel API, using models and repositories to post and get the data from the DB. And controllers through services to communicate with the models.

I made use of ReactJS, Tailwind CSS for the frontend (by using plugins like npm install react-doc and babel).

And while coding the frontend I was adding the routes to the routes/api.php and set up the routes/web.php (React will manage all the routes). 
Created the homepage, the turbine and the inspections lists components. And opted for using fetch() and response.json() for the http request to the Laravel API.

Note: I used GitHub during the whole process, pushed commits and created a PR (approved and merged) from ‘staging’ into ‘main’ branch that will make easier to see the added/edited files: PR Link: .

Key parts missing, “TO DO”: CRUD approach, feature to add Turbines, Components and/or inspections. API Authentication through Sanctum and an api token (header). Unit Testing. And doubts regarding Docker setup and ReactJS.
