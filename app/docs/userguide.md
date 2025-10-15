# Guide utilisateur
[Read this user guide in English clicking on this title ](userguide_english)

## Table des matières

1. [Introduction](#introduction)  
2. [Connexion et securite](#connexion-et-securite)  
3. [Navigation dans lapplication](#navigation-dans-lapplication)  
4. [Gestion des commandes](#gestion-des-commandes)  
5. [Paiement et tickets](#paiement-et-tickets)  
6. [FAQ et support](#faq-et-support)  

---

## Introduction

Bienvenue dans l’application officielle de réservations des Jeux Olympiques et Paralympiques de Paris 2024.  
Cette application vous permet de :  

- Consulter les sports et les offres disponibles  
- Créer et gérer vos commandes  
- Payer vos billets et générer des tickets QR sécurisés  
- Vérifier vos tickets sur place  

---

## Connexion et securite

### Creation de compte

1. Rendez-vous sur la page de connexion.  
2. Cliquez sur **S’inscrire** et remplissez vos informations.  
3. Vérifiez votre adresse e-mail pour activer votre compte.  

### Login

- Entrez votre email et mot de passe.  
- Une vérification à double facteur est réalisée à chaque connexion, vous devrez fournir un nouveau code à chaque fois que vous vous reconnectez sur notre plateforme.  
- L’installation d'une appli d'authentification (Google Authenticator etc.) est obligatoire pour procéder et terminer la phase de connexion.  
- Si tout se passe bien à la première inscription vos données basiques seront enregistrées sur nos serveurs de façon à ce que vous n'ayez plus besoin de passer par la première étape pour une future connexion.  
- Si vous n'arrivez pas à valider cette double authentification, rescannez le QR code qui s'affiche dans la page de login avec l'appli que vous avez telechargée antérieurement.  

### Mot de passe oublie

- Cliquez sur **Mot de passe oublié**.  
- Suivez les instructions envoyées par email.  

---

## Navigation dans lapplication

- **Sidebar** : liste des sports et offres disponibles  
- **Filtres** : rechercher par type (Olympique / Paralympique) et par lieu  
- **Tableau des commandes** : historique de vos commandes et tickets  

---

## Gestion des commandes

### Creer une commande

1. Sélectionnez une ou plusieurs offres.  
2. Définissez la quantité pour chaque offre.  
3. Cliquez sur **Ajouter au panier**.  
4. Vérifiez le total de votre commande.  

### Details d’une commande

- **Référence** : identifiant unique de votre commande  
- **Offres** : liste des offres sélectionnées avec quantité et prix  
- **Total** : calcul automatique incluant toutes les offres  

---

## Paiement et tickets

### Paiement

- Cliquez sur **Payer** pour finaliser votre commande.  
- Un ticket QR sera généré automatiquement.  
- Les informations suivantes seront stockées :  
  - `ticketKey` : clé unique du ticket  
  - `payloadHash` : hash de vérification  
  - `qrCodePath` : chemin vers le QR code  

### Consulter vos tickets

- Accédez à vos commandes.  
- Cliquez sur le ticket pour afficher le QR code.  
- Vous pouvez scanner le QR code sur place pour valider l’entrée.  

### Statut du ticket

- `isUsed` : indique si le ticket a déjà été utilisé  
- `usedAt` : date et heure de la validation du ticket  

---

## FAQ et support

### Je n’ai pas recu mon ticket apres paiement

- Vérifiez votre dossier spam.  
- Cliquez sur "Mes commandes en cours" dans la barre de navigation pour accéder à l'historique de toutes vos commandes enregistrées, seules les commandes dont le paiement a abouti émettent un ticket.  
- Vous pouvez accéder puis imprimer tous vos tickets depuis cette interface, une commande payée = 1 ticket sécurisé.  
- Contactez le support si le problème persiste.  

### Comment annuler une commande ?

- Seules les commandes non encore payées sont annulables depuis l'interface "Mes commandes en cours".  
- Les commandes payées ne peuvent pas être annulées via l’application.  
- Contactez le service client pour toute demande spécifique.  

### Support

- Email : support@jo2024.fr  
- Téléphone : 01 23 45 67 89  
## Notes pour la conversion en PDF

1. Installer Pandoc : `sudo apt install pandoc`  
2. Générer PDF :  

```bash
pandoc UserGuide.md -o UserGuide.pdf --pdf-engine=xelatex
```

3. Pour un rendu HTML :  

```bash
pandoc UserGuide.md -o UserGuide.html
```
