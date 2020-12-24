function myFunction() {

    var gameCode = prompt("Please enter game code:");

    if (gameCode == null || gameCode == "" || isNaN(parseInt(gameCode))) {
        gameCode=0;
    }

        document.getElementById("COD_GAME").value=gameCode;


  }
