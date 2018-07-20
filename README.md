# symfony-demo-ui
Symfony Demo Project with sign-in, sign-up, security, scss, web pack encore, user profile.  

# installation

``` 
git clone git@github.com:ofeige/symfony-demo-vagrant.git
cd symfony-demo-vagrant
git clone git@github.com:ofeige/symfony-demo-ui.git ui
git clone git@github.com:ofeige/symfony-demo-api.git api
``` 

read the README.md from vagrant project in this folder (or here https://github.com/ofeige/symfony-demo-vagrant/blob/master/README.md) and follow the instruction

after succesfull build of vagrant run:
``` 
vagrant ssh
cd /vagrant/api
composer install
cd /vagrant/ui
composer install
yarn install
yarn run encore production 
``` 

now we have to setup the database! simply run composer
``` 
composer setup-clean-db
``` 

now you can call http://ui.demo.test 
you can login as admin with 

user: admin@example.com
pass: test

or as user with
user: demo@example.com
pass: test
