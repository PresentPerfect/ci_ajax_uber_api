<?php   if (!isset($products))
		{
?>
			<h2 class='error'>Invalid Request. Please try again.</h2>
<?php		
		}
		elseif (empty($products))
		{
?>
			<h2 class='error'>No Uber Services in the specified location.</h2>
<?php		
		}
		else
		{
?>
		<table class="table table-bordered">
		    <thead>
		      <tr>
		        <th>Product</th>
		        <th>Description</th>
		        <th>Vehicle</th>
		        <th>Capacity</th>
		        <th>cost/min</th>
		        <th>cost/mile</th>
		        <th>Currency</th>
		      </tr>
		    </thead>
		    <tbody>
<?php
			foreach ($products as $product)
			{
?>
		      <tr>
		        <td><?=	$product['display_name'] ?></td>
		        <td><?= $product['description'] ?></td>
		        <td><img src=<?= $product['image'] ?> ></td>
		        <td><?= $product['capacity'] ?></td>
		        <td><?= $product['price_details']['cost_per_minute'] ?></td>
		        <td><?= $product['price_details']['cost_per_distance'] ?></td>
		        <td><?= $product['price_details']['currency_code'] ?></td>
		      </tr>
<?php
	}
?>      
		    </tbody>
		</table>
<?php 
		}
?>