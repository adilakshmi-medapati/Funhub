<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard - Fun Entertainia</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@700&family=Comic+Neue:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #493D9E;       /* Deep purple */
            --secondary: #B2A5FF;     /* Light purple */
            --light-accent: #DAD2FF;  /* Very light purple */
            --yellow: #FFF2AF;        /* Pale yellow */
            --pink: #FFB6C1;         /* Light pink */
            --green: #98FF98;        /* Mint green */
            --user-blue: #70C1FF;    /* User accent color */
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Comic Neue', cursive;
            background: linear-gradient(135deg, var(--primary), #3a2d8a);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        /* User Heart Decoration */
        .heart-decoration {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 3rem;
            color: var(--pink);
            text-shadow: 3px 3px 0 var(--primary);
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }

        /* Dashboard Container */
        .dashboard {
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2),
                        0 0 0 8px var(--user-blue), 
                        0 0 0 16px var(--yellow);
            text-align: center;
            max-width: 800px;
            width: 90%;
            position: relative;
            overflow: hidden;
            transform-style: preserve-3d;
            animation: popIn 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 3px dashed var(--user-blue);
            z-index: 10;
        }

        @keyframes popIn {
            0% { transform: scale(0.8) rotateY(20deg); opacity: 0; }
            100% { transform: scale(1) rotateY(0); opacity: 1; }
        }

        .dashboard:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 10px;
            background: linear-gradient(90deg, var(--user-blue), var(--secondary), var(--yellow));
            border-radius: 20px 20px 0 0;
        }

        /* Header Styles */
        .dashboard h1 {
            font-family: 'Baloo 2', cursive;
            color: var(--primary);
            font-size: 2.8rem;
            margin-bottom: 15px;
            text-shadow: 3px 3px 0 var(--yellow);
            position: relative;
            display: inline-block;
        }

        .dashboard h1:after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--user-blue);
            border-radius: 2px;
        }

        .dashboard p {
            color: #555;
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        /* Button Styles */
        .btn-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            margin: 30px 0;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 15px 30px;
            font-size: 1.1rem;
            font-family: 'Baloo 2', cursive;
            text-decoration: none;
            border-radius: 50px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border: none;
            cursor: pointer;
            box-shadow: 0 6px 0 rgba(0,0,0,0.1);
            min-width: 200px;
        }

        .btn i {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
            box-shadow: 0 6px 0 var(--secondary);
        }

        .btn-primary:hover {
            background-color: var(--secondary);
            color: var(--primary);
            transform: translateY(-5px);
            box-shadow: 0 11px 0 var(--secondary);
        }

        .btn-secondary {
            background-color: var(--user-blue);
            color: var(--primary);
            box-shadow: 0 6px 0 #5aa8e0;
        }

        .btn-secondary:hover {
            background-color: #8fd1ff;
            transform: translateY(-5px);
            box-shadow: 0 11px 0 #5aa8e0;
        }

        /* User Features Ribbon */
        .user-features {
            position: absolute;
            top: 20px;
            left: -50px;
            background: var(--user-blue);
            color: white;
            padding: 8px 60px;
            font-family: 'Baloo 2', cursive;
            font-size: 1.1rem;
            transform: rotate(-45deg);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            z-index: 1;
        }

        /* Floating elements */
        .floating-element {
            position: absolute;
            border-radius: 50%;
            opacity: 0.7;
            z-index: -1;
            animation: float 8s infinite ease-in-out;
            filter: drop-shadow(2px 4px 4px rgba(0,0,0,0.1));
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) translateX(0); }
            50% { transform: translateY(-20px) translateX(10px); }
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .dashboard {
                padding: 30px 20px;
            }
            
            .dashboard h1 {
                font-size: 2.2rem;
            }
            
            .btn {
                padding: 12px 20px;
                font-size: 1rem;
                min-width: 160px;
            }
        }

        @media (max-width: 480px) {
            .btn-group {
                flex-direction: column;
                align-items: center;
            }
            
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="heart-decoration">
        <i class="fas fa-heart"></i>
    </div>
    
    <div class="user-features">Premium User</div>
    
    <!-- Floating decorative elements -->
    <div class="floating-element" style="width: 100px; height: 100px; background: var(--yellow); top: 10%; left: 10%; animation-delay: 0s;"></div>
    <div class="floating-element" style="width: 80px; height: 80px; background: var(--green); top: 70%; left: 80%; animation-delay: 1s;"></div>
    <div class="floating-element" style="width: 120px; height: 120px; background: var(--light-accent); top: 30%; left: 85%; animation-delay: 2s;"></div>
    
    <div class="dashboard">
        <h1>User Dashboard</h1>
        <p>Welcome back! Enjoy your entertainment experience.</p>
        
        <div class="btn-group">
            <a href="webpro.php" class="btn btn-primary">
                <i class="fas fa-film"></i> Cartoon Page
            </a>
            <a href="Music.php" class="btn btn-primary">
                <i class="fas fa-music"></i> Music Page
            </a>
            
    </div>
</body>
</html>