window.addEventListener("load", function () {
  const slider = document.querySelector(".slider");
  const sliderMan = document.querySelector(".slider-main");
  const sliderItems = document.querySelectorAll(".slider-item");
  const dotItems = document.querySelectorAll(".slider-dot-item");
  const sliderItemWitdth = sliderItems[0].offsetWidth;
  const slideLength = sliderItems.length;

  [...dotItems].forEach((item) =>
    item.addEventListener("click", function (e) {
      const slideIndex = parseInt(e.target.dataset.index);
      index = slideIndex;
      sliderMan.style.transform = `translateX(-${
        slideIndex * sliderItemWitdth
      }px)`;
    })
  );
});

// filler search ajax
$(document).ready(function () {
  $("#search").keyup(function () {
    var search = $(this).val();
    $.ajax({
      url: "search.php",
      method: "POST",
      data: { search: search },
      success: function (data) {
        $(".card-list").html(data);
      },
    });
  });
});

$(document).ready(function () {
  $(".sex input").change(function () {
    var sex = $(this).val();
    $.ajax({
      url: "gender.php",
      method: "POST",
      data: { sex: sex },
      success: function (data) {
        $(".card-list").html(data);
      },
    });
  });
});
