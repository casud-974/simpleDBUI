<?php  
 $connect = mysqli_connect("localhost", "phpadmin", "mypsw", "richDB"); 
 mysqli_set_charset( $connect, 'utf8'); 
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $nom = mysqli_real_escape_string($connect, $_POST["nom"]);  
      $adresse = mysqli_real_escape_string($connect, $_POST["adresse"]);  
      $categorie = mysqli_real_escape_string($connect, $_POST["categorie"]);  
      $designation = mysqli_real_escape_string($connect, $_POST["designation"]);  
      $gerant = mysqli_real_escape_string($connect, $_POST["gerant"]);  
      $telephone = mysqli_real_escape_string($connect, $_POST["telephone"]);  
      $status = mysqli_real_escape_string($connect, $_POST["status"]);  
      if($_POST["entreprise_id"] != '')  
      {  
           $query = "  
           UPDATE Entreprises_Table   
           SET nom='$nom',   
           adresse='$adresse',   
           categorie='$categorie',   
           designation = '$designation',   
           gerant = '$gerant',
           telephone = '$telephone',
           status = '$status'  
           WHERE id='".$_POST["entreprise_id"]."'";  
           $message = 'Data Updated';  
      }  
      else  
      {  
           $query = "  
           INSERT INTO Entreprises_Table(nom, adresse, categorie, designation, gerant, telephone, status)  
           VALUES('$nom', '$adresse', '$categorie', '$designation', '$gerant', '$telephone', '$status');  
           ";  
           $message = 'Data Inserted';  
      }  
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM Entreprises_Table ORDER BY id DESC";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                          <th width="70%">Raison sociale</th>  
                          <th width="15%">Editer</th>  
                          <th width="15%">Voir</th>  
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>' . $row["nom"] . '</td>  
                          <td><input type="button" name="edit" value="Editer" id="'.$row["id"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                          <td><input type="button" name="view" value="voir" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>  
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output;  
 }  
 ?>