<!DOCTYPE html>
<html lang="eng">
<?php include 'header.php'; ?>
<div id="content" class="clearfix"> 
                <aside>
<?php date_default_timezone_set ( 'US/Eastern' ) ?>
<?php  echo "<h2>" . date('l'). "'s Specials";"</h2>" ?>

        <?php
include 'MenuItem.php';
$menuarray = array();
$i = 0;
while ($i < 4){
    if ($i % 2 == 0)
        $arr[$i] = new MenuItem("The WP Burger" . str_repeat("*", $i + 1) . strval($i + 1), "Freshly made all-beef patty served up with homefries", 14 );
    echo "<img src='images/burger_small.jpg' alt='Burger' title='Monday's Special - Burger'>";
	echo ("<br>");
	echo "<h3>". $arr[$i]->getItemName() . "</h3>";
    echo ($arr[$i]->getDescription());
	echo "<br>";
	echo ($arr[$i]->getPrice() . "<br>");
	$i++;
    if ($i % 2 == 1)
        $arr[$i] = new MenuItem("WP Kebabs " . str_repeat("*", $i + 1) . strval($i + 1),"Tender cuts of beef and chicken, served with your choice of side", 17 );
	echo "<img src='images/kebobs.jpg' alt='Kebobs' title='WP Kebobs'>";
	echo ("<br>");
	echo "<h3>". $arr[$i]->getItemName() . "</h3>";
    echo ($arr[$i]->getDescription());
	echo "<br>";
	echo ($arr[$i]->getPrice() . "<br>");
   $i++;
    }
	?>
                </aside>
                <div class="main">
                    <h1>Welcome</h1>
                    <img src="images/dining_room.jpg" alt="Dining Room" title="The WP Eatery Dining Room" class="content_pic">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    <h2>Book your Christmas Party!</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                </div>
                <!-- End Main -->
            </div>
            <!-- End Content -->
            <?php
include 'footer.php';
?>
    </div>
    <!-- End Wrapper -->
</body>

</html><?php
  include './menuItem.php'; 
  
  $itemName1 = 'The WP Burger';
  $description1 = 'Freshly made all-beef patty served up with homefries';
  $price1 ='$14';
  $Menuitem1 = new Menuitem($itemName1, $description1, $price1);
  $itemName2 = 'WP Kebobs';
  $description2 = 'Tender cuts of beef and chicken, served with your choice of side';
  $price2 ='$17';
  $Menuitem2 = new Menuitem($itemName2, $description2, $price2)
?>

        <?php include './header.php' ?>
            <div id="content" class="clearfix">
                <aside>
                        <h2><?php $day = date('l'); echo $day;?>'s Specials</h2>
                        <hr>
                        <img src="images/burger_small.jpg" alt="Burger" title="Monday's Special - Burger">
                        <h3><?php echo $Menuitem1->getItemName(); ?></h3>
                        <p><?php echo $Menuitem1->getDescription().' - '.$Menuitem1->getPrice();?></p>
                        <hr>
                        <img src="images/kebobs.jpg" alt="Kebobs" title="WP Kebobs">
                        <h3><?php echo $Menuitem2->getItemName(); ?></h3>
                        <p><?php echo $Menuitem2->getDescription().' - '.$Menuitem2->getPrice(); ?></p>
                        <hr>
                </aside>
                <div class="main">
                    <h1>Welcome</h1>
                    <img src="images/dining_room.jpg" alt="Dining Room" title="The WP Eatery Dining Room" class="content_pic">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    <h2>Book your Christmas Party!</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                </div><!-- End Main -->
            </div><!-- End Content -->
           <?php include './footer.php' ?>
  
           

