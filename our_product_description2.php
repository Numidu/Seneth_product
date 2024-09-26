<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Seneth Products</title>
    <?php require('inc/links.php'); ?>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css"
    />
    <style>
      .product-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      }

      .product-images img {
        max-width: 100%;
        margin-bottom: 10px;
      }

      .highlight {
        color: #f00;
        font-weight: bold;
      }

      .php-email-form {
        background-color: transparent;
        padding: 30px;
        margin-top: 30px;
      }

      @media (max-width: 575px) {
        .php-email-form {
          padding: 20px;
        }
      }

      .description-section {
        background-color: transparent;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 30px;
      }
      .description-section h4 {
        color: var(--accent-color);
        font-weight: bold;
        text-transform: uppercase;
      }
      .description-section hr {
        color: var(--accent-color);
        width: 150px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: auto;
      }
      .description-section p {
        margin-bottom: 1rem;
      }

      .php-email-form input[type="text"],
      .php-email-form input[type="email"],
      .php-email-form input[type="tel"],
      .php-email-form textarea {
        color: var(--default-color);
        background-color: color-mix(
          in srgb,
          var(--surface-color),
          transparent 50%
        );
        border-color: color-mix(in srgb, var(--default-color), transparent 80%);
        font-size: 14px;
        padding: 10px 15px;
        box-shadow: none;
        border-radius: 0;
      }

      .php-email-form input[type="text"]:focus,
      .php-email-form input[type="email"]:focus,
      .php-email-form input[type="tel"]:focus,
      .php-email-form textarea:focus {
        border-color: var(--accent-color);
      }

      .php-email-form input[type="text"]::placeholder,
      .php-email-form input[type="email"]::placeholder,
      .php-email-form input[type="tel"]::placeholder,
      .php-email-form textarea::placeholder {
        color: color-mix(in srgb, var(--default-color), transparent 70%);
      }

      .php-email-form button[type="submit"] {
        color: var(--contrast-color);
        background: var(--accent-color);
        border: 0;
        padding: 10px 30px;
        transition: 0.4s;
        border-radius: 50px;
      }

      .php-email-form button[type="submit"]:hover {
        background: color-mix(in srgb, var(--accent-color), transparent 20%);
      }
    </style>
  </head>

  <body class="index-page">
    <header id="header" class="header sticky-top">
      <div
        class="container position-relative d-flex align-items-center justify-content-between"
      >
        <a
          href="index.php"
          class="logo d-flex align-items-center me-auto me-xl-0"
        >
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="assets/img/logo.png" alt=""> -->
          <img src="assets/img/logo.png" alt="" />
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li>
              <a href="index.php">HOME<br /></a>
            </li>
            <li><a href="about.php">ABOUT US</a></li>
            <li class="dropdown">
              <a style="cursor: pointer" class="active"
                ><span>OUR PRODUCTS</span>
                <i class="bi bi-chevron-down toggle-dropdown"></i
              ></a>
              <ul>
                <li class="dropdown">
                  <a href="our_product1.php"
                    ><span>Frozen No Preservatives</span></a
                  >
                </li>
                <li class="dropdown">
                  <a href="our_product2.php"
                    ><span
                      >No Preservatives Nutritional Confectionaries</span
                    ></a
                  >
                </li>
                <li class="dropdown">
                  <a href="our_product3.php"
                    ><span>Organic No Preservatives</span></a
                  >
                </li>
              </ul>
            </li>
            <li><a href="contact.php">CONTACT</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
      </div>
    </header>
    <?php
include('connection/connection.php');

if (isset($_GET['id']) && isset($_GET['category'])) {
    $productId = intval($_GET['id']);
    $category = htmlspecialchars($_GET['category']);
    
    // Validate the category
    if ($category === 'NutritionalDetails') {
        // Query to fetch data from NutritionalDetails
        $sql = "
            SELECT 
                f.name, 
                f.image, 
                fd.appearance, 
                fd.flavour, 
                fd.texture, 
                fd.ingredient, 
                fd.category, 
                fd.tags 
            FROM 
                NutritionalDetails fd
            JOIN 
                nutritional f ON fd.id = f.id
            WHERE 
                fd.id = ?
        ";
        
        if ($stmt = $conn->prepare($sql)) { $stmt->bind_param("i", $productId);
    $stmt->execute(); $result = $stmt->get_result(); if ($result->num_rows > 0)
    { $row = $result->fetch_assoc(); 
    // Query to fetch additional details from NewTable2 
    $detailSql = "SELECT detail1, detail2, detail3 FROM NewTable2
    WHERE id = ?"; if ($detailStmt = $conn->prepare($detailSql)) {
    $detailStmt->bind_param("i", $productId); $detailStmt->execute();
    $detailResult = $detailStmt->get_result(); $detailRow =
    $detailResult->num_rows > 0 ? $detailResult->fetch_assoc() : null;
    $detailStmt->close(); } ?>

    <div class="container section-title-product text-left pb-0">
      <p class="text-start ps-3">
        <span class="description-title-product h2"
          ><?php echo htmlspecialchars($row['name']); ?></span
        >
      </p>
    </div>

    <div class="container my-3">
      <div class="row product-container">
        <!-- Product Images -->
        <div class="col-md-5 product-images d-flex justify-content-center align-items-center text-center">
          <img
            src="project/<?php echo htmlspecialchars($row['image']); ?>"
            alt="Product Image"
            class="img-fluid"
          />
        </div>

        <!-- Product Details -->
        <div class="col-md-7 product-details px-5">
          <h1 class="h4 mb-4 pt-5">
            <?php echo htmlspecialchars($row['name']); ?>
          </h1>
          <p>
            <strong>Appearance:</strong>
            <?php echo htmlspecialchars($row['appearance']); ?>
          </p>
          <p>
            <strong>Flavour:</strong>
            <?php echo htmlspecialchars($row['flavour']); ?>
          </p>
          <p>
            <strong>Texture:</strong>
            <?php echo htmlspecialchars($row['texture']); ?>
          </p>
          <p>
            <strong>Ingredient:</strong>
            <?php echo htmlspecialchars($row['ingredient']); ?>
          </p>
          <p class="highlight">
            No added sugars, colours, flavouring or preservatives
          </p>
          <p><strong>Country of Origin:</strong> Sri Lanka</p>
          <p>
            <strong>Category:</strong>
            <?php echo htmlspecialchars($row['category']); ?>
          </p>
          <p>
            <strong>Tags:</strong>
            <?php echo htmlspecialchars($row['tags']); ?>
          </p>
        </div>

        <!-- Description Section -->
        <div class="col-md-5">
          <div class="description-section">
            <hr class="text-center mt-5 mb-1 pb-0" />
            <h4 class="text-center my-0 py-0">Description</h4>
            <hr class="text-center mb-5 mt-1 pt-0" />
            <?php if ($detailRow): ?>
            <p><?php echo htmlspecialchars($detailRow['detail1']); ?></p>
            <p>
              <strong>Shelf life:</strong>
              <?php echo htmlspecialchars($detailRow['detail2']); ?>
            </p>
            <p>
              <strong>Packing:</strong>
              <?php echo htmlspecialchars($detailRow['detail3']); ?>
            </p>
            <?php else: ?>
            <p>No additional details available.</p>
            <?php endif; ?>
          </div>
        </div>

        <!-- Contact Form -->
        <div class="col-md-7">
          <form
            action="project/Adddatabase.php"
            method="post"
            class="php-email-form"
            id="phone-form"
          >
            <div class="row gy-4">
              <!-- First Name -->
              <div class="col-md-6">
                <input
                  type="text"
                  name="fname"
                  class="form-control"
                  placeholder="First Name"
                  required=""
                />
              </div>
              <!-- Last Name -->
              <div class="col-md-6">
                <input
                  type="text"
                  name="sname"
                  class="form-control"
                  placeholder="Last Name"
                  required=""
                />
              </div>

              <!-- Country Select -->
              <div class="col-md-12">
                <select
                  name="country"
                  type="text"
                  class="form-control country-select"
                  required
                >
                  <option value="" disabled selected>Your Country</option>
                  <option value="Afghanistan">Afghanistan</option>
                  <option value="Albania">Albania</option>
                  <option value="Algeria">Algeria</option>
                  <option value="Andorra">Andorra</option>
                  <option value="Angola">Angola</option>
                  <option value="Argentina">Argentina</option>
                  <option value="Armenia">Armenia</option>
                  <option value="Australia">Australia</option>
                  <option value="Austria">Austria</option>
                  <option value="Azerbaijan">Azerbaijan</option>
                  <option value="Bahamas">Bahamas</option>
                  <option value="Bahrain">Bahrain</option>
                  <option value="Bangladesh">Bangladesh</option>
                  <option value="Barbados">Barbados</option>
                  <option value="Belarus">Belarus</option>
                  <option value="Belgium">Belgium</option>
                  <option value="Belize">Belize</option>
                  <option value="Benin">Benin</option>
                  <option value="Bhutan">Bhutan</option>
                  <option value="Bolivia">Bolivia</option>
                  <option value="Bosnia and Herzegovina">
                    Bosnia and Herzegovina
                  </option>
                  <option value="Botswana">Botswana</option>
                  <option value="Brazil">Brazil</option>
                  <option value="Brunei">Brunei</option>
                  <option value="Bulgaria">Bulgaria</option>
                  <option value="Burkina Faso">Burkina Faso</option>
                  <option value="Burundi">Burundi</option>
                  <option value="Cabo Verde">Cabo Verde</option>
                  <option value="Cambodia">Cambodia</option>
                  <option value="Cameroon">Cameroon</option>
                  <option value="Canada">Canada</option>
                  <option value="Central African Republic">
                    Central African Republic
                  </option>
                  <option value="Chad">Chad</option>
                  <option value="Chile">Chile</option>
                  <option value="China">China</option>
                  <option value="Colombia">Colombia</option>
                  <option value="Comoros">Comoros</option>
                  <option value="Congo">Congo</option>
                  <option value="Costa Rica">Costa Rica</option>
                  <option value="Croatia">Croatia</option>
                  <option value="Cuba">Cuba</option>
                  <option value="Cyprus">Cyprus</option>
                  <option value="Czech Republic">Czech Republic</option>
                  <option value="Denmark">Denmark</option>
                  <option value="Djibouti">Djibouti</option>
                  <option value="Dominican Republic">Dominican Republic</option>
                  <option value="Ecuador">Ecuador</option>
                  <option value="Egypt">Egypt</option>
                  <option value="El Salvador">El Salvador</option>
                  <option value="Equatorial Guinea">Equatorial Guinea</option>
                  <option value="Eritrea">Eritrea</option>
                  <option value="Estonia">Estonia</option>
                  <option value="Eswatini">Eswatini</option>
                  <option value="Ethiopia">Ethiopia</option>
                  <option value="Fiji">Fiji</option>
                  <option value="Finland">Finland</option>
                  <option value="France">France</option>
                  <option value="Gabon">Gabon</option>
                  <option value="Gambia">Gambia</option>
                  <option value="Georgia">Georgia</option>
                  <option value="Germany">Germany</option>
                  <option value="Ghana">Ghana</option>
                  <option value="Greece">Greece</option>
                  <option value="Grenada">Grenada</option>
                  <option value="Guatemala">Guatemala</option>
                  <option value="Guinea">Guinea</option>
                  <option value="Guinea-Bissau">Guinea-Bissau</option>
                  <option value="Guyana">Guyana</option>
                  <option value="Haiti">Haiti</option>
                  <option value="Honduras">Honduras</option>
                  <option value="Hungary">Hungary</option>
                  <option value="Iceland">Iceland</option>
                  <option value="India">India</option>
                  <option value="Indonesia">Indonesia</option>
                  <option value="Iran">Iran</option>
                  <option value="Iraq">Iraq</option>
                  <option value="Ireland">Ireland</option>
                  <option value="Israel">Israel</option>
                  <option value="Italy">Italy</option>
                  <option value="Jamaica">Jamaica</option>
                  <option value="Japan">Japan</option>
                  <option value="Jordan">Jordan</option>
                  <option value="Kazakhstan">Kazakhstan</option>
                  <option value="Kenya">Kenya</option>
                  <option value="Kiribati">Kiribati</option>
                  <option value="Kuwait">Kuwait</option>
                  <option value="Kyrgyzstan">Kyrgyzstan</option>
                  <option value="Laos">Laos</option>
                  <option value="Latvia">Latvia</option>
                  <option value="Lebanon">Lebanon</option>
                  <option value="Lesotho">Lesotho</option>
                  <option value="Liberia">Liberia</option>
                  <option value="Libya">Libya</option>
                  <option value="Lithuania">Lithuania</option>
                  <option value="Luxembourg">Luxembourg</option>
                  <option value="Madagascar">Madagascar</option>
                  <option value="Malawi">Malawi</option>
                  <option value="Malaysia">Malaysia</option>
                  <option value="Maldives">Maldives</option>
                  <option value="Mali">Mali</option>
                  <option value="Malta">Malta</option>
                  <option value="Marshall Islands">Marshall Islands</option>
                  <option value="Mauritania">Mauritania</option>
                  <option value="Mauritius">Mauritius</option>
                  <option value="Mexico">Mexico</option>
                  <option value="Micronesia">Micronesia</option>
                  <option value="Moldova">Moldova</option>
                  <option value="Monaco">Monaco</option>
                  <option value="Mongolia">Mongolia</option>
                  <option value="Montenegro">Montenegro</option>
                  <option value="Morocco">Morocco</option>
                  <option value="Mozambique">Mozambique</option>
                  <option value="Myanmar">Myanmar</option>
                  <option value="Namibia">Namibia</option>
                  <option value="Nauru">Nauru</option>
                  <option value="Nepal">Nepal</option>
                  <option value="Netherlands">Netherlands</option>
                  <option value="New Zealand">New Zealand</option>
                  <option value="Nicaragua">Nicaragua</option>
                  <option value="Niger">Niger</option>
                  <option value="Nigeria">Nigeria</option>
                  <option value="North Korea">North Korea</option>
                  <option value="North Macedonia">North Macedonia</option>
                  <option value="Norway">Norway</option>
                  <option value="Oman">Oman</option>
                  <option value="Pakistan">Pakistan</option>
                  <option value="Palau">Palau</option>
                  <option value="Panama">Panama</option>
                  <option value="Papua New Guinea">Papua New Guinea</option>
                  <option value="Paraguay">Paraguay</option>
                  <option value="Peru">Peru</option>
                  <option value="Philippines">Philippines</option>
                  <option value="Poland">Poland</option>
                  <option value="Portugal">Portugal</option>
                  <option value="Qatar">Qatar</option>
                  <option value="Romania">Romania</option>
                  <option value="Russia">Russia</option>
                  <option value="Rwanda">Rwanda</option>
                  <option value="Saint Kitts and Nevis">
                    Saint Kitts and Nevis
                  </option>
                  <option value="Saint Lucia">Saint Lucia</option>
                  <option value="Saint Vincent and the Grenadines">
                    Saint Vincent and the Grenadines
                  </option>
                  <option value="Samoa">Samoa</option>
                  <option value="San Marino">San Marino</option>
                  <option value="Sao Tome and Principe">
                    Sao Tome and Principe
                  </option>
                  <option value="Saudi Arabia">Saudi Arabia</option>
                  <option value="Senegal">Senegal</option>
                  <option value="Serbia">Serbia</option>
                  <option value="Seychelles">Seychelles</option>
                  <option value="Sierra Leone">Sierra Leone</option>
                  <option value="Singapore">Singapore</option>
                  <option value="Slovakia">Slovakia</option>
                  <option value="Slovenia">Slovenia</option>
                  <option value="Solomon Islands">Solomon Islands</option>
                  <option value="Somalia">Somalia</option>
                  <option value="South Africa">South Africa</option>
                  <option value="South Korea">South Korea</option>
                  <option value="Spain">Spain</option>
                  <option value="Sri Lanka">Sri Lanka</option>
                  <option value="Sudan">Sudan</option>
                  <option value="Suriname">Suriname</option>
                  <option value="Sweden">Sweden</option>
                  <option value="Switzerland">Switzerland</option>
                  <option value="Syria">Syria</option>
                  <option value="Taiwan">Taiwan</option>
                  <option value="Tajikistan">Tajikistan</option>
                  <option value="Tanzania">Tanzania</option>
                  <option value="Thailand">Thailand</option>
                  <option value="Timor-Leste">Timor-Leste</option>
                  <option value="Togo">Togo</option>
                  <option value="Tonga">Tonga</option>
                  <option value="Trinidad and Tobago">
                    Trinidad and Tobago
                  </option>
                  <option value="Tunisia">Tunisia</option>
                  <option value="Turkey">Turkey</option>
                  <option value="Turkmenistan">Turkmenistan</option>
                  <option value="Tuvalu">Tuvalu</option>
                  <option value="Uganda">Uganda</option>
                  <option value="Ukraine">Ukraine</option>
                  <option value="United Arab Emirates">
                    United Arab Emirates
                  </option>
                  <option value="United Kingdom">United Kingdom</option>
                  <option value="United States">United States</option>
                  <option value="Uruguay">Uruguay</option>
                  <option value="Uzbekistan">Uzbekistan</option>
                  <option value="Vanuatu">Vanuatu</option>
                  <option value="Vatican City">Vatican City</option>
                  <option value="Venezuela">Venezuela</option>
                  <option value="Vietnam">Vietnam</option>
                  <option value="Yemen">Yemen</option>
                  <option value="Zambia">Zambia</option>
                  <option value="Zimbabwe">Zimbabwe</option>
                </select>
              </div>

              <!-- Phone Input Group (Country Code + Phone Number) -->
              <div class="col-md-12">
                <div class="input-group">
                  <select
                    class="form-control country-code-select"
                    name="countryCode"
                    id="countryCode"
                    required
                  >
                    <option value="" disabled selected>Country Code</option>
                    <option value="+93">Afghanistan (+93)</option>
                    <option value="+355">Albania (+355)</option>
                    <option value="+213">Algeria (+213)</option>
                    <option value="+1684">American Samoa (+1684)</option>
                    <option value="+376">Andorra (+376)</option>
                    <option value="+244">Angola (+244)</option>
                    <option value="+1264">Anguilla (+1264)</option>
                    <option value="+672">Antarctica (+672)</option>
                    <option value="+1268">Antigua and Barbuda (+1268)</option>
                    <option value="+54">Argentina (+54)</option>
                    <option value="+374">Armenia (+374)</option>
                    <option value="+297">Aruba (+297)</option>
                    <option value="+61">Australia (+61)</option>
                    <option value="+43">Austria (+43)</option>
                    <option value="+994">Azerbaijan (+994)</option>
                    <option value="+1242">Bahamas (+1242)</option>
                    <option value="+973">Bahrain (+973)</option>
                    <option value="+880">Bangladesh (+880)</option>
                    <option value="+1246">Barbados (+1246)</option>
                    <option value="+375">Belarus (+375)</option>
                    <option value="+32">Belgium (+32)</option>
                    <option value="+501">Belize (+501)</option>
                    <option value="+229">Benin (+229)</option>
                    <option value="+1441">Bermuda (+1441)</option>
                    <option value="+975">Bhutan (+975)</option>
                    <option value="+591">Bolivia (+591)</option>
                    <option value="+387">Bosnia and Herzegovina (+387)</option>
                    <option value="+267">Botswana (+267)</option>
                    <option value="+55">Brazil (+55)</option>
                    <option value="+246">
                      British Indian Ocean Territory (+246)
                    </option>
                    <option value="+1284">
                      British Virgin Islands (+1284)
                    </option>
                    <option value="+673">Brunei (+673)</option>
                    <option value="+359">Bulgaria (+359)</option>
                    <option value="+226">Burkina Faso (+226)</option>
                    <option value="+257">Burundi (+257)</option>
                    <option value="+855">Cambodia (+855)</option>
                    <option value="+237">Cameroon (+237)</option>
                    <option value="+1">Canada (+1)</option>
                    <option value="+238">Cape Verde (+238)</option>
                    <option value="+1345">Cayman Islands (+1345)</option>
                    <option value="+236">
                      Central African Republic (+236)
                    </option>
                    <option value="+235">Chad (+235)</option>
                    <option value="+56">Chile (+56)</option>
                    <option value="+86">China (+86)</option>
                    <option value="+61">Christmas Island (+61)</option>
                    <option value="+61">Cocos (Keeling) Islands (+61)</option>
                    <option value="+57">Colombia (+57)</option>
                    <option value="+269">Comoros (+269)</option>
                    <option value="+243">Congo (DRC) (+243)</option>
                    <option value="+242">Congo (Republic) (+242)</option>
                    <option value="+682">Cook Islands (+682)</option>
                    <option value="+506">Costa Rica (+506)</option>
                    <option value="+225">Côte d'Ivoire (+225)</option>
                    <option value="+385">Croatia (+385)</option>
                    <option value="+53">Cuba (+53)</option>
                    <option value="+599">Curaçao (+599)</option>
                    <option value="+357">Cyprus (+357)</option>
                    <option value="+420">Czech Republic (+420)</option>
                    <option value="+45">Denmark (+45)</option>
                    <option value="+253">Djibouti (+253)</option>
                    <option value="+1767">Dominica (+1767)</option>
                    <option value="+1">Dominican Republic (+1)</option>
                    <option value="+593">Ecuador (+593)</option>
                    <option value="+20">Egypt (+20)</option>
                    <option value="+503">El Salvador (+503)</option>
                    <option value="+240">Equatorial Guinea (+240)</option>
                    <option value="+291">Eritrea (+291)</option>
                    <option value="+372">Estonia (+372)</option>
                    <option value="+251">Ethiopia (+251)</option>
                    <option value="+500">Falkland Islands (+500)</option>
                    <option value="+298">Faroe Islands (+298)</option>
                    <option value="+679">Fiji (+679)</option>
                    <option value="+358">Finland (+358)</option>
                    <option value="+33">France (+33)</option>
                    <option value="+594">French Guiana (+594)</option>
                    <option value="+689">French Polynesia (+689)</option>
                    <option value="+241">Gabon (+241)</option>
                    <option value="+220">Gambia (+220)</option>
                    <option value="+995">Georgia (+995)</option>
                    <option value="+49">Germany (+49)</option>
                    <option value="+233">Ghana (+233)</option>
                    <option value="+350">Gibraltar (+350)</option>
                    <option value="+30">Greece (+30)</option>
                    <option value="+299">Greenland (+299)</option>
                    <option value="+1473">Grenada (+1473)</option>
                    <option value="+590">Guadeloupe (+590)</option>
                    <option value="+1671">Guam (+1671)</option>
                    <option value="+502">Guatemala (+502)</option>
                    <option value="+224">Guinea (+224)</option>
                    <option value="+245">Guinea-Bissau (+245)</option>
                    <option value="+592">Guyana (+592)</option>
                    <option value="+509">Haiti (+509)</option>
                    <option value="+504">Honduras (+504)</option>
                    <option value="+852">Hong Kong (+852)</option>
                    <option value="+36">Hungary (+36)</option>
                    <option value="+354">Iceland (+354)</option>
                    <option value="+91">India (+91)</option>
                    <option value="+62">Indonesia (+62)</option>
                    <option value="+98">Iran (+98)</option>
                    <option value="+964">Iraq (+964)</option>
                    <option value="+353">Ireland (+353)</option>
                    <option value="+972">Israel (+972)</option>
                    <option value="+39">Italy (+39)</option>
                    <option value="+1876">Jamaica (+1876)</option>
                    <option value="+81">Japan (+81)</option>
                    <option value="+962">Jordan (+962)</option>
                    <option value="+7">Kazakhstan (+7)</option>
                    <option value="+254">Kenya (+254)</option>
                    <option value="+686">Kiribati (+686)</option>
                    <option value="+850">Korea (North) (+850)</option>
                    <option value="+82">Korea (South) (+82)</option>
                    <option value="+965">Kuwait (+965)</option>
                    <option value="+996">Kyrgyzstan (+996)</option>
                    <option value="+856">Laos (+856)</option>
                    <option value="+371">Latvia (+371)</option>
                    <option value="+961">Lebanon (+961)</option>
                    <option value="+266">Lesotho (+266)</option>
                    <option value="+231">Liberia (+231)</option>
                    <option value="+218">Libya (+218)</option>
                    <option value="+423">Liechtenstein (+423)</option>
                    <option value="+370">Lithuania (+370)</option>
                    <option value="+352">Luxembourg (+352)</option>
                    <option value="+853">Macao (+853)</option>
                    <option value="+389">Macedonia (+389)</option>
                    <option value="+261">Madagascar (+261)</option>
                    <option value="+265">Malawi (+265)</option>
                    <option value="+60">Malaysia (+60)</option>
                    <option value="+960">Maldives (+960)</option>
                    <option value="+223">Mali (+223)</option>
                    <option value="+356">Malta (+356)</option>
                    <option value="+692">Marshall Islands (+692)</option>
                    <option value="+596">Martinique (+596)</option>
                    <option value="+222">Mauritania (+222)</option>
                    <option value="+230">Mauritius (+230)</option>
                    <option value="+52">Mexico (+52)</option>
                    <option value="+691">Micronesia (+691)</option>
                    <option value="+373">Moldova (+373)</option>
                    <option value="+377">Monaco (+377)</option>
                    <option value="+976">Mongolia (+976)</option>
                    <option value="+382">Montenegro (+382)</option>
                    <option value="+1664">Montserrat (+1664)</option>
                    <option value="+212">Morocco (+212)</option>
                    <option value="+258">Mozambique (+258)</option>
                    <option value="+95">Myanmar (+95)</option>
                    <option value="+264">Namibia (+264)</option>
                    <option value="+674">Nauru (+674)</option>
                    <option value="+977">Nepal (+977)</option>
                    <option value="+31">Netherlands (+31)</option>
                    <option value="+599">Netherlands Antilles (+599)</option>
                    <option value="+687">New Caledonia (+687)</option>
                    <option value="+64">New Zealand (+64)</option>
                    <option value="+505">Nicaragua (+505)</option>
                    <option value="+227">Niger (+227)</option>
                    <option value="+234">Nigeria (+234)</option>
                    <option value="+683">Niue (+683)</option>
                    <option value="+672">Norfolk Island (+672)</option>
                    <option value="+1670">
                      Northern Mariana Islands (+1670)
                    </option>
                    <option value="+47">Norway (+47)</option>
                    <option value="+968">Oman (+968)</option>
                    <option value="+92">Pakistan (+92)</option>
                    <option value="+680">Palau (+680)</option>
                    <option value="+970">Palestine (+970)</option>
                    <option value="+507">Panama (+507)</option>
                    <option value="+675">Papua New Guinea (+675)</option>
                    <option value="+595">Paraguay (+595)</option>
                    <option value="+51">Peru (+51)</option>
                    <option value="+63">Philippines (+63)</option>
                    <option value="+48">Poland (+48)</option>
                    <option value="+351">Portugal (+351)</option>
                    <option value="+974">Qatar (+974)</option>
                    <option value="+242">Republic of the Congo (+242)</option>
                    <option value="+262">Réunion (+262)</option>
                    <option value="+40">Romania (+40)</option>
                    <option value="+7">Russia (+7)</option>
                    <option value="+250">Rwanda (+250)</option>
                    <option value="+590">Saint Barthélemy (+590)</option>
                    <option value="+290">Saint Helena (+290)</option>
                    <option value="+1869">Saint Kitts and Nevis (+1869)</option>
                    <option value="+1758">Saint Lucia (+1758)</option>
                    <option value="+590">Saint Martin (+590)</option>
                    <option value="+508">
                      Saint Pierre and Miquelon (+508)
                    </option>
                    <option value="+1784">
                      Saint Vincent and the Grenadines (+1784)
                    </option>
                    <option value="+685">Samoa (+685)</option>
                    <option value="+378">San Marino (+378)</option>
                    <option value="+239">Sao Tome and Principe (+239)</option>
                    <option value="+966">Saudi Arabia (+966)</option>
                    <option value="+221">Senegal (+221)</option>
                    <option value="+381">Serbia (+381)</option>
                    <option value="+248">Seychelles (+248)</option>
                    <option value="+232">Sierra Leone (+232)</option>
                    <option value="+65">Singapore (+65)</option>
                    <option value="+421">Slovakia (+421)</option>
                    <option value="+386">Slovenia (+386)</option>
                    <option value="+677">Solomon Islands (+677)</option>
                    <option value="+252">Somalia (+252)</option>
                    <option value="+27">South Africa (+27)</option>
                    <option value="+82">South Korea (+82)</option>
                    <option value="+211">South Sudan (+211)</option>
                    <option value="+34">Spain (+34)</option>
                    <option value="+94">Sri Lanka (+94)</option>
                    <option value="+249">Sudan (+249)</option>
                    <option value="+597">Suriname (+597)</option>
                    <option value="+268">Swaziland (+268)</option>
                    <option value="+46">Sweden (+46)</option>
                    <option value="+41">Switzerland (+41)</option>
                    <option value="+963">Syria (+963)</option>
                    <option value="+886">Taiwan (+886)</option>
                    <option value="+992">Tajikistan (+992)</option>
                    <option value="+255">Tanzania (+255)</option>
                    <option value="+66">Thailand (+66)</option>
                    <option value="+228">Togo (+228)</option>
                    <option value="+690">Tokelau (+690)</option>
                    <option value="+676">Tonga (+676)</option>
                    <option value="+1868">Trinidad and Tobago (+1868)</option>
                    <option value="+216">Tunisia (+216)</option>
                    <option value="+90">Turkey (+90)</option>
                    <option value="+993">Turkmenistan (+993)</option>
                    <option value="+1649">
                      Turks and Caicos Islands (+1649)
                    </option>
                    <option value="+688">Tuvalu (+688)</option>
                    <option value="+256">Uganda (+256)</option>
                    <option value="+380">Ukraine (+380)</option>
                    <option value="+971">United Arab Emirates (+971)</option>
                    <option value="+44">United Kingdom (+44)</option>
                    <option value="+1">United States (+1)</option>
                    <option value="+598">Uruguay (+598)</option>
                    <option value="+998">Uzbekistan (+998)</option>
                    <option value="+678">Vanuatu (+678)</option>
                    <option value="+379">Vatican City (+379)</option>
                    <option value="+58">Venezuela (+58)</option>
                    <option value="+84">Vietnam (+84)</option>
                    <option value="+1284">
                      Virgin Islands (British) (+1284)
                    </option>
                    <option value="+1340">Virgin Islands (U.S.) (+1340)</option>
                    <option value="+681">Wallis and Futuna (+681)</option>
                    <option value="+212">Western Sahara (+212)</option>
                    <option value="+967">Yemen (+967)</option>
                    <option value="+260">Zambia (+260)</option>
                    <option value="+263">Zimbabwe (+263)</option>
                  </select>
                  <input
                    type="tel"
                    class="form-control"
                    name="phoneNumber"
                    id="phoneNumber"
                    placeholder="Your Phone Number"
                    required
                  />
                </div>
              </div>

              <!-- Hidden input to store combined phone number and country code -->
              <input type="hidden" name="tel" id="tel" />

              <!-- Email -->
              <div class="col-md-12">
                <input
                  type="email"
                  class="form-control"
                  name="email"
                  placeholder="Your Email"
                  required=""
                />
              </div>

              <!-- Address -->
              <div class="col-md-12">
                <input
                  type="text"
                  class="form-control"
                  name="address"
                  placeholder="Your Address"
                  required=""
                />
              </div>

              <!-- Enquiry -->
              <div class="col-md-12">
                <textarea
                  class="form-control"
                  name="enquiry"
                  rows="6"
                  placeholder="Enquiry"
                  required=""
                ></textarea>
              </div>

              <!-- Submit Button -->
              <div class="col-md-12 text-center">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">
                  Your message has been sent. Thank you!
                </div>
                <button type="submit">Send Message</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?php
            } else {
                echo "No records found.";
            }

            $stmt->close(); } else { echo "Error preparing the SQL statement.";
    } } else { echo "Invalid category."; } } else { echo "ID or category not
    set."; } $conn->close(); ?>
    <?php require('inc/footer.php'); ?>
    <script>
      document
        .getElementById("phone-form")
        .addEventListener("submit", function (event) {
          // Prevent the form from submitting until we combine the values
          event.preventDefault();

          // Get country code and phone number values
          var countryCode = document.getElementById("countryCode").value;
          var phoneNumber = document.getElementById("phoneNumber").value;

          // Combine country code and phone number
          var tel = "(" + countryCode + ") " + phoneNumber;

          // Set the combined value to the hidden input
          document.getElementById("tel").value = tel;

          // Now submit the form
          this.submit();
        });
    </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <!-- Your custom JS -->
        <script src="assets/js/main.js"></script>
  </body>
</html>
