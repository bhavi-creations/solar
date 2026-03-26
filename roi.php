<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Our Network — Nabhas Solar</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;900&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,400&display=swap" rel="stylesheet">
  <style>
    /* * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      font-family: 'DM Sans', sans-serif;
      background: #f0f6ff;
      color: #1a1a2e;
      overflow-x: hidden;
    } */



    /* ── HERO ── */
    .solar-panels-hero {
      background: linear-gradient(135deg, #003087 0%, #0056b3 55%, #0070c0 100%);
      padding: 90px 0 70px;
      position: relative;
      overflow: hidden;
    }

    .solar-panels-hero::before {
      content: '';
      position: absolute;
      top: -80px;
      right: -80px;
      width: 420px;
      height: 420px;
      border-radius: 50%;
      background: rgba(0, 170, 255, 0.12);
      pointer-events: none;
    }

    .solar-panels-hero::after {
      content: '';
      position: absolute;
      bottom: -60px;
      left: -60px;
      width: 300px;
      height: 300px;
      border-radius: 50%;
      background: rgba(255, 140, 0, 0.1);
      pointer-events: none;
    }

    .solar-panels-hero-badge {
      display: inline-block;
      background: rgba(0, 170, 255, 0.2);
      border: 1px solid rgba(0, 170, 255, 0.4);
      color: #7ad4ff;
      font-family: 'Outfit', sans-serif;
      font-weight: 700;
      font-size: 0.75rem;
      letter-spacing: 2px;
      text-transform: uppercase;
      padding: 6px 18px;
      border-radius: 50px;
      margin-bottom: 20px;
    }

    .solar-panels-hero-title {
      font-family: 'Outfit', sans-serif;
      font-weight: 900;
      font-size: clamp(2.4rem, 5vw, 3.6rem);
      color: #ffffff;
      line-height: 1.1;
      letter-spacing: -1px;
    }

    .solar-panels-hero-title span {
      color: #00aaff;
    }

    .solar-panels-hero-sub {
      font-size: 1.05rem;
      color: rgba(255, 255, 255, 0.72);
      margin-top: 14px;
    }

    .solar-panels-hero-stat {
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.15);
      border-radius: 16px;
      padding: 20px 28px;
      text-align: center;
      backdrop-filter: blur(10px);
    }

    .solar-panels-hero-stat-num {
      font-family: 'Outfit', sans-serif;
      font-weight: 900;
      font-size: 2rem;
      color: #00aaff;
      line-height: 1;
    }

    .solar-panels-hero-stat-label {
      font-size: 0.8rem;
      color: rgba(255, 255, 255, 0.65);
      margin-top: 4px;
    }

    /* ── MAP SECTION ── */
    .solar-panels-map-section {
      padding: 80px 0;
      background: #f0f6ff;
    }

    .solar-panels-section-eyebrow {
      font-family: 'Outfit', sans-serif;
      font-weight: 700;
      font-size: 0.72rem;
      letter-spacing: 3px;
      text-transform: uppercase;
      color: #00aaff;
      margin-bottom: 10px;
    }

    .solar-panels-section-title {
      font-family: 'Outfit', sans-serif;
      font-weight: 900;
      font-size: clamp(1.7rem, 3vw, 2.4rem);
      color: #003087;
      letter-spacing: -0.5px;
      line-height: 1.15;
    }

    .solar-panels-section-bar {
      width: 52px;
      height: 4px;
      background: linear-gradient(90deg, #00aaff, #ff8c00);
      border-radius: 4px;
      margin: 14px 0 0;
    }

    .solar-panels-map-wrap {
      background: #ffffff;
      border-radius: 24px;
      padding: 36px;
      box-shadow: 0 8px 40px rgba(0, 48, 135, 0.1);
      position: relative;
    }

    .solar-panels-map-visual {
      border-radius: 18px;
      min-height: 500px;
      background: linear-gradient(160deg, #d0eaff 0%, #a8d4f5 40%, #7ab8e8 100%);
      position: relative;
      overflow: hidden;
    }

    .solar-panels-map-visual::before {
      content: '';
      position: absolute;
      inset: 0;
      background: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Ccircle fill='%23003087' cx='20' cy='20' r='1' opacity='0.08'/%3E%3C/g%3E%3C/svg%3E");
    }

    /* SVG AP map */
    .solar-panels-ap-svg {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      opacity: 0.22;
    }

    /* Pins */
    .solar-panels-pin {
      position: absolute;
      display: flex;
      flex-direction: column;
      align-items: center;
      cursor: pointer;
      animation: solar-panels-pin-drop 0.5s ease both;
    }

    @keyframes solar-panels-pin-drop {
      from {
        transform: translateY(-16px);
        opacity: 0;
      }

      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    .solar-panels-pin-dot {
      width: 16px;
      height: 16px;
      background: #cc1111;
      border-radius: 50%;
      border: 3px solid #ffffff;
      box-shadow: 0 2px 10px rgba(204, 17, 17, 0.45);
      transition: transform 0.2s;
    }

    .solar-panels-pin:hover .solar-panels-pin-dot {
      transform: scale(1.4);
      background: #ff8c00;
    }

    .solar-panels-pin-pulse {
      position: absolute;
      top: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 16px;
      height: 16px;
      border-radius: 50%;
      background: rgba(204, 17, 17, 0.35);
      animation: solar-panels-pulse 1.8s ease-out infinite;
    }

    @keyframes solar-panels-pulse {
      0% {
        transform: translateX(-50%) scale(1);
        opacity: 0.7;
      }

      100% {
        transform: translateX(-50%) scale(2.8);
        opacity: 0;
      }
    }

    .solar-panels-pin-tag {
      margin-top: 6px;
      background: #ffffff;
      border-radius: 8px;
      padding: 3px 9px;
      font-family: 'Outfit', sans-serif;
      font-weight: 700;
      font-size: 0.68rem;
      color: #003087;
      white-space: nowrap;
      box-shadow: 0 2px 8px rgba(0, 48, 135, 0.18);
      letter-spacing: 0.2px;
    }

    /* Pin positions */
    .solar-panels-p-eleswaram {
      top: 12%;
      right: 20%;
      animation-delay: 0.05s;
    }

    .solar-panels-p-tuni {
      top: 22%;
      right: 14%;
      animation-delay: 0.1s;
    }

    .solar-panels-p-kakinada {
      top: 37%;
      right: 9%;
      animation-delay: 0.15s;
    }

    .solar-panels-p-rajahmundry {
      top: 30%;
      left: 42%;
      animation-delay: 0.2s;
    }

    .solar-panels-p-gokavaram {
      top: 22%;
      left: 30%;
      animation-delay: 0.25s;
    }

    .solar-panels-p-ravulapalem {
      top: 47%;
      left: 32%;
      animation-delay: 0.3s;
    }

    .solar-panels-p-ramachandrapuram {
      top: 42%;
      right: 22%;
      animation-delay: 0.35s;
    }

    .solar-panels-p-amalapuram {
      top: 57%;
      right: 16%;
      animation-delay: 0.4s;
    }

    .solar-panels-p-razole {
      top: 65%;
      left: 40%;
      animation-delay: 0.45s;
    }

    /* Map centre badge */
    .solar-panels-map-center {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 5;
      text-align: center;
    }

    @media (max-width:768px) {
      .solar-panels-map-center {
        position: absolute;
        top: 15%;
        left: 30%;
        transform: translate(-50%, -50%);
        z-index: 5;
        text-align: center;
      }
    }

    .solar-panels-map-center-circle {
      width: 100px;
      height: 100px;
      background: rgba(0, 48, 135, 0.82);
      border-radius: 50%;
      border: 3px solid rgba(0, 170, 255, 0.5);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      backdrop-filter: blur(8px);
      box-shadow: 0 6px 30px rgba(0, 48, 135, 0.4);
    }

    .solar-panels-map-center-circle i {
      color: #00aaff;
      font-size: 1.6rem;
    }

    .solar-panels-map-center-circle span {
      font-family: 'Outfit', sans-serif;
      font-weight: 800;
      font-size: 0.65rem;
      color: #ffffff;
      letter-spacing: 1px;
      margin-top: 4px;
    }

    /* ── LOCATION CARDS ── */
    .solar-panels-loc-card {
      background: #ffffff;
      border-radius: 14px;
      padding: 20px 22px;
      display: flex;
      align-items: center;
      gap: 16px;
      box-shadow: 0 2px 14px rgba(0, 48, 135, 0.08);
      border: 1.5px solid #e4eefb;
      transition: all 0.25s;
      height: 100%;
    }

    .solar-panels-loc-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 10px 30px rgba(0, 48, 135, 0.15);
      border-color: #00aaff;
    }

    .solar-panels-loc-icon {
      width: 46px;
      height: 46px;
      border-radius: 12px;
      background: linear-gradient(135deg, #003087, #0056b3);
      display: flex;
      align-items: center;
      justify-content: center;
      color: #ffffff;
      font-size: 1rem;
      flex-shrink: 0;
    }

    .solar-panels-loc-name {
      font-family: 'Outfit', sans-serif;
      font-weight: 700;
      font-size: 1rem;
      color: #003087;
    }

    .solar-panels-loc-type {
      font-size: 0.77rem;
      color: #7a94b8;
      margin-top: 2px;
    }

    .solar-panels-loc-badge {
      margin-left: auto;
      background: #e8f4fd;
      color: #0056b3;
      font-family: 'Outfit', sans-serif;
      font-weight: 700;
      font-size: 0.65rem;
      border-radius: 50px;
      padding: 3px 10px;
      white-space: nowrap;
    }

    /* ── CONTACT SECTION ── */
    .solar-panels-contact-section {
      padding: 80px 0;
      background: #ffffff;
    }

    .solar-panels-contact-card {
      background: #f5f9ff;
      border-radius: 20px;
      padding: 36px 28px;
      text-align: center;
      border: 1.5px solid #d5e7fb;
      transition: all 0.25s;
      height: 100%;
    }

    .solar-panels-contact-card:hover {
      background: #003087;
      border-color: #003087;
      transform: translateY(-6px);
      box-shadow: 0 12px 36px rgba(0, 48, 135, 0.22);
    }

    .solar-panels-contact-card:hover .solar-panels-contact-icon,
    .solar-panels-contact-card:hover .solar-panels-contact-title,
    .solar-panels-contact-card:hover .solar-panels-contact-text,
    .solar-panels-contact-card:hover .solar-panels-contact-link {
      color: #ffffff !important;
    }

    .solar-panels-contact-card:hover .solar-panels-contact-icon-wrap {
      background: rgba(255, 255, 255, 0.15);
    }

    .solar-panels-contact-icon-wrap {
      width: 60px;
      height: 60px;
      border-radius: 16px;
      background: #e0eeff;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 18px;
      transition: all 0.25s;
    }

    .solar-panels-contact-icon {
      font-size: 1.5rem;
      color: #003087;
      transition: color 0.25s;
    }

    .solar-panels-contact-title {
      font-family: 'Outfit', sans-serif;
      font-weight: 700;
      font-size: 1.05rem;
      color: #003087;
      margin-bottom: 8px;
      transition: color 0.25s;
    }

    .solar-panels-contact-text {
      font-size: 0.88rem;
      color: #5a7499;
      line-height: 1.6;
      transition: color 0.25s;
    }

    .solar-panels-contact-link {
      display: inline-block;
      margin-top: 12px;
      font-family: 'Outfit', sans-serif;
      font-weight: 700;
      color: #00aaff;
      text-decoration: none;
      font-size: 0.95rem;
      transition: color 0.25s;
    }

    /* ── CTA BANNER ── */
    .solar-panels-cta {
      margin-top: 60px;
      background: linear-gradient(135deg, #003087 0%, #0070c0 100%);
      border-radius: 24px;
      padding: 60px 40px;
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    .solar-panels-cta::before {
      content: '';
      position: absolute;
      top: -50px;
      right: -50px;
      width: 260px;
      height: 260px;
      border-radius: 50%;
      background: rgba(0, 170, 255, 0.12);
    }

    .solar-panels-cta::after {
      content: '';
      position: absolute;
      bottom: -40px;
      left: -40px;
      width: 200px;
      height: 200px;
      border-radius: 50%;
      background: rgba(255, 140, 0, 0.1);
    }

    .solar-panels-cta-title {
      font-family: 'Outfit', sans-serif;
      font-weight: 900;
      font-size: clamp(1.6rem, 3vw, 2.3rem);
      color: #ffffff;
      position: relative;
      z-index: 2;
    }

    .solar-panels-cta-sub {
      color: rgba(255, 255, 255, 0.7);
      font-size: 1rem;
      margin-top: 10px;
      margin-bottom: 32px;
      position: relative;
      z-index: 2;
    }

    .solar-panels-btn-primary {
      background: #ff8c00;
      color: #ffffff;
      border: none;
      border-radius: 50px;
      padding: 14px 34px;
      font-family: 'Outfit', sans-serif;
      font-weight: 700;
      font-size: 0.95rem;
      text-decoration: none;
      display: inline-block;
      box-shadow: 0 6px 20px rgba(255, 140, 0, 0.4);
      transition: all 0.2s;
      position: relative;
      z-index: 2;
    }

    .solar-panels-btn-primary:hover {
      background: #e07d00;
      color: #ffffff;
      transform: translateY(-2px);
      box-shadow: 0 10px 28px rgba(255, 140, 0, 0.5);
    }

    .solar-panels-btn-outline {
      background: rgba(255, 255, 255, 0.1);
      color: #ffffff;
      border: 2px solid rgba(255, 255, 255, 0.35);
      border-radius: 50px;
      padding: 14px 34px;
      font-family: 'Outfit', sans-serif;
      font-weight: 700;
      font-size: 0.95rem;
      text-decoration: none;
      display: inline-block;
      transition: all 0.2s;
      position: relative;
      z-index: 2;
    }

    .solar-panels-btn-outline:hover {
      background: rgba(255, 255, 255, 0.2);
      color: #ffffff;
      transform: translateY(-2px);
    }







    /* active service zone  */
    /* Base Section Styling */
    .active_zone-section {
      background-color: #f4f7f9;
      padding: 80px 0;
      font-family: 'Poppins', sans-serif;
    }

    /* Main Heading Styling */
    .active_zone-title {
      /* color: #0B1F3A; */
      color: #0B1F3A;
      font-weight: 800;
      margin-bottom: 15px;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .active_zone-subtitle {
      color: #555;
      margin-bottom: 50px;
      font-size: 1.1rem;
    }

    /* Card Component */
    .active_zone-card {
      background: #ffffff;
      border-radius: 16px;
      padding: 30px 20px;
      text-align: center;
      border: none;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      height: 100%;
      position: relative;
      overflow: hidden;
      z-index: 1;
    }

    /* Hover Effects */
    .active_zone-card:hover {
      transform: translateY(-12px);
      box-shadow: 0 15px 30px rgba(11, 31, 58, 0.15);
    }

    .active_zone-card::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 0;
      background: #0B1F3A;
      transition: all 0.4s ease;
      z-index: -1;
    }

    .active_zone-card:hover::before {
      height: 100%;
    }

    .active_zone-card:hover .active_zone-name {
      color: #ffffff;
    }

    /* Icon and Text */
    .active_zone-icon {
      font-size: 2.2rem;
      color: #ffcc00;
      margin-bottom: 15px;
      display: block;
    }

    .active_zone-name {
      color: #0B1F3A;
      font-weight: 600;
      font-size: 1.1rem;
      margin-bottom: 0;
      transition: color 0.3s ease;
    }

    /* Yellow Accent Line */
    .active_zone-underline {
      width: 50px;
      height: 4px;
      background: #ffcc00;
      margin: 0 auto 40px;
      border-radius: 2px;
    }

    /* new  plaves names and its  stylings  */
    /* Meeru ichina patha styles ni alaage unchandi... */

    /* --- ADDED NEW PIN POSITIONS --- */
    .solar-panels-p-prathipadu {
      top: 18%;
      right: 30%;
      animation-delay: 0.5s;
    }

    .solar-panels-p-jagampeta {
      top: 26%;
      left: 35%;
      animation-delay: 0.55s;
    }

    .solar-panels-p-pithapuram {
      top: 32%;
      right: 15%;
      animation-delay: 0.6s;
    }

    .solar-panels-p-pedapuram {
      top: 28%;
      right: 25%;
      animation-delay: 0.65s;
    }

    .solar-panels-p-annavaram {
      top: 15%;
      right: 12%;
      animation-delay: 0.7s;
    }

    .solar-panels-p-yanam {
      top: 52%;
      right: 10%;
      animation-delay: 0.75s;
    }

    /* --- MOBILE RESPONSIVE LOGIC --- */

    @media (max-width: 768px) {

      /* Map center position for mobile */
      .solar-panels-map-center {
        top: 20%;
        left: 20%;
      }

      /* Hide city tags by default on mobile */
      .solar-panels-pin-tag {
        opacity: 0;
        visibility: hidden;
        transform: translateY(5px);
        transition: all 0.3s ease;
        pointer-events: none;
        /* Tag meeda click avvakunda */
      }

      /* Show tag only when the parent pin is clicked/hovered */
      .solar-panels-pin:active .solar-panels-pin-tag,
      .solar-panels-pin:hover .solar-panels-pin-tag {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
      }

      /* Make dots slightly bigger for easier touch on mobile */
      .solar-panels-pin-dot {
        width: 14px;
        height: 14px;
      }

      /* Visual adjust to ensure tags don't overlap too much */
      .solar-panels-pin-tag {
        font-size: 0.6rem;
        padding: 2px 6px;
      }
    }

    /* Hover effect on Desktop (already exists, but reinforcing) */
    .solar-panels-pin:hover .solar-panels-pin-tag {
      background: #00aaff;
      color: #ffffff;
      z-index: 10;
    }
  </style>
</head>

<body>




  <!-- MAP SECTION -->
  <section class="solar-panels-map-section">
    <div class="container">
      <div class="mb-4">
        <div class="solar-panels-section-eyebrow"><i class="fas fa-satellite me-1"></i>Coverage Map</div>
        <h2 class="solar-panels-section-title">Service Network —<br>Andhra Pradesh</h2>
        <div class="solar-panels-section-bar"></div>
      </div>

      <div class="solar-panels-map-wrap">

        <!-- MAP VISUAL -->
        <!-- <div class="solar-panels-map-visual">
        
          <svg class="solar-panels-ap-svg" viewBox="0 0 400 500" preserveAspectRatio="xMidYMid meet">
            <path d="M120,40 L200,20 L280,40 L320,100 L350,180 L360,260 L340,340 L300,400 L260,460 L220,480 L180,460 L140,420 L100,360 L60,300 L50,220 L60,140 Z"
              fill="#003087" stroke="#0056b3" stroke-width="2" fill-opacity="0.5" />
          </svg>

          
          <div class="solar-panels-pin solar-panels-p-eleswaram">
            <div class="solar-panels-pin-pulse"></div>
            <div class="solar-panels-pin-dot"></div>
            <div class="solar-panels-pin-tag">Eleswaram</div>
          </div>
          <div class="solar-panels-pin solar-panels-p-tuni">
            <div class="solar-panels-pin-pulse"></div>
            <div class="solar-panels-pin-dot"></div>
            <div class="solar-panels-pin-tag">Tuni</div>
          </div>
          <div class="solar-panels-pin solar-panels-p-kakinada">
            <div class="solar-panels-pin-pulse"></div>
            <div class="solar-panels-pin-dot"></div>
            <div class="solar-panels-pin-tag">Kakinada</div>
          </div>
          <div class="solar-panels-pin solar-panels-p-rajahmundry">
            <div class="solar-panels-pin-pulse"></div>
            <div class="solar-panels-pin-dot"></div>
            <div class="solar-panels-pin-tag">Rajahmundry</div>
          </div>
          <div class="solar-panels-pin solar-panels-p-gokavaram">
            <div class="solar-panels-pin-pulse"></div>
            <div class="solar-panels-pin-dot"></div>
            <div class="solar-panels-pin-tag">Gokavaram</div>
          </div>
          <div class="solar-panels-pin solar-panels-p-ravulapalem">
            <div class="solar-panels-pin-pulse"></div>
            <div class="solar-panels-pin-dot"></div>
            <div class="solar-panels-pin-tag">Ravulapalem</div>
          </div>
          <div class="solar-panels-pin solar-panels-p-ramachandrapuram">
            <div class="solar-panels-pin-pulse"></div>
            <div class="solar-panels-pin-dot"></div>
            <div class="solar-panels-pin-tag">Ramachandrapuram</div>
          </div>
          <div class="solar-panels-pin solar-panels-p-amalapuram">
            <div class="solar-panels-pin-pulse"></div>
            <div class="solar-panels-pin-dot"></div>
            <div class="solar-panels-pin-tag">Amalapuram</div>
          </div>
          <div class="solar-panels-pin solar-panels-p-razole">
            <div class="solar-panels-pin-pulse"></div>
            <div class="solar-panels-pin-dot"></div>
            <div class="solar-panels-pin-tag">Razole</div>
          </div>

    
          <div class="solar-panels-map-center">
            <div class="solar-panels-map-center-circle">
              <i class="fas fa-solar-panel"></i>
              <span>NABHAS<br>SOLAR</span>
            </div>
          </div>
        </div> -->

        <div class="solar-panels-map-visual">
          <svg class="solar-panels-ap-svg" viewBox="0 0 400 500" preserveAspectRatio="xMidYMid meet">
            <path d="M120,40 L200,20 L280,40 L320,100 L350,180 L360,260 L340,340 L300,400 L260,460 L220,480 L180,460 L140,420 L100,360 L60,300 L50,220 L60,140 Z"
              fill="#003087" stroke="#0056b3" stroke-width="2" fill-opacity="0.5" />
          </svg>

          <div class="solar-panels-pin solar-panels-p-eleswaram">
            <div class="solar-panels-pin-pulse"></div>
            <div class="solar-panels-pin-dot"></div>
            <div class="solar-panels-pin-tag">Eleswaram</div>
          </div>
          <div class="solar-panels-pin solar-panels-p-tuni">
            <div class="solar-panels-pin-pulse"></div>
            <div class="solar-panels-pin-dot"></div>
            <div class="solar-panels-pin-tag">Tuni</div>
          </div>
          <div class="solar-panels-pin solar-panels-p-kakinada">
            <div class="solar-panels-pin-pulse"></div>
            <div class="solar-panels-pin-dot"></div>
            <div class="solar-panels-pin-tag">Kakinada</div>
          </div>
          <div class="solar-panels-pin solar-panels-p-rajahmundry">
            <div class="solar-panels-pin-pulse"></div>
            <div class="solar-panels-pin-dot"></div>
            <div class="solar-panels-pin-tag">Rajahmundry</div>
          </div>
          <div class="solar-panels-pin solar-panels-p-gokavaram">
            <div class="solar-panels-pin-pulse"></div>
            <div class="solar-panels-pin-dot"></div>
            <div class="solar-panels-pin-tag">Gokavaram</div>
          </div>
          <div class="solar-panels-pin solar-panels-p-ravulapalem">
            <div class="solar-panels-pin-pulse"></div>
            <div class="solar-panels-pin-dot"></div>
            <div class="solar-panels-pin-tag">Ravulapalem</div>
          </div>
          <div class="solar-panels-pin solar-panels-p-ramachandrapuram">
            <div class="solar-panels-pin-pulse"></div>
            <div class="solar-panels-pin-dot"></div>
            <div class="solar-panels-pin-tag">Ramachandrapuram</div>
          </div>
          <div class="solar-panels-pin solar-panels-p-amalapuram">
            <div class="solar-panels-pin-pulse"></div>
            <div class="solar-panels-pin-dot"></div>
            <div class="solar-panels-pin-tag">Amalapuram</div>
          </div>
          <div class="solar-panels-pin solar-panels-p-razole">
            <div class="solar-panels-pin-pulse"></div>
            <div class="solar-panels-pin-dot"></div>
            <div class="solar-panels-pin-tag">Razole</div>
          </div>

          <div class="solar-panels-pin solar-panels-p-prathipadu">
            <div class="solar-panels-pin-pulse"></div>
            <div class="solar-panels-pin-dot"></div>
            <div class="solar-panels-pin-tag">Prathipadu</div>
          </div>
          <div class="solar-panels-pin solar-panels-p-jagampeta">
            <div class="solar-panels-pin-pulse"></div>
            <div class="solar-panels-pin-dot"></div>
            <div class="solar-panels-pin-tag">Jagampeta</div>
          </div>
          <div class="solar-panels-pin solar-panels-p-pithapuram">
            <div class="solar-panels-pin-pulse"></div>
            <div class="solar-panels-pin-dot"></div>
            <div class="solar-panels-pin-tag">Pithapuram</div>
          </div>
          <div class="solar-panels-pin solar-panels-p-pedapuram">
            <div class="solar-panels-pin-pulse"></div>
            <div class="solar-panels-pin-dot"></div>
            <div class="solar-panels-pin-tag">Pedapuram</div>
          </div>
          <div class="solar-panels-pin solar-panels-p-annavaram">
            <div class="solar-panels-pin-pulse"></div>
            <div class="solar-panels-pin-dot"></div>
            <div class="solar-panels-pin-tag">Annavaram</div>
          </div>
          <div class="solar-panels-pin solar-panels-p-yanam">
            <div class="solar-panels-pin-pulse"></div>
            <div class="solar-panels-pin-dot"></div>
            <div class="solar-panels-pin-tag">Yanam</div>
          </div>

          <div class="solar-panels-map-center">
            <div class="solar-panels-map-center-circle">
              <i class="fas fa-solar-panel"></i>
              <span>NABHAS<br>SOLAR</span>
            </div>
          </div>
        </div>


        <!-- LOCATION CARDS -->
        <div class="mt-5">
          <div class="d-flex align-items-center gap-3 mb-4">
            <div style="font-family:'Outfit',sans-serif; font-weight:800; font-size:1.05rem; color:#003087;">
              <i class="fas fa-map-marker-alt me-2" style="color:#00aaff;"></i>Service Locations
            </div>
            <!-- <div style="background:#e8f4fd; border-radius:50px; padding:4px 14px; font-family:'Outfit',sans-serif; font-weight:700; font-size:0.75rem; color:#0056b3;">
            9 Active Zones
          </div> -->
          </div>
          <div class="row g-3">

            <!-- Each card -->
            <div class="  col-md-6 col-lg-4 col-sm-6">
              <div class="solar-panels-loc-card">
                <div class="solar-panels-loc-icon"><i class="fas fa-map-marker-alt"></i></div>
                <div>
                  <div class="solar-panels-loc-name">Eleswaram</div>
                  <div class="solar-panels-loc-type">PM Surya Ghar &amp; Commercial</div>
                </div>
                <!-- <div class="solar-panels-loc-badge">Active</div> -->
              </div>
            </div>

            <div class="col-md-6 col-lg-4 col-sm-6">
              <div class="solar-panels-loc-card">
                <div class="solar-panels-loc-icon"><i class="fas fa-map-marker-alt"></i></div>
                <div>
                  <div class="solar-panels-loc-name">Tuni</div>
                  <div class="solar-panels-loc-type">PM Surya Ghar &amp; Commercial</div>
                </div>
                <!-- <div class="solar-panels-loc-badge">Active</div> -->
              </div>
            </div>

            <div class="col-md-6 col-lg-4 col-sm-6">
              <div class="solar-panels-loc-card">
                <div class="solar-panels-loc-icon"><i class="fas fa-map-marker-alt"></i></div>
                <div>
                  <div class="solar-panels-loc-name">Kakinada</div>
                  <div class="solar-panels-loc-type">PM Surya Ghar &amp; Commercial</div>
                </div>
                <!-- <div class="solar-panels-loc-badge">Active</div> -->
              </div>
            </div>

            <div class="col-md-6 col-lg-4 col-sm-6">
              <div class="solar-panels-loc-card">
                <div class="solar-panels-loc-icon"><i class="fas fa-map-marker-alt"></i></div>
                <div>
                  <div class="solar-panels-loc-name">Rajahmundry</div>
                  <div class="solar-panels-loc-type">PM Surya Ghar &amp; Commercial</div>
                </div>
                <!-- <div class="solar-panels-loc-badge">Active</div> -->
              </div>
            </div>

            <div class="col-md-6 col-lg-4 col-sm-6">
              <div class="solar-panels-loc-card">
                <div class="solar-panels-loc-icon"><i class="fas fa-map-marker-alt"></i></div>
                <div>
                  <div class="solar-panels-loc-name">Gokavaram</div>
                  <div class="solar-panels-loc-type">PM Surya Ghar &amp; Commercial</div>
                </div>
                <!-- <div class="solar-panels-loc-badge">Active</div> -->
              </div>
            </div>

            <div class="col-md-6 col-lg-4 col-sm-6">
              <div class="solar-panels-loc-card">
                <div class="solar-panels-loc-icon"><i class="fas fa-map-marker-alt"></i></div>
                <div>
                  <div class="solar-panels-loc-name">Ravulapalem</div>
                  <div class="solar-panels-loc-type">PM Surya Ghar &amp; Commercial</div>
                </div>
                <!-- <div class="solar-panels-loc-badge">Active</div> -->
              </div>
            </div>

            <div class="col-md-6 col-lg-4 col-sm-6">
              <div class="solar-panels-loc-card">
                <div class="solar-panels-loc-icon"><i class="fas fa-map-marker-alt"></i></div>
                <div>
                  <div class="solar-panels-loc-name">Ramachandrapuram</div>
                  <div class="solar-panels-loc-type">PM Surya Ghar &amp; Commercial</div>
                </div>
                <!-- <div class="solar-panels-loc-badge">Active</div> -->
              </div>
            </div>

            <div class="col-md-6 col-lg-4 col-sm-6">
              <div class="solar-panels-loc-card">
                <div class="solar-panels-loc-icon"><i class="fas fa-map-marker-alt"></i></div>
                <div>
                  <div class="solar-panels-loc-name">Amalapuram</div>
                  <div class="solar-panels-loc-type">PM Surya Ghar &amp; Commercial</div>
                </div>
                <!-- <div class="solar-panels-loc-badge">Active</div> -->
              </div>
            </div>

            <div class="col-md-6 col-lg-4 col-sm-6">
              <div class="solar-panels-loc-card">
                <div class="solar-panels-loc-icon"><i class="fas fa-map-marker-alt"></i></div>
                <div>
                  <div class="solar-panels-loc-name">Razole</div>
                  <div class="solar-panels-loc-type">PM Surya Ghar &amp; Commercial</div>
                </div>
                <!-- <div class="solar-panels-loc-badge">Active</div> -->
              </div>
            </div>

            <!-- newly add  -->
            <div class="col-md-6 col-lg-4 col-sm-6">
              <div class="solar-panels-loc-card">
                <div class="solar-panels-loc-icon"><i class="fas fa-map-marker-alt"></i></div>
                <div>
                  <div class="solar-panels-loc-name">Prathipadu</div>
                  <div class="solar-panels-loc-type">PM Surya Ghar &amp; Commercial</div>
                </div>
                <!-- <div class="solar-panels-loc-badge">Active</div> -->
              </div>
            </div>


            <div class="col-md-6 col-lg-4 col-sm-6">
              <div class="solar-panels-loc-card">
                <div class="solar-panels-loc-icon"><i class="fas fa-map-marker-alt"></i></div>
                <div>
                  <div class="solar-panels-loc-name">Jagampeta</div>
                  <div class="solar-panels-loc-type">PM Surya Ghar &amp; Commercial</div>
                </div>
                <!-- <div class="solar-panels-loc-badge">Active</div> -->
              </div>
            </div>

            <div class="col-md-6 col-lg-4 col-sm-6">
              <div class="solar-panels-loc-card">
                <div class="solar-panels-loc-icon"><i class="fas fa-map-marker-alt"></i></div>
                <div>
                  <div class="solar-panels-loc-name">Pithapuram</div>
                  <div class="solar-panels-loc-type">PM Surya Ghar &amp; Commercial</div>
                </div>
                <!-- <div class="solar-panels-loc-badge">Active</div> -->
              </div>
            </div>
            <div class="col-md-6 col-lg-4 col-sm-6">
              <div class="solar-panels-loc-card">
                <div class="solar-panels-loc-icon"><i class="fas fa-map-marker-alt"></i></div>
                <div>
                  <div class="solar-panels-loc-name">Pedapuram</div>
                  <div class="solar-panels-loc-type">PM Surya Ghar &amp; Commercial</div>
                </div>
                <!-- <div class="solar-panels-loc-badge">Active</div> -->
              </div>
            </div>
            <div class="col-md-6 col-lg-4 col-sm-6">
              <div class="solar-panels-loc-card">
                <div class="solar-panels-loc-icon"><i class="fas fa-map-marker-alt"></i></div>
                <div>
                  <div class="solar-panels-loc-name">Annavaram</div>
                  <div class="solar-panels-loc-type">PM Surya Ghar &amp; Commercial</div>
                </div>
                <!-- <div class="solar-panels-loc-badge">Active</div> -->
              </div>
            </div>

            <div class="col-md-6 col-lg-4 col-sm-6">
              <div class="solar-panels-loc-card">
                <div class="solar-panels-loc-icon"><i class="fas fa-map-marker-alt"></i></div>
                <div>
                  <div class="solar-panels-loc-name">Yanam</div>
                  <div class="solar-panels-loc-type">PM Surya Ghar &amp; Commercial</div>
                </div>
                <!-- <div class="solar-panels-loc-badge">Active</div> -->
              </div>
            </div>






          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CONTACT SECTION -->
  <!-- <section class="solar-panels-contact-section">
  <div class="container">
    <div class="text-center mb-5">
      <div class="solar-panels-section-eyebrow"><i class="fas fa-paper-plane me-1"></i>Reach Out</div>
      <h2 class="solar-panels-section-title">Get in Touch</h2>
      <div class="solar-panels-section-bar mx-auto"></div>
    </div>

    <div class="row g-4 justify-content-center">
      <div class="col-md-4 col-sm-8">
        <div class="solar-panels-contact-card">
          <div class="solar-panels-contact-icon-wrap">
            <i class="fas fa-phone solar-panels-contact-icon"></i>
          </div>
          <div class="solar-panels-contact-title">Phone</div>
          <p class="solar-panels-contact-text">Call us for a free consultation and site assessment anytime.</p>
          <a href="tel:+91" class="solar-panels-contact-link">
            <i class="fas fa-phone me-1"></i> Contact Us
          </a>
        </div>
      </div>
      <div class="col-md-4 col-sm-8">
        <div class="solar-panels-contact-card">
          <div class="solar-panels-contact-icon-wrap">
            <i class="fas fa-envelope solar-panels-contact-icon"></i>
          </div>
          <div class="solar-panels-contact-title">Email</div>
          <p class="solar-panels-contact-text">Send us your requirements and we'll respond promptly.</p>
          <a href="mailto:info@nabhassolar.com" class="solar-panels-contact-link">
            info@nabhassolar.com
          </a>
        </div>
      </div>
      <div class="col-md-4 col-sm-8">
        <div class="solar-panels-contact-card">
          <div class="solar-panels-contact-icon-wrap">
            <i class="fas fa-map-marked-alt solar-panels-contact-icon"></i>
          </div>
          <div class="solar-panels-contact-title">Service Area</div>
          <p class="solar-panels-contact-text">Serving East &amp; West Godavari districts of Andhra Pradesh.</p>
          <span class="solar-panels-contact-link" style="cursor:default;">
            <i class="fas fa-location-dot me-1"></i> Andhra Pradesh, India
          </span>
        </div>
      </div>
    </div>

   
    <div class="solar-panels-cta">
      <h3 class="solar-panels-cta-title">Ready to Go Solar in Your Area?</h3>
      <p class="solar-panels-cta-sub">Contact us today for a FREE site survey &amp; customized solar proposal</p>
      <div class="d-flex justify-content-center gap-3 flex-wrap">
        <a href="pm-surya-ghar.html" class="solar-panels-btn-primary">
          <i class="fas fa-sun me-2"></i>About us 
        </a>
        <a href="contact.html" class="solar-panels-btn-outline">
          <i class="fas fa-calculator me-2"></i>Contact us 
        </a>
      </div>
    </div>
  </div>
</section> -->


  <!-- <section class="active_zone-section">
    <div class="container text-center">

      <h2 class="active_zone-title">Active service location (active zones)</h2>
      <div class="active_zone-underline"></div>

      <div class="row g-4 justify-content-center">
        <div class="col-6 col-md-4 col-lg-2">
          <div class="active_zone-card">
            <i class="bi bi-geo-alt-fill active_zone-icon"></i>
            <p class="active_zone-name">Prathipadu</p>
          </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2">
          <div class="active_zone-card">
            <i class="bi bi-geo-alt-fill active_zone-icon"></i>
            <p class="active_zone-name">Jagampeta</p>
          </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2">
          <div class="active_zone-card">
            <i class="bi bi-geo-alt-fill active_zone-icon"></i>
            <p class="active_zone-name">Pithapuram</p>
          </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2">
          <div class="active_zone-card">
            <i class="bi bi-geo-alt-fill active_zone-icon"></i>
            <p class="active_zone-name">Pedapuram</p>
          </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2">
          <div class="active_zone-card">
            <i class="bi bi-geo-alt-fill active_zone-icon"></i>
            <p class="active_zone-name">Annavaram</p>
          </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2">
          <div class="active_zone-card">
            <i class="bi bi-geo-alt-fill active_zone-icon"></i>
            <p class="active_zone-name">Yanam</p>
          </div>
        </div>

      </div>
    </div>
  </section> -->


  <?php include 'footer.php'; ?>