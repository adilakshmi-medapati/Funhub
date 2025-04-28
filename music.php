<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Melody Toons - Playful Music Player</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Baloo+2:wght@700&family=Comic+Neue:wght@400;700&family=Poppins:wght@300;400;600;700&display=swap');
        :root {
    --primary: #6C4AB6;       /* Purple */
    --secondary: #8D72E1;     /* Light purple */
    --accent: #B9E0FF;        /* Very light blue */
    --yellow: #FFD95A;        /* Yellow */
    --pink: #FF9BD2;         /* Pink */
    --green: #7DCE13;        /* Green */
    --dark: #2D2727;         /* Dark */
    --light: #F5F5F5;        /* Light */
    --gradient: linear-gradient(135deg, var(--primary), var(--secondary));
}

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    background-color: var(--light);
    font-family: 'Poppins', sans-serif;
    color: var(--dark);
    overflow-x: hidden;
    position: relative;
    min-height: 100vh;
}

/* Header Styles */
.header {
    font-family: 'Baloo 2', cursive;
    font-size: 4.5rem;
    color: var(--primary);
    text-shadow: 3px 3px 0 var(--yellow),
                 6px 6px 0 rgba(0,0,0,0.1);
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
    opacity: 0.7;
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

/* Main Container */
.main-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 20px;
    position: relative;
}

/* Search Bar and Favorites Button */
.nav-container {
    max-width: 800px;
    margin: 0 auto 40px;
    position: relative;
    display: flex;
    gap: 15px;
    align-items: center;
}

.search-container {
    flex: 1;
    position: relative;
}

.search-bar {
    width: 100%;
    padding: 18px 25px;
    font-size: 1.1rem;
    border: none;
    border-radius: 50px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    font-family: 'Poppins', sans-serif;
    padding-left: 60px;
    transition: all 0.3s ease;
    border: 3px solid transparent;
}

.search-bar:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 5px 20px rgba(108, 74, 182, 0.3);
}

.search-icon {
    position: absolute;
    left: 25px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--primary);
    font-size: 1.3rem;
}

.favorites-btn {
    padding: 18px 30px;
    background: var(--primary);
    color: white;
    border: none;
    border-radius: 50px;
    font-family: 'Baloo 2', cursive;
    font-size: 1.1rem;
    cursor: pointer;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
}

.favorites-btn:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(108, 74, 182, 0.3);
    background: var(--secondary);
}

.back-btn {
    padding: 18px 30px;
    background: var(--primary);
    color: white;
    border: none;
    border-radius: 50px;
    font-family: 'Baloo 2', cursive;
    font-size: 1.1rem;
    cursor: pointer;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 30px;
}

.back-btn:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(108, 74, 182, 0.3);
    background: var(--secondary);
}

/* Movies Grid - UPDATED FOR LARGER CARDS AND 3 PER ROW */
.movies-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px; /* Moderate gap between cards */
    margin: 40px auto;
    max-width: 1200px; /* Control the overall width */
    padding: 0 20px;
}

.movie-card {
    background: white;
    border-radius: 12px;
    overflow: visible;
    box-shadow: 0 8px 16px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    position: relative;
    cursor: pointer;
    margin-bottom: 150px; /* Space for dropdown */
    border: 2px solid var(--accent);
    aspect-ratio: 1/1.2; /* More squared proportion like in the image */
}

.movie-card:hover {
    transform: translateY(-15px); /* Increased lift effect */
    box-shadow: 0 20px 40px rgba(108, 74, 182, 0.25);
}

.movie-poster {
    width: 100%;
    height: 220px; /* Slightly smaller height */
    object-fit: cover;
    border-radius: 10px;
    border: 2px dashed var(--primary);
    padding: 4px;
}

.movie-card:hover .movie-poster {
    transform: scale(1.03) rotate(-1deg);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

.movie-info {
    padding: 25px; /* Increased padding */
}

.movie-title {
    font-family: 'Baloo 2', cursive;
    font-size: 1.8rem; /* Increased font size */
    color: var(--primary);
    margin-bottom: 10px;
    position: relative;
    display: inline-block;
}

.movie-title:after {
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

.movie-card:hover .movie-title:after {
    transform: scaleX(1);
}

.movie-year {
    color: #666;
    font-size: 1rem; /* Increased font size */
    font-weight: 500;
}

/* Movie Songs (Episode Selector Style) */
.movie-songs {
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

.movie-card:hover .movie-songs {
    display: block;
    animation: slideUp 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

@keyframes slideUp {
    from { transform: translateY(30px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

.songs-title {
    font-family: 'Baloo 2', cursive;
    font-size: 1.5rem;
    color: var(--primary);
    margin-bottom: 15px;
    text-align: center;
    background: var(--accent);
    padding: 12px;
    border-radius: 10px;
    border: 2px dashed var(--yellow);
    position: relative;
}

.songs-title:after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 0;
    height: 0;
    border-left: 10px solid transparent;
    border-right: 10px solid transparent;
    border-top: 10px solid var(--accent);
}

.songs-list {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 12px;
    padding: 5px;
    max-height: 300px;
    overflow-y: auto;
}

.song-item {
    padding: 12px 8px;
    background: var(--accent);
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

.song-item:before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
    transition: all 0.5s ease;
}

.song-item:hover:before {
    left: 100%;
}

.song-item:hover {
    background: var(--primary);
    color: white;
    transform: translateY(-5px);
    box-shadow: 0 8px 15px var(--accent);
    border-color: var(--primary);
}

.song-title {
    font-weight: bold;
    margin-bottom: 5px;
}

.song-artist {
    font-size: 0.8rem;
    opacity: 0.8;
}

.song-actions {
    display: flex;
    margin-top: 8px;
    gap: 10px;
}

.play-song-btn, .favorite-btn {
    background: white;
    border: none;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    color: var(--primary);
}

.play-song-btn:hover, .favorite-btn:hover {
    transform: scale(1.2);
    background: var(--yellow);
}

.favorite-btn.favorited {
    color: var(--pink);
    background: var(--yellow);
}

/* Player Styles */
.player-container {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(44, 39, 39, 0.95);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 1000;
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

/* Loading Screen */
.loading-screen {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: var(--gradient);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    z-index: 1000;
    transition: opacity 0.5s ease;
}

.loading-title {
    font-family: 'Baloo 2', cursive;
    font-size: 4.5rem;
    color: white;
    text-shadow: 3px 3px 0 var(--yellow);
    margin-bottom: 40px;
    animation: titleBounce 2s infinite alternate;
}

@keyframes titleBounce {
    0% { transform: translateY(0) scale(1); }
    100% { transform: translateY(-15px) scale(1.05); }
}

.loading-bar {
    width: 300px;
    height: 10px;
    background: rgba(255,255,255,0.3);
    border-radius: 10px;
    overflow: hidden;
    margin-bottom: 40px;
}

.loading-progress {
    height: 100%;
    width: 0;
    background: var(--yellow);
    border-radius: 10px;
    animation: loading 3s forwards;
}

@keyframes loading {
    to { width: 100%; }
}

.explore-btn {
    padding: 18px 50px;
    background: white;
    color: var(--primary);
    border: none;
    border-radius: 50px;
    font-family: 'Baloo 2', cursive;
    font-size: 1.8rem;
    cursor: pointer;
    box-shadow: 0 10px 0px var(--accent);
    transition: all 0.3s ease;
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
    box-shadow: 0 18px 0px var(--accent);
    background: var(--yellow);
    color: var(--primary);
}

/* Favorites Page - UPDATED FOR LARGER CARDS AND 3 PER ROW */
.favorites-page {
    display: none;
}

.favorites-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin: 40px auto;
    max-width: 1200px;
    padding: 0 20px;
}

.favorite-card {
    border-radius: 12px;
    aspect-ratio: 1/1.2;
    padding: 15px;
}


.favorite-card:hover {
    transform: translateY(-15px); /* Increased lift effect */
    box-shadow: 0 20px 40px rgba(108, 74, 182, 0.25);
}

.favorite-poster {
    width: 100%;
    height: 220px; /* Increased height */
    object-fit: cover;
    border-radius: 15px;
    border: 3px dashed var(--primary);
    padding: 5px;
    transition: all 0.3s ease;
}

.favorite-info {
    padding: 20px 10px;
}

.favorite-title {
    font-family: 'Baloo 2', cursive;
    font-size: 1.5rem; /* Increased font size */
    color: var(--primary);
    margin-bottom: 5px;
}

.favorite-artist {
    color: #666;
    font-size: 1rem; /* Increased font size */
    margin-bottom: 15px;
    font-weight: 500;
}

.favorite-actions {
    display: flex;
    justify-content: space-between;
    margin-top: 15px;
}

.play-favorite-btn, .remove-favorite-btn {
    padding: 10px 20px; /* Increased padding */
    border: none;
    border-radius: 50px;
    font-family: 'Baloo 2', cursive;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 1rem; /* Increased font size */
}

.play-favorite-btn {
    background: var(--primary);
    color: white;
}

.remove-favorite-btn {
    background: var(--accent);
    color: var(--primary);
}

.play-favorite-btn:hover, .remove-favorite-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 10px rgba(0,0,0,0.1);
}

.remove-favorite-btn:hover {
    background: var(--pink);
    color: white;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 40px;
    background: white;
    border-radius: 20px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    margin-top: 30px;
}

.empty-icon {
    font-size: 4rem;
    color: var(--primary);
    margin-bottom: 20px;
}

.empty-text {
    font-size: 1.2rem;
    color: #666;
    margin-bottom: 20px;
}

/* Notification */
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

/* Floating Elements */
.floating-element {
    position: fixed;
    width: 100px;
    height: 100px;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    z-index: -1;
    opacity: 0.1;
    animation: floatAround 20s infinite linear;
}

@keyframes floatAround {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    25% { transform: translate(50px, 50px) rotate(90deg); }
    50% { transform: translate(100px, 0) rotate(180deg); }
    75% { transform: translate(50px, -50px) rotate(270deg); }
}

/* Responsive Styles */
@media (max-width: 1024px) {
    .movies-grid, .favorites-grid {
        grid-template-columns: repeat(2, 1fr); /* Change to 2 per row on medium screens */
    }
}

@media (max-width: 768px) {
    .header, .loading-title {
        font-size: 3.5rem;
    }
    
    .nav-container {
        flex-direction: column;
    }
    
    .search-bar {
        padding: 15px 20px 15px 50px;
    }
    
    .favorites-btn {
        width: 100%;
        justify-content: center;
    }
    
    .video-player {
        width: 95%;
        padding: 15px;
    }
    
    .close-btn {
        top: -20px;
        right: -20px;
        width: 50px;
        height: 50px;
        font-size: 1.5rem;
    }
    
    .movies-grid, .favorites-grid {
        grid-template-columns: 1fr; /* Change to 1 per row on small screens */
    }
    
    .movie-card {
        margin-bottom: 200px;
    }
    
    .movie-songs {
        bottom: -200px;
    }
}

@media (max-width: 480px) {
    .header, .loading-title {
        font-size: 2.5rem;
    }
    
    .search-bar {
        padding: 12px 15px 12px 45px;
        font-size: 1rem;
    }
    
    .search-icon {
        left: 15px;
        font-size: 1.1rem;
    }
    
    .explore-btn {
        padding: 15px 40px;
        font-size: 1.5rem;
    }
    
    .movie-card {
        margin-bottom: 220px;
    }
    
    .movie-songs {
        bottom: -220px;
    }
}

    </style>
</head>
<body>
    <!-- Loading Screen -->
    <div class="loading-screen" id="loadingScreen">
        <h1 class="loading-title">Melody Toons</h1>
        <div class="loading-bar">
            <div class="loading-progress"></div>
        </div>
        <button class="explore-btn" id="exploreBtn">
            <i class="fas fa-play"></i> Explore Music
        </button>
    </div>
    
    <!-- Main Content -->
    <div class="main-container" id="mainContent" style="display: none;">
        <h1 class="header">Melody Toons</h1>
        
        <!-- Search Bar and Favorites Button -->
        <div class="nav-container">
            <div class="search-container">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-bar" id="searchBar" placeholder="Search for movies, songs or artists...">
            </div>
            <button class="favorites-btn" id="favoritesBtn">
                <i class="fas fa-heart"></i> My Favorites
            </button>
        </div>
        
        <!-- Movies Grid -->
        <div class="movies-grid" id="moviesGrid">
            <!-- Movies will be loaded here -->
        </div>
        
        <!-- Favorites Page -->
        <div class="favorites-page" id="favoritesPage">
            <button class="back-btn" id="backBtn">
                <i class="fas fa-arrow-left"></i> Back to Music
            </button>
            
            <h2 class="header" style="font-size: 3rem;">My Favorites</h2>
            
            <div class="favorites-grid" id="favoritesGrid">
                <!-- Favorites will be loaded here -->
            </div>
            
            <div class="empty-state" id="emptyFavorites" style="display: none;">
                <div class="empty-icon">
                    <i class="fas fa-heart-broken"></i>
                </div>
                <div class="empty-text">
                    You haven't added any favorites yet!
                </div>
                <button class="explore-btn" id="backToMusicBtn" style="padding: 12px 30px; font-size: 1.2rem;">
                    Explore Songs
                </button>
            </div>
        </div>
    </div>
    
    <!-- Music Player -->
    <div class="player-container" id="playerContainer">
        <div class="video-player">
            <div class="close-btn" id="closeBtn">
                <i class="fas fa-times"></i>
            </div>
            <div class="video-container">
                <iframe id="musicVideo" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <!-- Notification -->
    <div class="notification" id="notification">
        <i class="fas fa-bell"></i>
        <span>New songs added weekly!</span>
    </div>

    <!-- Floating Decorative Elements -->
    <div class="floating-element" style="top: 10%; left: 5%; background-image: url('https://img.icons8.com/color/96/000000/music.png');"></div>
    <div class="floating-element" style="top: 30%; right: 8%; background-image: url('https://img.icons8.com/color/96/000000/headphones.png');"></div>
    <div class="floating-element" style="bottom: 20%; left: 10%; background-image: url('https://img.icons8.com/color/96/000000/musical-notes.png');"></div>

    <script>
        // Movie data
const movies = {
    manam: {
        title: "Manam",
        image: "https://images.ottplay.com/images/manam-official-poster-1716574495.jpg?width=1200&height=675&quality=50&impolicy=ottplay-202410&format=webp",
        year: "2014",
        category: "melody",
        songs: [
            {
                title: "Piyo Piyo Re",
                artist: "Anup Rubens • 2014",
                embed: "https://www.youtube.com/embed/UY22VIQM6PY?si=pzgKeA50IL57tHjL",
                genre: "melody"
            },
            {
                title: "Kanulanu Thaake",
                artist: "Anup Rubens • 2014",
                embed: "https://www.youtube.com/embed/WreHin-F3PI?si=fLobMQq8iZh-nZXf",
                genre: "melody"
            },
            {
                title: "Chinni Chinni Aasalu",
                artist: "Anup Rubens • 2014",
                embed: "https://www.youtube.com/embed/S74cV_L5u54?si=Iyo3_XWwCk2uAAQK",
                genre: "melody"
            },
            {
                title: "Kani Penchina Ma Ammake",
                artist: "Anup Rubens • 2014",
                embed: "https://www.youtube.com/embed/J2Bt3sE8Gmo?si=gVFL4KnR-kctW9Yo",
                genre: "classical"
            }
        ]
    },
    
    okkadu: {
        title: "Okkadu",
        image: "https://sund-images.sunnxt.com/10645/832x623_Okkadu_10645_933c7302-39ba-4355-a3ad-a41193c5b8ca.jpg",
        year: "2003",
        category: "mass",
        songs: [
            {
                title: "Hare Rama",
                artist: "Mani Sharma • 2003",
                embed: "https://www.youtube.com/embed/f7R-3ySpDJw?si=lUFJLFHqr9M5to4e",
                genre: "mass"
            },
            {
                title: "Nuvvemaya Chesavo",
                artist: "Mani Sharma • 2003",
                embed: "https://www.youtube.com/embed/aqXidwmKRLU?si=4pSnYBfljCdkvxG3",
                genre: "melody"
            },
            {
                title: "Cheppave Chirugaali",
                artist: "Mani Sharma • 2003",
                embed: "https://www.youtube.com/embed/M34DMAUWiXY?si=GyGmrrsq4Nj0_-Mo",
                genre: "mass"
            },
            {
                title: "Hay Rey Hai",
                artist: "Mani Sharma • 2003",
                embed: "https://www.youtube.com/embed/V7zOE4QBhHU?si=_DFQl2zaMwoOrqsV",
                genre: "electronic"
            },
            {
                title: "Attarintiki",
                artist: "Mani Sharma • 2003",
                embed: "https://www.youtube.com/embed/9J-0pEEfWxQ?si=zPI-2OiADJtWmxNo",
                genre: "melody"
            },
            {
                title: "Sahasam",
                artist: "Mani Sharma • 2003",
                embed: "https://www.youtube.com/embed/Gtorma7Ih70?si=bc97hoHc0tfer-Yl",
                genre: "melody"
            }
        ]
    },
    julayi: {
        title: "Julayi",
        image: "https://files.prokerala.com/movies/pics/800/view-10702.jpg",
        year: "2012",
        category: "mass",
        songs: [
            {
                title: "Chakkani Bike Undhi",
                artist: "Devi Sri Prasad • 2012",
                embed: "https://www.youtube.com/embed/58fsfc1qFHI?si=ovp0f1JFrOKEU6gZ",
                genre: "mass"
            },
            {
                title: "Julayi",
                artist: "Devi Sri Prasad • 2012",
                embed: "https://www.youtube.com/embed/FcY3-ZAfxbk?si=MoPQNUOsoMf3IpID",
                genre: "pop"
            },
            {
                title: "Mee Intiki Mundhu",
                artist: "Devi Sri Prasad • 2012",
                embed: "https://www.youtube.com/embed/zN5IpeGSCbk?si=IcH6tKYg-SbE6w6z",
                genre: "mass"
            },
            {
                title: "O Madhu",
                artist: "Devi Sri Prasad • 2012",
                embed: "https://www.youtube.com/embed/GaC01X8GEGI?si=s0AADqicaJWlSnX6",
                genre: "melody"
            },
            {
                title: "Osey Osey",
                artist: "Devi Sri Prasad • 2012",
                embed: "https://www.youtube.com/embed/H3vJyNBy56Q?si=9NBcfunXYjITOGsw",
                genre: "electronic"
            },
            {
                title: "Pakado Pakado",
                artist: "Devi Sri Prasad • 2012",
                embed: "https://www.youtube.com/embed/VaGlw05lMac?si=ytrB3tuJzOkf6-fw",
                genre: "electronic"
            }
        ]
    },
    nuvvosthanante: {
        title: "Nuvvosthanante Nenodhantaana",
        image: "https://resizing.flixster.com/1G-yxCHGs_47yk0a7fSz6VtBJCc=/fit-in/352x330/v2/https://resizing.flixster.com/-XZAfHZM39UwaGJIFWKAE8fS0ak=/v3/t/assets/p9821835_v_h9_aa.jpg",
        year: "2005",
        category: "melody",
        songs: [
            {
                title: "Niluvadhamu Ninu",
                artist: "Devi Sri Prasad • 2005",
                embed: "https://www.youtube.com/embed/fdEzDqiSC3U?si=-ZvTNWkKYN6y-A3b",
                genre: "melody"
            },
            {
                title: "Something Something",
                artist: "Devi Sri Prasad • 2005",
                embed: "https://www.youtube.com/embed/WXC4ScQ0YVg?si=LDTuzM5DCG6rvU95",
                genre: "mass"
            },
            {
                title: "Ghal Ghal Ghal",
                artist: "Devi Sri Prasad • 2005",
                embed: "https://www.youtube.com/embed/81fRS0FildI?si=ANZTm_IoagywDcye",
                genre: "electronic"
            },
            {
                title: "Chandrullo Unde",
                artist: "Devi Sri Prasad • 2005",
                embed: "https://www.youtube.com/embed/RIriENOmOpo?si=68jQnVaEU7mARNt8",
                genre: "melody"
            },
            {
                title: "Paripoke Pitta",
                artist: "Devi Sri Prasad • 2005",
                embed: "https://www.youtube.com/embed/hkcycMVAJnY?si=Q5Wz6hx0ycVCCIE_",
                genre: "melody"
            },
            {
                title: "Adire Adire",
                artist: "Devi Sri Prasad • 2005",
                embed: "https://www.youtube.com/embed/TXxRtcXJyuc?si=8Mc-vif0jmGkzc0V",
                genre: "melody"
            },
        ]
    },
    mirchi: {
        title: "Mirchi",
        image: "https://files.prokerala.com/movies/pics/800/movie-posters-17333.jpg",
        year: "2013",
        category: "mass",
        songs: [
            {
                title: "Barbie Girl",
                artist: "Devi Sri Prasad • 2013",
                embed: "https://www.youtube.com/embed/OZmn2TS6WbM?si=FYaynNFlwksVXKVW",
                genre: "mass"
            },
            {
                title: "Darlingey",
                artist: "Devi Sri Prasad • 2013",
                embed: "https://www.youtube.com/embed/5jDWeo2HHx8?si=aMgZE1CkvVNakEzp",
                genre: "mass"
            },
            {
                title: "Idhedho Bagundhe",
                artist: "Devi Sri Prasad • 2013",
                embed: "https://www.youtube.com/embed/VQ2-HPwxAZY?si=Cgj9kWWiSdBEo3oH",
                genre: "melody"
            },
            {
                title: "Mirchi",
                artist: "Devi Sri Prasad • 2013",
                embed: "https://www.youtube.com/embed/rQbL36wJ-nA?si=QssuVeDqwBLiXJLi",
                genre: "pop"
            },
            {
                title: "Pandagala",
                artist: "Devi Sri Prasad • 2013",
                embed: "https://www.youtube.com/embed/C153lEabO5k?si=jjAmrn9IlaSt_hqx",
                genre: "mass"
            },
            {
                title: "Yahoon Yahoon",
                artist: "Devi Sri Prasad • 2013",
                embed: "https://www.youtube.com/embed/bqbWbSJpkfI?si=eQcjzgJLBqVk7rm1",
                genre: "mass"
            }
        ]
    },
    baadshah: {
        title: "Baadshah",
        image: "https://i.pinimg.com/564x/72/9b/1f/729b1f3517fbd3fc370afa7df74c0735.jpg",
        year: "2013",
        category: "mass",
        songs: [
            {
                title: "Baadshah",
                artist: "S. Thaman • 2013",
                embed: "https://www.youtube.com/embed/6At2AhG0A4w?si=TCA2Mwj_gWf8aYCH",
                genre: "mass"
            },
            {
                title: "Banthi Poola Janaki",
                artist: "S. Thaman • 2013",
                embed: "https://www.youtube.com/embed/0f94HkZp7rE?si=ONI5F22XqUl9sXCk",
                genre: "melody"
            },
            {
                title: "Diamond Girl",
                artist: "S. Thaman • 2013",
                embed: "https://www.youtube.com/embed/XSegRHkaUco?si=KXT35tGtNFrf4zBZ",
                genre: "pop"
            },
            {
                title: "Rangoli Rangoli",
                artist: "S. Thaman • 2013",
                embed: "https://www.youtube.com/embed/P_8J7VzcVVI?si=FlA9FIc6XqBQUdTG",
                genre: "electronic"
            },
            {
                title: "Sairo Sairo",
                artist: "S. Thaman • 2013",
                embed: "https://www.youtube.com/embed/D0-Drqktml4?si=88-AZN8JIff4oTap",
                genre: "electronic"
            },
            {
                title: "Welcome Kanakam",
                artist: "S. Thaman • 2013",
                embed: "https://www.youtube.com/embed/yegcakkzxMQ?si=oENOEpDkXtZ-B7pt",
                genre: "electronic"
            }
        ]
    },
    kushi: {
        title: "Kushi",
        image: "https://upload.wikimedia.org/wikipedia/en/thumb/2/27/Kushi_Theatrical_Poster.jpg/250px-Kushi_Theatrical_Poster.jpg",
        year: "2001",
        category: "melody",
        songs: [
            {
                title: "Ye Mera Jaha",
                artist: "Mani Sharma • 2001",
                embed: "https://www.youtube.com/embed/8LSZFtfbHwQ?si=HsggNyp39ZPA2h0P",
                genre: "melody"
            },
            {
                title: "Ammaye Sannaga",
                artist: "Mani Sharma • 2001",
                embed: "https://www.youtube.com/embed/yEBee5d_S8U?si=5MEJQPc2lmLWhriS",
                genre: "mass"
            },
            {
                title: "Cheliya Cheliya",
                artist: "Mani Sharma • 2001",
                embed: "https://www.youtube.com/embed/-Z9jQn442Ts?si=rBjmRU5_RyXOoqwr",
                genre: "pop"
            },
            {
                title: "Premante",
                artist: "Mani Sharma • 2001",
                embed: "https://www.youtube.com/embed/uzEHxM8uMLw?si=b5iWFlfkOx5E_Xuv",
                genre: "melody"
            },
            {
                title: "Holi Holi",
                artist: "Mani Sharma • 2001",
                embed: "https://www.youtube.com/embed/9AwF8Iyjbyk?si=AULLTrJFM3CQgWWj",
                genre: "melody"
            },
            {
                title: "Aduvari Matalaku",
                artist: "Mani Sharma • 2001",
                embed: "https://www.youtube.com/embed/ySWjbASVRIc?si=PjDC-RBhGgelqi_W",
                genre: "melody"
            }
        ]
    },
    orange: {
        title: "Orange",
        image: "https://wallpapercave.com/wp/wp6851037.jpg",
        year: "2010",
        category: "melody",
        songs: [
            {
                title: "Ola Olaala Ala",
                artist: "Harris Jayaraj • 2010",
                embed: "https://www.youtube.com/embed/OmDtcHZ9W0Y?si=LuqjfbYFTqIlJBTF",
                genre: "melody"
            },
            {
                title: "Chilipiga",
                artist: "Karthik, Chinmayi • 2010",
                embed: "https://www.youtube.com/embed/ne6PDAoyiBA?si=N3nEzgaNUM_Eplw5",
                genre: "melody"
            },
            {
                title: "Nenu Nuvvantu",
                artist: "A.R. Rahman, Shreya Ghoshal • 2010",
                embed: "https://www.youtube.com/embed/XZGTTLiWRXg?si=Z4IgUMUn1-ZGk3q1",
                genre: "mass"
            },
            {
                title: "Hello Rammante",
                artist: "Karthik, Shreya Ghoshal • 2010",
                embed: "https://www.youtube.com/embed/QntqP3PrW3c?si=cSDi0iZl7nfa63QQ",
                genre: "melody"
            },
            {
                title: "O'range",
                artist: "Karthik, Chinmayi • 2010",
                embed: "https://www.youtube.com/embed/kLtlgOWzf-Q?si=vyKtMwa6JMHDsiq5",
                genre: "melody"
            },
            {
                title: "Rooba Rooba",
                artist: "Karthik, Chinmayi • 2010",
                embed: "https://www.youtube.com/embed/hgQeo55s4So?si=0DjfqZDjEF3XmaZt",
                genre: "melody"
            }
        ]
    },
    venky: {
        title: "Venky",
        image: "https://m.media-amazon.com/images/M/MV5BMzNlZDY2NzItODBhYi00MDE0LTgyYmEtNjU4NzMwZTdkOGY2XkEyXkFqcGc@._V1_.jpg",
        year: "2004",
        category: "mass",
        songs: [
            {
                title: "Silakemo(Mass Tho Pettukunte)",
                artist: "Devi Sri Prasad • 2004",
                embed: "https://www.youtube.com/embed/xpW_eBW2kdY?si=eV5tQhuqv74XHAkz",
                genre: "mass"
            },
            {
                title: "Andala Chukkala Lady",
                artist: "Devi Sri Prasad • 2004",
                embed: "https://www.youtube.com/embed/AjFc3o_pADg?si=bvuFr23toB_WTUtA",
                genre: "pop"
            },
            {
                title: "Maar Maar",
                artist: "Devi Sri Prasad • 2004",
                embed: "https://www.youtube.com/embed/93J6KLVz5xg?si=tSfH5S4jO8GO4mDB",
                genre: "melody"
            },
            {
                title: "O Manasa",
                artist: "Devi Sri Prasad • 2004",
                embed: "https://www.youtube.com/embed/K8PgLaA_PYk?si=3cG2zOhQAFqoRDkj",
                genre: "melody"
            },
            {
                title: "Anaganaga Kadhala",
                artist: "Devi Sri Prasad • 2004",
                embed: "https://www.youtube.com/embed/IWk8PiH84G0?si=Um_ux6ZlAyd2TjCb",
                genre: "mass"
            },
            {
                title: "Gongoora Thotakada",
                artist: "Devi Sri Prasad • 2004",
                embed: "https://www.youtube.com/embed/9vNGmAj__aU?si=B-9MS-KNaS8iO0Qy",
                genre: "mass"
            }
        ]
    },
    "ninnu-kori": {
        title: "Ninnu Kori",
        image: "https://i.scdn.co/image/ab67616d0000b27367038f7285789e85996f1a96",
        year: "2017",
        category: "melody",
        songs: [
            {
                title: "Adiga Adiga",
                artist: "Gopi Sundar • 2017",
                embed: "https://www.youtube.com/embed/evbYFsSJ4pU?si=HKpEiKV2hx6D_cxN",
                genre: "melody"
            },
            {
                title: "Unnatundi Gundey",
                artist: "Gopi Sundar • 2017",
                embed: "https://www.youtube.com/embed/-twi5MBq1TQ?si=BHuVXr4pj9r98wfI",
                genre: "melody"
            },
            {
                title: "Once Upon A Time Lo",
                artist: "Gopi Sundar • 2017",
                embed: "https://www.youtube.com/embed/sEeNHIwopGk?si=uLLQbuwrIcMEx-wX",
                genre: "pop"
            },
            {
                title: "Hey Badhulu Cheppavey",
                artist: "Gopi Sundar • 2017",
                embed: "https://www.youtube.com/embed/RITbbGIXZe0?si=ycMu-XxxsPQ9Z3RQ",
                genre: "melody"
            },
            {
                title: "Ninnu Kori",
                artist: "Gopi Sundar • 2017",
                embed: "https://www.youtube.com/embed/gPDkCAMW4mY?si=0J36Gy2ECJFAZY08",
                genre: "melody"
            }
        ]
    },
    "nuvvu-naaku-nachav": {
        title: "Nuvvu Naaku Nachav",
        image: "https://m.media-amazon.com/images/M/MV5BMzY4NjI0NTgtNTk1Ny00MzAzLThkZTYtYWMxYmNlZDU5ZThjXkEyXkFqcGc@._V1_.jpg",
        year: "2001",
        category: "melody",
        songs: [
            {
                title: "Unnamata Cheppaniva",
                artist: "Koti • 2001",
                embed: "https://www.youtube.com/embed/rADxNvZFSnQ?si=zdwznC1EP8y3CgCH",
                genre: "mass"
            },
            {
                title: "O Navvu Chalu",
                artist: "Koti • 2001",
                embed: "https://www.youtube.com/embed/aof2NeZA-54?si=vF_fejuoDQMrHTsf",
                genre: "mass"
            },
            {
                title: "Aakasham",
                artist: "Koti • 2001",
                embed: "https://www.youtube.com/embed/f_8hlpCjCUU?si=1h-8HCKAOp8G8SCo",
                genre: "melody"
            },
            {
                title: "Naa Chupe Ninu",
                artist: "Koti • 2001",
                embed: "https://www.youtube.com/embed/Yz0V99HL--Y?si=LWneQs7f6L6MgqvC",
                genre: "melody"
            },
            {
                title: "O Priyatama",
                artist: "Koti • 2001",
                embed: "https://www.youtube.com/embed/dzRgnnltCs0?si=V7Ok9ZFlh01DJ8v4",
                genre: "melody"
            },
            {
                title: "Okkasari Cheppaleva",
                artist: "Koti • 2001",
                embed: "https://www.youtube.com/embed/8lHeSeWYa_4?si=NRRkC2GGAsSCgN72",
                genre: "electronic"
            }
        ]
    },
    "raarandai-veduka-choodaam": {
        title: "Raarandai Veduka Choodaam",
        image: "https://m.media-amazon.com/images/M/MV5BOTBlZjRjNjYtMzQ5NS00ZGJiLTkyNDctZjNiOWVjMmQ3ZTZmXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg",
        year: "2017",
        category: "melody",
        songs: [
            {
                title: "Raarandai Veduka Choodaam",
                artist: "Gopi Sundar • 2017",
                embed: "https://www.youtube.com/embed/X93R56NFBe4?si=QG57NGXHoY0L4554",
                genre: "melody"
            },
            {
                title: "Nee Vente Nenunte",
                artist: "Gopi Sundar • 2017",
                embed: "https://www.youtube.com/embed/U6_4Nm-nax8?si=KRliFatPuVB-2gEF",
                genre: "pop"
            },
            {
                title: "Bhramaramba Ki Nachesanu",
                artist: "Gopi Sundar • 2017",
                embed: "https://www.youtube.com/embed/nP_SuJPrtIg?si=logdeXahrjDA-azu",
                genre: "electronic"
            },
            {
                title: "Thakita Thakajham",
                artist: "Gopi Sundar • 2017",
                embed: "https://www.youtube.com/embed/p9kCgQdy_VE?si=rwLUlqiLCwfCo5Dy",
                genre: "melody"
            },
            {
                title: "Break-Up",
                artist: "Gopi Sundar • 2017",
                embed: "https://www.youtube.com/embed/xzttSsWL7SY?si=96YJ-uOS6sd0R3uX",
                genre: "melody"
            }
        ]
    },
    "geetha-govindham": {
        title: "Geetha Govindham",
        image: "https://image.tmdb.org/t/p/original/2w4YlrPemW2uBIglh102R1w4yaP.jpg",
        year: "2018",
        category: "melody",
        songs: [
            {
                title: "Inkem Inkem Inkem Kaavaale",
                artist: "Gopi Sundar • 2018",
                embed: "https://www.youtube.com/embed/qFYj1w69OZA?si=qZA0WJGVAjy54X2V",
                genre: "melody"
            },
            {
                title: "What The Life",
                artist: "Gopi Sundar • 2018",
                embed: "https://www.youtube.com/embed/mQuNZToUlXc?si=NCiwVCY7Go1y0daS",
                genre: "pop"
            },
            {
                title: "Yenti Yenti",
                artist: "Gopi Sundar • 2018",
                embed: "https://www.youtube.com/embed/2Hro7K55Ivs?si=6klSDEBDNivafAE2",
                genre: "hiphop"
            },
            {
                title: "Vachindamma",
                artist: "Gopi Sundar • 2018",
                embed: "https://www.youtube.com/embed/aotMkXvjXtc?si=06W_MuRjjsoRt0v5",
                genre: "melody"
            },
            {
                title: "Kanureppala Kaalam",
                artist: "Gopi Sundar • 2018",
                embed: "https://www.youtube.com/embed/JPBjdkoqWuc?si=Mm2sw5rubrzFIaz4",
                genre: "melody"
            },
            {
                title: "Tanemandhe Tanemandhe",
                artist: "Gopi Sundar • 2018",
                embed: "https://www.youtube.com/embed/wDZNcwJ1JOE?si=zMsFhGsrTTBUiO-P",
                genre: "melody"
            }
        ]
    }
};
// DOM Elements
const loadingScreen = document.getElementById('loadingScreen');
const exploreBtn = document.getElementById('exploreBtn');
const mainContent = document.getElementById('mainContent');
const searchBar = document.getElementById('searchBar');
const moviesGrid = document.getElementById('moviesGrid');
const playerContainer = document.getElementById('playerContainer');
const closeBtn = document.getElementById('closeBtn');
const musicVideo = document.getElementById('musicVideo');
const notification = document.getElementById('notification');
const favoritesBtn = document.getElementById('favoritesBtn');
const favoritesPage = document.getElementById('favoritesPage');
const backBtn = document.getElementById('backBtn');
const favoritesGrid = document.getElementById('favoritesGrid');
const emptyFavorites = document.getElementById('emptyFavorites');
const backToMusicBtn = document.getElementById('backToMusicBtn');

// Page state
let currentPage = 'main'; // 'main' or 'favorites'

// Favorites array
let favorites = JSON.parse(localStorage.getItem('melodyToonsFavorites')) || [];

// Show notification after 3 seconds
setTimeout(() => {
    notification.classList.add('show');
    
    // Hide notification after 5 seconds
    setTimeout(() => {
        notification.classList.remove('show');
    }, 5000);
}, 3000);

// Explore button click handler
exploreBtn.addEventListener('click', () => {
    // Hide loading screen with fade out
    loadingScreen.style.opacity = '0';
    
    // After fade out completes, hide it and show main content
    setTimeout(() => {
        loadingScreen.style.display = 'none';
        mainContent.style.display = 'block';
        
        // Load movies
        loadMovies();
    }, 500);
});

// Favorites button click handler
favoritesBtn.addEventListener('click', () => {
    showFavoritesPage();
});

// Back button click handler
backBtn.addEventListener('click', () => {
    showMainPage();
});

// Back to music button click handler
backToMusicBtn.addEventListener('click', () => {
    showMainPage();
});

// Close player button
closeBtn.addEventListener('click', () => {
    playerContainer.style.display = 'none';
    // Stop the video by removing the src
    musicVideo.src = '';
});

// Show main page function
function showMainPage() {
    currentPage = 'main';
    favoritesPage.style.display = 'none';
    moviesGrid.style.display = 'grid';
    
    // Load movies
    loadMovies();
}

// Show favorites page function
function showFavoritesPage() {
    currentPage = 'favorites';
    moviesGrid.style.display = 'none';
    favoritesPage.style.display = 'block';
    
    // Load favorites
    loadFavorites();
}

// Load movies into the grid
function loadMovies(searchQuery = '') {
    moviesGrid.innerHTML = '';
    
    let filteredMovies = Object.values(movies);
    
    // Apply search filter
    if (searchQuery) {
        const query = searchQuery.toLowerCase();
        filteredMovies = filteredMovies.filter(movie => {
            // Check movie title or any song title/artist
            return movie.title.toLowerCase().includes(query) || 
                movie.songs.some(song => 
                    song.title.toLowerCase().includes(query) || 
                    song.artist.toLowerCase().includes(query)
                );
        });
    }
    
    if (filteredMovies.length === 0) {
        moviesGrid.innerHTML = `
            <div class="empty-state" style="grid-column: 1 / -1">
                <div class="empty-icon">
                    <i class="fas fa-music"></i>
                </div>
                <div class="empty-text">
                    No movies found matching your search.
                </div>
            </div>
        `;
        return;
    }
    
    filteredMovies.forEach(movie => {
        const movieCard = document.createElement('div');
        movieCard.className = 'movie-card';
        
        movieCard.innerHTML = `
            <img src="${movie.image}" alt="${movie.title}" class="movie-poster">
            <div class="movie-info">
                <h3 class="movie-title">${movie.title}</h3>
                <div class="movie-year">${movie.year}</div>
                <div class="movie-songs">
                    <div class="songs-title">Choose Your Song!</div>
                    <div class="songs-list">
                        ${movie.songs.map((song) => `
                            <div class="song-item" data-video="${song.embed}" data-movie="${movie.title}" data-poster="${movie.image}" data-artist="${song.artist}" data-title="${song.title}">
                                <div class="song-title">${song.title}</div>
                                <div class="song-artist">${song.artist.split('•')[0]}</div>
                                <div class="song-actions">
                                    <button class="play-song-btn" title="Play song">
                                        <i class="fas fa-play"></i>
                                    </button>
                                    <button class="favorite-btn${isFavorite(movie.title, song.title) ? ' favorited' : ''}" title="Add to favorites">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                </div>
                            </div>
                        `).join('')}
                    </div>
                </div>
            </div>
        `;
        
        // Add click handlers for song items
        movieCard.querySelectorAll('.song-item').forEach(item => {
            // Play song button
            const playBtn = item.querySelector('.play-song-btn');
            playBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                playVideo(item.dataset.video);
            });
            
            // Favorite button
            const favBtn = item.querySelector('.favorite-btn');
            const songTitle = item.dataset.title;
            const songArtist = item.dataset.artist;
            const movieTitle = item.dataset.movie;
            const poster = item.dataset.poster;
            
            favBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                toggleFavorite({
                    movieTitle,
                    songTitle,
                    songArtist,
                    embed: item.dataset.video,
                    poster
                }, favBtn);
            });
        });
        
        moviesGrid.appendChild(movieCard);
    });
}

// Play video function
function playVideo(videoUrl) {
    musicVideo.src = videoUrl;
    playerContainer.style.display = 'flex';
}

// Search functionality
searchBar.addEventListener('input', () => {
    const searchQuery = searchBar.value.trim();
    loadMovies(searchQuery);
});

// Favorites functionality
function isFavorite(movieTitle, songTitle) {
    return favorites.some(fav => 
        fav.movieTitle === movieTitle && fav.songTitle === songTitle
    );
}

// Toggle favorite function - FIXED to properly handle removal
function toggleFavorite(song, favBtn) {
    const { movieTitle, songTitle } = song;
    const isFavorited = isFavorite(movieTitle, songTitle);
    
    if (isFavorited) {
        // Remove from favorites
        favorites = favorites.filter(fav => 
            !(fav.movieTitle === movieTitle && fav.songTitle === songTitle)
        );
        
        // If favBtn exists, remove the class
        if (favBtn) {
            favBtn.classList.remove('favorited');
        }
        
        // Show notification
        showNotification(`"${songTitle}" removed from favorites!`);
    } else {
        // Add to favorites
        favorites.push(song);
        
        // If favBtn exists, add the class
        if (favBtn) {
            favBtn.classList.add('favorited');
        }
        
        // Show notification
        showNotification(`"${songTitle}" added to favorites!`);
    }
    
    // Save to localStorage
    localStorage.setItem('melodyToonsFavorites', JSON.stringify(favorites));
    
    // If on favorites page, refresh the display
    if (currentPage === 'favorites') {
        loadFavorites();
    }
}

// Load favorites into the grid
function loadFavorites() {
    favoritesGrid.innerHTML = '';
    
    if (favorites.length === 0) {
        emptyFavorites.style.display = 'block';
        return;
    }
    
    emptyFavorites.style.display = 'none';
    
    favorites.forEach((fav) => {
        const favoriteCard = document.createElement('div');
        favoriteCard.className = 'favorite-card';
        
        favoriteCard.innerHTML = `
            <img src="${fav.poster}" alt="${fav.movieTitle}" class="favorite-poster">
            <div class="favorite-info">
                <h3 class="favorite-title">${fav.songTitle}</h3>
                <div class="favorite-artist">${fav.songArtist}</div>
                <div class="favorite-actions">
                    <button class="play-favorite-btn">
                        <i class="fas fa-play"></i> Play
                    </button>
                    <button class="remove-favorite-btn" data-movie="${fav.movieTitle}" data-song="${fav.songTitle}">
                        <i class="fas fa-times"></i> Remove
                    </button>
                </div>
            </div>
        `;
        
        // Add play functionality
        favoriteCard.querySelector('.play-favorite-btn').addEventListener('click', () => {
            playVideo(fav.embed);
        });
        
        // Add remove functionality - FIXED to use the toggleFavorite function properly
        favoriteCard.querySelector('.remove-favorite-btn').addEventListener('click', () => {
            toggleFavorite(fav, null);
        });
        
        favoritesGrid.appendChild(favoriteCard);
    });
}

function showNotification(message) {
    const notificationEl = document.getElementById('notification');
    notificationEl.querySelector('span').textContent = message;
    notificationEl.classList.add('show');
    
    setTimeout(() => {
        notificationEl.classList.remove('show');
    }, 3000);
}

// Initialize with showing the startup screen
setTimeout(() => {
    // Show notification
    showNotification('New songs added weekly!');
}, 3000);
    </script>
</body>
</html>