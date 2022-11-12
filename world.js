window.addEventListener("load", function () {
  let btn = document.getElementById("lookup");
  let result = document.querySelector("#result");
  let input = document.querySelector("#country");

  btn.addEventListener("click", function (event) {
    event.preventDefault();

    let input_value = input.value;
    let url = `world.php?country=${input_value}`;

    fetch(url)
      .then(function (response) {
        if (response.ok) {
          return response.text();
        } else {
          throw new Error(response.statusText);
        }
      })
      .then(function (data) {
        result.innerHTML = data;
      });
  });
});
