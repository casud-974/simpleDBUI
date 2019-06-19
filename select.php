<?php
if (isset($_POST["entreprise_id"])) {
     $output = '';
     $connect = mysqli_connect("localhost", "phpadmin", "mypsw", "richDB");
     $query = "SELECT * FROM Entreprises_Table WHERE id = '" . $_POST["entreprise_id"] . "'";
     mysqli_set_charset($connect, "utf8");
     $result = mysqli_query($connect, $query);
     $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';
     while ($row = mysqli_fetch_array($result)) {
          $output .= '  
                <tr>  
                     <td width="30%"><label>Nom</label></td>  
                     <td width="70%">' . $row["nom"] . '</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Adresse</label></td>  
                     <td width="70%">' . $row["adresse"] . '</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Catégorie</label></td>  
                     <td width="70%">' . $row["categorie"] . '</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Designation</label></td>  
                     <td width="70%">' . $row["designation"] . '</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Gérant</label></td>  
                     <td width="70%">' . $row["gerant"] . '</td>  
                </tr>
                <tr>  
                    <td width="30%"><label>Téléphone</label></td>  
                    <td width="70%">' . $row["telephone"] . '</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Status</label></td>  
                     <td width="70%">' . $row["status"] . '</td>  
                </tr>  
           ';
     }
     $output .= '  
           </table>  
      </div>  
      ';
     echo $output;
}
