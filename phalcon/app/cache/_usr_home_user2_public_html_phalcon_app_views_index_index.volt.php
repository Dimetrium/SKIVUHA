<?php
if(!isset($data['anketa']))
{
  $data['anketa'] = new stdClass;
  $data['anketa']->firstName = '';
  $data['anketa']->lastName = '';
  $data['anketa']->age = 1;
  $data['anketa']->description = '';  
}
?>

<?php if(count($data['data']) > 0){ ?>

  <table>
    <tr>
    <?php foreach($data['data'][0]->columnMap() as $cell){?>
      <th>
        <?php echo $cell ?>
        </th>
        <?php } ?>
        <th>Edit</th>
        <th>Delete</th>
        </tr>
        <?php foreach($data['data'] as $row){ ?>
          <tr>
            <?php foreach($row->columnMap() as $cell){?>
              <td>
                <?php echo $row->$cell; ?>  
                </td>
                <?php } ?>
                <td><?php echo Phalcon\Tag::linkTo('Index/editAnketa/' . $row->id, 'Edit'); ?></td>
                <td><?php echo Phalcon\Tag::linkTo('Index/deleteAnketa/' . $row->id, 'Delete'); ?></td>
                </tr>
                <?php } ?>
                </table>
                <?php } ?>

                <?php echo Phalcon\Tag::form(array("Index/" . $data['operation'], 'method' => 'POST')); ?>

                <table>
                <tr>
                <td>
                <label>First name</label><br>
                <?php echo Phalcon\Tag::textField(array("firstName", "size" => 20, 'value' => $data['anketa']->firstName)); ?>
                </td>
                </tr>
                <tr>
                <td>
                <label>Last name</label><br>
                <?php echo Phalcon\Tag::textField(array("lastName", "size" => 20, 'value' => $data['anketa']->lastName)); ?>
                </td>
                </tr>
                <tr>
                <td>  
                <label>Age:</label><br>
                <?php echo Phalcon\Tag::numericField(array("age", "min" => "1", "max" => "150", "value" => $data['anketa']->age)); ?>
                </td>
                </tr>
                <tr>
                <td>
                <label>Description:</label><br>
                <?php echo Phalcon\Tag::textArea(array("description", "cols" => 40, "rows" => 10, 'value' => $data['anketa']->description)); ?>
                </td>
                </tr>
                <tr>
                <td>
                <?php echo Phalcon\Tag::submitButton("Save"); ?>
                </td>
                </tr>
                </form>

