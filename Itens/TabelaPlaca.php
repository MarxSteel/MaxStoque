<?php
$ChPlaca = "SELECT * FROM cad_geral WHERE categoria = '1'";
$Cpl = $PDO->prepare($ChPlaca);
$Cpl->execute();

echo '<table id="tabPlaca" class="display" cellspacing="0" width="80%">';
echo '<thead>
       <tr>
        <th width="10px">#</th>
        <th width="250px">Nome</th>
        <th width="250px">Descrição</th>
        <th></th>
       </tr>
      </thead>
      <tbody>';

  while ($R = $Cpl->fetch(PDO::FETCH_ASSOC)): 
  echo '<tr>';
  echo '<td>' . $R["id"] . '</td>';
  echo '<td>' . $R["id"] . '</td>';
  echo '<td>' . $R["id"] . '</td>';
  echo '<td>' . $R["id"] . '</td>';
  echo '</tr>';
  endwhile;
?>
   <tr>
    <td>1</td>
    <td>11</td>
    <td>111</td>
    <td>1111</td>
   </tr>
   <tr>
    <td>2</td>
    <td>22</td>
    <td>222</td>
    <td>2222</td>
   </tr>
   <tr>
    <td>3</td>
    <td>33</td>
    <td>333</td>
    <td>3333</td>
   </tr>
   <tr>
    <td>4</td>
    <td>44</td>
    <td>444</td>
    <td>4444</td>
   </tr>
   <tr>
    <td>5</td>
    <td>55</td>
    <td>555</td>
    <td>5555</td>
   </tr>
   <tr>
    <td>1</td>
    <td>11</td>
    <td>111</td>
    <td>1111</td>
   </tr>
   <tr>
    <td>2</td>
    <td>22</td>
    <td>222</td>
    <td>2222</td>
   </tr>
   <tr>
    <td>3</td>
    <td>33</td>
    <td>333</td>
    <td>3333</td>
   </tr>
   <tr>
    <td>4</td>
    <td>44</td>
    <td>444</td>
    <td>4444</td>
   </tr>
   <tr>
    <td>5</td>
    <td>55</td>
    <td>555</td>
    <td>5555</td>
   </tr>
   <tr>
    <td>1</td>
    <td>11</td>
    <td>111</td>
    <td>1111</td>
   </tr>
   <tr>
    <td>2</td>
    <td>22</td>
    <td>222</td>
    <td>2222</td>
   </tr>
   <tr>
    <td>3</td>
    <td>33</td>
    <td>333</td>
    <td>3333</td>
   </tr>
   <tr>
    <td>4</td>
    <td>44</td>
    <td>444</td>
    <td>4444</td>
   </tr>
   <tr>
    <td>5</td>
    <td>55</td>
    <td>555</td>
    <td>5555</td>
   </tr>
  </tbody>
</table>