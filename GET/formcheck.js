function formcheck(opt) {
  if (opt == 1) {
    y = document.forms["post"]["name"].value;
    var x = document.forms["post"]["input"].value;
    if (x == "" || y == "") {
      alert("Please fill out the required fields before submitting")
      return false
    }
  }
  if (opt == 2) {
    var y = document.forms["post"]["name"].value;
    var x = document.forms["post"]["input"].value;
    var pass1 = document.forms["post"]["pass1"].value;
    var pass2 = document.forms["post"]["pass2"].value;
    if (x == "" || y == "" || pass1 == "" || pass2 == "") {
      alert("Please fill out the required fields before submitting")
      return false
    }
    else if (pass1 != pass2) {
      alert("Your passwords do not match")
      return false
    }
  }
  else {
    var x = document.forms["post"]["input"].value;
    if (x == "") {
      alert("Please fill out the required fields before submitting")
      return false
    }
  }
}