<?php include('conn.php'); ?>
<body>
<html>
	<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style>
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
<div class="container">
<nav class="top">
            <div class="menu" style="position:static">
              <div class="logo">
                <a href="home.html">Thirumalai Rajan Textiles</a>
              </div>
              <ul>
              <li><a href="home.html">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="order.php">Order</a></li>
              <li><a href="#">Contact</a></li>
              <li><a href="LOGIN.html">Log in</a></li>
              </ul>
            </div>
        </nav>
		<br><br><br>
	<h1 class="page-header text-center">PLACE ORDER</h1>
	<form method="POST" action="purchase.php">
		<table class="table table-striped table-bordered">
			<thead>
				<th class="text-center"><input type="checkbox" id="checkAll"></th>
				<th>Category</th>
				<th>Product Name</th>
				<th>Price</th>
				<th>Quantity</th>
			</thead>
			<tbody>
				<?php 
					$sql="select * from product left join category on category.categoryid=product.categoryid order by product.categoryid asc, productname asc";
					$query=$conn->query($sql);
					$iterate=0;
					while($row=$query->fetch_array()){
						?>
						<tr>
							<td class="text-center"><input type="checkbox" value="<?php echo $row['productid']; ?>||<?php echo $iterate; ?>" name="productid[]" style=""></td>
							<td><?php echo $row['catname']; ?></td>
							<td><?php echo $row['productname']; ?></td>
							<td class="text-right">&#8369; <?php echo number_format($row['price'], 2); ?></td>
							<td><input type="text" class="form-control" name="quantity_<?php echo $iterate; ?>"></td>
						</tr>
						<?php
						$iterate++;
					}
				?>
			</tbody>
		</table>
		<div class="row">
			<div class="col-md-3">
				<input type="text" name="customer" class="form-control" placeholder="Customer Name" required>
			</div>
			<div class="col-md-2" style="margin-left:-20px;">
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
			</div>
		</div>
	</form>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#checkAll").click(function(){
	    	$('input:checkbox').not(this).prop('checked', this.checked);
		});
	});
</script>
</body>
</html>