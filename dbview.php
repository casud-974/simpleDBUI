 <?php  
 //taken from
 //https://www.webslesson.info/2016/10/php-ajax-update-mysql-data-through-bootstrap-modal.html
 //
 header('Content-Type: text/html; charset=utf-8');
 $connect = mysqli_connect("localhost", "phpmyadminuser", "mypsw", "richDB");  
 $query = "SELECT * FROM Entreprises_Table ORDER BY id DESC";  
  mysqli_set_charset($connect,"utf8");
 $result = mysqli_query($connect, $query);  

 ?>  
 <!DOCTYPE html>  
 <html>  
 <head>  
   <title>DB Entreprise CASUD / SAT</title>  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
 </head>  
 <body>  
   <br /><br />  
   <div class="container" style="width:700px;">  
    <h3 align="center">Base de données entreprises du Territoire CASUD</h3>  
    <br />  
    <div class="table-responsive">  
     <div align="right">  
      <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Ajouter</button>  
    </div>  
    <br />  
    <div id="enterprise_table">  
      <table class="table table-bordered">  
       <tr>  
        <th width="70%">Entreprise</th>  
        <th width="15%">Editer</th>  
        <th width="15%">Voir</th>  
      </tr>  
      <?php  
      while($row = mysqli_fetch_array($result))  
      {  
       ?>  
       <tr>  
        <td><?php echo $row["nom"]; ?></td>  
        <td><input type="button" name="edit" value="Editer" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" /></td>  
        <td><input type="button" name="view" value="voir" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" /></td>  
      </tr>  
      <?php  
    }  
    ?>  
  </table>  
</div>  
</div>  
</div>  
</body>  
</html>  
<div id="dataModal" class="modal fade">  
  <div class="modal-dialog">  
   <div class="modal-content">  
    <div class="modal-header">  
     <button type="button" class="close" data-dismiss="modal">&times;</button>  
     <h4 class="modal-title">Informations Entreprise</h4>  
   </div>  
   <div class="modal-body" id="enterprise_detail">  
   </div>  
   <div class="modal-footer">  
     <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>  
   </div>  
 </div>  
</div>  
</div>  
<div id="add_data_Modal" class="modal fade">  
  <div class="modal-dialog">  
   <div class="modal-content">  
    <div class="modal-header">  
     <button type="button" class="close" data-dismiss="modal">&times;</button>  
     <h4 class="modal-title">Base de données entreprises du Territoire CASUD</h4>  
   </div>  
   <div class="modal-body">  
     <form method="post" id="insert_form">  
      <label>Entrez le nom de l'entreprise</label>  
      <input type="text" name="nom" id="nom" class="form-control" />  
      <br />  
      <label>Entrez l'adresse de l'entreprise</label>  
      <textarea name="adresse" id="adresse" class="form-control"></textarea>  
      <br />  
      <label>Entrez la catégorie</label>  
      <textarea name="categorie" id="categorie" class="form-control"></textarea>  
  <!--                         <select name="categorie" id="categorie" class="form-control">  
                               <option value="Male">Male</option>  
                               <option value="Female">Female</option>  
                             </select>   -->
                             <br />  
                             <label>Entrez la designation</label>  
                             <input type="text" name="designation" id="designation" class="form-control" />  
                             <br />  
                             <label>Gérant</label> 
                             <input type="text" name="gerant" id="gerant" class="form-control" />   
                             <!-- <input type="text" name="age" id="age" class="form-control" />   -->
                             <br />  
                             <input type="hidden" name="entreprise_id" id="entreprise_id" />  
                             <input type="submit" name="insert" id="insert" value="insert" class="btn btn-success" />  
                           </form>  
                         </div>  
                         <div class="modal-footer">  
                           <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>  
                         </div>  
                       </div>  
                     </div>  
                   </div>  
                   <script>  
                     $(document).ready(function(){  

                      $('#add').click(function(){  
                       $('#insert').val("Ajouter");  
                       $('#insert_form')[0].reset();  
                     });  
                      $(document).on('click', '.edit_data', function(){  
                        
                       var entreprise_id = $(this).attr("id");  
                       $.ajax({  
                        url:"fetch.php",  
                        method:"POST",  
                        data:{entreprise_id:entreprise_id},  
                        dataType:"json",  
                        success:function(data){  
                         $('#nom').val(data.nom);  
                         $('#adresse').val(data.adresse);  
                         $('#categorie').val(data.categorie);  
                         $('#designation').val(data.designation);  
                         $('#gerant').val(data.gerant);  
                         $('#entreprise_id').val(data.id);  
                         $('#insert').val("Mettre à jour");  
                         $('#add_data_Modal').modal('show');  
                       }  
                     });  
                     });  
                      $('#insert_form').on("submit", 'form', function(event){  console.log("Hello world!");
                       event.preventDefault();  
                       if($('#nom').val() == "")  
                       {  
                        alert("Entrez le nom");  
                      }  
                      else if($('#adresse').val() == '')  
                      {  
                        alert("Entrez l'adresse");  
                      }  
                      else if($('#designation').val() == '')  
                      {  
                        alert("Entrez la designation");  
                      }  
                      else if($('#categorie').val() == '')  
                      {  
                        alert("entrez la categorie");  
                      }  
                      else if($('#gerant').val() == '')  
                      {  
                        alert("entrez le gérant");  
                      } 
                      else  
                      {  
                        $.ajax({  
                         url:"insert.php",  
                         method:"POST",  
                         data:$('#insert_form').serialize(),  
                         beforeSend:function(){  
                          $('#insert').val("...en cours");  
                        },  
                        success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#enterprise_table').html(data);  
                        }  
                      });  
                      }  
                    });  
                      $(document).on('click', '.view_data', function(){  
                       var entreprise_id = $(this).attr("id");  
                       if(entreprise_id != '')  
                       {  
                        $.ajax({  
                         url:"select.php",  
                         method:"POST",  
                         data:{entreprise_id:entreprise_id},  
                         success:function(data){  
                          $('#enterprise_detail').html(data);  
                          $('#dataModal').modal('show');  
                        }  
                      });  
                      }            
                    });  
                    });  
                  </script>