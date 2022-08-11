$(function () {
  $("#rateYo").rateYo({
    rating: $('#avgStar').val(),
    starWidth: "30px",
    normalFill: "#D8D8D8",
    ratedFill: "#FFD567",
    readOnly: true,
    spacing: "6px"
  });

  $("#reviewStar").rateYo({
    fullStar:true,
    starWidth: "20px",
    normalFill: "#D8D8D8",
    ratedFill: "#FFD567",
    spacing: "6px",
    onSet: function (rating, rateYoInstance) {
      $('#rate').val(rating);
    }
  })
});
