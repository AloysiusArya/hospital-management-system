<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Registrasi Pasien</title>
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0"/>
    <link rel="stylesheet" href="style2.css" />
  </head>
  <body>
    <div class="container">
      <h1 class="form-title">Registration</h1>
      <form action="terimasignup.php" method="post">
        <div class="main-user-info">
          <div class="user-input-box">
            <label for="fullName">Full Name</label>
            <input type="text"
                    id="fullName"
                    name="fullName"
                    placeholder="Enter Full Name"/>
          </div>
          <div class="user-input-box">
            <label for="username">Username</label>
            <input type="text"
                    id="username"
                    name="username"
                    placeholder="Enter Username"/>
          </div>
          <div class="user-input-box">
            <label for="nik">NIK</label>
            <input type="nik"
                    id="nik"
                    name="nik"
                    placeholder="Enter NIK"/>
          </div>
          <div class="user-input-box">
            <label for="alamat">Address</label>
            <input type="text"
                    id="alamat"
                    name="alamat"
                    placeholder="Enter Address"/>
          </div>
          <div class="user-input-box">
            <label for="password">Password</label>
            <input type="password"
                    id="password"
                    name="password"
                    placeholder="Enter Password"/>
          </div>
          <div class="user-input-box">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password"
                    id="confirmPassword"
                    name="confirmPassword"
                    placeholder="Confirm Password"/>
          </div>
          <div class="user-input-box">
            <label for="tanggal">Tanggal Lahir</label>
            <input type="date" id="tanggal" name="tanggal"/>
          </div>
        </div>
        <div class="gender-details-box">
          <span class="gender-title">Gender</span>
          <div class="gender-category">
            <input type="radio" name="gender" id="male" value="L">
            <label for="male">Male</label>
            <input type="radio" name="gender" id="female" value="P">
            <label for="female">Female</label>
          </div>
        </div><div class="gender-details-box">
          <span class="gender-title">Metode Pembayaran</span>
          <div class="gender-category">
            <input type="radio" name="metode" id="Kredit">
            <label for="kredit">Kredit</label>
            <input type="radio" name="metode" id="Tunai">
            <label for="cash">Cash</label>
            <input type="radio" name="metode" id="Asuransi">
            <label for="asuransi">Asuransi</label>
          </div>
        </div>
        <div class="form-submit-btn">
          <input type="submit" value="Register">
        </div>
      </form>
    </div>
  </body>
</html>