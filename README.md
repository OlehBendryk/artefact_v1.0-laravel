

## How to run this?

The instructions assume that you have already installed [Docker](https://docs.docker.com/installation/) and [Docker Compose](https://docs.docker.com/compose/install/). 

- Clone this repository
    
    ```git clone https://github.com/OlehBendryk/Laravel-sms-email-service-sending.git```
    
- Move to the directory 

    ```cd Laravel-sms-email-service-sending```
    
- Build all containers 
    
    ```docker-compose build```
    
- Update your depencencies
    
    ```composer update```

- Run all containers

    ```docker-compose run```
    
- Move inside docker container 
    
    ```docker exec -it artefact bash```
    
- Run migration and seeder
    
    ```php artisan migrate --seed```

- App local link
    
    ```service.localtest.me```

- Credential 
    login ```admin@admin.com``` password ```12121212```
    


