1. Što je potrebno: 
    - instaliran lokalni server npr. laragon ili xampp
    
2. Pokrenuti komandu: git clone https://github.com/Nebra98/ep_projekt , ili Download ZIP
    
3. Nakon što ste preuzeli datoteku, potrebno je da se navigirate u nju preko terminala ili cmd-a
 
4. Nakon što ste se navigirali potrebno je pokrenuti komandu: composer install

5. Pokrenuti komandu: cp .env.example .env 

6. Napraviti novu bazu podataka na lokalnom serveru (npr. ime: baza)

7. U .env fileu podesiti parametre za spajanje s bazom podataka: 
    - DB_CONNECTION=mysql
    - DB_HOST=127.0.0.1
    - DB_PORT=3306
    - DB_DATABASE=ime_baze_podataka
    - DB_USERNAME=root
    - DB_PASSWORD=
            
8. Pokrenuti komandu: php artisan key:generate 

9. Pokrenuti komandu: php artisan storage:link

10. Pokrenuti komandu: php artisan migrate
 
11. Pokrenuti lokalni server: php artisan serve

Podaci za logiranje kao admin user su:
- email: admin@admin.com
- pass: password
