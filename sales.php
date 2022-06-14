
<body>
<html><head>
	<style>
		nav{
			width:100%;
		}
.top{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins',sans-serif;
  }
  ::selection{
    color: #000;
    background: #fff;
  }
  nav{
    
    background: #1b1b1b;
    border:2px;
	padding:10px;
	
  }
  nav .menu{
    max-width: 1250px;
    margin: auto;
    margin-top: 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
    
  }
  .menu .logo a{
    text-decoration: none;
    color: #fff;
    font-size: 35px;
    font-weight: 600;
  }
  .menu ul{
    display: inline-flex;
  }
  .menu ul li{
    list-style: none;
    margin-left: 7px;
  }
  .menu ul li:first-child{
    margin-left: 0px;
  }
  .menu ul li a{
    text-decoration: none;
    color: #fff;
    font-size: 18px;
    font-weight: 500;
    padding: 8px 15px;
    border-radius: 5px;
    transition: all 0.3s ease;
  }
  .menu ul li a:hover{
    background: #fff;
    color: black;
  }
</style>
</head>
<div class="container">
<nav class="top">

            <div class="menu" style="position:static">
              <div class="logo">
                <a href="index.html">Thirumalai Rajan Textiles</a>
              </div>
              <ul>
              <li><a href="index.html">Home</a></li>
                <li><a href="sales.php">Orders</a></li>
                <li><a href="product.php">Alter prices</a></li>
                <li><a href="category.php">Category</a></li>
                <li><a href="index.html">Log out</a></li>
              </ul>
            </div>
        </nav>
		<?php include('header.php'); ?>
	<h1 class="page-header text-center">PLACED ORDERS</h1>
	
	<table class="table table-striped table-bordered">
		<thead>
			<th>Date</th>
			<th>Customer</th>
			<th>Total orders</th>
			<th>Details</th>
		</thead>
		<tbody>
			<?php 
				$sql="select * from purchase order by purchaseid desc";
				$query=$conn->query($sql);
				while($row=$query->fetch_array()){
					?>
					<tr>
						<td><?php echo date('M d, Y h:i A', strtotime($row['date_purchase'])) ?></td>
						<td><?php echo $row['customer']; ?></td>
						<td class="text-right">&#8369; <?php echo number_format($row['total'], 2); ?></td>
						<td><a href="#details<?php echo $row['purchaseid']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> View </a>
							<?php include('sales_modal.php'); ?>
						</td>
					</tr>
					<?php
				}
			?>
		</tbody>
	</table>
</div>
</body>
</html>