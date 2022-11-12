window.addEventListener("load", function () {
  let coun_btn = document.getElementById("country_lookup");
  let city_btn = document.getElementById("city_lookup");
  let result = document.querySelector("#result");
  let input = document.querySelector("#country");

  coun_btn.addEventListener("click", function (event) {
    event.preventDefault();

    let input_value = input.value;
    let url = `world.php?country=${input_value}&lookup=countries`;
    console.log(url);

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

  city_btn.addEventListener("click", function (event) {
    event.preventDefault();

    let input_value = input.value;
    let url = `world.php?country=${input_value}&lookup=cities`;

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
