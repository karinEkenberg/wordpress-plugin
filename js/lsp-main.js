jQuery(document).ready(function ($) {
  $(".lsp-letter").on("click", function () {
    var letter = $(this).data("letter");
    var audio = new Audio(
      "/wp-content/plugins/letter-sound-player/sounds/" + letter + ".mp3"
    );
    audio.play();
  });
});

jQuery(document).ready(function ($) {
  $(".lsp-letter").on("click", function () {
    // Hämta både stora och små bokstäver från data-attribut
    var uppercaseLetter = $(this).data("uppercase");
    var lowercaseLetter = $(this).data("lowercase");

    // Skapa filnamnet.
    // T.ex. A.mp3 för stora bokstäver, a.mp3 för små bokstäver
    var audioFileName =
      uppercaseLetter !== "-" ? uppercaseLetter : lowercaseLetter;

    // Skapa en sökväg till m4a-ljudfilen
    var audio = new Audio(
      "/wp-content/plugins/german-letters-with-sound/sounds/" +
        audioFileName +
        ".mp3"
    );

    // Felhantering om ljudfilen inte kan laddas
    audio.onerror = function () {
      alert("Ljudfilen för " + audioFileName + " kunde inte laddas.");
    };

    // Spela upp ljudet
    audio.play();
  });
});
