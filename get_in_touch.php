<style>
  /* ── BLACK & WHITE DESIGN TOKENS ─────────────────────────── */
  :root {
    --text-main: #111827;
    --text-muted: #6B7280;
    --bg-card: #ffffff;
    --border-color: #e5e7eb;
    --accent-black: #000000;
    --input-bg: #f9fafb;
  }

  .quote_section {
    /* padding: 6rem 0; */
    /* background-color: #fcfcfc; */
    font-family: 'DM Sans', sans-serif;
  }

  /* ── CONTACT INFO SIDE ───────────────────────────────────── */
  .contact_info_wrapper {
    padding-right: 2rem;
  }

  .contact_info_wrapper h1 {
    font-family: 'Syne', sans-serif;
    font-weight: 800;
    font-size: 3rem;
    color: var(--accent-black);
    margin-bottom: 1.5rem;
  }

  .contact_item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    margin-bottom: 2rem;
  }

  .contact_item i {
    font-size: 1.5rem;
    color: var(--accent-black);
    background: #f3f4f6;
    padding: 12px;
    border-radius: 12px;
  }

  .contact_item div h5 {
    margin: 0;
    font-weight: 700;
    font-size: 1.1rem;
    color: var(--accent-black);
  }

  .contact_item div p {
    margin: 0;
    color: var(--text-muted);
    font-size: 0.95rem;
  }

  /* ── FORM CARD ───────────────────────────────────────────── */
  .free_quotes__card {
    background: var(--bg-card);
    border: 1px solid var(--border-color);
    font-weight: 600;
    border-radius: 24px;
    padding: 2rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
  }

  .free_quotes__label {
    display: block;
    font-size: .85rem;
    font-weight: 600;
    color: var(--accent-black);
    margin-bottom: .5rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .free_quotes__input,
  .free_quotes__textarea {
    width: 100%;
    background: var(--input-bg);
    border: 1px solid var(--border-color);
    border-radius: 12px;
    padding: .8rem 1rem;
    transition: all 0.3s;
    outline: none;
  }

  .free_quotes__input:focus {
    border-color: var(--accent-black);
    background: #fff;
    box-shadow: 0 0 0 4px rgba(0, 0, 0, 0.05);
  }

  /* Radio/Grid Styling */
  .free_quotes__radio-grid,
  .free_quotes__prop-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
    gap: .5rem;
  }

  .free_quotes__radio-grid input,
  .free_quotes__prop-grid input {
    display: none;
  }

  .free_quotes__radio-grid label,
  .free_quotes__prop-grid label {
    border: 1px solid var(--border-color);
    padding: .7rem;
    border-radius: 10px;
    text-align: center;
    cursor: pointer;
    font-size: .85rem;
    transition: 0.3s;
    background: var(--input-bg);
  }

  .free_quotes__radio-grid input:checked+label,
  .free_quotes__prop-grid input:checked+label {
    background: var(--accent-black);
    color: #fff;
    border-color: var(--accent-black);
  }

  .free_quotes__submit {
    width: 100%;
    background: var(--accent-black);
    color: #fff;
    border: none;
    padding: 1rem;
    border-radius: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: 0.3s;
    margin-top: 1rem;
  }

  .free_quotes__submit:hover {
    background: #333;
    transform: translateY(-2px);
  }

  @media (max-width: 991px) {
    .contact_info_wrapper {
      padding-right: 0;
      margin-bottom: 3rem;
    }

    .contact_info_wrapper h1 {
      font-size: 2.2rem;
    }
  }
</style>

<section class="quote_section">
  <div class="container">
    <div class="row align-items-center">

      <!-- <div class="col-lg-5">
        <div class="contact_info_wrapper">
          <h1>Get a <br>Free Quote</h1>
          <p class="mb-5 text-muted">Ready to switch to solar? Reach out to us for a personalized quote and expert guidance.</p>

          <div class="contact_item">
            <i class="bi bi-telephone-outbound"></i>
            <div>
              <h5>Call Us</h5>
              <p>+91 8341950894</p>
            </div>
          </div>

          <div class="contact_item">
            <i class="bi bi-envelope-at"></i>
            <div>
              <h5>Email Address</h5>
              <p>project@nabhasconstuctions.com</p>
            </div>
          </div>

          <div class="contact_item">
            <i class="bi bi-geo-alt"></i>
            <div>
              <h5>Our Location</h5>
              <p>70-7-2/4,2nd floor,road
                no.4,siddartha nagar,kakinada-533005</p>
            </div>
          </div>
        </div>
      </div> -->

      <div class="col-lg-12">
        <div class="free_quotes__card">
          <h1>Get a Free Quote</h1>
          <!-- <form action="appointmentform.php" method="post" id="freeQuoteForm">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="free_quotes__label">Full Name</label>
                                <input type="text" name="name" class="free_quotes__input" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="free_quotes__label">Mobile Number</label>
                                <input type="tel" name="mobile" class="free_quotes__input" placeholder="Mobile Number" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="free_quotes__label">Location</label>
                            <input type="text" name="location" class="free_quotes__input" placeholder="City / Area" required>
                        </div>

                        <div class="mb-3">
                            <label class="free_quotes__label">Monthly Electricity Bill</label>
                            <div class="free_quotes__radio-grid">
                                <input type="radio" name="bill" id="b1" value="<1000"><label for="b1">< ₹1000</label>
                                <input type="radio" name="bill" id="b1" value="1000–2000"><label for="b5">< ₹1000–2000</label>
                                <input type="radio" name="bill" id="b2" value="2000–3000"><label for="b2">₹2000–3000</label>
                                <input type="radio" name="bill" id="b3" value="3000–5000"><label for="b3">₹3000–5000</label>
                                <input type="radio" name="bill" id="b3" value="₹5000–10000"><label for="b6">₹5000–10000</label>
                                <input type="radio" name="bill" id="b4" value="> ₹10000"><label for="b4">> ₹10000</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="free_quotes__label">Property Type</label>
                            <div class="free_quotes__prop-grid">
                                <input type="radio" name="prop" id="p1" value="Resi"><label for="p1">Residential</label>
                                <input type="radio" name="prop" id="p2" value="Comm"><label for="p2">Commercial</label>
                                <input type="radio" name="prop" id="p3" value="Indus"><label for="p3">Industrial</label>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="free_quotes__label">Message (Optional)</label>
                            <textarea name="message" class="free_quotes__textarea" rows="2" placeholder="Tell us more..."></textarea>
                        </div>

                        <button type="submit" class="free_quotes__submit">Request Quote</button>
                    </form> -->

          <!-- <form action="appointmentform.php" method="post" id="freeQuoteForm"> -->




          <!-- <form action="appointmentform.php" method="post" id="freeQuoteForm">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="free_quotes__label">Full Name</label>
                <input type="text" name="name" class="free_quotes__input" placeholder="Your Name" required>
              </div>
              <div class="col-md-6 mb-3">
                <label class="free_quotes__label">Mobile Number</label>
                <input type="tel" name="mobile" class="free_quotes__input" placeholder="Mobile Number" required>
              </div>
            </div>

            <div class="mb-3">
              <label class="free_quotes__label">Location</label>
              <input type="text" name="location" class="free_quotes__input" placeholder="City / Area" required>
            </div>

            <div class="mb-3">
              <label class="free_quotes__label" for="bill_select">Monthly Electricity Bill</label>
              <select name="bill" id="bill_select" class="free_quotes__input" required>
                <option value="" selected disabled>Select Bill Range</option>
                <option value="<1000">Below ₹1,000</option>
                <option value="1000–2000">₹1,000 – ₹2,000</option>
                <option value="2000–3000">₹2,000 – ₹3,000</option>
                <option value="3000–5000">₹3,000 – ₹5,000</option>
                <option value="5000–10000">₹5,000 – ₹10,000</option>
                <option value=">10000">Above ₹10,000</option>
              </select>
            </div>

            <div class="mb-3">
              <label class="free_quotes__label" for="property_select">Property Type</label>
              <select name="property" id="property_select" class="free_quotes__input" required>
                <option value="" selected disabled>Select Property Type</option>
                <option value="Residential">Residential</option>
                <option value="Commercial">Commercial</option>
                <option value="Industrial">Industrial</option>
              </select>
            </div>

            <div class="mb-4">
              <label class="free_quotes__label">Message (Optional)</label>
              <textarea name="message" class="free_quotes__textarea" rows="2" placeholder="Tell us more about your requirements..."></textarea>
            </div>

            <button type="submit" class="free_quotes__submit">Request Quote</button>
          </form> -->




          <form method="post" id="freeQuoteForm">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="free_quotes__label">Full Name</label>
                <input type="text" name="name" class="free_quotes__input" placeholder="Your Name" required>
              </div>
              <div class="col-md-6 mb-3">
                <label class="free_quotes__label">Mobile Number</label>
                <input type="tel" name="mobile" class="free_quotes__input" placeholder="Mobile Number" required>
              </div>
            </div>

            <div class="mb-3">
              <label class="free_quotes__label">Location</label>
              <input type="text" name="location" class="free_quotes__input" placeholder="City / Area" required>
            </div>

            <div class="mb-3">
              <label class="free_quotes__label" for="bill_select">Monthly Electricity Bill</label>
              <select name="bill" id="bill_select" class="free_quotes__input" required>
                <option value="" selected disabled>Select Bill Range</option>
                <option value="<1000">Below ₹1,000</option>
                <option value="1000–2000">₹1,000 – ₹2,000</option>
                <option value="2000–3000">₹2,000 – ₹3,000</option>
                <option value="3000–5000">₹3,000 – ₹5,000</option>
                <option value="5000–10000">₹5,000 – ₹10,000</option>
                <option value=">10000">Above ₹10,000</option>
              </select>
            </div>

            <div class="mb-3">
              <label class="free_quotes__label" for="property_select">Property Type</label>
              <select name="property" id="property_select" class="free_quotes__input" required>
                <option value="" selected disabled>Select Property Type</option>
                <option value="Residential">Residential</option>
                <option value="Commercial">Commercial</option>
                <option value="Industrial">Industrial</option>
              </select>
            </div>

            <div class="mb-4">
              <label class="free_quotes__label">Message (Optional)</label>
              <textarea name="message" class="free_quotes__textarea" rows="2"
                placeholder="Tell us more about your requirements..."></textarea>
            </div>

            <button type="submit" class="free_quotes__submit">Request Quote</button>
          </form>

          

        </div>
      </div>
      <script>
        document.getElementById("freeQuoteForm").addEventListener("submit", function(e) {
          e.preventDefault();

          let formData = new FormData(this);

          fetch("appointmentform.php", {
              method: "POST",
              body: formData
            })
            .then(response => response.text())
            .then(data => {
              document.getElementById("quoteSuccessPopup").style.display = "block";
              document.getElementById("freeQuoteForm").reset();

              setTimeout(() => {
                document.getElementById("quoteSuccessPopup").style.display = "none";
              }, 3000);
            })
            
        });
      </script>
    </div>
  </div>
</section>