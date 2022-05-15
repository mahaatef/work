<?php include('inc/header.php');?>
<?php include('inc/nav.php');?>

<?php
$jsonDataFile = file_get_contents("data/user.json");  
$jsonDataArray = json_decode($jsonDataFile,true);?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">delete</th>
    </tr>
  </thead>
  <tbody>
<?php 
foreach($jsonDataArray as $user):?>
  <tr>
  <td><?php echo $user['id']?></td>  
  <td><?php echo $user['name']?></td>
  <td><?php echo $user['email']?></td>
  <form action="handelars/handelTableUser.php">
  <input type="hidden" value="$user['id']" name="id"></input>
  <td><input type="submit" class="btn btn-danger" value="DELE"></input></td>
  </form>
</tr>
<?php endforeach;?>

  </tbody>
</table>
<?php include('inc/footer.php');?>
