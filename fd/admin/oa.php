 <thead>
    <tr>
        <th style="width: 100px;">ID</th>
        <th>Status</th>
        <th class="d-none d-sm-table-cell">Submitted</th>
        <th class="d-none d-sm-table-cell">Quatity</th>
        <th class="d-none d-sm-table-cell">Customer</th>
        <th class="text-right">Price</th>
    </tr>
</thead>
<tbody>

    <?php 
        $order_list = mysqli_query($connect, "SELECT * FROM orders INNER JOIN users ON orders.uid = users.id  ORDER BY `orders`.`year` DESC LIMIT 8");
        while($q_order = mysqli_fetch_assoc($order_list)){?>

    <tr>
        <td>
            <a class="font-w600"><?=$q_order['orderid'];?></a>
        </td>
        <td>
            <?php 
                if($q_order['status'] == 1):
                    echo'<span class="badge badge-warning">Pending</span>';
                elseif($q_order['status'] == 2):
                    echo'<span class="badge badge-danger">Canceled</span>';
                elseif($q_order['status'] == 3):                                                  
                    echo'<span class="badge badge-success">Completed</span>';
                 elseif($q_order['status'] == 4):                                                  
                    echo'<span class="badge badge-info">Proccessing</span>';
                endif;
            ?>
        </td>
        <td class="d-none d-sm-table-cell">
            <?=$q_order['year'];?>                       
        </td>
        <td class="d-none d-sm-table-cell">
            <?=$q_order['qty'];?>
        </td>
        <td class="d-none d-sm-table-cell">
            <a><?=$q_order['firstname'].' '.$q_order['lastname'];?></a>
        </td>
        <td class="text-right">
            <span class="text-black">NGN<?=$q_order['price'];?></span>
        </td>
    </tr> 
    <?php }?>
    </tbody>  