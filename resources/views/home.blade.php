<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - My Website</title>
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
    color:navy;
    text-decoration: none;
    transition: color 0.3s ease;
  }
  
  .links-column ul li a:hover {
    color:rgb(151, 207, 248);
  }
  
  .footer-social {
    margin-top: 20px; 
  }
  
  .footer-social a {
    color: #fff;
    margin: 0 10px;
    font-size: 20px;
    transition: color 0.3s ease;
  }
  
  .footer-social a:hover {
    color:rgb(134, 198, 244);
  }
  
  .footer-copy {
    margin-top: 10px;
  }
    </style>
</head>
<body>
<header>
  <nav class="navbar" style="background-color: #e3f2fd;">
  <ul>
    <li><a href="{{ route('home') }}">Home</a></li>
    <li><a href="{{ route('about') }}">About Us</a></li>
    <li><a href="{{ route('contact') }}">Contact Us</a></li>
    <li><a href="{{ route('coupons.index') }}">Coupons</a></li>
</ul>

    </nav>  
    </header>

    <main>
        <h1>Welcome to Our Website!</h1>
        <p>Explore our website and learn more about us.</p>

        <section>

        
    <div class="container" style="max-width: 600px; margin: 0 auto; padding: 30px; background-color: #ffffff; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); border-radius: 10px;">
        <h2 style="text-align: center; color: navy; margin-bottom: 20px;">Add Coupon</h2>

        <form method="POST" action="{{ url('/coupons') }}">
            @csrf
            <div class="mb-3" style="margin-bottom: 20px;">
                <label for="code" class="form-label" style="font-weight: bold; color: navy;">Coupon Code</label>
                <input type="text" class="form-control" id="code" name="code" required style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ddd; border-radius: 5px;">
            </div>
            <div class="mb-3" style="margin-bottom: 20px;">
                <label for="discount" class="form-label" style="font-weight: bold; color: navy;">Discount Amount</label>
                <input type="number" class="form-control" id="discount" name="discount" required style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ddd; border-radius: 5px;">
            </div>
            <div class="mb-3" style="margin-bottom: 20px;">
                <label for="expires_at" class="form-label" style="font-weight: bold; color: navy;">Expiration Date</label>
                <input type="date" class="form-control" id="expires_at" name="expires_at" required style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ddd; border-radius: 5px;">
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%; background-color: navy; color: white; padding: 10px; font-size: 18px; border: none; border-radius: 5px; cursor: pointer;">
                Add Coupon
            </button>
        </form>
    </div>
</section>
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
