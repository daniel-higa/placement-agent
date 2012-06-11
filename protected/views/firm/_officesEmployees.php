<h2>Offices and Employees</h2>

<a href="<?php echo $this->createUrl('office/create', array('firm_id' => $model->id))?>"><button>add Office</button></a>
<?php
    foreach($model->offices as $o) {
        echo '<table>';
        echo '<tr>';
        echo '<td>'. $o->getName() .'</td>';
        echo '<td>'. CHtml::link('view', array('office/view', 'id' => $o->id )) . ' ' 
            . CHtml::link('edit', array('office/update', 'id' => $o->id ))  . ' ' 
            . CHtml::link('add employee', array('employees/create', 'office_id' => $o->id ))  . ' ' 
        .'</td>';
        echo '</tr>';
        echo '</table>';

        echo '<table class="items"><thead>
                    <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Last Comm</th>
                    <th>Date</th>
                    <th></th>
                    </tr>
                </thead><tbody>';
        $i = 0;
        foreach ($o->employees as $e) {
            echo '<tr class="'. (($i%2)?'even':'odd')  .'">';
            echo '<td>'. $e->fullname() .'</td>';
            echo '<td>'. $e->position .'</td>';
            if ($lc = $e->getLastCommunication()) {
                echo '<td>'. substr($lc->description, 0, 20) .'</td>';
                echo '<td>'. $lc->date .'</td>';
            } else {
                echo '<td></td>';
                echo '<td>N/A</td>';
            }
            
            echo '<td>'. CHtml::link('view', array('employees/view', 'id' => $e->id )) . ' ' 
                . CHtml::link('edit', array('employees/update', 'id' => $e->id )) . ' ' 
                .'</td>';
            echo '</tr>';
            $i++;
        }
        echo '</tbody></table>';
    }
?>


