<?php

function dbConnect(){

    try{
        return new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $exception)
    {
        die( 'Erreur : ' . $exception->getMessage() );
    }
}

function getArticle( $articleId ){

    $db = dbConnect();

    $query = $db->prepare('
        SELECT article.*, GROUP_CONCAT(category.name SEPARATOR ” / “) AS categories
        FROM article
        JOIN article_category ON article.id = article_category.article_id
        JOIN category ON article_category.category_id = category.id
        WHERE article.id = ? AND article.is_published = 1
    ');

    $query->execute( array( $articleId ) );

    return $query->fetch();

}


?>
