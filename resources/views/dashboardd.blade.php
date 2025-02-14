<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>
</head>
<body>
    <h1>Welcome to Seller Dashboard</h1>
    <nav>
        <ul>
            <li><a href="{{ route('seller.dashboardd') }}">Dashboard</a></li>
            <li><a href="{{ route('seller.products') }}">My Products</a></li>
            <li><a href="{{ route('seller.orders') }}">Orders</a></li>
        </ul>
    </nav>
</body>
</html>
