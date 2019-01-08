<div class="page-header">
    <h1>Hasil Voting</h1>
</div>
<?php
    $rows = $db->get_results("SELECT c.*, COUNT(p.ID) as total  FROM tb_pencalon c LEFT JOIN tb_pilih p ON p.id_pencalon=c.id_pencalon GROUP BY c.id_pencalon");
    foreach($rows as $row){
        $categories[] = $row->nama_pencalon;
        $data[] = $row->total * 1;
    }
    
?>
<table class="table table-bordered">
    <thead><tr>
        <th>Pencalon</th>
        <th>Total</th>
    </tr></thead>
    <?php    
    foreach($rows as $row):?>
    <tr>
        <td><img class="thumbnail" height="75" src="gambar/<?=$row->gambar?>" /></td>
        <td><?=number_format($row->total)?></td>
    </tr>
    <?php endforeach?>
</table>
