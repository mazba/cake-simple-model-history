<table class="table">
    <thead>
        <tr>
            <th><?= __('Column') ?></th>
            <th><?= __('Old Data') ?></th>
            <th><?= __('New Data') ?></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($data['original_data'] as $row=>$value){
            ?>
                <tr>
                    <th><?php echo $row; ?></th>
                    <?php
                    $ovrW= false;
                    if($value != $data['new_data'][$row]):
                        $ovrW=true;
                        ?>
                        <td style="color: red"><del><?php echo $value; ?></del></td>
                        <td style="color: #45b6af; font-weight: bold"><?php echo $data['new_data'][$row] ?></td>
                        <td><i style="color: red" class="fa fa-warning"></i></td>
                        <?php
                    else:
                        ?>
                        <td><?php echo $value; ?></td>
                        <td><?php echo $data['new_data'][$row] ?></td>
                        <td><i  style="color: green" class="fa fa-check"></i></td>
                        <?php
                    endif;
                    ?>
                </tr>
            <?php
        }
        ?>
    </tbody>
</table>