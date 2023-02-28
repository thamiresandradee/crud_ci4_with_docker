# CRUD in Codeigniter4-Mysql-Docker
Create docker container for Codeigniter 4.2.1

#### CRUD CodeIgniter 4 – Setup 1 ####
1. Edit env to .env
2. Start docker-compose up
3. Enter on container WEB: docker exec -it CONTAINER_NAME bash
4. Update Composer to install the vendor: composer update
5. Inside container WEB, run the migrations to install the tables to your project: php spark migrate
6. Inside container WEB, run the seeders to put some informations on your project: php spark db:seed UserSeeder AND php spark db:seed BookSeeder

Now, if you go in your browser to http://localhost you should see the CodeIgniter starter app.
If it doesn’t appear? Maybe we don’t have read write rights. Then go inside wsl, in your directory and type: sudo chmod 777 ./ -R

Thanks
Thamires Andrade
