<h2>Mail to the Vizwizz Admin for a new Order</h2>
<?php
//    $product = json_decode('{"2":{"image_link":"02.jpg","price":40,"title":"Shisha 2","qty":2,"total":80,"id":2},"1":{"image_link":"01.jpg","price":20,"title":"Shisha 1","qty":1,"total":20,"id":1},"3":{"image_link":"03.jpg","price":30,"title":"Shisha 3","qty":1,"total":30,"id":3}}');
$message = $first_name." ".$last_name." has just placed a new order on Vizwizz Website <br>";
$message .= "Email: ". $email ."<br>";
$message .= "Phone: ". $phone."<br><br>";
$message .= "Order Details: <br>";
foreach ($product as $item){
    $message .= $item->id ." ". $item->title." x ". $item->qty. "  &#8358;".$item->price. " &#8358;". $item->total ."<br>";
}
$message .= "<br><b>Total: &#8358; ".$total."<b><br>";

$mail = "Hi Admin, <br><br>".$message. "

 <br> Phone number is <b>".$phone."</b><br>

<br><br>Thanks as ".$first_name." awaits his/her order.
<br><br>

Vizwizz Website";


echo "<p>".$mail."</p>";
// dd($mail); ?>

