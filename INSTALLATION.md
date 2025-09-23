## Le projet a été mis en ligne ici :

https://app.reservations-jo2024.clickandgo-informatique.com

Vous pouvez le tester en tant qu'administrateur avec

pseudo : adminjo2024

password : Admin-jo2024!


# Installation du projet Symfony avec Docker

Ce document décrit les étapes nécessaires pour installer et lancer l’environnement Docker du projet Symfony **JO2024**.

## ✅ Prérequis

Avant de commencer, assurez-vous d’avoir installé sur votre machine :
- [Docker](https://docs.docker.com/get-docker/) (>= 20.x recommandé)
- [Docker Compose](https://docs.docker.com/compose/install/) (>= 2.x recommandé)
- [Git](https://git-scm.com/downloads)

Vérifiez vos versions avec :
```bash
docker --version
docker compose version
git --version
```

---

## 📥 1. Récupération du projet

Clonez le dépôt GitHub :

```bash
git clone https://github.com/Clickandgo-informatique/jo2024-docker.git
cd jo2024-docker
```

---

## ⚙️ 2. Configuration des variables d’environnement

Le projet utilise Symfony et nécessite une configuration via des fichiers `.env`.

- Copiez le fichier `.env` de référence depuis l’exemple :

```bash
cp app/.env app/.env.local
```

- Vérifiez ou adaptez la variable de connexion à la base de données dans `app/.env.local` :

```dotenv
DATABASE_URL="mysql://jo2024:jo2024@db:3306/jo2024"
```

⚠️ **Important :**  
- `db` est le nom du conteneur MySQL défini dans `docker-compose.yml`.  
- Les identifiants (`jo2024/jo2024`) sont définis dans la configuration Docker.  
- Vous pouvez ajuster cette valeur si besoin.

---

## 🐳 3. Lancer les conteneurs Docker

Démarrez l’environnement avec :

```bash
docker compose up -d --build
```

Cela lance plusieurs services :
- `php` (Symfony / PHP-FPM)
- `nginx` (serveur web)
- `db` (MySQL 8.0)
- `phpmyadmin` (interface de gestion MySQL)
- `mailhog` (test des emails)
- `redis` (cache)

Vérifiez que les conteneurs tournent bien :

```bash
docker ps
```

---

## 🖼️ 4. Architecture Docker

Voici une représentation simplifiée de l’architecture des conteneurs :

```
                   ┌────────────┐
                   │   Nginx    │
                   │ :8080      │
                   └─────┬──────┘
                         │
                         ▼
┌────────────┐      ┌────────────┐
│   Mailhog  │      │    PHP     │
│ :8025      │◀────▶│  Symfony   │
└────────────┘      │  :9000     │
                     └─────┬──────┘
                           │
        ┌──────────────────┴───────────────────┐
        ▼                                      ▼
┌────────────┐                          ┌────────────┐
│   MySQL    │                          │   Redis    │
│ :3306      │                          │ :6379      │
└────────────┘                          └────────────┘

┌────────────┐
│ PhpMyAdmin │
│ :8081      │
└────────────┘
```

- **Nginx** → point d’entrée web, reverse proxy vers PHP.  
- **PHP (Symfony)** → exécute le code de l’application.  
- **MySQL** → base de données.  
- **PhpMyAdmin** → interface graphique pour MySQL.  
- **Mailhog** → capture et affiche les emails envoyés.  
- **Redis** → cache et sessions.  

---

## 📦 5. Installation des dépendances PHP

Installez les dépendances Symfony dans le conteneur `php` :

```bash
docker compose exec php composer install
```

---

## 🗃️ 6. Base de données et migrations

Créez la base et appliquez les migrations :

```bash
docker compose exec php php bin/console doctrine:database:create --if-not-exists
docker compose exec php php bin/console doctrine:migrations:migrate -n
```

Vous pouvez aussi charger les fixtures (si disponibles) :

```bash
docker compose exec php php bin/console doctrine:fixtures:load -n
```

---

## 🌐 7. Accéder au projet

- Application Symfony : http://localhost:8080  
- PhpMyAdmin : http://localhost:8081 (user: `jo2024`, pass: `jo2024`)  
- Mailhog (emails simulés) : http://localhost:8025  

---

## 🔧 8. Commandes utiles

- Redémarrer les conteneurs :
  ```bash
  docker compose restart
  ```

- Arrêter l’environnement :
  ```bash
  docker compose down
  ```

- Nettoyer les volumes (⚠️ supprime les données MySQL) :
  ```bash
  docker compose down -v
  ```

- Lancer une commande Symfony :
  ```bash
  docker compose exec php php bin/console cache:clear
  ```

---

## 🚀 9. Déploiement OVH (optionnel)

Le projet est configuré pour être déployé sur un hébergement OVH mutualisé via un dépôt **bare** (`repo.git`) et un hook `post-receive`.  
- Seuls les fichiers nécessaires de `app/` sont déployés.  
- Les fichiers locaux `.env.local` et `.env.prod.local` restent intacts sur le serveur.  

Pour déployer depuis votre machine :

```bash
git push ovh master
```

---

## 🎉 C’est prêt !

Vous devriez maintenant avoir le projet Symfony **JO2024** fonctionnel en local avec Docker 🚀.
