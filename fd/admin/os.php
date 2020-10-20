 <thead>
    <tr>
        <th style="width: 100px;">ID</th>
        <th>Status</th>
        <th class="d-none d-sm-table-cell">Quatity</th>
        <th class="d-none d-sm-table-cell">Customer</th>
        <th class="d-none d-sm-table-cell">Customer Needs</th>
        <th class="text-right">Price</th>
        <th class="text-right">Actions</th>
    </tr>
</thead>
<tbody>
    <?php 
    $order_list = mysqli_query($connect, "SELECT * FROM orders INNER JOIN users ON orders.uid = users.id ORDER BY `orders`.`year` DESC LIMIT 8" );
    while($q_order = mysqli_fetch_assoc($order_list)){?>

    <tr>
        <td>
            <a class="font-w600"><?=$q_order['orderid'];?></a>
        </td>
        <td>
            <?php 
                if($q_order['status'] == 1):
                    echo'<span class="badge  badge-lg badge-warning">Pending</span>';
                elseif($q_order['status'] == 2):
                    echo'<span class="badge  badge-lg badge-danger">Canceled</span>';
                elseif($q_order['status'] == 3):                                                  
                    echo'<span class="badge badge-lg badge-success">Completed</span>';
                elseif($q_order['status'] == 4):                                                  
                    echo'<span class="badge badge-lg badge-info">Proccessing</span>';
                endif;
                $oid = base64_encode($q_order['o_id']);
            ?>
        </td>
           
        <td class="d-none d-sm-table-cell">
            <?=$q_order['qty'];?>
        </td>
        <td class="d-none d-sm-table-cell">
            <a><?=$q_order['firstname'].' '.$q_order['lastname'];?></a>
        </td>
        <td class="d-none d-sm-table-cell">
            <a href="<?=base_url('');?>needs.php?u=<?=base64_encode($q_order['o_id']);?>&&oi=<?=base64_encode($q_order['orderid']);?>" class="btn btn-sm btn-alt-success">Check <?=$q_order['firstname'];?> Needs</a>
        </td>
        <td class="text-right">
            <span class="text-black">NGN<?=$q_order['price'];?></span>
        </td>
        <td class="">
            <?php
                if($q_order['status'] == 4):
                    echo '  <a href="'.base_url('').'orders.php?Complete='.$oid.'">
                                <div class="btn btn-sm btn-success">Mark as Complete</div>
                            </a> ';
                elseif($q_order['status'] == 1):
                    echo '  <a href="'.base_url('').'orders.php?Processing='.$oid.'">
                                <div class="btn btn-sm btn-warning">Mark as Processing</div>
                            </a>';
                else:
                    echo '  <a>
                                <div class="btn btn-sm btn-alt-danger">Disable Action</div>
                            </a> ';
                endif;
            ?>
                                
        </td>
    </tr> 
<?php }?> 
</tbody>   