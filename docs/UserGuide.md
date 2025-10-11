# JO 2024 - Guide Utilisateur

## Table des matières

1. [Introduction](#introduction)  
2. [Connexion et sécurité](#connexion-et-sécurité)  
3. [Navigation dans l’application](#navigation-dans-lapplication)  
4. [Gestion des commandes](#gestion-des-commandes)  
5. [Paiement et tickets](#paiement-et-tickets)  
6. [2FA et sécurité avancée](#2fa-et-sécurité-avancée)  
7. [FAQ et support](#faq-et-support)  

---

## Introduction

Bienvenue dans l’application officielle des Jeux Olympiques et Paralympiques de Paris 2024.  
Cette application vous permet de :  

- Consulter les sports et les offres disponibles  
- Créer et gérer vos commandes  
- Payer vos billets et générer des tickets QR sécurisés  
- Vérifier vos tickets sur place  

---

## Connexion et sécurité

### Création de compte

1. Rendez-vous sur la page de connexion.  
2. Cliquez sur **S’inscrire** et remplissez vos informations.  
3. Vérifiez votre adresse e-mail pour activer votre compte.  

### Login

- Entrez votre email et mot de passe.  
- Si 2FA est activé, vous serez redirigé vers la vérification OTP.  

### Mot de passe oublié

- Cliquez sur **Mot de passe oublié**.  
- Suivez les instructions envoyées par email.  

---

## Navigation dans l’application

- **Sidebar** : liste des sports et offres disponibles  
- **Filtres** : rechercher par type (Olympique / Paralympique) et par lieu  
- **Tableau des commandes** : historique de vos commandes et tickets  

---

## Gestion des commandes

### Créer une commande

1. Sélectionnez une ou plusieurs offres.  
2. Définissez la quantité pour chaque offre.  
3. Cliquez sur **Ajouter au panier**.  
4. Vérifiez le total de votre commande.  

### Détails d’une commande

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

## 2FA et sécurité avancée

- Si la 2FA est activée :  
  - Vous devez entrer un OTP lors de la connexion.  
  - L’OTP est généré via une application compatible (Google Authenticator, Authy, etc.)  
- Vous pouvez configurer la 2FA dans **Mon compte → Sécurité**.  

---

## FAQ et support

### Je n’ai pas reçu mon ticket après paiement

- Vérifiez votre dossier spam.  
- Contactez le support si le problème persiste.  

### Comment annuler une commande ?

- Les commandes payées ne peuvent pas être annulées via l’application.  
- Contactez le service client pour toute demande spécifique.  

### Support

- Email : support@jo2024.fr  
- Téléphone : 01 23 45 67 89  

---

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
