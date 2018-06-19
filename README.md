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
cd /vagrant/ui
composer install
cd /vagrant/api
composer install
``` 

now you can call http://ui.demo.test 
