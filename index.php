
<?php 
$my_var = "";

if(isset($_POST['url'])) {
  $url_link = $_POST['url'] ;
  parse_str( parse_url( $url_link, PHP_URL_QUERY ), $my_array_of_vars );
  $video_id = $my_array_of_vars['v'];  
  $full_link = "https://www.youtube.com/api/timedtext?lang=en&v=".$video_id;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL,$full_link);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $my_var = curl_exec($ch);
  curl_close($ch);

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="UTF-8">
  <title>Lecture Fetcher: YouTube Transcript Downloader</title>
</head>
<body><center>
  <form method = "post">
    <div class = "header">Lecture Fetcher</div>
    <div class = "subheader">Convert Lectures on YouTube to text by copying and pasting the URL</div>
    <div class = "content">
      <div>Youtube URL:</div>
      <input id = "input" name = "url" type = "textarea"></input>
      <input type = "submit" name = "button" id = "button" value = "Submit"/>
    </div>
  </form>
  <div class = "result" style = "width:680px;">
  <?php echo "<p id = 'results'>" . $my_var . "</p>"; ?>
</div>
</center>
</body>
</html>

