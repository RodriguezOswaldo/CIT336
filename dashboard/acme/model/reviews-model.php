<?php

function addReview($invId, $clientId, $reviewText){
    $db = acmeConnect();
    $sql = 'INSERT INTO reviews (invId, clientId, reviewText) VALUES (:invId, :clientId, :reviewText)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}
function getReviewsByInvId($invId) {
    $db = acmeConnect();
    $sql = 'SELECT * FROM reviews WHERE invId = :invId'; 
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $reviews;
}
function getReviewsByClientId($clientId) {
    $db = acmeConnect();
    $sql = 'SELECT * FROM reviews WHERE clientId = :clientId';    
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->execute();
    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $reviews;
}

function getReviewById($reviewId) {
    $db = acmeConnect();
    // echo gettype($reviewId);
    // $sql = 'SELECT * FROM reviews AS r INNER JOIN inventory AS i ON r.invId = i.invId WHERE r.reviewId = :reviewId';
    $sql = 'SELECT * FROM reviews WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $review = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $review;
}

function updateReview($reviewId, $reviewText) {
    $db = acmeConnect();
    $sql = 'UPDATE reviews SET reviewText = :reviewText WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

function deleteReview($reviewId) {
    $db = acmeConnect();
    $sql = 'DELETE reviewText FROM reviews WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}
//Las dos del controller
// // Get reviews for a specific inventory item
// function getReviews($reviewId){
//     $db = acmeConnect();
//     $sql = 'SELECT * FROM reviews AS r INNER JOIN inventory AS i ON r.invId = i.invId WHERE r.reviewId = :reviewId';
//     $stmt = $db->prepare($sql);
//     $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
//     $stmt->execute();
//     $review = $stmt->fetch(PDO::FETCH_ASSOC);
//     $stmt->closeCursor();
//     return $review;
// }

// //Get reviews written by a specific client
// function getReviewClients($clientId){
//     $db = acmeConnect();
//     $sql = 'SELECT * FROM reviews AS r INNER JOIN inventory AS i ON r.invId = i.invId WHERE r.clientId = :clientId';
//     $stmt = $db->prepare($sql);
//     $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
//     $stmt->execute();
//     $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     $stmt->closeCursor();
//     return $reviews;
// }

?>