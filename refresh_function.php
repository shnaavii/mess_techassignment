<?php
session_start();
	require('database.php');
	if(isset($_REQUEST['refresh_data'])){
		$access_token = "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";
$url = "https://thememyparty1.myshopify.com/admin/api/2023-10/orders.json?status=any";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "X-Shopify-Access-Token: $access_token"
]);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
$response = curl_exec($ch);
curl_close($ch);
$orders = json_decode($response, true);
		$l=0;
					foreach ($orders['orders'] as $order) {
						if($_SESSION['email'] == $order['email']){
						$l++;
						$totalVisitors = 100; // Example value of visitors
						$conversionRate = ($l / $totalVisitors) * 100;
							echo'
							<tr>
								<th scope="row">'.$l.'</th>
								<td>'.$order['id'].'</td>
								<td>'.$order['email'].'</td>
								<td>'.$order['total_price'].'</td>
								<td>'.$order['payment_gateway_names'][0].'</td>
								<td>'.$conversionRate.'%</td>
							</tr>';
						}
						
					}
	}

?>