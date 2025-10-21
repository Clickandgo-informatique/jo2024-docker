# Userguide

## Table of Contents

1. [Introduction](#introduction)  
2. [Login and Security](#login-and-security)  
3. [Navigating the Application](#navigating-the-application)  
4. [Order Management](#order-management)  
5. [Payment and Tickets](#payment-and-tickets)  
6. [FAQ and Support](#faq-and-support)  

---

## Introduction

Welcome to the official booking application for the Paris 2024 Olympic and Paralympic Games.  
This application allows you to:  

- Browse available sports and offers  
- Create and manage your orders  
- Pay for your tickets and generate secure QR tickets  
- Verify your tickets on site  

---

## Login and Security

### Account Creation

1. Go to the login page.  
2. Click on **Sign Up** and fill in your information.  
3. Verify your email address to activate your account.  

### Login

- Enter your email and password.  
- Two-factor authentication is performed at each login; you will need to provide a new code each time you reconnect to our platform.  
- Installing an authentication app (Google Authenticator, etc.) is required to complete the login process.  
- If everything goes well during your first registration, your basic data will be saved on our servers so you won’t need to go through the initial step for future logins.  
- If you cannot validate the two-factor authentication, rescan the QR code displayed on the login page with the app you previously downloaded.  

### Forgot Password

- Click on **Forgot Password**.  
- Follow the instructions sent by email.  

---

## Navigating the Application

- **Sidebar**: list of available sports and offers  
- **Filters**: search by type (Olympic / Paralympic) and location  
- **Orders Table**: history of your orders and tickets  

---

## Order Management

### Create an Order

1. Select one or more offers.  
2. Set the quantity for each offer.  
3. Click **Add to Cart**.  
4. Check the total of your order.  

### Order Details

- **Reference**: unique identifier for your order  
- **Offers**: list of selected offers with quantity and price  
- **Total**: automatic calculation including all offers  

---

## Payment and Tickets

### Payment

- Click **Pay** to finalize your order.  
- A QR ticket will be generated automatically.  
- The following information will be stored:  
  - `ticketKey`: unique ticket key  
  - `payloadHash`: verification hash  
  - `qrCodePath`: path to the QR code  

### Viewing Your Tickets

- Go to your orders.  
- Click on the ticket to display the QR code.  
- You can scan the QR code on site to validate entry.  

### Ticket Status

- `isUsed`: indicates whether the ticket has already been used  
- `usedAt`: date and time of ticket validation  

---

## FAQ and Support

### I did not receive my ticket after payment

- Check your spam folder.  
- Click on "My Current Orders" in the navigation bar to access the history of all recorded orders; only orders with completed payment issue a ticket.  
- You can access and print all your tickets from this interface; one paid order = one secure ticket.  
- Contact support if the issue persists.  

### How to cancel an order?

- Only unpaid orders can be canceled from the "My Current Orders" interface.  
- Paid orders cannot be canceled via the application.  
- Contact customer service for any specific requests.  

### Support

- Email: support@jo2024.fr  
- Phone: +33 1 23 45 67 89
