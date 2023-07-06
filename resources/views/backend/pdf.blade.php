<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INVOICE</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="UTF-8">
	<style media="all">
        
		body{
			font-size: 0.875rem;
          
            font-weight: normal;
           
			padding:0;
			margin:0; 
		}
		.gry-color *,
		.gry-color{
			color:#000;
		}
		table{
			width: 100%;
		}
		table th{
			font-weight: normal;
		}
		table.padding th{
			padding: .25rem .7rem;
		}
		table.padding td{
			padding: .25rem .7rem;
		}
		table.sm-padding td{
			padding: .1rem .7rem;
		}
		.border-bottom td,
		.border-bottom th{
			border-bottom:1px solid #eceff4;
		}
		
	</style>
</head>
<body>
	<div>

		<div style="background: #eceff4;padding: 1rem;">
			<table>
				<tr>
					<td style="font-size: 1.5rem;" class="text-right strong">INVOICE</td>
				</tr>
			</table>
			<table>
				<tr>
					<td style="font-size: 1rem;" class="strong">saleservicebd.com</td>
					<td class="text-right"></td>
				</tr>
				<tr>
					<td class="gry-color small">address: mirpur, dhaka</td>
					<td class="text-right"></td>
				</tr>
				<tr>
					<td class="gry-color small">email : info@saleservicebd.com</td>
					<td class="text-right small"><span class="gry-color small">Order ID: {{$order->product_id}}</span> <span class="strong"></span></td>
				</tr>
				<tr>
					<td class="gry-color small">pone number: 01765843744</td>
					<td class="text-right small"><span class="gry-color small">Order Date: {{ $order->created_at->format('d-m-Y h:i A')}}</span> <span class=" strong"></span></td>
				</tr>
                <tr>
                    <td class="gry-color small"></td>
					<td class="text-right small">
                        cash on delevary
                    </td>
                </tr>
			</table>
		</div>

		<div style="padding: 1rem;padding-bottom: 0">
            <table>
				
				<tr><td class="strong small gry-color">Bill to:</td></tr>
				<tr><td class="gry-color small">{{ $order->coustomer_name }}</td></tr>
                <tr><td class="strong">{{ $order->address }}, {{ $order->city }}</td></tr>
				<tr><td class="gry-color small">{{ $order->email }}</td></tr>
				<tr><td class="gry-color small">{{$order->phone}}</td></tr>
			</table>
		</div>
	    <div style="padding: 1rem;">
			<table class="padding text-left small border-bottom">
				<thead>
	                <tr class="gry-color" style="background: #eceff4;">
	                    <th width="20%" class="text-left">Product Name</th>
						<th width="15%" class="text-left">customar name</th>
	                    <th width="10%" class="text-left">quantity</th>
	                    <th width="15%" class="text-left">total price</th>
	                    <th width="25%" class="text-left">imge</th>
	                </tr>
				</thead>
				<tbody class="strong">
                    <tr>
                        <td>{{$order->product_name}}</td>
                        <td>{{$order->coustomer_name}}</td>
                        <td>{{$order->qty}}</td>
                        <td>{{$order->total}}</td>           
                    </tr>
	            </tbody>
			</table>
		</div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <center><h4>signature</h4>
            <hr width="200px">
        </center>
        <br>
        <br>
        <br>
        <br>


	</div>
    <center><p>thank You for shopping with saleservicebd.com</p></center>
</body>
</html>
