
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <style>
        
        body {
    font-family: 'Orpheus Pro', serif;
}
main h1 {
    text-align: center;
    color: navy;
    margin-bottom: 20px; 
    padding: 10px;
    font-family: 'Orpheus Pro', serif;
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

form {
    height: 400px;
    max-width: 500px;
    margin:30px auto; 
    padding: 40px;
    border: 3px solidrgb(117, 187, 236);
    background-color:rgb(164, 213, 248);
    border-radius: 10px;
    box-shadow: 0 6px 10px rgba(87, 87, 87, 0.15);
    text-align: left; 
}

form label {
    display: block; 
    color: navy;
    text-align: left; 
    font-weight: 600; 
    padding: 10px 0 5px; 
    font-family: 'Orpheus Pro', serif;
    font-size: 14px; 
}

input,
textarea {
    display: block;
    margin: 0 auto 15px auto;
    padding: 12px;
    width: 90%;
    border: 1px solid rgba(200, 200, 200, 0.8);
    border-radius: 4px;
    font-size: 16px;
}
button {
    display: block;
    margin: 0 auto; 
    padding: 12px;
    width: 95%;
    background-color:  #e3f2fd;
    border: none;
    border-radius: 5px;
    font-size: 18px;
    color: navy;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

button:hover {
  background-color:rgb(70, 175, 250);
}
footer {
    background: linear-gradient(45deg, #e3f2fd, #e3f2fd);
    color: navy;
    padding: 20px 0;
    font-size: 14px;
    text-align: center;
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
            </ul>
    </nav>  
    </header>
    <main>
        <h1>Contact Us</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.submit') }}" method="POST">
            @csrf
            <label for="name">Your Name</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Your Email</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Your Message</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button type="submit">Send Message</button>
        </form>
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
