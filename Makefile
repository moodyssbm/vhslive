.PHONY: styles

styles: 
	sass --no-cache ./sass/main.sass ./css/main.css

.PHONY: install

install:
	sudo rm -r /var/www/html/*
	sudo cp -a ./* /var/www/html
