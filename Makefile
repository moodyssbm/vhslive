.PHONY: styles

styles: 
	sass --no-cache ./sass/main.sass ./css/main.css

.PHONY: install

install:
	rm -r /var/www/html/*
	cp -a ./* /var/www/html
	chown www-data:www-data /var/www/html/poll_result.txt
	service apache2 restart
