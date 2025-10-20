# Manuel des Tests et Commandes – JO 2024 Symfony 7

## Table des matières

1. [Prérequis](#prérequis)  
2. [Structure Docker](#structure-docker)  
3. [Démarrage du projet](#démarrage-du-projet)  
4. [Préparation du cache et logs](#préparation-du-cache-et-logs)  
5. [Exécution des tests PHPUnit](#exécution-des-tests-phpunit)  
6. [Rapport de couverture (Coverage)](#rapport-de-couverture-coverage)  
7. [Tests spécifiques](#tests-spécifiques)  
8. [Commandes Symfony utiles](#commandes-symfony-utiles)  
9. [Notes et bonnes pratiques](#notes-et-bonnes-pratiques)  

---

## Prérequis

- Docker & Docker Compose installés.  
- Projet cloné sur ton poste : `/path/to/jo2024-docker/app`.  
- Conteneur PHP-FPM configuré via le Dockerfile fourni.  
- **Xdebug installé** dans le conteneur PHP pour la couverture des tests.

---

## Structure Docker

| Service | Description | Ports |
|---------|------------|-------|
| `php` | PHP-FPM avec Symfony 7 | - |
| `web` | Nginx | 8080 → 80 |
| `db` | MySQL 8 | 3307 → 3306 |
| `phpmyadmin` | PhpMyAdmin | 8081 → 80 |
| `mailhog` | MailHog SMTP/Web | 1025/8025 |
| `redis` | Redis | 6379 |

Le code source est monté en volume dans `/var/www/symfony` pour `php` et `web`.

---

## Démarrage du projet

1. Construire et lancer les containers :

```bash
docker-compose up -d --build
```

2. Vérifier que tous les services tournent :

```bash
docker-compose ps
```

---

## Préparation du cache et logs

Symfony nécessite que `var/cache` et `var/log` soient accessibles à `www-data`.  

### Avec l’entrypoint fourni

- Le script `docker/php/entrypoint.sh` crée automatiquement :

```text
var/cache
var/cache/test
var/log
```

- Les permissions et propriétaires sont correctement définis (`www-data:www-data`, chmod 775).  

### Manuel (si besoin)

```bash
docker exec -it jo2024-docker_php bash
mkdir -p var/cache var/cache/test var/log
chown -R www-data:www-data var/cache var/log
chmod -R 775 var/cache var/log
```

- Toujours utile si des erreurs “Unable to create cache directory” apparaissent.

---

## Exécution des tests PHPUnit

1. Se connecter au container PHP :

```bash
docker exec -it jo2024-docker_php bash
```

2. Nettoyer le cache pour l’environnement `test` :

```bash
php bin/console cache:clear --env=test
```

3. Lancer tous les tests :

```bash
./vendor/bin/phpunit
```

4. Lancer un test spécifique :

```bash
./vendor/bin/phpunit tests/Service/PasswordPolicyServiceTest.php
```

5. Lancer une méthode de test précise :

```bash
./vendor/bin/phpunit --filter testValidPassword tests/Service/PasswordPolicyServiceTest.php
```

---

## Rapport de couverture (Coverage)

### 1. Vérifier Xdebug

- Dans ton `php.ini` :

```ini
[xdebug]
xdebug.mode=coverage
xdebug.start_with_request=yes
```

- Dans le conteneur PHP, tester :

```bash
php -v
php -m | grep xdebug
```

### 2. Créer le dossier de coverage

```bash
mkdir -p var/coverage
chown -R www-data:www-data var/coverage
chmod -R 775 var/coverage
```

### 3. Exécuter PHPUnit avec coverage

- Coverage HTML :

```bash
./vendor/bin/phpunit --coverage-html var/coverage
```

- Coverage clover (utile pour CI/CD) :

```bash
./vendor/bin/phpunit --coverage-clover var/coverage/clover.xml
```

- Coverage textuelle (console) :

```bash
./vendor/bin/phpunit --coverage-text
```

### 4. Accéder au rapport HTML

- Après exécution, ouvrir `var/coverage/index.html` dans un navigateur :

```bash
xdg-open var/coverage/index.html   # Linux
open var/coverage/index.html       # macOS
```

- Ou copier le dossier `var/coverage` sur l’hôte et l’ouvrir.

> ⚠️ Assure-toi que le conteneur PHP a les permissions d’écriture sur `var/coverage`.

---

## Tests spécifiques

- **Entité Users** : `tests/Entity/UsersEntityTest.php`  
- **Service PasswordPolicyService** : `tests/Service/PasswordPolicyServiceTest.php`  

> Vérifie que les mots de passe respectent les règles de longueur, majuscule, chiffre, caractère spécial et entropie minimale.

---

## Commandes Symfony utiles

| Commande | Description |
|----------|-------------|
| `php bin/console cache:clear --env=dev` | Nettoyer le cache dev |
| `php bin/console cache:clear --env=test` | Nettoyer le cache test |
| `php bin/console doctrine:migrations:migrate` | Appliquer les migrations |
| `php bin/console doctrine:fixtures:load` | Charger les fixtures |
| `php bin/console server:run` | Lancer le serveur local Symfony (optionnel, en dev) |

---

## Notes et bonnes pratiques

- Toujours exécuter les tests dans l’environnement `test` :

```bash
php bin/console cache:clear --env=test
```

- Vérifier les permissions sur `var/cache`, `var/log` et `var/coverage`.  
- Créer un alias pour phpunit dans le container :

```bash
alias phpunit="./vendor/bin/phpunit"
```

- Pour exécuter les tests depuis l’extérieur du container, créer un script shell avec `docker exec`.

- Coverage utile pour vérifier le pourcentage de code testé et détecter les méthodes non couvertes.

