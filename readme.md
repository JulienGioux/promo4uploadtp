## Exercice 4 / TP en duo

> Manipulation avancée de **la superglobale $_FILES** avec une pincée de JavaScript et un zeste de fonctionnalités PHP : Bon Appétit.

Vous allez devoir faire *formulaire* pour enregistrer une image sur un répertoire ciblé.  
![exemple](img/capture01.PNG "exemple")  

**Comme à son habitude, vous allez avoir des figures imposées :**  
1. L'architecture de votre site sera de la forme suivante :
    - img
    - assets
        - script.js
        - style.css
    - index.php

2. Vous allez devoir intégrer un module JS fourni pour avoir un aperçu des images à uploader. (cf. le dossier **uploadPreview**)  
![exemple](img/capture02.PNG "exemple")  

3. Les images **uploadées** seront enregistrées dans le dossier **img**.  
Faites bien attention de les enregistrées avec un nom unique : utilisation de la fonction **uniqid()** en PHP.  
![exemple](img/capture05.PNG "exemple")  

4. Vous allez devoir verifier certains paramètres avant **d'uploader le fichier**:  
    - Qu'il s'agit bien d'une image :  
    ![exemple](img/capture03.PNG "exemple")  
    - Qu'il ne dépasse pas la taille de 1Mo :  
    ![exemple](img/capture04.PNG "exemple")  
    - Si tout est ok, nous informons l'utilisateur que c'est good :)  
    ![exemple](img/capture06.PNG "exemple") 

> A VOS CLAVIERS !!!!!!!