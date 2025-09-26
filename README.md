## Installation (Docker):

- Clone the project from the repository to the current (or another) folder:

`git clone https://github.com/voky191/event-registration.git .`

- Navigate to the project directory:

`cd <project_directory>`

- Install the project dependencies by running:

`docker run --rm -v $(pwd):/app composer:latest install --ignore-platform-reqs`

- Copy the `.env.example` file to `.env`:

`cp .env.example .env`

- Set up a password to the database and (if needed) forwarding ports in the `.env` file


- Build and start container

`sail up -d`

- Set the application key:

`sail artisan key:generate`

- Run the migrations with seeders:

`sail artisan migrate --seed`

- Go to `http://localhost` (specify port in url if `APP_PORT` was changed in `.env`)
