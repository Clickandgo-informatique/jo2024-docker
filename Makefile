# Nom du projet Docker, utilisé pour identifier les conteneurs
PROJECT_NAME=jo2024-docker

# ----------------------
# Cycle de vie Docker
# ----------------------

# Build complet : arrêt des conteneurs, suppression des volumes et reconstruction
build:
	docker-compose down --volumes --remove-orphans
	docker system prune -af
	docker-compose build --no-cache

# Lancement des conteneurs en arrière-plan
up:
	docker-compose up -d

# Arrêt des conteneurs et suppression des volumes orphelins
down:
	docker-compose down --volumes --remove-orphans

# Redémarrage complet : down + build + up
restart:
	docker-compose down --volumes --remove-orphans
	docker-compose build --no-cache
	docker-compose up -d

# Affichage des logs en temps réel
logs:
	docker-compose logs -f

# ----------------------
# Accès aux conteneurs
# ----------------------

# Accès au conteneur PHP en bash interactif
php:
	docker exec -it $(PROJECT_NAME)_php bash

# Accès au conteneur Nginx en shell
nginx:
	docker exec -it $(PROJECT_NAME)_nginx sh

# Accès au conteneur base de données en bash
db:
	docker exec -it $(PROJECT_NAME)_db bash

# ----------------------
# Outils web
# ----------------------

# Accès à PhpMyAdmin
pma:
	open http://localhost:8081

# Accès à MailHog
mailhog:
	open http://localhost:8025

# ----------------------
# Symfony CLI
# ----------------------

# Exécuter la console Symfony dans le conteneur PHP
symfony:
	docker exec -it $(PROJECT_NAME)_php php bin/console

# Vider le cache Symfony
cache-clear:
	docker exec -it $(PROJECT_NAME)_php php bin/console cache:clear

# ----------------------
# Commandes Symfony Doctrine
# ----------------------

# Appliquer les migrations
migrate:
	docker exec -i $(PROJECT_NAME)_php php bin/console doctrine:migrations:migrate --no-interaction

# Générer une migration
migration:
	docker exec -i $(PROJECT_NAME)_php php bin/console make:migration --no-interaction

# Charger les fixtures
fixtures:
	docker exec -i $(PROJECT_NAME)_php php bin/console doctrine:fixtures:load --no-interaction

# Mettre à jour le schéma de la base
schema-update:
	docker exec -i $(PROJECT_NAME)_php php bin/console doctrine:schema:update --force

# ----------------------
# Réinitialisation complète de la base de données
# ----------------------
reset-db:
	# Création de la base si elle n'existe pas
	docker exec -i $(PROJECT_NAME)_db mysql -u root -proot -e "CREATE DATABASE IF NOT EXISTS jo2024 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
	# Suppression de la base de test existante
	docker exec -i $(PROJECT_NAME)_php php bin/console doctrine:database:drop --force --if-exists --env=test
	# Création de la base de test
	docker exec -i $(PROJECT_NAME)_php php bin/console doctrine:database:create --if-not-exists --env=test
	# Application des migrations
	docker exec -i $(PROJECT_NAME)_php php bin/console doctrine:migrations:migrate --no-interaction --env=test
	# Chargement des fixtures
	docker exec -i $(PROJECT_NAME)_php php bin/console doctrine:fixtures:load --no-interaction --env=test

# ----------------------
# Tests PHPUnit
# ----------------------

# Lancer tous les tests en mode test
test:
	clear
	docker exec -i -e APP_ENV=test $(PROJECT_NAME)_php php bin/phpunit --testdox --colors=always

# ----------------------
# Déploiement OVH
# ----------------------

# Connexion SSH sur le serveur OVH
ovh:
	ssh -t clickandug@ssh.cluster011.hosting.ovh.net 'cd jo2024-docker && bash --login -i'

# Installation des dépendances Symfony sur OVH
composer-ovh:
	ssh clickandug@ssh.cluster011.hosting.ovh.net 'cd jo2024-docker && composer install --no-dev --optimize-autoloader'

# Nettoyage du cache Symfony sur OVH
cache-clear-ovh:
	ssh clickandug@ssh.cluster011.hosting.ovh.net 'cd jo2024-docker && php bin/console cache:clear --env=prod && php bin/console cache:warmup --env=prod'

# Réinitialisation OPcache sur OVH
opcache-reset-ovh:
	ssh clickandug@ssh.cluster011.hosting.ovh.net 'php -r "opcache_reset();"'

# Déploiement complet sur OVH
deploy-ovh:
	ssh clickandug@ssh.cluster011.hosting.ovh.net '\
		cd jo2024-docker && \
		git pull origin main && \
		composer install --no-dev --optimize-autoloader && \
		php bin/console cache:clear --env=prod && \
		php bin/console cache:warmup --env=prod && \
		php -r "opcache_reset();" \
	'

# ----------------------
# Documentation Markdown
# ----------------------

# Liste tous les fichiers Markdown dans le dossier docs/
docs-index:
	@echo "📚 Fichiers Markdown disponibles dans /docs :"
	@find docs -type f -name "*.md" | sed 's/^/- /'
