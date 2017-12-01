.PHONY: styles

styles: 
	sass --no-cache ./sass/main.sass ./css/main.css

.PHONY: install

install:
	cat /var/www/html/poll/selected.txt > ./poll/last.txt
	cat /var/www/html/poll/poll_result.txt >> ./poll/last.txt
	cp /var/www/html/poll/* ./poll/
	rm -r /var/www/html/*
	cp -a ./* /var/www/html
	chown www-data:www-data /var/www/html/*
	service apache2 restart
