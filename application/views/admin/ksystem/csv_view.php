<input type="button" class="btn btn-mini btn-danger" value="Clear Preview" onclick="Admks.clear()" />
<table cellpadding="0" cellspacing="0" border="1">
    <thead>
    <tr>
            <th>NO</th>
            <th>DATE</th>
            <th>TIME</th>
            <th>EVENT</th>
            <th>AREA</th>
            <th>CITY</th>
            <th>LOCATION</th>
            <th>SPEAKER</th>
            <th>PRIORITY</th>
    </tr>
    </thead>
 
    <tbody>
            <?php $i = 1; foreach($csvData as $field) { ?>
                <tr>
                    <td><?=$i?></td>
                    <td><?=$field['DATE']?></td>
                   <td><?=$field['TIME']?></td>
                    <td><?=$field['EVENT']?></td>
                    <td><?=$field['AREA']?></td>
                    <td><?=$field['CITY']?></td>
                    <td><?=$field['LOCATION']?></td>
                    <td><?=$field['SPEAKER']?></td>
                    <td><?=$field['PRIORITY']?></td>
                </tr>
            <?php $i++; } ?>
    </tbody>
 
</table>