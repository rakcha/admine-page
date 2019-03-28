<?php
$conn = mysqli_connect("localhost","root","","cour_compte");
require_once('vendor/php-excel-reader/excel_reader2.php');
require_once('vendor/SpreadsheetReader.php');

if (isset($_POST["import"]))
{
    
    
  $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'uploads/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        for($i=0;$i<$sheetCount;$i++)
        {
            
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
          
                $id = "";
                if(isset($Row[0])) {
                    $id = mysqli_real_escape_string($conn,$Row[0]);
                }
                
                $ANNEE_PRET = "";
                if(isset($Row[1])) {
                    $ANNEE_PRET = mysqli_real_escape_string($conn,$Row[1]);
                }
          
                $ANNEE_MARCHE="";
                if(isset($Row[2])) {
                    $ANNEE_MARCHE = mysqli_real_escape_string($conn,$Row[2]);
                }
                
                $NOM_BENEFICIAIRE = "";
                if(isset($Row[3])) {
                    $NOM_BENEFICIAIRE = mysqli_real_escape_string($conn,$Row[3]);
                }
             
                $NUMERO_DU_PRET = "";
                if(isset($Row[4])) {
                    $NUMERO_DU_PRET = mysqli_real_escape_string($conn,$Row[4]);
                }
                $NUMERO_MARCHE = "";
                if(isset($Row[5])) {
                    $NUMERO_MARCHE = mysqli_real_escape_string($conn,$Row[5]);
                }
                
                
                $OBJET_DU_MARCHE = "";
                if(isset($Row[6])) {
                    $OBJET_DU_MARCHE = mysqli_real_escape_string($conn,$Row[6]);
                }
                
                $TYPE_FOURNISSEUR = "";
                if(isset($Row[7])) {
                    $TYPE_FOURNISSEUR = mysqli_real_escape_string($conn,$Row[7]);
                }
                
                $MONTANT_ENGAGE = "";
                if(isset($Row[8])) {
                    $MONTANT_ENGAGE = mysqli_real_escape_string($conn,$Row[8]);
                }
                
                $MONTANT_ORDONNANCE = "";
                if(isset($Row[9])) {
                    $MONTANT_ORDONNANCE = mysqli_real_escape_string($conn,$Row[9]);
                }
                
                $MONTANT_PAYE = "";
                if(isset($Row[10])) {
                    $MONTANT_PAYE = mysqli_real_escape_string($conn,$Row[10]);
                }
                $MONTANT_SIGNALE = "";
                if(isset($Row[11])) {
                    $MONTANT_SIGNALE = mysqli_real_escape_string($conn,$Row[11]);
                }
                
                if (!empty($id) || !empty($ANNEE_MARCHE)) {


               
                    

 $query = "insert into marcher_num(id,ANNEE_PRET,ANNEE_MARCHE,NOM_BENEFICIAIRE,NUMERO_DU_PRET,NUMERO_MARCHE,OBJET_DU_MARCHE,TYPE_FOURNISSEUR,MONTANT_ENGAGE,MONTANT_ORDONNANCE,MONTANT_PAYE,MONTANT_SIGNALE) values('".$id."','".$ANNEE_PRET."',
 '".$ANNEE_MARCHE."','".$NOM_BENEFICIAIRE.",'".$NUMERO_DU_PRET."','".$NUMERO_MARCHE."','".$OBJET_DU_MARCHE."',
'".$TYPE_FOURNISSEUR."','".$MONTANT_ENGAGE."','".$MONTANT_ORDONNANCE."','".$MONTANT_PAYE."','".$MONTANT_SIGNALE."')";
                    $result = mysqli_query($conn, $query);
                
                    if (! empty($result)) {
                        $type = "success";
                        $message = "Excel Data Imported into the Database";
                    } else {
                        $type = "error";
                        $message = "Problem in Importing Excel Data";
                    }
                }
             }
        
         }
  }
  else
  { 
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
  }
}
?>

<!DOCTYPE html>
<html>    
<head>
<style>    
body {
	font-family: Arial;
	width: 550px;
}

.outer-container {
	background: #F0F0F0;
	border: #e0dfdf 1px solid;
	padding: 40px 20px;
	border-radius: 2px;
}

.btn-submit {
	background: #333;
	border: #1d1d1d 1px solid;
    border-radius: 2px;
	color: #f0f0f0;
	cursor: pointer;
    padding: 5px 20px;
    font-size:0.9em;
}

.tutorial-table {
    margin-top: 40px;
    font-size: 0.8em;
	border-collapse: collapse;
	width: 100%;
}

.tutorial-table th {
    background: #f0f0f0;
    border-bottom: 1px solid #dddddd;
	padding: 8px;
	text-align: left;
}

.tutorial-table td {
    background: #FFF;
	border-bottom: 1px solid #dddddd;
	padding: 8px;
	text-align: left;
}

#response {
    padding: 10px;
    margin-top: 10px;
    border-radius: 2px;
    display:none;
}

.success {
    background: #c7efd9;
    border: #bbe2cd 1px solid;
}

.error {
    background: #fbcfcf;
    border: #f3c6c7 1px solid;
}

div#response.display-block {
    display: block;
}
</style>
</head>

<body>
    <h2>Import Excel File into MySQL Database using PHP</h2>
    
    <div class="outer-container">
        <form action="" method="post"
            name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <div>
                <label>Choose Excel
                    File</label> <input type="file" name="file"
                    id="file" accept=".xls,.xlsx">
                <button type="submit" id="submit" name="import"
                    class="btn-submit">Import</button>
        
            </div>
        
        </form>
        
    </div>
    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
    
         
<?php
    $sqlSelect = "SELECT * FROM marcher_num";
    $result = mysqli_query($conn, $sqlSelect);

if (mysqli_num_rows($result) > 0)
{
?>
        
    <table class='tutorial-table'>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>

            </tr>
        </thead>
<?php
    while ($row = mysqli_fetch_array($result)) {
?>                  
        <tbody>
        <tr>
            <td><?php  echo $row['id']; ?></td>
            <td><?php  echo $row['NUMERO_MARCHE']; ?></td>
        </tr>
<?php
    }
?>
        </tbody>
    </table>
<?php 
} 
?>

</body>
</html>
