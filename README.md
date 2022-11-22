

## How to run this?

The instructions assume that you have already installed [Docker](https://docs.docker.com/installation/) and [Docker Compose](https://docs.docker.com/compose/install/). 

- Clone this repository
    
    ```git clone https://github.com/OlehBendryk/artifact_v1.0-laravel.git```
    
- Move to the directory 

    ```cd artifact_v1.0-laravel```
    
- Build all containers 
    
    ```docker-compose build```
    
- Update your depencencies
    
    ```composer update```

- Run all containers

    ```docker-compose run```
    
- Move to inside docker container 
    
    ```docker exec -it artefact bash```
    
- Run migration and seeder
    
    ```php artisan migrate --seed```

- App local link
    
    ```artefact.localtest.me```

- Credential 

    login ```admin@admin.com``` 
    
    password ```12121212```
    


