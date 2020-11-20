<?php
                include_once 'include/header.php';

$product_id = array();
//session_destroy();
if(filter_input(INPUT_POST, 'add_to_cart'))
{
    if(isset($_SESSION['shopping_cart']))
    {
        //Vodi racuna o broju produkata u shopping cart-u
        $count = count($_SESSION['shopping_cart']);
        
        
        $product_ids = array_column($_SESSION['shopping_cart'], 'GameID');
        
        if(!in_array(filter_input(INPUT_GET, 'GameID'),$product_ids))
        {
         $_SESSION['shopping_cart'][$count]=array
            (
                'GameID'=> filter_input(INPUT_GET, 'GameID'),
                'Game_Name'=> filter_input(INPUT_POST, 'product_name'),
                'Game_Price'=> filter_input(INPUT_POST, 'product_price'),
                'Game_Quantity'=> filter_input(INPUT_POST, 'quantity')
            );
        }
        else
        {
            //prdukt vec postoji, uvecaj kolicinu
            //poklapa kljuc niza sa id-jem produkta koji je dodat u kolica
            for($i=0;$i<count($product_ids);$i++)
            {
                if($product_ids[$i]== filter_input(INPUT_GET, 'GameID'))
                {
                    //dodaje kolicinu kod vec postojeceg prozivoda u korpi 
                    $_SESSION['shopping_cart'][$i]['Game_Quantity']+= filter_input(INPUT_POST, 'quantity');
                }
            }
        }
    }
    else 
    {
        //ako Shopping cart ne postoji, napraviti produkt sa elementom 0 
        //Kreiranje niza od proslednjenih podataka, pocev do 0 
        $_SESSION['shopping_cart'][0]=array
        (
            'GameID'=> filter_input(INPUT_GET, 'GameID'),
            'Game_Name'=> filter_input(INPUT_POST, 'product_name'),
            'Game_Price'=> filter_input(INPUT_POST, 'product_price'),
            'Game_Quantity'=> filter_input(INPUT_POST, 'quantity')
        );
    }
}
if(filter_input(INPUT_GET, 'action')=='delete')
{
    //Prolazak kroz sve stavke kolica, dok se ne poklopi sa GET id varijablom
    foreach($_SESSION['shopping_cart'] as $key =>$product)
    {
        if($product['GameID']== filter_input(INPUT_GET, 'GameID'))
        {
            //uklanja produkt iz kolica kada se poklopi sa GET id varijablom
            unset($_SESSION['shopping_cart'][$key]);
        }
    }
    //resetuje session array key kako bi se poklopili sa $product_ids numeric array
    $_SESSION['shopping_cart']= array_values($_SESSION['shopping_cart']);
}
//pre_r($_SESSION);
function pre_r($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
?>


<div class="conta">
    <?php
                include 'include/connection.php';
                
               $sql= "SELECT * FROM Games ORDER BY GameID ASC";
               $result = mysqli_query($connection, $sql);
               if($result)
               {
                   if(mysqli_num_rows($result)>0)
                   {
                       while($product = mysqli_fetch_assoc($result))
                       {
    ?>
    <div class="col-sm-5 col-md-3" >
        <form method="post" action="shoppingCart.php?action=add&GameID=<?php echo $product['GameID']; ?>">  
            <div class="product">
                <div class="product-img"><img src="<?php echo $product['Game_Img_Url'];?>" class="img-responsive" /></div>
                <h4 class="text-warning"><?php echo $product['Game_Name'];?> </h4>
                <h4><?php echo $product['Game_Price'];?> €</h4>
                <input type="number" name="quantity" class="form-control" value="1"  min="1" max="5"/>
                <input type="hidden" name="product_name" value="<?php echo $product['Game_Name'];?>"/>
                <input type="hidden" name="product_price" value="<?php echo $product['Game_Price'];?>"/>
                <input type="submit" name="add_to_cart" class="btn btn-warning" style="margin-top: 5px;"value="Add to Cart" />
            </div>
        </form>
        
    </div> 
    <?php
                       }
                   }
               }
    ?>
    <div style="clear:both"></div>  
        <br />  
        <div class="table-responsive" >  
        <table class="table" >  
            <tr><th colspan="5"><h3>Order Details</h3></th></tr>   
        <tr>  
             <th width="40%">Product Name</th>  
             <th width="10%">Quantity</th>  
             <th width="20%">Price</th>  
             <th width="15%">Total</th>  
             <th width="5%">Action</th>  
        </tr>  
        <?php   
        if(!empty($_SESSION['shopping_cart'])):  
            
             $total = 0;  
        
             foreach($_SESSION['shopping_cart'] as $key => $product): 
        ?>  
        <tr>  
           <td><?php echo $product['Game_Name']; ?></td>  
           <td><?php echo $product['Game_Quantity']; ?></td>  
           <td>€ <?php echo $product['Game_Price']; ?></td>  
           <td>€ <?php echo number_format($product['Game_Quantity'] * $product['Game_Price'], 2); ?></td>  
           <td>
               <a href="shoppingCart.php?action=delete&GameID=<?php echo $product['GameID']; ?>">
                    <div class="btn-warning" align="center">Remove</div>
               </a>
           </td>  
        </tr>  
        <?php  
                  $total = $total + ($product['Game_Quantity'] * $product['Game_Price']);  
             endforeach;  
        ?>  
        <tr>  
             <td colspan="3" align="right">Total</td>  
             <td align="right">€ <?php echo number_format($total, 2); ?></td>  
             <td></td>  
        </tr>  
        <tr>
            <!-- Show checkout button only if the shopping cart is not empty -->
            <td colspan="5">
             <?php 
               
                if (isset($_SESSION['shopping_cart'])):
                if (count($_SESSION['shopping_cart']) > 0):
             ?>
                <a href="#" class="checkout-button">Checkout</a>
             <?php endif; endif; ?>
            </td>
        </tr>
        <?php  
        endif;
        ?>  
        </table>  
         </div>
</div>
<?php
                /*include_once 'include/footer.php';*/
?>
