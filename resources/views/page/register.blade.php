<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
  </head>
  <body>
    <h1>Buat Account Baru</h1>
    <h2>Sign Up Form</h2>

    <form action="/welcome" method="post">
      @csrf
      <label for="firstName">First name:</label><br /><br />
      <input type="text" id="firstName" name="first_name" minlenght="3" required /><br /><br />

      <label for="lastName">Last name:</label><br /><br />
      <input type="text" id="lastName" name="last_name" minlenght="3" required /><br /><br />

      <label>Gender:</label><br /><br />
      <input type="radio" id="male" name="gender" value="Male" />
      <label for="male">Male</label><br />
      <input type="radio" id="female" name="gender" value="Female" />
      <label for="female">Female</label><br />
      <input type="radio" id="other" name="gender" value="Other" />
      <label for="other">Other</label><br /><br />

      <label for="nationality">Nationality:</label><br /><br />
      <select name="nationality" id="nationality">
        <option value="indonesia">Indonesia</option>
        <option value="singapore">Singapore</option>
        <option value="australia">Australia</option></select
      ><br /><br />

      <label>Language Spoken:</label><br /><br />
      <input
        type="checkbox"
        id="bahasaIndonesia"
        name="language1"
        value="Indonesia"
      />
      <label for="bahasaIndonesia">Bahasa Indonesia</label><br />
      <input type="checkbox" id="english" name="language2" value="English" />
      <label for="english">English</label><br />
      <input
        type="checkbox"
        id="otherLanguage"
        name="language3"
        value="Other"
      />
      <label for="otherLanguage">Other</label><br />
      <br />

      <label for="bio">Bio:</label><br /><br />
      <textarea name="bio" id="bio" cols="30" rows="10"></textarea
      ><br />

      <button type="submit">Sign Up</button>
    </form>
  </body>
</html>
