.PHONY: styles
.PHONY: install
.PHONY: preserve

styles: # Only makes the styles from the main sass file
	sass --no-cache ./sass/main.sass ./css/main.css

install: # Installs all repo files to web server
	cat /var/www/html/poll/selected.txt > ./poll/last.txt
	cat /var/www/html/poll/poll_result.txt >> ./poll/last.txt
	rm -r /var/www/html/*
	cp -a ./* /var/www/html
	chown www-data:www-data /var/www/html/poll/*
	service apache2 restart

preserve: # Preserves the current poll without overwriting it
	cat /var/www/html/poll/selected.txt > ./poll/selected.txt
	cat /var/www/html/poll/poll_result.txt > ./poll/poll_result.txt