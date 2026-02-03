<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Customer Service</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --primary-color: #8459ff;
            --secondary-color: #6ea8f4;
            --dark-bg: #1a1a2e;
            --card-bg: rgba(255, 255, 255, 0.1);
            --text-primary: #ffffff;
            --text-on-dark: #ffffff;
            --text-secondary: #b8b8d2;
            --shadow-color: rgba(0, 0, 0, 0.3);
            --transition-speed: 0.4s;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', 'Helvetica Neue', sans-serif;
            color: var(--text-primary);
            line-height: 1.6;
            overflow-x: hidden;
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
        }

        /* Starry Background */
        .stars-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .star {
            position: absolute;
            background-color: #fff;
            border-radius: 50%;
            animation: twinkle var(--duration, 5s) infinite ease-in-out;
        }

        @keyframes twinkle {
            0%, 100% { opacity: 0.2; }
            50% { opacity: 1; }
        }

        /* Shooting Stars */
        .shooting-star {
            position: absolute;
            width: 4px;
            height: 4px;
            background: linear-gradient(to right, rgba(255,255,255,0), #fff);
            border-radius: 50%;
            animation: shoot var(--duration, 5s) infinite;
            transform: rotate(45deg);
        }

        .shooting-star::before {
            content: '';
            position: absolute;
            top: 50%;
            right: 0;
            height: 1px;
            background: linear-gradient(to right, rgba(255,255,255,0), #fff);
            width: 100px;
            transform: translateY(-50%);
        }

        @keyframes shoot {
            0% { 
                transform: translateX(0) translateY(0) rotate(45deg);
                opacity: 0;
            }
            10% { opacity: 1; }
            70% { opacity: 1; }
            100% { 
                transform: translateX(1000px) translateY(-300px) rotate(45deg);
                opacity: 0;
            }
        }

        .app-container {
            max-width: 420px;
            margin: 0 auto;
            min-height: 100vh;
            position: relative;
            background: rgba(15, 12, 41, 0.7);
            backdrop-filter: blur(10px);
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        /* App Header */
        .app-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(31, 31, 46, 0.8);
            color: var(--text-on-dark);
            padding: 18px 20px;
            position: relative;
            z-index: 10;
            backdrop-filter: blur(5px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .app-header h1 {
            font-size: 18px;
            margin: 0;
            font-weight: 500;
            letter-spacing: 0.5px;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        .app-header a {
            color: var(--text-on-dark);
            text-decoration: none;
            font-size: 18px;
            transition: all 0.3s ease;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .app-header a:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: scale(1.1);
        }

        /* Banner Section */
        .banner {
            width: calc(100% - 30px);
            margin: 15px auto;
            position: relative;
            overflow: hidden;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
            transition: all 0.5s ease;
            height: 150px;
        }

        .banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(132, 89, 255, 0.3), rgba(110, 168, 244, 0.3));
            z-index: 1;
        }

        .banner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 5s ease;
        }

        .banner:hover img {
            transform: scale(1.1);
        }

        /* Glow Effect */
        .glow {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: radial-gradient(circle at center, rgba(132, 89, 255, 0.2), transparent 70%);
            animation: pulse-glow 8s infinite alternate;
        }

        @keyframes pulse-glow {
            0% { opacity: 0.3; }
            100% { opacity: 0.7; }
        }

        /* Chat Options */
        .chat-options {
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .service-card {
            display: flex;
            align-items: center;
            background: var(--card-bg);
            padding: 18px 20px;
            border-radius: 14px;
            color: var(--text-primary);
            text-decoration: none;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            transition: all var(--transition-speed) ease;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(5px);
            z-index: 2;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, var(--primary-color), var(--secondary-color));
            transition: all var(--transition-speed) ease;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
            background: rgba(255, 255, 255, 0.15);
        }

        .service-card:hover::before {
            width: 8px;
            box-shadow: 0 0 15px var(--primary-color);
        }

        .service-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            margin-right: 16px;
            color: white;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            box-shadow: 0 4px 15px rgba(132, 89, 255, 0.4);
            transition: all var(--transition-speed) ease;
            position: relative;
            overflow: hidden;
        }

        .service-icon::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                to bottom right,
                rgba(255, 255, 255, 0.3),
                rgba(255, 255, 255, 0)
            );
            transform: rotate(30deg);
            transition: all 0.5s ease;
        }

        .service-card:hover .service-icon {
            transform: rotate(5deg) scale(1.1);
            box-shadow: 0 6px 20px rgba(132, 89, 255, 0.6);
        }

        .service-card:hover .service-icon::after {
            left: 100%;
        }

        .service-text {
            flex: 1;
            font-size: 16px;
            font-weight: 500;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
        }

        .service-arrow {
            font-size: 16px;
            color: var(--text-secondary);
            transition: all var(--transition-speed) ease;
        }

        .service-card:hover .service-arrow {
            color: var(--primary-color);
            transform: translateX(5px);
            text-shadow: 0 0 10px var(--primary-color);
        }

        /* Specific service colors */
        .livechat { border-left: 4px solid #8459ff; }
        .telegram { border-left: 4px solid #0088cc; }
        .whatsapp { border-left: 4px solid #25D366; }
        .instagram { border-left: 4px solid #E1306C; }
        .telegram-bot { border-left: 4px solid #0077b5; }
        .agent-mail { border-left: 4px solid #5a5aff; }

        /* Footer */
        .app-footer {
            text-align: center;
            padding: 25px 0;
            color: var(--text-secondary);
            font-size: 13px;
            position: relative;
            backdrop-filter: blur(5px);
            background: rgba(31, 31, 46, 0.3);
            margin-top: 20px;
        }

        .app-footer::before {
            content: '';
            display: block;
            width: 80%;
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(255, 255, 255, 0.1), transparent);
            margin: 0 auto 15px;
        }

        .brand {
            color: var(--primary-color);
            font-weight: 600;
            letter-spacing: 0.5px;
            text-shadow: 0 0 10px var(--primary-color);
        }

        /* Floating animation */
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .floating {
            animation: float 6s ease-in-out infinite;
        }

        /* Particle Effects */
        .particle {
            position: absolute;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            pointer-events: none;
            z-index: -1;
        }
    </style>
</head>
<body>
    <!-- Starry Background -->
    <div class="stars-container" id="stars-container"></div>

    <div class="app-container">
        <!-- Header Section -->
        <header class="app-header">
            <a href="javascript:history.back()" class="ripple"><i class="fas fa-chevron-left"></i></a>
            <h1>Customer Service</h1>
            <a href="index.php" class="ripple"><i class="fas fa-home"></i></a>
        </header>

        <main>
            <!-- Banner Image -->
            <div class="banner floating">
                <div class="glow"></div>
                <img src="https://images.unsplash.com/photo-1635070041078-e363dbe005cb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1680&q=80" alt="Premium Support">
            </div>

            <!-- Chat Options -->
            <div class="chat-options">
                <a href="https://t.me/helpline_chickengamebot" class="service-card ripple livechat">
                    <div class="service-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <span class="service-text">Telegram Channel</span>
                    <i class="fas fa-chevron-right service-arrow"></i>
                </a>

                <a href="https://t.me/helpline_chickengamebot" class="service-card ripple telegram">
                    <div class="service-icon">
                        <i class="fab fa-telegram"></i>
                    </div>
                    <span class="service-text">Telegram Bot</span>
                    <i class="fas fa-chevron-right service-arrow"></i>
                </a>

           

                <a href="https://t.me/helpline_chickengamebot" class="service-card ripple instagram">
                    <div class="service-icon">
                        <i class="fab fa-instagram"></i>
                    </div>
                    <span class="service-text">Instagram DM</span>
                    <i class="fas fa-chevron-right service-arrow"></i>
                </a>

             

                </a>
            </div>
        </main>

        <!-- Footer -->
        <footer class="app-footer">
            <p>UI Crafted with <i class="fas fa-heart" style="color: #ff4757; text-shadow: 0 0 10px #ff4757;"></i> by <span class="brand">U</span></p>
        </footer>
    </div>

    <script>
        // Create stars
        function createStars() {
            const container = document.getElementById('stars-container');
            const starsCount = 150;
            
            for (let i = 0; i < starsCount; i++) {
                const star = document.createElement('div');
                star.classList.add('star');
                
                // Random properties
                const size = Math.random() * 2 + 1;
                const posX = Math.random() * 100;
                const posY = Math.random() * 100;
                const duration = Math.random() * 5 + 3;
                const delay = Math.random() * 5;
                
                star.style.width = `${size}px`;
                star.style.height = `${size}px`;
                star.style.left = `${posX}%`;
                star.style.top = `${posY}%`;
                star.style.setProperty('--duration', `${duration}s`);
                star.style.animationDelay = `${delay}s`;
                
                container.appendChild(star);
            }
            
            // Create shooting stars
            setInterval(() => {
                const shootingStar = document.createElement('div');
                shootingStar.classList.add('shooting-star');
                
                const posX = Math.random() * 20;
                const posY = Math.random() * 20;
                const duration = Math.random() * 3 + 2;
                
                shootingStar.style.left = `${posX}%`;
                shootingStar.style.top = `${posY}%`;
                shootingStar.style.setProperty('--duration', `${duration}s`);
                
                container.appendChild(shootingStar);
                
                // Remove after animation
                setTimeout(() => {
                    shootingStar.remove();
                }, duration * 1000);
            }, 2000);
        }
        
        // Create particles on click
        document.addEventListener('click', function(e) {
            const particlesCount = 10;
            const colors = ['#8459ff', '#6ea8f4', '#ffffff', '#ff4757'];
            
            for (let i = 0; i < particlesCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                
                const size = Math.random() * 10 + 5;
                const color = colors[Math.floor(Math.random() * colors.length)];
                const posX = e.clientX;
                const posY = e.clientY;
                const angle = Math.random() * 360;
                const distance = Math.random() * 100 + 50;
                const duration = Math.random() * 1 + 0.5;
                
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.backgroundColor = color;
                particle.style.left = `${posX}px`;
                particle.style.top = `${posY}px`;
                
                document.body.appendChild(particle);
                
                // Animate particle
                const radians = angle * (Math.PI / 180);
                const endX = posX + Math.cos(radians) * distance;
                const endY = posY + Math.sin(radians) * distance;
                
                particle.animate([
                    { 
                        transform: 'translate(0, 0) scale(1)',
                        opacity: 1 
                    },
                    { 
                        transform: `translate(${endX - posX}px, ${endY - posY}px) scale(0)`,
                        opacity: 0 
                    }
                ], {
                    duration: duration * 1000,
                    easing: 'cubic-bezier(0.4, 0, 0.2, 1)'
                });
                
                // Remove after animation
                setTimeout(() => {
                    particle.remove();
                }, duration * 1000);
            }
        });
        
        // Initialize
        window.addEventListener('DOMContentLoaded', () => {
            createStars();
            
            // Add hover effect to service cards
            document.querySelectorAll('.service-card').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                    this.style.boxShadow = '0 15px 30px rgba(0, 0, 0, 0.3)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = '';
                    this.style.boxShadow = '';
                });
            });
        });
    </script>
</body>
</html>
<!-- Premium GV-Style Bottom Navigation (Large Icons) -->
<style>
  .gv-bottom-nav {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background: rgba(17, 24, 39, 0.95);
    backdrop-filter: blur(12px);
    display: flex;
    justify-content: space-around;
    align-items: center;
    padding: 12px 0;
    z-index: 1000;
    box-shadow: 0 -5px 15px rgba(0, 0, 0, 0.6);
    border-top-left-radius: 16px;
    border-top-right-radius: 16px;
  }
  .gv-bottom-nav a {
    flex: 1;
    text-align: center;
    font-size: 13px;
    color: #aaa;
    text-decoration: none;
    transition: all 0.3s ease;
  }
  .gv-bottom-nav a .icon-wrap {
    background: rgba(129, 140, 248, 0.08);
    width: 48px;
    height: 48px;
    margin: 0 auto 6px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
  }
  .gv-bottom-nav a .icon-wrap i {
    font-size: 20px;
    transition: transform 0.3s ease, color 0.3s ease;
  }
  .gv-bottom-nav a:hover .icon-wrap {
    background: rgba(129, 140, 248, 0.2);
    transform: scale(1.1);
  }
  .gv-bottom-nav a.active {
    color: #a78bfa;
    font-weight: 600;
  }
  .gv-bottom-nav a.active .icon-wrap {
    background: #a78bfa20;
    animation: pulseGlow 1.8s infinite;
  }
  .gv-bottom-nav a.active .icon-wrap i {
    color: #a78bfa;
  }

  @keyframes pulseGlow {
    0%, 100% {
      box-shadow: 0 0 5px #a78bfa, 0 0 10px #a78bfa;
    }
    50% {
      box-shadow: 0 0 15px #c084fc, 0 0 25px #c084fc;
    }
  }
</style>

<div class="gv-bottom-nav">
  <a href="index.php" class="<?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>">
    <div class="icon-wrap"><i class="fas fa-home"></i></div>
    Main
  </a>
  <a href="deposit.html" class="<?= basename($_SERVER['PHP_SELF']) == 'deposit.html' ? 'active' : '' ?>">
    <div class="icon-wrap"><i class="fas fa-arrow-down"></i></div>
    Deposit
  </a>
    <a href="refer.php" class="<?= basename($_SERVER['PHP_SELF']) == 'refer.php' ? 'active' : '' ?>">
    <div class="icon-wrap"><i class="fas fa-bullhorn"></i></div>
    Promotion
  </a>
  <a href="withdraw.html" class="<?= basename($_SERVER['PHP_SELF']) == 'withdraw.html' ? 'active' : '' ?>">
    <div class="icon-wrap"><i class="fas fa-arrow-up"></i></div>
    Withdraw
  </a>
  <a href="main.php" class="<?= basename($_SERVER['PHP_SELF']) == 'main.php' ? 'active' : '' ?>">
    <div class="icon-wrap"><i class="fas fa-gamepad"></i></div>
    Games
  </a>
</div>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="assets/js/shared_bottom_nav.js"></script>
