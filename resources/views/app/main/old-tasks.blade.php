

<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Spin Wheel App</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet" />
    <!-- Stylesheet -->
    <!-- <link rel="stylesheet" href="style.css" />
      -->

    <style>
        body {
            background: rgb(20, 25, 36);
        }
        
        audio {
          display: none;
        }

        .wheel {
            position: absolute;
            width: 350px;
            height: 350px;
            top: calc(50% - 350px/2);
            left: calc(50% - 350px/2);
            border-radius: 50%;
            border: 8px solid rgb(255, 255, 255);
            margin: -8px;
            /* 8px push border */
            box-shadow: 0 0 6px 6px rgb(0, 0, 0);
            overflow: hidden;
        }

        .wheel:before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            box-shadow: 0 0 5px 10px rgba(0, 0, 0, 0.4) inset;
            z-index: 1;
        }

        .wheel .inner {
            width: 100%;
            height: 100%;
            transition: 5s;
        }

        .wheel .inner .slice {
            position: absolute;
            width: 0;
            height: 0;
            left: 125px;
            top: -5px;
            border-width: 180px 50px 0 50px;
            border-style: solid;
            transform-origin: 50% 100%;
        }

        .wheel .inner .slice .prize {
            position: relative;
            display: block;
            transform: rotateZ(90deg);
            left: 8px;
            text-align: center;
            font-size: 28px;
            margin-top: -160px;
            margin-left: -15px;
            color: rgb(255, 255, 255);
            text-shadow: -1px -1px 0 rgb(88, 86, 81), 1px -1px 0 rgb(88, 86, 81),
                -1px 1px 0 rgb(88, 86, 81), 1px 1px 0 rgb(88, 86, 81);
        }

        /* Slice colors and rotation */
        .wheel .inner .slice:nth-child(1) {
            border-color: #16a085 transparent;
            transform: rotate(-30deg);
        }

        .wheel .inner .slice:nth-child(2) {
            border-color: #962bc0 transparent;
            transform: rotate(-60deg);
        }

        .wheel .inner .slice:nth-child(3) {
            border-color: #34495e transparent;
            transform: rotate(-90deg);
        }

        .wheel .inner .slice:nth-child(4) {
            border-color: #d35400 transparent;
            transform: rotate(-120deg);
        }

        .wheel .inner .slice:nth-child(5) {
            border-color: #f39c12 transparent;
            transform: rotate(-150deg);
        }

        .wheel .inner .slice:nth-child(6) {
            border-color: #c02b58 transparent;
            transform: rotate(-180deg);
        }

        .wheel .inner .slice:nth-child(7) {
            border-color: #2980b9 transparent;
            transform: rotate(-210deg);
        }

        .wheel .inner .slice:nth-child(8) {
            border-color: #50c556 transparent;
            transform: rotate(-240deg);
        }

        .wheel .inner .slice:nth-child(9) {
            border-color: #d31313 transparent;
            transform: rotate(-270deg);
        }

        .wheel .inner .slice:nth-child(10) {
            border-color: #800055 transparent;
            transform: rotate(-300deg);
        }

        .wheel .inner .slice:nth-child(11) {
            border-color: #c2b503 transparent;
            transform: rotate(-330deg);
        }

        .wheel .inner .slice:nth-child(12) {
            border-color: #008000 transparent;
            transform: rotate(0deg);
        }

        .wheel-outer {
            position: absolute;
            width: 500px;
            height: 500px;
            top: calc(50% - 500px/2);
            left: calc(50% - 500px/2);
            border-radius: 50%;
            box-shadow: 0 0 5px 5px rgb(0, 0, 0),
                0 0 115px 101px rgba(58, 68, 89, 0.2) inset;
        }

        #svg-arrow {
            position: absolute;
            top: calc(50% - 235px);
            left: calc(50% - 101px);
            z-index: 1;
        }

        #svg-dotted {
            position: absolute;
            width: 540px;
            height: 540px;
            top: calc(50% - 540px/2);
            left: calc(50% - 540px/2);
        }

        #svg-dotted #circle-dotted {
            fill: transparent;
            stroke: rgb(200, 200, 200);
            stroke-width: 4;
            stroke-dasharray: 0.1 23;
            stroke-dashoffset: 19.5;
            stroke-linecap: round;
        }

        button {
            position: absolute;
            width: 50px;
            height: 50px;
            top: calc(50% - 50px/2);
            left: calc(50% - 50px/2);
            border-radius: 50%;
            border: none;
            outline: none;
            box-shadow: 0 0 5px 2px rgb(0, 0, 0);
            z-index: 10;
            background: linear-gradient(to bottom,
                    rgb(252, 255, 244) 0%,
                    rgb(223, 229, 215) 30%,
                    rgb(179, 190, 173) 100%);
        }

        button:active {
            transform: scale(0.9);
        }
    </style>
</head>

<body>
    <div style="display: flex;align-items: center;margin-bottom: 15px;background: white;padding: 0 10px;gap: 15px;">
        <a href="/" style="font-size: 40px;text-decoration: none;font-weight: bold;color: black;">
            &lt;
        </a>
        
        <div style="text-align: center;display: block;/* align-items: center; */width: 100%;font-size: 20px;">
            Tasks
        </div>
    </div>
    
    
    @include('alert-message')
    <div id="app">
        <div class="wheel">
            <div class="inner">
                <!-- Prize slices will be generated dynamically with JavaScript -->
            </div>
        </div>
        <!-- <div class="wheel-outer"></div> -->
        <!-- <svg id="svg-dotted" viewBox="0 0 100 100">
            <circle id="circle-dotted" cx="50" cy="50" r="40" />
        </svg> -->
        <svg id="svg-arrow" xmlns="http://www.w3.org/2000/svg">
            <path style="fill:#ff2e52; stroke:#012e52; stroke-width:4; stroke-linejoin:round"
                d="M 81.540414,49.378716 H 121.51935 L 101.4866,69.420346 Z" />
        </svg>
        @if($remain > 0)
            <button id="spinButton">SPIN</button>
        @else
         <button id="">Done</button>
        @endif
    </div>
    
     <audio
      controls="controls"
      id="applause"
      src="{{ asset('public/lottery') }}/applause.mp3"
      type="audio/mp3"
    ></audio>
    <audio
      controls="controls"
      id="wheel"
      src="{{ asset('public/lottery') }}/wheel.mp3"
      type="audio/mp3"
    ></audio>

    <script>
    
        const app = {
            prizes: [2, 3, 6, 1, 18, 7, 9, 10, 16, 13, 15, 20],
            activeBtn: false,
            deg: 0,
            win_price : 0,

            spin() {
                this.activeBtn = true;
                document.querySelector("#spinButton").disabled = true;
                setTimeout(() => {
                    this.activeBtn = false;
                    document.querySelector("#spinButton").disabled = false;
                }, 5100);

                let spins = Math.floor(Math.random() * 7) + 9; //perform between 9 and 15 spins
                let wheelAngle = Math.floor(Math.random() * 12) * 30; //set wheel angle rotation
                let sectorAngle = Math.floor(Math.random() * 14) + 1; //set sector angle rotation
                sectorAngle *= Math.floor(Math.random() * 2) === 1 ? 1 : -1; //between -14deg and +14deg (28deg range of 30deg sector)

                this.deg += 360 * spins + wheelAngle + sectorAngle;
                document.querySelector(".inner").style.transform = `rotate(${this.deg}deg)`;

                setTimeout(() => {
                    this.deg -= sectorAngle;
                }, 100); //reset sector angle rotation to avoid angle > +-44deg on next rotation

                let index = Math.floor((this.deg - sectorAngle) / 30) % 12; //get the prize
                console.log("You will win: " + this.prizes[index-1]);
                this.win_price = this.prizes[index-1];
            },

            renderPrizes() {
                const inner = document.querySelector(".inner");
                this.prizes.forEach(prize => {
                    const slice = document.createElement("div");
                    slice.className = "slice";
                    const span = document.createElement("span");
                    span.className = "prize";
                    span.textContent = prize;
                    slice.appendChild(span);
                    inner.appendChild(slice);
                });
            }
        };

        // Render prizes
        app.renderPrizes();

        // Attach the spin function to the button
        document.querySelector("#spinButton").addEventListener("click", function () {

            if (!app.activeBtn) {
                app.spin();
                wheel.play();
                
                let amount = Number(app.win_price);
                let url = "/tasks?amount"+"="+amount;
                 
                setTimeout(function () {
                    applause.play();
                    console.log(url)
                    window.location.href = url;
                }, 5500);
            }
        });
    
    </script>




</body>

</html>


