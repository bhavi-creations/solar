<?php include 'navbar.php'; ?>


<section class="gallery-new-section-wrapper">
  <div class="about-new-section-overlay">
    <div class="container h-100 d-flex align-items-center justify-content-center">
      <div class="row w-100">
        <div class="col-12 text-center text-white">
          <h1 class="about-new-section-title fw-bold">Our Projects</h1>
          <div class="about-new-section-divider mx-auto"></div>
          <!-- <p class="about-new-section-description fs-5 mt-3">
            Explore our completed solar installations across residential, commercial, and industrial sectors
          </p> -->
        </div>
      </div>
    </div>
  </div>
</section>








<style>
  /* ── Section ── */
  .gallery_section {
    padding: 80px 0 100px;
    background-color: #f5f2ee;
  }

  .gallery_section .section-label {
    font-family: 'DM Sans', sans-serif;
    font-size: 11px;
    font-weight: 500;
    letter-spacing: 4px;
    text-transform: uppercase;
    color: #b07d4e;
    margin-bottom: 10px;
  }

  .gallery_section .section-heading {
    font-family: 'Playfair Display', serif;
    font-size: clamp(2rem, 5vw, 3.4rem);
    font-weight: 700;
    color: #1a1a1a;
    line-height: 1.15;
    margin-bottom: 14px;
  }

  .gallery_section .section-divider {
    width: 60px;
    height: 3px;
    background-color: #b07d4e;
    border: none;
    margin: 0 auto 48px;
  }

  /* ── Tabs ── */
  .gallery_section .nav-tabs {
    border-bottom: 2px solid #ddd5c8;
    gap: 6px;
    justify-content: center;
    margin-bottom: 48px;
  }

  .gallery_section .nav-tabs .nav-link {
    font-family: 'DM Sans', sans-serif;
    font-size: 13px;
    font-weight: 500;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    color: #ffffff !important;
    border: none;
    border-bottom: 3px solid #0b1f3a;
    border-radius: 0;
    padding: 10px 28px;
    /* background: transparent; */
    background-color: #b07d4e;
    transition: color 0.25s, border-color 0.25s;
    border-radius: 10px;
  }

  .gallery_section .nav-tabs .nav-link:hover {
    color: #b07d4e;
  }

  .gallery_section .nav-tabs .nav-link.active {
    color: #b07d4e;
    border-bottom: 3px solid #b07d4e;
    background: #0b1f3a;
    border-radius: 10px;
  }

  /* ── Project Cards ── */
  .project-card {
    position: relative;
    overflow: hidden;
    border-radius: 4px;
    cursor: pointer;
    background-color: #e8e1d8;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: box-shadow 0.3s ease, transform 0.3s ease;
  }

  .project-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 36px rgba(0, 0, 0, 0.15);
  }

  .project-card img {
    width: 100%;
    height: 260px;
    object-fit: cover;
    display: block;
    transition: transform 0.5s ease;
  }

  .project-card:hover img {
    transform: scale(1.06);
  }

  /* ── Hover Overlay (Popup) ── */
  .project-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(26, 18, 10, 0.88) 0%, rgba(26, 18, 10, 0.3) 60%, transparent 100%);
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: 24px 20px;
    opacity: 0;
    transition: opacity 0.35s ease;
    pointer-events: none;
  }

  .project-card:hover .project-overlay {
    opacity: 1;
  }

  .project-overlay .proj-tag {
    font-size: 10px;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: #b07d4e;
    margin-bottom: 6px;
  }

  .project-overlay .proj-title {
    font-family: 'Playfair Display', serif;
    font-size: 1.2rem;
    color: #fff;
    font-weight: 600;
    margin-bottom: 8px;
  }

  .project-overlay .proj-desc {
    font-size: 13px;
    color: #ffffff;
    line-height: 1.5;
    margin-bottom: 14px;
  }

  .project-overlay .proj-view-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 11px;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: #fff;
    border: 1px solid rgba(255, 255, 255, 0.5);
    padding: 7px 16px;
    border-radius: 2px;
    background: transparent;
    pointer-events: all;
    transition: background 0.2s, border-color 0.2s;
    width: fit-content;
  }

  .project-overlay .proj-view-btn:hover {
    background: #b07d4e;
    border-color: #b07d4e;
  }

  /* ── Modal ── */
  .project-modal .modal-dialog {
    max-width: 860px;
  }

  .project-modal .modal-content {
    border-radius: 6px;
    border: none;
    overflow: hidden;
    background-color: #fff;
  }

  .project-modal .modal-header {
    background-color: #1a1a1a;
    border: none;
    padding: 18px 28px;
  }

  .project-modal .modal-title {
    font-family: 'Playfair Display', serif;
    font-size: 1.4rem;
    color: #fff;
  }

  .project-modal .modal-header .btn-close {
    filter: invert(1);
    opacity: 0.8;
  }

  .project-modal .modal-body {
    padding: 0;
  }

  .project-modal .modal-body img {
    width: 100%;
    max-height: 520px;
    object-fit: cover;
    display: block;
  }

  .project-modal .modal-footer {
    background-color: #f9f7f4;
    border-top: 1px solid #eee;
    padding: 16px 28px;
  }

  .project-modal .modal-subtitle {
    font-size: 13px;
    color: #888;
    letter-spacing: 1px;
    text-transform: uppercase;
  }

  .project-modal .modal-desc {
    font-size: 15px;
    color: #444;
    margin-top: 6px;
  }

  /* ── Fade-in animation ── */
  .tab-pane .project-card {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeUp 0.5s ease forwards;
  }

  .tab-pane.show.active .project-card:nth-child(1) {
    animation-delay: 0.05s;
  }

  .tab-pane.show.active .project-card:nth-child(2) {
    animation-delay: 0.15s;
  }

  .tab-pane.show.active .project-card:nth-child(3) {
    animation-delay: 0.25s;
  }

  .tab-pane.show.active .project-card:nth-child(4) {
    animation-delay: 0.35s;
  }

  .tab-pane.show.active .project-card:nth-child(5) {
    animation-delay: 0.45s;
  }

  .tab-pane.show.active .project-card:nth-child(6) {
    animation-delay: 0.55s;
  }

  @keyframes fadeUp {
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
</style>
</head>

<body>

  <!-- ══════════════════════════════════════════════
     GALLERY SECTION
══════════════════════════════════════════════ -->
  <section class="gallery_section">
    <div class="container">


      <!-- <div class="text-center mb-2">

        <h2 class="section-heading">Our Projects</h2>
        <hr class="section-divider" />
      </div> -->

      <!-- Tabs -->
      <ul class="nav nav-tabs" id="projectTabs" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="residential-tab" data-bs-toggle="tab"
            data-bs-target="#residential" type="button" role="tab">
            Residential Projects
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="commercial-tab" data-bs-toggle="tab"
            data-bs-target="#commercial" type="button" role="tab">
            Commercial Projects
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="industrial-tab" data-bs-toggle="tab"
            data-bs-target="#industrial" type="button" role="tab">
            Industrial Projects
          </button>
        </li>
      </ul>

      <!-- Tab Content -->
      <div class="tab-content" id="projectTabsContent">

        <!-- ── Residential ── -->
        <div class="tab-pane fade show active" id="residential" role="tabpanel">
          <div class="row g-4">

            <!-- <div class="col-md-4 col-sm-6">
              <div class="project-card"
                data-bs-toggle="modal" data-bs-target="#projectModal"
                data-img="./assets/img/r-1.png"
                data-title="Residential" data-tag="Residential" data-desc="1KW Solar Pannel.">
                <img src="./assets/img/r-1.png" alt="Skyline Villa" />
                <div class="project-overlay">
                  <p class="proj-tag">Residential</p>
                  <p class="proj-title">Residential</p>
                  <p class="proj-desc">1KW Solar Pannel.</p>
                  <span class="proj-view-btn">View Project ↗</span>
                </div>
              </div>
            </div> -->

            <div class="col-md-4 col-sm-6">
              <div class="project-card"
                data-bs-toggle="modal" data-bs-target="#projectModal"
                data-img="./assets/img/r-3.png"
                data-title="commercial" data-tag="Residential" data-desc="3kw Solar Pannel">
                <img src="./assets/img/r-3.png" alt="Urban Nest" />
                <div class="project-overlay">
                  <!-- <p class="proj-tag">Residential</p> -->
                  <p class="proj-title">Residential</p>
                  <p class="proj-desc">3kw Solar Pannel</p>
                  <span class="proj-view-btn">View Project ↗</span>
                </div>
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="project-card"
                data-bs-toggle="modal" data-bs-target="#projectModal"
                data-img="./assets/img/r-2.png"
                data-title="Residential" data-tag="Residential" data-desc="4KW Solar Pannel.">
                <img src="./assets/img/r-2.png" alt="Garden Retreat" />
                <div class="project-overlay">
                  <p class="proj-tag">Residential</p>
                  <p class="proj-title">Residential</p>
                  <p class="proj-desc">4KW Solar Pannel.</p>
                  <span class="proj-view-btn">View Project ↗</span>
                </div>
              </div>
            </div>




            <div class="col-md-4 col-sm-6">
              <div class="project-card"
                data-bs-toggle="modal" data-bs-target="#projectModal"
                data-img="./assets/img/c_2.png"
                data-title="Residential" data-tag="Residential" data-desc="Avani Heights 1KW - 5KW Solar (SITC) Kakinada.">
                <img src="./assets/img/c_2.png" alt="Residential" />
                <div class="project-overlay">
                  <!-- <p class="proj-tag">Commercial</p> -->
                  <p class="proj-title">Residential</p>
                  <p class="proj-desc">Avani Heights 1KW - 5KW Solar (SITC) Kakinada</p>
                  <span class="proj-view-btn">View Project ↗</span>
                </div>
              </div>
            </div>

          </div>
        </div><!-- /residential -->

        <!-- ── Commercial ── -->
        <div class="tab-pane fade" id="commercial" role="tabpanel">
          <div class="row g-4">

            <div class="col-md-4 col-sm-6">
              <div class="project-card"
                data-bs-toggle="modal" data-bs-target="#projectModal"
                data-img="./assets/img/rotary.png"
                data-title="Commercial" data-tag="Commercial" data-desc="9KW old age Home (Rotary Club).">
                <img src="./assets/img/rotary.png" alt="Apex Tower" />
                <div class="project-overlay">
                  <!-- <p class="proj-tag">Commercial</p> -->
                  <p class="proj-title">Commercial</p>
                  <p class="proj-desc">9KW old age Home (Rotary Club).</p>
                  <span class="proj-view-btn">View Project ↗</span>
                </div>
              </div>
            </div>





            <!-- <div class="col-md-4 col-sm-6">
              <div class="project-card"
                data-bs-toggle="modal" data-bs-target="#projectModal"
                data-img="./assets/img/r-3.png"
                data-title="Urban Nest" data-tag="Residential" data-desc="A contemporary row house designed for urban living with efficient space planning and modern interiors.">
                <img src="./assets/img/r-3.png" alt="Urban Nest" />
                <div class="project-overlay">
                  <p class="proj-tag">Residential</p>
                  <p class="proj-title">Urban Nest</p>
                  <p class="proj-desc">Contemporary row house with efficient space planning.</p>
                  <span class="proj-view-btn">View Project ↗</span>
                </div>
              </div>
            </div> -->

            <!-- <div class="col-md-4 col-sm-6">
            <div class="project-card"
              data-bs-toggle="modal" data-bs-target="#projectModal"
              data-img="./assets/img/c_2.png"
              data-title="Business Hub" data-tag="Commercial" data-desc="A co-working and business hub designed for startups with flexible floor plates and collaborative zones.">
              <img src="./assets/img/c_2.png" alt="Business Hub"/>
              <div class="project-overlay">
                <p class="proj-tag">Commercial</p>
                <p class="proj-title">Business Hub</p>
                <p class="proj-desc">Co-working hub with flexible layouts for startups.</p>
                <span class="proj-view-btn">View Project ↗</span>
              </div>
            </div>
          </div> -->

          </div>
        </div><!-- /commercial -->

        <!-- ── Industrial ── -->
        <div class="tab-pane fade" id="industrial" role="tabpanel">
          <div class="row g-4">

            <!-- <div class="col-md-4 col-sm-6">
            <div class="project-card"
              data-bs-toggle="modal" data-bs-target="#projectModal"
              data-img="./assets/img/i_1.png"
              data-title="TechPark Warehouse" data-tag="Industrial" data-desc="A 200,000 sq ft automated warehouse with advanced racking systems and dock-level loading bays.">
              <img src="./assets/img/i_1.png" alt="TechPark Warehouse"/>
              <div class="project-overlay">
                <p class="proj-tag">Industrial</p>
                <p class="proj-title">TechPark Warehouse</p>
                <p class="proj-desc">200K sq ft automated warehouse with dock-level loading.</p>
                <span class="proj-view-btn">View Project ↗</span>
              </div>
            </div>
          </div> -->

            <div class="col-md-4 col-sm-6">
              <div class="project-card"
                data-bs-toggle="modal" data-bs-target="#projectModal"
                data-img="./assets/img/i_1.png"
                data-title="Industrial" data-tag="Industrial" data-desc="Industrial Solar Power Project (200kw).">
                <img src="./assets/img/i_1.png" alt="Power Grid Station" />
                <div class="project-overlay">
                  <!-- <p class="proj-tag">Industrial</p> -->
                  <p class="proj-title">Industrial</p>
                  <p class="proj-desc">Industrial Solar Power Project (200kw)</p>
                  <span class="proj-view-btn">View Project ↗</span>
                </div>
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="project-card"
                data-bs-toggle="modal" data-bs-target="#projectModal"
                data-img="./assets/img/i_2.png"
                data-title="Industrial" data-tag="Industrial" data-desc="Elite Edible Oil And Fuel Pvt.Ltd (200KW).">
                <img src="./assets/img/i_2.png" alt="Pharma Plant" />
                <div class="project-overlay">
                  <!-- <p class="proj-tag">Industrial</p> -->
                  <p class="proj-title">Industrial</p>
                  <p class="proj-desc">Elite Edible Oil And Fuel Pvt.Ltd (200KW)</p>
                  <span class="proj-view-btn">View Project ↗</span>
                </div>
              </div>
            </div>

          </div>
        </div><!-- /industrial -->

      </div><!-- /tab-content -->
    </div>
  </section>


  <!-- ══════════════════════════════════════════════
     PROJECT MODAL
══════════════════════════════════════════════ -->
  <div class="modal fade project-modal" id="projectModal" tabindex="-1" aria-labelledby="projectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="projectModalLabel">Project Name</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <img id="modalImage" src="" alt="Project Image" />
        </div>

        <div class="modal-footer d-block">
          <p class="modal-subtitle" id="modalTag"></p>
          <p class="modal-desc" id="modalDesc"></p>
        </div>

      </div>
    </div>
  </div>


  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // Populate modal with card data when triggered
    const projectModal = document.getElementById('projectModal');

    projectModal.addEventListener('show.bs.modal', function(event) {
      const card = event.relatedTarget;
      const img = card.getAttribute('data-img');
      const title = card.getAttribute('data-title');
      const tag = card.getAttribute('data-tag');
      const desc = card.getAttribute('data-desc');

      projectModal.querySelector('#projectModalLabel').textContent = title;
      projectModal.querySelector('#modalImage').src = img;
      projectModal.querySelector('#modalImage').alt = title;
      projectModal.querySelector('#modalTag').textContent = tag;
      projectModal.querySelector('#modalDesc').textContent = desc;
    });
  </script>

  <?php include 'footer.php'; ?>