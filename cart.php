<?php require 'inc/data/products.php'; 
 require 'inc/head.php';
 
 if (empty($_SESSION['login'])){
    header("location:login.php");
} 

$quantities = array_count_values($_SESSION['cart']);?>
<section class="cookies container-fluid">
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th>Réf.</th>
                    <th>Produit</th>
                    <th>Prix unitaire</th>
                    <th>Quantité</th>
                    <th>Prix total</th>
                
                </tr>
            </thead>
            <tbody>
            <?php $totalPrice = 0; ?>
            <?php foreach ($quantities as $productId => $quantities){?>
                <tr>
                    <td><?= $productId;?></td>
                    <td><?=$catalog[$productId]['name'];?></td>
                    <td><?=$catalog[$productId]['price'];?></td>
                    <td><?=$quantities?></td>
                    <td><?= $rowTotalPrice = $quantities * $catalog[$productId]['price'];?></td>
                </tr>
                <?php $totalPrice += $rowTotalPrice; ?>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="4">
                    Total : 
                </td>
                <td>
                    <?= $totalPrice;?>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
