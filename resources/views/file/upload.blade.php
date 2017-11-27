<form method="post" action="save" enctype="multipart/form-data">
 {{ csrf_field() }}
  <input type="file" name="file"><br><br>
  <input type="submit" name="" value="upload">


</form>