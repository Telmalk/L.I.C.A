migrate:
	mysql -u root -p < bdd/0-init.sql
	mysql -u root -p lica < bdd/lica.sql