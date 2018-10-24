<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>List Products</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6">
						<h1>List Products</h1>
					</div>
					<div class="col-md-6" align="right">
						<button class="btn btn-primary" style="margin-top: 25px;"><i class="glyphicon glyphicon-plus"></i> Add New Product</button>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Stock</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($products as $product)
								<tr>
									<td>{{ $product->id }}</td>
									<td>{{ $product->name }}</td>
									<td>{{ $product->stock }}</td>
									<td>{{ $product->price }}</td>
								</tr>
							@empty
								<tr>
									<td colspan="4">The data is empty.</td>
								</tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>