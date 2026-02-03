<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Logging Out - Chicken Road Game</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    
    * {
      font-family: 'Poppins', sans-serif;
    }
    
    .gradient-bg {
      background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
    }
    
    .glass-effect {
      background: rgba(15, 23, 42, 0.7);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.1);
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }
    
    .particle {
      position: absolute;
      background: rgba(255, 255, 255, 0.5);
      border-radius: 50%;
      pointer-events: none;
    }
    
    .wave {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 100px;
      background: url('data:image/svg+xml;utf8,<svg viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"><path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" fill="rgba(59,130,246,0.1)" opacity=".25"/><path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" fill="rgba(59,130,246,0.1)" opacity=".5"/><path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" fill="rgba(59,130,246,0.1)"/></svg>');
      background-size: cover;
      background-repeat: no-repeat;
      animation: wave 8s linear infinite;
    }
    
    @keyframes wave {
      0% { background-position-x: 0; }
      100% { background-position-x: 1200px; }
    }
    
    .floating {
      animation: floating 3s ease-in-out infinite;
    }
    
    @keyframes floating {
      0% { transform: translateY(0px); }
      50% { transform: translateY(-15px); }
      100% { transform: translateY(0px); }
    }
    
    .pulse {
      animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
    
    @keyframes pulse {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.5; }
    }
  </style>
</head>
<body class="gradient-bg min-h-screen flex items-center justify-center relative overflow-hidden">
  <!-- Animated Background Particles -->
  <div id="particles-js" class="fixed inset-0 overflow-hidden pointer-events-none"></div>
  
  <!-- Animated Waves -->
  <div class="wave"></div>
  
  <!-- Main Content -->
  <div class="glass-effect rounded-2xl p-8 mx-4 max-w-md w-full text-center animate__animated animate__fadeInUp relative z-10">
    <div class="floating mb-6">
      <div class="w-24 h-24 rounded-full bg-blue-500/20 flex items-center justify-center mx-auto border-4 border-blue-500/30">
        <i class="fas fa-sign-out-alt text-blue-400 text-3xl"></i>
      </div>
    </div>
    
    <h2 class="text-2xl font-bold text-white mb-2">Logging Out</h2>
    <p class="text-gray-400 mb-6">Please wait while we securely end your session...</p>
    
    <div class="flex justify-center mb-6">
      <div class="w-full bg-gray-700 rounded-full h-2.5">
        <div id="progress-bar" class="bg-blue-500 h-2.5 rounded-full" style="width: 0%"></div>
      </div>
    </div>
    
    <div class="pulse text-blue-400">
      <i class="fas fa-lock text-xl mr-2"></i>
      <span>Securing your data...</span>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
  <script>
    // Initialize particles.js
    particlesJS("particles-js", {
      "particles": {
        "number": {
          "value": 60,
          "density": {
            "enable": true,
            "value_area": 800
          }
        },
        "color": {
          "value": "#3b82f6"
        },
        "shape": {
          "type": "circle",
          "stroke": {
            "width": 0,
            "color": "#000000"
          }
        },
        "opacity": {
          "value": 0.5,
          "random": false
        },
        "size": {
          "value": 3,
          "random": true
        },
        "line_linked": {
          "enable": true,
          "distance": 150,
          "color": "#3b82f6",
          "opacity": 0.2,
          "width": 1
        },
        "move": {
          "enable": true,
          "speed": 2,
          "direction": "none",
          "random": false,
          "out_mode": "out"
        }
      },
      "interactivity": {
        "detect_on": "canvas",
        "events": {
          "onhover": {
            "enable": true,
            "mode": "grab"
          },
          "onclick": {
            "enable": true,
            "mode": "push"
          },
          "resize": true
        }
      }
    });

    // Animated logout process
    document.addEventListener('DOMContentLoaded', function() {
      const progressBar = document.getElementById('progress-bar');
      let width = 0;
      
      // Animate progress bar
      const interval = setInterval(() => {
        width += 5;
        progressBar.style.width = width + '%';
        
        if (width >= 100) {
          clearInterval(interval);
          // Actually log out when animation completes
          performLogout();
        }
      }, 100);
    });
    
    function performLogout() {
      fetch('api/logout.php')
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            // Add success animation before redirect
            document.querySelector('.glass-effect').classList.add('animate__animated', 'animate__fadeOutDown');
            setTimeout(() => {
              window.location.href = 'login.html';
            }, 800);
          } else {
            // Show error and retry option
            document.querySelector('h2').textContent = 'Logout Failed';
            document.querySelector('p').textContent = data.message || 'Could not log out. Please try again.';
            document.getElementById('progress-bar').style.width = '0%';
            document.querySelector('.pulse').innerHTML = '<i class="fas fa-redo mr-2"></i><span>Click to retry</span>';
            document.querySelector('.pulse').classList.remove('pulse');
            document.querySelector('.pulse').classList.add('cursor-pointer', 'hover:text-blue-300');
            document.querySelector('.pulse').onclick = () => window.location.reload();
          }
        })
        .catch(error => {
          console.error('Logout error:', error);
          document.querySelector('h2').textContent = 'Connection Error';
          document.querySelector('p').textContent = 'Network problem. Please check your connection.';
          document.getElementById('progress-bar').style.width = '0%';
          document.querySelector('.pulse').innerHTML = '<i class="fas fa-redo mr-2"></i><span>Click to retry</span>';
          document.querySelector('.pulse').classList.remove('pulse');
          document.querySelector('.pulse').classList.add('cursor-pointer', 'hover:text-blue-300');
          document.querySelector('.pulse').onclick = () => window.location.reload();
        });
    }
  </script>
</body>
</html>