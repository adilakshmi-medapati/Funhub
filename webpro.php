<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuddle Toons - Playful Cartoons</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Baloo+2:wght@700&family=Comic+Neue:wght@400;700&display=swap');
        
        :root {
            --primary: #493D9E;       /* Deep purple */
            --secondary: #B2A5FF;     /* Light purple */
            --light-accent: #DAD2FF;  /* Very light purple */
            --yellow: #FFF2AF;        /* Pale yellow */
            --pink: #FFB6C1;         /* Light pink */
            --green: #98FF98;        /* Mint green */
        }

        body {
            background-color: #f9f8ff;
            font-family: 'Comic Neue', cursive;
            text-align: center;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
            color: #333;
            position: relative;
        }

        .header {
            font-family: 'Baloo 2', cursive;
            font-size: 4.5rem;
            color: var(--primary);
            text-shadow: 5px 5px 0px var(--yellow),
                         8px 8px 0px rgba(0,0,0,0.1);
            margin: 30px 0;
            position: relative;
            display: inline-block;
            transform-style: preserve-3d;
            animation: bounce 2s infinite alternate;
        }

        @keyframes bounce {
            0% { transform: translateY(0) rotate(-2deg); }
            100% { transform: translateY(-15px) rotate(2deg); }
        }

        .header:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 100%;
            height: 15px;
            background: var(--secondary);
            z-index: -1;
            border-radius: 50px;
            transform: rotate(-1deg);
        }

        .header:before {
            content: '✨';
            position: absolute;
            top: -20px;
            right: -30px;
            font-size: 2rem;
            animation: twinkle 3s infinite;
        }

        @keyframes twinkle {
            0%, 100% { opacity: 0.5; transform: scale(0.9); }
            50% { opacity: 1; transform: scale(1.2); }
        }

        .cloud {
            position: absolute;
            background: white;
            border-radius: 50%;
            opacity: 0.9;
            z-index: -1;
            animation: float 8s infinite ease-in-out;
            filter: drop-shadow(2px 4px 4px rgba(0,0,0,0.1));
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) translateX(0); }
            50% { transform: translateY(-20px) translateX(10px); }
        }

        .cartoon-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            padding: 20px;
            max-width: 1400px;
            margin: 0 auto;
            perspective: 1000px;
        }

        .cartoon-card {
            width: 300px;
            background: white;
            border-radius: 20px;
            padding: 15px;
            box-shadow: 8px 8px 0px rgba(0,0,0,0.1);
            transition: all 0.4s ease;
            cursor: pointer;
            position: relative;
            overflow: visible;
            margin-bottom: 150px;
            border: 3px solid var(--light-accent);
            transform-style: preserve-3d;
            transform: perspective(500px) rotateY(0deg);
        }

        .cartoon-card:hover {
            transform: translateY(-10px) perspective(500px) rotateY(5deg);
            box-shadow: 15px 15px 0px var(--light-accent);
        }

        .cartoon-card:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 10px;
            background: linear-gradient(90deg, var(--primary), var(--secondary), var(--yellow));
            border-radius: 20px 20px 0 0;
        }

        .cartoon-card:after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 10%;
            width: 80%;
            height: 30px;
            background: rgba(0,0,0,0.1);
            border-radius: 50%;
            filter: blur(10px);
            z-index: -1;
            transition: all 0.3s ease;
        }

        .cartoon-card:hover:after {
            bottom: -20px;
            width: 90%;
            opacity: 0.8;
        }

        .cartoon-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 15px;
            border: 3px dashed var(--primary);
            padding: 5px;
            background: white;
            transition: all 0.3s ease;
            position: relative;
            z-index: 2; 
        }

        .cartoon-card:hover .cartoon-img {
            transform: scale(1.03) rotate(-1deg);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .cartoon-title {
            font-family: 'Baloo 2', cursive;
            font-size: 1.7rem;
            color: var(--primary);
            margin: 15px 0 10px;
            position: relative;
            display: inline-block;
        }

        .cartoon-title:after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--yellow);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
        }

        .cartoon-card:hover .cartoon-title:after {
            transform: scaleX(1);
        }

        .cartoon-meta {
            font-size: 1rem;
            color: #666;
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding: 0 10px;
        }

        .cartoon-meta span {
            background: var(--light-accent);
            padding: 3px 10px;
            border-radius: 50px;
            font-weight: bold;
        }

        .play-btn {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80px;
            height: 80px;
            background: rgba(255,255,255,0.95);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
            z-index: 3;
        }

        .play-btn i {
            color: var(--primary);
            font-size: 2.5rem;
            margin-left: 5px;
            transition: all 0.2s ease;
        }

        .play-btn:hover {
            transform: translate(-50%, -50%) scale(1.1);
            background: var(--yellow);
        }

        .play-btn:hover i {
            color: var(--primary);
            transform: scale(1.1);
        }

        .cartoon-card:hover .play-btn {
            opacity: 1;
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(178, 165, 255, 0.7); }
            70% { box-shadow: 0 0 0 15px rgba(178, 165, 255, 0); }
            100% { box-shadow: 0 0 0 0 rgba(178, 165, 255, 0); }
        }

        .player-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(73, 61, 158, 0.95);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 100;
            backdrop-filter: blur(5px);
        }

        .video-player {
            width: 85%;
            max-width: 1000px;
            background: white;
            border-radius: 20px;
            padding: 25px;
            position: relative;
            box-shadow: 0 0 0 8px var(--primary), 0 0 0 16px var(--yellow), 0 0 0 24px var(--secondary);
            animation: popIn 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transform-origin: center;
        }

        @keyframes popIn {
            0% { transform: scale(0.8); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }

        .close-btn {
            position: absolute;
            top: -30px;
            right: -30px;
            width: 60px;
            height: 60px;
            background: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.8rem;
            cursor: pointer;
            border: 4px solid var(--yellow);
            box-shadow: 4px 4px 0px rgba(0,0,0,0.2);
            transition: all 0.2s ease;
            z-index: 101;
        }

        .close-btn:hover {
            transform: scale(1.1) rotate(90deg);
            background: var(--secondary);
        }

        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
            border-radius: 15px;
            border: 4px dashed var(--yellow);
            background: #000;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        .category-tabs {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin: 30px 0;
            flex-wrap: wrap;
        }

        .category-tab {
            padding: 12px 30px;
            background: white;
            border-radius: 50px;
            font-family: 'Baloo 2', cursive;
            font-size: 1.2rem;
            cursor: pointer;
            border: 3px dashed var(--primary);
            transition: all 0.3s ease;
            color: var(--primary);
            position: relative;
            overflow: hidden;
        }

        .category-tab:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            transition: all 0.5s ease;
        }

        .category-tab:hover:before {
            left: 100%;
        }

        .category-tab:hover {
            transform: translateY(-5px);
            background: var(--light-accent);
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
        }

        .category-tab.active {
            background: var(--primary);
            color: white;
            border-style: solid;
            box-shadow: 0 5px 0px var(--secondary), 0 10px 20px rgba(73, 61, 158, 0.3);
            transform: translateY(-3px);
        }

        /* Loading screen styles */
        .loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: var(--light-accent);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            transition: opacity 0.5s ease;
        }

        .loading-title-container {
            position: relative;
            width: 100%;
            max-width: 800px;
            margin: 0 auto 50px;
        }

        .loading-title {
            font-family: 'Baloo 2', cursive;
            font-size: 4.5rem;
            color: var(--primary);
            text-shadow: 5px 5px 0px var(--yellow);
            margin-bottom: 20px;
            position: relative;
            z-index: 2;
            animation: titleBounce 2s infinite alternate;
        }

        @keyframes titleBounce {
            0% { transform: translateY(0) scale(1); }
            100% { transform: translateY(-15px) scale(1.05); }
        }

        .character-container {
            position: relative;
            width: 100%;
            height: 200px;
            margin: 0 auto;
            max-width: 800px;
        }

        .walking-track {
            position: absolute;
            bottom: 50px;
            left: 0;
            width: 100%;
            height: 10px;
            background: var(--secondary);
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }

        .character {
            width: 120px;
            height: 160px;
            position: absolute;
            bottom: 50px;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: bottom;
            animation: walk 8s linear infinite;
            transform-origin: bottom center;
            filter: drop-shadow(5px 5px 5px rgba(0,0,0,0.3));
        }

        .character.shinchan {
            background-image: url('https://img.favpng.com/11/2/24/crayon-shin-chan-shinnosuke-nohara-drawing-donald-duck-animated-film-png-favpng-rnY7fn7nX9h5WVB0bPfxTqsRt_t.jpg');
            left: 0;
        }

        @keyframes walk {
            0% { transform: translateX(0) rotate(0deg); }
            25% { transform: translateX(200px) rotate(5deg); }
            50% { transform: translateX(400px) rotate(0deg); }
            75% { transform: translateX(600px) rotate(-5deg); }
            100% { transform: translateX(800px) rotate(0deg); }
        }

        .explore-btn {
            padding: 18px 50px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 50px;
            font-family: 'Baloo 2', cursive;
            font-size: 1.8rem;
            cursor: pointer;
            box-shadow: 0 10px 0px var(--secondary);
            transition: all 0.3s ease;
            margin-top: 50px;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .explore-btn:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            transition: all 0.5s ease;
            z-index: -1;
        }

        .explore-btn:hover:before {
            left: 100%;
        }

        .explore-btn:hover {
            transform: translateY(-8px);
            box-shadow: 0 18px 0px var(--secondary);
            background: var(--secondary);
            color: var(--primary);
        }

        /* Episode selector styles */
        .episode-selector {
            display: none;
            position: absolute;
            bottom: -180px;
            left: 0;
            width: 100%;
            background: white;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
            z-index: 10;
            border: 3px dashed var(--secondary);
            height: auto;
            min-height: 180px;
            transition: all 0.4s ease;
        }

        .cartoon-card:hover .episode-selector {
            display: block;
            animation: slideUp 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        @keyframes slideUp {
            from { transform: translateY(30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .episode-title {
            font-family: 'Baloo 2', cursive;
            font-size: 1.5rem;
            color: var(--primary);
            margin-bottom: 15px;
            text-align: center;
            background: var(--light-accent);
            padding: 12px;
            border-radius: 10px;
            border: 2px dashed var(--yellow);
            position: relative;
        }

        .episode-title:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-top: 10px solid var(--light-accent);
        }

        .episode-list {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 12px;
            padding: 5px;
            max-height: 300px;
            overflow-y: auto;
        }

        .episode-item {
            padding: 12px 8px;
            background: var(--light-accent);
            border-radius: 12px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.2s ease;
            border: 2px solid var(--secondary);
            text-align: center;
            line-height: 1.4;
            min-height: 70px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .episode-item:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            transition: all 0.5s ease;
        }

        .episode-item:hover:before {
            left: 100%;
        }

        .episode-item:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-5px);
            box-shadow: 0 8px 15px var(--light-accent);
            border-color: var(--primary);
        }

        .episode-number {
            font-weight: bold;
            color: var(--primary);
            display: block;
            margin-bottom: 5px;
            font-size: 1.1rem;
            font-family: 'Baloo 2', cursive;
        }

        .episode-item:hover .episode-number {
            color: var(--yellow);
        }

        /* Scrollbar styling */
        .episode-list::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        .episode-list::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .episode-list::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 10px;
        }

        .episode-list::-webkit-scrollbar-thumb:hover {
            background: var(--secondary);
        }

        /* Confetti styles */
        .confetti {
            position: absolute;
            width: 15px;
            height: 15px;
            background-color: var(--primary);
            opacity: 0.8;
            animation: confettiFall 5s linear forwards;
            z-index: 100;
        }

        @keyframes confettiFall {
            0% { transform: translateY(-100px) rotate(0deg); }
            100% { transform: translateY(100vh) rotate(360deg); }
        }

        /* Floating characters */
        .floating-character {
            position: fixed;
            width: 100px;
            height: 100px;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            z-index: -1;
            animation: floatAround 15s infinite linear;
            opacity: 0.7;
            filter: drop-shadow(2px 4px 4px rgba(0,0,0,0.2));
        }

        @keyframes floatAround {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(50px, 50px) rotate(90deg); }
            50% { transform: translate(100px, 0) rotate(180deg); }
            75% { transform: translate(50px, -50px) rotate(270deg); }
        }

        /* Special features ribbon */
        .special-features {
            position: fixed;
            top: 50px;
            right: -70px;
            background: var(--pink);
            color: white;
            padding: 10px 80px;
            font-family: 'Baloo 2', cursive;
            font-size: 1.2rem;
            transform: rotate(45deg);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            z-index: 50;
            animation: ribbonPulse 2s infinite;
        }

        @keyframes ribbonPulse {
            0%, 100% { background: var(--pink); }
            50% { background: var(--green); }
        }

        /* Notification bubble */
        .notification {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: var(--primary);
            color: white;
            padding: 15px 25px;
            border-radius: 50px;
            font-family: 'Baloo 2', cursive;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            transform: translateY(100px);
            opacity: 0;
            transition: all 0.5s ease;
            z-index: 50;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .notification.show {
            transform: translateY(0);
            opacity: 1;
        }

        .notification i {
            font-size: 1.5rem;
            animation: bellRing 0.5s alternate infinite;
        }

        @keyframes bellRing {
            0% { transform: rotate(-15deg); }
            100% { transform: rotate(15deg); }
        }

        /* Responsive styles */
        @media (max-width: 1200px) {
            .episode-list {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        @media (max-width: 1024px) {
            .cartoon-card {
                width: 280px;
            }
            
            .episode-list {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .header {
                font-size: 3.5rem;
            }
            
            .loading-title {
                font-size: 3.5rem;
            }
            
            .cartoon-card {
                width: 240px;
                margin-bottom: 160px;
            }
            
            .video-player {
                width: 95%;
                padding: 15px;
            }

            .episode-list {
                grid-template-columns: repeat(3, 1fr);
            }

            .episode-selector {
                bottom: -200px;
                padding: 15px;
            }

            .episode-item {
                min-height: 80px;
                padding: 10px 5px;
            }

            .character {
                width: 80px;
                height: 120px;
            }

            @keyframes walk {
                0% { transform: translateX(0) rotate(0deg); }
                25% { transform: translateX(100px) rotate(5deg); }
                50% { transform: translateX(200px) rotate(0deg); }
                75% { transform: translateX(300px) rotate(-5deg); }
                100% { transform: translateX(400px) rotate(0deg); }
            }
        }

        @media (max-width: 600px) {
            .episode-list {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .episode-selector {
                bottom: -220px;
            }
        }

        @media (max-width: 480px) {
            .header {
                font-size: 2.8rem;
            }
            
            .loading-title {
                font-size: 2.8rem;
            }
            
            .cartoon-card {
                width: 200px;
                margin-bottom: 180px;
            }
            
            .episode-list {
                grid-template-columns: repeat(2, 1fr);
            }

            .episode-selector {
                bottom: -240px;
            }

            .character {
                width: 60px;
                height: 100px;
            }

            .explore-btn {
                padding: 15px 40px;
                font-size: 1.5rem;
            }
        }

        @media (max-width: 400px) {
            .episode-list {
                grid-template-columns: 1fr;
            }
            
            .episode-selector {
                bottom: -380px;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="special-features">Special Edition!</div>
    
    <div class="loading-screen" id="loadingScreen">
        <div class="loading-title-container">
            <h1 class="loading-title">Welcome to Cuddle Toons!</h1>
            <div class="character-container">
                <div class="walking-track"></div>
                <div class="character shinchan"></div>
            </div>
        </div>
        <button class="explore-btn" id="exploreBtn">
            <i class="fas fa-play"></i> Explore Cartoons!
        </button>
    </div>
    
    <h1 class="header" id="mainHeader" style="display: none;">Cuddle Toons</h1>
    
    <div class="category-tabs" id="categoryTabs" style="display: none;">
        <div class="category-tab active" data-category="all">
            <i class="fas fa-star"></i> All
        </div>
        <div class="category-tab" data-category="comedy">
            <i class="fas fa-laugh-squint"></i> Comedy
        </div>
        <div class="category-tab" data-category="adventure">
            <i class="fas fa-map-marked-alt"></i> Adventure
        </div>
    </div>
    
    <div class="cartoon-container" id="cartoonContainer" style="display: none;">
        <!-- Cartoons will be loaded here -->
    </div>
    
    <div class="player-container" id="playerContainer">
        <div class="video-player">
            <div class="close-btn" id="closeBtn">
                <i class="fas fa-times"></i>
            </div>
            <div class="video-container">
                <iframe id="cartoonVideo" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <div class="notification" id="notification">
        <i class="fas fa-bell"></i>
        <span>New episodes added weekly!</span>
    </div>

    <script>
        // Create floating clouds
        function createClouds() {
            const colors = ['#DAD2FF', '#FFF2AF', '#B2A5FF', '#ffffff'];
            for (let i = 0; i < 15; i++) {
                const cloud = document.createElement('div');
                cloud.className = 'cloud';
                cloud.style.width = `${Math.random() * 120 + 50}px`;
                cloud.style.height = `${Math.random() * 80 + 30}px`;
                cloud.style.top = `${Math.random() * 80}%`;
                cloud.style.left = `${Math.random() * 100}%`;
                cloud.style.animationDelay = `${Math.random() * 5}s`;
                cloud.style.animationDuration = `${Math.random() * 10 + 5}s`;
                cloud.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                document.body.appendChild(cloud);
            }
        }

        // Create floating characters
        function createFloatingCharacters() {
            const characters = [
            'https://clipart-library.com/data_images/358936.png', // Doraemon
            'https://clipart-library.com/images_k/shinchan-transparent/shinchan-transparent-4.png' // Shinchan
            ];
            
            const positions = [];
            for (let i = 0; i < 10; i++) {
            let top, left, isOverlapping;
            do {
                top = Math.random() * 80 + 10;
                left = (i % 3 === 0) ? Math.random() * 30 : (i % 3 === 1) ? Math.random() * 30 + 35 : Math.random() * 30 + 70;
                isOverlapping = positions.some(pos => 
                Math.abs(pos.top - top) < 15 && Math.abs(pos.left - left) < 15
                );
            } while (isOverlapping);
            
            positions.push({ top, left });
            
            const char = document.createElement('div');
            char.className = 'floating-character';
            char.style.backgroundImage = `url('${characters[Math.floor(Math.random() * characters.length)]}')`;
            char.style.top = `${top}%`;
            char.style.left = `${left}%`;
            char.style.animationDelay = `${Math.random() * 5}s`;
            char.style.animationDuration = `${Math.random() * 20 + 10}s`;
            document.body.appendChild(char);
            }
        }

        // Create confetti
        function createConfetti() {
            const colors = ['#493D9E', '#B2A5FF', '#DAD2FF', '#FFF2AF', '#FFB6C1', '#98FF98'];
            for (let i = 0; i < 100; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.left = `${Math.random() * 100}%`;
                confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.animationDuration = `${Math.random() * 3 + 2}s`;
                confetti.style.animationDelay = `${Math.random() * 2}s`;
                confetti.style.width = `${Math.random() * 15 + 5}px`;
                confetti.style.height = `${Math.random() * 15 + 5}px`;
                confetti.style.borderRadius = `${Math.random() * 50}%`;
                document.body.appendChild(confetti);
                
                // Remove confetti after animation
                setTimeout(() => {
                    confetti.remove();
                }, 5000);
            }
        }

        // Cartoon data with episodes
        const cartoons = [
            {
                id: 1,
                title: "Doraemon",
                image: "https://pixahive.com/wp-content/uploads/2021/04/Doraemon-Cartoon-Illustration-410092-pixahive.jpg",
                year: "1979",
                duration: "24 min",
                category: "comedy",
                featured: true,
                episodes: [
                    { title: "Nobita's Birthday", video: "https://www.youtube.com/embed/JuPWQm1Abtk?si=AjuGdz_eFz9LJEjY" },
                    { title: "Time Machine Adventure", video:"https://www.youtube.com/embed/5xX6qFsyeCs?si=M-6YjhY_KIB9qjHb"  },
                    { title: "Giant Cookie Trouble", video: "https://www.youtube.com/embed/RjcseBsq5jA?si=Sf3WOkTTlu--7x4g" },
                    { title: "Pills magic", video: "https://www.youtube.com/embed/WHxUbPpDiDo?si=kIQBP9yUs9t8Uwc0" },
                    { title: "Little girl", video: "https://www.youtube.com/embed/WuU_kCgTKJw?si=0B9uVoYqm4hRQjSp" },
                    { title: "Vaccum clean", video: "https://www.youtube.com/embed/wjIPlJOBemA?si=Gkw3jjATm97F_gSe" },
                    { title: "Magic Lamp", video: "https://www.youtube.com/embed/tgYZ2EzvoH8?si=IM7lVfpbeq4-nHUs" },
                    { title: "Nobitha Ninja training", video: "https://www.youtube.com/embed/N1Q9UVeiUYk?si=Qqm4BYWkobrsw4AC" },
                    { title: "Tressure Box", video: "https://www.youtube.com/embed/WNNANJvtLpQ?si=wAUQb43xdwaJYPvW" },
                    { title: "Picnic", video: "https://www.youtube.com/embed/L9-Wz1utMqE?si=ptmdbfBRmnu2R-q0" }
                ]
            },
            {
                id: 2,
                title: "Shinchan",
                image: "https://wallpapercave.com/wp/wp7590525.jpg",
                year: "1992",
                duration: "20 min",
                category: "comedy",
                featured: true,
                episodes: [
                    { title: "Action Kamen", video: "https://www.youtube.com/embed/W1sDpYXhWyg?si=nRpiv3Kon9dRgT9V" },
                    { title: "Zoo Adventure", video: "https://www.youtube.com/embed/axA0nX969XA?si=xKzkYfGNShucEGvd" },
                    { title: "Pool day", video: "https://www.youtube.com/embed/orBPgl6uirI?si=lnS43RU3oZ18JNWD" },
                    { title: "Sinchan Foodie", video: "https://www.youtube.com/embed/zV6UB8Z1mr4?si=HPoNRJmIrVYFms93" },
                    { title: "Rainy Day", video: "https://www.youtube.com/embed/gEvrGLGYtvM?si=pDNVfgk9tpe428oS" },
                    { title: "AC Home", video: "https://www.youtube.com/embed/_1ZQT2iwYVw?si=SqNGXWG9kM3-qx7B" },
                    { title: "Eat by Chopstick", video: "https://www.youtube.com/embed/RlIsQSAukFk?si=mHj66rSnVvHaQ4Wm" },
                    { title: "Sinchan mom return", video: "https://www.youtube.com/embed/pVFQdJ0a-PQ?si=deR0Ia0VW14tAySW" },
                    { title: "Picnic Day", video: "https://www.youtube.com/embed/nsKX_FcMGuM?si=8X2M9ovhSj9_dd2U" },
                    { title: "Clean Sinchan", video: "https://www.youtube.com/embed/7YfhMXBAGaQ?si=oGyJkYabvkCaIIMn" }
                ]
            },
            {
                id: 3,
                title: "Mr. Bean",
                image: "https://wallpapercave.com/wp/wp6126418.jpg",
                year: "1990",
                duration: "25 min",
                category: "comedy",
                episodes: [
                    { title: "Baking", video: "https://www.youtube.com/embed/4Unv7rw5HNk?si=5Oxi5LfNwZigi3dl" },
                    { title: "Eating Contest", video: "https://www.youtube.com/embed/RyqPS2HlZFw?si=eOuNQpQMA818KHn9" },
                    { title: "Animated", video: "https://www.youtube.com/embed/R08vmJkUAU8?si=_dmiA2RsyHVi3fct" },
                    { title: "At the Cinema", video: "https://www.youtube.com/embed/W1TM9rhYu-E?si=5LUV-N5K9DPPXUY9" },
                    { title: "Coffee Bean", video: "https://www.youtube.com/embed/pPbf-eVGS6E?si=4fs1h7ZGvhG4_xVw" },
                    { title: "Gold Fish", video: "https://www.youtube.com/embed/7oB2UccZoaE?si=ERyDQCLXAZG32LCh" },
                    { title: "Be my guest", video: "https://www.youtube.com/embed/jp3hU0AV2sg?si=s8gBnK_jlzElxi_V" },
                    { title: "Car Wash", video: "https://www.youtube.com/embed/fukTa9pQLY4?si=UMTJP5R_YfCmYDxT" },
                    { title: "Young Bean", video: "https://www.youtube.com/embed/0-F_kBHSU6w?si=2sDiKwsqpq9c5vM6" },
                    { title: "Green Bean", video: "https://www.youtube.com/embed/9r7HgcgDwqY?si=vIsFb4UZk8irSBUj" }
                ]
            },
            {
                id: 4,
                title: "Ben 10",
                image: "https://coolwallpapers.me/picsup/5444520-ben-10-wallpapers.jpg",
                year: "2005",
                duration: "22 min",
                category: "adventure",
                episodes: [
                    { title: "And Then There Were 10", video: "https://www.youtube.com/embed/6T-ygNCkEW4?si=e5RvY29otrjst1mM" },
                    { title: "Washington B.C.", video: "https://www.youtube.com/embed/c_nzwrc7_PY?si=YFQpsgVvcqrEBrgH" },
                    { title: "The Krakken", video: "https://www.youtube.com/embed/P1dQqhjaDN8?si=rSUpORUueAzyLexv" },
                    { title: "Permanent Retirement", video: "https://www.youtube.com/embed/_jJJD3W5ssE?si=2oTJ0jcN89cKjFqx" },
                    { title: "Hunted", video: "https://www.youtube.com/embed/l0TvdGOk93w?si=pRiFLps40YmfHCzY" },
                    { title: "Tourist Trap", video: "https://www.youtube.com/embed/J4GhkiOk3OM?si=zLf7rGFGvAAQqKwc" },
                    { title: "Kevin 11", video: "https://www.youtube.com/embed/G41y4cjCwCA?si=jX8DHfGcRxQ29Ghk" },
                    { title: "The Alliance", video: "https://www.youtube.com/embed/59aB0WuehB0?si=dkuGzdHd7TTwECfZ" },
                    { title: "Last Laugh", video: "https://www.youtube.com/embed/-c51y14sbdM?si=0jAtx4y4EDjc6MRM" },
                    { title: "Lucky Girl", video: "https://www.youtube.com/embed/s2xtzoQiaMY?si=ao6uJnRywLUKh8lJ" }
                ]
            },
            {
                id: 5,
                title: "Courage the Cowardly Dog",
                image: "https://tse1.mm.bing.net/th?id=OIP.qKiJRXRQWw_2EcSYCYeIYAHaFj&rs=1&pid=ImgDetMain",
                year: "1999",
                duration: "22 min",
                category: "adventure",
                episodes: [
                    { title: "The Curse of Shirley", video: "https://www.youtube.com/embed/cY87Qp7FA0U?si=ZYcUh0RzS53x6bSk" },
                    { title: "The Clutching Foot", video: "https://www.youtube.com/embed/HpAvF6eMHWs?si=nhdJNWPOgd6ZCrH7" },
                    { title: "King Ramses' Curse", video: "https://www.youtube.com/embed/kKnC674-ZDU?si=CibsGS2pmo2ehBYW" },
                    { title: "The Demon in the Mattress", video: "https://www.youtube.com/embed/2jf9aNR8ifg?si=kbovRKtsBpADgNUs" },
                    { title: "Freaky Fred", video: "https://www.youtube.com/embed/_J4NdAuRnIc?si=DDtwyCIITP1SiuIr" },
                    { title: "Say ARGH ", video: "https://www.youtube.com/embed/lLoDUh33-70?si=69zkaa4YNfzmLw1l" },
                    { title: "The Quilt Club", video: "https://www.youtube.com/embed/VBrCL67MMbw?si=Gk8jAiOOQ6OKJpOz" },
                    { title: "The Hunchback of Nowhere", video: "https://www.youtube.com/embed/X8UX0Lmrftw?si=rRFgFpC9XRX1-Sno" },
                    { title: "The Mask", video: "https://www.youtube.com/embed/NJnFerr_xos?si=pTqg_JnP42tIwU9P" },
                    { title: "The Sandman Sleeps", video: "https://www.youtube.com/embed/PbPvAw6cz3o?si=BV9d48jjv2n9nthG" }
                ]
            },
            {
                id: 6,
                title: "Phineas and Ferb",
                image: "https://flxt.tmsimg.com/assets/p186178_b_h9_az.jpg",
                year: "2007",
                duration: "22 min",
                category: "comedy",
                episodes: [
                    { title: "Rollercoaster", video: "https://www.youtube.com/embed/fLWBx37eKBM?si=-_KV8fB8IpyuDbHW" },
                    { title: "Lawn Gnome Beach Party", video: "https://www.youtube.com/embed/NNOkMRw78t8?si=SZMeRnj-C8hE_Grt" },
                    { title: "The Fast and the Phineas", video: "https://www.youtube.com/embed/vid9Z3sE26Y?si=GvkfhnR3J1oAk4U0" },
                    { title: "Lights, Candace, Action!", video: "https://www.youtube.com/embed/lXW1g38ylOw?si=0ECWfRZDb8bKIFSC" },
                    { title: "Raging Bully", video: "https://www.youtube.com/embed/4y1nItfA5gU?si=iy1Diszc5P9Yk3LX" },
                    { title: "It's About Time!", video: "https://www.youtube.com/embed/iiTMAYiT4E8?si=qkZgiZNYGb5-ORsr" },
                    { title: "Dude, We're Getting the Band Back", video: "https://www.youtube.com/embed/kZ-IOh9-f90?si=ntapy3LiWQkrI2qV" },
                    { title: "Ready for the Bettys", video: "https://www.youtube.com/embed/3tMaQ18Scy0?si=nrpnzQBZFiH_pfbD" },
                    { title: "Tree to Get Ready", video: "https://www.youtube.com/embed/gyooXUIpFNg?si=3gnov0Tzp0r-W_6Q" },
                    { title: "It's a Mud, Mud, Mud World", video: "https://www.youtube.com/embed/24Sh4VDieRE?si=5TGy8JSRRzokcCCX" }
                ]
            }
        ];

        // Display cartoons
        function displayCartoons(category = 'all') {
            const container = document.getElementById('cartoonContainer');
            container.innerHTML = '';
            
            const filteredCartoons = category === 'all' 
                ? cartoons 
                : cartoons.filter(cartoon => cartoon.category === category);
            
            filteredCartoons.forEach(cartoon => {
                const card = document.createElement('div');
                card.className = 'cartoon-card';
                card.dataset.id = cartoon.id;
                
                // Add featured badge if cartoon is featured
                const featuredBadge = cartoon.featured 
                    ? `<div class="featured-badge"><i class="fas fa-crown"></i> Featured</div>` 
                    : '';
                
                card.innerHTML = `
                    ${featuredBadge}
                    <img src="${cartoon.image}" alt="${cartoon.title}" class="cartoon-img">
                    <h3 class="cartoon-title">${cartoon.title}</h3>
                    <div class="cartoon-meta">
                        <span>${cartoon.year}</span>
                        <span>${cartoon.duration}</span>
                    </div>
                    <button class="play-btn"><i class="fas fa-play"></i></button>
                    <div class="episode-selector">
                        <h4 class="episode-title">Choose Your Episode!</h4>
                        <div class="episode-list">
                            ${cartoon.episodes.slice(0, 10).map((episode, index) => `
                                <div class="episode-item" data-video="${episode.video}">
                                    <span class="episode-number">Ep ${index + 1}</span>
                                    ${episode.title}
                                </div>
                            `).join('')}
                        </div>
                    </div>
                `;
                container.appendChild(card);
            });
            
            // Add click events to play buttons
            document.querySelectorAll('.play-btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const card = this.closest('.cartoon-card');
                    const id = parseInt(card.dataset.id);
                    const cartoon = cartoons.find(c => c.id === id);
                    if (cartoon) {
                        playVideo(cartoon.episodes[0].video);
                    }
                });
            });
            
            // Add click events to episode items
            document.querySelectorAll('.episode-item').forEach(item => {
                item.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const videoUrl = this.dataset.video;
                    playVideo(videoUrl);
                });
            });
        }

        // Function to play video with error handling
        function playVideo(videoUrl) {
            const playerContainer = document.getElementById('playerContainer');
            const videoFrame = document.getElementById('cartoonVideo');
            
            try {
                videoFrame.src = videoUrl;
                playerContainer.style.display = 'flex';
                
                // Add error listener
                videoFrame.onerror = function() {
                    videoFrame.src = '';
                    alert("Sorry, this episode isn't available. Please try another one!");
                    playerContainer.style.display = 'none';
                };
            } catch (error) {
                alert("Error loading the video. Please try another episode.");
                playerContainer.style.display = 'none';
            }
        }

        // Initialize the page
        document.addEventListener('DOMContentLoaded', function() {
            createClouds();
            createFloatingCharacters();
            
            // Show notification after 3 seconds
            setTimeout(() => {
                document.getElementById('notification').classList.add('show');
            }, 3000);
            
            // Hide notification after 8 seconds
            setTimeout(() => {
                document.getElementById('notification').classList.remove('show');
            }, 8000);
            
            // Explore button click handler
            document.getElementById('exploreBtn').addEventListener('click', function() {
                createConfetti();
                document.getElementById('loadingScreen').style.opacity = '0';
                setTimeout(() => {
                    document.getElementById('loadingScreen').style.display = 'none';
                    document.getElementById('mainHeader').style.display = 'block';
                    document.getElementById('categoryTabs').style.display = 'flex';
                    document.getElementById('cartoonContainer').style.display = 'flex';
                    displayCartoons();
                }, 500);
            });
            
            // Category tabs
            document.querySelectorAll('.category-tab').forEach(tab => {
                tab.addEventListener('click', function() {
                    document.querySelectorAll('.category-tab').forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                    const category = this.dataset.category;
                    displayCartoons(category);
                });
            });
            
            // Close video player
            document.getElementById('closeBtn').addEventListener('click', function() {
                document.getElementById('playerContainer').style.display = 'none';
                document.getElementById('cartoonVideo').src = '';
            });
            
            // Close player when clicking outside
            document.getElementById('playerContainer').addEventListener('click', function(e) {
                if (e.target === this) {
                    document.getElementById('playerContainer').style.display = 'none';
                    document.getElementById('cartoonVideo').src = '';
                }
            });
        });
    </script>
</body>
</html>