<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
   <h2> Registration Form</h2>

<form action="process.php" method="POST">

    First Name:
    <input type="text" name="firstname"
           placeholder="TUBUO" required>
    <br><br>

    Email:
    <input type="email" name="email"
           placeholder="ministry@gmail.com" required>
    <br><br>

    Subject:
    <input type="text" name="subject"
           placeholder="programming" required>
    <br><br>

    Country:

    <select name="country" required>
        <option value="">none</option>
        <option value="Cameroon">Cameroon</option>
        <option value="Nigeria">Nigeria</option>
        <option value="Ghana">Ghana</option>
        <option value="France">France</option>
    </select>

    <br><br>

    Comment:
    <br>
    <textarea name="comment" rows="5"
              cols="35" required></textarea>

    <br><br>

    Gender:

    <input type="radio" name="gender"
           value="Male" required> M

    <input type="radio" name="gender"
           value="Female"> F

    <br><br>

    Highest degree level:

    <br>

    <input type="checkbox" name="degree[]"
           value="Post-Doc"> Post-Doc

    <br>

    <input type="checkbox" name="degree[]"
           value="Ph.D"> Ph.D

    <br>

    <input type="checkbox" name="degree[]"
           value="Master/MSc"> Master/MSc

    <br>

    <input type="checkbox" name="degree[]"
           value="Licence/BSc"> Licence/BSc

    <br>

    <input type="checkbox" name="degree[]"
           value="Baccalaureate/GCE"> Baccal/GCE

    <br><br>

    <button type="reset">Reset</button>

    <button type="submit">Submit</button>




    <h2> JavaScript</h2>

<button onclick="displaymessage()">Click Me</button>

<script>
    function displaymessage() {

        let name = prompt("Enter your name:");

        if (name !== null) {
            alert("Your name is " + name);
        }

    }
    function validateDegree() {

    let degrees = document.querySelectorAll(
        'input[name="degree[]"]:checked'
    );

    if (degrees.length === 0) {
        alert("Please select your highest degree level!");
        return false;
    }

    return true;
}
</script>

</form> 
</body>
</html>