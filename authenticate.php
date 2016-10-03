<?PHP


if (!(isset($_SESSION['user_type']) && $_SESSION['user_type'] != '')) {

echo "<script> 

window.location='index.html'

alert('You must be logged in first to acces this page..');
 </script>";
 
 



}

?>