<?php 
//get all booking 
function getAllbooking ($db) {

    
    $sql = 'Select * FROM booking  '; 
    $stmt = $db->prepare ($sql); 
    $stmt ->execute(); 
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 
} 

//get booking  by id 
function getbooking ($db, $bookingId) {

    $sql = 'Select o.bookingID, o.customerName, o.CheckIn_Date, o.CheckOut_Date, o.RoomType, o.NumGuest, o.Status FROM booking o  ';
    $sql .= 'Where o.id = :id';
    $stmt = $db->prepare ($sql);
    $id = (int) $bookingId;
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 

}

//add new booking 
function createbooking($db, $form_data) { 
    //stop at sisni
    $sql = 'Insert into booking ( bookingID, customerName, CheckIn_Date, CheckOut_Date, RoomType, NumGuest, Status)'; 
    $sql .= 'values ( :bookingID, :customerName, :CheckIn_Date, :CheckOut_Date, :RoomType, :NumGuest, :Status)';  
    $stmt = $db->prepare ($sql); 
    $stmt->bindParam(':bookingID', $form_data['bookingID']);  
    $stmt->bindParam(':customerName', ($form_data['customerName']));
    $stmt->bindParam(':CheckIn_Date', ($form_data['CheckIn_Date']));
    $stmt->bindParam(':CheckOut_Date', ($form_data['CheckOut_Date']));
    $stmt->bindParam(':RoomType', ($form_data['RoomType']));
    $stmt->bindParam(':NumGuest', ($form_data['NumGuest']));
    $stmt->bindParam(':Status', ($form_data['Status']));
    $stmt->execute(); 
    return $db->lastInsertID();
}


//delete booking by id 
function deletebooking($db,$bookingId) { 

    $sql = ' Delete from booking where id = :id';
    $stmt = $db->prepare($sql);  
    $id = (int)$bookingId; 
    $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
    $stmt->execute(); 
} 

//update booking by id 
function updatebooking($db,$form_dat,$bookingId) { 

    
    $sql = 'UPDATE booking SET bookingID = :bookingID, customerName = :customerName , CheckIn_Date = :CheckIn_Date , CheckOut_Date = :CheckOut_Date , RoomType = :RoomType, NumGuest = :NumGuest, Status = :Status'; 
    $sql .=' WHERE id = :id'; 
    $stmt = $db->prepare ($sql); 
    $id = (int)$bookingId;  
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':bookingID', $form_data['bookingID']);  
    $stmt->bindParam(':customerName', ($form_data['customerName']));
    $stmt->bindParam(':CheckIn_Date', ($form_data['CheckIn_Date']));
    $stmt->bindParam(':CheckOut_Date', ($form_data['CheckOut_Date']));
    $stmt->bindParam(':RoomType', ($form_data['RoomType']));
    $stmt->bindParam(':NumGuest', ($form_data['NumGuest']));
    $stmt->bindParam(':Status', ($form_data['Status']));
    $stmt->execute(); 
}
