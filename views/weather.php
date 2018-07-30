<?php 
echo "Hello, dear $arg!";
?>
<div class="table-responsive">
  	<table class="table table-bordered">
     <thead>
        <tr>
          <th>#</th>
          <th>Характеристики погоды, атмосферные явления</th>
          <th>Tемпература воздуха, °C</th>
          <th>Атм. давл., мм рт. ст.</th>
          <th>Ветер, м/с</th>
          <th>Влажность воздуха, %</th>
          <th>Ощущается, °C</th>
        </tr>
      </thead>
      <tbody>
      <?php
        for ($j=0; $j < 4; $j++) { 
				  echo "<tr>";
			    for ($i=0; $i<8; $i++) { 
				      echo "<td> ".$count[$j][$i]." </td>";
				  }
				echo "</tr>";
			  }
			?>
      </tbody>
  </table>
</div>
<pre>
<?php 
//print_r($count);
?>
</pre>