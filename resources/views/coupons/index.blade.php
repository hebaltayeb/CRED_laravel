<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coupons</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <style>
body {
    font-family: 'Orpheus Pro', serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9; 
    color: navy; 
    min-height: 100vh;
    display: flex;
    flex-direction: column; 
}

main {
    text-align: center;
    flex: 1; 
    margin: auto; 
    padding: 20px;
}

main h1 {
    color: navy;
    font-family: 'Orpheus Pro', serif;
    margin-bottom: 20px;
    font-size: 32px;
}

main p, main h2 {
    color: navy;
    font-family: 'Orpheus Pro', serif;
    margin-bottom: 15px;
    font-size: 18px;
}

.navbar {
    padding: 10px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.navbar ul {
    list-style: none;
    display: flex; 
    justify-content: center; 
    margin: 0;
    padding: 0;
    width: 100%; 
}

.navbar ul li {
    margin: 0 15px;
}

.navbar ul li a {
    color: navy;
    text-decoration: none;
    font-size: 18px;
    transition: color 0.3s ease;
}

.navbar ul li a:hover {
    color: navy; 
    text-decoration: underline; 
}

table {
    margin: 20px auto;
    width: 90%; /* زيادة عرض الجدول */
    border-collapse: collapse;
    text-align: center;
    background-color: white;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 25px; 
    border: 1px solid #ddd;
    font-size: 18px; 
}

th {
    background-color: rgb(57, 151, 250);
    color: white;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #e9ecef;
}

footer {
    background: linear-gradient(45deg, #e3f2fd, rgb(164, 213, 248));
    color: navy;
    padding: 20px 0;
    font-size: 14px;
    text-align: center;
    margin-top: auto; 
}
.footer-container {
    max-width: 1000px;
    margin: 0 auto;
    padding: 0 20px;
}

.footer-links {
    display: flex;
    justify-content: left;
    gap: 40px;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 1px solid rgba(85, 111, 242, 0.3); 
}

.links-column {
    text-align: left;
}

.links-column h4 {
    margin-bottom: 10px;
    font-size: 16px;
}

.links-column ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.links-column ul li {
    margin-bottom: 8px;
}

.links-column ul li a {
    color: navy;
    text-decoration: none;
    transition: color 0.3s ease;
}

.links-column ul li a:hover {
    color: rgb(151, 207, 248);
}

.footer-social {
    margin-top: 20px; 
}

.footer-social a {
    color: navy;
    margin: 0 10px;
    font-size: 20px;
    transition: color 0.3s ease;
}

.footer-social a:hover {
    color: rgb(134, 198, 244);
}

.footer-copy {
    margin-top: 10px;
}
    </style>
</head>
<header>
    <nav class="navbar" style="background-color: #e3f2fd;">
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About Us</a></li>
            <li><a href="{{ route('contact') }}">Contact Us</a></li>
        </ul>
    </nav>  
</header>

<body>
    <main>
        <h1>Available Coupons</h1>
        <table>
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Discount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($coupons as $coupon)
                    <tr>
                        <td>{{ $coupon->code }}</td>
                        <td>{{ $coupon->discount }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>

    <footer>
        <div class="footer-container">
            <div class="footer-links">
                <div class="links-column">
                    <h4>Contact</h4>
                    <ul>
                        <li><a href="mailto:info@our.com">info@our.com</a></li>
                        <li><a href="tel:+123456789">+123 456 789</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <p>&copy; 2025 My Website. All rights reserved.</p>
    </footer>
</body>
</html>
