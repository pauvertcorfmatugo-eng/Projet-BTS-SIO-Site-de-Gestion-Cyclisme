# 🚴‍♂️ Decap Velo - Application de Gestion de Cyclisme

## 📝 Contexte du Projet
**Decap Velo** est une application web développée dans le cadre de mon **BTS SIO (Option SLAM)**. 
L'objectif de ce projet est de concevoir un système d'information complet permettant de gérer les inscriptions de cyclistes à des clubs et leur participation à diverses courses régionales.

Ce projet met en avant mes compétences en **développement Backend (PHP)** et en **conception/interrogation de bases de données relationnelles (SQL)**.

## Fonctionnalités Principales
* **Gestion des Cyclistes :** Ajout de nouveaux membres, inscription automatique à un club pour l'année en cours (gestion des cotisations), et moteur de recherche par nom/prénom.
* **Gestion des Clubs & Courses :** Création et visualisation des entités via des formulaires dynamiques.
* **Tableau de Bord Global :** Affichage croisé complexe permettant de voir en un coup d'œil le nom, le prénom, le club d'appartenance et la liste complète des courses auxquelles un cycliste participe.

## Technologies Utilisées
* **Backend :** PHP (Procédural avec utilisation de l'extension `PDO` pour des requêtes sécurisées).
* **Base de données :** MySQL / MariaDB.
* **Frontend :** HTML5, CSS3, et le framework Bootstrap 5 pour un design responsive.

## Architecture de la Base de Données
La base de données repose sur un modèle relationnel :
* `CYCLISTE` : Informations personnelles du sportif.
* `CLUB` : Entité sportive locale.
* `COURSE` : Événements sportifs planifiés.
* `COTISATION` : Table de liaison (Cycliste <-> Club) intégrant l'année en cours.
* `PARTICIPER` : Table de liaison (Cycliste <-> Course).

---
*Développé par Ugo Pauvert--Corfmat dans le cadre du BTS SIO SLAM.*
