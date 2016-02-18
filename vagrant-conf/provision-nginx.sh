#!/bin/bash


php_config_file="/etc/php5/fpm/php.ini"
xdebug_config_file="/etc/php5/mods-available/xdebug.ini"
mysql_config_file="/etc/mysql/my.cnf"
document_root_zend="/var/www/zf"
document_public_zend="${document_root_zend}/public"

# This function is called at the very bottom of the file
main() {
	repositories_go
	update_go
	network_go
	tools_go
	nginx_go
	mysql_go
	php_go
        phpmyadmin_go
        maj_composer_Project
	autoremove_go
}

repositories_go() {
	echo "NOOP"
}

update_go() {
	# Update the server
	apt-get update
	# apt-get -y upgrade
}

autoremove_go() {
	apt-get -y autoremove
}

network_go() {
	IPADDR=$(/sbin/ifconfig eth0 | awk '/inet / { print $2 }' | sed 's/addr://')
	sed -i "s/^${IPADDR}.*//" /etc/hosts
	echo ${IPADDR} ubuntu.localhost >> /etc/hosts			# Just to quiet down some error messages
}

tools_go() {
	# Install basic tools
	apt-get -y install build-essential binutils-doc git subversion
}

nginx_go() {
    apt-get -y install nginx php5-fpm

    sudo rm /etc/nginx/sites-available/default
    sudo touch /etc/nginx/sites-available/default

#    sudo cat >> /etc/nginx/sites-available/default <<'EOF'
    sudo cat << EOF > /etc/nginx/sites-available/default
server {
  listen   80;
  root ${document_public_zend};
  index index.php index.html index.htm;
  # Make site accessible from http://localhost/
  server_name _;
  location / {
    # First attempt to serve request as file, then
    # as directory, then fall back to index.html
    try_files \$uri \$uri/ /index.php$is_args$args;
  }
  location /doc/ {
    alias /usr/share/doc/;
    autoindex on;
    allow 127.0.0.1;
    deny all;
  }
  # redirect server error pages to the static page /50x.html
  #
  error_page 500 502 503 504 /50x.html;
  location = /50x.html {
    root /usr/share/nginx/html;
  }
  # pass the PHP scripts to FastCGI server listening on /tmp/php5-fpm.sock
  #
  location ~ \.php$ {
    try_files \$uri =404;
    fastcgi_split_path_info ^(.+\.php)(/.+)$;
    fastcgi_pass unix:/var/run/php5-fpm.sock;
    fastcgi_index index.php;
    include fastcgi_params;
  }
  # deny access to .htaccess files, if Apache's document root
  # concurs with nginx's one
  #
  location ~ /\.ht {
    deny all;
  }
  ### phpMyAdmin ###
  location /phpmyadmin {
    root /usr/share/;
    index index.php index.html index.htm;
    location ~ ^/phpmyadmin/(.+\.php)$ {
      client_max_body_size 4M;
      client_body_buffer_size 128k;
      try_files \$uri =404;
      root /usr/share/;
      # Point it to the fpm socket;
      fastcgi_pass unix:/var/run/php5-fpm.sock;
      fastcgi_index index.php;
      fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
      include /etc/nginx/fastcgi_params;
    }
    location ~* ^/phpmyadmin/(.+\.(jpg|jpeg|gif|css|png|js|ico|html|xml|txt)) {
      root /usr/share/;
    }
  }
  location /phpMyAdmin {
    rewrite ^/* /phpmyadmin last;
  }
  ### phpMyAdmin ###
}
EOF

    sudo touch /usr/share/nginx/html/info.php
    sudo cat >> /usr/share/nginx/html/info.php <<'EOF'
<?php phpinfo(); ?>
EOF
    sudo service nginx restart
    sudo service php5-fpm restart
}

php_go() {
	apt-get -y install php5 php5-cli php5-curl php5-mysql php5-sqlite php5-xdebug php5-intl

	sed -i "s/display_startup_errors = Off/display_startup_errors = On/g" ${php_config_file}
	sed -i "s/display_errors = Off/display_errors = On/g" ${php_config_file}

	if [ -f "${xdebug_config_file}" ]; then
		cat << EOF > ${xdebug_config_file}
;;zend_extension=xdebug.so
xdebug.remote_handle=dbgp
xdebug.remote_enable=1
xdebug.remote_connect_back=1
xdebug.remote_port=9000
xdebug.idekey=netbeans-xdebug
xdebug.remote_mode="req"
EOF
	fi

    sudo service nginx restart
    sudo service php5-fpm restart
}

mysql_go() {
	# Install MySQL
	echo "mysql-server mysql-server/root_password password root" | debconf-set-selections
	echo "mysql-server mysql-server/root_password_again password root" | debconf-set-selections
	apt-get -y install mysql-client mysql-server

	sed -i "s/bind-address\s*=\s*127.0.0.1/bind-address = 0.0.0.0/" ${mysql_config_file}

	# Allow root access from any host
	echo "GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY 'root' WITH GRANT OPTION" | mysql -u root --password=root
	echo "GRANT PROXY ON ''@'' TO 'root'@'%' WITH GRANT OPTION" | mysql -u root --password=root

	if [ -d "/vagrant/vagrant-conf/provision-sql" ]; then
		echo "Executing all SQL files in /vagrant/provision-sql folder ..."
		echo "-------------------------------------"
		for sql_file in /vagrant/vagrant-conf/provision-sql/*.sql
		do
			echo "EXECUTING $sql_file..."
	  		time mysql -u root --password=root < $sql_file
	  		echo "FINISHED $sql_file"
	  		echo ""
		done
	fi

	service mysql restart

}

phpmyadmin_go(){
    # Default PHPMyAdmin Settings
    debconf-set-selections <<< 'phpmyadmin phpmyadmin/dbconfig-install boolean true'
    debconf-set-selections <<< 'phpmyadmin phpmyadmin/app-password-confirm password root'
    debconf-set-selections <<< 'phpmyadmin phpmyadmin/mysql/admin-pass password root'
    debconf-set-selections <<< 'phpmyadmin phpmyadmin/mysql/app-pass password root'
    debconf-set-selections <<< 'phpmyadmin phpmyadmin/reconfigure-webserver multiselect apache2'

    # Install PHPMyAdmin
    apt-get install -y phpmyadmin
}

maj_composer_Project(){
    sudo apt-get -y install curl
    # Install latest version of Composer globally
    if [ ! -f "/usr/local/bin/composer" ]; then
            curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
    fi

    # Install PHP Unit 4.8 globally
    if [ ! -f "/usr/local/bin/phpunit" ]; then
            curl -O -L https://phar.phpunit.de/phpunit-old.phar
            chmod +x phpunit-old.phar
            mv phpunit-old.phar /usr/local/bin/phpunit
    fi

    cd ${document_root_zend}
    curl -Ss https://getcomposer.org/installer | php
    php composer.phar install --no-progress
}
main
exit 0