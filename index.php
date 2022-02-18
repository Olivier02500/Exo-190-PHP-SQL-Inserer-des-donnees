<?php

/**
 * Pour cet exercice, vous allez utiliser la base de données table_test_php créée pendant l'exo 189
 * Vous utiliserez également les deux tables que vous aviez créées au point 2 ( créer des tables avec PHP )
 */
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'table_test-php';
try {
    /**
     * Créez ici votre objet de connection PDO, et utilisez à chaque fois le même objet $pdo ici.
     */


    $pdo = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $pass);
    $insert = 'INSERT INTO user (name, fname, address, postal_code, country, mail) VALUES';
    $products = 'INSERT INTO products (title, price, short_descritpion, long_description) VALUES';

    /**
     * 1. Insérez un nouvel utilisateur dans la table utilisateur.
     */

    // TODO votre code ici.
    $requestOne = $insert . "('Doe', 'Jhon', 'rue de la paix', 8000, 'Nice', 'jhonDoe@roupmail.con')";

    $pdo->exec($requestOne);


    /**
     * 2. Insérez un nouveau produit dans la table produit
     */

    // TODO votre code ici.
    $requestTwo = $products . "('Premier titre', 10, 'une petite description du produit', 'une description plus longue mais bon de quelques mots seulement haha')";

    $pdo->exec($requestTwo);

    /**
     * 3. En une seule requête, ajoutez deux nouveaux utilisateurs à la table utilisateur.
     */

    // TODO Votre code ici.
    $requestThree = $insert . "('Anne', 'Jhon', 'rue de la guerre', 10000, 'Cannes', 'Anne@roupmail.con'),
                               ('Patrick', 'Will', 'rue de la taupe', 70, 'Belgique', 'Fritte@roupmail.con')";
    $pdo->exec($requestThree);

    /**
     * 4. En une seule requête, ajoutez deux produits à la table produit.
     */

    // TODO Votre code ici.
    $requestFor = $products . "('deuxieme', 5, 'encore une petite description', 'et voici la grande description wow tellement long'),
                             ('troisieme', 50, 'petite descript', 'grande descriptionnnnnnnnnnnnnnnn')";

    $pdo->exec($requestFor);
    /**
     * 5. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux utilisateurs dans la table utilisateur.
     */
    $pdo->beginTransaction();

    $requestfive = $insert . "('begin', 'one', 'rue de la p', 80, 'Ni', 'jhonDoe@oupmail.con'),
                              ('begin', 'two', 'rue de la pa', 800, 'Nic', 'jhonDoe@ropmail.con'),
                              ('begin', 'three', 'rue de la pai', 8000, 'Nice', 'jhonDoe@roumail.con')";

    // TODO Votre code ici.
    $pdo->exec($requestfive);
    $pdo->commit();


    /**
     * 6. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux produits dans la table produit.
     */

    $pdo->beginTransaction();

    $requestSix = $products . "('Premier begin', 100, 'une petite description du produit', 'une description plus longue mais bon de quelques mots seulement haha'),
                               ('Deuxieme begin', 1000, 'une petite description du produit', 'une description plus longue mais bon de quelques mots seulement haha'),
                               ('Troisieme begin', 10000, 'une petite description du produit', 'une description plus longue mais bon de quelques mots seulement haha')";

    $pdo->exec($requestSix);
    $pdo->commit();

}
catch (PDOException $e){
    echo $e->getMessage();
}