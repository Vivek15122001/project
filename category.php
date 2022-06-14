<html>
	<head>
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
</head>

<body>
<?php include('header.php'); ?>

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
<div class="container">
	<h1 class="page-header text-center">CATEGORY</h1>
	<div class="row">
		<div class="col-md-12">
			<a href="#addcategory" data-toggle="modal" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Category</a>
		</div>
	</div>
	<div style="margin-top:10px;">
		<table class="table table-striped table-bordered">
			<thead>
				<th>Category Name</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php
					$sql="select * from category order by categoryid asc";
					$query=$conn->query($sql);
					while($row=$query->fetch_array()){
						?>
						<tr>
							<td><?php echo $row['catname']; ?></td>
							<td>
								<a href="#editcategory<?php echo $row['categoryid']; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit</a> || <a href="#deletecategory<?php echo $row['categoryid']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
								<?php include('category_modal.php'); ?>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
</div>
<?php include('modal.php'); ?>
</body>
</html>