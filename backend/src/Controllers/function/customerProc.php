<?php 
//get all CUSTOMER 
function getAllcustomer($db) {

    
    $sql = 'Select * FROM customer '; 
    $stmt = $db->prepare ($sql); 
    $stmt ->execute(); 
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 
} 

//get CUSTOMER by id 
function getcustomer($db, $customerId) {

    $sql = 'Select o.customerID, o.customerName, o.customerEmail, o.customerPhone FROM customer o  ';
    $sql .= 'Where o.id = :id';
    $stmt = $db->prepare ($sql);
    $id = (int) $customerId;
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 

}

//add new CUSTOMER 
function createcustomer($db, $form_data) { 
    //stop at sisni
    $sql = 'Insert into customer ( customerID, customerName, customerEmail, customerPhone)'; 
    $sql .= 'values (:customerID, :customerName, :customerEmail, :customerPhone)';  
    $stmt = $db->prepare ($sql); 
    $stmt->bindParam(':customerID', $form_data['customerID']);  
    $stmt->bindParam(':customerName', ($form_data['customerName']));
    $stmt->bindParam(':customerEmail', ($form_data['customerEmail']));
    $stmt->bindParam(':customerPhone', ($form_data['customerPhone']));
    $stmt->execute(); 
    return $db->lastInsertID();
}


//delete CUSTOMER by id 
function deletecustomer($db,$customerId) { 

    $sql = ' Delete from customer where id = :id';
    $stmt = $db->prepare($sql);  
    $id = (int)$customerId; 
    $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
    $stmt->execute(); 
} 

//update CUSTOMER by id 
function updatecustomer($db,$form_dat,$customerId) { 

    
    $sql = 'UPDATE customer SET customerID = :customerID, customerName = :customerName , customerEmail = :customerEmail , customerPhone = :customerPhone'; 
    $sql .=' WHERE id = :id'; 
    $stmt = $db->prepare ($sql); 
    $id = (int)$customerId;  
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':customerID', $form_dat['customerID']);    
    $stmt->bindParam(':customerName', ($form_dat['customerName']));
    $stmt->bindParam(':customerEmail', ($form_dat['customerEmail']));
    $stmt->bindParam(':customerPhone', ($form_dat['customerPhone']));
    $stmt->execute(); 
}