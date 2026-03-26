<?php include 'navbar.php'; ?>

<img src="./assets/img/3.png" alt="" class="img-fluid">

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nabhas Solar – Happy Customers</title>


</head>

<body>

  <section id="solar-review-testimonials">

    <div class="solar-review-testi-bg-orb solar-review-orb-a"></div>
    <div class="solar-review-testi-bg-orb solar-review-orb-b"></div>

    <div class="container position-relative" style="z-index:1;">

      <div class="text-center mb-5 solar-review-fade-up">

        <div class="solar-review-section-tag">
          <i class="bi bi-emoji-smile-fill"></i> Happy Customers
        </div>

        <h2 class="solar-review-section-title">
          What Our <span>Clients Say</span>
        </h2>

        <div class="solar-review-accent-line"></div>

        <div class="solar-review-counter-badge">
          <div class="solar-review-cb-icon">
            <i class="bi bi-people-fill"></i>
          </div>
          <div class="solar-review-cb-text">
            <strong>300+</strong>Happy Customers 
          </div>
        </div>

      </div>

      <div class="solar-review-testi-slider-outer solar-review-fade-up">

        <div class="solar-review-testi-track" id="solar-review-track">

          <!-- cards -->

          <div class="solar-review-testi-card">
            <span class="solar-review-testi-quote-mark">"</span>
            <p class="solar-review-testi-text">We installed a solar roof for our office building, and the results are excellent. Our monthly electricity bills have reduced significantly, and power supply is much more stable now. The installation was smooth and professional. A smart investment for any office looking to cut costs.</p>
            <div class="solar-review-testi-author">
              <div class="solar-review-testi-avatar">SK</div>
              <div>
                <div class="solar-review-testi-name">Srinivas Kovvur</div>
                <div class="solar-review-testi-location">Kovvur</div>
              </div>
            </div>
          </div>

          <div class="solar-review-testi-card">
            <span class="solar-review-testi-quote-mark">"</span>
            <p class="solar-review-testi-text">I decided to install solar roofing for my home, and I'm extremely happy with the outcome. My electricity bills have dropped noticeably, leading to real monthly savings It feels good to use clean energy while reducing expenses. Highly satisfied with the decision.</p>
            <div class="solar-review-testi-author">
              <div class="solar-review-testi-avatar">YD</div>
              <div>
                <div class="solar-review-testi-name">Y. Dhanalakshmi</div>
                <div class="solar-review-testi-location">Kakinada</div>
              </div>
            </div>
          </div>

          <div class="solar-review-testi-card">
            <span class="solar-review-testi-quote-mark">"</span>
            <p class="solar-review-testi-text">Getting a solar roof installed at our home was one of the best decisions we made. Our power bills have come down drastically, and we feel good about using renewable energy. The system works perfectly, and the team explained everything clearly</p>
            <div class="solar-review-testi-author">
              <div class="solar-review-testi-avatar">RR</div>
              <div>
                <div class="solar-review-testi-name">Rama Thota Ramana Rao</div>
                <div class="solar-review-testi-location">Kovvuru</div>
              </div>
            </div>
          </div>

          <div class="solar-review-testi-card">
            <span class="solar-review-testi-quote-mark">"</span>
            <p class="solar-review-testi-text">We installed a solar roof for our home to manage rising electricity costs. The reduction in power bills has been impressive, and it has improved our overall operational efficiency. Reliable installation and great long-term benefits.</p>
            <div class="solar-review-testi-author">
              <div class="solar-review-testi-avatar">DV</div>
              <div>
                <div class="solar-review-testi-name">D. Veeraju</div>
                <div class="solar-review-testi-location">Gorripudi</div>
              </div>
            </div>
          </div>

          <div class="solar-review-testi-card">
            <span class="solar-review-testi-quote-mark">"</span>
            <p class="solar-review-testi-text">The solar roof installation for our individual home connection has exceeded expectations. Electricity costs are much lower now, and the return on investment is clearly visible. Excellent service, timely execution, and noticeable savings from the very first month.</p>
            <div class="solar-review-testi-author">
              <div class="solar-review-testi-avatar">AR</div>
              <div>
                <div class="solar-review-testi-name">Akula Ratna Kumari</div>
                <div class="solar-review-testi-location">Amalapuram</div>
              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="solar-review-testi-progress solar-review-fade-up">
        <div class="solar-review-testi-progress-fill" id="solar-review-progress"></div>
      </div>

      <div class="solar-review-testi-nav solar-review-fade-up">
        <button class="btn btn-outline-light" id="solar-review-prev"><i class="bi bi-arrow-left"></i></button>
        <div id="solar-review-dots" style="display:flex;gap:8px;"></div>
        <button class="btn btn-outline-light" id="solar-review-next"><i class="bi bi-arrow-right"></i></button>
      </div>

    </div>
  </section>

  <script>
    const track = document.getElementById('solar-review-track');
    const prevBtn = document.getElementById('solar-review-prev');
    const nextBtn = document.getElementById('solar-review-next');
    const dotWrap = document.getElementById('solar-review-dots');
    const progFill = document.getElementById('solar-review-progress');

    let cards = Array.from(track.querySelectorAll('.solar-review-testi-card'));
    const originalCount = cards.length;

    cards.forEach(card => {
      const cloneBefore = card.cloneNode(true);
      const cloneAfter = card.cloneNode(true);
      track.appendChild(cloneAfter);
      track.insertBefore(cloneBefore, track.firstChild);
    });

    let current = originalCount;
    let perView = 3;
    const gap = 24;
    let isTransitioning = false;

    function updateParams() {
      if (window.innerWidth <= 575) perView = 1;
      else if (window.innerWidth <= 991) perView = 2;
      else perView = 3;
    }

    function getCardWidth() {
      return (track.parentElement.offsetWidth - gap * (perView - 1)) / perView;
    }

    function render(animate = true) {

      const cardW = getCardWidth();
      const allCards = track.querySelectorAll('.solar-review-testi-card');

      allCards.forEach(c => c.style.flex = `0 0 ${cardW}px`);

      track.style.transition = animate ? 'transform 0.5s ease' : 'none';

      const offset = current * (cardW + gap);
      track.style.transform = `translateX(-${offset}px)`;

      const activeIndex = current % originalCount;
      updateDots(activeIndex);

      progFill.style.width = ((activeIndex + 1) / originalCount * 100) + '%';
    }

    function updateDots(idx) {

      dotWrap.innerHTML = '';

      for (let i = 0; i < originalCount; i++) {

        const d = document.createElement('div');

        d.className = 'solar-review-dot' + (i === idx ? ' active' : '');

        dotWrap.appendChild(d);

      }

    }

    track.addEventListener('transitionend', () => {

      isTransitioning = false;

      if (current >= originalCount * 2) {
        current = originalCount;
        render(false);
      }

      if (current < originalCount) {
        current = originalCount * 2 - 1;
        render(false);
      }

    });

    function moveNext() {
      if (isTransitioning) return;
      isTransitioning = true;
      current++;
      render();
    }

    function movePrev() {
      if (isTransitioning) return;
      isTransitioning = true;
      current--;
      render();
    }

    nextBtn.addEventListener('click', moveNext);
    prevBtn.addEventListener('click', movePrev);

    window.addEventListener('resize', () => {
      updateParams();
      render(false);
    });

    setInterval(moveNext, 4000);

    const obs = new IntersectionObserver(entries => {
      entries.forEach(e => {
        if (e.isIntersecting) e.target.classList.add('visible');
      });
    }, {
      threshold: 0.1
    });

    document.querySelectorAll('.solar-review-fade-up').forEach(el => obs.observe(el));

    updateParams();
    render(false);
  </script>

<?php include 'footer.php' ; ?>